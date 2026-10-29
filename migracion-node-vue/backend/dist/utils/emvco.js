"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.EmvcoQrService = void 0;
const qrcode_1 = __importDefault(require("qrcode"));
class EmvcoQrService {
    static TAG_PAYLOAD_FORMAT_INDICATOR = '00';
    static TAG_POINT_OF_INITIATION_METHOD = '01';
    static TAG_MERCHANT_CATEGORY_CODE = '52';
    static TAG_TRANSACTION_CURRENCY = '53';
    static TAG_TRANSACTION_AMOUNT = '54';
    static TAG_COUNTRY_CODE = '58';
    static TAG_MERCHANT_NAME = '59';
    static TAG_MERCHANT_CITY = '60';
    static TAG_ADDITIONAL_DATA = '62';
    static TAG_CRC16 = '63';
    static SUBTAG_BILL_OR_REFERENCE = '01';
    static VALUE_PAYLOAD_FORMAT = '01';
    static VALUE_POINT_DYNAMIC = '12';
    static VALUE_MCC_DEFAULT = '0000';
    static VALUE_CURRENCY_PEN = '604';
    static VALUE_COUNTRY_PE = 'PE';
    static formatTlv(tag, value) {
        const len = Buffer.byteLength(value, 'utf-8');
        const lenStr = len.toString().padStart(2, '0');
        return `${tag.padStart(2, '0')}${lenStr}${value}`;
    }
    static calculateCrc16CcittFalse(data) {
        let crc = 0xffff;
        const buf = Buffer.from(data, 'utf-8');
        for (let i = 0; i < buf.length; i++) {
            crc ^= buf[i] << 8;
            for (let bit = 0; bit < 8; bit++) {
                if ((crc & 0x8000) !== 0) {
                    crc = ((crc << 1) ^ 0x1021) & 0xffff;
                }
                else {
                    crc = (crc << 1) & 0xffff;
                }
            }
        }
        return crc.toString(16).toUpperCase().padStart(4, '0');
    }
    static buildPhoneAccountTlv(phone, guid = 'pe.bcrp') {
        let cleanPhone = phone.trim();
        if (/^[0-9]{9}$/.test(cleanPhone)) {
            cleanPhone = '+51' + cleanPhone;
        }
        else if (!cleanPhone.startsWith('+') && /^51[0-9]{9}$/.test(cleanPhone)) {
            cleanPhone = '+' + cleanPhone;
        }
        const sub00 = this.formatTlv('00', guid);
        const sub01 = this.formatTlv(this.SUBTAG_BILL_OR_REFERENCE, cleanPhone);
        return this.formatTlv('26', sub00 + sub01);
    }
    static parseBaseQr(rawQr) {
        const raw = rawQr.trim();
        const tags = {};
        let i = 0;
        const len = raw.length;
        while (i < len - 4) {
            const tag = raw.substring(i, i + 2);
            const lenStr = raw.substring(i + 2, i + 4);
            const valLen = parseInt(lenStr, 10);
            if (isNaN(valLen))
                break;
            const value = raw.substring(i + 4, i + 4 + valLen);
            tags[tag] = value;
            i += 4 + valLen;
        }
        let merchantAccountTLV = '';
        for (const [tag, val] of Object.entries(tags)) {
            const tagNum = parseInt(tag, 10);
            if (tagNum >= 26 && tagNum <= 51) {
                merchantAccountTLV += this.formatTlv(tagNum.toString().padStart(2, '0'), val);
            }
        }
        return {
            merchantAccountTLV,
            merchantName: tags['59'] || '',
            merchantCity: tags['60'] || '',
            tags,
        };
    }
    static sanitizeText(str, maxLength) {
        const ascii = str.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        const clean = ascii.replace(/[^A-Za-z0-9 ]/g, '').toUpperCase().trim();
        return clean.substring(0, maxLength);
    }
    static sanitizeReference(str, maxLength) {
        const clean = str.replace(/[^A-Za-z0-9\-_]/g, '').toUpperCase().trim();
        return clean.substring(0, maxLength);
    }
    static async generateDynamicQr(merchantAccountTLV, merchantName, merchantCity, amount, orderReference, qrSize = 300) {
        let cleanMerchantTLV = merchantAccountTLV.trim();
        if (cleanMerchantTLV.startsWith('+') || /^[0-9]{9,13}$/.test(cleanMerchantTLV)) {
            cleanMerchantTLV = this.buildPhoneAccountTlv(cleanMerchantTLV);
        }
        const numericAmount = typeof amount === 'number' ? amount : parseFloat(amount);
        const formattedAmount = numericAmount.toFixed(2);
        const sanitizedName = this.sanitizeText(merchantName, 25) || 'COMERCIO';
        const sanitizedCity = this.sanitizeText(merchantCity, 15) || 'LIMA';
        const sanitizedRef = this.sanitizeReference(orderReference, 25) || `ORD-${Date.now()}`;
        const subTag01 = this.formatTlv(this.SUBTAG_BILL_OR_REFERENCE, sanitizedRef);
        const tag62 = this.formatTlv(this.TAG_ADDITIONAL_DATA, subTag01);
        const payloadWithoutCrc = this.formatTlv(this.TAG_PAYLOAD_FORMAT_INDICATOR, this.VALUE_PAYLOAD_FORMAT) +
            this.formatTlv(this.TAG_POINT_OF_INITIATION_METHOD, this.VALUE_POINT_DYNAMIC) +
            cleanMerchantTLV +
            this.formatTlv(this.TAG_MERCHANT_CATEGORY_CODE, this.VALUE_MCC_DEFAULT) +
            this.formatTlv(this.TAG_TRANSACTION_CURRENCY, this.VALUE_CURRENCY_PEN) +
            this.formatTlv(this.TAG_TRANSACTION_AMOUNT, formattedAmount) +
            this.formatTlv(this.TAG_COUNTRY_CODE, this.VALUE_COUNTRY_PE) +
            this.formatTlv(this.TAG_MERCHANT_NAME, sanitizedName) +
            this.formatTlv(this.TAG_MERCHANT_CITY, sanitizedCity) +
            tag62;
        const payloadWithCrcHeader = payloadWithoutCrc + this.TAG_CRC16 + '04';
        const crc16 = this.calculateCrc16CcittFalse(payloadWithCrcHeader);
        const rawPayload = payloadWithCrcHeader + crc16;
        const svg = await qrcode_1.default.toString(rawPayload, { type: 'svg', width: qrSize, margin: 2 });
        const qrImage = await qrcode_1.default.toDataURL(rawPayload, { width: qrSize, margin: 2 });
        return { rawPayload, qrImage, svg, crc16 };
    }
    static async generateForPhone(phone, merchantName, merchantCity, amount, orderReference, qrSize = 300) {
        const tlv = this.buildPhoneAccountTlv(phone);
        return this.generateDynamicQr(tlv, merchantName, merchantCity, amount, orderReference, qrSize);
    }
    static async generateFromBaseQr(baseQrString, amount, orderReference, qrSize = 130) {
        const parsed = this.parseBaseQr(baseQrString);
        if (!parsed.merchantAccountTLV) {
            throw new Error('No se encontraron tags de cuenta de comercio (Tag 26 a 51) en el QR base proporcionado.');
        }
        const numericAmount = typeof amount === 'number' ? amount : parseFloat(amount);
        const formattedAmount = numericAmount.toFixed(2);
        const mcc = parsed.tags['52'] || '5611';
        const currency = parsed.tags['53'] || '604';
        const country = parsed.tags['58'] || 'PE';
        const merchantName = parsed.tags['59'] || 'YAPERO';
        const merchantCity = parsed.tags['60'] || 'Lima';
        let payload = this.formatTlv('00', '01') +
            this.formatTlv('01', '12') +
            parsed.merchantAccountTLV +
            this.formatTlv('52', mcc) +
            this.formatTlv('53', currency) +
            this.formatTlv('54', formattedAmount) +
            this.formatTlv('58', country) +
            this.formatTlv('59', merchantName) +
            this.formatTlv('60', merchantCity);
        if (orderReference) {
            const sanitizedRef = this.sanitizeReference(orderReference, 25);
            const sub01 = this.formatTlv(this.SUBTAG_BILL_OR_REFERENCE, sanitizedRef);
            payload += this.formatTlv(this.TAG_ADDITIONAL_DATA, sub01);
        }
        const payloadWithCrcHeader = payload + this.TAG_CRC16 + '04';
        const crc16 = this.calculateCrc16CcittFalse(payloadWithCrcHeader);
        const rawPayload = payloadWithCrcHeader + crc16;
        const svg = await qrcode_1.default.toString(rawPayload, { type: 'svg', width: qrSize, margin: 2 });
        const qrImage = await qrcode_1.default.toDataURL(rawPayload, { width: qrSize, margin: 2 });
        return { rawPayload, qrImage, svg, crc16 };
    }
}
exports.EmvcoQrService = EmvcoQrService;
