<?php

namespace Database\Seeders;

use App\Models\Ubigeo;
use Illuminate\Database\Seeder;

class UbigeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Ubigeo::firstOrCreate([
            "id" => 1,
            "ubigeo_reniec" => "010101",
            "ubigeo_inei" => "010101",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "CHACHAPOYAS",
            "region" => "AMAZONAS",
            "superficie" => "154",
            "altitud" => "2338",
            "latitud" => "-6.2294",
            "longitud" => "-77.8728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 2,
            "ubigeo_reniec" => "010102",
            "ubigeo_inei" => "010102",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "ASUNCION",
            "region" => "AMAZONAS",
            "superficie" => "26",
            "altitud" => "2823",
            "latitud" => "-6.0325",
            "longitud" => "-77.7108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 3,
            "ubigeo_reniec" => "010103",
            "ubigeo_inei" => "010103",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "BALSAS",
            "region" => "AMAZONAS",
            "superficie" => "357",
            "altitud" => "859",
            "latitud" => "-6.8358",
            "longitud" => "-78.0197"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 4,
            "ubigeo_reniec" => "010104",
            "ubigeo_inei" => "010104",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "CHETO",
            "region" => "AMAZONAS",
            "superficie" => "57",
            "altitud" => "2143",
            "latitud" => "-6.2556",
            "longitud" => "-77.7008"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 5,
            "ubigeo_reniec" => "010105",
            "ubigeo_inei" => "010105",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "CHILIQUIN",
            "region" => "AMAZONAS",
            "superficie" => "143",
            "altitud" => "2677",
            "latitud" => "-6.0783",
            "longitud" => "-77.7375"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 6,
            "ubigeo_reniec" => "010106",
            "ubigeo_inei" => "010106",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "CHUQUIBAMBA",
            "region" => "AMAZONAS",
            "superficie" => "279",
            "altitud" => "2803",
            "latitud" => "-6.935",
            "longitud" => "-77.8542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 7,
            "ubigeo_reniec" => "010107",
            "ubigeo_inei" => "010107",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "GRANADA",
            "region" => "AMAZONAS",
            "superficie" => "181",
            "altitud" => "3041",
            "latitud" => "-6.1064",
            "longitud" => "-77.6286"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 8,
            "ubigeo_reniec" => "010108",
            "ubigeo_inei" => "010108",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "HUANCAS",
            "region" => "AMAZONAS",
            "superficie" => "49",
            "altitud" => "2591",
            "latitud" => "-6.1736",
            "longitud" => "-77.8644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 9,
            "ubigeo_reniec" => "010109",
            "ubigeo_inei" => "010109",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "LA JALCA",
            "region" => "AMAZONAS",
            "superficie" => "380",
            "altitud" => "2869",
            "latitud" => "-6.4847",
            "longitud" => "-77.815"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 10,
            "ubigeo_reniec" => "010110",
            "ubigeo_inei" => "010110",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "LEIMEBAMBA",
            "region" => "AMAZONAS",
            "superficie" => "373",
            "altitud" => "2226",
            "latitud" => "-6.7075",
            "longitud" => "-77.8039"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 11,
            "ubigeo_reniec" => "010111",
            "ubigeo_inei" => "010111",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "LEVANTO",
            "region" => "AMAZONAS",
            "superficie" => "78",
            "altitud" => "2681",
            "latitud" => "-6.3078",
            "longitud" => "-77.8992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 12,
            "ubigeo_reniec" => "010112",
            "ubigeo_inei" => "010112",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "MAGDALENA",
            "region" => "AMAZONAS",
            "superficie" => "135",
            "altitud" => "1892",
            "latitud" => "-6.3731",
            "longitud" => "-77.9017"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 13,
            "ubigeo_reniec" => "010113",
            "ubigeo_inei" => "010113",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "MARISCAL CASTILLA",
            "region" => "AMAZONAS",
            "superficie" => "84",
            "altitud" => "2210",
            "latitud" => "-6.5944",
            "longitud" => "-77.8086"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 14,
            "ubigeo_reniec" => "010114",
            "ubigeo_inei" => "010114",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "MOLINOPAMPA",
            "region" => "AMAZONAS",
            "superficie" => "334",
            "altitud" => "2405",
            "latitud" => "-6.2092",
            "longitud" => "-77.6692"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 15,
            "ubigeo_reniec" => "010115",
            "ubigeo_inei" => "010115",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "MONTEVIDEO",
            "region" => "AMAZONAS",
            "superficie" => "119",
            "altitud" => "2421",
            "latitud" => "-6.6181",
            "longitud" => "-77.8022"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 16,
            "ubigeo_reniec" => "010116",
            "ubigeo_inei" => "010116",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "OLLEROS",
            "region" => "AMAZONAS",
            "superficie" => "125",
            "altitud" => "3053",
            "latitud" => "-6.0239",
            "longitud" => "-77.6764"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 17,
            "ubigeo_reniec" => "010117",
            "ubigeo_inei" => "010117",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "QUINJALCA",
            "region" => "AMAZONAS",
            "superficie" => "92",
            "altitud" => "3151",
            "latitud" => "-6.0914",
            "longitud" => "-77.6786"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 18,
            "ubigeo_reniec" => "010118",
            "ubigeo_inei" => "010118",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "SAN FRANCISCO DE DAGUAS",
            "region" => "AMAZONAS",
            "superficie" => "47",
            "altitud" => "2254",
            "latitud" => "-6.2292",
            "longitud" => "-77.74"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 19,
            "ubigeo_reniec" => "010119",
            "ubigeo_inei" => "010119",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "SAN ISIDRO DE MAINO",
            "region" => "AMAZONAS",
            "superficie" => "102",
            "altitud" => "2339",
            "latitud" => "-6.3372",
            "longitud" => "-77.8806"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 20,
            "ubigeo_reniec" => "010120",
            "ubigeo_inei" => "010120",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "SOLOCO",
            "region" => "AMAZONAS",
            "superficie" => "84",
            "altitud" => "2387",
            "latitud" => "-6.2606",
            "longitud" => "-77.7442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 21,
            "ubigeo_reniec" => "010121",
            "ubigeo_inei" => "010121",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0101",
            "provincia" => "CHACHAPOYAS",
            "distrito" => "SONCHE",
            "region" => "AMAZONAS",
            "superficie" => "113",
            "altitud" => "2089",
            "latitud" => "-6.2189",
            "longitud" => "-77.7753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 22,
            "ubigeo_reniec" => "010205",
            "ubigeo_inei" => "010201",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "BAGUA",
            "region" => "AMAZONAS",
            "superficie" => "151",
            "altitud" => "408",
            "latitud" => "-5.6389",
            "longitud" => "-78.5311"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 23,
            "ubigeo_reniec" => "010202",
            "ubigeo_inei" => "010202",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "ARAMANGO",
            "region" => "AMAZONAS",
            "superficie" => "809",
            "altitud" => "502",
            "latitud" => "-5.4164",
            "longitud" => "-78.4378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 24,
            "ubigeo_reniec" => "010203",
            "ubigeo_inei" => "010203",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "COPALLIN",
            "region" => "AMAZONAS",
            "superficie" => "99",
            "altitud" => "693",
            "latitud" => "-5.675",
            "longitud" => "-78.4231"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 25,
            "ubigeo_reniec" => "010204",
            "ubigeo_inei" => "010204",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "EL PARCO",
            "region" => "AMAZONAS",
            "superficie" => "18",
            "altitud" => "626",
            "latitud" => "-5.625",
            "longitud" => "-78.4753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 26,
            "ubigeo_reniec" => "010206",
            "ubigeo_inei" => "010205",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "IMAZA",
            "region" => "AMAZONAS",
            "superficie" => "4431",
            "altitud" => "317",
            "latitud" => "-5.1636",
            "longitud" => "-78.2889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 27,
            "ubigeo_reniec" => "010201",
            "ubigeo_inei" => "010206",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0102",
            "provincia" => "BAGUA",
            "distrito" => "LA PECA",
            "region" => "AMAZONAS",
            "superficie" => "144",
            "altitud" => "892",
            "latitud" => "-5.6119",
            "longitud" => "-78.4369"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 28,
            "ubigeo_reniec" => "010301",
            "ubigeo_inei" => "010301",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "JUMBILLA",
            "region" => "AMAZONAS",
            "superficie" => "154",
            "altitud" => "2081",
            "latitud" => "-5.9044",
            "longitud" => "-77.7978"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 29,
            "ubigeo_reniec" => "010304",
            "ubigeo_inei" => "010302",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "CHISQUILLA",
            "region" => "AMAZONAS",
            "superficie" => "175",
            "altitud" => "2057",
            "latitud" => "-5.8975",
            "longitud" => "-77.7861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 30,
            "ubigeo_reniec" => "010305",
            "ubigeo_inei" => "010303",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "CHURUJA",
            "region" => "AMAZONAS",
            "superficie" => "33",
            "altitud" => "1399",
            "latitud" => "-6.0194",
            "longitud" => "-77.9519"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 31,
            "ubigeo_reniec" => "010302",
            "ubigeo_inei" => "010304",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "COROSHA",
            "region" => "AMAZONAS",
            "superficie" => "46",
            "altitud" => "2297",
            "latitud" => "-5.8433",
            "longitud" => "-77.8225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 32,
            "ubigeo_reniec" => "010303",
            "ubigeo_inei" => "010305",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "CUISPES",
            "region" => "AMAZONAS",
            "superficie" => "111",
            "altitud" => "1912",
            "latitud" => "-5.9283",
            "longitud" => "-77.9461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 33,
            "ubigeo_reniec" => "010306",
            "ubigeo_inei" => "010306",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "FLORIDA",
            "region" => "AMAZONAS",
            "superficie" => "203",
            "altitud" => "2251",
            "latitud" => "-5.8261",
            "longitud" => "-77.9694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 34,
            "ubigeo_reniec" => "010312",
            "ubigeo_inei" => "010307",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "JAZAN",
            "region" => "AMAZONAS",
            "superficie" => "89",
            "altitud" => "1342",
            "latitud" => "-5.9414",
            "longitud" => "-77.9772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 35,
            "ubigeo_reniec" => "010307",
            "ubigeo_inei" => "010308",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "RECTA",
            "region" => "AMAZONAS",
            "superficie" => "25",
            "altitud" => "2166",
            "latitud" => "-5.9178",
            "longitud" => "-77.7889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 36,
            "ubigeo_reniec" => "010308",
            "ubigeo_inei" => "010309",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "SAN CARLOS",
            "region" => "AMAZONAS",
            "superficie" => "101",
            "altitud" => "1942",
            "latitud" => "-5.9661",
            "longitud" => "-77.9453"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 37,
            "ubigeo_reniec" => "010309",
            "ubigeo_inei" => "010310",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "SHIPASBAMBA",
            "region" => "AMAZONAS",
            "superficie" => "127",
            "altitud" => "1668",
            "latitud" => "-5.9106",
            "longitud" => "-77.9806"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 38,
            "ubigeo_reniec" => "010310",
            "ubigeo_inei" => "010311",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "VALERA",
            "region" => "AMAZONAS",
            "superficie" => "90",
            "altitud" => "1928",
            "latitud" => "-6.0428",
            "longitud" => "-77.9192"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 39,
            "ubigeo_reniec" => "010311",
            "ubigeo_inei" => "010312",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0103",
            "provincia" => "BONGARA",
            "distrito" => "YAMBRASBAMBA",
            "region" => "AMAZONAS",
            "superficie" => "1716",
            "altitud" => "1887",
            "latitud" => "-5.7353",
            "longitud" => "-77.925"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 40,
            "ubigeo_reniec" => "010601",
            "ubigeo_inei" => "010401",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0104",
            "provincia" => "CONDORCANQUI",
            "distrito" => "NIEVA",
            "region" => "AMAZONAS",
            "superficie" => "4482",
            "altitud" => "189",
            "latitud" => "-4.5922",
            "longitud" => "-77.8644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 41,
            "ubigeo_reniec" => "010603",
            "ubigeo_inei" => "010402",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0104",
            "provincia" => "CONDORCANQUI",
            "distrito" => "EL CENEPA",
            "region" => "AMAZONAS",
            "superficie" => "5458",
            "altitud" => "253",
            "latitud" => "-4.4556",
            "longitud" => "-78.1589"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 42,
            "ubigeo_reniec" => "010602",
            "ubigeo_inei" => "010403",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0104",
            "provincia" => "CONDORCANQUI",
            "distrito" => "RIO SANTIAGO",
            "region" => "AMAZONAS",
            "superficie" => "8035",
            "altitud" => "190",
            "latitud" => "-4.0158",
            "longitud" => "-77.7608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 43,
            "ubigeo_reniec" => "010401",
            "ubigeo_inei" => "010501",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "LAMUD",
            "region" => "AMAZONAS",
            "superficie" => "69",
            "altitud" => "2328",
            "latitud" => "-6.1392",
            "longitud" => "-77.9522"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 44,
            "ubigeo_reniec" => "010402",
            "ubigeo_inei" => "010502",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "CAMPORREDONDO",
            "region" => "AMAZONAS",
            "superficie" => "376",
            "altitud" => "1748",
            "latitud" => "-6.2133",
            "longitud" => "-78.32"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 45,
            "ubigeo_reniec" => "010403",
            "ubigeo_inei" => "010503",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "COCABAMBA",
            "region" => "AMAZONAS",
            "superficie" => "356",
            "altitud" => "2273",
            "latitud" => "-6.6142",
            "longitud" => "-78.005"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 46,
            "ubigeo_reniec" => "010404",
            "ubigeo_inei" => "010504",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "COLCAMAR",
            "region" => "AMAZONAS",
            "superficie" => "107",
            "altitud" => "2355",
            "latitud" => "-6.2994",
            "longitud" => "-77.9731"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 47,
            "ubigeo_reniec" => "010405",
            "ubigeo_inei" => "010505",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "CONILA",
            "region" => "AMAZONAS",
            "superficie" => "256",
            "altitud" => "2767",
            "latitud" => "-6.1592",
            "longitud" => "-78.1419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 48,
            "ubigeo_reniec" => "010406",
            "ubigeo_inei" => "010506",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "INGUILPATA",
            "region" => "AMAZONAS",
            "superficie" => "118",
            "altitud" => "2380",
            "latitud" => "-6.2394",
            "longitud" => "-77.9539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 49,
            "ubigeo_reniec" => "010407",
            "ubigeo_inei" => "010507",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "LONGUITA",
            "region" => "AMAZONAS",
            "superficie" => "58",
            "altitud" => "2799",
            "latitud" => "-6.4136",
            "longitud" => "-77.9683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 50,
            "ubigeo_reniec" => "010408",
            "ubigeo_inei" => "010508",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "LONYA CHICO",
            "region" => "AMAZONAS",
            "superficie" => "84",
            "altitud" => "2329",
            "latitud" => "-6.2297",
            "longitud" => "-77.955"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 51,
            "ubigeo_reniec" => "010409",
            "ubigeo_inei" => "010509",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "LUYA",
            "region" => "AMAZONAS",
            "superficie" => "91",
            "altitud" => "2359",
            "latitud" => "-6.1642",
            "longitud" => "-77.9442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 52,
            "ubigeo_reniec" => "010410",
            "ubigeo_inei" => "010510",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "LUYA VIEJO",
            "region" => "AMAZONAS",
            "superficie" => "74",
            "altitud" => "2924",
            "latitud" => "-6.1275",
            "longitud" => "-78.085"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 53,
            "ubigeo_reniec" => "010411",
            "ubigeo_inei" => "010511",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "MARIA",
            "region" => "AMAZONAS",
            "superficie" => "80",
            "altitud" => "2757",
            "latitud" => "-6.4289",
            "longitud" => "-77.9608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 54,
            "ubigeo_reniec" => "010412",
            "ubigeo_inei" => "010512",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "OCALLI",
            "region" => "AMAZONAS",
            "superficie" => "177",
            "altitud" => "1757",
            "latitud" => "-6.2353",
            "longitud" => "-78.2664"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 55,
            "ubigeo_reniec" => "010413",
            "ubigeo_inei" => "010513",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "OCUMAL",
            "region" => "AMAZONAS",
            "superficie" => "236",
            "altitud" => "1898",
            "latitud" => "-6.2825",
            "longitud" => "-78.2108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 56,
            "ubigeo_reniec" => "010414",
            "ubigeo_inei" => "010514",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "PISUQUIA",
            "region" => "AMAZONAS",
            "superficie" => "307",
            "altitud" => "2049",
            "latitud" => "-6.4533",
            "longitud" => "-78.0919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 57,
            "ubigeo_reniec" => "010423",
            "ubigeo_inei" => "010515",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "PROVIDENCIA",
            "region" => "AMAZONAS",
            "superficie" => "71",
            "altitud" => "1784",
            "latitud" => "-6.2972",
            "longitud" => "-78.2408"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 58,
            "ubigeo_reniec" => "010415",
            "ubigeo_inei" => "010516",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SAN CRISTOBAL",
            "region" => "AMAZONAS",
            "superficie" => "33",
            "altitud" => "2636",
            "latitud" => "-6.1017",
            "longitud" => "-77.9597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 59,
            "ubigeo_reniec" => "010416",
            "ubigeo_inei" => "010517",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SAN FRANCISCO DEL YESO",
            "region" => "AMAZONAS",
            "superficie" => "114",
            "altitud" => "2404",
            "latitud" => "-6.6469",
            "longitud" => "-77.8117"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 60,
            "ubigeo_reniec" => "010417",
            "ubigeo_inei" => "010518",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SAN JERONIMO",
            "region" => "AMAZONAS",
            "superficie" => "215",
            "altitud" => "2498",
            "latitud" => "-6.0597",
            "longitud" => "-77.9744"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 61,
            "ubigeo_reniec" => "010418",
            "ubigeo_inei" => "010519",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SAN JUAN DE LOPECANCHA",
            "region" => "AMAZONAS",
            "superficie" => "88",
            "altitud" => "2164",
            "latitud" => "-6.4964",
            "longitud" => "-77.8619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 62,
            "ubigeo_reniec" => "010419",
            "ubigeo_inei" => "010520",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SANTA CATALINA",
            "region" => "AMAZONAS",
            "superficie" => "126",
            "altitud" => "2574",
            "latitud" => "-6.1136",
            "longitud" => "-78.0608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 63,
            "ubigeo_reniec" => "010420",
            "ubigeo_inei" => "010521",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "SANTO TOMAS",
            "region" => "AMAZONAS",
            "superficie" => "85",
            "altitud" => "2837",
            "latitud" => "-6.5725",
            "longitud" => "-77.8658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 64,
            "ubigeo_reniec" => "010421",
            "ubigeo_inei" => "010522",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "TINGO",
            "region" => "AMAZONAS",
            "superficie" => "103",
            "altitud" => "1800",
            "latitud" => "-6.3797",
            "longitud" => "-77.9058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 65,
            "ubigeo_reniec" => "010422",
            "ubigeo_inei" => "010523",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0105",
            "provincia" => "LUYA",
            "distrito" => "TRITA",
            "region" => "AMAZONAS",
            "superficie" => "13",
            "altitud" => "2888",
            "latitud" => "-6.1519",
            "longitud" => "-77.9808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 66,
            "ubigeo_reniec" => "010501",
            "ubigeo_inei" => "010601",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "SAN NICOLAS",
            "region" => "AMAZONAS",
            "superficie" => "206",
            "altitud" => "1616",
            "latitud" => "-6.3953",
            "longitud" => "-77.4822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 67,
            "ubigeo_reniec" => "010503",
            "ubigeo_inei" => "010602",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "CHIRIMOTO",
            "region" => "AMAZONAS",
            "superficie" => "153",
            "altitud" => "1663",
            "latitud" => "-6.5231",
            "longitud" => "-77.4425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 68,
            "ubigeo_reniec" => "010502",
            "ubigeo_inei" => "010603",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "COCHAMAL",
            "region" => "AMAZONAS",
            "superficie" => "199",
            "altitud" => "1720",
            "latitud" => "-6.4075",
            "longitud" => "-77.5853"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 69,
            "ubigeo_reniec" => "010504",
            "ubigeo_inei" => "010604",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "HUAMBO",
            "region" => "AMAZONAS",
            "superficie" => "100",
            "altitud" => "1731",
            "latitud" => "-6.4311",
            "longitud" => "-77.5367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 70,
            "ubigeo_reniec" => "010505",
            "ubigeo_inei" => "010605",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "LIMABAMBA",
            "region" => "AMAZONAS",
            "superficie" => "318",
            "altitud" => "1677",
            "latitud" => "-6.4981",
            "longitud" => "-77.4989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 71,
            "ubigeo_reniec" => "010506",
            "ubigeo_inei" => "010606",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "LONGAR",
            "region" => "AMAZONAS",
            "superficie" => "66",
            "altitud" => "1623",
            "latitud" => "-6.3858",
            "longitud" => "-77.5467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 72,
            "ubigeo_reniec" => "010508",
            "ubigeo_inei" => "010607",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "MARISCAL BENAVIDES",
            "region" => "AMAZONAS",
            "superficie" => "176",
            "altitud" => "1592",
            "latitud" => "-6.3861",
            "longitud" => "-77.5044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 73,
            "ubigeo_reniec" => "010507",
            "ubigeo_inei" => "010608",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "MILPUC",
            "region" => "AMAZONAS",
            "superficie" => "27",
            "altitud" => "1665",
            "latitud" => "-6.5",
            "longitud" => "-77.4364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 74,
            "ubigeo_reniec" => "010509",
            "ubigeo_inei" => "010609",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "OMIA",
            "region" => "AMAZONAS",
            "superficie" => "175",
            "altitud" => "1368",
            "latitud" => "-6.4678",
            "longitud" => "-77.3956"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 75,
            "ubigeo_reniec" => "010510",
            "ubigeo_inei" => "010610",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "SANTA ROSA",
            "region" => "AMAZONAS",
            "superficie" => "34",
            "altitud" => "1770",
            "latitud" => "-6.4536",
            "longitud" => "-77.4553"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 76,
            "ubigeo_reniec" => "010511",
            "ubigeo_inei" => "010611",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "TOTORA",
            "region" => "AMAZONAS",
            "superficie" => "6",
            "altitud" => "1674",
            "latitud" => "-6.4931",
            "longitud" => "-77.4717"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 77,
            "ubigeo_reniec" => "010512",
            "ubigeo_inei" => "010612",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0106",
            "provincia" => "RODRIGUEZ DE MENDOZA",
            "distrito" => "VISTA ALEGRE",
            "region" => "AMAZONAS",
            "superficie" => "899",
            "altitud" => "1504",
            "latitud" => "-6.1508",
            "longitud" => "-77.3039"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 78,
            "ubigeo_reniec" => "010701",
            "ubigeo_inei" => "010701",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "BAGUA GRANDE",
            "region" => "AMAZONAS",
            "superficie" => "747",
            "altitud" => "444",
            "latitud" => "-5.7547",
            "longitud" => "-78.4428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 79,
            "ubigeo_reniec" => "010702",
            "ubigeo_inei" => "010702",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "CAJARURO",
            "region" => "AMAZONAS",
            "superficie" => "1746",
            "altitud" => "469",
            "latitud" => "-5.7364",
            "longitud" => "-78.4267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 80,
            "ubigeo_reniec" => "010703",
            "ubigeo_inei" => "010703",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "CUMBA",
            "region" => "AMAZONAS",
            "superficie" => "293",
            "altitud" => "477",
            "latitud" => "-5.9356",
            "longitud" => "-78.6636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 81,
            "ubigeo_reniec" => "010704",
            "ubigeo_inei" => "010704",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "EL MILAGRO",
            "region" => "AMAZONAS",
            "superficie" => "314",
            "altitud" => "392",
            "latitud" => "-5.6378",
            "longitud" => "-78.5583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 82,
            "ubigeo_reniec" => "010705",
            "ubigeo_inei" => "010705",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "JAMALCA",
            "region" => "AMAZONAS",
            "superficie" => "358",
            "altitud" => "1184",
            "latitud" => "-5.8942",
            "longitud" => "-78.2378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 83,
            "ubigeo_reniec" => "010706",
            "ubigeo_inei" => "010706",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "LONYA GRANDE",
            "region" => "AMAZONAS",
            "superficie" => "328",
            "altitud" => "1269",
            "latitud" => "-6.0964",
            "longitud" => "-78.4225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 84,
            "ubigeo_reniec" => "010707",
            "ubigeo_inei" => "010707",
            "departamento_inei" => "01",
            "departamento" => "AMAZONAS",
            "provincia_inei" => "0107",
            "provincia" => "UTCUBAMBA",
            "distrito" => "YAMON",
            "region" => "AMAZONAS",
            "superficie" => "58",
            "altitud" => "1052",
            "latitud" => "-6.0508",
            "longitud" => "-78.5289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 85,
            "ubigeo_reniec" => "020101",
            "ubigeo_inei" => "020101",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "HUARAZ",
            "region" => "ANCASH",
            "superficie" => "433",
            "altitud" => "3073",
            "latitud" => "-9.5297",
            "longitud" => "-77.5292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 86,
            "ubigeo_reniec" => "020103",
            "ubigeo_inei" => "020102",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "COCHABAMBA",
            "region" => "ANCASH",
            "superficie" => "136",
            "altitud" => "2135",
            "latitud" => "-9.495",
            "longitud" => "-77.8594"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 87,
            "ubigeo_reniec" => "020104",
            "ubigeo_inei" => "020103",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "COLCABAMBA",
            "region" => "ANCASH",
            "superficie" => "51",
            "altitud" => "3154",
            "latitud" => "-9.5947",
            "longitud" => "-77.8086"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 88,
            "ubigeo_reniec" => "020105",
            "ubigeo_inei" => "020104",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "HUANCHAY",
            "region" => "ANCASH",
            "superficie" => "209",
            "altitud" => "2592",
            "latitud" => "-9.7236",
            "longitud" => "-77.8186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 89,
            "ubigeo_reniec" => "020102",
            "ubigeo_inei" => "020105",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "INDEPENDENCIA",
            "region" => "ANCASH",
            "superficie" => "343",
            "altitud" => "3047",
            "latitud" => "-9.5144",
            "longitud" => "-77.5325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 90,
            "ubigeo_reniec" => "020106",
            "ubigeo_inei" => "020106",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "JANGAS",
            "region" => "ANCASH",
            "superficie" => "60",
            "altitud" => "2824",
            "latitud" => "-9.4006",
            "longitud" => "-77.5775"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 91,
            "ubigeo_reniec" => "020107",
            "ubigeo_inei" => "020107",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "LA LIBERTAD",
            "region" => "ANCASH",
            "superficie" => "164",
            "altitud" => "3343",
            "latitud" => "-9.6331",
            "longitud" => "-77.7414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 92,
            "ubigeo_reniec" => "020108",
            "ubigeo_inei" => "020108",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "OLLEROS",
            "region" => "ANCASH",
            "superficie" => "223",
            "altitud" => "3443",
            "latitud" => "-9.6667",
            "longitud" => "-77.4656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 93,
            "ubigeo_reniec" => "020109",
            "ubigeo_inei" => "020109",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "PAMPAS",
            "region" => "ANCASH",
            "superficie" => "358",
            "altitud" => "3698",
            "latitud" => "-9.6553",
            "longitud" => "-77.8261"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 94,
            "ubigeo_reniec" => "020110",
            "ubigeo_inei" => "020110",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "PARIACOTO",
            "region" => "ANCASH",
            "superficie" => "163",
            "altitud" => "1264",
            "latitud" => "-9.5594",
            "longitud" => "-77.8906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 95,
            "ubigeo_reniec" => "020111",
            "ubigeo_inei" => "020111",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "PIRA",
            "region" => "ANCASH",
            "superficie" => "244",
            "altitud" => "3602",
            "latitud" => "-9.5811",
            "longitud" => "-77.7072"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 96,
            "ubigeo_reniec" => "020112",
            "ubigeo_inei" => "020112",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0201",
            "provincia" => "HUARAZ",
            "distrito" => "TARICA",
            "region" => "ANCASH",
            "superficie" => "110",
            "altitud" => "2832",
            "latitud" => "-9.3936",
            "longitud" => "-77.575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 97,
            "ubigeo_reniec" => "020201",
            "ubigeo_inei" => "020201",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0202",
            "provincia" => "AIJA",
            "distrito" => "AIJA",
            "region" => "ANCASH",
            "superficie" => "160",
            "altitud" => "3421",
            "latitud" => "-9.7803",
            "longitud" => "-77.6106"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 98,
            "ubigeo_reniec" => "020203",
            "ubigeo_inei" => "020202",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0202",
            "provincia" => "AIJA",
            "distrito" => "CORIS",
            "region" => "ANCASH",
            "superficie" => "267",
            "altitud" => "2903",
            "latitud" => "-9.8206",
            "longitud" => "-77.7194"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 99,
            "ubigeo_reniec" => "020205",
            "ubigeo_inei" => "020203",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0202",
            "provincia" => "AIJA",
            "distrito" => "HUACLLAN",
            "region" => "ANCASH",
            "superficie" => "38",
            "altitud" => "3020",
            "latitud" => "-9.7981",
            "longitud" => "-77.6753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 100,
            "ubigeo_reniec" => "020206",
            "ubigeo_inei" => "020204",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0202",
            "provincia" => "AIJA",
            "distrito" => "LA MERCED",
            "region" => "ANCASH",
            "superficie" => "153",
            "altitud" => "3311",
            "latitud" => "-9.7356",
            "longitud" => "-77.6161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 101,
            "ubigeo_reniec" => "020208",
            "ubigeo_inei" => "020205",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0202",
            "provincia" => "AIJA",
            "distrito" => "SUCCHA",
            "region" => "ANCASH",
            "superficie" => "79",
            "altitud" => "3167",
            "latitud" => "-9.8231",
            "longitud" => "-77.6497"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 102,
            "ubigeo_reniec" => "021601",
            "ubigeo_inei" => "020301",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "LLAMELLIN",
            "region" => "ANCASH",
            "superficie" => "91",
            "altitud" => "3400",
            "latitud" => "-9.1008",
            "longitud" => "-77.0169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 103,
            "ubigeo_reniec" => "021602",
            "ubigeo_inei" => "020302",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "ACZO",
            "region" => "ANCASH",
            "superficie" => "69",
            "altitud" => "2680",
            "latitud" => "-9.1519",
            "longitud" => "-76.9889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 104,
            "ubigeo_reniec" => "021603",
            "ubigeo_inei" => "020303",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "CHACCHO",
            "region" => "ANCASH",
            "superficie" => "74",
            "altitud" => "3371",
            "latitud" => "-9.0597",
            "longitud" => "-77.0583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 105,
            "ubigeo_reniec" => "021604",
            "ubigeo_inei" => "020304",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "CHINGAS",
            "region" => "ANCASH",
            "superficie" => "49",
            "altitud" => "2866",
            "latitud" => "-9.1186",
            "longitud" => "-76.9919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 106,
            "ubigeo_reniec" => "021605",
            "ubigeo_inei" => "020305",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "MIRGAS",
            "region" => "ANCASH",
            "superficie" => "176",
            "altitud" => "3147",
            "latitud" => "-9.0786",
            "longitud" => "-77.0925"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 107,
            "ubigeo_reniec" => "021606",
            "ubigeo_inei" => "020306",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0203",
            "provincia" => "ANTONIO RAYMONDI",
            "distrito" => "SAN JUAN DE RONTOY",
            "region" => "ANCASH",
            "superficie" => "103",
            "altitud" => "3503",
            "latitud" => "-9.1753",
            "longitud" => "-77.0028"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 108,
            "ubigeo_reniec" => "021801",
            "ubigeo_inei" => "020401",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0204",
            "provincia" => "ASUNCION",
            "distrito" => "CHACAS",
            "region" => "ANCASH",
            "superficie" => "448",
            "altitud" => "3387",
            "latitud" => "-9.1622",
            "longitud" => "-77.3658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 109,
            "ubigeo_reniec" => "021802",
            "ubigeo_inei" => "020402",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0204",
            "provincia" => "ASUNCION",
            "distrito" => "ACOCHACA",
            "region" => "ANCASH",
            "superficie" => "81",
            "altitud" => "2864",
            "latitud" => "-9.1147",
            "longitud" => "-77.3683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 110,
            "ubigeo_reniec" => "020301",
            "ubigeo_inei" => "020501",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "CHIQUIAN",
            "region" => "ANCASH",
            "superficie" => "184",
            "altitud" => "3410",
            "latitud" => "-10.1519",
            "longitud" => "-77.1564"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 111,
            "ubigeo_reniec" => "020302",
            "ubigeo_inei" => "020502",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "ABELARDO PARDO LEZAMETA",
            "region" => "ANCASH",
            "superficie" => "11",
            "altitud" => "2108",
            "latitud" => "-10.2992",
            "longitud" => "-77.1464"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 112,
            "ubigeo_reniec" => "020321",
            "ubigeo_inei" => "020503",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "ANTONIO RAYMONDI",
            "region" => "ANCASH",
            "superficie" => "119",
            "altitud" => "2139",
            "latitud" => "-10.1572",
            "longitud" => "-77.4706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 113,
            "ubigeo_reniec" => "020304",
            "ubigeo_inei" => "020504",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "AQUIA",
            "region" => "ANCASH",
            "superficie" => "435",
            "altitud" => "3356",
            "latitud" => "-10.0744",
            "longitud" => "-77.145"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 114,
            "ubigeo_reniec" => "020305",
            "ubigeo_inei" => "020505",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "CAJACAY",
            "region" => "ANCASH",
            "superficie" => "193",
            "altitud" => "2616",
            "latitud" => "-10.1553",
            "longitud" => "-77.4397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 115,
            "ubigeo_reniec" => "020322",
            "ubigeo_inei" => "020506",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "CANIS",
            "region" => "ANCASH",
            "superficie" => "19",
            "altitud" => "2465",
            "latitud" => "-10.3389",
            "longitud" => "-77.1689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 116,
            "ubigeo_reniec" => "020323",
            "ubigeo_inei" => "020507",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "COLQUIOC",
            "region" => "ANCASH",
            "superficie" => "275",
            "altitud" => "772",
            "latitud" => "-10.3122",
            "longitud" => "-77.6153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 117,
            "ubigeo_reniec" => "020325",
            "ubigeo_inei" => "020508",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "HUALLANCA",
            "region" => "ANCASH",
            "superficie" => "873",
            "altitud" => "3563",
            "latitud" => "-9.8994",
            "longitud" => "-76.9417"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 118,
            "ubigeo_reniec" => "020311",
            "ubigeo_inei" => "020509",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "HUASTA",
            "region" => "ANCASH",
            "superficie" => "388",
            "altitud" => "3382",
            "latitud" => "-10.1233",
            "longitud" => "-77.1467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 119,
            "ubigeo_reniec" => "020310",
            "ubigeo_inei" => "020510",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "HUAYLLACAYAN",
            "region" => "ANCASH",
            "superficie" => "128",
            "altitud" => "3287",
            "latitud" => "-10.245",
            "longitud" => "-77.4347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 120,
            "ubigeo_reniec" => "020324",
            "ubigeo_inei" => "020511",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "LA PRIMAVERA",
            "region" => "ANCASH",
            "superficie" => "69",
            "altitud" => "2658",
            "latitud" => "-10.3356",
            "longitud" => "-77.1253"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 121,
            "ubigeo_reniec" => "020313",
            "ubigeo_inei" => "020512",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "MANGAS",
            "region" => "ANCASH",
            "superficie" => "116",
            "altitud" => "3492",
            "latitud" => "-10.3694",
            "longitud" => "-77.1033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 122,
            "ubigeo_reniec" => "020315",
            "ubigeo_inei" => "020513",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "PACLLON",
            "region" => "ANCASH",
            "superficie" => "212",
            "altitud" => "3296",
            "latitud" => "-10.2344",
            "longitud" => "-77.0717"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 123,
            "ubigeo_reniec" => "020317",
            "ubigeo_inei" => "020514",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "SAN MIGUEL DE CORPANQUI",
            "region" => "ANCASH",
            "superficie" => "44",
            "altitud" => "3405",
            "latitud" => "-10.285",
            "longitud" => "-77.1989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 124,
            "ubigeo_reniec" => "020320",
            "ubigeo_inei" => "020515",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0205",
            "provincia" => "BOLOGNESI",
            "distrito" => "TICLLOS",
            "region" => "ANCASH",
            "superficie" => "89",
            "altitud" => "3665",
            "latitud" => "-10.2531",
            "longitud" => "-77.1908"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 125,
            "ubigeo_reniec" => "020401",
            "ubigeo_inei" => "020601",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "CARHUAZ",
            "region" => "ANCASH",
            "superficie" => "195",
            "altitud" => "2663",
            "latitud" => "-9.2814",
            "longitud" => "-77.6467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 126,
            "ubigeo_reniec" => "020402",
            "ubigeo_inei" => "020602",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "ACOPAMPA",
            "region" => "ANCASH",
            "superficie" => "14",
            "altitud" => "2692",
            "latitud" => "-9.2947",
            "longitud" => "-77.6253"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 127,
            "ubigeo_reniec" => "020403",
            "ubigeo_inei" => "020603",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "AMASHCA",
            "region" => "ANCASH",
            "superficie" => "12",
            "altitud" => "2905",
            "latitud" => "-9.2392",
            "longitud" => "-77.6467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 128,
            "ubigeo_reniec" => "020404",
            "ubigeo_inei" => "020604",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "ANTA",
            "region" => "ANCASH",
            "superficie" => "41",
            "altitud" => "2800",
            "latitud" => "-9.3578",
            "longitud" => "-77.5989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 129,
            "ubigeo_reniec" => "020405",
            "ubigeo_inei" => "020605",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "ATAQUERO",
            "region" => "ANCASH",
            "superficie" => "47",
            "altitud" => "2749",
            "latitud" => "-9.2622",
            "longitud" => "-77.6917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 130,
            "ubigeo_reniec" => "020406",
            "ubigeo_inei" => "020606",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "MARCARA",
            "region" => "ANCASH",
            "superficie" => "157",
            "altitud" => "2767",
            "latitud" => "-9.3228",
            "longitud" => "-77.6036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 131,
            "ubigeo_reniec" => "020407",
            "ubigeo_inei" => "020607",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "PARIAHUANCA",
            "region" => "ANCASH",
            "superficie" => "12",
            "altitud" => "2830",
            "latitud" => "-9.3653",
            "longitud" => "-77.5808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 132,
            "ubigeo_reniec" => "020408",
            "ubigeo_inei" => "020608",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "SAN MIGUEL DE ACO",
            "region" => "ANCASH",
            "superficie" => "134",
            "altitud" => "2956",
            "latitud" => "-9.3683",
            "longitud" => "-77.5644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 133,
            "ubigeo_reniec" => "020409",
            "ubigeo_inei" => "020609",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "SHILLA",
            "region" => "ANCASH",
            "superficie" => "130",
            "altitud" => "3036",
            "latitud" => "-9.2317",
            "longitud" => "-77.625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 134,
            "ubigeo_reniec" => "020410",
            "ubigeo_inei" => "020610",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "TINCO",
            "region" => "ANCASH",
            "superficie" => "15",
            "altitud" => "2606",
            "latitud" => "-9.2708",
            "longitud" => "-77.6775"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 135,
            "ubigeo_reniec" => "020411",
            "ubigeo_inei" => "020611",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0206",
            "provincia" => "CARHUAZ",
            "distrito" => "YUNGAR",
            "region" => "ANCASH",
            "superficie" => "46",
            "altitud" => "2836",
            "latitud" => "-9.3775",
            "longitud" => "-77.5922"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 136,
            "ubigeo_reniec" => "021701",
            "ubigeo_inei" => "020701",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0207",
            "provincia" => "CARLOS FERMIN FITZCARRALD",
            "distrito" => "SAN LUIS",
            "region" => "ANCASH",
            "superficie" => "256",
            "altitud" => "3145",
            "latitud" => "-9.0942",
            "longitud" => "-77.3289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 137,
            "ubigeo_reniec" => "021703",
            "ubigeo_inei" => "020702",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0207",
            "provincia" => "CARLOS FERMIN FITZCARRALD",
            "distrito" => "SAN NICOLAS",
            "region" => "ANCASH",
            "superficie" => "197",
            "altitud" => "2890",
            "latitud" => "-8.9758",
            "longitud" => "-77.1892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 138,
            "ubigeo_reniec" => "021702",
            "ubigeo_inei" => "020703",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0207",
            "provincia" => "CARLOS FERMIN FITZCARRALD",
            "distrito" => "YAUYA",
            "region" => "ANCASH",
            "superficie" => "170",
            "altitud" => "3257",
            "latitud" => "-8.9911",
            "longitud" => "-77.2914"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 139,
            "ubigeo_reniec" => "020501",
            "ubigeo_inei" => "020801",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0208",
            "provincia" => "CASMA",
            "distrito" => "CASMA",
            "region" => "ANCASH",
            "superficie" => "1205",
            "altitud" => "59",
            "latitud" => "-9.4758",
            "longitud" => "-78.3064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 140,
            "ubigeo_reniec" => "020502",
            "ubigeo_inei" => "020802",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0208",
            "provincia" => "CASMA",
            "distrito" => "BUENA VISTA ALTA",
            "region" => "ANCASH",
            "superficie" => "477",
            "altitud" => "225",
            "latitud" => "-9.4325",
            "longitud" => "-78.2069"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 141,
            "ubigeo_reniec" => "020503",
            "ubigeo_inei" => "020803",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0208",
            "provincia" => "CASMA",
            "distrito" => "COMANDANTE NOEL",
            "region" => "ANCASH",
            "superficie" => "222",
            "altitud" => "14",
            "latitud" => "-9.4625",
            "longitud" => "-78.3847"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 142,
            "ubigeo_reniec" => "020505",
            "ubigeo_inei" => "020804",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0208",
            "provincia" => "CASMA",
            "distrito" => "YAUTAN",
            "region" => "ANCASH",
            "superficie" => "357",
            "altitud" => "831",
            "latitud" => "-9.5114",
            "longitud" => "-77.9964"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 143,
            "ubigeo_reniec" => "020601",
            "ubigeo_inei" => "020901",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "CORONGO",
            "region" => "ANCASH",
            "superficie" => "143",
            "altitud" => "3172",
            "latitud" => "-8.5708",
            "longitud" => "-77.8989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 144,
            "ubigeo_reniec" => "020602",
            "ubigeo_inei" => "020902",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "ACO",
            "region" => "ANCASH",
            "superficie" => "57",
            "altitud" => "3118",
            "latitud" => "-8.5231",
            "longitud" => "-77.8778"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 145,
            "ubigeo_reniec" => "020603",
            "ubigeo_inei" => "020903",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "BAMBAS",
            "region" => "ANCASH",
            "superficie" => "151",
            "altitud" => "2943",
            "latitud" => "-8.6025",
            "longitud" => "-77.9969"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 146,
            "ubigeo_reniec" => "020604",
            "ubigeo_inei" => "020904",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "CUSCA",
            "region" => "ANCASH",
            "superficie" => "412",
            "altitud" => "3196",
            "latitud" => "-8.5133",
            "longitud" => "-77.8647"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 147,
            "ubigeo_reniec" => "020605",
            "ubigeo_inei" => "020905",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "LA PAMPA",
            "region" => "ANCASH",
            "superficie" => "94",
            "altitud" => "1803",
            "latitud" => "-8.6611",
            "longitud" => "-77.9008"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 148,
            "ubigeo_reniec" => "020606",
            "ubigeo_inei" => "020906",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "YANAC",
            "region" => "ANCASH",
            "superficie" => "46",
            "altitud" => "2877",
            "latitud" => "-8.6186",
            "longitud" => "-77.8647"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 149,
            "ubigeo_reniec" => "020607",
            "ubigeo_inei" => "020907",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0209",
            "provincia" => "CORONGO",
            "distrito" => "YUPAN",
            "region" => "ANCASH",
            "superficie" => "86",
            "altitud" => "2781",
            "latitud" => "-8.6144",
            "longitud" => "-77.9686"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 150,
            "ubigeo_reniec" => "020801",
            "ubigeo_inei" => "021001",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "HUARI",
            "region" => "ANCASH",
            "superficie" => "399",
            "altitud" => "3114",
            "latitud" => "-9.3472",
            "longitud" => "-77.1708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 151,
            "ubigeo_reniec" => "020816",
            "ubigeo_inei" => "021002",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "ANRA",
            "region" => "ANCASH",
            "superficie" => "80",
            "altitud" => "3197",
            "latitud" => "-9.2347",
            "longitud" => "-76.9264"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 152,
            "ubigeo_reniec" => "020802",
            "ubigeo_inei" => "021003",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "CAJAY",
            "region" => "ANCASH",
            "superficie" => "159",
            "altitud" => "3175",
            "latitud" => "-9.3258",
            "longitud" => "-77.1575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 153,
            "ubigeo_reniec" => "020803",
            "ubigeo_inei" => "021004",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "CHAVIN DE HUANTAR",
            "region" => "ANCASH",
            "superficie" => "434",
            "altitud" => "3115",
            "latitud" => "-9.5886",
            "longitud" => "-77.1783"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1880,
            "ubigeo_reniec" => "050413",
            "ubigeo_inei" => "050515",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "PATIBAMBA",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 154,
            "ubigeo_reniec" => "020804",
            "ubigeo_inei" => "021005",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "HUACACHI",
            "region" => "ANCASH",
            "superficie" => "87",
            "altitud" => "3498",
            "latitud" => "-9.3156",
            "longitud" => "-76.9386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 155,
            "ubigeo_reniec" => "020806",
            "ubigeo_inei" => "021006",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "HUACCHIS",
            "region" => "ANCASH",
            "superficie" => "72",
            "altitud" => "3491",
            "latitud" => "-9.2006",
            "longitud" => "-76.7869"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 156,
            "ubigeo_reniec" => "020805",
            "ubigeo_inei" => "021007",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "HUACHIS",
            "region" => "ANCASH",
            "superficie" => "154",
            "altitud" => "3275",
            "latitud" => "-9.41",
            "longitud" => "-77.1"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 157,
            "ubigeo_reniec" => "020807",
            "ubigeo_inei" => "021008",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "HUANTAR",
            "region" => "ANCASH",
            "superficie" => "156",
            "altitud" => "3363",
            "latitud" => "-9.4519",
            "longitud" => "-77.1767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 158,
            "ubigeo_reniec" => "020808",
            "ubigeo_inei" => "021009",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "MASIN",
            "region" => "ANCASH",
            "superficie" => "75",
            "altitud" => "2547",
            "latitud" => "-9.3658",
            "longitud" => "-77.0964"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 159,
            "ubigeo_reniec" => "020809",
            "ubigeo_inei" => "021010",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "PAUCAS",
            "region" => "ANCASH",
            "superficie" => "135",
            "altitud" => "3433",
            "latitud" => "-9.1525",
            "longitud" => "-76.8994"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 160,
            "ubigeo_reniec" => "020810",
            "ubigeo_inei" => "021011",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "PONTO",
            "region" => "ANCASH",
            "superficie" => "118",
            "altitud" => "3142",
            "latitud" => "-9.3261",
            "longitud" => "-77.0044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 161,
            "ubigeo_reniec" => "020811",
            "ubigeo_inei" => "021012",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "RAHUAPAMPA",
            "region" => "ANCASH",
            "superficie" => "9",
            "altitud" => "2521",
            "latitud" => "-9.3592",
            "longitud" => "-77.0786"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 162,
            "ubigeo_reniec" => "020812",
            "ubigeo_inei" => "021013",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "RAPAYAN",
            "region" => "ANCASH",
            "superficie" => "143",
            "altitud" => "3233",
            "latitud" => "-9.2025",
            "longitud" => "-76.7594"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 163,
            "ubigeo_reniec" => "020813",
            "ubigeo_inei" => "021014",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "SAN MARCOS",
            "region" => "ANCASH",
            "superficie" => "557",
            "altitud" => "2988",
            "latitud" => "-9.5242",
            "longitud" => "-77.1569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 164,
            "ubigeo_reniec" => "020814",
            "ubigeo_inei" => "021015",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "SAN PEDRO DE CHANA",
            "region" => "ANCASH",
            "superficie" => "139",
            "altitud" => "3439",
            "latitud" => "-9.4031",
            "longitud" => "-77.0111"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 165,
            "ubigeo_reniec" => "020815",
            "ubigeo_inei" => "021016",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0210",
            "provincia" => "HUARI",
            "distrito" => "UCO",
            "region" => "ANCASH",
            "superficie" => "54",
            "altitud" => "3347",
            "latitud" => "-9.1883",
            "longitud" => "-76.9283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 166,
            "ubigeo_reniec" => "021901",
            "ubigeo_inei" => "021101",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0211",
            "provincia" => "HUARMEY",
            "distrito" => "HUARMEY",
            "region" => "ANCASH",
            "superficie" => "2894",
            "altitud" => "30",
            "latitud" => "-10.0689",
            "longitud" => "-78.1517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 167,
            "ubigeo_reniec" => "021902",
            "ubigeo_inei" => "021102",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0211",
            "provincia" => "HUARMEY",
            "distrito" => "COCHAPETI",
            "region" => "ANCASH",
            "superficie" => "100",
            "altitud" => "3529",
            "latitud" => "-9.9872",
            "longitud" => "-77.6461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 168,
            "ubigeo_reniec" => "021905",
            "ubigeo_inei" => "021103",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0211",
            "provincia" => "HUARMEY",
            "distrito" => "CULEBRAS",
            "region" => "ANCASH",
            "superficie" => "630",
            "altitud" => "41",
            "latitud" => "-9.9503",
            "longitud" => "-78.2222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 169,
            "ubigeo_reniec" => "021903",
            "ubigeo_inei" => "021104",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0211",
            "provincia" => "HUARMEY",
            "distrito" => "HUAYAN",
            "region" => "ANCASH",
            "superficie" => "59",
            "altitud" => "2702",
            "latitud" => "-9.8753",
            "longitud" => "-77.7083"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 170,
            "ubigeo_reniec" => "021904",
            "ubigeo_inei" => "021105",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0211",
            "provincia" => "HUARMEY",
            "distrito" => "MALVAS",
            "region" => "ANCASH",
            "superficie" => "220",
            "altitud" => "3132",
            "latitud" => "-9.9297",
            "longitud" => "-77.6578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 171,
            "ubigeo_reniec" => "020701",
            "ubigeo_inei" => "021201",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "CARAZ",
            "region" => "ANCASH",
            "superficie" => "247",
            "altitud" => "2273",
            "latitud" => "-9.0486",
            "longitud" => "-77.8047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 172,
            "ubigeo_reniec" => "020702",
            "ubigeo_inei" => "021202",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "HUALLANCA",
            "region" => "ANCASH",
            "superficie" => "179",
            "altitud" => "1391",
            "latitud" => "-8.8189",
            "longitud" => "-77.8631"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 173,
            "ubigeo_reniec" => "020703",
            "ubigeo_inei" => "021203",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "HUATA",
            "region" => "ANCASH",
            "superficie" => "71",
            "altitud" => "2712",
            "latitud" => "-9.0164",
            "longitud" => "-77.8614"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 174,
            "ubigeo_reniec" => "020704",
            "ubigeo_inei" => "021204",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "HUAYLAS",
            "region" => "ANCASH",
            "superficie" => "57",
            "altitud" => "2735",
            "latitud" => "-8.8725",
            "longitud" => "-77.8928"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 175,
            "ubigeo_reniec" => "020705",
            "ubigeo_inei" => "021205",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "MATO",
            "region" => "ANCASH",
            "superficie" => "107",
            "altitud" => "2209",
            "latitud" => "-8.9614",
            "longitud" => "-77.8425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 176,
            "ubigeo_reniec" => "020706",
            "ubigeo_inei" => "021206",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "PAMPAROMAS",
            "region" => "ANCASH",
            "superficie" => "496",
            "altitud" => "2772",
            "latitud" => "-9.0733",
            "longitud" => "-77.9817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 177,
            "ubigeo_reniec" => "020707",
            "ubigeo_inei" => "021207",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "PUEBLO LIBRE",
            "region" => "ANCASH",
            "superficie" => "131",
            "altitud" => "2485",
            "latitud" => "-9.11",
            "longitud" => "-77.8019"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 178,
            "ubigeo_reniec" => "020708",
            "ubigeo_inei" => "021208",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "SANTA CRUZ",
            "region" => "ANCASH",
            "superficie" => "358",
            "altitud" => "2890",
            "latitud" => "-8.9519",
            "longitud" => "-77.815"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 179,
            "ubigeo_reniec" => "020710",
            "ubigeo_inei" => "021209",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "SANTO TORIBIO",
            "region" => "ANCASH",
            "superficie" => "82",
            "altitud" => "2926",
            "latitud" => "-8.8644",
            "longitud" => "-77.9147"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 180,
            "ubigeo_reniec" => "020709",
            "ubigeo_inei" => "021210",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0212",
            "provincia" => "HUAYLAS",
            "distrito" => "YURACMARCA",
            "region" => "ANCASH",
            "superficie" => "566",
            "altitud" => "1484",
            "latitud" => "-8.7375",
            "longitud" => "-77.9039"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 181,
            "ubigeo_reniec" => "020901",
            "ubigeo_inei" => "021301",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "PISCOBAMBA",
            "region" => "ANCASH",
            "superficie" => "46",
            "altitud" => "3326",
            "latitud" => "-8.865",
            "longitud" => "-77.3578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 182,
            "ubigeo_reniec" => "020902",
            "ubigeo_inei" => "021302",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "CASCA",
            "region" => "ANCASH",
            "superficie" => "77",
            "altitud" => "3176",
            "latitud" => "-8.8556",
            "longitud" => "-77.3986"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 183,
            "ubigeo_reniec" => "020908",
            "ubigeo_inei" => "021303",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "ELEAZAR GUZMAN BARRON",
            "region" => "ANCASH",
            "superficie" => "94",
            "altitud" => "2845",
            "latitud" => "-8.9022",
            "longitud" => "-77.2439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 184,
            "ubigeo_reniec" => "020904",
            "ubigeo_inei" => "021304",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "FIDEL OLIVAS ESCUDERO",
            "region" => "ANCASH",
            "superficie" => "205",
            "altitud" => "2849",
            "latitud" => "-8.8061",
            "longitud" => "-77.2797"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 185,
            "ubigeo_reniec" => "020905",
            "ubigeo_inei" => "021305",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "LLAMA",
            "region" => "ANCASH",
            "superficie" => "48",
            "altitud" => "2839",
            "latitud" => "-8.915",
            "longitud" => "-77.3014"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 186,
            "ubigeo_reniec" => "020906",
            "ubigeo_inei" => "021306",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "LLUMPA",
            "region" => "ANCASH",
            "superficie" => "143",
            "altitud" => "2900",
            "latitud" => "-8.9608",
            "longitud" => "-77.3675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 187,
            "ubigeo_reniec" => "020903",
            "ubigeo_inei" => "021307",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "LUCMA",
            "region" => "ANCASH",
            "superficie" => "77",
            "altitud" => "3096",
            "latitud" => "-8.9194",
            "longitud" => "-77.4108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 188,
            "ubigeo_reniec" => "020907",
            "ubigeo_inei" => "021308",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0213",
            "provincia" => "MARISCAL LUZURIAGA",
            "distrito" => "MUSGA",
            "region" => "ANCASH",
            "superficie" => "40",
            "altitud" => "3001",
            "latitud" => "-8.9061",
            "longitud" => "-77.3392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 189,
            "ubigeo_reniec" => "022007",
            "ubigeo_inei" => "021401",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "OCROS",
            "region" => "ANCASH",
            "superficie" => "231",
            "altitud" => "3238",
            "latitud" => "-10.4033",
            "longitud" => "-77.3967"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 190,
            "ubigeo_reniec" => "022001",
            "ubigeo_inei" => "021402",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "ACAS",
            "region" => "ANCASH",
            "superficie" => "252",
            "altitud" => "3712",
            "latitud" => "-10.4575",
            "longitud" => "-77.3278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 191,
            "ubigeo_reniec" => "022002",
            "ubigeo_inei" => "021403",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "CAJAMARQUILLA",
            "region" => "ANCASH",
            "superficie" => "76",
            "altitud" => "3545",
            "latitud" => "-10.3542",
            "longitud" => "-77.1992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 192,
            "ubigeo_reniec" => "022003",
            "ubigeo_inei" => "021404",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "CARHUAPAMPA",
            "region" => "ANCASH",
            "superficie" => "110",
            "altitud" => "2250",
            "latitud" => "-10.4975",
            "longitud" => "-77.2428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 193,
            "ubigeo_reniec" => "022004",
            "ubigeo_inei" => "021405",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "COCHAS",
            "region" => "ANCASH",
            "superficie" => "409",
            "altitud" => "1290",
            "latitud" => "-10.5367",
            "longitud" => "-77.4228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 194,
            "ubigeo_reniec" => "022005",
            "ubigeo_inei" => "021406",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "CONGAS",
            "region" => "ANCASH",
            "superficie" => "130",
            "altitud" => "3112",
            "latitud" => "-10.3375",
            "longitud" => "-77.4428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 195,
            "ubigeo_reniec" => "022006",
            "ubigeo_inei" => "021407",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "LLIPA",
            "region" => "ANCASH",
            "superficie" => "34",
            "altitud" => "2767",
            "latitud" => "-10.3925",
            "longitud" => "-77.1908"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 196,
            "ubigeo_reniec" => "022008",
            "ubigeo_inei" => "021408",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "SAN CRISTOBAL DE RAJAN",
            "region" => "ANCASH",
            "superficie" => "68",
            "altitud" => "3634",
            "latitud" => "-10.3869",
            "longitud" => "-77.2194"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 197,
            "ubigeo_reniec" => "022009",
            "ubigeo_inei" => "021409",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "SAN PEDRO",
            "region" => "ANCASH",
            "superficie" => "531",
            "altitud" => "2243",
            "latitud" => "-10.3719",
            "longitud" => "-77.4872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 198,
            "ubigeo_reniec" => "022010",
            "ubigeo_inei" => "021410",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0214",
            "provincia" => "OCROS",
            "distrito" => "SANTIAGO DE CHILCAS",
            "region" => "ANCASH",
            "superficie" => "86",
            "altitud" => "3692",
            "latitud" => "-10.4386",
            "longitud" => "-77.3658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 199,
            "ubigeo_reniec" => "021001",
            "ubigeo_inei" => "021501",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "CABANA",
            "region" => "ANCASH",
            "superficie" => "150",
            "altitud" => "3156",
            "latitud" => "-8.3931",
            "longitud" => "-78.0089"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 200,
            "ubigeo_reniec" => "021002",
            "ubigeo_inei" => "021502",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "BOLOGNESI",
            "region" => "ANCASH",
            "superficie" => "87",
            "altitud" => "2931",
            "latitud" => "-8.3506",
            "longitud" => "-78.0506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 201,
            "ubigeo_reniec" => "021003",
            "ubigeo_inei" => "021503",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "CONCHUCOS",
            "region" => "ANCASH",
            "superficie" => "585",
            "altitud" => "3206",
            "latitud" => "-8.2686",
            "longitud" => "-77.8528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 202,
            "ubigeo_reniec" => "021004",
            "ubigeo_inei" => "021504",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "HUACASCHUQUE",
            "region" => "ANCASH",
            "superficie" => "64",
            "altitud" => "3140",
            "latitud" => "-8.3064",
            "longitud" => "-78.0047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 203,
            "ubigeo_reniec" => "021005",
            "ubigeo_inei" => "021505",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "HUANDOVAL",
            "region" => "ANCASH",
            "superficie" => "116",
            "altitud" => "3063",
            "latitud" => "-8.3311",
            "longitud" => "-77.9753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 204,
            "ubigeo_reniec" => "021006",
            "ubigeo_inei" => "021506",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "LACABAMBA",
            "region" => "ANCASH",
            "superficie" => "65",
            "altitud" => "3427",
            "latitud" => "-8.2603",
            "longitud" => "-77.8983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 205,
            "ubigeo_reniec" => "021007",
            "ubigeo_inei" => "021507",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "LLAPO",
            "region" => "ANCASH",
            "superficie" => "29",
            "altitud" => "3416",
            "latitud" => "-8.5144",
            "longitud" => "-78.0422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 206,
            "ubigeo_reniec" => "021008",
            "ubigeo_inei" => "021508",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "PALLASCA",
            "region" => "ANCASH",
            "superficie" => "60",
            "altitud" => "3086",
            "latitud" => "-8.2531",
            "longitud" => "-77.9994"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 207,
            "ubigeo_reniec" => "021009",
            "ubigeo_inei" => "021509",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "PAMPAS",
            "region" => "ANCASH",
            "superficie" => "438",
            "altitud" => "3216",
            "latitud" => "-8.1953",
            "longitud" => "-77.8958"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 208,
            "ubigeo_reniec" => "021010",
            "ubigeo_inei" => "021510",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "SANTA ROSA",
            "region" => "ANCASH",
            "superficie" => "299",
            "altitud" => "2413",
            "latitud" => "-8.5278",
            "longitud" => "-78.0675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 209,
            "ubigeo_reniec" => "021011",
            "ubigeo_inei" => "021511",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0215",
            "provincia" => "PALLASCA",
            "distrito" => "TAUCA",
            "region" => "ANCASH",
            "superficie" => "209",
            "altitud" => "3368",
            "latitud" => "-8.4703",
            "longitud" => "-78.0378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 210,
            "ubigeo_reniec" => "021101",
            "ubigeo_inei" => "021601",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0216",
            "provincia" => "POMABAMBA",
            "distrito" => "POMABAMBA",
            "region" => "ANCASH",
            "superficie" => "348",
            "altitud" => "2964",
            "latitud" => "-8.8211",
            "longitud" => "-77.4603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 211,
            "ubigeo_reniec" => "021102",
            "ubigeo_inei" => "021602",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0216",
            "provincia" => "POMABAMBA",
            "distrito" => "HUAYLLAN",
            "region" => "ANCASH",
            "superficie" => "89",
            "altitud" => "2993",
            "latitud" => "-8.8581",
            "longitud" => "-77.4356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 212,
            "ubigeo_reniec" => "021103",
            "ubigeo_inei" => "021603",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0216",
            "provincia" => "POMABAMBA",
            "distrito" => "PAROBAMBA",
            "region" => "ANCASH",
            "superficie" => "331",
            "altitud" => "3182",
            "latitud" => "-8.6958",
            "longitud" => "-77.4297"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 213,
            "ubigeo_reniec" => "021104",
            "ubigeo_inei" => "021604",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0216",
            "provincia" => "POMABAMBA",
            "distrito" => "QUINUABAMBA",
            "region" => "ANCASH",
            "superficie" => "146",
            "altitud" => "3129",
            "latitud" => "-8.6972",
            "longitud" => "-77.3983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 214,
            "ubigeo_reniec" => "021201",
            "ubigeo_inei" => "021701",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "RECUAY",
            "region" => "ANCASH",
            "superficie" => "143",
            "altitud" => "3428",
            "latitud" => "-9.7217",
            "longitud" => "-77.4564"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 215,
            "ubigeo_reniec" => "021210",
            "ubigeo_inei" => "021702",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "CATAC",
            "region" => "ANCASH",
            "superficie" => "1018",
            "altitud" => "3579",
            "latitud" => "-9.8017",
            "longitud" => "-77.4306"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 216,
            "ubigeo_reniec" => "021202",
            "ubigeo_inei" => "021703",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "COTAPARACO",
            "region" => "ANCASH",
            "superficie" => "173",
            "altitud" => "3032",
            "latitud" => "-9.9933",
            "longitud" => "-77.5881"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 217,
            "ubigeo_reniec" => "021203",
            "ubigeo_inei" => "021704",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "HUAYLLAPAMPA",
            "region" => "ANCASH",
            "superficie" => "105",
            "altitud" => "2908",
            "latitud" => "-10.0556",
            "longitud" => "-77.5367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 218,
            "ubigeo_reniec" => "021209",
            "ubigeo_inei" => "021705",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "LLACLLIN",
            "region" => "ANCASH",
            "superficie" => "101",
            "altitud" => "3020",
            "latitud" => "-10.0692",
            "longitud" => "-77.6217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 219,
            "ubigeo_reniec" => "021204",
            "ubigeo_inei" => "021706",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "MARCA",
            "region" => "ANCASH",
            "superficie" => "185",
            "altitud" => "2615",
            "latitud" => "-10.0892",
            "longitud" => "-77.4744"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 220,
            "ubigeo_reniec" => "021205",
            "ubigeo_inei" => "021707",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "PAMPAS CHICO",
            "region" => "ANCASH",
            "superficie" => "101",
            "altitud" => "3552",
            "latitud" => "-10.1147",
            "longitud" => "-77.3981"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 221,
            "ubigeo_reniec" => "021206",
            "ubigeo_inei" => "021708",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "PARARIN",
            "region" => "ANCASH",
            "superficie" => "255",
            "altitud" => "3402",
            "latitud" => "-10.05",
            "longitud" => "-77.6544"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 222,
            "ubigeo_reniec" => "021207",
            "ubigeo_inei" => "021709",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "TAPACOCHA",
            "region" => "ANCASH",
            "superficie" => "81",
            "altitud" => "3596",
            "latitud" => "-10.0103",
            "longitud" => "-77.5692"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 223,
            "ubigeo_reniec" => "021208",
            "ubigeo_inei" => "021710",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0217",
            "provincia" => "RECUAY",
            "distrito" => "TICAPAMPA",
            "region" => "ANCASH",
            "superficie" => "142",
            "altitud" => "3485",
            "latitud" => "-9.7606",
            "longitud" => "-77.4428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 224,
            "ubigeo_reniec" => "021301",
            "ubigeo_inei" => "021801",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "CHIMBOTE",
            "region" => "ANCASH",
            "superficie" => "1461",
            "altitud" => "52",
            "latitud" => "-9.0417",
            "longitud" => "-78.6078"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 225,
            "ubigeo_reniec" => "021302",
            "ubigeo_inei" => "021802",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "CACERES DEL PERU",
            "region" => "ANCASH",
            "superficie" => "550",
            "altitud" => "1210",
            "latitud" => "-9.0131",
            "longitud" => "-78.1381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 226,
            "ubigeo_reniec" => "021308",
            "ubigeo_inei" => "021803",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "COISHCO",
            "region" => "ANCASH",
            "superficie" => "9",
            "altitud" => "31",
            "latitud" => "-9.0231",
            "longitud" => "-78.6161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 227,
            "ubigeo_reniec" => "021303",
            "ubigeo_inei" => "021804",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "MACATE",
            "region" => "ANCASH",
            "superficie" => "585",
            "altitud" => "2731",
            "latitud" => "-8.7603",
            "longitud" => "-78.0614"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 228,
            "ubigeo_reniec" => "021304",
            "ubigeo_inei" => "021805",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "MORO",
            "region" => "ANCASH",
            "superficie" => "359",
            "altitud" => "504",
            "latitud" => "-9.1389",
            "longitud" => "-78.1833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 229,
            "ubigeo_reniec" => "021305",
            "ubigeo_inei" => "021806",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "NEPEŃA",
            "region" => "ANCASH",
            "superficie" => "458",
            "altitud" => "159",
            "latitud" => "-9.1728",
            "longitud" => "-78.3608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 230,
            "ubigeo_reniec" => "021306",
            "ubigeo_inei" => "021807",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "SAMANCO",
            "region" => "ANCASH",
            "superficie" => "154",
            "altitud" => "17",
            "latitud" => "-9.2622",
            "longitud" => "-78.4958"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 231,
            "ubigeo_reniec" => "021307",
            "ubigeo_inei" => "021808",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "SANTA",
            "region" => "ANCASH",
            "superficie" => "42",
            "altitud" => "35",
            "latitud" => "-8.9878",
            "longitud" => "-78.6131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 232,
            "ubigeo_reniec" => "021309",
            "ubigeo_inei" => "021809",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0218",
            "provincia" => "SANTA",
            "distrito" => "NUEVO CHIMBOTE",
            "region" => "ANCASH",
            "superficie" => "390",
            "altitud" => "40",
            "latitud" => "-9.1286",
            "longitud" => "-78.5308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 233,
            "ubigeo_reniec" => "021401",
            "ubigeo_inei" => "021901",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "SIHUAS",
            "region" => "ANCASH",
            "superficie" => "44",
            "altitud" => "2767",
            "latitud" => "-8.5544",
            "longitud" => "-77.6308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 234,
            "ubigeo_reniec" => "021407",
            "ubigeo_inei" => "021902",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "ACOBAMBA",
            "region" => "ANCASH",
            "superficie" => "153",
            "altitud" => "3147",
            "latitud" => "-8.3261",
            "longitud" => "-77.5819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 235,
            "ubigeo_reniec" => "021402",
            "ubigeo_inei" => "021903",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "ALFONSO UGARTE",
            "region" => "ANCASH",
            "superficie" => "81",
            "altitud" => "3197",
            "latitud" => "-8.4561",
            "longitud" => "-77.4267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 236,
            "ubigeo_reniec" => "021408",
            "ubigeo_inei" => "021904",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "CASHAPAMPA",
            "region" => "ANCASH",
            "superficie" => "67",
            "altitud" => "3430",
            "latitud" => "-8.5611",
            "longitud" => "-77.6531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 237,
            "ubigeo_reniec" => "021403",
            "ubigeo_inei" => "021905",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "CHINGALPO",
            "region" => "ANCASH",
            "superficie" => "173",
            "altitud" => "3157",
            "latitud" => "-8.3386",
            "longitud" => "-77.5975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 238,
            "ubigeo_reniec" => "021404",
            "ubigeo_inei" => "021906",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "HUAYLLABAMBA",
            "region" => "ANCASH",
            "superficie" => "288",
            "altitud" => "3329",
            "latitud" => "-8.5347",
            "longitud" => "-77.5669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 239,
            "ubigeo_reniec" => "021405",
            "ubigeo_inei" => "021907",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "QUICHES",
            "region" => "ANCASH",
            "superficie" => "147",
            "altitud" => "3035",
            "latitud" => "-8.395",
            "longitud" => "-77.4911"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 240,
            "ubigeo_reniec" => "021409",
            "ubigeo_inei" => "021908",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "RAGASH",
            "region" => "ANCASH",
            "superficie" => "208",
            "altitud" => "3437",
            "latitud" => "-8.5317",
            "longitud" => "-77.6658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 241,
            "ubigeo_reniec" => "021410",
            "ubigeo_inei" => "021909",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "SAN JUAN",
            "region" => "ANCASH",
            "superficie" => "209",
            "altitud" => "2739",
            "latitud" => "-8.6464",
            "longitud" => "-77.5819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 242,
            "ubigeo_reniec" => "021406",
            "ubigeo_inei" => "021910",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0219",
            "provincia" => "SIHUAS",
            "distrito" => "SICSIBAMBA",
            "region" => "ANCASH",
            "superficie" => "86",
            "altitud" => "3148",
            "latitud" => "-8.6233",
            "longitud" => "-77.5356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 243,
            "ubigeo_reniec" => "021501",
            "ubigeo_inei" => "022001",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "YUNGAY",
            "region" => "ANCASH",
            "superficie" => "277",
            "altitud" => "2517",
            "latitud" => "-9.14",
            "longitud" => "-77.7447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 244,
            "ubigeo_reniec" => "021502",
            "ubigeo_inei" => "022002",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "CASCAPARA",
            "region" => "ANCASH",
            "superficie" => "138",
            "altitud" => "2742",
            "latitud" => "-9.2264",
            "longitud" => "-77.7172"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 245,
            "ubigeo_reniec" => "021503",
            "ubigeo_inei" => "022003",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "MANCOS",
            "region" => "ANCASH",
            "superficie" => "64",
            "altitud" => "2542",
            "latitud" => "-9.19",
            "longitud" => "-77.7122"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 246,
            "ubigeo_reniec" => "021504",
            "ubigeo_inei" => "022004",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "MATACOTO",
            "region" => "ANCASH",
            "superficie" => "44",
            "altitud" => "2486",
            "latitud" => "-9.1769",
            "longitud" => "-77.7472"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 247,
            "ubigeo_reniec" => "021505",
            "ubigeo_inei" => "022005",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "QUILLO",
            "region" => "ANCASH",
            "superficie" => "374",
            "altitud" => "1267",
            "latitud" => "-9.3286",
            "longitud" => "-78.0417"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 248,
            "ubigeo_reniec" => "021506",
            "ubigeo_inei" => "022006",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "RANRAHIRCA",
            "region" => "ANCASH",
            "superficie" => "23",
            "altitud" => "2496",
            "latitud" => "-9.1731",
            "longitud" => "-77.7225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 249,
            "ubigeo_reniec" => "021507",
            "ubigeo_inei" => "022007",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "SHUPLUY",
            "region" => "ANCASH",
            "superficie" => "162",
            "altitud" => "2517",
            "latitud" => "-9.2169",
            "longitud" => "-77.6939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 250,
            "ubigeo_reniec" => "021508",
            "ubigeo_inei" => "022008",
            "departamento_inei" => "02",
            "departamento" => "ANCASH",
            "provincia_inei" => "0220",
            "provincia" => "YUNGAY",
            "distrito" => "YANAMA",
            "region" => "ANCASH",
            "superficie" => "280",
            "altitud" => "3389",
            "latitud" => "-9.0206",
            "longitud" => "-77.4708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 251,
            "ubigeo_reniec" => "030101",
            "ubigeo_inei" => "030101",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "ABANCAY",
            "region" => "APURIMAC",
            "superficie" => "313",
            "altitud" => "2500",
            "latitud" => "-13.6289",
            "longitud" => "-72.8861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 252,
            "ubigeo_reniec" => "030104",
            "ubigeo_inei" => "030102",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "CHACOCHE",
            "region" => "APURIMAC",
            "superficie" => "186",
            "altitud" => "3482",
            "latitud" => "-13.9411",
            "longitud" => "-72.9911"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 253,
            "ubigeo_reniec" => "030102",
            "ubigeo_inei" => "030103",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "CIRCA",
            "region" => "APURIMAC",
            "superficie" => "642",
            "altitud" => "3206",
            "latitud" => "-13.8783",
            "longitud" => "-72.8758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 254,
            "ubigeo_reniec" => "030103",
            "ubigeo_inei" => "030104",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "CURAHUASI",
            "region" => "APURIMAC",
            "superficie" => "818",
            "altitud" => "2694",
            "latitud" => "-13.5414",
            "longitud" => "-72.6961"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 255,
            "ubigeo_reniec" => "030105",
            "ubigeo_inei" => "030105",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "HUANIPACA",
            "region" => "APURIMAC",
            "superficie" => "433",
            "altitud" => "3155",
            "latitud" => "-13.4922",
            "longitud" => "-72.9333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 256,
            "ubigeo_reniec" => "030106",
            "ubigeo_inei" => "030106",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "LAMBRAMA",
            "region" => "APURIMAC",
            "superficie" => "522",
            "altitud" => "3126",
            "latitud" => "-13.8708",
            "longitud" => "-72.7697"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 257,
            "ubigeo_reniec" => "030107",
            "ubigeo_inei" => "030107",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "PICHIRHUA",
            "region" => "APURIMAC",
            "superficie" => "371",
            "altitud" => "2766",
            "latitud" => "-13.8608",
            "longitud" => "-73.0733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 258,
            "ubigeo_reniec" => "030108",
            "ubigeo_inei" => "030108",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "SAN PEDRO DE CACHORA",
            "region" => "APURIMAC",
            "superficie" => "109",
            "altitud" => "2916",
            "latitud" => "-13.5142",
            "longitud" => "-72.8142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 259,
            "ubigeo_reniec" => "030109",
            "ubigeo_inei" => "030109",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0301",
            "provincia" => "ABANCAY",
            "distrito" => "TAMBURCO",
            "region" => "APURIMAC",
            "superficie" => "55",
            "altitud" => "2620",
            "latitud" => "-13.6222",
            "longitud" => "-72.8733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 260,
            "ubigeo_reniec" => "030301",
            "ubigeo_inei" => "030201",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "ANDAHUAYLAS",
            "region" => "APURIMAC",
            "superficie" => "174",
            "altitud" => "2836",
            "latitud" => "-13.6561",
            "longitud" => "-73.3897"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 261,
            "ubigeo_reniec" => "030302",
            "ubigeo_inei" => "030202",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "ANDARAPA",
            "region" => "APURIMAC",
            "superficie" => "172",
            "altitud" => "3002",
            "latitud" => "-13.5281",
            "longitud" => "-73.3658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 262,
            "ubigeo_reniec" => "030303",
            "ubigeo_inei" => "030203",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "CHIARA",
            "region" => "APURIMAC",
            "superficie" => "149",
            "altitud" => "3289",
            "latitud" => "-13.8672",
            "longitud" => "-73.6689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 263,
            "ubigeo_reniec" => "030304",
            "ubigeo_inei" => "030204",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "HUANCARAMA",
            "region" => "APURIMAC",
            "superficie" => "153",
            "altitud" => "2976",
            "latitud" => "-13.6447",
            "longitud" => "-73.0856"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 264,
            "ubigeo_reniec" => "030305",
            "ubigeo_inei" => "030205",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "HUANCARAY",
            "region" => "APURIMAC",
            "superficie" => "112",
            "altitud" => "2909",
            "latitud" => "-13.7572",
            "longitud" => "-73.5275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 265,
            "ubigeo_reniec" => "030317",
            "ubigeo_inei" => "030206",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "HUAYANA",
            "region" => "APURIMAC",
            "superficie" => "97",
            "altitud" => "3196",
            "latitud" => "-14.0508",
            "longitud" => "-73.6094"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 266,
            "ubigeo_reniec" => "030306",
            "ubigeo_inei" => "030207",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "KISHUARA",
            "region" => "APURIMAC",
            "superficie" => "310",
            "altitud" => "3717",
            "latitud" => "-13.6911",
            "longitud" => "-73.1186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 267,
            "ubigeo_reniec" => "030307",
            "ubigeo_inei" => "030208",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "PACOBAMBA",
            "region" => "APURIMAC",
            "superficie" => "246",
            "altitud" => "2712",
            "latitud" => "-13.6153",
            "longitud" => "-73.0839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 268,
            "ubigeo_reniec" => "030313",
            "ubigeo_inei" => "030209",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "PACUCHA",
            "region" => "APURIMAC",
            "superficie" => "170",
            "altitud" => "3162",
            "latitud" => "-13.6094",
            "longitud" => "-73.3442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 269,
            "ubigeo_reniec" => "030308",
            "ubigeo_inei" => "030210",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "PAMPACHIRI",
            "region" => "APURIMAC",
            "superficie" => "603",
            "altitud" => "3388",
            "latitud" => "-14.1869",
            "longitud" => "-73.5447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 270,
            "ubigeo_reniec" => "030314",
            "ubigeo_inei" => "030211",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "POMACOCHA",
            "region" => "APURIMAC",
            "superficie" => "129",
            "altitud" => "3673",
            "latitud" => "-14.0839",
            "longitud" => "-73.5908"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 271,
            "ubigeo_reniec" => "030309",
            "ubigeo_inei" => "030212",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "SAN ANTONIO DE CACHI",
            "region" => "APURIMAC",
            "superficie" => "179",
            "altitud" => "3258",
            "latitud" => "-13.7731",
            "longitud" => "-73.6033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 272,
            "ubigeo_reniec" => "030310",
            "ubigeo_inei" => "030213",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "SAN JERONIMO",
            "region" => "APURIMAC",
            "superficie" => "237",
            "altitud" => "2973",
            "latitud" => "-13.6517",
            "longitud" => "-73.3658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 273,
            "ubigeo_reniec" => "030318",
            "ubigeo_inei" => "030214",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "SAN MIGUEL DE CHACCRAMPA",
            "region" => "APURIMAC",
            "superficie" => "83",
            "altitud" => "3681",
            "latitud" => "-13.9611",
            "longitud" => "-73.6078"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 274,
            "ubigeo_reniec" => "030315",
            "ubigeo_inei" => "030215",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "SANTA MARIA DE CHICMO",
            "region" => "APURIMAC",
            "superficie" => "162",
            "altitud" => "3287",
            "latitud" => "-13.6575",
            "longitud" => "-73.4939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 275,
            "ubigeo_reniec" => "030311",
            "ubigeo_inei" => "030216",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "TALAVERA",
            "region" => "APURIMAC",
            "superficie" => "148",
            "altitud" => "2842",
            "latitud" => "-13.6542",
            "longitud" => "-73.4289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 276,
            "ubigeo_reniec" => "030316",
            "ubigeo_inei" => "030217",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "TUMAY HUARACA",
            "region" => "APURIMAC",
            "superficie" => "447",
            "altitud" => "3409",
            "latitud" => "-14.0528",
            "longitud" => "-73.5658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 277,
            "ubigeo_reniec" => "030312",
            "ubigeo_inei" => "030218",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "TURPO",
            "region" => "APURIMAC",
            "superficie" => "122",
            "altitud" => "3327",
            "latitud" => "-13.7856",
            "longitud" => "-73.4742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 278,
            "ubigeo_reniec" => "030319",
            "ubigeo_inei" => "030219",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "KAQUIABAMBA",
            "region" => "APURIMAC",
            "superficie" => "98",
            "altitud" => "3087",
            "latitud" => "-13.5325",
            "longitud" => "-73.2883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 279,
            "ubigeo_reniec" => "030320",
            "ubigeo_inei" => "030220",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0302",
            "provincia" => "ANDAHUAYLAS",
            "distrito" => "JOSE MARIA ARGUEDAS",
            "region" => "APURIMAC",
            "superficie" => "196",
            "altitud" => "3590",
            "latitud" => "-13.7342",
            "longitud" => "-73.3506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 280,
            "ubigeo_reniec" => "030401",
            "ubigeo_inei" => "030301",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "ANTABAMBA",
            "region" => "APURIMAC",
            "superficie" => "604",
            "altitud" => "3664",
            "latitud" => "-14.3653",
            "longitud" => "-72.8772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 281,
            "ubigeo_reniec" => "030402",
            "ubigeo_inei" => "030302",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "EL ORO",
            "region" => "APURIMAC",
            "superficie" => "69",
            "altitud" => "3304",
            "latitud" => "-14.2089",
            "longitud" => "-73.0583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 282,
            "ubigeo_reniec" => "030403",
            "ubigeo_inei" => "030303",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "HUAQUIRCA",
            "region" => "APURIMAC",
            "superficie" => "338",
            "altitud" => "3500",
            "latitud" => "-14.3394",
            "longitud" => "-72.895"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 283,
            "ubigeo_reniec" => "030404",
            "ubigeo_inei" => "030304",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "JUAN ESPINOZA MEDRANO",
            "region" => "APURIMAC",
            "superficie" => "623",
            "altitud" => "3316",
            "latitud" => "-14.4283",
            "longitud" => "-72.915"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 284,
            "ubigeo_reniec" => "030405",
            "ubigeo_inei" => "030305",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "OROPESA",
            "region" => "APURIMAC",
            "superficie" => "1180",
            "altitud" => "3327",
            "latitud" => "-14.2606",
            "longitud" => "-72.5636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 285,
            "ubigeo_reniec" => "030406",
            "ubigeo_inei" => "030306",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "PACHACONAS",
            "region" => "APURIMAC",
            "superficie" => "227",
            "altitud" => "3465",
            "latitud" => "-14.2233",
            "longitud" => "-73.0164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 286,
            "ubigeo_reniec" => "030407",
            "ubigeo_inei" => "030307",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0303",
            "provincia" => "ANTABAMBA",
            "distrito" => "SABAINO",
            "region" => "APURIMAC",
            "superficie" => "179",
            "altitud" => "3441",
            "latitud" => "-14.3133",
            "longitud" => "-72.9453"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 287,
            "ubigeo_reniec" => "030201",
            "ubigeo_inei" => "030401",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "CHALHUANCA",
            "region" => "APURIMAC",
            "superficie" => "322",
            "altitud" => "2929",
            "latitud" => "-14.2944",
            "longitud" => "-73.2447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 288,
            "ubigeo_reniec" => "030202",
            "ubigeo_inei" => "030402",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "CAPAYA",
            "region" => "APURIMAC",
            "superficie" => "78",
            "altitud" => "3311",
            "latitud" => "-14.1178",
            "longitud" => "-73.3211"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 289,
            "ubigeo_reniec" => "030203",
            "ubigeo_inei" => "030403",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "CARAYBAMBA",
            "region" => "APURIMAC",
            "superficie" => "235",
            "altitud" => "3324",
            "latitud" => "-14.3781",
            "longitud" => "-73.1608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 290,
            "ubigeo_reniec" => "030206",
            "ubigeo_inei" => "030404",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "CHAPIMARCA",
            "region" => "APURIMAC",
            "superficie" => "213",
            "altitud" => "3423",
            "latitud" => "-13.975",
            "longitud" => "-73.065"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 291,
            "ubigeo_reniec" => "030204",
            "ubigeo_inei" => "030405",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "COLCABAMBA",
            "region" => "APURIMAC",
            "superficie" => "96",
            "altitud" => "3174",
            "latitud" => "-14.0064",
            "longitud" => "-73.2542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 292,
            "ubigeo_reniec" => "030205",
            "ubigeo_inei" => "030406",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "COTARUSE",
            "region" => "APURIMAC",
            "superficie" => "1750",
            "altitud" => "3268",
            "latitud" => "-14.4158",
            "longitud" => "-73.205"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 293,
            "ubigeo_reniec" => "030207",
            "ubigeo_inei" => "030407",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "HUAYLLO",
            "region" => "APURIMAC",
            "superficie" => "73",
            "altitud" => "3172",
            "latitud" => "-14.1331",
            "longitud" => "-73.2678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 294,
            "ubigeo_reniec" => "030217",
            "ubigeo_inei" => "030408",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "JUSTO APU SAHUARAURA",
            "region" => "APURIMAC",
            "superficie" => "98",
            "altitud" => "3133",
            "latitud" => "-14.1481",
            "longitud" => "-73.1739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 295,
            "ubigeo_reniec" => "030208",
            "ubigeo_inei" => "030409",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "LUCRE",
            "region" => "APURIMAC",
            "superficie" => "110",
            "altitud" => "2822",
            "latitud" => "-13.9497",
            "longitud" => "-73.2261"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 296,
            "ubigeo_reniec" => "030209",
            "ubigeo_inei" => "030410",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "POCOHUANCA",
            "region" => "APURIMAC",
            "superficie" => "83",
            "altitud" => "3374",
            "latitud" => "-14.2183",
            "longitud" => "-73.0869"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 297,
            "ubigeo_reniec" => "030216",
            "ubigeo_inei" => "030411",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "SAN JUAN DE CHACŃA",
            "region" => "APURIMAC",
            "superficie" => "86",
            "altitud" => "2874",
            "latitud" => "-13.9242",
            "longitud" => "-73.1822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 298,
            "ubigeo_reniec" => "030210",
            "ubigeo_inei" => "030412",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "SAŃAYCA",
            "region" => "APURIMAC",
            "superficie" => "449",
            "altitud" => "3373",
            "latitud" => "-14.2044",
            "longitud" => "-73.3469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 299,
            "ubigeo_reniec" => "030211",
            "ubigeo_inei" => "030413",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "SORAYA",
            "region" => "APURIMAC",
            "superficie" => "44",
            "altitud" => "2884",
            "latitud" => "-14.1647",
            "longitud" => "-73.315"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 300,
            "ubigeo_reniec" => "030212",
            "ubigeo_inei" => "030414",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "TAPAIRIHUA",
            "region" => "APURIMAC",
            "superficie" => "164",
            "altitud" => "2839",
            "latitud" => "-14.1414",
            "longitud" => "-73.1403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 301,
            "ubigeo_reniec" => "030213",
            "ubigeo_inei" => "030415",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "TINTAY",
            "region" => "APURIMAC",
            "superficie" => "137",
            "altitud" => "2824",
            "latitud" => "-13.9594",
            "longitud" => "-73.1853"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 302,
            "ubigeo_reniec" => "030214",
            "ubigeo_inei" => "030416",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "TORAYA",
            "region" => "APURIMAC",
            "superficie" => "173",
            "altitud" => "3167",
            "latitud" => "-14.0531",
            "longitud" => "-73.2939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 303,
            "ubigeo_reniec" => "030215",
            "ubigeo_inei" => "030417",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0304",
            "provincia" => "AYMARAES",
            "distrito" => "YANACA",
            "region" => "APURIMAC",
            "superficie" => "104",
            "altitud" => "3339",
            "latitud" => "-14.2253",
            "longitud" => "-73.16"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 304,
            "ubigeo_reniec" => "030501",
            "ubigeo_inei" => "030501",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "TAMBOBAMBA",
            "region" => "APURIMAC",
            "superficie" => "722",
            "altitud" => "3267",
            "latitud" => "-13.9461",
            "longitud" => "-72.1747"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 305,
            "ubigeo_reniec" => "030503",
            "ubigeo_inei" => "030502",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "COTABAMBAS",
            "region" => "APURIMAC",
            "superficie" => "332",
            "altitud" => "3557",
            "latitud" => "-13.7456",
            "longitud" => "-72.355"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 306,
            "ubigeo_reniec" => "030502",
            "ubigeo_inei" => "030503",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "COYLLURQUI",
            "region" => "APURIMAC",
            "superficie" => "419",
            "altitud" => "3184",
            "latitud" => "-13.8369",
            "longitud" => "-72.4322"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 307,
            "ubigeo_reniec" => "030504",
            "ubigeo_inei" => "030504",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "HAQUIRA",
            "region" => "APURIMAC",
            "superficie" => "475",
            "altitud" => "3698",
            "latitud" => "-14.2142",
            "longitud" => "-72.1889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 308,
            "ubigeo_reniec" => "030505",
            "ubigeo_inei" => "030505",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "MARA",
            "region" => "APURIMAC",
            "superficie" => "224",
            "altitud" => "3792",
            "latitud" => "-14.0867",
            "longitud" => "-72.1019"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 309,
            "ubigeo_reniec" => "030506",
            "ubigeo_inei" => "030506",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0305",
            "provincia" => "COTABAMBAS",
            "distrito" => "CHALLHUAHUACHO",
            "region" => "APURIMAC",
            "superficie" => "440",
            "altitud" => "3724",
            "latitud" => "-14.1186",
            "longitud" => "-72.2467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 310,
            "ubigeo_reniec" => "030701",
            "ubigeo_inei" => "030601",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "CHINCHEROS",
            "region" => "APURIMAC",
            "superficie" => "132",
            "altitud" => "2799",
            "latitud" => "-13.5183",
            "longitud" => "-73.7228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 311,
            "ubigeo_reniec" => "030705",
            "ubigeo_inei" => "030602",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "ANCO-HUALLO",
            "region" => "APURIMAC",
            "superficie" => "39",
            "altitud" => "3239",
            "latitud" => "-13.5297",
            "longitud" => "-73.6742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 312,
            "ubigeo_reniec" => "030704",
            "ubigeo_inei" => "030603",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "COCHARCAS",
            "region" => "APURIMAC",
            "superficie" => "110",
            "altitud" => "3051",
            "latitud" => "-13.6106",
            "longitud" => "-73.7414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 313,
            "ubigeo_reniec" => "030706",
            "ubigeo_inei" => "030604",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "HUACCANA",
            "region" => "APURIMAC",
            "superficie" => "472",
            "altitud" => "3093",
            "latitud" => "-13.3881",
            "longitud" => "-73.6892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 314,
            "ubigeo_reniec" => "030703",
            "ubigeo_inei" => "030605",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "OCOBAMBA",
            "region" => "APURIMAC",
            "superficie" => "58",
            "altitud" => "3039",
            "latitud" => "-13.4825",
            "longitud" => "-73.5603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 315,
            "ubigeo_reniec" => "030702",
            "ubigeo_inei" => "030606",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "ONGOY",
            "region" => "APURIMAC",
            "superficie" => "119",
            "altitud" => "2799",
            "latitud" => "-13.4028",
            "longitud" => "-73.6683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 316,
            "ubigeo_reniec" => "030707",
            "ubigeo_inei" => "030607",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "URANMARCA",
            "region" => "APURIMAC",
            "superficie" => "149",
            "altitud" => "3115",
            "latitud" => "-13.6722",
            "longitud" => "-73.6694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 317,
            "ubigeo_reniec" => "030708",
            "ubigeo_inei" => "030608",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "RANRACANCHA",
            "region" => "APURIMAC",
            "superficie" => "45",
            "altitud" => "3426",
            "latitud" => "-13.5325",
            "longitud" => "-73.6056"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 318,
            "ubigeo_reniec" => "030709",
            "ubigeo_inei" => "030609",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "ROCCHACC",
            "region" => "APURIMAC",
            "superficie" => "57",
            "altitud" => "3042",
            "latitud" => "-13.4406",
            "longitud" => "-73.6"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 319,
            "ubigeo_reniec" => "030710",
            "ubigeo_inei" => "030610",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "EL PORVENIR",
            "region" => "APURIMAC",
            "superficie" => "62",
            "altitud" => "3045",
            "latitud" => "-13.3967",
            "longitud" => "-73.5933"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 320,
            "ubigeo_reniec" => "030711",
            "ubigeo_inei" => "030611",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "LOS CHANKAS",
            "region" => "APURIMAC",
            "superficie" => "142",
            "altitud" => "2058",
            "latitud" => "-13.435",
            "longitud" => "-73.8219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 321,
            "ubigeo_reniec" => "030601",
            "ubigeo_inei" => "030701",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "CHUQUIBAMBILLA",
            "region" => "APURIMAC",
            "superficie" => "433",
            "altitud" => "3360",
            "latitud" => "-14.105",
            "longitud" => "-72.7078"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 322,
            "ubigeo_reniec" => "030602",
            "ubigeo_inei" => "030702",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "CURPAHUASI",
            "region" => "APURIMAC",
            "superficie" => "293",
            "altitud" => "3490",
            "latitud" => "-14.0633",
            "longitud" => "-72.6708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 323,
            "ubigeo_reniec" => "030605",
            "ubigeo_inei" => "030703",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "GAMARRA",
            "region" => "APURIMAC",
            "superficie" => "370",
            "altitud" => "3489",
            "latitud" => "-13.8717",
            "longitud" => "-72.5083"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 324,
            "ubigeo_reniec" => "030603",
            "ubigeo_inei" => "030704",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "HUAYLLATI",
            "region" => "APURIMAC",
            "superficie" => "111",
            "altitud" => "3469",
            "latitud" => "-13.9281",
            "longitud" => "-72.4844"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 325,
            "ubigeo_reniec" => "030604",
            "ubigeo_inei" => "030705",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "MAMARA",
            "region" => "APURIMAC",
            "superficie" => "66",
            "altitud" => "3619",
            "latitud" => "-14.2286",
            "longitud" => "-72.5908"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 326,
            "ubigeo_reniec" => "030606",
            "ubigeo_inei" => "030706",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "MICAELA BASTIDAS",
            "region" => "APURIMAC",
            "superficie" => "110",
            "altitud" => "3528",
            "latitud" => "-14.1153",
            "longitud" => "-72.6142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 327,
            "ubigeo_reniec" => "030608",
            "ubigeo_inei" => "030707",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "PATAYPAMPA",
            "region" => "APURIMAC",
            "superficie" => "159",
            "altitud" => "3800",
            "latitud" => "-14.1775",
            "longitud" => "-72.6725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 328,
            "ubigeo_reniec" => "030607",
            "ubigeo_inei" => "030708",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "PROGRESO",
            "region" => "APURIMAC",
            "superficie" => "255",
            "altitud" => "3817",
            "latitud" => "-14.0722",
            "longitud" => "-72.4767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 329,
            "ubigeo_reniec" => "030609",
            "ubigeo_inei" => "030709",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "SAN ANTONIO",
            "region" => "APURIMAC",
            "superficie" => "24",
            "altitud" => "3483",
            "latitud" => "-14.1694",
            "longitud" => "-72.6233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 330,
            "ubigeo_reniec" => "030613",
            "ubigeo_inei" => "030710",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "SANTA ROSA",
            "region" => "APURIMAC",
            "superficie" => "36",
            "altitud" => "3539",
            "latitud" => "-14.1397",
            "longitud" => "-72.6567"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 331,
            "ubigeo_reniec" => "030610",
            "ubigeo_inei" => "030711",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "TURPAY",
            "region" => "APURIMAC",
            "superficie" => "52",
            "altitud" => "3448",
            "latitud" => "-14.2278",
            "longitud" => "-72.6225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 332,
            "ubigeo_reniec" => "030611",
            "ubigeo_inei" => "030712",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "VILCABAMBA",
            "region" => "APURIMAC",
            "superficie" => "8",
            "altitud" => "2801",
            "latitud" => "-14.0778",
            "longitud" => "-72.6247"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 333,
            "ubigeo_reniec" => "030612",
            "ubigeo_inei" => "030713",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "VIRUNDO",
            "region" => "APURIMAC",
            "superficie" => "117",
            "altitud" => "3876",
            "latitud" => "-14.2503",
            "longitud" => "-72.6811"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 334,
            "ubigeo_reniec" => "030614",
            "ubigeo_inei" => "030714",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0307",
            "provincia" => "GRAU",
            "distrito" => "CURASCO",
            "region" => "APURIMAC",
            "superficie" => "140",
            "altitud" => "3566",
            "latitud" => "-14.0619",
            "longitud" => "-72.5678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 335,
            "ubigeo_reniec" => "040101",
            "ubigeo_inei" => "040101",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "AREQUIPA",
            "region" => "AREQUIPA",
            "superficie" => "3",
            "altitud" => "2429",
            "latitud" => "-16.3933",
            "longitud" => "-71.5289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 336,
            "ubigeo_reniec" => "040128",
            "ubigeo_inei" => "040102",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "ALTO SELVA ALEGRE",
            "region" => "AREQUIPA",
            "superficie" => "7",
            "altitud" => "2510",
            "latitud" => "-16.38",
            "longitud" => "-71.5211"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 337,
            "ubigeo_reniec" => "040102",
            "ubigeo_inei" => "040103",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "CAYMA",
            "region" => "AREQUIPA",
            "superficie" => "246",
            "altitud" => "2531",
            "latitud" => "-16.3625",
            "longitud" => "-71.5442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 338,
            "ubigeo_reniec" => "040103",
            "ubigeo_inei" => "040104",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "CERRO COLORADO",
            "region" => "AREQUIPA",
            "superficie" => "175",
            "altitud" => "2441",
            "latitud" => "-16.3764",
            "longitud" => "-71.5608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 339,
            "ubigeo_reniec" => "040104",
            "ubigeo_inei" => "040105",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "CHARACATO",
            "region" => "AREQUIPA",
            "superficie" => "86",
            "altitud" => "2506",
            "latitud" => "-16.4686",
            "longitud" => "-71.4844"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 340,
            "ubigeo_reniec" => "040105",
            "ubigeo_inei" => "040106",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "CHIGUATA",
            "region" => "AREQUIPA",
            "superficie" => "461",
            "altitud" => "3006",
            "latitud" => "-16.4036",
            "longitud" => "-71.3917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 341,
            "ubigeo_reniec" => "040127",
            "ubigeo_inei" => "040107",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "JACOBO HUNTER",
            "region" => "AREQUIPA",
            "superficie" => "20",
            "altitud" => "2309",
            "latitud" => "-16.4414",
            "longitud" => "-71.5586"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 342,
            "ubigeo_reniec" => "040106",
            "ubigeo_inei" => "040108",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "LA JOYA",
            "region" => "AREQUIPA",
            "superficie" => "670",
            "altitud" => "1640",
            "latitud" => "-16.4231",
            "longitud" => "-71.8183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 343,
            "ubigeo_reniec" => "040126",
            "ubigeo_inei" => "040109",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "MARIANO MELGAR",
            "region" => "AREQUIPA",
            "superficie" => "30",
            "altitud" => "2459",
            "latitud" => "-16.4072",
            "longitud" => "-71.5056"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 344,
            "ubigeo_reniec" => "040107",
            "ubigeo_inei" => "040110",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "MIRAFLORES",
            "region" => "AREQUIPA",
            "superficie" => "29",
            "altitud" => "2450",
            "latitud" => "-16.3947",
            "longitud" => "-71.5225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 345,
            "ubigeo_reniec" => "040108",
            "ubigeo_inei" => "040111",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "MOLLEBAYA",
            "region" => "AREQUIPA",
            "superficie" => "27",
            "altitud" => "2515",
            "latitud" => "-16.4872",
            "longitud" => "-71.4669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 346,
            "ubigeo_reniec" => "040109",
            "ubigeo_inei" => "040112",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "PAUCARPATA",
            "region" => "AREQUIPA",
            "superficie" => "31",
            "altitud" => "2453",
            "latitud" => "-16.4328",
            "longitud" => "-71.5047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 347,
            "ubigeo_reniec" => "040110",
            "ubigeo_inei" => "040113",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "POCSI",
            "region" => "AREQUIPA",
            "superficie" => "172",
            "altitud" => "3045",
            "latitud" => "-16.5178",
            "longitud" => "-71.3897"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 348,
            "ubigeo_reniec" => "040111",
            "ubigeo_inei" => "040114",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "POLOBAYA",
            "region" => "AREQUIPA",
            "superficie" => "442",
            "altitud" => "3116",
            "latitud" => "-16.5658",
            "longitud" => "-71.3683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 349,
            "ubigeo_reniec" => "040112",
            "ubigeo_inei" => "040115",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "QUEQUEŃA",
            "region" => "AREQUIPA",
            "superficie" => "35",
            "altitud" => "2561",
            "latitud" => "-16.5572",
            "longitud" => "-71.4514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 350,
            "ubigeo_reniec" => "040113",
            "ubigeo_inei" => "040116",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SABANDIA",
            "region" => "AREQUIPA",
            "superficie" => "37",
            "altitud" => "2441",
            "latitud" => "-16.4569",
            "longitud" => "-71.4947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 351,
            "ubigeo_reniec" => "040114",
            "ubigeo_inei" => "040117",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SACHACA",
            "region" => "AREQUIPA",
            "superficie" => "27",
            "altitud" => "2300",
            "latitud" => "-16.4244",
            "longitud" => "-71.5664"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 352,
            "ubigeo_reniec" => "040115",
            "ubigeo_inei" => "040118",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SAN JUAN DE SIGUAS",
            "region" => "AREQUIPA",
            "superficie" => "93",
            "altitud" => "1281",
            "latitud" => "-16.3461",
            "longitud" => "-72.1283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 353,
            "ubigeo_reniec" => "040116",
            "ubigeo_inei" => "040119",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SAN JUAN DE TARUCANI",
            "region" => "AREQUIPA",
            "superficie" => "2265",
            "altitud" => "4217",
            "latitud" => "-16.1836",
            "longitud" => "-71.0619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 354,
            "ubigeo_reniec" => "040117",
            "ubigeo_inei" => "040120",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SANTA ISABEL DE SIGUAS",
            "region" => "AREQUIPA",
            "superficie" => "188",
            "altitud" => "1390",
            "latitud" => "-16.3208",
            "longitud" => "-72.0989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 355,
            "ubigeo_reniec" => "040118",
            "ubigeo_inei" => "040121",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SANTA RITA DE SIGUAS",
            "region" => "AREQUIPA",
            "superficie" => "370",
            "altitud" => "1283",
            "latitud" => "-16.4936",
            "longitud" => "-72.0947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 356,
            "ubigeo_reniec" => "040119",
            "ubigeo_inei" => "040122",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "SOCABAYA",
            "region" => "AREQUIPA",
            "superficie" => "19",
            "altitud" => "2352",
            "latitud" => "-16.4675",
            "longitud" => "-71.5286"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 357,
            "ubigeo_reniec" => "040120",
            "ubigeo_inei" => "040123",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "TIABAYA",
            "region" => "AREQUIPA",
            "superficie" => "32",
            "altitud" => "2218",
            "latitud" => "-16.4494",
            "longitud" => "-71.5917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 358,
            "ubigeo_reniec" => "040121",
            "ubigeo_inei" => "040124",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "UCHUMAYO",
            "region" => "AREQUIPA",
            "superficie" => "227",
            "altitud" => "1976",
            "latitud" => "-16.4253",
            "longitud" => "-71.6725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 359,
            "ubigeo_reniec" => "040122",
            "ubigeo_inei" => "040125",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "VITOR",
            "region" => "AREQUIPA",
            "superficie" => "1544",
            "altitud" => "1189",
            "latitud" => "-16.4658",
            "longitud" => "-71.9358"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 360,
            "ubigeo_reniec" => "040123",
            "ubigeo_inei" => "040126",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "YANAHUARA",
            "region" => "AREQUIPA",
            "superficie" => "2",
            "altitud" => "2402",
            "latitud" => "-16.3819",
            "longitud" => "-71.5364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 361,
            "ubigeo_reniec" => "040124",
            "ubigeo_inei" => "040127",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "YARABAMBA",
            "region" => "AREQUIPA",
            "superficie" => "492",
            "altitud" => "2467",
            "latitud" => "-16.5467",
            "longitud" => "-71.4756"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 362,
            "ubigeo_reniec" => "040125",
            "ubigeo_inei" => "040128",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "YURA",
            "region" => "AREQUIPA",
            "superficie" => "1943",
            "altitud" => "2495",
            "latitud" => "-16.2469",
            "longitud" => "-71.7064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 363,
            "ubigeo_reniec" => "040129",
            "ubigeo_inei" => "040129",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0401",
            "provincia" => "AREQUIPA",
            "distrito" => "JOSE LUIS BUSTAMANTE Y RIVERO",
            "region" => "AREQUIPA",
            "superficie" => "11",
            "altitud" => "2389",
            "latitud" => "-16.4267",
            "longitud" => "-71.5239"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 364,
            "ubigeo_reniec" => "040301",
            "ubigeo_inei" => "040201",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "CAMANA",
            "region" => "AREQUIPA",
            "superficie" => "12",
            "altitud" => "20",
            "latitud" => "-16.6247",
            "longitud" => "-72.7114"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 365,
            "ubigeo_reniec" => "040302",
            "ubigeo_inei" => "040202",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "JOSE MARIA QUIMPER",
            "region" => "AREQUIPA",
            "superficie" => "17",
            "altitud" => "35",
            "latitud" => "-16.6019",
            "longitud" => "-72.7272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 366,
            "ubigeo_reniec" => "040303",
            "ubigeo_inei" => "040203",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "MARIANO NICOLAS VALCARCEL",
            "region" => "AREQUIPA",
            "superficie" => "558",
            "altitud" => "362",
            "latitud" => "-16.0314",
            "longitud" => "-73.1744"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 367,
            "ubigeo_reniec" => "040304",
            "ubigeo_inei" => "040204",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "MARISCAL CACERES",
            "region" => "AREQUIPA",
            "superficie" => "579",
            "altitud" => "18",
            "latitud" => "-16.6197",
            "longitud" => "-72.7361"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 368,
            "ubigeo_reniec" => "040305",
            "ubigeo_inei" => "040205",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "NICOLAS DE PIEROLA",
            "region" => "AREQUIPA",
            "superficie" => "392",
            "altitud" => "71",
            "latitud" => "-16.5731",
            "longitud" => "-72.7158"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 369,
            "ubigeo_reniec" => "040306",
            "ubigeo_inei" => "040206",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "OCOŃA",
            "region" => "AREQUIPA",
            "superficie" => "1415",
            "altitud" => "16",
            "latitud" => "-16.4317",
            "longitud" => "-73.105"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 370,
            "ubigeo_reniec" => "040307",
            "ubigeo_inei" => "040207",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "QUILCA",
            "region" => "AREQUIPA",
            "superficie" => "912",
            "altitud" => "82",
            "latitud" => "-16.7169",
            "longitud" => "-72.4256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 371,
            "ubigeo_reniec" => "040308",
            "ubigeo_inei" => "040208",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0402",
            "provincia" => "CAMANA",
            "distrito" => "SAMUEL PASTOR",
            "region" => "AREQUIPA",
            "superficie" => "113",
            "altitud" => "21",
            "latitud" => "-16.6136",
            "longitud" => "-72.6992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 372,
            "ubigeo_reniec" => "040401",
            "ubigeo_inei" => "040301",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "CARAVELI",
            "region" => "AREQUIPA",
            "superficie" => "728",
            "altitud" => "1811",
            "latitud" => "-15.7725",
            "longitud" => "-73.3658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 373,
            "ubigeo_reniec" => "040402",
            "ubigeo_inei" => "040302",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "ACARI",
            "region" => "AREQUIPA",
            "superficie" => "799",
            "altitud" => "171",
            "latitud" => "-15.4356",
            "longitud" => "-74.6164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 374,
            "ubigeo_reniec" => "040403",
            "ubigeo_inei" => "040303",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "ATICO",
            "region" => "AREQUIPA",
            "superficie" => "3146",
            "altitud" => "101",
            "latitud" => "-16.2083",
            "longitud" => "-73.6236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 375,
            "ubigeo_reniec" => "040404",
            "ubigeo_inei" => "040304",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "ATIQUIPA",
            "region" => "AREQUIPA",
            "superficie" => "424",
            "altitud" => "330",
            "latitud" => "-15.7961",
            "longitud" => "-74.3636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 376,
            "ubigeo_reniec" => "040405",
            "ubigeo_inei" => "040305",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "BELLA UNION",
            "region" => "AREQUIPA",
            "superficie" => "1588",
            "altitud" => "218",
            "latitud" => "-15.4506",
            "longitud" => "-74.6583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 377,
            "ubigeo_reniec" => "040406",
            "ubigeo_inei" => "040306",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "CAHUACHO",
            "region" => "AREQUIPA",
            "superficie" => "1412",
            "altitud" => "3423",
            "latitud" => "-15.5028",
            "longitud" => "-73.4797"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 378,
            "ubigeo_reniec" => "040407",
            "ubigeo_inei" => "040307",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "CHALA",
            "region" => "AREQUIPA",
            "superficie" => "378",
            "altitud" => "21",
            "latitud" => "-15.8656",
            "longitud" => "-74.2475"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 379,
            "ubigeo_reniec" => "040408",
            "ubigeo_inei" => "040308",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "CHAPARRA",
            "region" => "AREQUIPA",
            "superficie" => "1473",
            "altitud" => "611",
            "latitud" => "-15.8053",
            "longitud" => "-73.9669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 380,
            "ubigeo_reniec" => "040409",
            "ubigeo_inei" => "040309",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "HUANUHUANU",
            "region" => "AREQUIPA",
            "superficie" => "709",
            "altitud" => "972",
            "latitud" => "-15.6589",
            "longitud" => "-74.0914"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 381,
            "ubigeo_reniec" => "040410",
            "ubigeo_inei" => "040310",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "JAQUI",
            "region" => "AREQUIPA",
            "superficie" => "425",
            "altitud" => "271",
            "latitud" => "-15.4792",
            "longitud" => "-74.4436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 382,
            "ubigeo_reniec" => "040411",
            "ubigeo_inei" => "040311",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "LOMAS",
            "region" => "AREQUIPA",
            "superficie" => "453",
            "altitud" => "26",
            "latitud" => "-15.5697",
            "longitud" => "-74.8514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 383,
            "ubigeo_reniec" => "040412",
            "ubigeo_inei" => "040312",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "QUICACHA",
            "region" => "AREQUIPA",
            "superficie" => "1048",
            "altitud" => "1836",
            "latitud" => "-15.625",
            "longitud" => "-73.7983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 384,
            "ubigeo_reniec" => "040413",
            "ubigeo_inei" => "040313",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0403",
            "provincia" => "CARAVELI",
            "distrito" => "YAUCA",
            "region" => "AREQUIPA",
            "superficie" => "556",
            "altitud" => "31",
            "latitud" => "-15.6619",
            "longitud" => "-74.5272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 385,
            "ubigeo_reniec" => "040501",
            "ubigeo_inei" => "040401",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "APLAO",
            "region" => "AREQUIPA",
            "superficie" => "640",
            "altitud" => "625",
            "latitud" => "-16.0761",
            "longitud" => "-72.4922"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 386,
            "ubigeo_reniec" => "040502",
            "ubigeo_inei" => "040402",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "ANDAGUA",
            "region" => "AREQUIPA",
            "superficie" => "481",
            "altitud" => "3594",
            "latitud" => "-15.4989",
            "longitud" => "-72.3561"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 387,
            "ubigeo_reniec" => "040503",
            "ubigeo_inei" => "040403",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "AYO",
            "region" => "AREQUIPA",
            "superficie" => "328",
            "altitud" => "2003",
            "latitud" => "-15.6828",
            "longitud" => "-72.2719"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 388,
            "ubigeo_reniec" => "040504",
            "ubigeo_inei" => "040404",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "CHACHAS",
            "region" => "AREQUIPA",
            "superficie" => "1190",
            "altitud" => "3117",
            "latitud" => "-15.5014",
            "longitud" => "-72.2706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 389,
            "ubigeo_reniec" => "040505",
            "ubigeo_inei" => "040405",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "CHILCAYMARCA",
            "region" => "AREQUIPA",
            "superficie" => "181",
            "altitud" => "3867",
            "latitud" => "-15.2861",
            "longitud" => "-72.3767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 390,
            "ubigeo_reniec" => "040506",
            "ubigeo_inei" => "040406",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "CHOCO",
            "region" => "AREQUIPA",
            "superficie" => "904",
            "altitud" => "2418",
            "latitud" => "-15.5767",
            "longitud" => "-72.1289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 391,
            "ubigeo_reniec" => "040507",
            "ubigeo_inei" => "040407",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "HUANCARQUI",
            "region" => "AREQUIPA",
            "superficie" => "804",
            "altitud" => "620",
            "latitud" => "-16.0961",
            "longitud" => "-72.4722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 392,
            "ubigeo_reniec" => "040508",
            "ubigeo_inei" => "040408",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "MACHAGUAY",
            "region" => "AREQUIPA",
            "superficie" => "247",
            "altitud" => "3131",
            "latitud" => "-15.6503",
            "longitud" => "-72.5061"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 393,
            "ubigeo_reniec" => "040509",
            "ubigeo_inei" => "040409",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "ORCOPAMPA",
            "region" => "AREQUIPA",
            "superficie" => "724",
            "altitud" => "3818",
            "latitud" => "-15.2625",
            "longitud" => "-72.3419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 394,
            "ubigeo_reniec" => "040510",
            "ubigeo_inei" => "040410",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "PAMPACOLCA",
            "region" => "AREQUIPA",
            "superficie" => "205",
            "altitud" => "2922",
            "latitud" => "-15.7133",
            "longitud" => "-72.5739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 395,
            "ubigeo_reniec" => "040511",
            "ubigeo_inei" => "040411",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "TIPAN",
            "region" => "AREQUIPA",
            "superficie" => "58",
            "altitud" => "1939",
            "latitud" => "-15.7231",
            "longitud" => "-72.5019"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 396,
            "ubigeo_reniec" => "040513",
            "ubigeo_inei" => "040412",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "UŃON",
            "region" => "AREQUIPA",
            "superficie" => "297",
            "altitud" => "2727",
            "latitud" => "-15.7286",
            "longitud" => "-72.4322"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 397,
            "ubigeo_reniec" => "040512",
            "ubigeo_inei" => "040413",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "URACA",
            "region" => "AREQUIPA",
            "superficie" => "714",
            "altitud" => "452",
            "latitud" => "-16.2239",
            "longitud" => "-72.4697"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 398,
            "ubigeo_reniec" => "040514",
            "ubigeo_inei" => "040414",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0404",
            "provincia" => "CASTILLA",
            "distrito" => "VIRACO",
            "region" => "AREQUIPA",
            "superficie" => "141",
            "altitud" => "3210",
            "latitud" => "-15.6583",
            "longitud" => "-72.525"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 399,
            "ubigeo_reniec" => "040201",
            "ubigeo_inei" => "040501",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "CHIVAY",
            "region" => "AREQUIPA",
            "superficie" => "241",
            "altitud" => "3683",
            "latitud" => "-15.6403",
            "longitud" => "-71.6036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 400,
            "ubigeo_reniec" => "040202",
            "ubigeo_inei" => "040502",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "ACHOMA",
            "region" => "AREQUIPA",
            "superficie" => "394",
            "altitud" => "3524",
            "latitud" => "-15.66",
            "longitud" => "-71.7036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 401,
            "ubigeo_reniec" => "040203",
            "ubigeo_inei" => "040503",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "CABANACONDE",
            "region" => "AREQUIPA",
            "superficie" => "461",
            "altitud" => "3295",
            "latitud" => "-15.62",
            "longitud" => "-71.9819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 402,
            "ubigeo_reniec" => "040205",
            "ubigeo_inei" => "040504",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "CALLALLI",
            "region" => "AREQUIPA",
            "superficie" => "1485",
            "altitud" => "3887",
            "latitud" => "-15.5064",
            "longitud" => "-71.4447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 403,
            "ubigeo_reniec" => "040204",
            "ubigeo_inei" => "040505",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "CAYLLOMA",
            "region" => "AREQUIPA",
            "superficie" => "1499",
            "altitud" => "4361",
            "latitud" => "-15.1889",
            "longitud" => "-71.7733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 404,
            "ubigeo_reniec" => "040206",
            "ubigeo_inei" => "040506",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "COPORAQUE",
            "region" => "AREQUIPA",
            "superficie" => "112",
            "altitud" => "3600",
            "latitud" => "-15.6272",
            "longitud" => "-71.6461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 405,
            "ubigeo_reniec" => "040207",
            "ubigeo_inei" => "040507",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "HUAMBO",
            "region" => "AREQUIPA",
            "superficie" => "706",
            "altitud" => "3309",
            "latitud" => "-15.7294",
            "longitud" => "-72.1097"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 406,
            "ubigeo_reniec" => "040208",
            "ubigeo_inei" => "040508",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "HUANCA",
            "region" => "AREQUIPA",
            "superficie" => "391",
            "altitud" => "3073",
            "latitud" => "-16.0336",
            "longitud" => "-71.8781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 407,
            "ubigeo_reniec" => "040209",
            "ubigeo_inei" => "040509",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "ICHUPAMPA",
            "region" => "AREQUIPA",
            "superficie" => "75",
            "altitud" => "3422",
            "latitud" => "-15.65",
            "longitud" => "-71.6867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 408,
            "ubigeo_reniec" => "040210",
            "ubigeo_inei" => "040510",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "LARI",
            "region" => "AREQUIPA",
            "superficie" => "384",
            "altitud" => "3373",
            "latitud" => "-15.6183",
            "longitud" => "-71.7725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 409,
            "ubigeo_reniec" => "040211",
            "ubigeo_inei" => "040511",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "LLUTA",
            "region" => "AREQUIPA",
            "superficie" => "1226",
            "altitud" => "3031",
            "latitud" => "-16.0156",
            "longitud" => "-72.0139"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 410,
            "ubigeo_reniec" => "040212",
            "ubigeo_inei" => "040512",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "MACA",
            "region" => "AREQUIPA",
            "superficie" => "227",
            "altitud" => "3287",
            "latitud" => "-15.6414",
            "longitud" => "-71.7683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 411,
            "ubigeo_reniec" => "040213",
            "ubigeo_inei" => "040513",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "MADRIGAL",
            "region" => "AREQUIPA",
            "superficie" => "160",
            "altitud" => "3300",
            "latitud" => "-15.6083",
            "longitud" => "-71.8075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 412,
            "ubigeo_reniec" => "040214",
            "ubigeo_inei" => "040514",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "SAN ANTONIO DE CHUCA",
            "region" => "AREQUIPA",
            "superficie" => "1531",
            "altitud" => "4470",
            "latitud" => "-15.8389",
            "longitud" => "-71.0906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 413,
            "ubigeo_reniec" => "040215",
            "ubigeo_inei" => "040515",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "SIBAYO",
            "region" => "AREQUIPA",
            "superficie" => "286",
            "altitud" => "3836",
            "latitud" => "-15.4861",
            "longitud" => "-71.4569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 414,
            "ubigeo_reniec" => "040216",
            "ubigeo_inei" => "040516",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "TAPAY",
            "region" => "AREQUIPA",
            "superficie" => "420",
            "altitud" => "3011",
            "latitud" => "-15.5775",
            "longitud" => "-71.9397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 415,
            "ubigeo_reniec" => "040217",
            "ubigeo_inei" => "040517",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "TISCO",
            "region" => "AREQUIPA",
            "superficie" => "1445",
            "altitud" => "4195",
            "latitud" => "-15.3469",
            "longitud" => "-71.4464"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 416,
            "ubigeo_reniec" => "040218",
            "ubigeo_inei" => "040518",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "TUTI",
            "region" => "AREQUIPA",
            "superficie" => "242",
            "altitud" => "3831",
            "latitud" => "-15.5331",
            "longitud" => "-71.5531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 417,
            "ubigeo_reniec" => "040219",
            "ubigeo_inei" => "040519",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "YANQUE",
            "region" => "AREQUIPA",
            "superficie" => "1109",
            "altitud" => "3468",
            "latitud" => "-15.6483",
            "longitud" => "-71.6608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 418,
            "ubigeo_reniec" => "040220",
            "ubigeo_inei" => "040520",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0405",
            "provincia" => "CAYLLOMA",
            "distrito" => "MAJES",
            "region" => "AREQUIPA",
            "superficie" => "1626",
            "altitud" => "1392",
            "latitud" => "-16.3533",
            "longitud" => "-72.2472"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 419,
            "ubigeo_reniec" => "040601",
            "ubigeo_inei" => "040601",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "CHUQUIBAMBA",
            "region" => "AREQUIPA",
            "superficie" => "1255",
            "altitud" => "2916",
            "latitud" => "-15.8394",
            "longitud" => "-72.6517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 420,
            "ubigeo_reniec" => "040602",
            "ubigeo_inei" => "040602",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "ANDARAY",
            "region" => "AREQUIPA",
            "superficie" => "848",
            "altitud" => "3047",
            "latitud" => "-15.7972",
            "longitud" => "-72.8608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 421,
            "ubigeo_reniec" => "040603",
            "ubigeo_inei" => "040603",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "CAYARANI",
            "region" => "AREQUIPA",
            "superficie" => "1396",
            "altitud" => "3951",
            "latitud" => "-14.6719",
            "longitud" => "-72.0219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 422,
            "ubigeo_reniec" => "040604",
            "ubigeo_inei" => "040604",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "CHICHAS",
            "region" => "AREQUIPA",
            "superficie" => "392",
            "altitud" => "2174",
            "latitud" => "-15.5478",
            "longitud" => "-72.9186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 423,
            "ubigeo_reniec" => "040605",
            "ubigeo_inei" => "040605",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "IRAY",
            "region" => "AREQUIPA",
            "superficie" => "248",
            "altitud" => "2469",
            "latitud" => "-15.8536",
            "longitud" => "-72.63"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 424,
            "ubigeo_reniec" => "040608",
            "ubigeo_inei" => "040606",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "RIO GRANDE",
            "region" => "AREQUIPA",
            "superficie" => "527",
            "altitud" => "484",
            "latitud" => "-15.94",
            "longitud" => "-73.1311"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 425,
            "ubigeo_reniec" => "040606",
            "ubigeo_inei" => "040607",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "SALAMANCA",
            "region" => "AREQUIPA",
            "superficie" => "1236",
            "altitud" => "3226",
            "latitud" => "-15.5044",
            "longitud" => "-72.8344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 426,
            "ubigeo_reniec" => "040607",
            "ubigeo_inei" => "040608",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0406",
            "provincia" => "CONDESUYOS",
            "distrito" => "YANAQUIHUA",
            "region" => "AREQUIPA",
            "superficie" => "1057",
            "altitud" => "3006",
            "latitud" => "-15.7756",
            "longitud" => "-72.8764"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 427,
            "ubigeo_reniec" => "040701",
            "ubigeo_inei" => "040701",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "MOLLENDO",
            "region" => "AREQUIPA",
            "superficie" => "961",
            "altitud" => "73",
            "latitud" => "-17.0292",
            "longitud" => "-72.0164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 428,
            "ubigeo_reniec" => "040702",
            "ubigeo_inei" => "040702",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "COCACHACRA",
            "region" => "AREQUIPA",
            "superficie" => "1537",
            "altitud" => "114",
            "latitud" => "-17.0911",
            "longitud" => "-71.7739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 429,
            "ubigeo_reniec" => "040703",
            "ubigeo_inei" => "040703",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "DEAN VALDIVIA",
            "region" => "AREQUIPA",
            "superficie" => "134",
            "altitud" => "16",
            "latitud" => "-17.145",
            "longitud" => "-71.8267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 430,
            "ubigeo_reniec" => "040704",
            "ubigeo_inei" => "040704",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "ISLAY",
            "region" => "AREQUIPA",
            "superficie" => "384",
            "altitud" => "110",
            "latitud" => "-17.0008",
            "longitud" => "-72.0975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 431,
            "ubigeo_reniec" => "040705",
            "ubigeo_inei" => "040705",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "MEJIA",
            "region" => "AREQUIPA",
            "superficie" => "101",
            "altitud" => "9",
            "latitud" => "-17.1011",
            "longitud" => "-71.9075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 432,
            "ubigeo_reniec" => "040706",
            "ubigeo_inei" => "040706",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0407",
            "provincia" => "ISLAY",
            "distrito" => "PUNTA DE BOMBON",
            "region" => "AREQUIPA",
            "superficie" => "770",
            "altitud" => "138",
            "latitud" => "-17.1561",
            "longitud" => "-71.7847"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 433,
            "ubigeo_reniec" => "040801",
            "ubigeo_inei" => "040801",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "COTAHUASI",
            "region" => "AREQUIPA",
            "superficie" => "167",
            "altitud" => "2696",
            "latitud" => "-15.2128",
            "longitud" => "-72.8894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 434,
            "ubigeo_reniec" => "040802",
            "ubigeo_inei" => "040802",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "ALCA",
            "region" => "AREQUIPA",
            "superficie" => "193",
            "altitud" => "2759",
            "latitud" => "-15.1342",
            "longitud" => "-72.765"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 435,
            "ubigeo_reniec" => "040803",
            "ubigeo_inei" => "040803",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "CHARCANA",
            "region" => "AREQUIPA",
            "superficie" => "165",
            "altitud" => "3432",
            "latitud" => "-15.2406",
            "longitud" => "-73.0706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 436,
            "ubigeo_reniec" => "040804",
            "ubigeo_inei" => "040804",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "HUAYNACOTAS",
            "region" => "AREQUIPA",
            "superficie" => "933",
            "altitud" => "2612",
            "latitud" => "-15.1747",
            "longitud" => "-72.8497"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 437,
            "ubigeo_reniec" => "040805",
            "ubigeo_inei" => "040805",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "PAMPAMARCA",
            "region" => "AREQUIPA",
            "superficie" => "782",
            "altitud" => "2649",
            "latitud" => "-15.1825",
            "longitud" => "-72.9053"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 438,
            "ubigeo_reniec" => "040806",
            "ubigeo_inei" => "040806",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "PUYCA",
            "region" => "AREQUIPA",
            "superficie" => "1501",
            "altitud" => "3675",
            "latitud" => "-15.0592",
            "longitud" => "-72.6917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 439,
            "ubigeo_reniec" => "040807",
            "ubigeo_inei" => "040807",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "QUECHUALLA",
            "region" => "AREQUIPA",
            "superficie" => "138",
            "altitud" => "1964",
            "latitud" => "-15.2739",
            "longitud" => "-73.0222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 440,
            "ubigeo_reniec" => "040808",
            "ubigeo_inei" => "040808",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "SAYLA",
            "region" => "AREQUIPA",
            "superficie" => "67",
            "altitud" => "3544",
            "latitud" => "-15.32",
            "longitud" => "-73.2219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 441,
            "ubigeo_reniec" => "040809",
            "ubigeo_inei" => "040809",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "TAURIA",
            "region" => "AREQUIPA",
            "superficie" => "315",
            "altitud" => "2850",
            "latitud" => "-15.3542",
            "longitud" => "-73.2325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 442,
            "ubigeo_reniec" => "040810",
            "ubigeo_inei" => "040810",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "TOMEPAMPA",
            "region" => "AREQUIPA",
            "superficie" => "94",
            "altitud" => "2644",
            "latitud" => "-15.1731",
            "longitud" => "-72.8303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 443,
            "ubigeo_reniec" => "040811",
            "ubigeo_inei" => "040811",
            "departamento_inei" => "04",
            "departamento" => "AREQUIPA",
            "provincia_inei" => "0408",
            "provincia" => "LA UNION",
            "distrito" => "TORO",
            "region" => "AREQUIPA",
            "superficie" => "391",
            "altitud" => "2987",
            "latitud" => "-15.2644",
            "longitud" => "-72.9283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 444,
            "ubigeo_reniec" => "050101",
            "ubigeo_inei" => "050101",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "AYACUCHO",
            "region" => "AYACUCHO",
            "superficie" => "83",
            "altitud" => "2797",
            "latitud" => "-13.1603",
            "longitud" => "-74.2253"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 445,
            "ubigeo_reniec" => "050111",
            "ubigeo_inei" => "050102",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "ACOCRO",
            "region" => "AYACUCHO",
            "superficie" => "437",
            "altitud" => "3251",
            "latitud" => "-13.2186",
            "longitud" => "-74.0419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 446,
            "ubigeo_reniec" => "050102",
            "ubigeo_inei" => "050103",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "ACOS VINCHOS",
            "region" => "AYACUCHO",
            "superficie" => "157",
            "altitud" => "2874",
            "latitud" => "-13.1131",
            "longitud" => "-74.1"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 447,
            "ubigeo_reniec" => "050103",
            "ubigeo_inei" => "050104",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "CARMEN ALTO",
            "region" => "AYACUCHO",
            "superficie" => "18",
            "altitud" => "2921",
            "latitud" => "-13.1794",
            "longitud" => "-74.2206"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 448,
            "ubigeo_reniec" => "050104",
            "ubigeo_inei" => "050105",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "CHIARA",
            "region" => "AYACUCHO",
            "superficie" => "462",
            "altitud" => "3540",
            "latitud" => "-13.2728",
            "longitud" => "-74.2058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 449,
            "ubigeo_reniec" => "050113",
            "ubigeo_inei" => "050106",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "OCROS",
            "region" => "AYACUCHO",
            "superficie" => "305",
            "altitud" => "3153",
            "latitud" => "-13.3906",
            "longitud" => "-73.9156"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 450,
            "ubigeo_reniec" => "050114",
            "ubigeo_inei" => "050107",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "PACAYCASA",
            "region" => "AYACUCHO",
            "superficie" => "54",
            "altitud" => "2571",
            "latitud" => "-13.0575",
            "longitud" => "-74.2158"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 451,
            "ubigeo_reniec" => "050105",
            "ubigeo_inei" => "050108",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "QUINUA",
            "region" => "AYACUCHO",
            "superficie" => "117",
            "altitud" => "3301",
            "latitud" => "-13.0492",
            "longitud" => "-74.1392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 452,
            "ubigeo_reniec" => "050106",
            "ubigeo_inei" => "050109",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "SAN JOSE DE TICLLAS",
            "region" => "AYACUCHO",
            "superficie" => "82",
            "altitud" => "3282",
            "latitud" => "-13.1322",
            "longitud" => "-74.3331"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 453,
            "ubigeo_reniec" => "050107",
            "ubigeo_inei" => "050110",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "SAN JUAN BAUTISTA",
            "region" => "AYACUCHO",
            "superficie" => "15",
            "altitud" => "2786",
            "latitud" => "-13.1667",
            "longitud" => "-74.2236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 454,
            "ubigeo_reniec" => "050108",
            "ubigeo_inei" => "050111",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "SANTIAGO DE PISCHA",
            "region" => "AYACUCHO",
            "superficie" => "91",
            "altitud" => "3210",
            "latitud" => "-13.0856",
            "longitud" => "-74.3933"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 455,
            "ubigeo_reniec" => "050112",
            "ubigeo_inei" => "050112",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "SOCOS",
            "region" => "AYACUCHO",
            "superficie" => "172",
            "altitud" => "3368",
            "latitud" => "-13.215",
            "longitud" => "-74.2894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 456,
            "ubigeo_reniec" => "050110",
            "ubigeo_inei" => "050113",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "TAMBILLO",
            "region" => "AYACUCHO",
            "superficie" => "153",
            "altitud" => "3111",
            "latitud" => "-13.1947",
            "longitud" => "-74.1106"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 457,
            "ubigeo_reniec" => "050109",
            "ubigeo_inei" => "050114",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "VINCHOS",
            "region" => "AYACUCHO",
            "superficie" => "929",
            "altitud" => "3155",
            "latitud" => "-13.2417",
            "longitud" => "-74.3542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 458,
            "ubigeo_reniec" => "050115",
            "ubigeo_inei" => "050115",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "JESUS NAZARENO",
            "region" => "AYACUCHO",
            "superficie" => "16",
            "altitud" => "2817",
            "latitud" => "-13.1542",
            "longitud" => "-74.2125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 459,
            "ubigeo_reniec" => "050116",
            "ubigeo_inei" => "050116",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0501",
            "provincia" => "HUAMANGA",
            "distrito" => "ANDRES AVELINO CACERES DORREGARAY",
            "region" => "AYACUCHO",
            "superficie" => "9",
            "altitud" => "2775",
            "latitud" => "-13.1628",
            "longitud" => "-74.2139"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 460,
            "ubigeo_reniec" => "050201",
            "ubigeo_inei" => "050201",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "CANGALLO",
            "region" => "AYACUCHO",
            "superficie" => "187",
            "altitud" => "2574",
            "latitud" => "-13.6292",
            "longitud" => "-74.1439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 461,
            "ubigeo_reniec" => "050204",
            "ubigeo_inei" => "050202",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "CHUSCHI",
            "region" => "AYACUCHO",
            "superficie" => "418",
            "altitud" => "3157",
            "latitud" => "-13.585",
            "longitud" => "-74.3517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 462,
            "ubigeo_reniec" => "050206",
            "ubigeo_inei" => "050203",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "LOS MOROCHUCOS",
            "region" => "AYACUCHO",
            "superficie" => "253",
            "altitud" => "3346",
            "latitud" => "-13.5575",
            "longitud" => "-74.195"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 463,
            "ubigeo_reniec" => "050211",
            "ubigeo_inei" => "050204",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "MARIA PARADO DE BELLIDO",
            "region" => "AYACUCHO",
            "superficie" => "129",
            "altitud" => "3245",
            "latitud" => "-13.6047",
            "longitud" => "-74.2364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 464,
            "ubigeo_reniec" => "050207",
            "ubigeo_inei" => "050205",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "PARAS",
            "region" => "AYACUCHO",
            "superficie" => "789",
            "altitud" => "3354",
            "latitud" => "-13.5525",
            "longitud" => "-74.6278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 465,
            "ubigeo_reniec" => "050208",
            "ubigeo_inei" => "050206",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0502",
            "provincia" => "CANGALLO",
            "distrito" => "TOTOS",
            "region" => "AYACUCHO",
            "superficie" => "113",
            "altitud" => "3333",
            "latitud" => "-13.5675",
            "longitud" => "-74.5228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 466,
            "ubigeo_reniec" => "050801",
            "ubigeo_inei" => "050301",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0503",
            "provincia" => "HUANCA SANCOS",
            "distrito" => "SANCOS",
            "region" => "AYACUCHO",
            "superficie" => "1290",
            "altitud" => "3433",
            "latitud" => "-13.9197",
            "longitud" => "-74.3342"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 467,
            "ubigeo_reniec" => "050804",
            "ubigeo_inei" => "050302",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0503",
            "provincia" => "HUANCA SANCOS",
            "distrito" => "CARAPO",
            "region" => "AYACUCHO",
            "superficie" => "241",
            "altitud" => "3246",
            "latitud" => "-13.8375",
            "longitud" => "-74.3156"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 468,
            "ubigeo_reniec" => "050802",
            "ubigeo_inei" => "050303",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0503",
            "provincia" => "HUANCA SANCOS",
            "distrito" => "SACSAMARCA",
            "region" => "AYACUCHO",
            "superficie" => "673",
            "altitud" => "3463",
            "latitud" => "-13.9428",
            "longitud" => "-74.3128"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 469,
            "ubigeo_reniec" => "050803",
            "ubigeo_inei" => "050304",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0503",
            "provincia" => "HUANCA SANCOS",
            "distrito" => "SANTIAGO DE LUCANAMARCA",
            "region" => "AYACUCHO",
            "superficie" => "658",
            "altitud" => "3512",
            "latitud" => "-13.8439",
            "longitud" => "-74.3722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 470,
            "ubigeo_reniec" => "050301",
            "ubigeo_inei" => "050401",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "HUANTA",
            "region" => "AYACUCHO",
            "superficie" => "193",
            "altitud" => "2685",
            "latitud" => "-12.9394",
            "longitud" => "-74.2481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 471,
            "ubigeo_reniec" => "050302",
            "ubigeo_inei" => "050402",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "AYAHUANCO",
            "region" => "AYACUCHO",
            "superficie" => "298",
            "altitud" => "2699",
            "latitud" => "-12.5939",
            "longitud" => "-74.3308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 472,
            "ubigeo_reniec" => "050303",
            "ubigeo_inei" => "050403",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "HUAMANGUILLA",
            "region" => "AYACUCHO",
            "superficie" => "95",
            "altitud" => "3300",
            "latitud" => "-13.0111",
            "longitud" => "-74.1731"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 473,
            "ubigeo_reniec" => "050304",
            "ubigeo_inei" => "050404",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "IGUAIN",
            "region" => "AYACUCHO",
            "superficie" => "61",
            "altitud" => "3063",
            "latitud" => "-12.9925",
            "longitud" => "-74.2089"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 474,
            "ubigeo_reniec" => "050305",
            "ubigeo_inei" => "050405",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "LURICOCHA",
            "region" => "AYACUCHO",
            "superficie" => "130",
            "altitud" => "2598",
            "latitud" => "-12.8997",
            "longitud" => "-74.2736"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 475,
            "ubigeo_reniec" => "050307",
            "ubigeo_inei" => "050406",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "SANTILLANA",
            "region" => "AYACUCHO",
            "superficie" => "336",
            "altitud" => "3265",
            "latitud" => "-12.7664",
            "longitud" => "-74.2531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 476,
            "ubigeo_reniec" => "050308",
            "ubigeo_inei" => "050407",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "SIVIA",
            "region" => "AYACUCHO",
            "superficie" => "1054",
            "altitud" => "561",
            "latitud" => "-12.5119",
            "longitud" => "-73.8589"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 477,
            "ubigeo_reniec" => "050309",
            "ubigeo_inei" => "050408",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "LLOCHEGUA",
            "region" => "AYACUCHO",
            "superficie" => "469",
            "altitud" => "540",
            "latitud" => "-12.41",
            "longitud" => "-73.9064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 478,
            "ubigeo_reniec" => "050310",
            "ubigeo_inei" => "050409",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "CANAYRE",
            "region" => "AYACUCHO",
            "superficie" => "245",
            "altitud" => "528",
            "latitud" => "-12.2822",
            "longitud" => "-74.0231"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 479,
            "ubigeo_reniec" => "050311",
            "ubigeo_inei" => "050410",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "UCHURACCAY",
            "region" => "AYACUCHO",
            "superficie" => "300",
            "altitud" => "3898",
            "latitud" => "-12.7614",
            "longitud" => "-74.1456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 480,
            "ubigeo_reniec" => "050312",
            "ubigeo_inei" => "050411",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "PUCACOLPA",
            "region" => "AYACUCHO",
            "superficie" => "562",
            "altitud" => "3493",
            "latitud" => "-12.4206",
            "longitud" => "-74.4892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 481,
            "ubigeo_reniec" => "050313",
            "ubigeo_inei" => "050412",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "CHACA",
            "region" => "AYACUCHO",
            "superficie" => "124",
            "altitud" => "3400",
            "latitud" => "-12.7842",
            "longitud" => "-74.2058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 482,
            "ubigeo_reniec" => "050401",
            "ubigeo_inei" => "050501",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "SAN MIGUEL",
            "region" => "AYACUCHO",
            "superficie" => "458",
            "altitud" => "2696",
            "latitud" => "-13.0128",
            "longitud" => "-73.9811"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 483,
            "ubigeo_reniec" => "050402",
            "ubigeo_inei" => "050502",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "ANCO",
            "region" => "AYACUCHO",
            "superficie" => "803",
            "altitud" => "3213",
            "latitud" => "-13.0603",
            "longitud" => "-73.7069"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 484,
            "ubigeo_reniec" => "050403",
            "ubigeo_inei" => "050503",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "AYNA",
            "region" => "AYACUCHO",
            "superficie" => "291",
            "altitud" => "627",
            "latitud" => "-12.6242",
            "longitud" => "-73.7894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 485,
            "ubigeo_reniec" => "050404",
            "ubigeo_inei" => "050504",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "CHILCAS",
            "region" => "AYACUCHO",
            "superficie" => "157",
            "altitud" => "3192",
            "latitud" => "-13.1711",
            "longitud" => "-73.9064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 486,
            "ubigeo_reniec" => "050405",
            "ubigeo_inei" => "050505",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "CHUNGUI",
            "region" => "AYACUCHO",
            "superficie" => "1093",
            "altitud" => "3506",
            "latitud" => "-13.2222",
            "longitud" => "-73.6217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 487,
            "ubigeo_reniec" => "050407",
            "ubigeo_inei" => "050506",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "LUIS CARRANZA",
            "region" => "AYACUCHO",
            "superficie" => "136",
            "altitud" => "2962",
            "latitud" => "-13.2289",
            "longitud" => "-73.8944"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 488,
            "ubigeo_reniec" => "050408",
            "ubigeo_inei" => "050507",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "SANTA ROSA",
            "region" => "AYACUCHO",
            "superficie" => "397",
            "altitud" => "729",
            "latitud" => "-12.6878",
            "longitud" => "-73.7358"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 489,
            "ubigeo_reniec" => "050406",
            "ubigeo_inei" => "050508",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "TAMBO",
            "region" => "AYACUCHO",
            "superficie" => "314",
            "altitud" => "3237",
            "latitud" => "-12.9481",
            "longitud" => "-74.0208"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 490,
            "ubigeo_reniec" => "050409",
            "ubigeo_inei" => "050509",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "SAMUGARI",
            "region" => "AYACUCHO",
            "superficie" => "387",
            "altitud" => "754",
            "latitud" => "-12.7683",
            "longitud" => "-73.6556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 491,
            "ubigeo_reniec" => "050410",
            "ubigeo_inei" => "050510",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "ANCHIHUAY",
            "region" => "AYACUCHO",
            "superficie" => "272",
            "altitud" => "769",
            "latitud" => "-12.8636",
            "longitud" => "-73.5825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 492,
            "ubigeo_reniec" => "050411",
            "ubigeo_inei" => "050511",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "ORONCCOY",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "3719",
            "latitud" => "-13.3808",
            "longitud" => "-73.4361"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 493,
            "ubigeo_reniec" => "050501",
            "ubigeo_inei" => "050601",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "PUQUIO",
            "region" => "AYACUCHO",
            "superficie" => "866",
            "altitud" => "3234",
            "latitud" => "-14.6942",
            "longitud" => "-74.1244"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 494,
            "ubigeo_reniec" => "050502",
            "ubigeo_inei" => "050602",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "AUCARA",
            "region" => "AYACUCHO",
            "superficie" => "904",
            "altitud" => "3236",
            "latitud" => "-14.2811",
            "longitud" => "-73.9753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 495,
            "ubigeo_reniec" => "050503",
            "ubigeo_inei" => "050603",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "CABANA",
            "region" => "AYACUCHO",
            "superficie" => "403",
            "altitud" => "3298",
            "latitud" => "-14.2883",
            "longitud" => "-73.9672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 496,
            "ubigeo_reniec" => "050504",
            "ubigeo_inei" => "050604",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "CARMEN SALCEDO",
            "region" => "AYACUCHO",
            "superficie" => "474",
            "altitud" => "3478",
            "latitud" => "-14.3878",
            "longitud" => "-73.9619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 497,
            "ubigeo_reniec" => "050506",
            "ubigeo_inei" => "050605",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "CHAVIŃA",
            "region" => "AYACUCHO",
            "superficie" => "399",
            "altitud" => "3338",
            "latitud" => "-14.9794",
            "longitud" => "-73.8375"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 498,
            "ubigeo_reniec" => "050508",
            "ubigeo_inei" => "050606",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "CHIPAO",
            "region" => "AYACUCHO",
            "superficie" => "1167",
            "altitud" => "3440",
            "latitud" => "-14.3658",
            "longitud" => "-73.8761"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 499,
            "ubigeo_reniec" => "050510",
            "ubigeo_inei" => "050607",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "HUAC-HUAS",
            "region" => "AYACUCHO",
            "superficie" => "309",
            "altitud" => "3189",
            "latitud" => "-14.1317",
            "longitud" => "-74.9422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 500,
            "ubigeo_reniec" => "050511",
            "ubigeo_inei" => "050608",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "LARAMATE",
            "region" => "AYACUCHO",
            "superficie" => "786",
            "altitud" => "3078",
            "latitud" => "-14.2861",
            "longitud" => "-74.8425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 501,
            "ubigeo_reniec" => "050512",
            "ubigeo_inei" => "050609",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "LEONCIO PRADO",
            "region" => "AYACUCHO",
            "superficie" => "1054",
            "altitud" => "2696",
            "latitud" => "-14.7289",
            "longitud" => "-74.6703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 502,
            "ubigeo_reniec" => "050514",
            "ubigeo_inei" => "050610",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "LLAUTA",
            "region" => "AYACUCHO",
            "superficie" => "482",
            "altitud" => "2666",
            "latitud" => "-14.2436",
            "longitud" => "-74.9203"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 503,
            "ubigeo_reniec" => "050513",
            "ubigeo_inei" => "050611",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "LUCANAS",
            "region" => "AYACUCHO",
            "superficie" => "1206",
            "altitud" => "3385",
            "latitud" => "-14.6225",
            "longitud" => "-74.2331"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 504,
            "ubigeo_reniec" => "050516",
            "ubigeo_inei" => "050612",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "OCAŃA",
            "region" => "AYACUCHO",
            "superficie" => "848",
            "altitud" => "2650",
            "latitud" => "-14.3989",
            "longitud" => "-74.8228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 505,
            "ubigeo_reniec" => "050517",
            "ubigeo_inei" => "050613",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "OTOCA",
            "region" => "AYACUCHO",
            "superficie" => "720",
            "altitud" => "1883",
            "latitud" => "-14.49",
            "longitud" => "-74.6867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 506,
            "ubigeo_reniec" => "050529",
            "ubigeo_inei" => "050614",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SAISA",
            "region" => "AYACUCHO",
            "superficie" => "585",
            "altitud" => "3070",
            "latitud" => "-14.9403",
            "longitud" => "-74.4172"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 507,
            "ubigeo_reniec" => "050532",
            "ubigeo_inei" => "050615",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SAN CRISTOBAL",
            "region" => "AYACUCHO",
            "superficie" => "392",
            "altitud" => "3587",
            "latitud" => "-14.7431",
            "longitud" => "-74.2222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 508,
            "ubigeo_reniec" => "050521",
            "ubigeo_inei" => "050616",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SAN JUAN",
            "region" => "AYACUCHO",
            "superficie" => "45",
            "altitud" => "3290",
            "latitud" => "-14.6517",
            "longitud" => "-74.1992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 509,
            "ubigeo_reniec" => "050522",
            "ubigeo_inei" => "050617",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SAN PEDRO",
            "region" => "AYACUCHO",
            "superficie" => "733",
            "altitud" => "3115",
            "latitud" => "-14.7669",
            "longitud" => "-74.0978"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 510,
            "ubigeo_reniec" => "050531",
            "ubigeo_inei" => "050618",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SAN PEDRO DE PALCO",
            "region" => "AYACUCHO",
            "superficie" => "532",
            "altitud" => "2538",
            "latitud" => "-14.4119",
            "longitud" => "-74.6514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 511,
            "ubigeo_reniec" => "050520",
            "ubigeo_inei" => "050619",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SANCOS",
            "region" => "AYACUCHO",
            "superficie" => "1521",
            "altitud" => "2826",
            "latitud" => "-15.0628",
            "longitud" => "-73.9522"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 512,
            "ubigeo_reniec" => "050524",
            "ubigeo_inei" => "050620",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SANTA ANA DE HUAYCAHUACHO",
            "region" => "AYACUCHO",
            "superficie" => "51",
            "altitud" => "2984",
            "latitud" => "-14.2264",
            "longitud" => "-73.9567"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 513,
            "ubigeo_reniec" => "050525",
            "ubigeo_inei" => "050621",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0506",
            "provincia" => "LUCANAS",
            "distrito" => "SANTA LUCIA",
            "region" => "AYACUCHO",
            "superficie" => "1019",
            "altitud" => "2252",
            "latitud" => "-14.9783",
            "longitud" => "-74.5239"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 514,
            "ubigeo_reniec" => "050601",
            "ubigeo_inei" => "050701",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "CORACORA",
            "region" => "AYACUCHO",
            "superficie" => "1399",
            "altitud" => "3166",
            "latitud" => "-15.0169",
            "longitud" => "-73.7814"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 515,
            "ubigeo_reniec" => "050605",
            "ubigeo_inei" => "050702",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "CHUMPI",
            "region" => "AYACUCHO",
            "superficie" => "366",
            "altitud" => "3226",
            "latitud" => "-15.0944",
            "longitud" => "-73.7481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 516,
            "ubigeo_reniec" => "050604",
            "ubigeo_inei" => "050703",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "CORONEL CASTAŃEDA",
            "region" => "AYACUCHO",
            "superficie" => "1108",
            "altitud" => "3622",
            "latitud" => "-14.8072",
            "longitud" => "-73.2822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 517,
            "ubigeo_reniec" => "050608",
            "ubigeo_inei" => "050704",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "PACAPAUSA",
            "region" => "AYACUCHO",
            "superficie" => "144",
            "altitud" => "2821",
            "latitud" => "-14.9503",
            "longitud" => "-73.3678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 518,
            "ubigeo_reniec" => "050611",
            "ubigeo_inei" => "050705",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "PULLO",
            "region" => "AYACUCHO",
            "superficie" => "1562",
            "altitud" => "3037",
            "latitud" => "-15.21",
            "longitud" => "-73.8267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 519,
            "ubigeo_reniec" => "050612",
            "ubigeo_inei" => "050706",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "PUYUSCA",
            "region" => "AYACUCHO",
            "superficie" => "701",
            "altitud" => "3307",
            "latitud" => "-15.2469",
            "longitud" => "-73.5694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 520,
            "ubigeo_reniec" => "050615",
            "ubigeo_inei" => "050707",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "SAN FRANCISCO DE RAVACAYCO",
            "region" => "AYACUCHO",
            "superficie" => "100",
            "altitud" => "2833",
            "latitud" => "-14.9969",
            "longitud" => "-73.3511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 521,
            "ubigeo_reniec" => "050616",
            "ubigeo_inei" => "050708",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0507",
            "provincia" => "PARINACOCHAS",
            "distrito" => "UPAHUACHO",
            "region" => "AYACUCHO",
            "superficie" => "587",
            "altitud" => "3341",
            "latitud" => "-14.9072",
            "longitud" => "-73.3975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 522,
            "ubigeo_reniec" => "051001",
            "ubigeo_inei" => "050801",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "PAUSA",
            "region" => "AYACUCHO",
            "superficie" => "243",
            "altitud" => "2536",
            "latitud" => "-15.2786",
            "longitud" => "-73.3442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 523,
            "ubigeo_reniec" => "051002",
            "ubigeo_inei" => "050802",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "COLTA",
            "region" => "AYACUCHO",
            "superficie" => "277",
            "altitud" => "3267",
            "latitud" => "-15.1628",
            "longitud" => "-73.2939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 524,
            "ubigeo_reniec" => "051003",
            "ubigeo_inei" => "050803",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "CORCULLA",
            "region" => "AYACUCHO",
            "superficie" => "97",
            "altitud" => "3503",
            "latitud" => "-15.2628",
            "longitud" => "-73.2003"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 525,
            "ubigeo_reniec" => "051004",
            "ubigeo_inei" => "050804",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "LAMPA",
            "region" => "AYACUCHO",
            "superficie" => "289",
            "altitud" => "2809",
            "latitud" => "-15.185",
            "longitud" => "-73.3492"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 526,
            "ubigeo_reniec" => "051005",
            "ubigeo_inei" => "050805",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "MARCABAMBA",
            "region" => "AYACUCHO",
            "superficie" => "123",
            "altitud" => "2615",
            "latitud" => "-15.1497",
            "longitud" => "-73.3417"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 527,
            "ubigeo_reniec" => "051006",
            "ubigeo_inei" => "050806",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "OYOLO",
            "region" => "AYACUCHO",
            "superficie" => "820",
            "altitud" => "3410",
            "latitud" => "-15.18",
            "longitud" => "-73.1853"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 528,
            "ubigeo_reniec" => "051007",
            "ubigeo_inei" => "050807",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "PARARCA",
            "region" => "AYACUCHO",
            "superficie" => "58",
            "altitud" => "3047",
            "latitud" => "-15.2175",
            "longitud" => "-73.4647"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 529,
            "ubigeo_reniec" => "051008",
            "ubigeo_inei" => "050808",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "SAN JAVIER DE ALPABAMBA",
            "region" => "AYACUCHO",
            "superficie" => "93",
            "altitud" => "2628",
            "latitud" => "-15.0567",
            "longitud" => "-73.3222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 530,
            "ubigeo_reniec" => "051009",
            "ubigeo_inei" => "050809",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "SAN JOSE DE USHUA",
            "region" => "AYACUCHO",
            "superficie" => "17",
            "altitud" => "3034",
            "latitud" => "-15.225",
            "longitud" => "-73.2267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 531,
            "ubigeo_reniec" => "051010",
            "ubigeo_inei" => "050810",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0508",
            "provincia" => "PAUCAR DEL SARA SARA",
            "distrito" => "SARA SARA",
            "region" => "AYACUCHO",
            "superficie" => "80",
            "altitud" => "3305",
            "latitud" => "-15.2453",
            "longitud" => "-73.4531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 532,
            "ubigeo_reniec" => "051101",
            "ubigeo_inei" => "050901",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "QUEROBAMBA",
            "region" => "AYACUCHO",
            "superficie" => "276",
            "altitud" => "3516",
            "latitud" => "-14.0117",
            "longitud" => "-73.8386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 533,
            "ubigeo_reniec" => "051102",
            "ubigeo_inei" => "050902",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "BELEN",
            "region" => "AYACUCHO",
            "superficie" => "41",
            "altitud" => "3223",
            "latitud" => "-13.8089",
            "longitud" => "-73.7575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 534,
            "ubigeo_reniec" => "051103",
            "ubigeo_inei" => "050903",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "CHALCOS",
            "region" => "AYACUCHO",
            "superficie" => "58",
            "altitud" => "3677",
            "latitud" => "-13.8481",
            "longitud" => "-73.7542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 535,
            "ubigeo_reniec" => "051110",
            "ubigeo_inei" => "050904",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "CHILCAYOC",
            "region" => "AYACUCHO",
            "superficie" => "33",
            "altitud" => "3404",
            "latitud" => "-13.8831",
            "longitud" => "-73.7272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 536,
            "ubigeo_reniec" => "051109",
            "ubigeo_inei" => "050905",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "HUACAŃA",
            "region" => "AYACUCHO",
            "superficie" => "133",
            "altitud" => "3186",
            "latitud" => "-14.1722",
            "longitud" => "-73.8864"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 537,
            "ubigeo_reniec" => "051111",
            "ubigeo_inei" => "050906",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "MORCOLLA",
            "region" => "AYACUCHO",
            "superficie" => "289",
            "altitud" => "3504",
            "latitud" => "-14.1086",
            "longitud" => "-73.8719"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 538,
            "ubigeo_reniec" => "051105",
            "ubigeo_inei" => "050907",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "PAICO",
            "region" => "AYACUCHO",
            "superficie" => "80",
            "altitud" => "3111",
            "latitud" => "-14.0383",
            "longitud" => "-73.6422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 539,
            "ubigeo_reniec" => "051107",
            "ubigeo_inei" => "050908",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "SAN PEDRO DE LARCAY",
            "region" => "AYACUCHO",
            "superficie" => "310",
            "altitud" => "3395",
            "latitud" => "-14.1686",
            "longitud" => "-73.5728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 540,
            "ubigeo_reniec" => "051104",
            "ubigeo_inei" => "050909",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "SAN SALVADOR DE QUIJE",
            "region" => "AYACUCHO",
            "superficie" => "145",
            "altitud" => "3222",
            "latitud" => "-13.9683",
            "longitud" => "-73.7347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 541,
            "ubigeo_reniec" => "051106",
            "ubigeo_inei" => "050910",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "SANTIAGO DE PAUCARAY",
            "region" => "AYACUCHO",
            "superficie" => "63",
            "altitud" => "3251",
            "latitud" => "-14.0444",
            "longitud" => "-73.6375"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 542,
            "ubigeo_reniec" => "051108",
            "ubigeo_inei" => "050911",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0509",
            "provincia" => "SUCRE",
            "distrito" => "SORAS",
            "region" => "AYACUCHO",
            "superficie" => "358",
            "altitud" => "3432",
            "latitud" => "-14.1144",
            "longitud" => "-73.6044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 543,
            "ubigeo_reniec" => "050701",
            "ubigeo_inei" => "051001",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "HUANCAPI",
            "region" => "AYACUCHO",
            "superficie" => "223",
            "altitud" => "3105",
            "latitud" => "-13.7522",
            "longitud" => "-74.0667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 544,
            "ubigeo_reniec" => "050702",
            "ubigeo_inei" => "051002",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "ALCAMENCA",
            "region" => "AYACUCHO",
            "superficie" => "125",
            "altitud" => "3173",
            "latitud" => "-13.6572",
            "longitud" => "-74.1472"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 545,
            "ubigeo_reniec" => "050703",
            "ubigeo_inei" => "051003",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "APONGO",
            "region" => "AYACUCHO",
            "superficie" => "172",
            "altitud" => "3078",
            "latitud" => "-14.0133",
            "longitud" => "-73.9322"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 546,
            "ubigeo_reniec" => "050715",
            "ubigeo_inei" => "051004",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "ASQUIPATA",
            "region" => "AYACUCHO",
            "superficie" => "71",
            "altitud" => "3332",
            "latitud" => "-14.0547",
            "longitud" => "-73.9094"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 547,
            "ubigeo_reniec" => "050704",
            "ubigeo_inei" => "051005",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "CANARIA",
            "region" => "AYACUCHO",
            "superficie" => "264",
            "altitud" => "3043",
            "latitud" => "-13.9231",
            "longitud" => "-73.9047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 548,
            "ubigeo_reniec" => "050706",
            "ubigeo_inei" => "051006",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "CAYARA",
            "region" => "AYACUCHO",
            "superficie" => "69",
            "altitud" => "3207",
            "latitud" => "-13.7953",
            "longitud" => "-73.9886"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 549,
            "ubigeo_reniec" => "050707",
            "ubigeo_inei" => "051007",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "COLCA",
            "region" => "AYACUCHO",
            "superficie" => "70",
            "altitud" => "3003",
            "latitud" => "-13.7125",
            "longitud" => "-74.0339"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 550,
            "ubigeo_reniec" => "050709",
            "ubigeo_inei" => "051008",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "HUAMANQUIQUIA",
            "region" => "AYACUCHO",
            "superficie" => "67",
            "altitud" => "3390",
            "latitud" => "-13.7292",
            "longitud" => "-74.2722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 551,
            "ubigeo_reniec" => "050710",
            "ubigeo_inei" => "051009",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "HUANCARAYLLA",
            "region" => "AYACUCHO",
            "superficie" => "165",
            "altitud" => "3246",
            "latitud" => "-13.7189",
            "longitud" => "-74.1025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 552,
            "ubigeo_reniec" => "050708",
            "ubigeo_inei" => "051010",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "HUAYA",
            "region" => "AYACUCHO",
            "superficie" => "162",
            "altitud" => "3423",
            "latitud" => "-13.85",
            "longitud" => "-73.9508"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 553,
            "ubigeo_reniec" => "050713",
            "ubigeo_inei" => "051011",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "SARHUA",
            "region" => "AYACUCHO",
            "superficie" => "373",
            "altitud" => "3184",
            "latitud" => "-13.6728",
            "longitud" => "-74.3203"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 554,
            "ubigeo_reniec" => "050714",
            "ubigeo_inei" => "051012",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0510",
            "provincia" => "VICTOR FAJARDO",
            "distrito" => "VILCANCHOS",
            "region" => "AYACUCHO",
            "superficie" => "499",
            "altitud" => "3011",
            "latitud" => "-13.6114",
            "longitud" => "-74.5325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 555,
            "ubigeo_reniec" => "050901",
            "ubigeo_inei" => "051101",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "VILCAS HUAMAN",
            "region" => "AYACUCHO",
            "superficie" => "217",
            "altitud" => "3494",
            "latitud" => "-13.6525",
            "longitud" => "-73.9539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 556,
            "ubigeo_reniec" => "050903",
            "ubigeo_inei" => "051102",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "ACCOMARCA",
            "region" => "AYACUCHO",
            "superficie" => "82",
            "altitud" => "3387",
            "latitud" => "-13.8006",
            "longitud" => "-73.9042"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 557,
            "ubigeo_reniec" => "050904",
            "ubigeo_inei" => "051103",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "CARHUANCA",
            "region" => "AYACUCHO",
            "superficie" => "57",
            "altitud" => "2980",
            "latitud" => "-13.7425",
            "longitud" => "-73.7872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 558,
            "ubigeo_reniec" => "050905",
            "ubigeo_inei" => "051104",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "CONCEPCION",
            "region" => "AYACUCHO",
            "superficie" => "215",
            "altitud" => "3061",
            "latitud" => "-13.5325",
            "longitud" => "-73.8753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 559,
            "ubigeo_reniec" => "050906",
            "ubigeo_inei" => "051105",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "HUAMBALPA",
            "region" => "AYACUCHO",
            "superficie" => "151",
            "altitud" => "3294",
            "latitud" => "-13.7503",
            "longitud" => "-73.9317"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 560,
            "ubigeo_reniec" => "050908",
            "ubigeo_inei" => "051106",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "INDEPENDENCIA",
            "region" => "AYACUCHO",
            "superficie" => "85",
            "altitud" => "3606",
            "latitud" => "-13.8528",
            "longitud" => "-73.8772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 561,
            "ubigeo_reniec" => "050907",
            "ubigeo_inei" => "051107",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "SAURAMA",
            "region" => "AYACUCHO",
            "superficie" => "95",
            "altitud" => "3574",
            "latitud" => "-13.6956",
            "longitud" => "-73.7594"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 562,
            "ubigeo_reniec" => "050902",
            "ubigeo_inei" => "051108",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0511",
            "provincia" => "VILCAS HUAMAN",
            "distrito" => "VISCHONGO",
            "region" => "AYACUCHO",
            "superficie" => "269",
            "altitud" => "3150",
            "latitud" => "-13.5892",
            "longitud" => "-73.9953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 563,
            "ubigeo_reniec" => "060101",
            "ubigeo_inei" => "060101",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "CAJAMARCA",
            "region" => "CAJAMARCA",
            "superficie" => "383",
            "altitud" => "2731",
            "latitud" => "-7.1547",
            "longitud" => "-78.5108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 564,
            "ubigeo_reniec" => "060102",
            "ubigeo_inei" => "060102",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "ASUNCION",
            "region" => "CAJAMARCA",
            "superficie" => "210",
            "altitud" => "2254",
            "latitud" => "-7.3247",
            "longitud" => "-78.5186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 565,
            "ubigeo_reniec" => "060104",
            "ubigeo_inei" => "060103",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "CHETILLA",
            "region" => "CAJAMARCA",
            "superficie" => "74",
            "altitud" => "2802",
            "latitud" => "-7.1469",
            "longitud" => "-78.6733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 566,
            "ubigeo_reniec" => "060103",
            "ubigeo_inei" => "060104",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "COSPAN",
            "region" => "CAJAMARCA",
            "superficie" => "559",
            "altitud" => "2471",
            "latitud" => "-7.4272",
            "longitud" => "-78.5422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 567,
            "ubigeo_reniec" => "060105",
            "ubigeo_inei" => "060105",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "ENCAŃADA",
            "region" => "CAJAMARCA",
            "superficie" => "635",
            "altitud" => "3087",
            "latitud" => "-7.0869",
            "longitud" => "-78.3444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 568,
            "ubigeo_reniec" => "060106",
            "ubigeo_inei" => "060106",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "JESUS",
            "region" => "CAJAMARCA",
            "superficie" => "268",
            "altitud" => "2568",
            "latitud" => "-7.2486",
            "longitud" => "-78.3792"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 569,
            "ubigeo_reniec" => "060108",
            "ubigeo_inei" => "060107",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "LLACANORA",
            "region" => "CAJAMARCA",
            "superficie" => "49",
            "altitud" => "2621",
            "latitud" => "-7.1936",
            "longitud" => "-78.4267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 570,
            "ubigeo_reniec" => "060107",
            "ubigeo_inei" => "060108",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "LOS BAŃOS DEL INCA",
            "region" => "CAJAMARCA",
            "superficie" => "276",
            "altitud" => "2685",
            "latitud" => "-7.1636",
            "longitud" => "-78.4644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 571,
            "ubigeo_reniec" => "060109",
            "ubigeo_inei" => "060109",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "MAGDALENA",
            "region" => "CAJAMARCA",
            "superficie" => "215",
            "altitud" => "1298",
            "latitud" => "-7.2508",
            "longitud" => "-78.6597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 572,
            "ubigeo_reniec" => "060110",
            "ubigeo_inei" => "060110",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "MATARA",
            "region" => "CAJAMARCA",
            "superficie" => "60",
            "altitud" => "2834",
            "latitud" => "-7.2547",
            "longitud" => "-78.2597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 573,
            "ubigeo_reniec" => "060111",
            "ubigeo_inei" => "060111",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "NAMORA",
            "region" => "CAJAMARCA",
            "superficie" => "181",
            "altitud" => "2765",
            "latitud" => "-7.2028",
            "longitud" => "-78.3247"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 574,
            "ubigeo_reniec" => "060112",
            "ubigeo_inei" => "060112",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0601",
            "provincia" => "CAJAMARCA",
            "distrito" => "SAN JUAN",
            "region" => "CAJAMARCA",
            "superficie" => "70",
            "altitud" => "2336",
            "latitud" => "-7.2917",
            "longitud" => "-78.4975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 575,
            "ubigeo_reniec" => "060201",
            "ubigeo_inei" => "060201",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0602",
            "provincia" => "CAJABAMBA",
            "distrito" => "CAJABAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "192",
            "altitud" => "2687",
            "latitud" => "-7.6231",
            "longitud" => "-78.0461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 576,
            "ubigeo_reniec" => "060202",
            "ubigeo_inei" => "060202",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0602",
            "provincia" => "CAJABAMBA",
            "distrito" => "CACHACHI",
            "region" => "CAJAMARCA",
            "superficie" => "821",
            "altitud" => "3224",
            "latitud" => "-7.4489",
            "longitud" => "-78.2689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 577,
            "ubigeo_reniec" => "060203",
            "ubigeo_inei" => "060203",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0602",
            "provincia" => "CAJABAMBA",
            "distrito" => "CONDEBAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "205",
            "altitud" => "2829",
            "latitud" => "-7.5736",
            "longitud" => "-78.0697"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 578,
            "ubigeo_reniec" => "060205",
            "ubigeo_inei" => "060204",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0602",
            "provincia" => "CAJABAMBA",
            "distrito" => "SITACOCHA",
            "region" => "CAJAMARCA",
            "superficie" => "590",
            "altitud" => "3209",
            "latitud" => "-7.5194",
            "longitud" => "-77.9694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 579,
            "ubigeo_reniec" => "060301",
            "ubigeo_inei" => "060301",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "CELENDIN",
            "region" => "CAJAMARCA",
            "superficie" => "409",
            "altitud" => "2629",
            "latitud" => "-6.8669",
            "longitud" => "-78.1431"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 580,
            "ubigeo_reniec" => "060303",
            "ubigeo_inei" => "060302",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "CHUMUCH",
            "region" => "CAJAMARCA",
            "superficie" => "196",
            "altitud" => "2202",
            "latitud" => "-6.6028",
            "longitud" => "-78.2003"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 581,
            "ubigeo_reniec" => "060302",
            "ubigeo_inei" => "060303",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "CORTEGANA",
            "region" => "CAJAMARCA",
            "superficie" => "233",
            "altitud" => "2352",
            "latitud" => "-6.5131",
            "longitud" => "-78.3289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 582,
            "ubigeo_reniec" => "060304",
            "ubigeo_inei" => "060304",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "HUASMIN",
            "region" => "CAJAMARCA",
            "superficie" => "438",
            "altitud" => "2543",
            "latitud" => "-6.8375",
            "longitud" => "-78.2447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 583,
            "ubigeo_reniec" => "060305",
            "ubigeo_inei" => "060305",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "JORGE CHAVEZ",
            "region" => "CAJAMARCA",
            "superficie" => "53",
            "altitud" => "2646",
            "latitud" => "-6.9411",
            "longitud" => "-78.0917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 584,
            "ubigeo_reniec" => "060306",
            "ubigeo_inei" => "060306",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "JOSE GALVEZ",
            "region" => "CAJAMARCA",
            "superficie" => "58",
            "altitud" => "2618",
            "latitud" => "-6.9256",
            "longitud" => "-78.1328"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 585,
            "ubigeo_reniec" => "060307",
            "ubigeo_inei" => "060307",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "MIGUEL IGLESIAS",
            "region" => "CAJAMARCA",
            "superficie" => "236",
            "altitud" => "2813",
            "latitud" => "-6.6503",
            "longitud" => "-78.2325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 586,
            "ubigeo_reniec" => "060308",
            "ubigeo_inei" => "060308",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "OXAMARCA",
            "region" => "CAJAMARCA",
            "superficie" => "293",
            "altitud" => "2836",
            "latitud" => "-7.0422",
            "longitud" => "-78.0683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 587,
            "ubigeo_reniec" => "060309",
            "ubigeo_inei" => "060309",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "SOROCHUCO",
            "region" => "CAJAMARCA",
            "superficie" => "170",
            "altitud" => "2663",
            "latitud" => "-6.9119",
            "longitud" => "-78.2553"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 588,
            "ubigeo_reniec" => "060310",
            "ubigeo_inei" => "060310",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "SUCRE",
            "region" => "CAJAMARCA",
            "superficie" => "271",
            "altitud" => "2632",
            "latitud" => "-6.9428",
            "longitud" => "-78.1353"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 589,
            "ubigeo_reniec" => "060311",
            "ubigeo_inei" => "060311",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "UTCO",
            "region" => "CAJAMARCA",
            "superficie" => "101",
            "altitud" => "2225",
            "latitud" => "-6.8964",
            "longitud" => "-78.0633"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 590,
            "ubigeo_reniec" => "060312",
            "ubigeo_inei" => "060312",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0603",
            "provincia" => "CELENDIN",
            "distrito" => "LA LIBERTAD DE PALLAN",
            "region" => "CAJAMARCA",
            "superficie" => "184",
            "altitud" => "2952",
            "latitud" => "-6.7239",
            "longitud" => "-78.2825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 591,
            "ubigeo_reniec" => "060601",
            "ubigeo_inei" => "060401",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHOTA",
            "region" => "CAJAMARCA",
            "superficie" => "262",
            "altitud" => "2430",
            "latitud" => "-6.5597",
            "longitud" => "-78.6469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 592,
            "ubigeo_reniec" => "060602",
            "ubigeo_inei" => "060402",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "ANGUIA",
            "region" => "CAJAMARCA",
            "superficie" => "123",
            "altitud" => "2620",
            "latitud" => "-6.3419",
            "longitud" => "-78.6053"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 593,
            "ubigeo_reniec" => "060605",
            "ubigeo_inei" => "060403",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHADIN",
            "region" => "CAJAMARCA",
            "superficie" => "67",
            "altitud" => "2429",
            "latitud" => "-6.4714",
            "longitud" => "-78.4194"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 594,
            "ubigeo_reniec" => "060606",
            "ubigeo_inei" => "060404",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHIGUIRIP",
            "region" => "CAJAMARCA",
            "superficie" => "51",
            "altitud" => "2652",
            "latitud" => "-6.4283",
            "longitud" => "-78.7214"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 595,
            "ubigeo_reniec" => "060607",
            "ubigeo_inei" => "060405",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHIMBAN",
            "region" => "CAJAMARCA",
            "superficie" => "199",
            "altitud" => "1668",
            "latitud" => "-6.2517",
            "longitud" => "-78.4789"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 596,
            "ubigeo_reniec" => "060618",
            "ubigeo_inei" => "060406",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHOROPAMPA",
            "region" => "CAJAMARCA",
            "superficie" => "172",
            "altitud" => "2215",
            "latitud" => "-6.3711",
            "longitud" => "-78.4119"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 597,
            "ubigeo_reniec" => "060603",
            "ubigeo_inei" => "060407",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "COCHABAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "130",
            "altitud" => "1688",
            "latitud" => "-6.4739",
            "longitud" => "-78.8858"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 598,
            "ubigeo_reniec" => "060604",
            "ubigeo_inei" => "060408",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CONCHAN",
            "region" => "CAJAMARCA",
            "superficie" => "180",
            "altitud" => "2321",
            "latitud" => "-6.4447",
            "longitud" => "-78.6558"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 599,
            "ubigeo_reniec" => "060608",
            "ubigeo_inei" => "060409",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "HUAMBOS",
            "region" => "CAJAMARCA",
            "superficie" => "241",
            "altitud" => "2292",
            "latitud" => "-6.4528",
            "longitud" => "-78.9611"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 600,
            "ubigeo_reniec" => "060609",
            "ubigeo_inei" => "060410",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "LAJAS",
            "region" => "CAJAMARCA",
            "superficie" => "121",
            "altitud" => "2151",
            "latitud" => "-6.5606",
            "longitud" => "-78.7347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 601,
            "ubigeo_reniec" => "060610",
            "ubigeo_inei" => "060411",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "LLAMA",
            "region" => "CAJAMARCA",
            "superficie" => "495",
            "altitud" => "2112",
            "latitud" => "-6.5144",
            "longitud" => "-79.1203"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 602,
            "ubigeo_reniec" => "060611",
            "ubigeo_inei" => "060412",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "MIRACOSTA",
            "region" => "CAJAMARCA",
            "superficie" => "416",
            "altitud" => "2983",
            "latitud" => "-6.4044",
            "longitud" => "-79.2836"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 603,
            "ubigeo_reniec" => "060612",
            "ubigeo_inei" => "060413",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "PACCHA",
            "region" => "CAJAMARCA",
            "superficie" => "94",
            "altitud" => "2130",
            "latitud" => "-6.4975",
            "longitud" => "-78.4236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 604,
            "ubigeo_reniec" => "060613",
            "ubigeo_inei" => "060414",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "PION",
            "region" => "CAJAMARCA",
            "superficie" => "141",
            "altitud" => "1834",
            "latitud" => "-6.1778",
            "longitud" => "-78.4825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 605,
            "ubigeo_reniec" => "060614",
            "ubigeo_inei" => "060415",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "QUEROCOTO",
            "region" => "CAJAMARCA",
            "superficie" => "301",
            "altitud" => "2445",
            "latitud" => "-6.3597",
            "longitud" => "-79.0344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 606,
            "ubigeo_reniec" => "060617",
            "ubigeo_inei" => "060416",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "SAN JUAN DE LICUPIS",
            "region" => "CAJAMARCA",
            "superficie" => "205",
            "altitud" => "3031",
            "latitud" => "-6.4242",
            "longitud" => "-79.2422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 607,
            "ubigeo_reniec" => "060615",
            "ubigeo_inei" => "060417",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "TACABAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "196",
            "altitud" => "2077",
            "latitud" => "-6.3928",
            "longitud" => "-78.6114"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 608,
            "ubigeo_reniec" => "060616",
            "ubigeo_inei" => "060418",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "TOCMOCHE",
            "region" => "CAJAMARCA",
            "superficie" => "222",
            "altitud" => "1313",
            "latitud" => "-6.4128",
            "longitud" => "-79.3608"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 609,
            "ubigeo_reniec" => "060619",
            "ubigeo_inei" => "060419",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0604",
            "provincia" => "CHOTA",
            "distrito" => "CHALAMARCA",
            "region" => "CAJAMARCA",
            "superficie" => "180",
            "altitud" => "2667",
            "latitud" => "-6.5031",
            "longitud" => "-78.4797"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 610,
            "ubigeo_reniec" => "060401",
            "ubigeo_inei" => "060501",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "CONTUMAZA",
            "region" => "CAJAMARCA",
            "superficie" => "358",
            "altitud" => "2695",
            "latitud" => "-7.3667",
            "longitud" => "-78.8053"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 611,
            "ubigeo_reniec" => "060403",
            "ubigeo_inei" => "060502",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "CHILETE",
            "region" => "CAJAMARCA",
            "superficie" => "134",
            "altitud" => "883",
            "latitud" => "-7.2214",
            "longitud" => "-78.8397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 612,
            "ubigeo_reniec" => "060406",
            "ubigeo_inei" => "060503",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "CUPISNIQUE",
            "region" => "CAJAMARCA",
            "superficie" => "280",
            "altitud" => "1904",
            "latitud" => "-7.3489",
            "longitud" => "-79.0297"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 613,
            "ubigeo_reniec" => "060404",
            "ubigeo_inei" => "060504",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "GUZMANGO",
            "region" => "CAJAMARCA",
            "superficie" => "50",
            "altitud" => "2568",
            "latitud" => "-7.3839",
            "longitud" => "-78.8961"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 614,
            "ubigeo_reniec" => "060405",
            "ubigeo_inei" => "060505",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "SAN BENITO",
            "region" => "CAJAMARCA",
            "superficie" => "487",
            "altitud" => "1386",
            "latitud" => "-7.425",
            "longitud" => "-78.9275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 615,
            "ubigeo_reniec" => "060409",
            "ubigeo_inei" => "060506",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "SANTA CRUZ DE TOLEDO",
            "region" => "CAJAMARCA",
            "superficie" => "65",
            "altitud" => "2426",
            "latitud" => "-7.3444",
            "longitud" => "-78.8367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 616,
            "ubigeo_reniec" => "060407",
            "ubigeo_inei" => "060507",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "TANTARICA",
            "region" => "CAJAMARCA",
            "superficie" => "150",
            "altitud" => "2780",
            "latitud" => "-7.3006",
            "longitud" => "-78.9331"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 617,
            "ubigeo_reniec" => "060408",
            "ubigeo_inei" => "060508",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0605",
            "provincia" => "CONTUMAZA",
            "distrito" => "YONAN",
            "region" => "CAJAMARCA",
            "superficie" => "547",
            "altitud" => "453",
            "latitud" => "-7.2531",
            "longitud" => "-79.1311"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 618,
            "ubigeo_reniec" => "060501",
            "ubigeo_inei" => "060601",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "CUTERVO",
            "region" => "CAJAMARCA",
            "superficie" => "422",
            "altitud" => "2665",
            "latitud" => "-6.3772",
            "longitud" => "-78.8181"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 619,
            "ubigeo_reniec" => "060502",
            "ubigeo_inei" => "060602",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "CALLAYUC",
            "region" => "CAJAMARCA",
            "superficie" => "316",
            "altitud" => "1558",
            "latitud" => "-6.1811",
            "longitud" => "-78.9106"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 620,
            "ubigeo_reniec" => "060504",
            "ubigeo_inei" => "060603",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "CHOROS",
            "region" => "CAJAMARCA",
            "superficie" => "277",
            "altitud" => "474",
            "latitud" => "-5.9",
            "longitud" => "-78.6939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 621,
            "ubigeo_reniec" => "060503",
            "ubigeo_inei" => "060604",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "CUJILLO",
            "region" => "CAJAMARCA",
            "superficie" => "109",
            "altitud" => "1598",
            "latitud" => "-6.1069",
            "longitud" => "-78.5739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 622,
            "ubigeo_reniec" => "060505",
            "ubigeo_inei" => "060605",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "LA RAMADA",
            "region" => "CAJAMARCA",
            "superficie" => "30",
            "altitud" => "2131",
            "latitud" => "-6.2533",
            "longitud" => "-78.5756"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 623,
            "ubigeo_reniec" => "060506",
            "ubigeo_inei" => "060606",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "PIMPINGOS",
            "region" => "CAJAMARCA",
            "superficie" => "186",
            "altitud" => "1757",
            "latitud" => "-6.0619",
            "longitud" => "-78.7586"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 624,
            "ubigeo_reniec" => "060507",
            "ubigeo_inei" => "060607",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "QUEROCOTILLO",
            "region" => "CAJAMARCA",
            "superficie" => "697",
            "altitud" => "2003",
            "latitud" => "-6.2736",
            "longitud" => "-79.0378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 625,
            "ubigeo_reniec" => "060508",
            "ubigeo_inei" => "060608",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SAN ANDRES DE CUTERVO",
            "region" => "CAJAMARCA",
            "superficie" => "133",
            "altitud" => "2090",
            "latitud" => "-6.2389",
            "longitud" => "-78.7128"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 626,
            "ubigeo_reniec" => "060509",
            "ubigeo_inei" => "060609",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SAN JUAN DE CUTERVO",
            "region" => "CAJAMARCA",
            "superficie" => "61",
            "altitud" => "1645",
            "latitud" => "-6.1631",
            "longitud" => "-78.5981"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 627,
            "ubigeo_reniec" => "060510",
            "ubigeo_inei" => "060610",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SAN LUIS DE LUCMA",
            "region" => "CAJAMARCA",
            "superficie" => "110",
            "altitud" => "1916",
            "latitud" => "-6.2939",
            "longitud" => "-78.6036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 628,
            "ubigeo_reniec" => "060511",
            "ubigeo_inei" => "060611",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SANTA CRUZ",
            "region" => "CAJAMARCA",
            "superficie" => "128",
            "altitud" => "1708",
            "latitud" => "-6.095",
            "longitud" => "-78.8528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 629,
            "ubigeo_reniec" => "060512",
            "ubigeo_inei" => "060612",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SANTO DOMINGO DE LA CAPILLA",
            "region" => "CAJAMARCA",
            "superficie" => "104",
            "altitud" => "1761",
            "latitud" => "-6.2447",
            "longitud" => "-78.8553"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 630,
            "ubigeo_reniec" => "060513",
            "ubigeo_inei" => "060613",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SANTO TOMAS",
            "region" => "CAJAMARCA",
            "superficie" => "280",
            "altitud" => "2167",
            "latitud" => "-6.1514",
            "longitud" => "-78.6819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 631,
            "ubigeo_reniec" => "060514",
            "ubigeo_inei" => "060614",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "SOCOTA",
            "region" => "CAJAMARCA",
            "superficie" => "135",
            "altitud" => "1847",
            "latitud" => "-6.3153",
            "longitud" => "-78.6994"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 632,
            "ubigeo_reniec" => "060515",
            "ubigeo_inei" => "060615",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0606",
            "provincia" => "CUTERVO",
            "distrito" => "TORIBIO CASANOVA",
            "region" => "CAJAMARCA",
            "superficie" => "41",
            "altitud" => "1464",
            "latitud" => "-6.0042",
            "longitud" => "-78.6983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 633,
            "ubigeo_reniec" => "060701",
            "ubigeo_inei" => "060701",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0607",
            "provincia" => "HUALGAYOC",
            "distrito" => "BAMBAMARCA",
            "region" => "CAJAMARCA",
            "superficie" => "451",
            "altitud" => "2556",
            "latitud" => "-6.6797",
            "longitud" => "-78.5189"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 634,
            "ubigeo_reniec" => "060702",
            "ubigeo_inei" => "060702",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0607",
            "provincia" => "HUALGAYOC",
            "distrito" => "CHUGUR",
            "region" => "CAJAMARCA",
            "superficie" => "100",
            "altitud" => "2765",
            "latitud" => "-6.6708",
            "longitud" => "-78.7383"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 635,
            "ubigeo_reniec" => "060703",
            "ubigeo_inei" => "060703",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0607",
            "provincia" => "HUALGAYOC",
            "distrito" => "HUALGAYOC",
            "region" => "CAJAMARCA",
            "superficie" => "226",
            "altitud" => "3530",
            "latitud" => "-6.7647",
            "longitud" => "-78.6081"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 636,
            "ubigeo_reniec" => "060801",
            "ubigeo_inei" => "060801",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "JAEN",
            "region" => "CAJAMARCA",
            "superficie" => "537",
            "altitud" => "728",
            "latitud" => "-5.7089",
            "longitud" => "-78.8092"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 637,
            "ubigeo_reniec" => "060802",
            "ubigeo_inei" => "060802",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "BELLAVISTA",
            "region" => "CAJAMARCA",
            "superficie" => "871",
            "altitud" => "438",
            "latitud" => "-5.6678",
            "longitud" => "-78.6772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 638,
            "ubigeo_reniec" => "060804",
            "ubigeo_inei" => "060803",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "CHONTALI",
            "region" => "CAJAMARCA",
            "superficie" => "429",
            "altitud" => "1636",
            "latitud" => "-5.6461",
            "longitud" => "-79.0883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 639,
            "ubigeo_reniec" => "060803",
            "ubigeo_inei" => "060804",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "COLASAY",
            "region" => "CAJAMARCA",
            "superficie" => "736",
            "altitud" => "1800",
            "latitud" => "-5.9786",
            "longitud" => "-79.0686"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 640,
            "ubigeo_reniec" => "060812",
            "ubigeo_inei" => "060805",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "HUABAL",
            "region" => "CAJAMARCA",
            "superficie" => "81",
            "altitud" => "1380",
            "latitud" => "-5.6125",
            "longitud" => "-78.8997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 641,
            "ubigeo_reniec" => "060811",
            "ubigeo_inei" => "060806",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "LAS PIRIAS",
            "region" => "CAJAMARCA",
            "superficie" => "60",
            "altitud" => "1620",
            "latitud" => "-5.6272",
            "longitud" => "-78.8528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 642,
            "ubigeo_reniec" => "060805",
            "ubigeo_inei" => "060807",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "POMAHUACA",
            "region" => "CAJAMARCA",
            "superficie" => "733",
            "altitud" => "1097",
            "latitud" => "-5.9314",
            "longitud" => "-79.2294"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 643,
            "ubigeo_reniec" => "060806",
            "ubigeo_inei" => "060808",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "PUCARA",
            "region" => "CAJAMARCA",
            "superficie" => "240",
            "altitud" => "909",
            "latitud" => "-6.0414",
            "longitud" => "-79.1283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 644,
            "ubigeo_reniec" => "060807",
            "ubigeo_inei" => "060809",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "SALLIQUE",
            "region" => "CAJAMARCA",
            "superficie" => "374",
            "altitud" => "1701",
            "latitud" => "-5.6581",
            "longitud" => "-79.3153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 645,
            "ubigeo_reniec" => "060808",
            "ubigeo_inei" => "060810",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "SAN FELIPE",
            "region" => "CAJAMARCA",
            "superficie" => "255",
            "altitud" => "1861",
            "latitud" => "-5.7703",
            "longitud" => "-79.3139"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 646,
            "ubigeo_reniec" => "060809",
            "ubigeo_inei" => "060811",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "SAN JOSE DEL ALTO",
            "region" => "CAJAMARCA",
            "superficie" => "634",
            "altitud" => "1399",
            "latitud" => "-5.465",
            "longitud" => "-79.0178"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 647,
            "ubigeo_reniec" => "060810",
            "ubigeo_inei" => "060812",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0608",
            "provincia" => "JAEN",
            "distrito" => "SANTA ROSA",
            "region" => "CAJAMARCA",
            "superficie" => "283",
            "altitud" => "1238",
            "latitud" => "-5.4342",
            "longitud" => "-78.5667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 648,
            "ubigeo_reniec" => "061101",
            "ubigeo_inei" => "060901",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "SAN IGNACIO",
            "region" => "CAJAMARCA",
            "superficie" => "382",
            "altitud" => "1295",
            "latitud" => "-5.1461",
            "longitud" => "-79.0047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 649,
            "ubigeo_reniec" => "061102",
            "ubigeo_inei" => "060902",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "CHIRINOS",
            "region" => "CAJAMARCA",
            "superficie" => "352",
            "altitud" => "1850",
            "latitud" => "-5.3058",
            "longitud" => "-78.8983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 650,
            "ubigeo_reniec" => "061103",
            "ubigeo_inei" => "060903",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "HUARANGO",
            "region" => "CAJAMARCA",
            "superficie" => "922",
            "altitud" => "776",
            "latitud" => "-5.2722",
            "longitud" => "-78.7758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 651,
            "ubigeo_reniec" => "061105",
            "ubigeo_inei" => "060904",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "LA COIPA",
            "region" => "CAJAMARCA",
            "superficie" => "376",
            "altitud" => "1507",
            "latitud" => "-5.3928",
            "longitud" => "-78.9064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 652,
            "ubigeo_reniec" => "061104",
            "ubigeo_inei" => "060905",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "NAMBALLE",
            "region" => "CAJAMARCA",
            "superficie" => "664",
            "altitud" => "713",
            "latitud" => "-5.0042",
            "longitud" => "-79.0872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 653,
            "ubigeo_reniec" => "061106",
            "ubigeo_inei" => "060906",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "SAN JOSE DE LOURDES",
            "region" => "CAJAMARCA",
            "superficie" => "1483",
            "altitud" => "1134",
            "latitud" => "-5.1031",
            "longitud" => "-78.9142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 654,
            "ubigeo_reniec" => "061107",
            "ubigeo_inei" => "060907",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0609",
            "provincia" => "SAN IGNACIO",
            "distrito" => "TABACONAS",
            "region" => "CAJAMARCA",
            "superficie" => "799",
            "altitud" => "1897",
            "latitud" => "-5.3161",
            "longitud" => "-79.2833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 655,
            "ubigeo_reniec" => "061201",
            "ubigeo_inei" => "061001",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "PEDRO GALVEZ",
            "region" => "CAJAMARCA",
            "superficie" => "239",
            "altitud" => "2280",
            "latitud" => "-7.3358",
            "longitud" => "-78.17"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 656,
            "ubigeo_reniec" => "061207",
            "ubigeo_inei" => "061002",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "CHANCAY",
            "region" => "CAJAMARCA",
            "superficie" => "62",
            "altitud" => "2699",
            "latitud" => "-7.3881",
            "longitud" => "-78.1233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 657,
            "ubigeo_reniec" => "061205",
            "ubigeo_inei" => "061003",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "EDUARDO VILLANUEVA",
            "region" => "CAJAMARCA",
            "superficie" => "63",
            "altitud" => "2026",
            "latitud" => "-7.4644",
            "longitud" => "-78.13"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 658,
            "ubigeo_reniec" => "061203",
            "ubigeo_inei" => "061004",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "GREGORIO PITA",
            "region" => "CAJAMARCA",
            "superficie" => "213",
            "altitud" => "2722",
            "latitud" => "-7.2736",
            "longitud" => "-78.16"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 659,
            "ubigeo_reniec" => "061202",
            "ubigeo_inei" => "061005",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "ICHOCAN",
            "region" => "CAJAMARCA",
            "superficie" => "76",
            "altitud" => "2616",
            "latitud" => "-7.3689",
            "longitud" => "-78.1297"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 660,
            "ubigeo_reniec" => "061204",
            "ubigeo_inei" => "061006",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "JOSE MANUEL QUIROZ",
            "region" => "CAJAMARCA",
            "superficie" => "115",
            "altitud" => "2781",
            "latitud" => "-7.3494",
            "longitud" => "-78.0478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 661,
            "ubigeo_reniec" => "061206",
            "ubigeo_inei" => "061007",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0610",
            "provincia" => "SAN MARCOS",
            "distrito" => "JOSE SABOGAL",
            "region" => "CAJAMARCA",
            "superficie" => "594",
            "altitud" => "3331",
            "latitud" => "-7.2511",
            "longitud" => "-78.0367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 662,
            "ubigeo_reniec" => "061001",
            "ubigeo_inei" => "061101",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "SAN MIGUEL",
            "region" => "CAJAMARCA",
            "superficie" => "368",
            "altitud" => "2612",
            "latitud" => "-7",
            "longitud" => "-78.85"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 663,
            "ubigeo_reniec" => "061013",
            "ubigeo_inei" => "061102",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "BOLIVAR",
            "region" => "CAJAMARCA",
            "superficie" => "79",
            "altitud" => "940",
            "latitud" => "-6.9769",
            "longitud" => "-79.1781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 664,
            "ubigeo_reniec" => "061002",
            "ubigeo_inei" => "061103",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "CALQUIS",
            "region" => "CAJAMARCA",
            "superficie" => "339",
            "altitud" => "2877",
            "latitud" => "-6.9803",
            "longitud" => "-78.85"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 665,
            "ubigeo_reniec" => "061012",
            "ubigeo_inei" => "061104",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "CATILLUC",
            "region" => "CAJAMARCA",
            "superficie" => "197",
            "altitud" => "2870",
            "latitud" => "-6.8017",
            "longitud" => "-78.7792"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 666,
            "ubigeo_reniec" => "061009",
            "ubigeo_inei" => "061105",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "EL PRADO",
            "region" => "CAJAMARCA",
            "superficie" => "71",
            "altitud" => "2857",
            "latitud" => "-7.0336",
            "longitud" => "-79.0108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 667,
            "ubigeo_reniec" => "061003",
            "ubigeo_inei" => "061106",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "LA FLORIDA",
            "region" => "CAJAMARCA",
            "superficie" => "61",
            "altitud" => "993",
            "latitud" => "-6.8686",
            "longitud" => "-79.1258"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 668,
            "ubigeo_reniec" => "061004",
            "ubigeo_inei" => "061107",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "LLAPA",
            "region" => "CAJAMARCA",
            "superficie" => "133",
            "altitud" => "2952",
            "latitud" => "-6.9808",
            "longitud" => "-78.8075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 669,
            "ubigeo_reniec" => "061005",
            "ubigeo_inei" => "061108",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "NANCHOC",
            "region" => "CAJAMARCA",
            "superficie" => "359",
            "altitud" => "402",
            "latitud" => "-6.9594",
            "longitud" => "-79.2425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 670,
            "ubigeo_reniec" => "061006",
            "ubigeo_inei" => "061109",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "NIEPOS",
            "region" => "CAJAMARCA",
            "superficie" => "159",
            "altitud" => "2457",
            "latitud" => "-6.9267",
            "longitud" => "-79.13"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 671,
            "ubigeo_reniec" => "061007",
            "ubigeo_inei" => "061110",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "SAN GREGORIO",
            "region" => "CAJAMARCA",
            "superficie" => "308",
            "altitud" => "1857",
            "latitud" => "-7.0569",
            "longitud" => "-79.0953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 672,
            "ubigeo_reniec" => "061008",
            "ubigeo_inei" => "061111",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "SAN SILVESTRE DE COCHAN",
            "region" => "CAJAMARCA",
            "superficie" => "132",
            "altitud" => "2940",
            "latitud" => "-6.9775",
            "longitud" => "-78.7739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 673,
            "ubigeo_reniec" => "061011",
            "ubigeo_inei" => "061112",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "TONGOD",
            "region" => "CAJAMARCA",
            "superficie" => "164",
            "altitud" => "2628",
            "latitud" => "-6.7575",
            "longitud" => "-78.825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 674,
            "ubigeo_reniec" => "061010",
            "ubigeo_inei" => "061113",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0611",
            "provincia" => "SAN MIGUEL",
            "distrito" => "UNION AGUA BLANCA",
            "region" => "CAJAMARCA",
            "superficie" => "172",
            "altitud" => "2918",
            "latitud" => "-7.0467",
            "longitud" => "-79.0606"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 675,
            "ubigeo_reniec" => "061301",
            "ubigeo_inei" => "061201",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0612",
            "provincia" => "SAN PABLO",
            "distrito" => "SAN PABLO",
            "region" => "CAJAMARCA",
            "superficie" => "198",
            "altitud" => "2391",
            "latitud" => "-7.1186",
            "longitud" => "-78.8233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 676,
            "ubigeo_reniec" => "061302",
            "ubigeo_inei" => "061202",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0612",
            "provincia" => "SAN PABLO",
            "distrito" => "SAN BERNARDINO",
            "region" => "CAJAMARCA",
            "superficie" => "167",
            "altitud" => "1375",
            "latitud" => "-7.1681",
            "longitud" => "-78.8292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 677,
            "ubigeo_reniec" => "061303",
            "ubigeo_inei" => "061203",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0612",
            "provincia" => "SAN PABLO",
            "distrito" => "SAN LUIS",
            "region" => "CAJAMARCA",
            "superficie" => "43",
            "altitud" => "1394",
            "latitud" => "-7.1569",
            "longitud" => "-78.8681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 678,
            "ubigeo_reniec" => "061304",
            "ubigeo_inei" => "061204",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0612",
            "provincia" => "SAN PABLO",
            "distrito" => "TUMBADEN",
            "region" => "CAJAMARCA",
            "superficie" => "264",
            "altitud" => "3041",
            "latitud" => "-7.0253",
            "longitud" => "-78.7397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 679,
            "ubigeo_reniec" => "060901",
            "ubigeo_inei" => "061301",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "SANTA CRUZ",
            "region" => "CAJAMARCA",
            "superficie" => "103",
            "altitud" => "2036",
            "latitud" => "-6.6258",
            "longitud" => "-78.9442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 680,
            "ubigeo_reniec" => "060910",
            "ubigeo_inei" => "061302",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "ANDABAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "8",
            "altitud" => "2550",
            "latitud" => "-6.6628",
            "longitud" => "-78.8169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 681,
            "ubigeo_reniec" => "060902",
            "ubigeo_inei" => "061303",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "CATACHE",
            "region" => "CAJAMARCA",
            "superficie" => "609",
            "altitud" => "1363",
            "latitud" => "-6.6736",
            "longitud" => "-79.0328"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 682,
            "ubigeo_reniec" => "060903",
            "ubigeo_inei" => "061304",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "CHANCAYBAŃOS",
            "region" => "CAJAMARCA",
            "superficie" => "120",
            "altitud" => "1641",
            "latitud" => "-6.5761",
            "longitud" => "-78.8675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 683,
            "ubigeo_reniec" => "060904",
            "ubigeo_inei" => "061305",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "LA ESPERANZA",
            "region" => "CAJAMARCA",
            "superficie" => "60",
            "altitud" => "1727",
            "latitud" => "-6.5925",
            "longitud" => "-78.8958"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 684,
            "ubigeo_reniec" => "060905",
            "ubigeo_inei" => "061306",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "NINABAMBA",
            "region" => "CAJAMARCA",
            "superficie" => "60",
            "altitud" => "2196",
            "latitud" => "-6.6497",
            "longitud" => "-78.7875"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 685,
            "ubigeo_reniec" => "060906",
            "ubigeo_inei" => "061307",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "PULAN",
            "region" => "CAJAMARCA",
            "superficie" => "156",
            "altitud" => "2084",
            "latitud" => "-6.7389",
            "longitud" => "-78.9203"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 686,
            "ubigeo_reniec" => "060911",
            "ubigeo_inei" => "061308",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "SAUCEPAMPA",
            "region" => "CAJAMARCA",
            "superficie" => "32",
            "altitud" => "1931",
            "latitud" => "-6.6914",
            "longitud" => "-78.9161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 687,
            "ubigeo_reniec" => "060907",
            "ubigeo_inei" => "061309",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "SEXI",
            "region" => "CAJAMARCA",
            "superficie" => "193",
            "altitud" => "2478",
            "latitud" => "-6.5642",
            "longitud" => "-79.0514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 688,
            "ubigeo_reniec" => "060908",
            "ubigeo_inei" => "061310",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "UTICYACU",
            "region" => "CAJAMARCA",
            "superficie" => "43",
            "altitud" => "2346",
            "latitud" => "-6.6067",
            "longitud" => "-78.7939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 689,
            "ubigeo_reniec" => "060909",
            "ubigeo_inei" => "061311",
            "departamento_inei" => "06",
            "departamento" => "CAJAMARCA",
            "provincia_inei" => "0613",
            "provincia" => "SANTA CRUZ",
            "distrito" => "YAUYUCAN",
            "region" => "CAJAMARCA",
            "superficie" => "35",
            "altitud" => "2502",
            "latitud" => "-6.6772",
            "longitud" => "-78.8186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 690,
            "ubigeo_reniec" => "240101",
            "ubigeo_inei" => "070101",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "CALLAO",
            "region" => "CALLAO",
            "superficie" => "46",
            "altitud" => "27",
            "latitud" => "-12.0631",
            "longitud" => "-77.1469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 691,
            "ubigeo_reniec" => "240102",
            "ubigeo_inei" => "070102",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "BELLAVISTA",
            "region" => "CALLAO",
            "superficie" => "5",
            "altitud" => "13",
            "latitud" => "-12.0625",
            "longitud" => "-77.1292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 692,
            "ubigeo_reniec" => "240104",
            "ubigeo_inei" => "070103",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "CARMEN DE LA LEGUA REYNOSO",
            "region" => "CALLAO",
            "superficie" => "2",
            "altitud" => "82",
            "latitud" => "-12.0394",
            "longitud" => "-77.0903"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 693,
            "ubigeo_reniec" => "240105",
            "ubigeo_inei" => "070104",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "LA PERLA",
            "region" => "CALLAO",
            "superficie" => "3",
            "altitud" => "37",
            "latitud" => "-12.0658",
            "longitud" => "-77.1081"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 694,
            "ubigeo_reniec" => "240103",
            "ubigeo_inei" => "070105",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "LA PUNTA",
            "region" => "CALLAO",
            "superficie" => "18",
            "altitud" => "29",
            "latitud" => "-12.0728",
            "longitud" => "-77.1633"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 695,
            "ubigeo_reniec" => "240106",
            "ubigeo_inei" => "070106",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "VENTANILLA",
            "region" => "CALLAO",
            "superficie" => "70",
            "altitud" => "43",
            "latitud" => "-11.8772",
            "longitud" => "-77.1278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 696,
            "ubigeo_reniec" => "240107",
            "ubigeo_inei" => "070107",
            "departamento_inei" => "07",
            "departamento" => "CALLAO",
            "provincia_inei" => "0701",
            "provincia" => "CALLAO",
            "distrito" => "MI PERU",
            "region" => "CALLAO",
            "superficie" => "3",
            "altitud" => "118",
            "latitud" => "-11.855",
            "longitud" => "-77.125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 697,
            "ubigeo_reniec" => "070101",
            "ubigeo_inei" => "080101",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "CUSCO",
            "region" => "CUSCO",
            "superficie" => "116",
            "altitud" => "3439",
            "latitud" => "-13.5192",
            "longitud" => "-71.9767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 698,
            "ubigeo_reniec" => "070102",
            "ubigeo_inei" => "080102",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "CCORCA",
            "region" => "CUSCO",
            "superficie" => "189",
            "altitud" => "3675",
            "latitud" => "-13.5847",
            "longitud" => "-72.0592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 699,
            "ubigeo_reniec" => "070103",
            "ubigeo_inei" => "080103",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "POROY",
            "region" => "CUSCO",
            "superficie" => "15",
            "altitud" => "3508",
            "latitud" => "-13.4944",
            "longitud" => "-72.0447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 700,
            "ubigeo_reniec" => "070104",
            "ubigeo_inei" => "080104",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "SAN JERONIMO",
            "region" => "CUSCO",
            "superficie" => "103",
            "altitud" => "3289",
            "latitud" => "-13.5444",
            "longitud" => "-71.8836"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 701,
            "ubigeo_reniec" => "070105",
            "ubigeo_inei" => "080105",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "SAN SEBASTIAN",
            "region" => "CUSCO",
            "superficie" => "89",
            "altitud" => "3301",
            "latitud" => "-13.5303",
            "longitud" => "-71.9369"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 702,
            "ubigeo_reniec" => "070106",
            "ubigeo_inei" => "080106",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "SANTIAGO",
            "region" => "CUSCO",
            "superficie" => "70",
            "altitud" => "3464",
            "latitud" => "-13.5258",
            "longitud" => "-71.9831"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 703,
            "ubigeo_reniec" => "070107",
            "ubigeo_inei" => "080107",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "SAYLLA",
            "region" => "CUSCO",
            "superficie" => "28",
            "altitud" => "3179",
            "latitud" => "-13.57",
            "longitud" => "-71.8278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 704,
            "ubigeo_reniec" => "070108",
            "ubigeo_inei" => "080108",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0801",
            "provincia" => "CUSCO",
            "distrito" => "WANCHAQ",
            "region" => "CUSCO",
            "superficie" => "6",
            "altitud" => "3424",
            "latitud" => "-13.5214",
            "longitud" => "-71.9667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 705,
            "ubigeo_reniec" => "070201",
            "ubigeo_inei" => "080201",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "ACOMAYO",
            "region" => "CUSCO",
            "superficie" => "141",
            "altitud" => "3235",
            "latitud" => "-13.9194",
            "longitud" => "-71.6836"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 706,
            "ubigeo_reniec" => "070202",
            "ubigeo_inei" => "080202",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "ACOPIA",
            "region" => "CUSCO",
            "superficie" => "92",
            "altitud" => "3724",
            "latitud" => "-14.0575",
            "longitud" => "-71.4933"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 707,
            "ubigeo_reniec" => "070203",
            "ubigeo_inei" => "080203",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "ACOS",
            "region" => "CUSCO",
            "superficie" => "138",
            "altitud" => "3106",
            "latitud" => "-13.9511",
            "longitud" => "-71.7381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 708,
            "ubigeo_reniec" => "070207",
            "ubigeo_inei" => "080204",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "MOSOC LLACTA",
            "region" => "CUSCO",
            "superficie" => "44",
            "altitud" => "3820",
            "latitud" => "-14.1203",
            "longitud" => "-71.4731"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 709,
            "ubigeo_reniec" => "070204",
            "ubigeo_inei" => "080205",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "POMACANCHI",
            "region" => "CUSCO",
            "superficie" => "276",
            "altitud" => "3709",
            "latitud" => "-14.0336",
            "longitud" => "-71.5742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 710,
            "ubigeo_reniec" => "070205",
            "ubigeo_inei" => "080206",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "RONDOCAN",
            "region" => "CUSCO",
            "superficie" => "180",
            "altitud" => "3394",
            "latitud" => "-13.7794",
            "longitud" => "-71.7819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 711,
            "ubigeo_reniec" => "070206",
            "ubigeo_inei" => "080207",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0802",
            "provincia" => "ACOMAYO",
            "distrito" => "SANGARARA",
            "region" => "CUSCO",
            "superficie" => "78",
            "altitud" => "3788",
            "latitud" => "-13.9472",
            "longitud" => "-71.6033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 712,
            "ubigeo_reniec" => "070301",
            "ubigeo_inei" => "080301",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "ANTA",
            "region" => "CUSCO",
            "superficie" => "203",
            "altitud" => "3363",
            "latitud" => "-13.4578",
            "longitud" => "-72.1475"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 713,
            "ubigeo_reniec" => "070309",
            "ubigeo_inei" => "080302",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "ANCAHUASI",
            "region" => "CUSCO",
            "superficie" => "124",
            "altitud" => "3479",
            "latitud" => "-13.4572",
            "longitud" => "-72.3008"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 714,
            "ubigeo_reniec" => "070308",
            "ubigeo_inei" => "080303",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "CACHIMAYO",
            "region" => "CUSCO",
            "superficie" => "43",
            "altitud" => "3454",
            "latitud" => "-13.4778",
            "longitud" => "-72.0689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 715,
            "ubigeo_reniec" => "070302",
            "ubigeo_inei" => "080304",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "CHINCHAYPUJIO",
            "region" => "CUSCO",
            "superficie" => "391",
            "altitud" => "3106",
            "latitud" => "-13.6297",
            "longitud" => "-72.2331"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 716,
            "ubigeo_reniec" => "070303",
            "ubigeo_inei" => "080305",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "HUAROCONDO",
            "region" => "CUSCO",
            "superficie" => "229",
            "altitud" => "3353",
            "latitud" => "-13.4158",
            "longitud" => "-72.2075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 717,
            "ubigeo_reniec" => "070304",
            "ubigeo_inei" => "080306",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "LIMATAMBO",
            "region" => "CUSCO",
            "superficie" => "513",
            "altitud" => "2633",
            "latitud" => "-13.4797",
            "longitud" => "-72.4428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 718,
            "ubigeo_reniec" => "070305",
            "ubigeo_inei" => "080307",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "MOLLEPATA",
            "region" => "CUSCO",
            "superficie" => "284",
            "altitud" => "2864",
            "latitud" => "-13.5092",
            "longitud" => "-72.5278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 719,
            "ubigeo_reniec" => "070306",
            "ubigeo_inei" => "080308",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "PUCYURA",
            "region" => "CUSCO",
            "superficie" => "38",
            "altitud" => "3384",
            "latitud" => "-13.4789",
            "longitud" => "-72.1111"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 720,
            "ubigeo_reniec" => "070307",
            "ubigeo_inei" => "080309",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0803",
            "provincia" => "ANTA",
            "distrito" => "ZURITE",
            "region" => "CUSCO",
            "superficie" => "52",
            "altitud" => "3424",
            "latitud" => "-13.4558",
            "longitud" => "-72.2558"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 721,
            "ubigeo_reniec" => "070401",
            "ubigeo_inei" => "080401",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "CALCA",
            "region" => "CUSCO",
            "superficie" => "311",
            "altitud" => "2955",
            "latitud" => "-13.3211",
            "longitud" => "-71.9556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 722,
            "ubigeo_reniec" => "070402",
            "ubigeo_inei" => "080402",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "COYA",
            "region" => "CUSCO",
            "superficie" => "71",
            "altitud" => "2970",
            "latitud" => "-13.3864",
            "longitud" => "-71.8983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 723,
            "ubigeo_reniec" => "070403",
            "ubigeo_inei" => "080403",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "LAMAY",
            "region" => "CUSCO",
            "superficie" => "94",
            "altitud" => "2960",
            "latitud" => "-13.3644",
            "longitud" => "-71.9208"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 724,
            "ubigeo_reniec" => "070404",
            "ubigeo_inei" => "080404",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "LARES",
            "region" => "CUSCO",
            "superficie" => "527",
            "altitud" => "3193",
            "latitud" => "-13.1042",
            "longitud" => "-72.0447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 725,
            "ubigeo_reniec" => "070405",
            "ubigeo_inei" => "080405",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "PISAC",
            "region" => "CUSCO",
            "superficie" => "148",
            "altitud" => "2986",
            "latitud" => "-13.4206",
            "longitud" => "-71.8506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 726,
            "ubigeo_reniec" => "070406",
            "ubigeo_inei" => "080406",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "SAN SALVADOR",
            "region" => "CUSCO",
            "superficie" => "128",
            "altitud" => "3012",
            "latitud" => "-13.4919",
            "longitud" => "-71.7786"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 727,
            "ubigeo_reniec" => "070407",
            "ubigeo_inei" => "080407",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "TARAY",
            "region" => "CUSCO",
            "superficie" => "54",
            "altitud" => "2991",
            "latitud" => "-13.4278",
            "longitud" => "-71.8669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 728,
            "ubigeo_reniec" => "070408",
            "ubigeo_inei" => "080408",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0804",
            "provincia" => "CALCA",
            "distrito" => "YANATILE",
            "region" => "CUSCO",
            "superficie" => "3080",
            "altitud" => "1148",
            "latitud" => "-12.6817",
            "longitud" => "-72.2772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 729,
            "ubigeo_reniec" => "070501",
            "ubigeo_inei" => "080501",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "YANAOCA",
            "region" => "CUSCO",
            "superficie" => "293",
            "altitud" => "3925",
            "latitud" => "-14.2167",
            "longitud" => "-71.4322"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 730,
            "ubigeo_reniec" => "070502",
            "ubigeo_inei" => "080502",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "CHECCA",
            "region" => "CUSCO",
            "superficie" => "504",
            "altitud" => "3834",
            "latitud" => "-14.4733",
            "longitud" => "-71.3947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 731,
            "ubigeo_reniec" => "070503",
            "ubigeo_inei" => "080503",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "KUNTURKANKI",
            "region" => "CUSCO",
            "superficie" => "376",
            "altitud" => "3961",
            "latitud" => "-14.5347",
            "longitud" => "-71.3069"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 732,
            "ubigeo_reniec" => "070504",
            "ubigeo_inei" => "080504",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "LANGUI",
            "region" => "CUSCO",
            "superficie" => "187",
            "altitud" => "3967",
            "latitud" => "-14.4322",
            "longitud" => "-71.2728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 733,
            "ubigeo_reniec" => "070505",
            "ubigeo_inei" => "080505",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "LAYO",
            "region" => "CUSCO",
            "superficie" => "453",
            "altitud" => "3997",
            "latitud" => "-14.4942",
            "longitud" => "-71.1556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 734,
            "ubigeo_reniec" => "070506",
            "ubigeo_inei" => "080506",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "PAMPAMARCA",
            "region" => "CUSCO",
            "superficie" => "30",
            "altitud" => "3820",
            "latitud" => "-14.1475",
            "longitud" => "-71.4603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 735,
            "ubigeo_reniec" => "070507",
            "ubigeo_inei" => "080507",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "QUEHUE",
            "region" => "CUSCO",
            "superficie" => "143",
            "altitud" => "3794",
            "latitud" => "-14.3803",
            "longitud" => "-71.4556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 736,
            "ubigeo_reniec" => "070508",
            "ubigeo_inei" => "080508",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0805",
            "provincia" => "CANAS",
            "distrito" => "TUPAC AMARU",
            "region" => "CUSCO",
            "superficie" => "118",
            "altitud" => "3809",
            "latitud" => "-14.1639",
            "longitud" => "-71.4761"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 737,
            "ubigeo_reniec" => "070601",
            "ubigeo_inei" => "080601",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "SICUANI",
            "region" => "CUSCO",
            "superficie" => "646",
            "altitud" => "3593",
            "latitud" => "-14.2381",
            "longitud" => "-71.2308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 738,
            "ubigeo_reniec" => "070603",
            "ubigeo_inei" => "080602",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "CHECACUPE",
            "region" => "CUSCO",
            "superficie" => "962",
            "altitud" => "3459",
            "latitud" => "-14.0253",
            "longitud" => "-71.4539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 739,
            "ubigeo_reniec" => "070602",
            "ubigeo_inei" => "080603",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "COMBAPATA",
            "region" => "CUSCO",
            "superficie" => "183",
            "altitud" => "3500",
            "latitud" => "-14.1019",
            "longitud" => "-71.43"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 740,
            "ubigeo_reniec" => "070604",
            "ubigeo_inei" => "080604",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "MARANGANI",
            "region" => "CUSCO",
            "superficie" => "433",
            "altitud" => "3720",
            "latitud" => "-14.3567",
            "longitud" => "-71.1686"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 741,
            "ubigeo_reniec" => "070605",
            "ubigeo_inei" => "080605",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "PITUMARCA",
            "region" => "CUSCO",
            "superficie" => "1118",
            "altitud" => "3587",
            "latitud" => "-13.9803",
            "longitud" => "-71.4175"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 742,
            "ubigeo_reniec" => "070606",
            "ubigeo_inei" => "080606",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "SAN PABLO",
            "region" => "CUSCO",
            "superficie" => "524",
            "altitud" => "3501",
            "latitud" => "-14.2022",
            "longitud" => "-71.315"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 743,
            "ubigeo_reniec" => "070607",
            "ubigeo_inei" => "080607",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "SAN PEDRO",
            "region" => "CUSCO",
            "superficie" => "55",
            "altitud" => "3515",
            "latitud" => "-14.1861",
            "longitud" => "-71.3431"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 744,
            "ubigeo_reniec" => "070608",
            "ubigeo_inei" => "080608",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0806",
            "provincia" => "CANCHIS",
            "distrito" => "TINTA",
            "region" => "CUSCO",
            "superficie" => "79",
            "altitud" => "3496",
            "latitud" => "-14.1453",
            "longitud" => "-71.4072"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 745,
            "ubigeo_reniec" => "070701",
            "ubigeo_inei" => "080701",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "SANTO TOMAS",
            "region" => "CUSCO",
            "superficie" => "1924",
            "altitud" => "3676",
            "latitud" => "-14.4533",
            "longitud" => "-72.0822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 746,
            "ubigeo_reniec" => "070702",
            "ubigeo_inei" => "080702",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "CAPACMARCA",
            "region" => "CUSCO",
            "superficie" => "272",
            "altitud" => "3563",
            "latitud" => "-14.0072",
            "longitud" => "-72.0025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 747,
            "ubigeo_reniec" => "070704",
            "ubigeo_inei" => "080703",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "CHAMACA",
            "region" => "CUSCO",
            "superficie" => "674",
            "altitud" => "3779",
            "latitud" => "-14.3025",
            "longitud" => "-71.8522"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 748,
            "ubigeo_reniec" => "070703",
            "ubigeo_inei" => "080704",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "COLQUEMARCA",
            "region" => "CUSCO",
            "superficie" => "449",
            "altitud" => "3606",
            "latitud" => "-14.2853",
            "longitud" => "-72.04"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 749,
            "ubigeo_reniec" => "070705",
            "ubigeo_inei" => "080705",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "LIVITACA",
            "region" => "CUSCO",
            "superficie" => "758",
            "altitud" => "3774",
            "latitud" => "-14.3128",
            "longitud" => "-71.6897"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 750,
            "ubigeo_reniec" => "070706",
            "ubigeo_inei" => "080706",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "LLUSCO",
            "region" => "CUSCO",
            "superficie" => "315",
            "altitud" => "3522",
            "latitud" => "-14.3375",
            "longitud" => "-72.1136"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 751,
            "ubigeo_reniec" => "070707",
            "ubigeo_inei" => "080707",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "QUIŃOTA",
            "region" => "CUSCO",
            "superficie" => "221",
            "altitud" => "3607",
            "latitud" => "-14.3111",
            "longitud" => "-72.1386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 752,
            "ubigeo_reniec" => "070708",
            "ubigeo_inei" => "080708",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0807",
            "provincia" => "CHUMBIVILCAS",
            "distrito" => "VELILLE",
            "region" => "CUSCO",
            "superficie" => "757",
            "altitud" => "3766",
            "latitud" => "-14.5086",
            "longitud" => "-71.8811"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 753,
            "ubigeo_reniec" => "070801",
            "ubigeo_inei" => "080801",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "ESPINAR",
            "region" => "CUSCO",
            "superficie" => "748",
            "altitud" => "3976",
            "latitud" => "-14.7931",
            "longitud" => "-71.4133"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 754,
            "ubigeo_reniec" => "070802",
            "ubigeo_inei" => "080802",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "CONDOROMA",
            "region" => "CUSCO",
            "superficie" => "513",
            "altitud" => "4679",
            "latitud" => "-15.3006",
            "longitud" => "-71.1383"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 755,
            "ubigeo_reniec" => "070803",
            "ubigeo_inei" => "080803",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "COPORAQUE",
            "region" => "CUSCO",
            "superficie" => "1564",
            "altitud" => "3970",
            "latitud" => "-14.8003",
            "longitud" => "-71.5317"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 756,
            "ubigeo_reniec" => "070804",
            "ubigeo_inei" => "080804",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "OCORURO",
            "region" => "CUSCO",
            "superficie" => "353",
            "altitud" => "4104",
            "latitud" => "-15.0519",
            "longitud" => "-71.1292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 757,
            "ubigeo_reniec" => "070805",
            "ubigeo_inei" => "080805",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "PALLPATA",
            "region" => "CUSCO",
            "superficie" => "816",
            "altitud" => "4027",
            "latitud" => "-14.8903",
            "longitud" => "-71.21"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 758,
            "ubigeo_reniec" => "070806",
            "ubigeo_inei" => "080806",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "PICHIGUA",
            "region" => "CUSCO",
            "superficie" => "289",
            "altitud" => "3902",
            "latitud" => "-14.6781",
            "longitud" => "-71.4064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 759,
            "ubigeo_reniec" => "070807",
            "ubigeo_inei" => "080807",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "SUYCKUTAMBO",
            "region" => "CUSCO",
            "superficie" => "652",
            "altitud" => "4124",
            "latitud" => "-15.0086",
            "longitud" => "-71.6433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 760,
            "ubigeo_reniec" => "070808",
            "ubigeo_inei" => "080808",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0808",
            "provincia" => "ESPINAR",
            "distrito" => "ALTO PICHIGUA",
            "region" => "CUSCO",
            "superficie" => "376",
            "altitud" => "3999",
            "latitud" => "-14.7769",
            "longitud" => "-71.2508"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 761,
            "ubigeo_reniec" => "070901",
            "ubigeo_inei" => "080901",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "SANTA ANA",
            "region" => "CUSCO",
            "superficie" => "359",
            "altitud" => "1086",
            "latitud" => "-12.8628",
            "longitud" => "-72.6933"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 762,
            "ubigeo_reniec" => "070902",
            "ubigeo_inei" => "080902",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "ECHARATE",
            "region" => "CUSCO",
            "superficie" => "19136",
            "altitud" => "1059",
            "latitud" => "-12.7681",
            "longitud" => "-72.5761"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 763,
            "ubigeo_reniec" => "070903",
            "ubigeo_inei" => "080903",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "HUAYOPATA",
            "region" => "CUSCO",
            "superficie" => "524",
            "altitud" => "1597",
            "latitud" => "-13.0047",
            "longitud" => "-72.5544"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 764,
            "ubigeo_reniec" => "070904",
            "ubigeo_inei" => "080904",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "MARANURA",
            "region" => "CUSCO",
            "superficie" => "150",
            "altitud" => "1141",
            "latitud" => "-12.9628",
            "longitud" => "-72.6647"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 765,
            "ubigeo_reniec" => "070905",
            "ubigeo_inei" => "080905",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "OCOBAMBA",
            "region" => "CUSCO",
            "superficie" => "841",
            "altitud" => "1479",
            "latitud" => "-12.8717",
            "longitud" => "-72.4472"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 766,
            "ubigeo_reniec" => "070908",
            "ubigeo_inei" => "080906",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "QUELLOUNO",
            "region" => "CUSCO",
            "superficie" => "800",
            "altitud" => "784",
            "latitud" => "-12.6367",
            "longitud" => "-72.5572"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 767,
            "ubigeo_reniec" => "070909",
            "ubigeo_inei" => "080907",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "QUIMBIRI",
            "region" => "CUSCO",
            "superficie" => "906",
            "altitud" => "590",
            "latitud" => "-12.62",
            "longitud" => "-73.7892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 768,
            "ubigeo_reniec" => "070906",
            "ubigeo_inei" => "080908",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "SANTA TERESA",
            "region" => "CUSCO",
            "superficie" => "1340",
            "altitud" => "1572",
            "latitud" => "-13.1306",
            "longitud" => "-72.5939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 769,
            "ubigeo_reniec" => "070907",
            "ubigeo_inei" => "080909",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "VILCABAMBA",
            "region" => "CUSCO",
            "superficie" => "3319",
            "altitud" => "2656",
            "latitud" => "-13.0631",
            "longitud" => "-72.9344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 770,
            "ubigeo_reniec" => "070910",
            "ubigeo_inei" => "080910",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "PICHARI",
            "region" => "CUSCO",
            "superficie" => "730",
            "altitud" => "596",
            "latitud" => "-12.5194",
            "longitud" => "-73.8292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 771,
            "ubigeo_reniec" => "070911",
            "ubigeo_inei" => "080911",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "INKAWASI",
            "region" => "CUSCO",
            "superficie" => "1102",
            "altitud" => "1771",
            "latitud" => "-13.29",
            "longitud" => "-73.2656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 772,
            "ubigeo_reniec" => "070912",
            "ubigeo_inei" => "080912",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "VILLA VIRGEN",
            "region" => "CUSCO",
            "superficie" => "626",
            "altitud" => "742",
            "latitud" => "-13.0028",
            "longitud" => "-73.5128"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 773,
            "ubigeo_reniec" => "070913",
            "ubigeo_inei" => "080913",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "VILLA KINTIARINA",
            "region" => "CUSCO",
            "superficie" => "229",
            "altitud" => "704",
            "latitud" => "-12.9189",
            "longitud" => "-73.5283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 774,
            "ubigeo_reniec" => "070915",
            "ubigeo_inei" => "080914",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "MEGANTONI",
            "region" => "CUSCO",
            "superficie" => "",
            "altitud" => "355",
            "latitud" => "-11.7203",
            "longitud" => "-72.9464"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 775,
            "ubigeo_reniec" => "071001",
            "ubigeo_inei" => "081001",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "PARURO",
            "region" => "CUSCO",
            "superficie" => "153",
            "altitud" => "3086",
            "latitud" => "-13.7617",
            "longitud" => "-71.8478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 776,
            "ubigeo_reniec" => "071002",
            "ubigeo_inei" => "081002",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "ACCHA",
            "region" => "CUSCO",
            "superficie" => "245",
            "altitud" => "3601",
            "latitud" => "-13.9711",
            "longitud" => "-71.8314"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 777,
            "ubigeo_reniec" => "071003",
            "ubigeo_inei" => "081003",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "CCAPI",
            "region" => "CUSCO",
            "superficie" => "335",
            "altitud" => "3227",
            "latitud" => "-13.8531",
            "longitud" => "-72.0825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 778,
            "ubigeo_reniec" => "071004",
            "ubigeo_inei" => "081004",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "COLCHA",
            "region" => "CUSCO",
            "superficie" => "140",
            "altitud" => "2827",
            "latitud" => "-13.8519",
            "longitud" => "-71.8033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 779,
            "ubigeo_reniec" => "071005",
            "ubigeo_inei" => "081005",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "HUANOQUITE",
            "region" => "CUSCO",
            "superficie" => "363",
            "altitud" => "3391",
            "latitud" => "-13.6819",
            "longitud" => "-72.0181"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 780,
            "ubigeo_reniec" => "071006",
            "ubigeo_inei" => "081006",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "OMACHA",
            "region" => "CUSCO",
            "superficie" => "436",
            "altitud" => "3887",
            "latitud" => "-14.0694",
            "longitud" => "-71.7381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 781,
            "ubigeo_reniec" => "071008",
            "ubigeo_inei" => "081007",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "PACCARITAMBO",
            "region" => "CUSCO",
            "superficie" => "143",
            "altitud" => "3602",
            "latitud" => "-13.7564",
            "longitud" => "-71.9567"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 782,
            "ubigeo_reniec" => "071009",
            "ubigeo_inei" => "081008",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "PILLPINTO",
            "region" => "CUSCO",
            "superficie" => "79",
            "altitud" => "2869",
            "latitud" => "-13.9536",
            "longitud" => "-71.7606"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 783,
            "ubigeo_reniec" => "071007",
            "ubigeo_inei" => "081009",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0810",
            "provincia" => "PARURO",
            "distrito" => "YAURISQUE",
            "region" => "CUSCO",
            "superficie" => "91",
            "altitud" => "3324",
            "latitud" => "-13.6653",
            "longitud" => "-71.9206"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 784,
            "ubigeo_reniec" => "071101",
            "ubigeo_inei" => "081101",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "PAUCARTAMBO",
            "region" => "CUSCO",
            "superficie" => "1079",
            "altitud" => "2917",
            "latitud" => "-13.3178",
            "longitud" => "-71.5967"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 785,
            "ubigeo_reniec" => "071102",
            "ubigeo_inei" => "081102",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "CAICAY",
            "region" => "CUSCO",
            "superficie" => "111",
            "altitud" => "3128",
            "latitud" => "-13.5972",
            "longitud" => "-71.6967"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 786,
            "ubigeo_reniec" => "071104",
            "ubigeo_inei" => "081103",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "CHALLABAMBA",
            "region" => "CUSCO",
            "superficie" => "747",
            "altitud" => "2845",
            "latitud" => "-13.215",
            "longitud" => "-71.6486"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 787,
            "ubigeo_reniec" => "071103",
            "ubigeo_inei" => "081104",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "COLQUEPATA",
            "region" => "CUSCO",
            "superficie" => "468",
            "altitud" => "3690",
            "latitud" => "-13.3603",
            "longitud" => "-71.6736"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 788,
            "ubigeo_reniec" => "071106",
            "ubigeo_inei" => "081105",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "HUANCARANI",
            "region" => "CUSCO",
            "superficie" => "145",
            "altitud" => "3871",
            "latitud" => "-13.5033",
            "longitud" => "-71.6544"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 789,
            "ubigeo_reniec" => "071105",
            "ubigeo_inei" => "081106",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0811",
            "provincia" => "PAUCARTAMBO",
            "distrito" => "KOSŃIPATA",
            "region" => "CUSCO",
            "superficie" => "3746",
            "altitud" => "544",
            "latitud" => "-12.9094",
            "longitud" => "-71.4033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 790,
            "ubigeo_reniec" => "071201",
            "ubigeo_inei" => "081201",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "URCOS",
            "region" => "CUSCO",
            "superficie" => "135",
            "altitud" => "3179",
            "latitud" => "-13.6878",
            "longitud" => "-71.6253"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 791,
            "ubigeo_reniec" => "071202",
            "ubigeo_inei" => "081202",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "ANDAHUAYLILLAS",
            "region" => "CUSCO",
            "superficie" => "85",
            "altitud" => "3139",
            "latitud" => "-13.6733",
            "longitud" => "-71.6778"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 792,
            "ubigeo_reniec" => "071203",
            "ubigeo_inei" => "081203",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "CAMANTI",
            "region" => "CUSCO",
            "superficie" => "3175",
            "altitud" => "647",
            "latitud" => "-13.2314",
            "longitud" => "-70.7544"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 793,
            "ubigeo_reniec" => "071204",
            "ubigeo_inei" => "081204",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "CCARHUAYO",
            "region" => "CUSCO",
            "superficie" => "314",
            "altitud" => "3481",
            "latitud" => "-13.5953",
            "longitud" => "-71.3997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 794,
            "ubigeo_reniec" => "071205",
            "ubigeo_inei" => "081205",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "CCATCA",
            "region" => "CUSCO",
            "superficie" => "308",
            "altitud" => "3714",
            "latitud" => "-13.6053",
            "longitud" => "-71.5636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 795,
            "ubigeo_reniec" => "071206",
            "ubigeo_inei" => "081206",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "CUSIPATA",
            "region" => "CUSCO",
            "superficie" => "248",
            "altitud" => "3332",
            "latitud" => "-13.9069",
            "longitud" => "-71.5025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 796,
            "ubigeo_reniec" => "071207",
            "ubigeo_inei" => "081207",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "HUARO",
            "region" => "CUSCO",
            "superficie" => "106",
            "altitud" => "3168",
            "latitud" => "-13.6903",
            "longitud" => "-71.6403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 797,
            "ubigeo_reniec" => "071208",
            "ubigeo_inei" => "081208",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "LUCRE",
            "region" => "CUSCO",
            "superficie" => "119",
            "altitud" => "3117",
            "latitud" => "-13.6339",
            "longitud" => "-71.7367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 798,
            "ubigeo_reniec" => "071209",
            "ubigeo_inei" => "081209",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "MARCAPATA",
            "region" => "CUSCO",
            "superficie" => "1688",
            "altitud" => "3111",
            "latitud" => "-13.5917",
            "longitud" => "-70.975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 799,
            "ubigeo_reniec" => "071210",
            "ubigeo_inei" => "081210",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "OCONGATE",
            "region" => "CUSCO",
            "superficie" => "953",
            "altitud" => "3549",
            "latitud" => "-13.6267",
            "longitud" => "-71.3883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 800,
            "ubigeo_reniec" => "071211",
            "ubigeo_inei" => "081211",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "OROPESA",
            "region" => "CUSCO",
            "superficie" => "74",
            "altitud" => "3139",
            "latitud" => "-13.5944",
            "longitud" => "-71.7631"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 801,
            "ubigeo_reniec" => "071212",
            "ubigeo_inei" => "081212",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0812",
            "provincia" => "QUISPICANCHI",
            "distrito" => "QUIQUIJANA",
            "region" => "CUSCO",
            "superficie" => "361",
            "altitud" => "3211",
            "latitud" => "-13.8225",
            "longitud" => "-71.5425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 802,
            "ubigeo_reniec" => "071301",
            "ubigeo_inei" => "081301",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "URUBAMBA",
            "region" => "CUSCO",
            "superficie" => "128",
            "altitud" => "2885",
            "latitud" => "-13.3056",
            "longitud" => "-72.1161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 803,
            "ubigeo_reniec" => "071302",
            "ubigeo_inei" => "081302",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "CHINCHERO",
            "region" => "CUSCO",
            "superficie" => "95",
            "altitud" => "3759",
            "latitud" => "-13.3919",
            "longitud" => "-72.0489"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 804,
            "ubigeo_reniec" => "071303",
            "ubigeo_inei" => "081303",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "HUAYLLABAMBA",
            "region" => "CUSCO",
            "superficie" => "102",
            "altitud" => "2890",
            "latitud" => "-13.3381",
            "longitud" => "-72.065"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 805,
            "ubigeo_reniec" => "071304",
            "ubigeo_inei" => "081304",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "MACHUPICCHU",
            "region" => "CUSCO",
            "superficie" => "271",
            "altitud" => "2092",
            "latitud" => "-13.1542",
            "longitud" => "-72.5256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 806,
            "ubigeo_reniec" => "071305",
            "ubigeo_inei" => "081305",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "MARAS",
            "region" => "CUSCO",
            "superficie" => "132",
            "altitud" => "3381",
            "latitud" => "-13.3325",
            "longitud" => "-72.1564"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 807,
            "ubigeo_reniec" => "071306",
            "ubigeo_inei" => "081306",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "OLLANTAYTAMBO",
            "region" => "CUSCO",
            "superficie" => "640",
            "altitud" => "2871",
            "latitud" => "-13.2589",
            "longitud" => "-72.2633"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 808,
            "ubigeo_reniec" => "071307",
            "ubigeo_inei" => "081307",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0813",
            "provincia" => "URUBAMBA",
            "distrito" => "YUCAY",
            "region" => "CUSCO",
            "superficie" => "71",
            "altitud" => "2878",
            "latitud" => "-13.3217",
            "longitud" => "-72.0839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 809,
            "ubigeo_reniec" => "080101",
            "ubigeo_inei" => "090101",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "HUANCAVELICA",
            "region" => "HUANCAVELICA",
            "superficie" => "514",
            "altitud" => "3746",
            "latitud" => "-12.7869",
            "longitud" => "-74.9714"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 810,
            "ubigeo_reniec" => "080102",
            "ubigeo_inei" => "090102",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "ACOBAMBILLA",
            "region" => "HUANCAVELICA",
            "superficie" => "758",
            "altitud" => "3839",
            "latitud" => "-12.6644",
            "longitud" => "-75.3242"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 811,
            "ubigeo_reniec" => "080103",
            "ubigeo_inei" => "090103",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "ACORIA",
            "region" => "HUANCAVELICA",
            "superficie" => "535",
            "altitud" => "3207",
            "latitud" => "-12.6425",
            "longitud" => "-74.8617"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 812,
            "ubigeo_reniec" => "080104",
            "ubigeo_inei" => "090104",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "CONAYCA",
            "region" => "HUANCAVELICA",
            "superficie" => "38",
            "altitud" => "3709",
            "latitud" => "-12.52",
            "longitud" => "-75.0067"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 813,
            "ubigeo_reniec" => "080105",
            "ubigeo_inei" => "090105",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "CUENCA",
            "region" => "HUANCAVELICA",
            "superficie" => "50",
            "altitud" => "3186",
            "latitud" => "-12.4331",
            "longitud" => "-75.0389"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 814,
            "ubigeo_reniec" => "080106",
            "ubigeo_inei" => "090106",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "HUACHOCOLPA",
            "region" => "HUANCAVELICA",
            "superficie" => "336",
            "altitud" => "4020",
            "latitud" => "-13.0319",
            "longitud" => "-74.9469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 815,
            "ubigeo_reniec" => "080108",
            "ubigeo_inei" => "090107",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "HUAYLLAHUARA",
            "region" => "HUANCAVELICA",
            "superficie" => "39",
            "altitud" => "3901",
            "latitud" => "-12.4092",
            "longitud" => "-75.1783"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 816,
            "ubigeo_reniec" => "080109",
            "ubigeo_inei" => "090108",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "IZCUCHACA",
            "region" => "HUANCAVELICA",
            "superficie" => "12",
            "altitud" => "2930",
            "latitud" => "-12.5",
            "longitud" => "-74.9978"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 817,
            "ubigeo_reniec" => "080110",
            "ubigeo_inei" => "090109",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "LARIA",
            "region" => "HUANCAVELICA",
            "superficie" => "78",
            "altitud" => "3893",
            "latitud" => "-12.5611",
            "longitud" => "-75.0369"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 818,
            "ubigeo_reniec" => "080111",
            "ubigeo_inei" => "090110",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "MANTA",
            "region" => "HUANCAVELICA",
            "superficie" => "154",
            "altitud" => "3735",
            "latitud" => "-12.6206",
            "longitud" => "-75.2111"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 819,
            "ubigeo_reniec" => "080112",
            "ubigeo_inei" => "090111",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "MARISCAL CACERES",
            "region" => "HUANCAVELICA",
            "superficie" => "6",
            "altitud" => "2852",
            "latitud" => "-12.5344",
            "longitud" => "-74.9325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 820,
            "ubigeo_reniec" => "080113",
            "ubigeo_inei" => "090112",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "MOYA",
            "region" => "HUANCAVELICA",
            "superficie" => "94",
            "altitud" => "3148",
            "latitud" => "-12.4233",
            "longitud" => "-75.1539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 821,
            "ubigeo_reniec" => "080114",
            "ubigeo_inei" => "090113",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "NUEVO OCCORO",
            "region" => "HUANCAVELICA",
            "superficie" => "212",
            "altitud" => "3939",
            "latitud" => "-12.595",
            "longitud" => "-75.0197"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 822,
            "ubigeo_reniec" => "080115",
            "ubigeo_inei" => "090114",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "PALCA",
            "region" => "HUANCAVELICA",
            "superficie" => "82",
            "altitud" => "3714",
            "latitud" => "-12.6569",
            "longitud" => "-74.9803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 823,
            "ubigeo_reniec" => "080116",
            "ubigeo_inei" => "090115",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "PILCHACA",
            "region" => "HUANCAVELICA",
            "superficie" => "43",
            "altitud" => "3604",
            "latitud" => "-12.4014",
            "longitud" => "-75.0839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 824,
            "ubigeo_reniec" => "080117",
            "ubigeo_inei" => "090116",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "VILCA",
            "region" => "HUANCAVELICA",
            "superficie" => "318",
            "altitud" => "3280",
            "latitud" => "-12.4772",
            "longitud" => "-75.1833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 825,
            "ubigeo_reniec" => "080118",
            "ubigeo_inei" => "090117",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "YAULI",
            "region" => "HUANCAVELICA",
            "superficie" => "320",
            "altitud" => "3424",
            "latitud" => "-12.7692",
            "longitud" => "-74.8508"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 826,
            "ubigeo_reniec" => "080119",
            "ubigeo_inei" => "090118",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "ASCENSION",
            "region" => "HUANCAVELICA",
            "superficie" => "432",
            "altitud" => "3711",
            "latitud" => "-12.7853",
            "longitud" => "-74.9769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 827,
            "ubigeo_reniec" => "080120",
            "ubigeo_inei" => "090119",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0901",
            "provincia" => "HUANCAVELICA",
            "distrito" => "HUANDO",
            "region" => "HUANCAVELICA",
            "superficie" => "194",
            "altitud" => "3610",
            "latitud" => "-12.5642",
            "longitud" => "-74.9478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 828,
            "ubigeo_reniec" => "080201",
            "ubigeo_inei" => "090201",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "ACOBAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "123",
            "altitud" => "3449",
            "latitud" => "-12.8431",
            "longitud" => "-74.5692"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 829,
            "ubigeo_reniec" => "080203",
            "ubigeo_inei" => "090202",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "ANDABAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "82",
            "altitud" => "3499",
            "latitud" => "-12.6936",
            "longitud" => "-74.6233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 830,
            "ubigeo_reniec" => "080202",
            "ubigeo_inei" => "090203",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "ANTA",
            "region" => "HUANCAVELICA",
            "superficie" => "91",
            "altitud" => "3618",
            "latitud" => "-12.8122",
            "longitud" => "-74.6383"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 831,
            "ubigeo_reniec" => "080204",
            "ubigeo_inei" => "090204",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "CAJA",
            "region" => "HUANCAVELICA",
            "superficie" => "82",
            "altitud" => "3383",
            "latitud" => "-12.9172",
            "longitud" => "-74.4658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 832,
            "ubigeo_reniec" => "080205",
            "ubigeo_inei" => "090205",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "MARCAS",
            "region" => "HUANCAVELICA",
            "superficie" => "156",
            "altitud" => "3411",
            "latitud" => "-12.8903",
            "longitud" => "-74.3981"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 833,
            "ubigeo_reniec" => "080206",
            "ubigeo_inei" => "090206",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "PAUCARA",
            "region" => "HUANCAVELICA",
            "superficie" => "226",
            "altitud" => "3833",
            "latitud" => "-12.7297",
            "longitud" => "-74.6664"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 834,
            "ubigeo_reniec" => "080207",
            "ubigeo_inei" => "090207",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "POMACOCHA",
            "region" => "HUANCAVELICA",
            "superficie" => "54",
            "altitud" => "3156",
            "latitud" => "-12.8739",
            "longitud" => "-74.5317"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 835,
            "ubigeo_reniec" => "080208",
            "ubigeo_inei" => "090208",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0902",
            "provincia" => "ACOBAMBA",
            "distrito" => "ROSARIO",
            "region" => "HUANCAVELICA",
            "superficie" => "97",
            "altitud" => "3687",
            "latitud" => "-12.7208",
            "longitud" => "-74.5825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 836,
            "ubigeo_reniec" => "080301",
            "ubigeo_inei" => "090301",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "LIRCAY",
            "region" => "HUANCAVELICA",
            "superficie" => "819",
            "altitud" => "3345",
            "latitud" => "-12.9828",
            "longitud" => "-74.7183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 837,
            "ubigeo_reniec" => "080302",
            "ubigeo_inei" => "090302",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "ANCHONGA",
            "region" => "HUANCAVELICA",
            "superficie" => "72",
            "altitud" => "3310",
            "latitud" => "-12.9131",
            "longitud" => "-74.6914"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 838,
            "ubigeo_reniec" => "080303",
            "ubigeo_inei" => "090303",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "CALLANMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "26",
            "altitud" => "3553",
            "latitud" => "-12.8667",
            "longitud" => "-74.6233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 839,
            "ubigeo_reniec" => "080312",
            "ubigeo_inei" => "090304",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "CCOCHACCASA",
            "region" => "HUANCAVELICA",
            "superficie" => "117",
            "altitud" => "4190",
            "latitud" => "-12.9253",
            "longitud" => "-74.7703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 840,
            "ubigeo_reniec" => "080305",
            "ubigeo_inei" => "090305",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "CHINCHO",
            "region" => "HUANCAVELICA",
            "superficie" => "183",
            "altitud" => "3141",
            "latitud" => "-12.9728",
            "longitud" => "-74.3672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 841,
            "ubigeo_reniec" => "080304",
            "ubigeo_inei" => "090306",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "CONGALLA",
            "region" => "HUANCAVELICA",
            "superficie" => "216",
            "altitud" => "3537",
            "latitud" => "-12.9558",
            "longitud" => "-74.4922"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 842,
            "ubigeo_reniec" => "080307",
            "ubigeo_inei" => "090307",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "HUANCA-HUANCA",
            "region" => "HUANCAVELICA",
            "superficie" => "110",
            "altitud" => "3590",
            "latitud" => "-12.9186",
            "longitud" => "-74.61"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 843,
            "ubigeo_reniec" => "080306",
            "ubigeo_inei" => "090308",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "HUAYLLAY GRANDE",
            "region" => "HUANCAVELICA",
            "superficie" => "33",
            "altitud" => "3622",
            "latitud" => "-12.9428",
            "longitud" => "-74.7017"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 844,
            "ubigeo_reniec" => "080308",
            "ubigeo_inei" => "090309",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "JULCAMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "49",
            "altitud" => "3431",
            "latitud" => "-13.0147",
            "longitud" => "-74.4444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 845,
            "ubigeo_reniec" => "080309",
            "ubigeo_inei" => "090310",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "SAN ANTONIO DE ANTAPARCO",
            "region" => "HUANCAVELICA",
            "superficie" => "33",
            "altitud" => "2767",
            "latitud" => "-13.0761",
            "longitud" => "-74.4117"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 846,
            "ubigeo_reniec" => "080310",
            "ubigeo_inei" => "090311",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "SANTO TOMAS DE PATA",
            "region" => "HUANCAVELICA",
            "superficie" => "134",
            "altitud" => "3150",
            "latitud" => "-13.1131",
            "longitud" => "-74.4189"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 847,
            "ubigeo_reniec" => "080311",
            "ubigeo_inei" => "090312",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0903",
            "provincia" => "ANGARAES",
            "distrito" => "SECCLLA",
            "region" => "HUANCAVELICA",
            "superficie" => "168",
            "altitud" => "3363",
            "latitud" => "-13.0511",
            "longitud" => "-74.4836"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 848,
            "ubigeo_reniec" => "080401",
            "ubigeo_inei" => "090401",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "CASTROVIRREYNA",
            "region" => "HUANCAVELICA",
            "superficie" => "938",
            "altitud" => "3989",
            "latitud" => "-13.2833",
            "longitud" => "-75.3183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 849,
            "ubigeo_reniec" => "080402",
            "ubigeo_inei" => "090402",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "ARMA",
            "region" => "HUANCAVELICA",
            "superficie" => "305",
            "altitud" => "3361",
            "latitud" => "-13.1264",
            "longitud" => "-75.5419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 850,
            "ubigeo_reniec" => "080403",
            "ubigeo_inei" => "090403",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "AURAHUA",
            "region" => "HUANCAVELICA",
            "superficie" => "361",
            "altitud" => "3483",
            "latitud" => "-13.0347",
            "longitud" => "-75.5703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 851,
            "ubigeo_reniec" => "080405",
            "ubigeo_inei" => "090404",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "CAPILLAS",
            "region" => "HUANCAVELICA",
            "superficie" => "398",
            "altitud" => "3224",
            "latitud" => "-13.2931",
            "longitud" => "-75.5425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 852,
            "ubigeo_reniec" => "080408",
            "ubigeo_inei" => "090405",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "CHUPAMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "374",
            "altitud" => "3433",
            "latitud" => "-13.0372",
            "longitud" => "-75.6083"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 853,
            "ubigeo_reniec" => "080406",
            "ubigeo_inei" => "090406",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "COCAS",
            "region" => "HUANCAVELICA",
            "superficie" => "88",
            "altitud" => "3253",
            "latitud" => "-13.2758",
            "longitud" => "-75.3728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 854,
            "ubigeo_reniec" => "080409",
            "ubigeo_inei" => "090407",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "HUACHOS",
            "region" => "HUANCAVELICA",
            "superficie" => "172",
            "altitud" => "2784",
            "latitud" => "-13.2197",
            "longitud" => "-75.5339"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 855,
            "ubigeo_reniec" => "080410",
            "ubigeo_inei" => "090408",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "HUAMATAMBO",
            "region" => "HUANCAVELICA",
            "superficie" => "54",
            "altitud" => "3058",
            "latitud" => "-13.0944",
            "longitud" => "-75.6772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 856,
            "ubigeo_reniec" => "080414",
            "ubigeo_inei" => "090409",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "MOLLEPAMPA",
            "region" => "HUANCAVELICA",
            "superficie" => "166",
            "altitud" => "2500",
            "latitud" => "-13.3114",
            "longitud" => "-75.41"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 857,
            "ubigeo_reniec" => "080422",
            "ubigeo_inei" => "090410",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "SAN JUAN",
            "region" => "HUANCAVELICA",
            "superficie" => "207",
            "altitud" => "1936",
            "latitud" => "-13.2039",
            "longitud" => "-75.6344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 858,
            "ubigeo_reniec" => "080429",
            "ubigeo_inei" => "090411",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "SANTA ANA",
            "region" => "HUANCAVELICA",
            "superficie" => "622",
            "altitud" => "4518",
            "latitud" => "-13.0719",
            "longitud" => "-75.1403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 859,
            "ubigeo_reniec" => "080427",
            "ubigeo_inei" => "090412",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "TANTARA",
            "region" => "HUANCAVELICA",
            "superficie" => "113",
            "altitud" => "2899",
            "latitud" => "-13.0742",
            "longitud" => "-75.6447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 860,
            "ubigeo_reniec" => "080428",
            "ubigeo_inei" => "090413",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0904",
            "provincia" => "CASTROVIRREYNA",
            "distrito" => "TICRAPO",
            "region" => "HUANCAVELICA",
            "superficie" => "187",
            "altitud" => "2140",
            "latitud" => "-13.3825",
            "longitud" => "-75.4325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 861,
            "ubigeo_reniec" => "080701",
            "ubigeo_inei" => "090501",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "CHURCAMPA",
            "region" => "HUANCAVELICA",
            "superficie" => "135",
            "altitud" => "3295",
            "latitud" => "-12.7392",
            "longitud" => "-74.3872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 862,
            "ubigeo_reniec" => "080702",
            "ubigeo_inei" => "090502",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "ANCO",
            "region" => "HUANCAVELICA",
            "superficie" => "150",
            "altitud" => "2463",
            "latitud" => "-12.6825",
            "longitud" => "-74.5872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 863,
            "ubigeo_reniec" => "080703",
            "ubigeo_inei" => "090503",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "CHINCHIHUASI",
            "region" => "HUANCAVELICA",
            "superficie" => "162",
            "altitud" => "2803",
            "latitud" => "-12.5169",
            "longitud" => "-74.5458"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 864,
            "ubigeo_reniec" => "080704",
            "ubigeo_inei" => "090504",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "EL CARMEN",
            "region" => "HUANCAVELICA",
            "superficie" => "77",
            "altitud" => "3152",
            "latitud" => "-12.7269",
            "longitud" => "-74.4808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 865,
            "ubigeo_reniec" => "080705",
            "ubigeo_inei" => "090505",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "LA MERCED",
            "region" => "HUANCAVELICA",
            "superficie" => "73",
            "altitud" => "2683",
            "latitud" => "-12.7881",
            "longitud" => "-74.3586"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 866,
            "ubigeo_reniec" => "080706",
            "ubigeo_inei" => "090506",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "LOCROJA",
            "region" => "HUANCAVELICA",
            "superficie" => "92",
            "altitud" => "3417",
            "latitud" => "-12.7403",
            "longitud" => "-74.4419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 867,
            "ubigeo_reniec" => "080707",
            "ubigeo_inei" => "090507",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "PAUCARBAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "98",
            "altitud" => "3382",
            "latitud" => "-12.5539",
            "longitud" => "-74.5319"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 868,
            "ubigeo_reniec" => "080708",
            "ubigeo_inei" => "090508",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "SAN MIGUEL DE MAYOCC",
            "region" => "HUANCAVELICA",
            "superficie" => "38",
            "altitud" => "2228",
            "latitud" => "-12.8058",
            "longitud" => "-74.39"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 869,
            "ubigeo_reniec" => "080709",
            "ubigeo_inei" => "090509",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "SAN PEDRO DE CORIS",
            "region" => "HUANCAVELICA",
            "superficie" => "129",
            "altitud" => "3580",
            "latitud" => "-12.5781",
            "longitud" => "-74.4117"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 870,
            "ubigeo_reniec" => "080710",
            "ubigeo_inei" => "090510",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "PACHAMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "156",
            "altitud" => "2792",
            "latitud" => "-12.5156",
            "longitud" => "-74.5267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 871,
            "ubigeo_reniec" => "080711",
            "ubigeo_inei" => "090511",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0905",
            "provincia" => "CHURCAMPA",
            "distrito" => "COSME",
            "region" => "HUANCAVELICA",
            "superficie" => "106",
            "altitud" => "3486",
            "latitud" => "-12.5733",
            "longitud" => "-74.6583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 872,
            "ubigeo_reniec" => "080604",
            "ubigeo_inei" => "090601",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "HUAYTARA",
            "region" => "HUANCAVELICA",
            "superficie" => "401",
            "altitud" => "2732",
            "latitud" => "-13.6047",
            "longitud" => "-75.3531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 873,
            "ubigeo_reniec" => "080601",
            "ubigeo_inei" => "090602",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "AYAVI",
            "region" => "HUANCAVELICA",
            "superficie" => "201",
            "altitud" => "3815",
            "latitud" => "-13.7031",
            "longitud" => "-75.3511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 874,
            "ubigeo_reniec" => "080602",
            "ubigeo_inei" => "090603",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "CORDOVA",
            "region" => "HUANCAVELICA",
            "superficie" => "105",
            "altitud" => "3242",
            "latitud" => "-14.0408",
            "longitud" => "-75.185"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 875,
            "ubigeo_reniec" => "080603",
            "ubigeo_inei" => "090604",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "HUAYACUNDO ARMA",
            "region" => "HUANCAVELICA",
            "superficie" => "13",
            "altitud" => "3116",
            "latitud" => "-13.5342",
            "longitud" => "-75.3144"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 876,
            "ubigeo_reniec" => "080605",
            "ubigeo_inei" => "090605",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "LARAMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "205",
            "altitud" => "3407",
            "latitud" => "-13.9486",
            "longitud" => "-75.0356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 877,
            "ubigeo_reniec" => "080606",
            "ubigeo_inei" => "090606",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "OCOYO",
            "region" => "HUANCAVELICA",
            "superficie" => "155",
            "altitud" => "1933",
            "latitud" => "-14.0081",
            "longitud" => "-75.0225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 878,
            "ubigeo_reniec" => "080607",
            "ubigeo_inei" => "090607",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "PILPICHACA",
            "region" => "HUANCAVELICA",
            "superficie" => "2163",
            "altitud" => "4090",
            "latitud" => "-13.3303",
            "longitud" => "-74.9772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 879,
            "ubigeo_reniec" => "080608",
            "ubigeo_inei" => "090608",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "QUERCO",
            "region" => "HUANCAVELICA",
            "superficie" => "697",
            "altitud" => "2903",
            "latitud" => "-13.9794",
            "longitud" => "-74.9769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 880,
            "ubigeo_reniec" => "080609",
            "ubigeo_inei" => "090609",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "QUITO-ARMA",
            "region" => "HUANCAVELICA",
            "superficie" => "222",
            "altitud" => "2944",
            "latitud" => "-13.5286",
            "longitud" => "-75.3275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 881,
            "ubigeo_reniec" => "080610",
            "ubigeo_inei" => "090610",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SAN ANTONIO DE CUSICANCHA",
            "region" => "HUANCAVELICA",
            "superficie" => "256",
            "altitud" => "3291",
            "latitud" => "-13.5025",
            "longitud" => "-75.2933"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 882,
            "ubigeo_reniec" => "080611",
            "ubigeo_inei" => "090611",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SAN FRANCISCO DE SANGAYAICO",
            "region" => "HUANCAVELICA",
            "superficie" => "71",
            "altitud" => "3420",
            "latitud" => "-13.7953",
            "longitud" => "-75.2492"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 883,
            "ubigeo_reniec" => "080612",
            "ubigeo_inei" => "090612",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SAN ISIDRO",
            "region" => "HUANCAVELICA",
            "superficie" => "175",
            "altitud" => "3656",
            "latitud" => "-13.9564",
            "longitud" => "-75.2381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 884,
            "ubigeo_reniec" => "080613",
            "ubigeo_inei" => "090613",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SANTIAGO DE CHOCORVOS",
            "region" => "HUANCAVELICA",
            "superficie" => "1150",
            "altitud" => "2638",
            "latitud" => "-13.8253",
            "longitud" => "-75.2575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 885,
            "ubigeo_reniec" => "080614",
            "ubigeo_inei" => "090614",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SANTIAGO DE QUIRAHUARA",
            "region" => "HUANCAVELICA",
            "superficie" => "169",
            "altitud" => "2801",
            "latitud" => "-14.0561",
            "longitud" => "-74.9764"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 886,
            "ubigeo_reniec" => "080615",
            "ubigeo_inei" => "090615",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "SANTO DOMINGO DE CAPILLAS",
            "region" => "HUANCAVELICA",
            "superficie" => "249",
            "altitud" => "3482",
            "latitud" => "-13.7372",
            "longitud" => "-75.2436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 887,
            "ubigeo_reniec" => "080616",
            "ubigeo_inei" => "090616",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0906",
            "provincia" => "HUAYTARA",
            "distrito" => "TAMBO",
            "region" => "HUANCAVELICA",
            "superficie" => "227",
            "altitud" => "3201",
            "latitud" => "-13.6894",
            "longitud" => "-75.275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 888,
            "ubigeo_reniec" => "080501",
            "ubigeo_inei" => "090701",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "PAMPAS",
            "region" => "HUANCAVELICA",
            "superficie" => "109",
            "altitud" => "3282",
            "latitud" => "-12.3992",
            "longitud" => "-74.8683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 889,
            "ubigeo_reniec" => "080502",
            "ubigeo_inei" => "090702",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "ACOSTAMBO",
            "region" => "HUANCAVELICA",
            "superficie" => "168",
            "altitud" => "3628",
            "latitud" => "-12.3656",
            "longitud" => "-75.055"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 890,
            "ubigeo_reniec" => "080503",
            "ubigeo_inei" => "090703",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "ACRAQUIA",
            "region" => "HUANCAVELICA",
            "superficie" => "110",
            "altitud" => "3281",
            "latitud" => "-12.4064",
            "longitud" => "-74.9011"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 891,
            "ubigeo_reniec" => "080504",
            "ubigeo_inei" => "090704",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "AHUAYCHA",
            "region" => "HUANCAVELICA",
            "superficie" => "91",
            "altitud" => "3279",
            "latitud" => "-12.4078",
            "longitud" => "-74.8911"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 892,
            "ubigeo_reniec" => "080506",
            "ubigeo_inei" => "090705",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "COLCABAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "312",
            "altitud" => "2953",
            "latitud" => "-12.4092",
            "longitud" => "-74.6794"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 893,
            "ubigeo_reniec" => "080509",
            "ubigeo_inei" => "090706",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "DANIEL HERNANDEZ",
            "region" => "HUANCAVELICA",
            "superficie" => "107",
            "altitud" => "3288",
            "latitud" => "-12.3894",
            "longitud" => "-74.8592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 894,
            "ubigeo_reniec" => "080511",
            "ubigeo_inei" => "090707",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "HUACHOCOLPA",
            "region" => "HUANCAVELICA",
            "superficie" => "292",
            "altitud" => "2913",
            "latitud" => "-12.0483",
            "longitud" => "-74.5947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 895,
            "ubigeo_reniec" => "080512",
            "ubigeo_inei" => "090709",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "HUARIBAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "151",
            "altitud" => "3019",
            "latitud" => "-12.2797",
            "longitud" => "-74.9383"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 896,
            "ubigeo_reniec" => "080515",
            "ubigeo_inei" => "090710",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "ŃAHUIMPUQUIO",
            "region" => "HUANCAVELICA",
            "superficie" => "67",
            "altitud" => "3651",
            "latitud" => "-12.3292",
            "longitud" => "-75.0694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 897,
            "ubigeo_reniec" => "080517",
            "ubigeo_inei" => "090711",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "PAZOS",
            "region" => "HUANCAVELICA",
            "superficie" => "228",
            "altitud" => "3820",
            "latitud" => "-12.2594",
            "longitud" => "-75.0706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 898,
            "ubigeo_reniec" => "080518",
            "ubigeo_inei" => "090713",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "QUISHUAR",
            "region" => "HUANCAVELICA",
            "superficie" => "32",
            "altitud" => "3137",
            "latitud" => "-12.2436",
            "longitud" => "-74.7772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 899,
            "ubigeo_reniec" => "080519",
            "ubigeo_inei" => "090714",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "SALCABAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "193",
            "altitud" => "3063",
            "latitud" => "-12.2017",
            "longitud" => "-74.7806"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 900,
            "ubigeo_reniec" => "080526",
            "ubigeo_inei" => "090715",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "SALCAHUASI",
            "region" => "HUANCAVELICA",
            "superficie" => "118",
            "altitud" => "3196",
            "latitud" => "-12.1042",
            "longitud" => "-74.7517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 901,
            "ubigeo_reniec" => "080520",
            "ubigeo_inei" => "090716",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "SAN MARCOS DE ROCCHAC",
            "region" => "HUANCAVELICA",
            "superficie" => "282",
            "altitud" => "3206",
            "latitud" => "-12.0939",
            "longitud" => "-74.8639"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 902,
            "ubigeo_reniec" => "080523",
            "ubigeo_inei" => "090717",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "SURCUBAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "272",
            "altitud" => "2626",
            "latitud" => "-12.1164",
            "longitud" => "-74.6306"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 903,
            "ubigeo_reniec" => "080525",
            "ubigeo_inei" => "090718",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "TINTAY PUNCU",
            "region" => "HUANCAVELICA",
            "superficie" => "258",
            "altitud" => "2410",
            "latitud" => "-12.1519",
            "longitud" => "-74.5444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 904,
            "ubigeo_reniec" => "080528",
            "ubigeo_inei" => "090719",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "QUICHUAS",
            "region" => "HUANCAVELICA",
            "superficie" => "114",
            "altitud" => "2706",
            "latitud" => "-12.4725",
            "longitud" => "-74.7675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 905,
            "ubigeo_reniec" => "080529",
            "ubigeo_inei" => "090720",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "ANDAYMARCA",
            "region" => "HUANCAVELICA",
            "superficie" => "145",
            "altitud" => "2896",
            "latitud" => "-12.3153",
            "longitud" => "-74.6353"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 906,
            "ubigeo_reniec" => "080530",
            "ubigeo_inei" => "090721",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "ROBLE",
            "region" => "HUANCAVELICA",
            "superficie" => "186",
            "altitud" => "2640",
            "latitud" => "-12.2167",
            "longitud" => "-74.4897"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 907,
            "ubigeo_reniec" => "080531",
            "ubigeo_inei" => "090722",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "PICHOS",
            "region" => "HUANCAVELICA",
            "superficie" => "145",
            "altitud" => "3297",
            "latitud" => "-12.2364",
            "longitud" => "-74.9386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 908,
            "ubigeo_reniec" => "080532",
            "ubigeo_inei" => "090723",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "SANTIAGO DE TUCUMA",
            "region" => "HUANCAVELICA",
            "superficie" => "",
            "altitud" => "3538",
            "latitud" => "-12.3142",
            "longitud" => "-74.89"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 909,
            "ubigeo_reniec" => "090101",
            "ubigeo_inei" => "100101",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "HUANUCO",
            "region" => "HUANUCO",
            "superficie" => "126",
            "altitud" => "1921",
            "latitud" => "-9.93",
            "longitud" => "-76.2397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 910,
            "ubigeo_reniec" => "090110",
            "ubigeo_inei" => "100102",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "AMARILIS",
            "region" => "HUANUCO",
            "superficie" => "132",
            "altitud" => "1950",
            "latitud" => "-9.94",
            "longitud" => "-76.2406"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 911,
            "ubigeo_reniec" => "090102",
            "ubigeo_inei" => "100103",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "CHINCHAO",
            "region" => "HUANUCO",
            "superficie" => "796",
            "altitud" => "2122",
            "latitud" => "-9.8017",
            "longitud" => "-76.0708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 912,
            "ubigeo_reniec" => "090103",
            "ubigeo_inei" => "100104",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "CHURUBAMBA",
            "region" => "HUANUCO",
            "superficie" => "507",
            "altitud" => "1954",
            "latitud" => "-9.8261",
            "longitud" => "-76.1339"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 913,
            "ubigeo_reniec" => "090104",
            "ubigeo_inei" => "100105",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "MARGOS",
            "region" => "HUANUCO",
            "superficie" => "207",
            "altitud" => "3555",
            "latitud" => "-10.0053",
            "longitud" => "-76.5233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 914,
            "ubigeo_reniec" => "090105",
            "ubigeo_inei" => "100106",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "QUISQUI",
            "region" => "HUANUCO",
            "superficie" => "173",
            "altitud" => "2427",
            "latitud" => "-9.9047",
            "longitud" => "-76.3925"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 915,
            "ubigeo_reniec" => "090106",
            "ubigeo_inei" => "100107",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "SAN FRANCISCO DE CAYRAN",
            "region" => "HUANUCO",
            "superficie" => "146",
            "altitud" => "2247",
            "latitud" => "-9.9808",
            "longitud" => "-76.2842"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 916,
            "ubigeo_reniec" => "090107",
            "ubigeo_inei" => "100108",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "SAN PEDRO DE CHAULAN",
            "region" => "HUANUCO",
            "superficie" => "266",
            "altitud" => "3587",
            "latitud" => "-10.0564",
            "longitud" => "-76.4856"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 917,
            "ubigeo_reniec" => "090108",
            "ubigeo_inei" => "100109",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "SANTA MARIA DEL VALLE",
            "region" => "HUANUCO",
            "superficie" => "447",
            "altitud" => "1939",
            "latitud" => "-9.8625",
            "longitud" => "-76.17"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 918,
            "ubigeo_reniec" => "090109",
            "ubigeo_inei" => "100110",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "YARUMAYO",
            "region" => "HUANUCO",
            "superficie" => "61",
            "altitud" => "3055",
            "latitud" => "-10.0044",
            "longitud" => "-76.4686"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 919,
            "ubigeo_reniec" => "090111",
            "ubigeo_inei" => "100111",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "PILLCO MARCA",
            "region" => "HUANUCO",
            "superficie" => "77",
            "altitud" => "1996",
            "latitud" => "-9.9608",
            "longitud" => "-76.2492"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 920,
            "ubigeo_reniec" => "090112",
            "ubigeo_inei" => "100112",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "YACUS",
            "region" => "HUANUCO",
            "superficie" => "70",
            "altitud" => "3243",
            "latitud" => "-9.9861",
            "longitud" => "-76.5058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 921,
            "ubigeo_reniec" => "090113",
            "ubigeo_inei" => "100113",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1001",
            "provincia" => "HUANUCO",
            "distrito" => "SAN PABLO DE PILLAO",
            "region" => "HUANUCO",
            "superficie" => "585",
            "altitud" => "2954",
            "latitud" => "-9.7864",
            "longitud" => "-75.9994"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 922,
            "ubigeo_reniec" => "090201",
            "ubigeo_inei" => "100201",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "AMBO",
            "region" => "HUANUCO",
            "superficie" => "289",
            "altitud" => "2106",
            "latitud" => "-10.1292",
            "longitud" => "-76.2044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 923,
            "ubigeo_reniec" => "090202",
            "ubigeo_inei" => "100202",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "CAYNA",
            "region" => "HUANUCO",
            "superficie" => "166",
            "altitud" => "3332",
            "latitud" => "-10.2725",
            "longitud" => "-76.3883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 924,
            "ubigeo_reniec" => "090203",
            "ubigeo_inei" => "100203",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "COLPAS",
            "region" => "HUANUCO",
            "superficie" => "174",
            "altitud" => "2740",
            "latitud" => "-10.2683",
            "longitud" => "-76.4153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 925,
            "ubigeo_reniec" => "090204",
            "ubigeo_inei" => "100204",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "CONCHAMARCA",
            "region" => "HUANUCO",
            "superficie" => "105",
            "altitud" => "2185",
            "latitud" => "-10.0358",
            "longitud" => "-76.2169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 926,
            "ubigeo_reniec" => "090205",
            "ubigeo_inei" => "100205",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "HUACAR",
            "region" => "HUANUCO",
            "superficie" => "234",
            "altitud" => "2157",
            "latitud" => "-10.1594",
            "longitud" => "-76.2367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 927,
            "ubigeo_reniec" => "090206",
            "ubigeo_inei" => "100206",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "SAN FRANCISCO",
            "region" => "HUANUCO",
            "superficie" => "121",
            "altitud" => "3521",
            "latitud" => "-10.3428",
            "longitud" => "-76.2919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 928,
            "ubigeo_reniec" => "090207",
            "ubigeo_inei" => "100207",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "SAN RAFAEL",
            "region" => "HUANUCO",
            "superficie" => "444",
            "altitud" => "2720",
            "latitud" => "-10.3378",
            "longitud" => "-76.1822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 929,
            "ubigeo_reniec" => "090208",
            "ubigeo_inei" => "100208",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1002",
            "provincia" => "AMBO",
            "distrito" => "TOMAY KICHWA",
            "region" => "HUANUCO",
            "superficie" => "42",
            "altitud" => "2049",
            "latitud" => "-10.0775",
            "longitud" => "-76.2125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 930,
            "ubigeo_reniec" => "090301",
            "ubigeo_inei" => "100301",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "LA UNION",
            "region" => "HUANUCO",
            "superficie" => "167",
            "altitud" => "3275",
            "latitud" => "-9.8378",
            "longitud" => "-76.8036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 931,
            "ubigeo_reniec" => "090307",
            "ubigeo_inei" => "100307",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "CHUQUIS",
            "region" => "HUANUCO",
            "superficie" => "151",
            "altitud" => "3375",
            "latitud" => "-9.6764",
            "longitud" => "-76.7053"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 932,
            "ubigeo_reniec" => "090312",
            "ubigeo_inei" => "100311",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "MARIAS",
            "region" => "HUANUCO",
            "superficie" => "637",
            "altitud" => "3508",
            "latitud" => "-9.6075",
            "longitud" => "-76.7067"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 933,
            "ubigeo_reniec" => "090314",
            "ubigeo_inei" => "100313",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "PACHAS",
            "region" => "HUANUCO",
            "superficie" => "265",
            "altitud" => "3474",
            "latitud" => "-9.7067",
            "longitud" => "-76.7711"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 934,
            "ubigeo_reniec" => "090316",
            "ubigeo_inei" => "100316",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "QUIVILLA",
            "region" => "HUANUCO",
            "superficie" => "34",
            "altitud" => "2972",
            "latitud" => "-9.6",
            "longitud" => "-76.7258"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 935,
            "ubigeo_reniec" => "090317",
            "ubigeo_inei" => "100317",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "RIPAN",
            "region" => "HUANUCO",
            "superficie" => "75",
            "altitud" => "3233",
            "latitud" => "-9.8286",
            "longitud" => "-76.8031"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 936,
            "ubigeo_reniec" => "090321",
            "ubigeo_inei" => "100321",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "SHUNQUI",
            "region" => "HUANUCO",
            "superficie" => "32",
            "altitud" => "3542",
            "latitud" => "-9.7311",
            "longitud" => "-76.7833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 937,
            "ubigeo_reniec" => "090322",
            "ubigeo_inei" => "100322",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "SILLAPATA",
            "region" => "HUANUCO",
            "superficie" => "71",
            "altitud" => "3459",
            "latitud" => "-9.7572",
            "longitud" => "-76.7747"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 938,
            "ubigeo_reniec" => "090323",
            "ubigeo_inei" => "100323",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1003",
            "provincia" => "DOS DE MAYO",
            "distrito" => "YANAS",
            "region" => "HUANUCO",
            "superficie" => "36",
            "altitud" => "3477",
            "latitud" => "-9.7144",
            "longitud" => "-76.7503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 939,
            "ubigeo_reniec" => "090901",
            "ubigeo_inei" => "100401",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1004",
            "provincia" => "HUACAYBAMBA",
            "distrito" => "HUACAYBAMBA",
            "region" => "HUANUCO",
            "superficie" => "586",
            "altitud" => "3176",
            "latitud" => "-9.0381",
            "longitud" => "-76.9525"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 940,
            "ubigeo_reniec" => "090903",
            "ubigeo_inei" => "100402",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1004",
            "provincia" => "HUACAYBAMBA",
            "distrito" => "CANCHABAMBA",
            "region" => "HUANUCO",
            "superficie" => "187",
            "altitud" => "3208",
            "latitud" => "-8.8847",
            "longitud" => "-77.1231"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 941,
            "ubigeo_reniec" => "090904",
            "ubigeo_inei" => "100403",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1004",
            "provincia" => "HUACAYBAMBA",
            "distrito" => "COCHABAMBA",
            "region" => "HUANUCO",
            "superficie" => "685",
            "altitud" => "3293",
            "latitud" => "-9.0953",
            "longitud" => "-76.8364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 942,
            "ubigeo_reniec" => "090902",
            "ubigeo_inei" => "100404",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1004",
            "provincia" => "HUACAYBAMBA",
            "distrito" => "PINRA",
            "region" => "HUANUCO",
            "superficie" => "284",
            "altitud" => "2874",
            "latitud" => "-8.9247",
            "longitud" => "-77.015"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 943,
            "ubigeo_reniec" => "090401",
            "ubigeo_inei" => "100501",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "LLATA",
            "region" => "HUANUCO",
            "superficie" => "411",
            "altitud" => "3489",
            "latitud" => "-9.5497",
            "longitud" => "-76.8186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 944,
            "ubigeo_reniec" => "090402",
            "ubigeo_inei" => "100502",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "ARANCAY",
            "region" => "HUANUCO",
            "superficie" => "158",
            "altitud" => "3066",
            "latitud" => "-9.1714",
            "longitud" => "-76.7514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 945,
            "ubigeo_reniec" => "090403",
            "ubigeo_inei" => "100503",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "CHAVIN DE PARIARCA",
            "region" => "HUANUCO",
            "superficie" => "89",
            "altitud" => "3382",
            "latitud" => "-9.4231",
            "longitud" => "-76.7714"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 946,
            "ubigeo_reniec" => "090404",
            "ubigeo_inei" => "100504",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "JACAS GRANDE",
            "region" => "HUANUCO",
            "superficie" => "237",
            "altitud" => "3625",
            "latitud" => "-9.54",
            "longitud" => "-76.7367"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 947,
            "ubigeo_reniec" => "090405",
            "ubigeo_inei" => "100505",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "JIRCAN",
            "region" => "HUANUCO",
            "superficie" => "85",
            "altitud" => "3211",
            "latitud" => "-9.2469",
            "longitud" => "-76.7192"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 948,
            "ubigeo_reniec" => "090406",
            "ubigeo_inei" => "100506",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "MIRAFLORES",
            "region" => "HUANUCO",
            "superficie" => "97",
            "altitud" => "3688",
            "latitud" => "-9.4939",
            "longitud" => "-76.8186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 949,
            "ubigeo_reniec" => "090407",
            "ubigeo_inei" => "100507",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "MONZON",
            "region" => "HUANUCO",
            "superficie" => "1521",
            "altitud" => "982",
            "latitud" => "-9.28",
            "longitud" => "-76.3967"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 950,
            "ubigeo_reniec" => "090408",
            "ubigeo_inei" => "100508",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "PUNCHAO",
            "region" => "HUANUCO",
            "superficie" => "42",
            "altitud" => "3560",
            "latitud" => "-9.4622",
            "longitud" => "-76.8197"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 951,
            "ubigeo_reniec" => "090409",
            "ubigeo_inei" => "100509",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "PUŃOS",
            "region" => "HUANUCO",
            "superficie" => "102",
            "altitud" => "3749",
            "latitud" => "-9.5006",
            "longitud" => "-76.8839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 952,
            "ubigeo_reniec" => "090410",
            "ubigeo_inei" => "100510",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "SINGA",
            "region" => "HUANUCO",
            "superficie" => "152",
            "altitud" => "3649",
            "latitud" => "-9.3886",
            "longitud" => "-76.8125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 953,
            "ubigeo_reniec" => "090411",
            "ubigeo_inei" => "100511",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1005",
            "provincia" => "HUAMALIES",
            "distrito" => "TANTAMAYO",
            "region" => "HUANUCO",
            "superficie" => "250",
            "altitud" => "3517",
            "latitud" => "-9.3925",
            "longitud" => "-76.72"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 954,
            "ubigeo_reniec" => "090601",
            "ubigeo_inei" => "100601",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "RUPA-RUPA",
            "region" => "HUANUCO",
            "superficie" => "267",
            "altitud" => "667",
            "latitud" => "-9.2981",
            "longitud" => "-76.0006"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 955,
            "ubigeo_reniec" => "090602",
            "ubigeo_inei" => "100602",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "DANIEL ALOMIAS ROBLES",
            "region" => "HUANUCO",
            "superficie" => "702",
            "altitud" => "669",
            "latitud" => "-9.1878",
            "longitud" => "-75.9547"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 956,
            "ubigeo_reniec" => "090603",
            "ubigeo_inei" => "100603",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "HERMILIO VALDIZAN",
            "region" => "HUANUCO",
            "superficie" => "112",
            "altitud" => "1354",
            "latitud" => "-9.2056",
            "longitud" => "-75.8358"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 957,
            "ubigeo_reniec" => "090606",
            "ubigeo_inei" => "100604",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "JOSE CRESPO Y CASTILLO",
            "region" => "HUANUCO",
            "superficie" => "2121",
            "altitud" => "587",
            "latitud" => "-8.9322",
            "longitud" => "-76.1161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 958,
            "ubigeo_reniec" => "090604",
            "ubigeo_inei" => "100605",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "LUYANDO",
            "region" => "HUANUCO",
            "superficie" => "100",
            "altitud" => "642",
            "latitud" => "-9.2481",
            "longitud" => "-75.9942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 959,
            "ubigeo_reniec" => "090605",
            "ubigeo_inei" => "100606",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "MARIANO DAMASO BERAUN",
            "region" => "HUANUCO",
            "superficie" => "766",
            "altitud" => "736",
            "latitud" => "-9.4428",
            "longitud" => "-75.9711"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 960,
            "ubigeo_reniec" => "090607",
            "ubigeo_inei" => "100607",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "PUCAYACU",
            "region" => "HUANUCO",
            "superficie" => "768",
            "altitud" => "573",
            "latitud" => "-8.7497",
            "longitud" => "-76.1211"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 961,
            "ubigeo_reniec" => "090608",
            "ubigeo_inei" => "100608",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "CASTILLO GRANDE",
            "region" => "HUANUCO",
            "superficie" => "106",
            "altitud" => "675",
            "latitud" => "-9.2797",
            "longitud" => "-76.0089"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 962,
            "ubigeo_reniec" => "090609",
            "ubigeo_inei" => "100609",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "PUEBLO NUEVO",
            "region" => "HUANUCO",
            "superficie" => "",
            "altitud" => "626",
            "latitud" => "-9.0786",
            "longitud" => "-76.0606"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 963,
            "ubigeo_reniec" => "090610",
            "ubigeo_inei" => "100610",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1006",
            "provincia" => "LEONCIO PRADO",
            "distrito" => "SANTO DOMINGO DE ANDA",
            "region" => "HUANUCO",
            "superficie" => "284",
            "altitud" => "617",
            "latitud" => "-9.0236",
            "longitud" => "-76.0667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 964,
            "ubigeo_reniec" => "090501",
            "ubigeo_inei" => "100701",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1007",
            "provincia" => "MARAŃON",
            "distrito" => "HUACRACHUCO",
            "region" => "HUANUCO",
            "superficie" => "705",
            "altitud" => "2914",
            "latitud" => "-8.6047",
            "longitud" => "-77.1492"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 965,
            "ubigeo_reniec" => "090502",
            "ubigeo_inei" => "100702",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1007",
            "provincia" => "MARAŃON",
            "distrito" => "CHOLON",
            "region" => "HUANUCO",
            "superficie" => "2125",
            "altitud" => "2447",
            "latitud" => "-8.6558",
            "longitud" => "-76.8753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 966,
            "ubigeo_reniec" => "090505",
            "ubigeo_inei" => "100703",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1007",
            "provincia" => "MARAŃON",
            "distrito" => "SAN BUENAVENTURA",
            "region" => "HUANUCO",
            "superficie" => "87",
            "altitud" => "3211",
            "latitud" => "-8.7678",
            "longitud" => "-77.1861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 967,
            "ubigeo_reniec" => "090506",
            "ubigeo_inei" => "100704",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1007",
            "provincia" => "MARAŃON",
            "distrito" => "LA MORADA",
            "region" => "HUANUCO",
            "superficie" => "879",
            "altitud" => "559",
            "latitud" => "-8.7944",
            "longitud" => "-76.2497"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 968,
            "ubigeo_reniec" => "090507",
            "ubigeo_inei" => "100705",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1007",
            "provincia" => "MARAŃON",
            "distrito" => "SANTA ROSA DE ALTO YANAJANCA",
            "region" => "HUANUCO",
            "superficie" => "1006",
            "altitud" => "530",
            "latitud" => "-8.6528",
            "longitud" => "-76.3147"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 969,
            "ubigeo_reniec" => "090701",
            "ubigeo_inei" => "100801",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1008",
            "provincia" => "PACHITEA",
            "distrito" => "PANAO",
            "region" => "HUANUCO",
            "superficie" => "1581",
            "altitud" => "2536",
            "latitud" => "-9.8975",
            "longitud" => "-75.9942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 970,
            "ubigeo_reniec" => "090702",
            "ubigeo_inei" => "100802",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1008",
            "provincia" => "PACHITEA",
            "distrito" => "CHAGLLA",
            "region" => "HUANUCO",
            "superficie" => "1104",
            "altitud" => "3040",
            "latitud" => "-9.8447",
            "longitud" => "-75.9028"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 971,
            "ubigeo_reniec" => "090704",
            "ubigeo_inei" => "100803",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1008",
            "provincia" => "PACHITEA",
            "distrito" => "MOLINO",
            "region" => "HUANUCO",
            "superficie" => "236",
            "altitud" => "2396",
            "latitud" => "-9.9108",
            "longitud" => "-76.0167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 972,
            "ubigeo_reniec" => "090706",
            "ubigeo_inei" => "100804",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1008",
            "provincia" => "PACHITEA",
            "distrito" => "UMARI",
            "region" => "HUANUCO",
            "superficie" => "149",
            "altitud" => "2524",
            "latitud" => "-9.8642",
            "longitud" => "-76.0444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 973,
            "ubigeo_reniec" => "090802",
            "ubigeo_inei" => "100901",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1009",
            "provincia" => "PUERTO INCA",
            "distrito" => "PUERTO INCA",
            "region" => "HUANUCO",
            "superficie" => "2147",
            "altitud" => "215",
            "latitud" => "-9.3789",
            "longitud" => "-74.9658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 974,
            "ubigeo_reniec" => "090803",
            "ubigeo_inei" => "100902",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1009",
            "provincia" => "PUERTO INCA",
            "distrito" => "CODO DEL POZUZO",
            "region" => "HUANUCO",
            "superficie" => "3322",
            "altitud" => "398",
            "latitud" => "-9.67",
            "longitud" => "-75.4625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 975,
            "ubigeo_reniec" => "090801",
            "ubigeo_inei" => "100903",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1009",
            "provincia" => "PUERTO INCA",
            "distrito" => "HONORIA",
            "region" => "HUANUCO",
            "superficie" => "798",
            "altitud" => "177",
            "latitud" => "-8.7694",
            "longitud" => "-74.7092"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 976,
            "ubigeo_reniec" => "090804",
            "ubigeo_inei" => "100904",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1009",
            "provincia" => "PUERTO INCA",
            "distrito" => "TOURNAVISTA",
            "region" => "HUANUCO",
            "superficie" => "2228",
            "altitud" => "214",
            "latitud" => "-8.9344",
            "longitud" => "-74.7014"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 977,
            "ubigeo_reniec" => "090805",
            "ubigeo_inei" => "100905",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1009",
            "provincia" => "PUERTO INCA",
            "distrito" => "YUYAPICHIS",
            "region" => "HUANUCO",
            "superficie" => "1846",
            "altitud" => "227",
            "latitud" => "-9.6283",
            "longitud" => "-74.9747"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 978,
            "ubigeo_reniec" => "091001",
            "ubigeo_inei" => "101001",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "JESUS",
            "region" => "HUANUCO",
            "superficie" => "450",
            "altitud" => "3499",
            "latitud" => "-10.0783",
            "longitud" => "-76.6314"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 979,
            "ubigeo_reniec" => "091002",
            "ubigeo_inei" => "101002",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "BAŃOS",
            "region" => "HUANUCO",
            "superficie" => "153",
            "altitud" => "3442",
            "latitud" => "-10.0764",
            "longitud" => "-76.7356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 980,
            "ubigeo_reniec" => "091007",
            "ubigeo_inei" => "101003",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "JIVIA",
            "region" => "HUANUCO",
            "superficie" => "61",
            "altitud" => "3394",
            "latitud" => "-10.0233",
            "longitud" => "-76.6803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 981,
            "ubigeo_reniec" => "091004",
            "ubigeo_inei" => "101004",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "QUEROPALCA",
            "region" => "HUANUCO",
            "superficie" => "131",
            "altitud" => "3835",
            "latitud" => "-10.1814",
            "longitud" => "-76.8031"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 982,
            "ubigeo_reniec" => "091006",
            "ubigeo_inei" => "101005",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "RONDOS",
            "region" => "HUANUCO",
            "superficie" => "169",
            "altitud" => "3617",
            "latitud" => "-9.9844",
            "longitud" => "-76.6883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 983,
            "ubigeo_reniec" => "091003",
            "ubigeo_inei" => "101006",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "SAN FRANCISCO DE ASIS",
            "region" => "HUANUCO",
            "superficie" => "84",
            "altitud" => "3457",
            "latitud" => "-9.9764",
            "longitud" => "-76.6769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 984,
            "ubigeo_reniec" => "091005",
            "ubigeo_inei" => "101007",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1010",
            "provincia" => "LAURICOCHA",
            "distrito" => "SAN MIGUEL DE CAURI",
            "region" => "HUANUCO",
            "superficie" => "812",
            "altitud" => "3625",
            "latitud" => "-10.1425",
            "longitud" => "-76.6256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 985,
            "ubigeo_reniec" => "091101",
            "ubigeo_inei" => "101101",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "CHAVINILLO",
            "region" => "HUANUCO",
            "superficie" => "205",
            "altitud" => "3475",
            "latitud" => "-9.8589",
            "longitud" => "-76.6089"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 986,
            "ubigeo_reniec" => "091103",
            "ubigeo_inei" => "101102",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "CAHUAC",
            "region" => "HUANUCO",
            "superficie" => "30",
            "altitud" => "3413",
            "latitud" => "-9.8528",
            "longitud" => "-76.6306"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 987,
            "ubigeo_reniec" => "091104",
            "ubigeo_inei" => "101103",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "CHACABAMBA",
            "region" => "HUANUCO",
            "superficie" => "17",
            "altitud" => "3204",
            "latitud" => "-9.9003",
            "longitud" => "-76.6111"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 988,
            "ubigeo_reniec" => "091102",
            "ubigeo_inei" => "101104",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "APARICIO POMARES",
            "region" => "HUANUCO",
            "superficie" => "183",
            "altitud" => "3452",
            "latitud" => "-9.7478",
            "longitud" => "-76.6481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 989,
            "ubigeo_reniec" => "091105",
            "ubigeo_inei" => "101105",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "JACAS CHICO",
            "region" => "HUANUCO",
            "superficie" => "36",
            "altitud" => "3816",
            "latitud" => "-9.8864",
            "longitud" => "-76.5031"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 990,
            "ubigeo_reniec" => "091106",
            "ubigeo_inei" => "101106",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "OBAS",
            "region" => "HUANUCO",
            "superficie" => "123",
            "altitud" => "3543",
            "latitud" => "-9.7953",
            "longitud" => "-76.6658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 991,
            "ubigeo_reniec" => "091107",
            "ubigeo_inei" => "101107",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "PAMPAMARCA",
            "region" => "HUANUCO",
            "superficie" => "73",
            "altitud" => "3436",
            "latitud" => "-9.7053",
            "longitud" => "-76.7025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 992,
            "ubigeo_reniec" => "091108",
            "ubigeo_inei" => "101108",
            "departamento_inei" => "10",
            "departamento" => "HUANUCO",
            "provincia_inei" => "1011",
            "provincia" => "YAROWILCA",
            "distrito" => "CHORAS",
            "region" => "HUANUCO",
            "superficie" => "61",
            "altitud" => "3554",
            "latitud" => "-9.9103",
            "longitud" => "-76.6058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 993,
            "ubigeo_reniec" => "100101",
            "ubigeo_inei" => "110101",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "ICA",
            "region" => "ICA",
            "superficie" => "888",
            "altitud" => "432",
            "latitud" => "-14.0636",
            "longitud" => "-75.7292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 994,
            "ubigeo_reniec" => "100102",
            "ubigeo_inei" => "110102",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "LA TINGUIŃA",
            "region" => "ICA",
            "superficie" => "98",
            "altitud" => "463",
            "latitud" => "-14.0333",
            "longitud" => "-75.7106"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 995,
            "ubigeo_reniec" => "100103",
            "ubigeo_inei" => "110103",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "LOS AQUIJES",
            "region" => "ICA",
            "superficie" => "91",
            "altitud" => "446",
            "latitud" => "-14.0964",
            "longitud" => "-75.6906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 996,
            "ubigeo_reniec" => "100114",
            "ubigeo_inei" => "110104",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "OCUCAJE",
            "region" => "ICA",
            "superficie" => "1417",
            "altitud" => "332",
            "latitud" => "-14.3467",
            "longitud" => "-75.6722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 997,
            "ubigeo_reniec" => "100113",
            "ubigeo_inei" => "110105",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "PACHACUTEC",
            "region" => "ICA",
            "superficie" => "34",
            "altitud" => "424",
            "latitud" => "-14.1519",
            "longitud" => "-75.6919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 998,
            "ubigeo_reniec" => "100104",
            "ubigeo_inei" => "110106",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "PARCONA",
            "region" => "ICA",
            "superficie" => "17",
            "altitud" => "472",
            "latitud" => "-14.0539",
            "longitud" => "-75.6856"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 999,
            "ubigeo_reniec" => "100105",
            "ubigeo_inei" => "110107",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "PUEBLO NUEVO",
            "region" => "ICA",
            "superficie" => "33",
            "altitud" => "417",
            "latitud" => "-14.1272",
            "longitud" => "-75.7058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1000,
            "ubigeo_reniec" => "100106",
            "ubigeo_inei" => "110108",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "SALAS",
            "region" => "ICA",
            "superficie" => "652",
            "altitud" => "452",
            "latitud" => "-13.9858",
            "longitud" => "-75.7722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1001,
            "ubigeo_reniec" => "100107",
            "ubigeo_inei" => "110109",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "SAN JOSE DE LOS MOLINOS",
            "region" => "ICA",
            "superficie" => "363",
            "altitud" => "542",
            "latitud" => "-13.9331",
            "longitud" => "-75.6708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1002,
            "ubigeo_reniec" => "100108",
            "ubigeo_inei" => "110110",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "SAN JUAN BAUTISTA",
            "region" => "ICA",
            "superficie" => "26",
            "altitud" => "459",
            "latitud" => "-14.0114",
            "longitud" => "-75.7353"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1003,
            "ubigeo_reniec" => "100109",
            "ubigeo_inei" => "110111",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "SANTIAGO",
            "region" => "ICA",
            "superficie" => "2784",
            "altitud" => "395",
            "latitud" => "-14.1858",
            "longitud" => "-75.7144"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1004,
            "ubigeo_reniec" => "100110",
            "ubigeo_inei" => "110112",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "SUBTANJALLA",
            "region" => "ICA",
            "superficie" => "194",
            "altitud" => "445",
            "latitud" => "-14.0186",
            "longitud" => "-75.7581"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1005,
            "ubigeo_reniec" => "100112",
            "ubigeo_inei" => "110113",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "TATE",
            "region" => "ICA",
            "superficie" => "7",
            "altitud" => "417",
            "latitud" => "-14.1558",
            "longitud" => "-75.7081"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1006,
            "ubigeo_reniec" => "100111",
            "ubigeo_inei" => "110114",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1101",
            "provincia" => "ICA",
            "distrito" => "YAUCA DEL ROSARIO",
            "region" => "ICA",
            "superficie" => "1289",
            "altitud" => "861",
            "latitud" => "-14.0989",
            "longitud" => "-75.4769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1007,
            "ubigeo_reniec" => "100201",
            "ubigeo_inei" => "110201",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "CHINCHA ALTA",
            "region" => "ICA",
            "superficie" => "238",
            "altitud" => "140",
            "latitud" => "-13.4183",
            "longitud" => "-76.1325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1008,
            "ubigeo_reniec" => "100209",
            "ubigeo_inei" => "110202",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "ALTO LARAN",
            "region" => "ICA",
            "superficie" => "299",
            "altitud" => "156",
            "latitud" => "-13.4425",
            "longitud" => "-76.0833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1009,
            "ubigeo_reniec" => "100202",
            "ubigeo_inei" => "110203",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "CHAVIN",
            "region" => "ICA",
            "superficie" => "426",
            "altitud" => "3183",
            "latitud" => "-13.0764",
            "longitud" => "-75.9131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1010,
            "ubigeo_reniec" => "100203",
            "ubigeo_inei" => "110204",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "CHINCHA BAJA",
            "region" => "ICA",
            "superficie" => "73",
            "altitud" => "44",
            "latitud" => "-13.4594",
            "longitud" => "-76.1656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1011,
            "ubigeo_reniec" => "100204",
            "ubigeo_inei" => "110205",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "EL CARMEN",
            "region" => "ICA",
            "superficie" => "790",
            "altitud" => "160",
            "latitud" => "-13.4994",
            "longitud" => "-76.0578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1012,
            "ubigeo_reniec" => "100205",
            "ubigeo_inei" => "110206",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "GROCIO PRADO",
            "region" => "ICA",
            "superficie" => "191",
            "altitud" => "134",
            "latitud" => "-13.3981",
            "longitud" => "-76.1561"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1013,
            "ubigeo_reniec" => "100210",
            "ubigeo_inei" => "110207",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "PUEBLO NUEVO",
            "region" => "ICA",
            "superficie" => "209",
            "altitud" => "146",
            "latitud" => "-13.4042",
            "longitud" => "-76.1275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1014,
            "ubigeo_reniec" => "100211",
            "ubigeo_inei" => "110208",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "SAN JUAN DE YANAC",
            "region" => "ICA",
            "superficie" => "500",
            "altitud" => "2555",
            "latitud" => "-13.2111",
            "longitud" => "-75.7872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1015,
            "ubigeo_reniec" => "100206",
            "ubigeo_inei" => "110209",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "SAN PEDRO DE HUACARPANA",
            "region" => "ICA",
            "superficie" => "222",
            "altitud" => "3812",
            "latitud" => "-13.0492",
            "longitud" => "-75.6478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1016,
            "ubigeo_reniec" => "100207",
            "ubigeo_inei" => "110210",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "SUNAMPE",
            "region" => "ICA",
            "superficie" => "17",
            "altitud" => "94",
            "latitud" => "-13.4275",
            "longitud" => "-76.1636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1017,
            "ubigeo_reniec" => "100208",
            "ubigeo_inei" => "110211",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1102",
            "provincia" => "CHINCHA",
            "distrito" => "TAMBO DE MORA",
            "region" => "ICA",
            "superficie" => "22",
            "altitud" => "37",
            "latitud" => "-13.4606",
            "longitud" => "-76.1767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1018,
            "ubigeo_reniec" => "100301",
            "ubigeo_inei" => "110301",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1103",
            "provincia" => "NAZCA",
            "distrito" => "NAZCA",
            "region" => "ICA",
            "superficie" => "1252",
            "altitud" => "618",
            "latitud" => "-14.8269",
            "longitud" => "-74.9372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1019,
            "ubigeo_reniec" => "100302",
            "ubigeo_inei" => "110302",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1103",
            "provincia" => "NAZCA",
            "distrito" => "CHANGUILLO",
            "region" => "ICA",
            "superficie" => "947",
            "altitud" => "260",
            "latitud" => "-14.6647",
            "longitud" => "-75.2225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1020,
            "ubigeo_reniec" => "100303",
            "ubigeo_inei" => "110303",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1103",
            "provincia" => "NAZCA",
            "distrito" => "EL INGENIO",
            "region" => "ICA",
            "superficie" => "552",
            "altitud" => "463",
            "latitud" => "-14.6453",
            "longitud" => "-75.0583"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1021,
            "ubigeo_reniec" => "100304",
            "ubigeo_inei" => "110304",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1103",
            "provincia" => "NAZCA",
            "distrito" => "MARCONA",
            "region" => "ICA",
            "superficie" => "1955",
            "altitud" => "36",
            "latitud" => "-15.3619",
            "longitud" => "-75.1658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1022,
            "ubigeo_reniec" => "100305",
            "ubigeo_inei" => "110305",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1103",
            "provincia" => "NAZCA",
            "distrito" => "VISTA ALEGRE",
            "region" => "ICA",
            "superficie" => "527",
            "altitud" => "618",
            "latitud" => "-14.8458",
            "longitud" => "-74.9439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1023,
            "ubigeo_reniec" => "100501",
            "ubigeo_inei" => "110401",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1104",
            "provincia" => "PALPA",
            "distrito" => "PALPA",
            "region" => "ICA",
            "superficie" => "147",
            "altitud" => "371",
            "latitud" => "-14.5339",
            "longitud" => "-75.185"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1024,
            "ubigeo_reniec" => "100502",
            "ubigeo_inei" => "110402",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1104",
            "provincia" => "PALPA",
            "distrito" => "LLIPATA",
            "region" => "ICA",
            "superficie" => "186",
            "altitud" => "317",
            "latitud" => "-14.5633",
            "longitud" => "-75.2075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1025,
            "ubigeo_reniec" => "100503",
            "ubigeo_inei" => "110403",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1104",
            "provincia" => "PALPA",
            "distrito" => "RIO GRANDE",
            "region" => "ICA",
            "superficie" => "316",
            "altitud" => "369",
            "latitud" => "-14.52",
            "longitud" => "-75.2011"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1026,
            "ubigeo_reniec" => "100504",
            "ubigeo_inei" => "110404",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1104",
            "provincia" => "PALPA",
            "distrito" => "SANTA CRUZ",
            "region" => "ICA",
            "superficie" => "256",
            "altitud" => "546",
            "latitud" => "-14.4833",
            "longitud" => "-75.2456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1027,
            "ubigeo_reniec" => "100505",
            "ubigeo_inei" => "110405",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1104",
            "provincia" => "PALPA",
            "distrito" => "TIBILLO",
            "region" => "ICA",
            "superficie" => "328",
            "altitud" => "2192",
            "latitud" => "-14.0939",
            "longitud" => "-75.1717"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1028,
            "ubigeo_reniec" => "100401",
            "ubigeo_inei" => "110501",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "PISCO",
            "region" => "ICA",
            "superficie" => "25",
            "altitud" => "39",
            "latitud" => "-13.71",
            "longitud" => "-76.2017"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1029,
            "ubigeo_reniec" => "100402",
            "ubigeo_inei" => "110502",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "HUANCANO",
            "region" => "ICA",
            "superficie" => "905",
            "altitud" => "1039",
            "latitud" => "-13.6008",
            "longitud" => "-75.6186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1030,
            "ubigeo_reniec" => "100403",
            "ubigeo_inei" => "110503",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "HUMAY",
            "region" => "ICA",
            "superficie" => "1113",
            "altitud" => "426",
            "latitud" => "-13.7228",
            "longitud" => "-75.8867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1031,
            "ubigeo_reniec" => "100404",
            "ubigeo_inei" => "110504",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "INDEPENDENCIA",
            "region" => "ICA",
            "superficie" => "272",
            "altitud" => "235",
            "latitud" => "-13.6939",
            "longitud" => "-76.0247"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1032,
            "ubigeo_reniec" => "100405",
            "ubigeo_inei" => "110505",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "PARACAS",
            "region" => "ICA",
            "superficie" => "1420",
            "altitud" => "14",
            "latitud" => "-13.8389",
            "longitud" => "-76.2519"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1033,
            "ubigeo_reniec" => "100406",
            "ubigeo_inei" => "110506",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "SAN ANDRES",
            "region" => "ICA",
            "superficie" => "39",
            "altitud" => "16",
            "latitud" => "-13.7314",
            "longitud" => "-76.2233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1034,
            "ubigeo_reniec" => "100407",
            "ubigeo_inei" => "110507",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "SAN CLEMENTE",
            "region" => "ICA",
            "superficie" => "127",
            "altitud" => "116",
            "latitud" => "-13.6803",
            "longitud" => "-76.1569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1035,
            "ubigeo_reniec" => "100408",
            "ubigeo_inei" => "110508",
            "departamento_inei" => "11",
            "departamento" => "ICA",
            "provincia_inei" => "1105",
            "provincia" => "PISCO",
            "distrito" => "TUPAC AMARU INCA",
            "region" => "ICA",
            "superficie" => "55",
            "altitud" => "113",
            "latitud" => "-13.7133",
            "longitud" => "-76.1483"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1036,
            "ubigeo_reniec" => "110101",
            "ubigeo_inei" => "120101",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUANCAYO",
            "region" => "JUNIN",
            "superficie" => "238",
            "altitud" => "3294",
            "latitud" => "-12.0708",
            "longitud" => "-75.2089"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1037,
            "ubigeo_reniec" => "110103",
            "ubigeo_inei" => "120104",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CARHUACALLANGA",
            "region" => "JUNIN",
            "superficie" => "14",
            "altitud" => "3774",
            "latitud" => "-12.355",
            "longitud" => "-75.2006"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1038,
            "ubigeo_reniec" => "110106",
            "ubigeo_inei" => "120105",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CHACAPAMPA",
            "region" => "JUNIN",
            "superficie" => "121",
            "altitud" => "3413",
            "latitud" => "-12.345",
            "longitud" => "-75.2475"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1039,
            "ubigeo_reniec" => "110107",
            "ubigeo_inei" => "120106",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CHICCHE",
            "region" => "JUNIN",
            "superficie" => "46",
            "altitud" => "3606",
            "latitud" => "-12.2961",
            "longitud" => "-75.2986"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1040,
            "ubigeo_reniec" => "110108",
            "ubigeo_inei" => "120107",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CHILCA",
            "region" => "JUNIN",
            "superficie" => "8",
            "altitud" => "3273",
            "latitud" => "-12.0867",
            "longitud" => "-75.2083"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1041,
            "ubigeo_reniec" => "110109",
            "ubigeo_inei" => "120108",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CHONGOS ALTO",
            "region" => "JUNIN",
            "superficie" => "702",
            "altitud" => "3573",
            "latitud" => "-12.3117",
            "longitud" => "-75.2892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1042,
            "ubigeo_reniec" => "110112",
            "ubigeo_inei" => "120111",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CHUPURO",
            "region" => "JUNIN",
            "superficie" => "14",
            "altitud" => "3197",
            "latitud" => "-12.1556",
            "longitud" => "-75.2456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1043,
            "ubigeo_reniec" => "110104",
            "ubigeo_inei" => "120112",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "COLCA",
            "region" => "JUNIN",
            "superficie" => "113",
            "altitud" => "3499",
            "latitud" => "-12.3175",
            "longitud" => "-75.2222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1044,
            "ubigeo_reniec" => "110105",
            "ubigeo_inei" => "120113",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "CULLHUAS",
            "region" => "JUNIN",
            "superficie" => "108",
            "altitud" => "3549",
            "latitud" => "-12.2206",
            "longitud" => "-75.1669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1045,
            "ubigeo_reniec" => "110113",
            "ubigeo_inei" => "120114",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "EL TAMBO",
            "region" => "JUNIN",
            "superficie" => "74",
            "altitud" => "3305",
            "latitud" => "-12.0503",
            "longitud" => "-75.2214"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1046,
            "ubigeo_reniec" => "110114",
            "ubigeo_inei" => "120116",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUACRAPUQUIO",
            "region" => "JUNIN",
            "superficie" => "24",
            "altitud" => "3238",
            "latitud" => "-12.1711",
            "longitud" => "-75.2208"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1047,
            "ubigeo_reniec" => "110116",
            "ubigeo_inei" => "120117",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUALHUAS",
            "region" => "JUNIN",
            "superficie" => "25",
            "altitud" => "3267",
            "latitud" => "-11.9714",
            "longitud" => "-75.2508"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1048,
            "ubigeo_reniec" => "110118",
            "ubigeo_inei" => "120119",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUANCAN",
            "region" => "JUNIN",
            "superficie" => "12",
            "altitud" => "3252",
            "latitud" => "-12.1067",
            "longitud" => "-75.2167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1049,
            "ubigeo_reniec" => "110119",
            "ubigeo_inei" => "120120",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUASICANCHA",
            "region" => "JUNIN",
            "superficie" => "48",
            "altitud" => "3755",
            "latitud" => "-12.3322",
            "longitud" => "-75.2819"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1050,
            "ubigeo_reniec" => "110120",
            "ubigeo_inei" => "120121",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "HUAYUCACHI",
            "region" => "JUNIN",
            "superficie" => "13",
            "altitud" => "3251",
            "latitud" => "-12.1386",
            "longitud" => "-75.2236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1051,
            "ubigeo_reniec" => "110121",
            "ubigeo_inei" => "120122",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "INGENIO",
            "region" => "JUNIN",
            "superficie" => "53",
            "altitud" => "3486",
            "latitud" => "-11.8906",
            "longitud" => "-75.2664"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1052,
            "ubigeo_reniec" => "110122",
            "ubigeo_inei" => "120124",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "PARIAHUANCA",
            "region" => "JUNIN",
            "superficie" => "618",
            "altitud" => "2591",
            "latitud" => "-11.9803",
            "longitud" => "-74.8967"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1053,
            "ubigeo_reniec" => "110123",
            "ubigeo_inei" => "120125",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "PILCOMAYO",
            "region" => "JUNIN",
            "superficie" => "20",
            "altitud" => "3244",
            "latitud" => "-12.0494",
            "longitud" => "-75.2506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1054,
            "ubigeo_reniec" => "110124",
            "ubigeo_inei" => "120126",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "PUCARA",
            "region" => "JUNIN",
            "superficie" => "110",
            "altitud" => "3374",
            "latitud" => "-12.1725",
            "longitud" => "-75.1456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1055,
            "ubigeo_reniec" => "110125",
            "ubigeo_inei" => "120127",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "QUICHUAY",
            "region" => "JUNIN",
            "superficie" => "35",
            "altitud" => "3430",
            "latitud" => "-11.8897",
            "longitud" => "-75.2861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1056,
            "ubigeo_reniec" => "110126",
            "ubigeo_inei" => "120128",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "QUILCAS",
            "region" => "JUNIN",
            "superficie" => "168",
            "altitud" => "3323",
            "latitud" => "-11.9381",
            "longitud" => "-75.2597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1057,
            "ubigeo_reniec" => "110127",
            "ubigeo_inei" => "120129",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SAN AGUSTIN",
            "region" => "JUNIN",
            "superficie" => "23",
            "altitud" => "3297",
            "latitud" => "-11.9897",
            "longitud" => "-75.2442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1058,
            "ubigeo_reniec" => "110128",
            "ubigeo_inei" => "120130",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SAN JERONIMO DE TUNAN",
            "region" => "JUNIN",
            "superficie" => "21",
            "altitud" => "3301",
            "latitud" => "-11.9492",
            "longitud" => "-75.2822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1059,
            "ubigeo_reniec" => "110132",
            "ubigeo_inei" => "120132",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SAŃO",
            "region" => "JUNIN",
            "superficie" => "12",
            "altitud" => "3297",
            "latitud" => "-11.9589",
            "longitud" => "-75.2586"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1060,
            "ubigeo_reniec" => "110133",
            "ubigeo_inei" => "120133",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SAPALLANGA",
            "region" => "JUNIN",
            "superficie" => "119",
            "altitud" => "3330",
            "latitud" => "-12.1414",
            "longitud" => "-75.1581"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1061,
            "ubigeo_reniec" => "110134",
            "ubigeo_inei" => "120134",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SICAYA",
            "region" => "JUNIN",
            "superficie" => "43",
            "altitud" => "3305",
            "latitud" => "-12.0147",
            "longitud" => "-75.28"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1062,
            "ubigeo_reniec" => "110131",
            "ubigeo_inei" => "120135",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "SANTO DOMINGO DE ACOBAMBA",
            "region" => "JUNIN",
            "superficie" => "778",
            "altitud" => "2221",
            "latitud" => "-11.7689",
            "longitud" => "-74.7953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1063,
            "ubigeo_reniec" => "110136",
            "ubigeo_inei" => "120136",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1201",
            "provincia" => "HUANCAYO",
            "distrito" => "VIQUES",
            "region" => "JUNIN",
            "superficie" => "4",
            "altitud" => "3200",
            "latitud" => "-12.1597",
            "longitud" => "-75.2319"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1064,
            "ubigeo_reniec" => "110201",
            "ubigeo_inei" => "120201",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "CONCEPCION",
            "region" => "JUNIN",
            "superficie" => "18",
            "altitud" => "3303",
            "latitud" => "-11.9189",
            "longitud" => "-75.3125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1065,
            "ubigeo_reniec" => "110202",
            "ubigeo_inei" => "120202",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "ACO",
            "region" => "JUNIN",
            "superficie" => "38",
            "altitud" => "3474",
            "latitud" => "-11.9581",
            "longitud" => "-75.3683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1066,
            "ubigeo_reniec" => "110203",
            "ubigeo_inei" => "120203",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "ANDAMARCA",
            "region" => "JUNIN",
            "superficie" => "695",
            "altitud" => "2508",
            "latitud" => "-11.7283",
            "longitud" => "-74.8017"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1067,
            "ubigeo_reniec" => "110206",
            "ubigeo_inei" => "120204",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "CHAMBARA",
            "region" => "JUNIN",
            "superficie" => "113",
            "altitud" => "3521",
            "latitud" => "-12.0272",
            "longitud" => "-75.3753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1068,
            "ubigeo_reniec" => "110205",
            "ubigeo_inei" => "120205",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "COCHAS",
            "region" => "JUNIN",
            "superficie" => "165",
            "altitud" => "3231",
            "latitud" => "-11.66",
            "longitud" => "-75.1022"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1069,
            "ubigeo_reniec" => "110204",
            "ubigeo_inei" => "120206",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "COMAS",
            "region" => "JUNIN",
            "superficie" => "825",
            "altitud" => "3303",
            "latitud" => "-11.7178",
            "longitud" => "-75.0817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1070,
            "ubigeo_reniec" => "110207",
            "ubigeo_inei" => "120207",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "HEROINAS TOLEDO",
            "region" => "JUNIN",
            "superficie" => "26",
            "altitud" => "3764",
            "latitud" => "-11.8356",
            "longitud" => "-75.2908"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1071,
            "ubigeo_reniec" => "110208",
            "ubigeo_inei" => "120208",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "MANZANARES",
            "region" => "JUNIN",
            "superficie" => "21",
            "altitud" => "3381",
            "latitud" => "-12.0161",
            "longitud" => "-75.3458"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1072,
            "ubigeo_reniec" => "110209",
            "ubigeo_inei" => "120209",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "MARISCAL CASTILLA",
            "region" => "JUNIN",
            "superficie" => "744",
            "altitud" => "2513",
            "latitud" => "-11.6192",
            "longitud" => "-75.09"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1073,
            "ubigeo_reniec" => "110210",
            "ubigeo_inei" => "120210",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "MATAHUASI",
            "region" => "JUNIN",
            "superficie" => "25",
            "altitud" => "3302",
            "latitud" => "-11.8939",
            "longitud" => "-75.3442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1074,
            "ubigeo_reniec" => "110211",
            "ubigeo_inei" => "120211",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "MITO",
            "region" => "JUNIN",
            "superficie" => "25",
            "altitud" => "3296",
            "latitud" => "-11.9372",
            "longitud" => "-75.3392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1075,
            "ubigeo_reniec" => "110212",
            "ubigeo_inei" => "120212",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "NUEVE DE JULIO",
            "region" => "JUNIN",
            "superficie" => "7",
            "altitud" => "3339",
            "latitud" => "-11.8978",
            "longitud" => "-75.3181"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1076,
            "ubigeo_reniec" => "110213",
            "ubigeo_inei" => "120213",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "ORCOTUNA",
            "region" => "JUNIN",
            "superficie" => "45",
            "altitud" => "3271",
            "latitud" => "-11.9672",
            "longitud" => "-75.3075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1077,
            "ubigeo_reniec" => "110215",
            "ubigeo_inei" => "120214",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "SAN JOSE DE QUERO",
            "region" => "JUNIN",
            "superficie" => "315",
            "altitud" => "3913",
            "latitud" => "-12.0856",
            "longitud" => "-75.5364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1078,
            "ubigeo_reniec" => "110214",
            "ubigeo_inei" => "120215",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1202",
            "provincia" => "CONCEPCION",
            "distrito" => "SANTA ROSA DE OCOPA",
            "region" => "JUNIN",
            "superficie" => "14",
            "altitud" => "3396",
            "latitud" => "-11.8772",
            "longitud" => "-75.295"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1079,
            "ubigeo_reniec" => "110801",
            "ubigeo_inei" => "120301",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "CHANCHAMAYO",
            "region" => "JUNIN",
            "superficie" => "920",
            "altitud" => "804",
            "latitud" => "-11.0567",
            "longitud" => "-75.3275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1080,
            "ubigeo_reniec" => "110806",
            "ubigeo_inei" => "120302",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "PERENE",
            "region" => "JUNIN",
            "superficie" => "1191",
            "altitud" => "666",
            "latitud" => "-10.9475",
            "longitud" => "-75.2247"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1081,
            "ubigeo_reniec" => "110805",
            "ubigeo_inei" => "120303",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "PICHANAQUI",
            "region" => "JUNIN",
            "superficie" => "1497",
            "altitud" => "531",
            "latitud" => "-10.9264",
            "longitud" => "-74.8728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1082,
            "ubigeo_reniec" => "110804",
            "ubigeo_inei" => "120304",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "SAN LUIS DE SHUARO",
            "region" => "JUNIN",
            "superficie" => "212",
            "altitud" => "739",
            "latitud" => "-10.8883",
            "longitud" => "-75.2872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1083,
            "ubigeo_reniec" => "110802",
            "ubigeo_inei" => "120305",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "SAN RAMON",
            "region" => "JUNIN",
            "superficie" => "592",
            "altitud" => "865",
            "latitud" => "-11.1206",
            "longitud" => "-75.3531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1084,
            "ubigeo_reniec" => "110803",
            "ubigeo_inei" => "120306",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1203",
            "provincia" => "CHANCHAMAYO",
            "distrito" => "VITOC",
            "region" => "JUNIN",
            "superficie" => "314",
            "altitud" => "962",
            "latitud" => "-11.2103",
            "longitud" => "-75.3347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1085,
            "ubigeo_reniec" => "110301",
            "ubigeo_inei" => "120401",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "JAUJA",
            "region" => "JUNIN",
            "superficie" => "10",
            "altitud" => "3425",
            "latitud" => "-11.7756",
            "longitud" => "-75.5006"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1086,
            "ubigeo_reniec" => "110302",
            "ubigeo_inei" => "120402",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "ACOLLA",
            "region" => "JUNIN",
            "superficie" => "122",
            "altitud" => "3493",
            "latitud" => "-11.7311",
            "longitud" => "-75.5467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1087,
            "ubigeo_reniec" => "110303",
            "ubigeo_inei" => "120403",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "APATA",
            "region" => "JUNIN",
            "superficie" => "422",
            "altitud" => "3359",
            "latitud" => "-11.8553",
            "longitud" => "-75.3544"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1088,
            "ubigeo_reniec" => "110304",
            "ubigeo_inei" => "120404",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "ATAURA",
            "region" => "JUNIN",
            "superficie" => "6",
            "altitud" => "3364",
            "latitud" => "-11.8028",
            "longitud" => "-75.4389"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1089,
            "ubigeo_reniec" => "110305",
            "ubigeo_inei" => "120405",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "CANCHAYLLO",
            "region" => "JUNIN",
            "superficie" => "975",
            "altitud" => "3632",
            "latitud" => "-11.8022",
            "longitud" => "-75.7181"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1090,
            "ubigeo_reniec" => "110331",
            "ubigeo_inei" => "120406",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "CURICACA",
            "region" => "JUNIN",
            "superficie" => "65",
            "altitud" => "3546",
            "latitud" => "-11.7853",
            "longitud" => "-75.675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1091,
            "ubigeo_reniec" => "110306",
            "ubigeo_inei" => "120407",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "EL MANTARO",
            "region" => "JUNIN",
            "superficie" => "18",
            "altitud" => "3336",
            "latitud" => "-11.8222",
            "longitud" => "-75.3919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1092,
            "ubigeo_reniec" => "110307",
            "ubigeo_inei" => "120408",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "HUAMALI",
            "region" => "JUNIN",
            "superficie" => "20",
            "altitud" => "3366",
            "latitud" => "-11.8072",
            "longitud" => "-75.4242"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1093,
            "ubigeo_reniec" => "110308",
            "ubigeo_inei" => "120409",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "HUARIPAMPA",
            "region" => "JUNIN",
            "superficie" => "14",
            "altitud" => "3378",
            "latitud" => "-11.8078",
            "longitud" => "-75.4711"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1094,
            "ubigeo_reniec" => "110309",
            "ubigeo_inei" => "120410",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "HUERTAS",
            "region" => "JUNIN",
            "superficie" => "12",
            "altitud" => "3404",
            "latitud" => "-11.76",
            "longitud" => "-75.4697"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1095,
            "ubigeo_reniec" => "110310",
            "ubigeo_inei" => "120411",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "JANJAILLO",
            "region" => "JUNIN",
            "superficie" => "32",
            "altitud" => "3830",
            "latitud" => "-11.7644",
            "longitud" => "-75.6103"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1096,
            "ubigeo_reniec" => "110311",
            "ubigeo_inei" => "120412",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "JULCAN",
            "region" => "JUNIN",
            "superficie" => "25",
            "altitud" => "3473",
            "latitud" => "-11.7592",
            "longitud" => "-75.4353"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1097,
            "ubigeo_reniec" => "110312",
            "ubigeo_inei" => "120413",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "LEONOR ORDOŃEZ",
            "region" => "JUNIN",
            "superficie" => "20",
            "altitud" => "3319",
            "latitud" => "-11.8594",
            "longitud" => "-75.4175"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1098,
            "ubigeo_reniec" => "110313",
            "ubigeo_inei" => "120414",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "LLOCLLAPAMPA",
            "region" => "JUNIN",
            "superficie" => "111",
            "altitud" => "3526",
            "latitud" => "-11.8175",
            "longitud" => "-75.6239"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1099,
            "ubigeo_reniec" => "110314",
            "ubigeo_inei" => "120415",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MARCO",
            "region" => "JUNIN",
            "superficie" => "29",
            "altitud" => "3480",
            "latitud" => "-11.7406",
            "longitud" => "-75.5611"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1100,
            "ubigeo_reniec" => "110315",
            "ubigeo_inei" => "120416",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MASMA",
            "region" => "JUNIN",
            "superficie" => "14",
            "altitud" => "3505",
            "latitud" => "-11.7853",
            "longitud" => "-75.4261"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1101,
            "ubigeo_reniec" => "110332",
            "ubigeo_inei" => "120417",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MASMA CHICCHE",
            "region" => "JUNIN",
            "superficie" => "30",
            "altitud" => "3671",
            "latitud" => "-11.7861",
            "longitud" => "-75.3817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1102,
            "ubigeo_reniec" => "110316",
            "ubigeo_inei" => "120418",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MOLINOS",
            "region" => "JUNIN",
            "superficie" => "312",
            "altitud" => "3459",
            "latitud" => "-11.7378",
            "longitud" => "-75.4461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1103,
            "ubigeo_reniec" => "110317",
            "ubigeo_inei" => "120419",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MONOBAMBA",
            "region" => "JUNIN",
            "superficie" => "296",
            "altitud" => "1495",
            "latitud" => "-11.3606",
            "longitud" => "-75.3267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1104,
            "ubigeo_reniec" => "110318",
            "ubigeo_inei" => "120420",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MUQUI",
            "region" => "JUNIN",
            "superficie" => "12",
            "altitud" => "3358",
            "latitud" => "-11.8333",
            "longitud" => "-75.435"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1105,
            "ubigeo_reniec" => "110319",
            "ubigeo_inei" => "120421",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "MUQUIYAUYO",
            "region" => "JUNIN",
            "superficie" => "20",
            "altitud" => "3373",
            "latitud" => "-11.8139",
            "longitud" => "-75.4539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1106,
            "ubigeo_reniec" => "110320",
            "ubigeo_inei" => "120422",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "PACA",
            "region" => "JUNIN",
            "superficie" => "34",
            "altitud" => "3402",
            "latitud" => "-11.7092",
            "longitud" => "-75.5183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1107,
            "ubigeo_reniec" => "110321",
            "ubigeo_inei" => "120423",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "PACCHA",
            "region" => "JUNIN",
            "superficie" => "91",
            "altitud" => "3679",
            "latitud" => "-11.8536",
            "longitud" => "-75.5064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1108,
            "ubigeo_reniec" => "110322",
            "ubigeo_inei" => "120424",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "PANCAN",
            "region" => "JUNIN",
            "superficie" => "11",
            "altitud" => "3398",
            "latitud" => "-11.7489",
            "longitud" => "-75.4861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1109,
            "ubigeo_reniec" => "110323",
            "ubigeo_inei" => "120425",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "PARCO",
            "region" => "JUNIN",
            "superficie" => "33",
            "altitud" => "3437",
            "latitud" => "-11.8011",
            "longitud" => "-75.5428"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1110,
            "ubigeo_reniec" => "110324",
            "ubigeo_inei" => "120426",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "POMACANCHA",
            "region" => "JUNIN",
            "superficie" => "282",
            "altitud" => "3824",
            "latitud" => "-11.7392",
            "longitud" => "-75.6233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1111,
            "ubigeo_reniec" => "110325",
            "ubigeo_inei" => "120427",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "RICRAN",
            "region" => "JUNIN",
            "superficie" => "320",
            "altitud" => "3645",
            "latitud" => "-11.5394",
            "longitud" => "-75.5272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1112,
            "ubigeo_reniec" => "110326",
            "ubigeo_inei" => "120428",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "SAN LORENZO",
            "region" => "JUNIN",
            "superficie" => "22",
            "altitud" => "3337",
            "latitud" => "-11.8464",
            "longitud" => "-75.3817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1113,
            "ubigeo_reniec" => "110327",
            "ubigeo_inei" => "120429",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "SAN PEDRO DE CHUNAN",
            "region" => "JUNIN",
            "superficie" => "8",
            "altitud" => "3417",
            "latitud" => "-11.7256",
            "longitud" => "-75.4864"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1114,
            "ubigeo_reniec" => "110333",
            "ubigeo_inei" => "120430",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "SAUSA",
            "region" => "JUNIN",
            "superficie" => "5",
            "altitud" => "3387",
            "latitud" => "-11.7936",
            "longitud" => "-75.4847"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1115,
            "ubigeo_reniec" => "110328",
            "ubigeo_inei" => "120431",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "SINCOS",
            "region" => "JUNIN",
            "superficie" => "237",
            "altitud" => "3280",
            "latitud" => "-11.8914",
            "longitud" => "-75.3869"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1116,
            "ubigeo_reniec" => "110329",
            "ubigeo_inei" => "120432",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "TUNAN MARCA",
            "region" => "JUNIN",
            "superficie" => "30",
            "altitud" => "3492",
            "latitud" => "-11.7297",
            "longitud" => "-75.5706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1117,
            "ubigeo_reniec" => "110330",
            "ubigeo_inei" => "120433",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "YAULI",
            "region" => "JUNIN",
            "superficie" => "93",
            "altitud" => "3439",
            "latitud" => "-11.715",
            "longitud" => "-75.4719"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1118,
            "ubigeo_reniec" => "110334",
            "ubigeo_inei" => "120434",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1204",
            "provincia" => "JAUJA",
            "distrito" => "YAUYOS",
            "region" => "JUNIN",
            "superficie" => "21",
            "altitud" => "3420",
            "latitud" => "-11.7808",
            "longitud" => "-75.4997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1119,
            "ubigeo_reniec" => "110401",
            "ubigeo_inei" => "120501",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1205",
            "provincia" => "JUNIN",
            "distrito" => "JUNIN",
            "region" => "JUNIN",
            "superficie" => "884",
            "altitud" => "4127",
            "latitud" => "-11.1614",
            "longitud" => "-75.9983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1120,
            "ubigeo_reniec" => "110402",
            "ubigeo_inei" => "120502",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1205",
            "provincia" => "JUNIN",
            "distrito" => "CARHUAMAYO",
            "region" => "JUNIN",
            "superficie" => "220",
            "altitud" => "4154",
            "latitud" => "-10.9228",
            "longitud" => "-76.0578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1121,
            "ubigeo_reniec" => "110403",
            "ubigeo_inei" => "120503",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1205",
            "provincia" => "JUNIN",
            "distrito" => "ONDORES",
            "region" => "JUNIN",
            "superficie" => "254",
            "altitud" => "4108",
            "latitud" => "-11.0836",
            "longitud" => "-76.1467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1122,
            "ubigeo_reniec" => "110404",
            "ubigeo_inei" => "120504",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1205",
            "provincia" => "JUNIN",
            "distrito" => "ULCUMAYO",
            "region" => "JUNIN",
            "superficie" => "1129",
            "altitud" => "3636",
            "latitud" => "-10.9675",
            "longitud" => "-75.8781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1123,
            "ubigeo_reniec" => "110701",
            "ubigeo_inei" => "120601",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "SATIPO",
            "region" => "JUNIN",
            "superficie" => "732",
            "altitud" => "676",
            "latitud" => "-11.2539",
            "longitud" => "-74.6361"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1124,
            "ubigeo_reniec" => "110702",
            "ubigeo_inei" => "120602",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "COVIRIALI",
            "region" => "JUNIN",
            "superficie" => "145",
            "altitud" => "708",
            "latitud" => "-11.2914",
            "longitud" => "-74.6275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1125,
            "ubigeo_reniec" => "110703",
            "ubigeo_inei" => "120603",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "LLAYLLA",
            "region" => "JUNIN",
            "superficie" => "180",
            "altitud" => "1122",
            "latitud" => "-11.3811",
            "longitud" => "-74.5903"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1126,
            "ubigeo_reniec" => "110704",
            "ubigeo_inei" => "120604",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "MAZAMARI",
            "region" => "JUNIN",
            "superficie" => "2220",
            "altitud" => "694",
            "latitud" => "-11.325",
            "longitud" => "-74.5303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1127,
            "ubigeo_reniec" => "110705",
            "ubigeo_inei" => "120605",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "PAMPA HERMOSA",
            "region" => "JUNIN",
            "superficie" => "567",
            "altitud" => "1231",
            "latitud" => "-11.4042",
            "longitud" => "-74.7517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1128,
            "ubigeo_reniec" => "110706",
            "ubigeo_inei" => "120606",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "PANGOA",
            "region" => "JUNIN",
            "superficie" => "3679",
            "altitud" => "816",
            "latitud" => "-11.4283",
            "longitud" => "-74.4889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1129,
            "ubigeo_reniec" => "110707",
            "ubigeo_inei" => "120607",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "RIO NEGRO",
            "region" => "JUNIN",
            "superficie" => "715",
            "altitud" => "665",
            "latitud" => "-11.2089",
            "longitud" => "-74.6594"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1130,
            "ubigeo_reniec" => "110708",
            "ubigeo_inei" => "120608",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "RIO TAMBO",
            "region" => "JUNIN",
            "superficie" => "10350",
            "altitud" => "358",
            "latitud" => "-11.1475",
            "longitud" => "-74.3064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1131,
            "ubigeo_reniec" => "110709",
            "ubigeo_inei" => "120609",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1206",
            "provincia" => "SATIPO",
            "distrito" => "VIZCATAN DEL ENE",
            "region" => "JUNIN",
            "superficie" => "631",
            "altitud" => "539",
            "latitud" => "-12.1861",
            "longitud" => "-74.0272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1132,
            "ubigeo_reniec" => "110501",
            "ubigeo_inei" => "120701",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "TARMA",
            "region" => "JUNIN",
            "superficie" => "460",
            "altitud" => "3094",
            "latitud" => "-11.42",
            "longitud" => "-75.6881"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1133,
            "ubigeo_reniec" => "110502",
            "ubigeo_inei" => "120702",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "ACOBAMBA",
            "region" => "JUNIN",
            "superficie" => "98",
            "altitud" => "2961",
            "latitud" => "-11.3533",
            "longitud" => "-75.6592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1134,
            "ubigeo_reniec" => "110503",
            "ubigeo_inei" => "120703",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "HUARICOLCA",
            "region" => "JUNIN",
            "superficie" => "162",
            "altitud" => "3783",
            "latitud" => "-11.5119",
            "longitud" => "-75.6528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1135,
            "ubigeo_reniec" => "110504",
            "ubigeo_inei" => "120704",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "HUASAHUASI",
            "region" => "JUNIN",
            "superficie" => "652",
            "altitud" => "2768",
            "latitud" => "-11.265",
            "longitud" => "-75.6503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1136,
            "ubigeo_reniec" => "110505",
            "ubigeo_inei" => "120705",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "LA UNION",
            "region" => "JUNIN",
            "superficie" => "140",
            "altitud" => "3556",
            "latitud" => "-11.3772",
            "longitud" => "-75.7519"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1137,
            "ubigeo_reniec" => "110506",
            "ubigeo_inei" => "120706",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "PALCA",
            "region" => "JUNIN",
            "superficie" => "378",
            "altitud" => "2759",
            "latitud" => "-11.3461",
            "longitud" => "-75.5686"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1138,
            "ubigeo_reniec" => "110507",
            "ubigeo_inei" => "120707",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "PALCAMAYO",
            "region" => "JUNIN",
            "superficie" => "169",
            "altitud" => "3351",
            "latitud" => "-11.2958",
            "longitud" => "-75.7728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1139,
            "ubigeo_reniec" => "110508",
            "ubigeo_inei" => "120708",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "SAN PEDRO DE CAJAS",
            "region" => "JUNIN",
            "superficie" => "537",
            "altitud" => "4027",
            "latitud" => "-11.2492",
            "longitud" => "-75.8628"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1140,
            "ubigeo_reniec" => "110509",
            "ubigeo_inei" => "120709",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1207",
            "provincia" => "TARMA",
            "distrito" => "TAPO",
            "region" => "JUNIN",
            "superficie" => "152",
            "altitud" => "3146",
            "latitud" => "-11.3903",
            "longitud" => "-75.5639"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1141,
            "ubigeo_reniec" => "110601",
            "ubigeo_inei" => "120801",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "LA OROYA",
            "region" => "JUNIN",
            "superficie" => "388",
            "altitud" => "3757",
            "latitud" => "-11.5219",
            "longitud" => "-75.9078"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1142,
            "ubigeo_reniec" => "110602",
            "ubigeo_inei" => "120802",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "CHACAPALPA",
            "region" => "JUNIN",
            "superficie" => "183",
            "altitud" => "3775",
            "latitud" => "-11.7328",
            "longitud" => "-75.7556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1143,
            "ubigeo_reniec" => "110603",
            "ubigeo_inei" => "120803",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "HUAY-HUAY",
            "region" => "JUNIN",
            "superficie" => "180",
            "altitud" => "3995",
            "latitud" => "-11.7225",
            "longitud" => "-75.905"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1144,
            "ubigeo_reniec" => "110604",
            "ubigeo_inei" => "120804",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "MARCAPOMACOCHA",
            "region" => "JUNIN",
            "superficie" => "889",
            "altitud" => "4451",
            "latitud" => "-11.4067",
            "longitud" => "-76.3361"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1145,
            "ubigeo_reniec" => "110605",
            "ubigeo_inei" => "120805",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "MOROCOCHA",
            "region" => "JUNIN",
            "superficie" => "266",
            "altitud" => "4268",
            "latitud" => "-11.5872",
            "longitud" => "-76.0633"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1146,
            "ubigeo_reniec" => "110606",
            "ubigeo_inei" => "120806",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "PACCHA",
            "region" => "JUNIN",
            "superficie" => "324",
            "altitud" => "3786",
            "latitud" => "-11.4731",
            "longitud" => "-75.9606"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1147,
            "ubigeo_reniec" => "110607",
            "ubigeo_inei" => "120807",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "SANTA BARBARA DE CARHUACAYAN",
            "region" => "JUNIN",
            "superficie" => "646",
            "altitud" => "4145",
            "latitud" => "-11.2039",
            "longitud" => "-76.2856"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1148,
            "ubigeo_reniec" => "110610",
            "ubigeo_inei" => "120808",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "SANTA ROSA DE SACCO",
            "region" => "JUNIN",
            "superficie" => "101",
            "altitud" => "3831",
            "latitud" => "-11.5492",
            "longitud" => "-75.9403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1149,
            "ubigeo_reniec" => "110608",
            "ubigeo_inei" => "120809",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "SUITUCANCHA",
            "region" => "JUNIN",
            "superficie" => "216",
            "altitud" => "4286",
            "latitud" => "-11.7875",
            "longitud" => "-75.9364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1150,
            "ubigeo_reniec" => "110609",
            "ubigeo_inei" => "120810",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1208",
            "provincia" => "YAULI",
            "distrito" => "YAULI",
            "region" => "JUNIN",
            "superficie" => "424",
            "altitud" => "4137",
            "latitud" => "-11.6658",
            "longitud" => "-76.0858"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1151,
            "ubigeo_reniec" => "110901",
            "ubigeo_inei" => "120901",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "CHUPACA",
            "region" => "JUNIN",
            "superficie" => "22",
            "altitud" => "3286",
            "latitud" => "-12.0578",
            "longitud" => "-75.2894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1152,
            "ubigeo_reniec" => "110902",
            "ubigeo_inei" => "120902",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "AHUAC",
            "region" => "JUNIN",
            "superficie" => "70",
            "altitud" => "3341",
            "latitud" => "-12.0858",
            "longitud" => "-75.3211"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1153,
            "ubigeo_reniec" => "110903",
            "ubigeo_inei" => "120903",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "CHONGOS BAJO",
            "region" => "JUNIN",
            "superficie" => "101",
            "altitud" => "3288",
            "latitud" => "-12.1339",
            "longitud" => "-75.2681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1154,
            "ubigeo_reniec" => "110904",
            "ubigeo_inei" => "120904",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "HUACHAC",
            "region" => "JUNIN",
            "superficie" => "22",
            "altitud" => "3378",
            "latitud" => "-12.0206",
            "longitud" => "-75.3411"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1155,
            "ubigeo_reniec" => "110905",
            "ubigeo_inei" => "120905",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "HUAMANCACA CHICO",
            "region" => "JUNIN",
            "superficie" => "9",
            "altitud" => "3203",
            "latitud" => "-12.0808",
            "longitud" => "-75.2422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1156,
            "ubigeo_reniec" => "110906",
            "ubigeo_inei" => "120906",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "SAN JUAN DE YSCOS",
            "region" => "JUNIN",
            "superficie" => "25",
            "altitud" => "3280",
            "latitud" => "-12.0983",
            "longitud" => "-75.2928"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1157,
            "ubigeo_reniec" => "110907",
            "ubigeo_inei" => "120907",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "SAN JUAN DE JARPA",
            "region" => "JUNIN",
            "superficie" => "137",
            "altitud" => "3692",
            "latitud" => "-12.1264",
            "longitud" => "-75.4356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1158,
            "ubigeo_reniec" => "110908",
            "ubigeo_inei" => "120908",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "TRES DE DICIEMBRE",
            "region" => "JUNIN",
            "superficie" => "15",
            "altitud" => "3193",
            "latitud" => "-12.1097",
            "longitud" => "-75.2458"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1159,
            "ubigeo_reniec" => "110909",
            "ubigeo_inei" => "120909",
            "departamento_inei" => "12",
            "departamento" => "JUNIN",
            "provincia_inei" => "1209",
            "provincia" => "CHUPACA",
            "distrito" => "YANACANCHA",
            "region" => "JUNIN",
            "superficie" => "743",
            "altitud" => "3854",
            "latitud" => "-12.2011",
            "longitud" => "-75.3867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1160,
            "ubigeo_reniec" => "120101",
            "ubigeo_inei" => "130101",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "TRUJILLO",
            "region" => "LA LIBERTAD",
            "superficie" => "39",
            "altitud" => "74",
            "latitud" => "-8.1",
            "longitud" => "-79.0306"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1161,
            "ubigeo_reniec" => "120110",
            "ubigeo_inei" => "130102",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "EL PORVENIR",
            "region" => "LA LIBERTAD",
            "superficie" => "37",
            "altitud" => "92",
            "latitud" => "-8.0881",
            "longitud" => "-78.9978"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1162,
            "ubigeo_reniec" => "120112",
            "ubigeo_inei" => "130103",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "FLORENCIA DE MORA",
            "region" => "LA LIBERTAD",
            "superficie" => "2",
            "altitud" => "92",
            "latitud" => "-8.0828",
            "longitud" => "-79.0233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1163,
            "ubigeo_reniec" => "120102",
            "ubigeo_inei" => "130104",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "HUANCHACO",
            "region" => "LA LIBERTAD",
            "superficie" => "332",
            "altitud" => "19",
            "latitud" => "-8.08",
            "longitud" => "-79.1217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1164,
            "ubigeo_reniec" => "120111",
            "ubigeo_inei" => "130105",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "LA ESPERANZA",
            "region" => "LA LIBERTAD",
            "superficie" => "16",
            "altitud" => "137",
            "latitud" => "-8.0561",
            "longitud" => "-79.0517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1165,
            "ubigeo_reniec" => "120103",
            "ubigeo_inei" => "130106",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "LAREDO",
            "region" => "LA LIBERTAD",
            "superficie" => "335",
            "altitud" => "107",
            "latitud" => "-8.0897",
            "longitud" => "-78.9603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1166,
            "ubigeo_reniec" => "120104",
            "ubigeo_inei" => "130107",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "MOCHE",
            "region" => "LA LIBERTAD",
            "superficie" => "25",
            "altitud" => "25",
            "latitud" => "-8.1714",
            "longitud" => "-79.0092"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1167,
            "ubigeo_reniec" => "120109",
            "ubigeo_inei" => "130108",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "POROTO",
            "region" => "LA LIBERTAD",
            "superficie" => "276",
            "altitud" => "659",
            "latitud" => "-8.0114",
            "longitud" => "-78.7678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1168,
            "ubigeo_reniec" => "120105",
            "ubigeo_inei" => "130109",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "SALAVERRY",
            "region" => "LA LIBERTAD",
            "superficie" => "296",
            "altitud" => "10",
            "latitud" => "-8.2244",
            "longitud" => "-78.9761"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1169,
            "ubigeo_reniec" => "120106",
            "ubigeo_inei" => "130110",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "SIMBAL",
            "region" => "LA LIBERTAD",
            "superficie" => "391",
            "altitud" => "604",
            "latitud" => "-7.9767",
            "longitud" => "-78.8133"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1170,
            "ubigeo_reniec" => "120107",
            "ubigeo_inei" => "130111",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1301",
            "provincia" => "TRUJILLO",
            "distrito" => "VICTOR LARCO HERRERA",
            "region" => "LA LIBERTAD",
            "superficie" => "18",
            "altitud" => "24",
            "latitud" => "-8.1364",
            "longitud" => "-79.0433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1171,
            "ubigeo_reniec" => "120801",
            "ubigeo_inei" => "130201",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "ASCOPE",
            "region" => "LA LIBERTAD",
            "superficie" => "290",
            "altitud" => "242",
            "latitud" => "-7.7136",
            "longitud" => "-79.1072"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1172,
            "ubigeo_reniec" => "120802",
            "ubigeo_inei" => "130202",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "CHICAMA",
            "region" => "LA LIBERTAD",
            "superficie" => "871",
            "altitud" => "150",
            "latitud" => "-7.8425",
            "longitud" => "-79.1442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1173,
            "ubigeo_reniec" => "120803",
            "ubigeo_inei" => "130203",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "CHOCOPE",
            "region" => "LA LIBERTAD",
            "superficie" => "96",
            "altitud" => "118",
            "latitud" => "-7.7914",
            "longitud" => "-79.2231"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1174,
            "ubigeo_reniec" => "120805",
            "ubigeo_inei" => "130204",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "MAGDALENA DE CAO",
            "region" => "LA LIBERTAD",
            "superficie" => "163",
            "altitud" => "42",
            "latitud" => "-7.8764",
            "longitud" => "-79.2958"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1175,
            "ubigeo_reniec" => "120806",
            "ubigeo_inei" => "130205",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "PAIJAN",
            "region" => "LA LIBERTAD",
            "superficie" => "80",
            "altitud" => "97",
            "latitud" => "-7.7347",
            "longitud" => "-79.3033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1176,
            "ubigeo_reniec" => "120807",
            "ubigeo_inei" => "130206",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "RAZURI",
            "region" => "LA LIBERTAD",
            "superficie" => "317",
            "altitud" => "14",
            "latitud" => "-7.7022",
            "longitud" => "-79.4378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1177,
            "ubigeo_reniec" => "120804",
            "ubigeo_inei" => "130207",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "SANTIAGO DE CAO",
            "region" => "LA LIBERTAD",
            "superficie" => "155",
            "altitud" => "32",
            "latitud" => "-7.9578",
            "longitud" => "-79.2436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1178,
            "ubigeo_reniec" => "120808",
            "ubigeo_inei" => "130208",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1302",
            "provincia" => "ASCOPE",
            "distrito" => "CASA GRANDE",
            "region" => "LA LIBERTAD",
            "superficie" => "688",
            "altitud" => "162",
            "latitud" => "-7.7453",
            "longitud" => "-79.1881"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1179,
            "ubigeo_reniec" => "120201",
            "ubigeo_inei" => "130301",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "BOLIVAR",
            "region" => "LA LIBERTAD",
            "superficie" => "741",
            "altitud" => "3157",
            "latitud" => "-7.1539",
            "longitud" => "-77.7022"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1180,
            "ubigeo_reniec" => "120202",
            "ubigeo_inei" => "130302",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "BAMBAMARCA",
            "region" => "LA LIBERTAD",
            "superficie" => "165",
            "altitud" => "3488",
            "latitud" => "-7.4397",
            "longitud" => "-77.6931"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1181,
            "ubigeo_reniec" => "120203",
            "ubigeo_inei" => "130303",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "CONDORMARCA",
            "region" => "LA LIBERTAD",
            "superficie" => "331",
            "altitud" => "2793",
            "latitud" => "-7.5467",
            "longitud" => "-77.5997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1182,
            "ubigeo_reniec" => "120204",
            "ubigeo_inei" => "130304",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "LONGOTEA",
            "region" => "LA LIBERTAD",
            "superficie" => "193",
            "altitud" => "2617",
            "latitud" => "-7.0439",
            "longitud" => "-77.8722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1183,
            "ubigeo_reniec" => "120206",
            "ubigeo_inei" => "130305",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "UCHUMARCA",
            "region" => "LA LIBERTAD",
            "superficie" => "191",
            "altitud" => "3043",
            "latitud" => "-7.0472",
            "longitud" => "-77.8056"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1184,
            "ubigeo_reniec" => "120205",
            "ubigeo_inei" => "130306",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1303",
            "provincia" => "BOLIVAR",
            "distrito" => "UCUNCHA",
            "region" => "LA LIBERTAD",
            "superficie" => "98",
            "altitud" => "2634",
            "latitud" => "-7.1653",
            "longitud" => "-77.8592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1185,
            "ubigeo_reniec" => "120901",
            "ubigeo_inei" => "130401",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1304",
            "provincia" => "CHEPEN",
            "distrito" => "CHEPEN",
            "region" => "LA LIBERTAD",
            "superficie" => "287",
            "altitud" => "160",
            "latitud" => "-7.2275",
            "longitud" => "-79.4294"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1186,
            "ubigeo_reniec" => "120902",
            "ubigeo_inei" => "130402",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1304",
            "provincia" => "CHEPEN",
            "distrito" => "PACANGA",
            "region" => "LA LIBERTAD",
            "superficie" => "584",
            "altitud" => "112",
            "latitud" => "-7.1714",
            "longitud" => "-79.4856"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1187,
            "ubigeo_reniec" => "120903",
            "ubigeo_inei" => "130403",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1304",
            "provincia" => "CHEPEN",
            "distrito" => "PUEBLO NUEVO",
            "region" => "LA LIBERTAD",
            "superficie" => "271",
            "altitud" => "84",
            "latitud" => "-7.1825",
            "longitud" => "-79.52"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1188,
            "ubigeo_reniec" => "121001",
            "ubigeo_inei" => "130501",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1305",
            "provincia" => "JULCAN",
            "distrito" => "JULCAN",
            "region" => "LA LIBERTAD",
            "superficie" => "208",
            "altitud" => "3420",
            "latitud" => "-8.0428",
            "longitud" => "-78.4864"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1189,
            "ubigeo_reniec" => "121003",
            "ubigeo_inei" => "130502",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1305",
            "provincia" => "JULCAN",
            "distrito" => "CALAMARCA",
            "region" => "LA LIBERTAD",
            "superficie" => "208",
            "altitud" => "3377",
            "latitud" => "-8.17",
            "longitud" => "-78.4122"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1190,
            "ubigeo_reniec" => "121002",
            "ubigeo_inei" => "130503",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1305",
            "provincia" => "JULCAN",
            "distrito" => "CARABAMBA",
            "region" => "LA LIBERTAD",
            "superficie" => "254",
            "altitud" => "3345",
            "latitud" => "-8.1125",
            "longitud" => "-78.6075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1191,
            "ubigeo_reniec" => "121004",
            "ubigeo_inei" => "130504",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1305",
            "provincia" => "JULCAN",
            "distrito" => "HUASO",
            "region" => "LA LIBERTAD",
            "superficie" => "431",
            "altitud" => "3075",
            "latitud" => "-8.2247",
            "longitud" => "-78.4142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1192,
            "ubigeo_reniec" => "120401",
            "ubigeo_inei" => "130601",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "OTUZCO",
            "region" => "LA LIBERTAD",
            "superficie" => "444",
            "altitud" => "2701",
            "latitud" => "-7.9022",
            "longitud" => "-78.5656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1193,
            "ubigeo_reniec" => "120402",
            "ubigeo_inei" => "130602",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "AGALLPAMPA",
            "region" => "LA LIBERTAD",
            "superficie" => "259",
            "altitud" => "3143",
            "latitud" => "-7.9819",
            "longitud" => "-78.5467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1194,
            "ubigeo_reniec" => "120403",
            "ubigeo_inei" => "130604",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "CHARAT",
            "region" => "LA LIBERTAD",
            "superficie" => "69",
            "altitud" => "2280",
            "latitud" => "-7.8239",
            "longitud" => "-78.4481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1195,
            "ubigeo_reniec" => "120404",
            "ubigeo_inei" => "130605",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "HUARANCHAL",
            "region" => "LA LIBERTAD",
            "superficie" => "150",
            "altitud" => "2208",
            "latitud" => "-7.6897",
            "longitud" => "-78.4425"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1196,
            "ubigeo_reniec" => "120405",
            "ubigeo_inei" => "130606",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "LA CUESTA",
            "region" => "LA LIBERTAD",
            "superficie" => "39",
            "altitud" => "1900",
            "latitud" => "-7.9189",
            "longitud" => "-78.7047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1197,
            "ubigeo_reniec" => "120413",
            "ubigeo_inei" => "130608",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "MACHE",
            "region" => "LA LIBERTAD",
            "superficie" => "37",
            "altitud" => "3320",
            "latitud" => "-8.0292",
            "longitud" => "-78.535"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1198,
            "ubigeo_reniec" => "120408",
            "ubigeo_inei" => "130610",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "PARANDAY",
            "region" => "LA LIBERTAD",
            "superficie" => "21",
            "altitud" => "3137",
            "latitud" => "-7.885",
            "longitud" => "-78.7094"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1199,
            "ubigeo_reniec" => "120409",
            "ubigeo_inei" => "130611",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "SALPO",
            "region" => "LA LIBERTAD",
            "superficie" => "193",
            "altitud" => "3461",
            "latitud" => "-8.0031",
            "longitud" => "-78.6042"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1200,
            "ubigeo_reniec" => "120410",
            "ubigeo_inei" => "130613",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "SINSICAP",
            "region" => "LA LIBERTAD",
            "superficie" => "453",
            "altitud" => "2335",
            "latitud" => "-7.8517",
            "longitud" => "-78.7542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1201,
            "ubigeo_reniec" => "120411",
            "ubigeo_inei" => "130614",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1306",
            "provincia" => "OTUZCO",
            "distrito" => "USQUIL",
            "region" => "LA LIBERTAD",
            "superficie" => "446",
            "altitud" => "3049",
            "latitud" => "-7.8153",
            "longitud" => "-78.4167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1202,
            "ubigeo_reniec" => "120501",
            "ubigeo_inei" => "130701",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1307",
            "provincia" => "PACASMAYO",
            "distrito" => "SAN PEDRO DE LLOC",
            "region" => "LA LIBERTAD",
            "superficie" => "697",
            "altitud" => "49",
            "latitud" => "-7.4183",
            "longitud" => "-79.5147"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1203,
            "ubigeo_reniec" => "120503",
            "ubigeo_inei" => "130702",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1307",
            "provincia" => "PACASMAYO",
            "distrito" => "GUADALUPE",
            "region" => "LA LIBERTAD",
            "superficie" => "165",
            "altitud" => "124",
            "latitud" => "-7.2436",
            "longitud" => "-79.4703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1204,
            "ubigeo_reniec" => "120504",
            "ubigeo_inei" => "130703",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1307",
            "provincia" => "PACASMAYO",
            "distrito" => "JEQUETEPEQUE",
            "region" => "LA LIBERTAD",
            "superficie" => "51",
            "altitud" => "13",
            "latitud" => "-7.3375",
            "longitud" => "-79.5631"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1205,
            "ubigeo_reniec" => "120506",
            "ubigeo_inei" => "130704",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1307",
            "provincia" => "PACASMAYO",
            "distrito" => "PACASMAYO",
            "region" => "LA LIBERTAD",
            "superficie" => "31",
            "altitud" => "21",
            "latitud" => "-7.4011",
            "longitud" => "-79.5722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1206,
            "ubigeo_reniec" => "120508",
            "ubigeo_inei" => "130705",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1307",
            "provincia" => "PACASMAYO",
            "distrito" => "SAN JOSE",
            "region" => "LA LIBERTAD",
            "superficie" => "181",
            "altitud" => "117",
            "latitud" => "-7.35",
            "longitud" => "-79.4553"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1207,
            "ubigeo_reniec" => "120601",
            "ubigeo_inei" => "130801",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "TAYABAMBA",
            "region" => "LA LIBERTAD",
            "superficie" => "339",
            "altitud" => "3222",
            "latitud" => "-8.275",
            "longitud" => "-77.2961"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1208,
            "ubigeo_reniec" => "120602",
            "ubigeo_inei" => "130802",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "BULDIBUYO",
            "region" => "LA LIBERTAD",
            "superficie" => "227",
            "altitud" => "3189",
            "latitud" => "-8.1269",
            "longitud" => "-77.3953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1209,
            "ubigeo_reniec" => "120603",
            "ubigeo_inei" => "130803",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "CHILLIA",
            "region" => "LA LIBERTAD",
            "superficie" => "300",
            "altitud" => "3166",
            "latitud" => "-8.1244",
            "longitud" => "-77.515"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1210,
            "ubigeo_reniec" => "120605",
            "ubigeo_inei" => "130804",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "HUANCASPATA",
            "region" => "LA LIBERTAD",
            "superficie" => "247",
            "altitud" => "3313",
            "latitud" => "-8.4575",
            "longitud" => "-77.2983"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1211,
            "ubigeo_reniec" => "120604",
            "ubigeo_inei" => "130805",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "HUAYLILLAS",
            "region" => "LA LIBERTAD",
            "superficie" => "90",
            "altitud" => "2381",
            "latitud" => "-8.1872",
            "longitud" => "-77.3439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1212,
            "ubigeo_reniec" => "120606",
            "ubigeo_inei" => "130806",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "HUAYO",
            "region" => "LA LIBERTAD",
            "superficie" => "125",
            "altitud" => "2188",
            "latitud" => "-8.0044",
            "longitud" => "-77.5922"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1213,
            "ubigeo_reniec" => "120607",
            "ubigeo_inei" => "130807",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "ONGON",
            "region" => "LA LIBERTAD",
            "superficie" => "1395",
            "altitud" => "1353",
            "latitud" => "-8.2078",
            "longitud" => "-76.9828"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1214,
            "ubigeo_reniec" => "120608",
            "ubigeo_inei" => "130808",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "PARCOY",
            "region" => "LA LIBERTAD",
            "superficie" => "305",
            "altitud" => "3121",
            "latitud" => "-8.0333",
            "longitud" => "-77.4797"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1215,
            "ubigeo_reniec" => "120609",
            "ubigeo_inei" => "130809",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "PATAZ",
            "region" => "LA LIBERTAD",
            "superficie" => "467",
            "altitud" => "2611",
            "latitud" => "-7.785",
            "longitud" => "-77.5939"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1216,
            "ubigeo_reniec" => "120610",
            "ubigeo_inei" => "130810",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "PIAS",
            "region" => "LA LIBERTAD",
            "superficie" => "372",
            "altitud" => "2641",
            "latitud" => "-7.8719",
            "longitud" => "-77.5467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1217,
            "ubigeo_reniec" => "120613",
            "ubigeo_inei" => "130811",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "SANTIAGO DE CHALLAS",
            "region" => "LA LIBERTAD",
            "superficie" => "129",
            "altitud" => "3316",
            "latitud" => "-8.4381",
            "longitud" => "-77.3206"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1218,
            "ubigeo_reniec" => "120611",
            "ubigeo_inei" => "130812",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "TAURIJA",
            "region" => "LA LIBERTAD",
            "superficie" => "130",
            "altitud" => "3123",
            "latitud" => "-8.3078",
            "longitud" => "-77.4236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1219,
            "ubigeo_reniec" => "120612",
            "ubigeo_inei" => "130813",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1308",
            "provincia" => "PATAZ",
            "distrito" => "URPAY",
            "region" => "LA LIBERTAD",
            "superficie" => "100",
            "altitud" => "2707",
            "latitud" => "-8.3478",
            "longitud" => "-77.3894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1220,
            "ubigeo_reniec" => "120301",
            "ubigeo_inei" => "130901",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "HUAMACHUCO",
            "region" => "LA LIBERTAD",
            "superficie" => "424",
            "altitud" => "3183",
            "latitud" => "-7.8111",
            "longitud" => "-78.0467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1221,
            "ubigeo_reniec" => "120304",
            "ubigeo_inei" => "130902",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "CHUGAY",
            "region" => "LA LIBERTAD",
            "superficie" => "416",
            "altitud" => "3394",
            "latitud" => "-7.7819",
            "longitud" => "-77.8683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1222,
            "ubigeo_reniec" => "120302",
            "ubigeo_inei" => "130903",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "COCHORCO",
            "region" => "LA LIBERTAD",
            "superficie" => "258",
            "altitud" => "2620",
            "latitud" => "-7.8064",
            "longitud" => "-77.7175"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1223,
            "ubigeo_reniec" => "120303",
            "ubigeo_inei" => "130904",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "CURGOS",
            "region" => "LA LIBERTAD",
            "superficie" => "100",
            "altitud" => "3244",
            "latitud" => "-7.86",
            "longitud" => "-77.9439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1224,
            "ubigeo_reniec" => "120305",
            "ubigeo_inei" => "130905",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "MARCABAL",
            "region" => "LA LIBERTAD",
            "superficie" => "230",
            "altitud" => "2943",
            "latitud" => "-7.7058",
            "longitud" => "-78.0336"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1225,
            "ubigeo_reniec" => "120306",
            "ubigeo_inei" => "130906",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "SANAGORAN",
            "region" => "LA LIBERTAD",
            "superficie" => "324",
            "altitud" => "2688",
            "latitud" => "-7.7861",
            "longitud" => "-78.1419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1226,
            "ubigeo_reniec" => "120307",
            "ubigeo_inei" => "130907",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "SARIN",
            "region" => "LA LIBERTAD",
            "superficie" => "340",
            "altitud" => "2840",
            "latitud" => "-7.9114",
            "longitud" => "-77.9061"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1227,
            "ubigeo_reniec" => "120308",
            "ubigeo_inei" => "130908",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1309",
            "provincia" => "SANCHEZ CARRION",
            "distrito" => "SARTIMBAMBA",
            "region" => "LA LIBERTAD",
            "superficie" => "394",
            "altitud" => "2697",
            "latitud" => "-7.6992",
            "longitud" => "-77.7436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1228,
            "ubigeo_reniec" => "120701",
            "ubigeo_inei" => "131001",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "SANTIAGO DE CHUCO",
            "region" => "LA LIBERTAD",
            "superficie" => "1074",
            "altitud" => "3126",
            "latitud" => "-8.1453",
            "longitud" => "-78.1736"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1229,
            "ubigeo_reniec" => "120708",
            "ubigeo_inei" => "131002",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "ANGASMARCA",
            "region" => "LA LIBERTAD",
            "superficie" => "153",
            "altitud" => "2889",
            "latitud" => "-8.1328",
            "longitud" => "-78.0558"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1230,
            "ubigeo_reniec" => "120702",
            "ubigeo_inei" => "131003",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "CACHICADAN",
            "region" => "LA LIBERTAD",
            "superficie" => "267",
            "altitud" => "2897",
            "latitud" => "-8.0944",
            "longitud" => "-78.1489"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1231,
            "ubigeo_reniec" => "120703",
            "ubigeo_inei" => "131004",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "MOLLEBAMBA",
            "region" => "LA LIBERTAD",
            "superficie" => "70",
            "altitud" => "3099",
            "latitud" => "-8.1708",
            "longitud" => "-77.9739"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1232,
            "ubigeo_reniec" => "120704",
            "ubigeo_inei" => "131005",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "MOLLEPATA",
            "region" => "LA LIBERTAD",
            "superficie" => "71",
            "altitud" => "2694",
            "latitud" => "-8.1933",
            "longitud" => "-77.9572"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1233,
            "ubigeo_reniec" => "120705",
            "ubigeo_inei" => "131006",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "QUIRUVILCA",
            "region" => "LA LIBERTAD",
            "superficie" => "549",
            "altitud" => "3992",
            "latitud" => "-8.0019",
            "longitud" => "-78.31"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1234,
            "ubigeo_reniec" => "120706",
            "ubigeo_inei" => "131007",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "SANTA CRUZ DE CHUCA",
            "region" => "LA LIBERTAD",
            "superficie" => "165",
            "altitud" => "2937",
            "latitud" => "-8.1203",
            "longitud" => "-78.1422"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1235,
            "ubigeo_reniec" => "120707",
            "ubigeo_inei" => "131008",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1310",
            "provincia" => "SANTIAGO DE CHUCO",
            "distrito" => "SITABAMBA",
            "region" => "LA LIBERTAD",
            "superficie" => "310",
            "altitud" => "3080",
            "latitud" => "-8.0222",
            "longitud" => "-77.73"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1236,
            "ubigeo_reniec" => "121101",
            "ubigeo_inei" => "131101",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1311",
            "provincia" => "GRAN CHIMU",
            "distrito" => "CASCAS",
            "region" => "LA LIBERTAD",
            "superficie" => "466",
            "altitud" => "1278",
            "latitud" => "-7.4794",
            "longitud" => "-78.8197"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1237,
            "ubigeo_reniec" => "121102",
            "ubigeo_inei" => "131102",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1311",
            "provincia" => "GRAN CHIMU",
            "distrito" => "LUCMA",
            "region" => "LA LIBERTAD",
            "superficie" => "280",
            "altitud" => "2192",
            "latitud" => "-7.6406",
            "longitud" => "-78.5522"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1238,
            "ubigeo_reniec" => "121103",
            "ubigeo_inei" => "131103",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1311",
            "provincia" => "GRAN CHIMU",
            "distrito" => "MARMOT",
            "region" => "LA LIBERTAD",
            "superficie" => "300",
            "altitud" => "1512",
            "latitud" => "-7.6983",
            "longitud" => "-78.6261"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1239,
            "ubigeo_reniec" => "121104",
            "ubigeo_inei" => "131104",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1311",
            "provincia" => "GRAN CHIMU",
            "distrito" => "SAYAPULLO",
            "region" => "LA LIBERTAD",
            "superficie" => "238",
            "altitud" => "2384",
            "latitud" => "-7.5958",
            "longitud" => "-78.465"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1240,
            "ubigeo_reniec" => "121201",
            "ubigeo_inei" => "131201",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1312",
            "provincia" => "VIRU",
            "distrito" => "VIRU",
            "region" => "LA LIBERTAD",
            "superficie" => "1073",
            "altitud" => "88",
            "latitud" => "-8.4144",
            "longitud" => "-78.7528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1241,
            "ubigeo_reniec" => "121202",
            "ubigeo_inei" => "131202",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1312",
            "provincia" => "VIRU",
            "distrito" => "CHAO",
            "region" => "LA LIBERTAD",
            "superficie" => "1737",
            "altitud" => "103",
            "latitud" => "-8.5406",
            "longitud" => "-78.6789"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1242,
            "ubigeo_reniec" => "121203",
            "ubigeo_inei" => "131203",
            "departamento_inei" => "13",
            "departamento" => "LA LIBERTAD",
            "provincia_inei" => "1312",
            "provincia" => "VIRU",
            "distrito" => "GUADALUPITO",
            "region" => "LA LIBERTAD",
            "superficie" => "405",
            "altitud" => "30",
            "latitud" => "-8.9517",
            "longitud" => "-78.6247"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1243,
            "ubigeo_reniec" => "130101",
            "ubigeo_inei" => "140101",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "CHICLAYO",
            "region" => "LAMBAYEQUE",
            "superficie" => "50",
            "altitud" => "28",
            "latitud" => "-6.7669",
            "longitud" => "-79.8506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1244,
            "ubigeo_reniec" => "130102",
            "ubigeo_inei" => "140102",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "CHONGOYAPE",
            "region" => "LAMBAYEQUE",
            "superficie" => "712",
            "altitud" => "219",
            "latitud" => "-6.6431",
            "longitud" => "-79.3853"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1245,
            "ubigeo_reniec" => "130103",
            "ubigeo_inei" => "140103",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "ETEN",
            "region" => "LAMBAYEQUE",
            "superficie" => "85",
            "altitud" => "15",
            "latitud" => "-6.9069",
            "longitud" => "-79.8625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1246,
            "ubigeo_reniec" => "130104",
            "ubigeo_inei" => "140104",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "ETEN PUERTO",
            "region" => "LAMBAYEQUE",
            "superficie" => "14",
            "altitud" => "14",
            "latitud" => "-6.9256",
            "longitud" => "-79.8661"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1247,
            "ubigeo_reniec" => "130112",
            "ubigeo_inei" => "140105",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "JOSE LEONARDO ORTIZ",
            "region" => "LAMBAYEQUE",
            "superficie" => "28",
            "altitud" => "41",
            "latitud" => "-6.7631",
            "longitud" => "-79.8344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1248,
            "ubigeo_reniec" => "130115",
            "ubigeo_inei" => "140106",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "LA VICTORIA",
            "region" => "LAMBAYEQUE",
            "superficie" => "29",
            "altitud" => "36",
            "latitud" => "-6.7944",
            "longitud" => "-79.8444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1249,
            "ubigeo_reniec" => "130105",
            "ubigeo_inei" => "140107",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "LAGUNAS",
            "region" => "LAMBAYEQUE",
            "superficie" => "429",
            "altitud" => "34",
            "latitud" => "-6.9911",
            "longitud" => "-79.6228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1250,
            "ubigeo_reniec" => "130106",
            "ubigeo_inei" => "140108",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "MONSEFU",
            "region" => "LAMBAYEQUE",
            "superficie" => "45",
            "altitud" => "40",
            "latitud" => "-6.8781",
            "longitud" => "-79.8725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1251,
            "ubigeo_reniec" => "130107",
            "ubigeo_inei" => "140109",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "NUEVA ARICA",
            "region" => "LAMBAYEQUE",
            "superficie" => "209",
            "altitud" => "178",
            "latitud" => "-6.8742",
            "longitud" => "-79.3436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1252,
            "ubigeo_reniec" => "130108",
            "ubigeo_inei" => "140110",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "OYOTUN",
            "region" => "LAMBAYEQUE",
            "superficie" => "455",
            "altitud" => "209",
            "latitud" => "-6.8544",
            "longitud" => "-79.3064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1253,
            "ubigeo_reniec" => "130109",
            "ubigeo_inei" => "140111",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "PICSI",
            "region" => "LAMBAYEQUE",
            "superficie" => "57",
            "altitud" => "43",
            "latitud" => "-6.7183",
            "longitud" => "-79.7706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1254,
            "ubigeo_reniec" => "130110",
            "ubigeo_inei" => "140112",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "PIMENTEL",
            "region" => "LAMBAYEQUE",
            "superficie" => "67",
            "altitud" => "22",
            "latitud" => "-6.8353",
            "longitud" => "-79.9358"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1255,
            "ubigeo_reniec" => "130111",
            "ubigeo_inei" => "140113",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "REQUE",
            "region" => "LAMBAYEQUE",
            "superficie" => "47",
            "altitud" => "34",
            "latitud" => "-6.865",
            "longitud" => "-79.8192"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1256,
            "ubigeo_reniec" => "130113",
            "ubigeo_inei" => "140114",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "SANTA ROSA",
            "region" => "LAMBAYEQUE",
            "superficie" => "14",
            "altitud" => "23",
            "latitud" => "-6.8817",
            "longitud" => "-79.9208"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1257,
            "ubigeo_reniec" => "130114",
            "ubigeo_inei" => "140115",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "SAŃA",
            "region" => "LAMBAYEQUE",
            "superficie" => "314",
            "altitud" => "70",
            "latitud" => "-6.9181",
            "longitud" => "-79.5833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1258,
            "ubigeo_reniec" => "130116",
            "ubigeo_inei" => "140116",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "CAYALTI",
            "region" => "LAMBAYEQUE",
            "superficie" => "163",
            "altitud" => "86",
            "latitud" => "-6.8917",
            "longitud" => "-79.5622"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1259,
            "ubigeo_reniec" => "130117",
            "ubigeo_inei" => "140117",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "PATAPO",
            "region" => "LAMBAYEQUE",
            "superficie" => "183",
            "altitud" => "113",
            "latitud" => "-6.7356",
            "longitud" => "-79.6347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1260,
            "ubigeo_reniec" => "130118",
            "ubigeo_inei" => "140118",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "POMALCA",
            "region" => "LAMBAYEQUE",
            "superficie" => "80",
            "altitud" => "61",
            "latitud" => "-6.77",
            "longitud" => "-79.7753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1261,
            "ubigeo_reniec" => "130119",
            "ubigeo_inei" => "140119",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "PUCALA",
            "region" => "LAMBAYEQUE",
            "superficie" => "176",
            "altitud" => "108",
            "latitud" => "-6.7819",
            "longitud" => "-79.6122"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1262,
            "ubigeo_reniec" => "130120",
            "ubigeo_inei" => "140120",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1401",
            "provincia" => "CHICLAYO",
            "distrito" => "TUMAN",
            "region" => "LAMBAYEQUE",
            "superficie" => "130",
            "altitud" => "71",
            "latitud" => "-6.7511",
            "longitud" => "-79.7011"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1263,
            "ubigeo_reniec" => "130201",
            "ubigeo_inei" => "140201",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "FERREŃAFE",
            "region" => "LAMBAYEQUE",
            "superficie" => "62",
            "altitud" => "38",
            "latitud" => "-6.6389",
            "longitud" => "-79.7883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1264,
            "ubigeo_reniec" => "130203",
            "ubigeo_inei" => "140202",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "CAŃARIS",
            "region" => "LAMBAYEQUE",
            "superficie" => "285",
            "altitud" => "2421",
            "latitud" => "-6.0461",
            "longitud" => "-79.2653"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1265,
            "ubigeo_reniec" => "130202",
            "ubigeo_inei" => "140203",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "INCAHUASI",
            "region" => "LAMBAYEQUE",
            "superficie" => "444",
            "altitud" => "3030",
            "latitud" => "-6.2353",
            "longitud" => "-79.3169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1266,
            "ubigeo_reniec" => "130206",
            "ubigeo_inei" => "140204",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "MANUEL ANTONIO MESONES MURO",
            "region" => "LAMBAYEQUE",
            "superficie" => "201",
            "altitud" => "66",
            "latitud" => "-6.645",
            "longitud" => "-79.7389"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1267,
            "ubigeo_reniec" => "130204",
            "ubigeo_inei" => "140205",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "PITIPO",
            "region" => "LAMBAYEQUE",
            "superficie" => "558",
            "altitud" => "70",
            "latitud" => "-6.5658",
            "longitud" => "-79.7808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1268,
            "ubigeo_reniec" => "130205",
            "ubigeo_inei" => "140206",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1402",
            "provincia" => "FERREŃAFE",
            "distrito" => "PUEBLO NUEVO",
            "region" => "LAMBAYEQUE",
            "superficie" => "29",
            "altitud" => "45",
            "latitud" => "-6.6403",
            "longitud" => "-79.7961"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1269,
            "ubigeo_reniec" => "130301",
            "ubigeo_inei" => "140301",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "LAMBAYEQUE",
            "region" => "LAMBAYEQUE",
            "superficie" => "331",
            "altitud" => "24",
            "latitud" => "-6.7069",
            "longitud" => "-79.8953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1270,
            "ubigeo_reniec" => "130302",
            "ubigeo_inei" => "140302",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "CHOCHOPE",
            "region" => "LAMBAYEQUE",
            "superficie" => "79",
            "altitud" => "198",
            "latitud" => "-6.1578",
            "longitud" => "-79.6478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1271,
            "ubigeo_reniec" => "130303",
            "ubigeo_inei" => "140303",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "ILLIMO",
            "region" => "LAMBAYEQUE",
            "superficie" => "24",
            "altitud" => "60",
            "latitud" => "-6.4739",
            "longitud" => "-79.8547"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1272,
            "ubigeo_reniec" => "130304",
            "ubigeo_inei" => "140304",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "JAYANCA",
            "region" => "LAMBAYEQUE",
            "superficie" => "681",
            "altitud" => "67",
            "latitud" => "-6.3928",
            "longitud" => "-79.8228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1273,
            "ubigeo_reniec" => "130305",
            "ubigeo_inei" => "140305",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "MOCHUMI",
            "region" => "LAMBAYEQUE",
            "superficie" => "104",
            "altitud" => "40",
            "latitud" => "-6.5478",
            "longitud" => "-79.865"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1274,
            "ubigeo_reniec" => "130306",
            "ubigeo_inei" => "140306",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "MORROPE",
            "region" => "LAMBAYEQUE",
            "superficie" => "1042",
            "altitud" => "5",
            "latitud" => "-6.5403",
            "longitud" => "-80.0156"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1275,
            "ubigeo_reniec" => "130307",
            "ubigeo_inei" => "140307",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "MOTUPE",
            "region" => "LAMBAYEQUE",
            "superficie" => "557",
            "altitud" => "140",
            "latitud" => "-6.1508",
            "longitud" => "-79.7142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1276,
            "ubigeo_reniec" => "130308",
            "ubigeo_inei" => "140308",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "OLMOS",
            "region" => "LAMBAYEQUE",
            "superficie" => "5583",
            "altitud" => "192",
            "latitud" => "-5.9878",
            "longitud" => "-79.7475"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1277,
            "ubigeo_reniec" => "130309",
            "ubigeo_inei" => "140309",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "PACORA",
            "region" => "LAMBAYEQUE",
            "superficie" => "88",
            "altitud" => "69",
            "latitud" => "-6.4286",
            "longitud" => "-79.8389"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1278,
            "ubigeo_reniec" => "130310",
            "ubigeo_inei" => "140310",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "SALAS",
            "region" => "LAMBAYEQUE",
            "superficie" => "992",
            "altitud" => "174",
            "latitud" => "-6.2747",
            "longitud" => "-79.6072"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1279,
            "ubigeo_reniec" => "130311",
            "ubigeo_inei" => "140311",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "SAN JOSE",
            "region" => "LAMBAYEQUE",
            "superficie" => "47",
            "altitud" => "33",
            "latitud" => "-6.7694",
            "longitud" => "-79.9681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1280,
            "ubigeo_reniec" => "130312",
            "ubigeo_inei" => "140312",
            "departamento_inei" => "14",
            "departamento" => "LAMBAYEQUE",
            "provincia_inei" => "1403",
            "provincia" => "LAMBAYEQUE",
            "distrito" => "TUCUME",
            "region" => "LAMBAYEQUE",
            "superficie" => "67",
            "altitud" => "61",
            "latitud" => "-6.51",
            "longitud" => "-79.8592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1281,
            "ubigeo_reniec" => "140101",
            "ubigeo_inei" => "150101",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LIMA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "22",
            "altitud" => "162",
            "latitud" => "-12.0453",
            "longitud" => "-77.0308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1282,
            "ubigeo_reniec" => "140102",
            "ubigeo_inei" => "150102",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "ANCON",
            "region" => "LIMA PROVINCIA",
            "superficie" => "285",
            "altitud" => "14",
            "latitud" => "-11.7739",
            "longitud" => "-77.1764"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1283,
            "ubigeo_reniec" => "140103",
            "ubigeo_inei" => "150103",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "ATE",
            "region" => "LIMA PROVINCIA",
            "superficie" => "78",
            "altitud" => "378",
            "latitud" => "-12.0264",
            "longitud" => "-76.9214"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1284,
            "ubigeo_reniec" => "140125",
            "ubigeo_inei" => "150104",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "BARRANCO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "3",
            "altitud" => "97",
            "latitud" => "-12.1492",
            "longitud" => "-77.0217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1285,
            "ubigeo_reniec" => "140104",
            "ubigeo_inei" => "150105",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "BREŃA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "3",
            "altitud" => "153",
            "latitud" => "-12.0589",
            "longitud" => "-77.0461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1286,
            "ubigeo_reniec" => "140105",
            "ubigeo_inei" => "150106",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "CARABAYLLO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "303",
            "altitud" => "238",
            "latitud" => "-11.8903",
            "longitud" => "-77.0269"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1287,
            "ubigeo_reniec" => "140107",
            "ubigeo_inei" => "150107",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "CHACLACAYO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "40",
            "altitud" => "685",
            "latitud" => "-11.9753",
            "longitud" => "-76.7689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1288,
            "ubigeo_reniec" => "140108",
            "ubigeo_inei" => "150108",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "CHORRILLOS",
            "region" => "LIMA PROVINCIA",
            "superficie" => "39",
            "altitud" => "68",
            "latitud" => "-12.1769",
            "longitud" => "-77.0164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1289,
            "ubigeo_reniec" => "140139",
            "ubigeo_inei" => "150109",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "CIENEGUILLA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "240",
            "altitud" => "287",
            "latitud" => "-12.1203",
            "longitud" => "-76.8142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1290,
            "ubigeo_reniec" => "140106",
            "ubigeo_inei" => "150110",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "COMAS",
            "region" => "LIMA PROVINCIA",
            "superficie" => "49",
            "altitud" => "107",
            "latitud" => "-11.9572",
            "longitud" => "-77.0494"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1291,
            "ubigeo_reniec" => "140135",
            "ubigeo_inei" => "150111",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "EL AGUSTINO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "13",
            "altitud" => "200",
            "latitud" => "-12.0483",
            "longitud" => "-77.0006"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1292,
            "ubigeo_reniec" => "140134",
            "ubigeo_inei" => "150112",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "INDEPENDENCIA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "15",
            "altitud" => "111",
            "latitud" => "-11.9972",
            "longitud" => "-77.0547"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1293,
            "ubigeo_reniec" => "140133",
            "ubigeo_inei" => "150113",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "JESUS MARIA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "5",
            "altitud" => "142",
            "latitud" => "-12.0756",
            "longitud" => "-77.0433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1294,
            "ubigeo_reniec" => "140110",
            "ubigeo_inei" => "150114",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LA MOLINA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "66",
            "altitud" => "262",
            "latitud" => "-12.0781",
            "longitud" => "-76.9167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1295,
            "ubigeo_reniec" => "140109",
            "ubigeo_inei" => "150115",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LA VICTORIA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "9",
            "altitud" => "142",
            "latitud" => "-12.065",
            "longitud" => "-77.0308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1296,
            "ubigeo_reniec" => "140111",
            "ubigeo_inei" => "150116",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LINCE",
            "region" => "LIMA PROVINCIA",
            "superficie" => "3",
            "altitud" => "150",
            "latitud" => "-12.0844",
            "longitud" => "-77.0303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1297,
            "ubigeo_reniec" => "140142",
            "ubigeo_inei" => "150117",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LOS OLIVOS",
            "region" => "LIMA PROVINCIA",
            "superficie" => "18",
            "altitud" => "67",
            "latitud" => "-11.9914",
            "longitud" => "-77.0708"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1298,
            "ubigeo_reniec" => "140112",
            "ubigeo_inei" => "150118",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LURIGANCHO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "236",
            "altitud" => "879",
            "latitud" => "-11.9358",
            "longitud" => "-76.6972"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1299,
            "ubigeo_reniec" => "140113",
            "ubigeo_inei" => "150119",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "LURIN",
            "region" => "LIMA PROVINCIA",
            "superficie" => "180",
            "altitud" => "12",
            "latitud" => "-12.2747",
            "longitud" => "-76.8703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1300,
            "ubigeo_reniec" => "140114",
            "ubigeo_inei" => "150120",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "MAGDALENA DEL MAR",
            "region" => "LIMA PROVINCIA",
            "superficie" => "4",
            "altitud" => "90",
            "latitud" => "-12.0917",
            "longitud" => "-77.0672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1301,
            "ubigeo_reniec" => "140117",
            "ubigeo_inei" => "150121",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PUEBLO LIBRE",
            "region" => "LIMA PROVINCIA",
            "superficie" => "4",
            "altitud" => "114",
            "latitud" => "-12.0781",
            "longitud" => "-77.0625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1302,
            "ubigeo_reniec" => "140115",
            "ubigeo_inei" => "150122",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "MIRAFLORES",
            "region" => "LIMA PROVINCIA",
            "superficie" => "10",
            "altitud" => "125",
            "latitud" => "-12.1217",
            "longitud" => "-77.0292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1303,
            "ubigeo_reniec" => "140116",
            "ubigeo_inei" => "150123",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PACHACAMAC",
            "region" => "LIMA PROVINCIA",
            "superficie" => "160",
            "altitud" => "68",
            "latitud" => "-12.1872",
            "longitud" => "-76.8667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1304,
            "ubigeo_reniec" => "140118",
            "ubigeo_inei" => "150124",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PUCUSANA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "37",
            "altitud" => "26",
            "latitud" => "-12.4817",
            "longitud" => "-76.7975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1305,
            "ubigeo_reniec" => "140119",
            "ubigeo_inei" => "150125",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PUENTE PIEDRA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "73",
            "altitud" => "187",
            "latitud" => "-11.8667",
            "longitud" => "-77.0769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1306,
            "ubigeo_reniec" => "140120",
            "ubigeo_inei" => "150126",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PUNTA HERMOSA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "120",
            "altitud" => "52",
            "latitud" => "-12.3336",
            "longitud" => "-76.8242"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1307,
            "ubigeo_reniec" => "140121",
            "ubigeo_inei" => "150127",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "PUNTA NEGRA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "131",
            "altitud" => "42",
            "latitud" => "-12.3653",
            "longitud" => "-76.7956"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1308,
            "ubigeo_reniec" => "140122",
            "ubigeo_inei" => "150128",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "RIMAC",
            "region" => "LIMA PROVINCIA",
            "superficie" => "12",
            "altitud" => "153",
            "latitud" => "-12.0422",
            "longitud" => "-77.0269"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1309,
            "ubigeo_reniec" => "140123",
            "ubigeo_inei" => "150129",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN BARTOLO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "45",
            "altitud" => "25",
            "latitud" => "-12.3892",
            "longitud" => "-76.7808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1310,
            "ubigeo_reniec" => "140140",
            "ubigeo_inei" => "150130",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN BORJA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "10",
            "altitud" => "170",
            "latitud" => "-12.1072",
            "longitud" => "-76.9989"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1311,
            "ubigeo_reniec" => "140124",
            "ubigeo_inei" => "150131",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN ISIDRO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "11",
            "altitud" => "195",
            "latitud" => "-12.0978",
            "longitud" => "-77.0272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1312,
            "ubigeo_reniec" => "140137",
            "ubigeo_inei" => "150132",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN JUAN DE LURIGANCHO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "131",
            "altitud" => "222",
            "latitud" => "-12.0297",
            "longitud" => "-77.01"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1313,
            "ubigeo_reniec" => "140136",
            "ubigeo_inei" => "150133",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN JUAN DE MIRAFLORES",
            "region" => "LIMA PROVINCIA",
            "superficie" => "23",
            "altitud" => "133",
            "latitud" => "-12.1636",
            "longitud" => "-76.9636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1314,
            "ubigeo_reniec" => "140138",
            "ubigeo_inei" => "150134",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN LUIS",
            "region" => "LIMA PROVINCIA",
            "superficie" => "3",
            "altitud" => "214",
            "latitud" => "-12.0756",
            "longitud" => "-76.9936"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1315,
            "ubigeo_reniec" => "140126",
            "ubigeo_inei" => "150135",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN MARTIN DE PORRES",
            "region" => "LIMA PROVINCIA",
            "superficie" => "37",
            "altitud" => "138",
            "latitud" => "-12.03",
            "longitud" => "-77.0575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1316,
            "ubigeo_reniec" => "140127",
            "ubigeo_inei" => "150136",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SAN MIGUEL",
            "region" => "LIMA PROVINCIA",
            "superficie" => "11",
            "altitud" => "84",
            "latitud" => "-12.0922",
            "longitud" => "-77.0794"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1317,
            "ubigeo_reniec" => "140143",
            "ubigeo_inei" => "150137",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SANTA ANITA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "11",
            "altitud" => "285",
            "latitud" => "-12.0439",
            "longitud" => "-76.9714"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1318,
            "ubigeo_reniec" => "140128",
            "ubigeo_inei" => "150138",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SANTA MARIA DEL MAR",
            "region" => "LIMA PROVINCIA",
            "superficie" => "10",
            "altitud" => "52",
            "latitud" => "-12.4019",
            "longitud" => "-76.7733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1319,
            "ubigeo_reniec" => "140129",
            "ubigeo_inei" => "150139",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SANTA ROSA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "21",
            "altitud" => "72",
            "latitud" => "-11.7872",
            "longitud" => "-77.1569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1320,
            "ubigeo_reniec" => "140130",
            "ubigeo_inei" => "150140",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SANTIAGO DE SURCO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "36",
            "altitud" => "107",
            "latitud" => "-12.145",
            "longitud" => "-77.005"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1321,
            "ubigeo_reniec" => "140131",
            "ubigeo_inei" => "150141",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SURQUILLO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "3",
            "altitud" => "125",
            "latitud" => "-12.1186",
            "longitud" => "-77.0217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1322,
            "ubigeo_reniec" => "140141",
            "ubigeo_inei" => "150142",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "VILLA EL SALVADOR",
            "region" => "LIMA PROVINCIA",
            "superficie" => "35",
            "altitud" => "204",
            "latitud" => "-12.2133",
            "longitud" => "-76.9372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1323,
            "ubigeo_reniec" => "140132",
            "ubigeo_inei" => "150143",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "VILLA MARIA DEL TRIUNFO",
            "region" => "LIMA PROVINCIA",
            "superficie" => "71",
            "altitud" => "210",
            "latitud" => "-12.1625",
            "longitud" => "-76.9436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1325,
            "ubigeo_reniec" => "140901",
            "ubigeo_inei" => "150201",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1502",
            "provincia" => "BARRANCA",
            "distrito" => "BARRANCA",
            "region" => "LIMA REGION",
            "superficie" => "159",
            "altitud" => "74",
            "latitud" => "-10.7533",
            "longitud" => "-77.765"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1326,
            "ubigeo_reniec" => "140902",
            "ubigeo_inei" => "150202",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1502",
            "provincia" => "BARRANCA",
            "distrito" => "PARAMONGA",
            "region" => "LIMA REGION",
            "superficie" => "409",
            "altitud" => "37",
            "latitud" => "-10.6747",
            "longitud" => "-77.8181"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1327,
            "ubigeo_reniec" => "140903",
            "ubigeo_inei" => "150203",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1502",
            "provincia" => "BARRANCA",
            "distrito" => "PATIVILCA",
            "region" => "LIMA REGION",
            "superficie" => "279",
            "altitud" => "95",
            "latitud" => "-10.6961",
            "longitud" => "-77.7803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1328,
            "ubigeo_reniec" => "140904",
            "ubigeo_inei" => "150204",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1502",
            "provincia" => "BARRANCA",
            "distrito" => "SUPE",
            "region" => "LIMA REGION",
            "superficie" => "513",
            "altitud" => "69",
            "latitud" => "-10.7961",
            "longitud" => "-77.7161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1329,
            "ubigeo_reniec" => "140905",
            "ubigeo_inei" => "150205",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1502",
            "provincia" => "BARRANCA",
            "distrito" => "SUPE PUERTO",
            "region" => "LIMA REGION",
            "superficie" => "12",
            "altitud" => "41",
            "latitud" => "-10.8017",
            "longitud" => "-77.7447"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1330,
            "ubigeo_reniec" => "140201",
            "ubigeo_inei" => "150301",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1503",
            "provincia" => "CAJATAMBO",
            "distrito" => "CAJATAMBO",
            "region" => "LIMA REGION",
            "superficie" => "568",
            "altitud" => "3396",
            "latitud" => "-10.4731",
            "longitud" => "-76.9931"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1331,
            "ubigeo_reniec" => "140205",
            "ubigeo_inei" => "150302",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1503",
            "provincia" => "CAJATAMBO",
            "distrito" => "COPA",
            "region" => "LIMA REGION",
            "superficie" => "212",
            "altitud" => "3433",
            "latitud" => "-10.3864",
            "longitud" => "-77.0789"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1332,
            "ubigeo_reniec" => "140206",
            "ubigeo_inei" => "150303",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1503",
            "provincia" => "CAJATAMBO",
            "distrito" => "GORGOR",
            "region" => "LIMA REGION",
            "superficie" => "310",
            "altitud" => "3049",
            "latitud" => "-10.6211",
            "longitud" => "-77.0414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1333,
            "ubigeo_reniec" => "140207",
            "ubigeo_inei" => "150304",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1503",
            "provincia" => "CAJATAMBO",
            "distrito" => "HUANCAPON",
            "region" => "LIMA REGION",
            "superficie" => "146",
            "altitud" => "3187",
            "latitud" => "-10.5494",
            "longitud" => "-77.1125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1334,
            "ubigeo_reniec" => "140208",
            "ubigeo_inei" => "150305",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1503",
            "provincia" => "CAJATAMBO",
            "distrito" => "MANAS",
            "region" => "LIMA REGION",
            "superficie" => "279",
            "altitud" => "2457",
            "latitud" => "-10.5956",
            "longitud" => "-77.1672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1335,
            "ubigeo_reniec" => "140301",
            "ubigeo_inei" => "150401",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "CANTA",
            "region" => "LIMA REGION",
            "superficie" => "123",
            "altitud" => "2867",
            "latitud" => "-11.4672",
            "longitud" => "-76.6244"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1336,
            "ubigeo_reniec" => "140302",
            "ubigeo_inei" => "150402",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "ARAHUAY",
            "region" => "LIMA REGION",
            "superficie" => "134",
            "altitud" => "2533",
            "latitud" => "-11.6214",
            "longitud" => "-76.6703"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1337,
            "ubigeo_reniec" => "140303",
            "ubigeo_inei" => "150403",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "HUAMANTANGA",
            "region" => "LIMA REGION",
            "superficie" => "488",
            "altitud" => "3414",
            "latitud" => "-11.4992",
            "longitud" => "-76.7494"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1338,
            "ubigeo_reniec" => "140304",
            "ubigeo_inei" => "150404",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "HUAROS",
            "region" => "LIMA REGION",
            "superficie" => "333",
            "altitud" => "3614",
            "latitud" => "-11.4067",
            "longitud" => "-76.5758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1339,
            "ubigeo_reniec" => "140305",
            "ubigeo_inei" => "150405",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "LACHAQUI",
            "region" => "LIMA REGION",
            "superficie" => "138",
            "altitud" => "3686",
            "latitud" => "-11.5531",
            "longitud" => "-76.6256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1340,
            "ubigeo_reniec" => "140306",
            "ubigeo_inei" => "150406",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "SAN BUENAVENTURA",
            "region" => "LIMA REGION",
            "superficie" => "106",
            "altitud" => "2743",
            "latitud" => "-11.4892",
            "longitud" => "-76.6622"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1341,
            "ubigeo_reniec" => "140307",
            "ubigeo_inei" => "150407",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1504",
            "provincia" => "CANTA",
            "distrito" => "SANTA ROSA DE QUIVES",
            "region" => "LIMA REGION",
            "superficie" => "408",
            "altitud" => "936",
            "latitud" => "-11.6953",
            "longitud" => "-76.8461"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1342,
            "ubigeo_reniec" => "140401",
            "ubigeo_inei" => "150501",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "SAN VICENTE DE CAŃETE",
            "region" => "LIMA REGION",
            "superficie" => "513",
            "altitud" => "77",
            "latitud" => "-13.0778",
            "longitud" => "-76.3878"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1343,
            "ubigeo_reniec" => "140416",
            "ubigeo_inei" => "150502",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "ASIA",
            "region" => "LIMA REGION",
            "superficie" => "277",
            "altitud" => "69",
            "latitud" => "-12.7792",
            "longitud" => "-76.5567"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1344,
            "ubigeo_reniec" => "140402",
            "ubigeo_inei" => "150503",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "CALANGO",
            "region" => "LIMA REGION",
            "superficie" => "531",
            "altitud" => "323",
            "latitud" => "-12.5264",
            "longitud" => "-76.5436"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1345,
            "ubigeo_reniec" => "140403",
            "ubigeo_inei" => "150504",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "CERRO AZUL",
            "region" => "LIMA REGION",
            "superficie" => "105",
            "altitud" => "17",
            "latitud" => "-13.025",
            "longitud" => "-76.4789"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1346,
            "ubigeo_reniec" => "140405",
            "ubigeo_inei" => "150505",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "CHILCA",
            "region" => "LIMA REGION",
            "superficie" => "475",
            "altitud" => "31",
            "latitud" => "-12.5181",
            "longitud" => "-76.7381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1347,
            "ubigeo_reniec" => "140404",
            "ubigeo_inei" => "150506",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "COAYLLO",
            "region" => "LIMA REGION",
            "superficie" => "591",
            "altitud" => "285",
            "latitud" => "-12.7272",
            "longitud" => "-76.4603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1348,
            "ubigeo_reniec" => "140406",
            "ubigeo_inei" => "150507",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "IMPERIAL",
            "region" => "LIMA REGION",
            "superficie" => "53",
            "altitud" => "112",
            "latitud" => "-13.0606",
            "longitud" => "-76.3528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1349,
            "ubigeo_reniec" => "140407",
            "ubigeo_inei" => "150508",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "LUNAHUANA",
            "region" => "LIMA REGION",
            "superficie" => "500",
            "altitud" => "498",
            "latitud" => "-12.9706",
            "longitud" => "-76.1511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1350,
            "ubigeo_reniec" => "140408",
            "ubigeo_inei" => "150509",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "MALA",
            "region" => "LIMA REGION",
            "superficie" => "129",
            "altitud" => "58",
            "latitud" => "-12.6575",
            "longitud" => "-76.6325"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1351,
            "ubigeo_reniec" => "140409",
            "ubigeo_inei" => "150510",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "NUEVO IMPERIAL",
            "region" => "LIMA REGION",
            "superficie" => "329",
            "altitud" => "169",
            "latitud" => "-13.0756",
            "longitud" => "-76.3167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1352,
            "ubigeo_reniec" => "140410",
            "ubigeo_inei" => "150511",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "PACARAN",
            "region" => "LIMA REGION",
            "superficie" => "259",
            "altitud" => "721",
            "latitud" => "-12.8661",
            "longitud" => "-76.0542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1353,
            "ubigeo_reniec" => "140411",
            "ubigeo_inei" => "150512",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "QUILMANA",
            "region" => "LIMA REGION",
            "superficie" => "437",
            "altitud" => "185",
            "latitud" => "-12.9494",
            "longitud" => "-76.3828"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1354,
            "ubigeo_reniec" => "140412",
            "ubigeo_inei" => "150513",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "SAN ANTONIO",
            "region" => "LIMA REGION",
            "superficie" => "37",
            "altitud" => "67",
            "latitud" => "-12.6422",
            "longitud" => "-76.6494"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1355,
            "ubigeo_reniec" => "140413",
            "ubigeo_inei" => "150514",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "SAN LUIS",
            "region" => "LIMA REGION",
            "superficie" => "39",
            "altitud" => "36",
            "latitud" => "-13.0511",
            "longitud" => "-76.4311"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1356,
            "ubigeo_reniec" => "140414",
            "ubigeo_inei" => "150515",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "SANTA CRUZ DE FLORES",
            "region" => "LIMA REGION",
            "superficie" => "100",
            "altitud" => "111",
            "latitud" => "-12.6197",
            "longitud" => "-76.6397"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1357,
            "ubigeo_reniec" => "140415",
            "ubigeo_inei" => "150516",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1505",
            "provincia" => "CAŃETE",
            "distrito" => "ZUŃIGA",
            "region" => "LIMA REGION",
            "superficie" => "198",
            "altitud" => "827",
            "latitud" => "-12.8603",
            "longitud" => "-76.0225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1358,
            "ubigeo_reniec" => "140801",
            "ubigeo_inei" => "150601",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "HUARAL",
            "region" => "LIMA REGION",
            "superficie" => "641",
            "altitud" => "195",
            "latitud" => "-11.4953",
            "longitud" => "-77.2069"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1359,
            "ubigeo_reniec" => "140802",
            "ubigeo_inei" => "150602",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "ATAVILLOS ALTO",
            "region" => "LIMA REGION",
            "superficie" => "348",
            "altitud" => "3293",
            "latitud" => "-11.2342",
            "longitud" => "-76.6558"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1360,
            "ubigeo_reniec" => "140803",
            "ubigeo_inei" => "150603",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "ATAVILLOS BAJO",
            "region" => "LIMA REGION",
            "superficie" => "165",
            "altitud" => "1885",
            "latitud" => "-11.3519",
            "longitud" => "-76.8256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1361,
            "ubigeo_reniec" => "140804",
            "ubigeo_inei" => "150604",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "AUCALLAMA",
            "region" => "LIMA REGION",
            "superficie" => "729",
            "altitud" => "154",
            "latitud" => "-11.5594",
            "longitud" => "-77.18"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1362,
            "ubigeo_reniec" => "140805",
            "ubigeo_inei" => "150605",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "CHANCAY",
            "region" => "LIMA REGION",
            "superficie" => "150",
            "altitud" => "58",
            "latitud" => "-11.5631",
            "longitud" => "-77.2706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1363,
            "ubigeo_reniec" => "140806",
            "ubigeo_inei" => "150606",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "IHUARI",
            "region" => "LIMA REGION",
            "superficie" => "468",
            "altitud" => "2850",
            "latitud" => "-11.1886",
            "longitud" => "-76.9519"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1364,
            "ubigeo_reniec" => "140807",
            "ubigeo_inei" => "150607",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "LAMPIAN",
            "region" => "LIMA REGION",
            "superficie" => "145",
            "altitud" => "2467",
            "latitud" => "-11.2378",
            "longitud" => "-76.8392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1365,
            "ubigeo_reniec" => "140808",
            "ubigeo_inei" => "150608",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "PACARAOS",
            "region" => "LIMA REGION",
            "superficie" => "294",
            "altitud" => "3348",
            "latitud" => "-11.1861",
            "longitud" => "-76.6478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1366,
            "ubigeo_reniec" => "140809",
            "ubigeo_inei" => "150609",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "SAN MIGUEL DE ACOS",
            "region" => "LIMA REGION",
            "superficie" => "48",
            "altitud" => "1591",
            "latitud" => "-11.2739",
            "longitud" => "-76.8219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1367,
            "ubigeo_reniec" => "140811",
            "ubigeo_inei" => "150610",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "SANTA CRUZ DE ANDAMARCA",
            "region" => "LIMA REGION",
            "superficie" => "217",
            "altitud" => "3550",
            "latitud" => "-11.1947",
            "longitud" => "-76.6344"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1368,
            "ubigeo_reniec" => "140812",
            "ubigeo_inei" => "150611",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "SUMBILCA",
            "region" => "LIMA REGION",
            "superficie" => "259",
            "altitud" => "3396",
            "latitud" => "-11.4067",
            "longitud" => "-76.8197"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1369,
            "ubigeo_reniec" => "140810",
            "ubigeo_inei" => "150612",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1506",
            "provincia" => "HUARAL",
            "distrito" => "VEINTISIETE DE NOVIEMBRE",
            "region" => "LIMA REGION",
            "superficie" => "204",
            "altitud" => "2640",
            "latitud" => "-11.1922",
            "longitud" => "-76.7797"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1370,
            "ubigeo_reniec" => "140601",
            "ubigeo_inei" => "150701",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "MATUCANA",
            "region" => "LIMA REGION",
            "superficie" => "179",
            "altitud" => "2395",
            "latitud" => "-11.845",
            "longitud" => "-76.3861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1371,
            "ubigeo_reniec" => "140602",
            "ubigeo_inei" => "150702",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "ANTIOQUIA",
            "region" => "LIMA REGION",
            "superficie" => "388",
            "altitud" => "1573",
            "latitud" => "-12.0808",
            "longitud" => "-76.5108"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1372,
            "ubigeo_reniec" => "140603",
            "ubigeo_inei" => "150703",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "CALLAHUANCA",
            "region" => "LIMA REGION",
            "superficie" => "57",
            "altitud" => "1807",
            "latitud" => "-11.8264",
            "longitud" => "-76.6189"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1373,
            "ubigeo_reniec" => "140604",
            "ubigeo_inei" => "150704",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "CARAMPOMA",
            "region" => "LIMA REGION",
            "superficie" => "234",
            "altitud" => "3459",
            "latitud" => "-11.6564",
            "longitud" => "-76.5164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1374,
            "ubigeo_reniec" => "140607",
            "ubigeo_inei" => "150705",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "CHICLA",
            "region" => "LIMA REGION",
            "superficie" => "244",
            "altitud" => "3703",
            "latitud" => "-11.7064",
            "longitud" => "-76.2681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1375,
            "ubigeo_reniec" => "140606",
            "ubigeo_inei" => "150706",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "CUENCA",
            "region" => "LIMA REGION",
            "superficie" => "60",
            "altitud" => "2784",
            "latitud" => "-12.1322",
            "longitud" => "-76.4353"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1376,
            "ubigeo_reniec" => "140630",
            "ubigeo_inei" => "150707",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "HUACHUPAMPA",
            "region" => "LIMA REGION",
            "superficie" => "76",
            "altitud" => "2938",
            "latitud" => "-11.7211",
            "longitud" => "-76.5886"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1377,
            "ubigeo_reniec" => "140608",
            "ubigeo_inei" => "150708",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "HUANZA",
            "region" => "LIMA REGION",
            "superficie" => "227",
            "altitud" => "3431",
            "latitud" => "-11.6561",
            "longitud" => "-76.5036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1378,
            "ubigeo_reniec" => "140609",
            "ubigeo_inei" => "150709",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "HUAROCHIRI",
            "region" => "LIMA REGION",
            "superficie" => "249",
            "altitud" => "3170",
            "latitud" => "-12.1361",
            "longitud" => "-76.2319"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1379,
            "ubigeo_reniec" => "140610",
            "ubigeo_inei" => "150710",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "LAHUAYTAMBO",
            "region" => "LIMA REGION",
            "superficie" => "82",
            "altitud" => "3362",
            "latitud" => "-12.0964",
            "longitud" => "-76.3889"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1380,
            "ubigeo_reniec" => "140611",
            "ubigeo_inei" => "150711",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "LANGA",
            "region" => "LIMA REGION",
            "superficie" => "81",
            "altitud" => "2889",
            "latitud" => "-12.1256",
            "longitud" => "-76.4211"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1381,
            "ubigeo_reniec" => "140631",
            "ubigeo_inei" => "150712",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "LARAOS",
            "region" => "LIMA REGION",
            "superficie" => "105",
            "altitud" => "3683",
            "latitud" => "-11.6644",
            "longitud" => "-76.5394"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1382,
            "ubigeo_reniec" => "140612",
            "ubigeo_inei" => "150713",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "MARIATANA",
            "region" => "LIMA REGION",
            "superficie" => "169",
            "altitud" => "3561",
            "latitud" => "-12.2372",
            "longitud" => "-76.3261"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1383,
            "ubigeo_reniec" => "140613",
            "ubigeo_inei" => "150714",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "RICARDO PALMA",
            "region" => "LIMA REGION",
            "superficie" => "35",
            "altitud" => "975",
            "latitud" => "-11.9236",
            "longitud" => "-76.665"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1384,
            "ubigeo_reniec" => "140614",
            "ubigeo_inei" => "150715",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN ANDRES DE TUPICOCHA",
            "region" => "LIMA REGION",
            "superficie" => "83",
            "altitud" => "3321",
            "latitud" => "-12.0022",
            "longitud" => "-76.4747"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1385,
            "ubigeo_reniec" => "140615",
            "ubigeo_inei" => "150716",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN ANTONIO",
            "region" => "LIMA REGION",
            "superficie" => "564",
            "altitud" => "3456",
            "latitud" => "-11.7436",
            "longitud" => "-76.65"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1386,
            "ubigeo_reniec" => "140616",
            "ubigeo_inei" => "150717",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN BARTOLOME",
            "region" => "LIMA REGION",
            "superficie" => "44",
            "altitud" => "1644",
            "latitud" => "-11.9119",
            "longitud" => "-76.5292"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1387,
            "ubigeo_reniec" => "140617",
            "ubigeo_inei" => "150718",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN DAMIAN",
            "region" => "LIMA REGION",
            "superficie" => "343",
            "altitud" => "3252",
            "latitud" => "-12.0178",
            "longitud" => "-76.3919"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1388,
            "ubigeo_reniec" => "140632",
            "ubigeo_inei" => "150719",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN JUAN DE IRIS",
            "region" => "LIMA REGION",
            "superficie" => "124",
            "altitud" => "3436",
            "latitud" => "-11.6831",
            "longitud" => "-76.525"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1389,
            "ubigeo_reniec" => "140619",
            "ubigeo_inei" => "150720",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN JUAN DE TANTARANCHE",
            "region" => "LIMA REGION",
            "superficie" => "137",
            "altitud" => "3436",
            "latitud" => "-12.1136",
            "longitud" => "-76.1825"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1390,
            "ubigeo_reniec" => "140620",
            "ubigeo_inei" => "150721",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN LORENZO DE QUINTI",
            "region" => "LIMA REGION",
            "superficie" => "468",
            "altitud" => "2682",
            "latitud" => "-12.1453",
            "longitud" => "-76.2125"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1391,
            "ubigeo_reniec" => "140621",
            "ubigeo_inei" => "150722",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN MATEO",
            "region" => "LIMA REGION",
            "superficie" => "426",
            "altitud" => "3164",
            "latitud" => "-11.7592",
            "longitud" => "-76.3006"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1392,
            "ubigeo_reniec" => "140622",
            "ubigeo_inei" => "150723",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN MATEO DE OTAO",
            "region" => "LIMA REGION",
            "superficie" => "124",
            "altitud" => "2084",
            "latitud" => "-11.8703",
            "longitud" => "-76.5439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1393,
            "ubigeo_reniec" => "140605",
            "ubigeo_inei" => "150724",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN PEDRO DE CASTA",
            "region" => "LIMA REGION",
            "superficie" => "80",
            "altitud" => "3196",
            "latitud" => "-11.7589",
            "longitud" => "-76.5964"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1394,
            "ubigeo_reniec" => "140623",
            "ubigeo_inei" => "150725",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SAN PEDRO DE HUANCAYRE",
            "region" => "LIMA REGION",
            "superficie" => "42",
            "altitud" => "3140",
            "latitud" => "-12.1314",
            "longitud" => "-76.2156"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1395,
            "ubigeo_reniec" => "140618",
            "ubigeo_inei" => "150726",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANGALLAYA",
            "region" => "LIMA REGION",
            "superficie" => "82",
            "altitud" => "2779",
            "latitud" => "-12.1608",
            "longitud" => "-76.2289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1396,
            "ubigeo_reniec" => "140624",
            "ubigeo_inei" => "150727",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANTA CRUZ DE COCACHACRA",
            "region" => "LIMA REGION",
            "superficie" => "42",
            "altitud" => "1440",
            "latitud" => "-11.9117",
            "longitud" => "-76.5394"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1397,
            "ubigeo_reniec" => "140625",
            "ubigeo_inei" => "150728",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANTA EULALIA",
            "region" => "LIMA REGION",
            "superficie" => "111",
            "altitud" => "1048",
            "latitud" => "-11.9017",
            "longitud" => "-76.6639"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1398,
            "ubigeo_reniec" => "140626",
            "ubigeo_inei" => "150729",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANTIAGO DE ANCHUCAYA",
            "region" => "LIMA REGION",
            "superficie" => "94",
            "altitud" => "3400",
            "latitud" => "-12.0956",
            "longitud" => "-76.2306"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1399,
            "ubigeo_reniec" => "140627",
            "ubigeo_inei" => "150730",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANTIAGO DE TUNA",
            "region" => "LIMA REGION",
            "superficie" => "54",
            "altitud" => "2913",
            "latitud" => "-11.9839",
            "longitud" => "-76.5253"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1400,
            "ubigeo_reniec" => "140628",
            "ubigeo_inei" => "150731",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SANTO DOMINGO DE LOS OLLEROS",
            "region" => "LIMA REGION",
            "superficie" => "552",
            "altitud" => "2861",
            "latitud" => "-12.2189",
            "longitud" => "-76.5142"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1401,
            "ubigeo_reniec" => "140629",
            "ubigeo_inei" => "150732",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1507",
            "provincia" => "HUAROCHIRI",
            "distrito" => "SURCO",
            "region" => "LIMA REGION",
            "superficie" => "103",
            "altitud" => "2049",
            "latitud" => "-11.8825",
            "longitud" => "-76.4361"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1402,
            "ubigeo_reniec" => "140501",
            "ubigeo_inei" => "150801",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "HUACHO",
            "region" => "LIMA REGION",
            "superficie" => "717",
            "altitud" => "46",
            "latitud" => "-11.1081",
            "longitud" => "-77.6103"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1403,
            "ubigeo_reniec" => "140502",
            "ubigeo_inei" => "150802",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "AMBAR",
            "region" => "LIMA REGION",
            "superficie" => "930",
            "altitud" => "2084",
            "latitud" => "-10.7561",
            "longitud" => "-77.2719"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1404,
            "ubigeo_reniec" => "140504",
            "ubigeo_inei" => "150803",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "CALETA DE CARQUIN",
            "region" => "LIMA REGION",
            "superficie" => "2",
            "altitud" => "28",
            "latitud" => "-11.0917",
            "longitud" => "-77.6283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1405,
            "ubigeo_reniec" => "140505",
            "ubigeo_inei" => "150804",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "CHECRAS",
            "region" => "LIMA REGION",
            "superficie" => "166",
            "altitud" => "3305",
            "latitud" => "-10.9181",
            "longitud" => "-76.8256"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1406,
            "ubigeo_reniec" => "140506",
            "ubigeo_inei" => "150805",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "HUALMAY",
            "region" => "LIMA REGION",
            "superficie" => "6",
            "altitud" => "47",
            "latitud" => "-11.0967",
            "longitud" => "-77.6131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1407,
            "ubigeo_reniec" => "140507",
            "ubigeo_inei" => "150806",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "HUAURA",
            "region" => "LIMA REGION",
            "superficie" => "484",
            "altitud" => "96",
            "latitud" => "-11.0697",
            "longitud" => "-77.5992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1408,
            "ubigeo_reniec" => "140508",
            "ubigeo_inei" => "150807",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "LEONCIO PRADO",
            "region" => "LIMA REGION",
            "superficie" => "300",
            "altitud" => "3299",
            "latitud" => "-11.0611",
            "longitud" => "-76.9303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1409,
            "ubigeo_reniec" => "140509",
            "ubigeo_inei" => "150808",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "PACCHO",
            "region" => "LIMA REGION",
            "superficie" => "229",
            "altitud" => "3275",
            "latitud" => "-10.9575",
            "longitud" => "-76.9333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1410,
            "ubigeo_reniec" => "140511",
            "ubigeo_inei" => "150809",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "SANTA LEONOR",
            "region" => "LIMA REGION",
            "superficie" => "375",
            "altitud" => "3583",
            "latitud" => "-10.9486",
            "longitud" => "-76.745"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1411,
            "ubigeo_reniec" => "140512",
            "ubigeo_inei" => "150810",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "SANTA MARIA",
            "region" => "LIMA REGION",
            "superficie" => "128",
            "altitud" => "83",
            "latitud" => "-11.0967",
            "longitud" => "-77.595"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1412,
            "ubigeo_reniec" => "140513",
            "ubigeo_inei" => "150811",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "SAYAN",
            "region" => "LIMA REGION",
            "superficie" => "1311",
            "altitud" => "689",
            "latitud" => "-11.1353",
            "longitud" => "-77.1936"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1413,
            "ubigeo_reniec" => "140516",
            "ubigeo_inei" => "150812",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1508",
            "provincia" => "HUAURA",
            "distrito" => "VEGUETA",
            "region" => "LIMA REGION",
            "superficie" => "254",
            "altitud" => "40",
            "latitud" => "-11.0233",
            "longitud" => "-77.6439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1414,
            "ubigeo_reniec" => "141001",
            "ubigeo_inei" => "150901",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "OYON",
            "region" => "LIMA REGION",
            "superficie" => "890",
            "altitud" => "3648",
            "latitud" => "-10.6681",
            "longitud" => "-76.7733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1415,
            "ubigeo_reniec" => "141004",
            "ubigeo_inei" => "150902",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "ANDAJES",
            "region" => "LIMA REGION",
            "superficie" => "148",
            "altitud" => "3505",
            "latitud" => "-10.7928",
            "longitud" => "-76.9092"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1416,
            "ubigeo_reniec" => "141003",
            "ubigeo_inei" => "150903",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "CAUJUL",
            "region" => "LIMA REGION",
            "superficie" => "106",
            "altitud" => "3185",
            "latitud" => "-10.8058",
            "longitud" => "-76.9792"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1417,
            "ubigeo_reniec" => "141006",
            "ubigeo_inei" => "150904",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "COCHAMARCA",
            "region" => "LIMA REGION",
            "superficie" => "266",
            "altitud" => "3492",
            "latitud" => "-10.8633",
            "longitud" => "-77.1289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1418,
            "ubigeo_reniec" => "141002",
            "ubigeo_inei" => "150905",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "NAVAN",
            "region" => "LIMA REGION",
            "superficie" => "227",
            "altitud" => "3131",
            "latitud" => "-10.8378",
            "longitud" => "-77.0144"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1419,
            "ubigeo_reniec" => "141005",
            "ubigeo_inei" => "150906",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1509",
            "provincia" => "OYON",
            "distrito" => "PACHANGARA",
            "region" => "LIMA REGION",
            "superficie" => "252",
            "altitud" => "2283",
            "latitud" => "-10.8111",
            "longitud" => "-76.875"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1420,
            "ubigeo_reniec" => "140701",
            "ubigeo_inei" => "151001",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "YAUYOS",
            "region" => "LIMA REGION",
            "superficie" => "327",
            "altitud" => "2895",
            "latitud" => "-12.4597",
            "longitud" => "-75.9183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1421,
            "ubigeo_reniec" => "140702",
            "ubigeo_inei" => "151002",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "ALIS",
            "region" => "LIMA REGION",
            "superficie" => "142",
            "altitud" => "3285",
            "latitud" => "-12.2811",
            "longitud" => "-75.7864"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1422,
            "ubigeo_reniec" => "140703",
            "ubigeo_inei" => "151003",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "AYAUCA",
            "region" => "LIMA REGION",
            "superficie" => "439",
            "altitud" => "3151",
            "latitud" => "-12.5911",
            "longitud" => "-76.0369"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1423,
            "ubigeo_reniec" => "140704",
            "ubigeo_inei" => "151004",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "AYAVIRI",
            "region" => "LIMA REGION",
            "superficie" => "239",
            "altitud" => "3263",
            "latitud" => "-12.3825",
            "longitud" => "-76.1369"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1424,
            "ubigeo_reniec" => "140705",
            "ubigeo_inei" => "151005",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "AZANGARO",
            "region" => "LIMA REGION",
            "superficie" => "80",
            "altitud" => "3435",
            "latitud" => "-13",
            "longitud" => "-75.8372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1425,
            "ubigeo_reniec" => "140706",
            "ubigeo_inei" => "151006",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "CACRA",
            "region" => "LIMA REGION",
            "superficie" => "214",
            "altitud" => "2788",
            "latitud" => "-12.8125",
            "longitud" => "-75.7831"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1426,
            "ubigeo_reniec" => "140707",
            "ubigeo_inei" => "151007",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "CARANIA",
            "region" => "LIMA REGION",
            "superficie" => "122",
            "altitud" => "3846",
            "latitud" => "-12.3456",
            "longitud" => "-75.8694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1427,
            "ubigeo_reniec" => "140733",
            "ubigeo_inei" => "151008",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "CATAHUASI",
            "region" => "LIMA REGION",
            "superficie" => "124",
            "altitud" => "1203",
            "latitud" => "-12.7994",
            "longitud" => "-75.8914"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1428,
            "ubigeo_reniec" => "140710",
            "ubigeo_inei" => "151009",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "CHOCOS",
            "region" => "LIMA REGION",
            "superficie" => "213",
            "altitud" => "2733",
            "latitud" => "-12.9144",
            "longitud" => "-75.8628"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1429,
            "ubigeo_reniec" => "140708",
            "ubigeo_inei" => "151010",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "COCHAS",
            "region" => "LIMA REGION",
            "superficie" => "28",
            "altitud" => "2851",
            "latitud" => "-12.2942",
            "longitud" => "-76.1575"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1430,
            "ubigeo_reniec" => "140709",
            "ubigeo_inei" => "151011",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "COLONIA",
            "region" => "LIMA REGION",
            "superficie" => "324",
            "altitud" => "3399",
            "latitud" => "-12.6339",
            "longitud" => "-75.8903"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1431,
            "ubigeo_reniec" => "140730",
            "ubigeo_inei" => "151012",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HONGOS",
            "region" => "LIMA REGION",
            "superficie" => "104",
            "altitud" => "3215",
            "latitud" => "-12.8108",
            "longitud" => "-75.7653"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1432,
            "ubigeo_reniec" => "140711",
            "ubigeo_inei" => "151013",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HUAMPARA",
            "region" => "LIMA REGION",
            "superficie" => "54",
            "altitud" => "2501",
            "latitud" => "-12.3603",
            "longitud" => "-76.1672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1433,
            "ubigeo_reniec" => "140712",
            "ubigeo_inei" => "151014",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HUANCAYA",
            "region" => "LIMA REGION",
            "superficie" => "284",
            "altitud" => "3591",
            "latitud" => "-12.2033",
            "longitud" => "-75.7992"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1434,
            "ubigeo_reniec" => "140713",
            "ubigeo_inei" => "151015",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HUANGASCAR",
            "region" => "LIMA REGION",
            "superficie" => "50",
            "altitud" => "2529",
            "latitud" => "-12.8994",
            "longitud" => "-75.8319"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1435,
            "ubigeo_reniec" => "140714",
            "ubigeo_inei" => "151016",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HUANTAN",
            "region" => "LIMA REGION",
            "superficie" => "516",
            "altitud" => "3315",
            "latitud" => "-12.4564",
            "longitud" => "-75.8117"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1436,
            "ubigeo_reniec" => "140715",
            "ubigeo_inei" => "151017",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "HUAŃEC",
            "region" => "LIMA REGION",
            "superficie" => "38",
            "altitud" => "3222",
            "latitud" => "-12.2939",
            "longitud" => "-76.1386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1437,
            "ubigeo_reniec" => "140716",
            "ubigeo_inei" => "151018",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "LARAOS",
            "region" => "LIMA REGION",
            "superficie" => "403",
            "altitud" => "3492",
            "latitud" => "-12.3467",
            "longitud" => "-75.7858"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1438,
            "ubigeo_reniec" => "140717",
            "ubigeo_inei" => "151019",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "LINCHA",
            "region" => "LIMA REGION",
            "superficie" => "221",
            "altitud" => "3516",
            "latitud" => "-12.7997",
            "longitud" => "-75.6667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1439,
            "ubigeo_reniec" => "140731",
            "ubigeo_inei" => "151020",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "MADEAN",
            "region" => "LIMA REGION",
            "superficie" => "221",
            "altitud" => "3292",
            "latitud" => "-12.9444",
            "longitud" => "-75.7772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1440,
            "ubigeo_reniec" => "140718",
            "ubigeo_inei" => "151021",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "MIRAFLORES",
            "region" => "LIMA REGION",
            "superficie" => "226",
            "altitud" => "3677",
            "latitud" => "-12.2744",
            "longitud" => "-75.8503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1441,
            "ubigeo_reniec" => "140719",
            "ubigeo_inei" => "151022",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "OMAS",
            "region" => "LIMA REGION",
            "superficie" => "295",
            "altitud" => "1572",
            "latitud" => "-12.5147",
            "longitud" => "-76.2894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1442,
            "ubigeo_reniec" => "140732",
            "ubigeo_inei" => "151023",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "PUTINZA",
            "region" => "LIMA REGION",
            "superficie" => "66",
            "altitud" => "1985",
            "latitud" => "-12.6681",
            "longitud" => "-75.9494"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1443,
            "ubigeo_reniec" => "140720",
            "ubigeo_inei" => "151024",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "QUINCHES",
            "region" => "LIMA REGION",
            "superficie" => "113",
            "altitud" => "2981",
            "latitud" => "-12.3078",
            "longitud" => "-76.1433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1444,
            "ubigeo_reniec" => "140721",
            "ubigeo_inei" => "151025",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "QUINOCAY",
            "region" => "LIMA REGION",
            "superficie" => "153",
            "altitud" => "2672",
            "latitud" => "-12.3622",
            "longitud" => "-76.2264"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1445,
            "ubigeo_reniec" => "140722",
            "ubigeo_inei" => "151026",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "SAN JOAQUIN",
            "region" => "LIMA REGION",
            "superficie" => "41",
            "altitud" => "2960",
            "latitud" => "-12.2839",
            "longitud" => "-76.1469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1446,
            "ubigeo_reniec" => "140723",
            "ubigeo_inei" => "151027",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "SAN PEDRO DE PILAS",
            "region" => "LIMA REGION",
            "superficie" => "97",
            "altitud" => "2678",
            "latitud" => "-12.4544",
            "longitud" => "-76.2269"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1447,
            "ubigeo_reniec" => "140724",
            "ubigeo_inei" => "151028",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "TANTA",
            "region" => "LIMA REGION",
            "superficie" => "347",
            "altitud" => "4293",
            "latitud" => "-12.1222",
            "longitud" => "-76.0133"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1448,
            "ubigeo_reniec" => "140725",
            "ubigeo_inei" => "151029",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "TAURIPAMPA",
            "region" => "LIMA REGION",
            "superficie" => "531",
            "altitud" => "3526",
            "latitud" => "-12.6172",
            "longitud" => "-76.1619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1449,
            "ubigeo_reniec" => "140727",
            "ubigeo_inei" => "151030",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "TOMAS",
            "region" => "LIMA REGION",
            "superficie" => "298",
            "altitud" => "3580",
            "latitud" => "-12.2378",
            "longitud" => "-75.745"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1450,
            "ubigeo_reniec" => "140726",
            "ubigeo_inei" => "151031",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "TUPE",
            "region" => "LIMA REGION",
            "superficie" => "321",
            "altitud" => "2841",
            "latitud" => "-12.7411",
            "longitud" => "-75.8094"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1451,
            "ubigeo_reniec" => "140728",
            "ubigeo_inei" => "151032",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "VIŃAC",
            "region" => "LIMA REGION",
            "superficie" => "165",
            "altitud" => "3315",
            "latitud" => "-12.9311",
            "longitud" => "-75.78"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1452,
            "ubigeo_reniec" => "140729",
            "ubigeo_inei" => "151033",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1510",
            "provincia" => "YAUYOS",
            "distrito" => "VITIS",
            "region" => "LIMA REGION",
            "superficie" => "102",
            "altitud" => "3625",
            "latitud" => "-12.2239",
            "longitud" => "-75.8081"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1453,
            "ubigeo_reniec" => "150101",
            "ubigeo_inei" => "160101",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "IQUITOS",
            "region" => "LORETO",
            "superficie" => "358",
            "altitud" => "107",
            "latitud" => "-3.7481",
            "longitud" => "-73.2442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1454,
            "ubigeo_reniec" => "150102",
            "ubigeo_inei" => "160102",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "ALTO NANAY",
            "region" => "LORETO",
            "superficie" => "14291",
            "altitud" => "115",
            "latitud" => "-3.8883",
            "longitud" => "-73.6975"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1455,
            "ubigeo_reniec" => "150103",
            "ubigeo_inei" => "160103",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "FERNANDO LORES",
            "region" => "LORETO",
            "superficie" => "4476",
            "altitud" => "129",
            "latitud" => "-4.0017",
            "longitud" => "-73.1569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1456,
            "ubigeo_reniec" => "150110",
            "ubigeo_inei" => "160104",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "INDIANA",
            "region" => "LORETO",
            "superficie" => "3298",
            "altitud" => "98",
            "latitud" => "-3.5003",
            "longitud" => "-73.0411"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1457,
            "ubigeo_reniec" => "150104",
            "ubigeo_inei" => "160105",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "LAS AMAZONAS",
            "region" => "LORETO",
            "superficie" => "6594",
            "altitud" => "100",
            "latitud" => "-3.4231",
            "longitud" => "-72.7644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1458,
            "ubigeo_reniec" => "150105",
            "ubigeo_inei" => "160106",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "MAZAN",
            "region" => "LORETO",
            "superficie" => "9884",
            "altitud" => "106",
            "latitud" => "-3.4886",
            "longitud" => "-73.0817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1459,
            "ubigeo_reniec" => "150106",
            "ubigeo_inei" => "160107",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "NAPO",
            "region" => "LORETO",
            "superficie" => "24050",
            "altitud" => "142",
            "latitud" => "-2.4892",
            "longitud" => "-73.6761"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1460,
            "ubigeo_reniec" => "150111",
            "ubigeo_inei" => "160108",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "PUNCHANA",
            "region" => "LORETO",
            "superficie" => "1573",
            "altitud" => "124",
            "latitud" => "-3.7286",
            "longitud" => "-73.2419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1461,
            "ubigeo_reniec" => "150108",
            "ubigeo_inei" => "160110",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "TORRES CAUSANA",
            "region" => "LORETO",
            "superficie" => "6795",
            "altitud" => "196",
            "latitud" => "-0.9706",
            "longitud" => "-75.1742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1462,
            "ubigeo_reniec" => "150112",
            "ubigeo_inei" => "160112",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "BELEN",
            "region" => "LORETO",
            "superficie" => "633",
            "altitud" => "116",
            "latitud" => "-3.7692",
            "longitud" => "-73.26"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1463,
            "ubigeo_reniec" => "150113",
            "ubigeo_inei" => "160113",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "SAN JUAN BAUTISTA",
            "region" => "LORETO",
            "superficie" => "3117",
            "altitud" => "120",
            "latitud" => "-3.7703",
            "longitud" => "-73.2803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1464,
            "ubigeo_reniec" => "150201",
            "ubigeo_inei" => "160201",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "YURIMAGUAS",
            "region" => "LORETO",
            "superficie" => "2188",
            "altitud" => "150",
            "latitud" => "-5.8842",
            "longitud" => "-76.1281"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1465,
            "ubigeo_reniec" => "150202",
            "ubigeo_inei" => "160202",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "BALSAPUERTO",
            "region" => "LORETO",
            "superficie" => "2954",
            "altitud" => "220",
            "latitud" => "-5.8333",
            "longitud" => "-76.5597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1466,
            "ubigeo_reniec" => "150205",
            "ubigeo_inei" => "160205",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "JEBEROS",
            "region" => "LORETO",
            "superficie" => "4254",
            "altitud" => "146",
            "latitud" => "-5.2908",
            "longitud" => "-76.2833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1467,
            "ubigeo_reniec" => "150206",
            "ubigeo_inei" => "160206",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "LAGUNAS",
            "region" => "LORETO",
            "superficie" => "5929",
            "altitud" => "119",
            "latitud" => "-5.2239",
            "longitud" => "-75.675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1852,
            "ubigeo_reniec" => "230201",
            "ubigeo_inei" => "240201",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2402",
            "provincia" => "CONTRALMIRANTE VILLAR",
            "distrito" => "ZORRITOS",
            "region" => "TUMBES",
            "superficie" => "645",
            "altitud" => "11",
            "latitud" => "-3.6775",
            "longitud" => "-80.6681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1853,
            "ubigeo_reniec" => "230202",
            "ubigeo_inei" => "240202",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2402",
            "provincia" => "CONTRALMIRANTE VILLAR",
            "distrito" => "CASITAS",
            "region" => "TUMBES",
            "superficie" => "855",
            "altitud" => "137",
            "latitud" => "-3.9422",
            "longitud" => "-80.6511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1854,
            "ubigeo_reniec" => "230203",
            "ubigeo_inei" => "240203",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2402",
            "provincia" => "CONTRALMIRANTE VILLAR",
            "distrito" => "CANOAS DE PUNTA SAL",
            "region" => "TUMBES",
            "superficie" => "623",
            "altitud" => "66",
            "latitud" => "-3.9506",
            "longitud" => "-80.94"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1855,
            "ubigeo_reniec" => "230301",
            "ubigeo_inei" => "240301",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2403",
            "provincia" => "ZARUMILLA",
            "distrito" => "ZARUMILLA",
            "region" => "TUMBES",
            "superficie" => "113",
            "altitud" => "15",
            "latitud" => "-3.5011",
            "longitud" => "-80.2756"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1856,
            "ubigeo_reniec" => "230304",
            "ubigeo_inei" => "240302",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2403",
            "provincia" => "ZARUMILLA",
            "distrito" => "AGUAS VERDES",
            "region" => "TUMBES",
            "superficie" => "46",
            "altitud" => "13",
            "latitud" => "-3.4817",
            "longitud" => "-80.245"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1857,
            "ubigeo_reniec" => "230302",
            "ubigeo_inei" => "240303",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2403",
            "provincia" => "ZARUMILLA",
            "distrito" => "MATAPALO",
            "region" => "TUMBES",
            "superficie" => "392",
            "altitud" => "69",
            "latitud" => "-3.6822",
            "longitud" => "-80.1997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1858,
            "ubigeo_reniec" => "230303",
            "ubigeo_inei" => "240304",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2403",
            "provincia" => "ZARUMILLA",
            "distrito" => "PAPAYAL",
            "region" => "TUMBES",
            "superficie" => "194",
            "altitud" => "36",
            "latitud" => "-3.5714",
            "longitud" => "-80.235"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1859,
            "ubigeo_reniec" => "250101",
            "ubigeo_inei" => "250101",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "CALLERIA",
            "region" => "UCAYALI",
            "superficie" => "10485",
            "altitud" => "162",
            "latitud" => "-8.3681",
            "longitud" => "-74.5433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1860,
            "ubigeo_reniec" => "250104",
            "ubigeo_inei" => "250102",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "CAMPOVERDE",
            "region" => "UCAYALI",
            "superficie" => "1194",
            "altitud" => "203",
            "latitud" => "-8.4719",
            "longitud" => "-74.8053"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1861,
            "ubigeo_reniec" => "250105",
            "ubigeo_inei" => "250103",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "IPARIA",
            "region" => "UCAYALI",
            "superficie" => "8029",
            "altitud" => "170",
            "latitud" => "-9.3061",
            "longitud" => "-74.4356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1862,
            "ubigeo_reniec" => "250103",
            "ubigeo_inei" => "250104",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "MASISEA",
            "region" => "UCAYALI",
            "superficie" => "14102",
            "altitud" => "150",
            "latitud" => "-8.6047",
            "longitud" => "-74.3061"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1863,
            "ubigeo_reniec" => "250102",
            "ubigeo_inei" => "250105",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "YARINACOCHA",
            "region" => "UCAYALI",
            "superficie" => "596",
            "altitud" => "131",
            "latitud" => "-8.3556",
            "longitud" => "-74.5758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1864,
            "ubigeo_reniec" => "250106",
            "ubigeo_inei" => "250106",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "NUEVA REQUENA",
            "region" => "UCAYALI",
            "superficie" => "1858",
            "altitud" => "183",
            "latitud" => "-8.3206",
            "longitud" => "-74.8514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1865,
            "ubigeo_reniec" => "250107",
            "ubigeo_inei" => "250107",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2501",
            "provincia" => "CORONEL PORTILLO",
            "distrito" => "MANANTAY",
            "region" => "UCAYALI",
            "superficie" => "580",
            "altitud" => "165",
            "latitud" => "-8.4003",
            "longitud" => "-74.5414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1866,
            "ubigeo_reniec" => "250301",
            "ubigeo_inei" => "250201",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2502",
            "provincia" => "ATALAYA",
            "distrito" => "RAYMONDI",
            "region" => "UCAYALI",
            "superficie" => "14505",
            "altitud" => "256",
            "latitud" => "-10.7297",
            "longitud" => "-73.7553"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1867,
            "ubigeo_reniec" => "250304",
            "ubigeo_inei" => "250202",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2502",
            "provincia" => "ATALAYA",
            "distrito" => "SEPAHUA",
            "region" => "UCAYALI",
            "superficie" => "8224",
            "altitud" => "277",
            "latitud" => "-11.1372",
            "longitud" => "-73.0456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1868,
            "ubigeo_reniec" => "250302",
            "ubigeo_inei" => "250203",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2502",
            "provincia" => "ATALAYA",
            "distrito" => "TAHUANIA",
            "region" => "UCAYALI",
            "superficie" => "7010",
            "altitud" => "197",
            "latitud" => "-10.0306",
            "longitud" => "-73.9564"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1869,
            "ubigeo_reniec" => "250303",
            "ubigeo_inei" => "250204",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2502",
            "provincia" => "ATALAYA",
            "distrito" => "YURUA",
            "region" => "UCAYALI",
            "superficie" => "9176",
            "altitud" => "240",
            "latitud" => "-9.5314",
            "longitud" => "-72.76"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1870,
            "ubigeo_reniec" => "250201",
            "ubigeo_inei" => "250301",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "PADRE ABAD",
            "region" => "UCAYALI",
            "superficie" => "4689",
            "altitud" => "275",
            "latitud" => "-9.0336",
            "longitud" => "-75.5075"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1871,
            "ubigeo_reniec" => "250202",
            "ubigeo_inei" => "250302",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "IRAZOLA",
            "region" => "UCAYALI",
            "superficie" => "999",
            "altitud" => "228",
            "latitud" => "-8.8286",
            "longitud" => "-75.2133"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1872,
            "ubigeo_reniec" => "250203",
            "ubigeo_inei" => "250303",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "CURIMANA",
            "region" => "UCAYALI",
            "superficie" => "2134",
            "altitud" => "181",
            "latitud" => "-8.4333",
            "longitud" => "-75.1478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1873,
            "ubigeo_reniec" => "250204",
            "ubigeo_inei" => "250304",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "NESHUYA",
            "region" => "UCAYALI",
            "superficie" => "580",
            "altitud" => "193",
            "latitud" => "-8.64",
            "longitud" => "-74.9644"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1874,
            "ubigeo_reniec" => "250205",
            "ubigeo_inei" => "250305",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "ALEXANDER VON HUMBOLDT",
            "region" => "UCAYALI",
            "superficie" => "191",
            "altitud" => "237",
            "latitud" => "-8.8275",
            "longitud" => "-75.0508"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1875,
            "ubigeo_reniec" => "250401",
            "ubigeo_inei" => "250401",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2504",
            "provincia" => "PURUS",
            "distrito" => "PURUS",
            "region" => "UCAYALI",
            "superficie" => "17848",
            "altitud" => "228",
            "latitud" => "-9.7722",
            "longitud" => "-70.7097"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1876,
            "ubigeo_reniec" => "050314",
            "ubigeo_inei" => "050413",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0504",
            "provincia" => "HUANTA",
            "distrito" => "PUTIS",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1877,
            "ubigeo_reniec" => "050412",
            "ubigeo_inei" => "050512",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "UNION PROGRESO",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1878,
            "ubigeo_reniec" => "050415",
            "ubigeo_inei" => "050513",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "RIO MAGDALENA",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1879,
            "ubigeo_reniec" => "050414",
            "ubigeo_inei" => "050514",
            "departamento_inei" => "05",
            "departamento" => "AYACUCHO",
            "provincia_inei" => "0505",
            "provincia" => "LA MAR",
            "distrito" => "NINABAMBA",
            "region" => "AYACUCHO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1881,
            "ubigeo_reniec" => "250207",
            "ubigeo_inei" => "250306",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "HUIPOCA",
            "region" => "UCAYALI",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1882,
            "ubigeo_reniec" => "250206",
            "ubigeo_inei" => "250307",
            "departamento_inei" => "25",
            "departamento" => "UCAYALI",
            "provincia_inei" => "2503",
            "provincia" => "PADRE ABAD",
            "distrito" => "BOQUERON",
            "region" => "UCAYALI",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1883,
            "ubigeo_reniec" => "170107",
            "ubigeo_inei" => "180199",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "SAN ANTONIO",
            "region" => "MOQUEGUA",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1884,
            "ubigeo_reniec" => "080533",
            "ubigeo_inei" => "090724",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "LAMBRAS",
            "region" => "HUANCAVELICA",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1885,
            "ubigeo_reniec" => "080534",
            "ubigeo_inei" => "090725",
            "departamento_inei" => "09",
            "departamento" => "HUANCAVELICA",
            "provincia_inei" => "0907",
            "provincia" => "TAYACAJA",
            "distrito" => "COCHABAMBA",
            "region" => "HUANCAVELICA",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1886,
            "ubigeo_reniec" => "      ",
            "ubigeo_inei" => "150144",
            "departamento_inei" => "15",
            "departamento" => "LIMA",
            "provincia_inei" => "1501",
            "provincia" => "LIMA",
            "distrito" => "SANTA MARIA DE HUACHIPA",
            "region" => "LIMA PROVINCIA",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1887,
            "ubigeo_reniec" => "070916",
            "ubigeo_inei" => "080915",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "KUMPIRUSHIATO",
            "region" => "CUSCO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1888,
            "ubigeo_reniec" => "070917",
            "ubigeo_inei" => "080916",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "CIELO PUNCO",
            "region" => "CUSCO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1889,
            "ubigeo_reniec" => "070918",
            "ubigeo_inei" => "080917",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "MANITEA",
            "region" => "CUSCO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1890,
            "ubigeo_reniec" => "070919",
            "ubigeo_inei" => "080918",
            "departamento_inei" => "08",
            "departamento" => "CUSCO",
            "provincia_inei" => "0809",
            "provincia" => "LA CONVENCION",
            "distrito" => "UNION ASHÁNINKA",
            "region" => "CUSCO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1891,
            "ubigeo_reniec" => "030712",
            "ubigeo_inei" => "030612",
            "departamento_inei" => "03",
            "departamento" => "APURIMAC",
            "provincia_inei" => "0306",
            "provincia" => "CHINCHEROS",
            "distrito" => "AHUAYRO",
            "region" => "APURIMAC",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1892,
            "ubigeo_reniec" => "210806",
            "ubigeo_inei" => "221006",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "SANTA LUCIA",
            "region" => "SAN MARTIN",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1893,
            "ubigeo_reniec" => "150107",
            "ubigeo_inei" => "160109",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "PUTUMAYO",
            "region" => "LORETO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1894,
            "ubigeo_reniec" => "150114",
            "ubigeo_inei" => "160114",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1601",
            "provincia" => "MAYNAS",
            "distrito" => "TENIENTE MANUEL CLAVERO",
            "region" => "LORETO",
            "superficie" => "",
            "altitud" => "",
            "latitud" => "",
            "longitud" => ""
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1468,
            "ubigeo_reniec" => "150210",
            "ubigeo_inei" => "160210",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "SANTA CRUZ",
            "region" => "LORETO",
            "superficie" => "2222",
            "altitud" => "131",
            "latitud" => "-5.5133",
            "longitud" => "-75.8589"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1469,
            "ubigeo_reniec" => "150211",
            "ubigeo_inei" => "160211",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1602",
            "provincia" => "ALTO AMAZONAS",
            "distrito" => "TENIENTE CESAR LOPEZ ROJAS",
            "region" => "LORETO",
            "superficie" => "1292",
            "altitud" => "149",
            "latitud" => "-6.0256",
            "longitud" => "-75.8742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1470,
            "ubigeo_reniec" => "150301",
            "ubigeo_inei" => "160301",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1603",
            "provincia" => "LORETO",
            "distrito" => "NAUTA",
            "region" => "LORETO",
            "superficie" => "6672",
            "altitud" => "127",
            "latitud" => "-4.5014",
            "longitud" => "-73.5694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1471,
            "ubigeo_reniec" => "150302",
            "ubigeo_inei" => "160302",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1603",
            "provincia" => "LORETO",
            "distrito" => "PARINARI",
            "region" => "LORETO",
            "superficie" => "12935",
            "altitud" => "106",
            "latitud" => "-4.6317",
            "longitud" => "-74.4631"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1472,
            "ubigeo_reniec" => "150303",
            "ubigeo_inei" => "160303",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1603",
            "provincia" => "LORETO",
            "distrito" => "TIGRE",
            "region" => "LORETO",
            "superficie" => "19786",
            "altitud" => "131",
            "latitud" => "-3.4897",
            "longitud" => "-74.7817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1473,
            "ubigeo_reniec" => "150305",
            "ubigeo_inei" => "160304",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1603",
            "provincia" => "LORETO",
            "distrito" => "TROMPETEROS",
            "region" => "LORETO",
            "superficie" => "12246",
            "altitud" => "131",
            "latitud" => "-3.805",
            "longitud" => "-75.0606"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1474,
            "ubigeo_reniec" => "150304",
            "ubigeo_inei" => "160305",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1603",
            "provincia" => "LORETO",
            "distrito" => "URARINAS",
            "region" => "LORETO",
            "superficie" => "15434",
            "altitud" => "100",
            "latitud" => "-4.5875",
            "longitud" => "-74.7672"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1475,
            "ubigeo_reniec" => "150601",
            "ubigeo_inei" => "160401",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1604",
            "provincia" => "MARISCAL RAMON CASTILLA",
            "distrito" => "RAMON CASTILLA",
            "region" => "LORETO",
            "superficie" => "7163",
            "altitud" => "86",
            "latitud" => "-3.9061",
            "longitud" => "-70.5169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1476,
            "ubigeo_reniec" => "150602",
            "ubigeo_inei" => "160402",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1604",
            "provincia" => "MARISCAL RAMON CASTILLA",
            "distrito" => "PEBAS",
            "region" => "LORETO",
            "superficie" => "11048",
            "altitud" => "117",
            "latitud" => "-3.3203",
            "longitud" => "-71.8619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1477,
            "ubigeo_reniec" => "150603",
            "ubigeo_inei" => "160403",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1604",
            "provincia" => "MARISCAL RAMON CASTILLA",
            "distrito" => "YAVARI",
            "region" => "LORETO",
            "superficie" => "13808",
            "altitud" => "75",
            "latitud" => "-4.3536",
            "longitud" => "-70.0417"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1478,
            "ubigeo_reniec" => "150604",
            "ubigeo_inei" => "160404",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1604",
            "provincia" => "MARISCAL RAMON CASTILLA",
            "distrito" => "SAN PABLO",
            "region" => "LORETO",
            "superficie" => "5046",
            "altitud" => "85",
            "latitud" => "-4.0203",
            "longitud" => "-71.1031"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1479,
            "ubigeo_reniec" => "150401",
            "ubigeo_inei" => "160501",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "REQUENA",
            "region" => "LORETO",
            "superficie" => "3039",
            "altitud" => "116",
            "latitud" => "-5.0639",
            "longitud" => "-73.8567"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1480,
            "ubigeo_reniec" => "150402",
            "ubigeo_inei" => "160502",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "ALTO TAPICHE",
            "region" => "LORETO",
            "superficie" => "9014",
            "altitud" => "123",
            "latitud" => "-6.0256",
            "longitud" => "-74.0942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1481,
            "ubigeo_reniec" => "150403",
            "ubigeo_inei" => "160503",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "CAPELO",
            "region" => "LORETO",
            "superficie" => "842",
            "altitud" => "112",
            "latitud" => "-5.4053",
            "longitud" => "-74.1578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1482,
            "ubigeo_reniec" => "150404",
            "ubigeo_inei" => "160504",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "EMILIO SAN MARTIN",
            "region" => "LORETO",
            "superficie" => "4573",
            "altitud" => "108",
            "latitud" => "-5.7936",
            "longitud" => "-74.2839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1483,
            "ubigeo_reniec" => "150405",
            "ubigeo_inei" => "160505",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "MAQUIA",
            "region" => "LORETO",
            "superficie" => "4792",
            "altitud" => "108",
            "latitud" => "-5.7497",
            "longitud" => "-74.5378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1484,
            "ubigeo_reniec" => "150406",
            "ubigeo_inei" => "160506",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "PUINAHUA",
            "region" => "LORETO",
            "superficie" => "6149",
            "altitud" => "113",
            "latitud" => "-5.2556",
            "longitud" => "-74.3456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1485,
            "ubigeo_reniec" => "150407",
            "ubigeo_inei" => "160507",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "SAQUENA",
            "region" => "LORETO",
            "superficie" => "2081",
            "altitud" => "106",
            "latitud" => "-4.725",
            "longitud" => "-73.5331"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1486,
            "ubigeo_reniec" => "150408",
            "ubigeo_inei" => "160508",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "SOPLIN",
            "region" => "LORETO",
            "superficie" => "4711",
            "altitud" => "118",
            "latitud" => "-6.0078",
            "longitud" => "-73.6925"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1487,
            "ubigeo_reniec" => "150409",
            "ubigeo_inei" => "160509",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "TAPICHE",
            "region" => "LORETO",
            "superficie" => "2014",
            "altitud" => "108",
            "latitud" => "-5.6936",
            "longitud" => "-74.1378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1488,
            "ubigeo_reniec" => "150410",
            "ubigeo_inei" => "160510",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "JENARO HERRERA",
            "region" => "LORETO",
            "superficie" => "1517",
            "altitud" => "116",
            "latitud" => "-4.9036",
            "longitud" => "-73.6706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1489,
            "ubigeo_reniec" => "150411",
            "ubigeo_inei" => "160511",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1605",
            "provincia" => "REQUENA",
            "distrito" => "YAQUERANA",
            "region" => "LORETO",
            "superficie" => "10947",
            "altitud" => "90",
            "latitud" => "-5.1489",
            "longitud" => "-72.8753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1490,
            "ubigeo_reniec" => "150501",
            "ubigeo_inei" => "160601",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "CONTAMANA",
            "region" => "LORETO",
            "superficie" => "10675",
            "altitud" => "138",
            "latitud" => "-7.3506",
            "longitud" => "-75.0097"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1491,
            "ubigeo_reniec" => "150506",
            "ubigeo_inei" => "160602",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "INAHUAYA",
            "region" => "LORETO",
            "superficie" => "646",
            "altitud" => "140",
            "latitud" => "-7.1169",
            "longitud" => "-75.2625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1492,
            "ubigeo_reniec" => "150503",
            "ubigeo_inei" => "160603",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "PADRE MARQUEZ",
            "region" => "LORETO",
            "superficie" => "2476",
            "altitud" => "139",
            "latitud" => "-7.9467",
            "longitud" => "-74.8408"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1493,
            "ubigeo_reniec" => "150504",
            "ubigeo_inei" => "160604",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "PAMPA HERMOSA",
            "region" => "LORETO",
            "superficie" => "7347",
            "altitud" => "111",
            "latitud" => "-7.1964",
            "longitud" => "-75.2944"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1494,
            "ubigeo_reniec" => "150505",
            "ubigeo_inei" => "160605",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "SARAYACU",
            "region" => "LORETO",
            "superficie" => "6303",
            "altitud" => "122",
            "latitud" => "-6.3931",
            "longitud" => "-75.1169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1495,
            "ubigeo_reniec" => "150502",
            "ubigeo_inei" => "160606",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1606",
            "provincia" => "UCAYALI",
            "distrito" => "VARGAS GUERRA",
            "region" => "LORETO",
            "superficie" => "1846",
            "altitud" => "129",
            "latitud" => "-6.9111",
            "longitud" => "-75.1589"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1496,
            "ubigeo_reniec" => "150701",
            "ubigeo_inei" => "160701",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "BARRANCA",
            "region" => "LORETO",
            "superficie" => "7236",
            "altitud" => "134",
            "latitud" => "-4.8311",
            "longitud" => "-76.555"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1497,
            "ubigeo_reniec" => "150703",
            "ubigeo_inei" => "160702",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "CAHUAPANAS",
            "region" => "LORETO",
            "superficie" => "4685",
            "altitud" => "162",
            "latitud" => "-5.2492",
            "longitud" => "-77.0414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1498,
            "ubigeo_reniec" => "150704",
            "ubigeo_inei" => "160703",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "MANSERICHE",
            "region" => "LORETO",
            "superficie" => "3494",
            "altitud" => "155",
            "latitud" => "-4.5636",
            "longitud" => "-77.4172"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1499,
            "ubigeo_reniec" => "150705",
            "ubigeo_inei" => "160704",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "MORONA",
            "region" => "LORETO",
            "superficie" => "10777",
            "altitud" => "144",
            "latitud" => "-4.3264",
            "longitud" => "-77.2161"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1500,
            "ubigeo_reniec" => "150706",
            "ubigeo_inei" => "160705",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "PASTAZA",
            "region" => "LORETO",
            "superficie" => "8909",
            "altitud" => "137",
            "latitud" => "-4.6511",
            "longitud" => "-76.5875"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1501,
            "ubigeo_reniec" => "150702",
            "ubigeo_inei" => "160706",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1607",
            "provincia" => "DATEM DEL MARAŃON",
            "distrito" => "ANDOAS",
            "region" => "LORETO",
            "superficie" => "11541",
            "altitud" => "172",
            "latitud" => "-3.4756",
            "longitud" => "-76.4336"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1502,
            "ubigeo_reniec" => "150901",
            "ubigeo_inei" => "160801",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1608",
            "provincia" => "PUTUMAYO",
            "distrito" => "PUTUMAYO",
            "region" => "LORETO",
            "superficie" => "10886",
            "altitud" => "131",
            "latitud" => "-2.4469",
            "longitud" => "-72.6681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1503,
            "ubigeo_reniec" => "150902",
            "ubigeo_inei" => "160802",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1608",
            "provincia" => "PUTUMAYO",
            "distrito" => "ROSA PANDURO",
            "region" => "LORETO",
            "superficie" => "7039",
            "altitud" => "132",
            "latitud" => "-1.7886",
            "longitud" => "-73.4131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1504,
            "ubigeo_reniec" => "150903",
            "ubigeo_inei" => "160803",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1608",
            "provincia" => "PUTUMAYO",
            "distrito" => "TENIENTE MANUEL CLAVERO",
            "region" => "LORETO",
            "superficie" => "9489",
            "altitud" => "185",
            "latitud" => "-0.3733",
            "longitud" => "-74.6758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1505,
            "ubigeo_reniec" => "150904",
            "ubigeo_inei" => "160804",
            "departamento_inei" => "16",
            "departamento" => "LORETO",
            "provincia_inei" => "1608",
            "provincia" => "PUTUMAYO",
            "distrito" => "YAGUAS",
            "region" => "LORETO",
            "superficie" => "17725",
            "altitud" => "94",
            "latitud" => "-2.4081",
            "longitud" => "-71.1767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1506,
            "ubigeo_reniec" => "160101",
            "ubigeo_inei" => "170101",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1701",
            "provincia" => "TAMBOPATA",
            "distrito" => "TAMBOPATA",
            "region" => "MADRE DE DIOS",
            "superficie" => "22219",
            "altitud" => "204",
            "latitud" => "-12.5936",
            "longitud" => "-69.1767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1507,
            "ubigeo_reniec" => "160102",
            "ubigeo_inei" => "170102",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1701",
            "provincia" => "TAMBOPATA",
            "distrito" => "INAMBARI",
            "region" => "MADRE DE DIOS",
            "superficie" => "4257",
            "altitud" => "351",
            "latitud" => "-13.1014",
            "longitud" => "-70.3717"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1508,
            "ubigeo_reniec" => "160103",
            "ubigeo_inei" => "170103",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1701",
            "provincia" => "TAMBOPATA",
            "distrito" => "LAS PIEDRAS",
            "region" => "MADRE DE DIOS",
            "superficie" => "7032",
            "altitud" => "239",
            "latitud" => "-12.2792",
            "longitud" => "-69.1503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1509,
            "ubigeo_reniec" => "160104",
            "ubigeo_inei" => "170104",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1701",
            "provincia" => "TAMBOPATA",
            "distrito" => "LABERINTO",
            "region" => "MADRE DE DIOS",
            "superficie" => "2761",
            "altitud" => "192",
            "latitud" => "-12.7172",
            "longitud" => "-69.5867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1510,
            "ubigeo_reniec" => "160201",
            "ubigeo_inei" => "170201",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1702",
            "provincia" => "MANU",
            "distrito" => "MANU",
            "region" => "MADRE DE DIOS",
            "superficie" => "8167",
            "altitud" => "535",
            "latitud" => "-12.8372",
            "longitud" => "-71.3653"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1511,
            "ubigeo_reniec" => "160202",
            "ubigeo_inei" => "170202",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1702",
            "provincia" => "MANU",
            "distrito" => "FITZCARRALD",
            "region" => "MADRE DE DIOS",
            "superficie" => "10955",
            "altitud" => "282",
            "latitud" => "-12.2653",
            "longitud" => "-70.91"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1512,
            "ubigeo_reniec" => "160203",
            "ubigeo_inei" => "170203",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1702",
            "provincia" => "MANU",
            "distrito" => "MADRE DE DIOS",
            "region" => "MADRE DE DIOS",
            "superficie" => "7235",
            "altitud" => "246",
            "latitud" => "-12.6186",
            "longitud" => "-70.3942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1513,
            "ubigeo_reniec" => "160204",
            "ubigeo_inei" => "170204",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1702",
            "provincia" => "MANU",
            "distrito" => "HUEPETUHE",
            "region" => "MADRE DE DIOS",
            "superficie" => "1478",
            "altitud" => "444",
            "latitud" => "-12.9936",
            "longitud" => "-70.5272"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1514,
            "ubigeo_reniec" => "160301",
            "ubigeo_inei" => "170301",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1703",
            "provincia" => "TAHUAMANU",
            "distrito" => "IŃAPARI",
            "region" => "MADRE DE DIOS",
            "superficie" => "14854",
            "altitud" => "238",
            "latitud" => "-10.945",
            "longitud" => "-69.5767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1515,
            "ubigeo_reniec" => "160302",
            "ubigeo_inei" => "170302",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1703",
            "provincia" => "TAHUAMANU",
            "distrito" => "IBERIA",
            "region" => "MADRE DE DIOS",
            "superficie" => "2549",
            "altitud" => "268",
            "latitud" => "-11.4108",
            "longitud" => "-69.4869"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1516,
            "ubigeo_reniec" => "160303",
            "ubigeo_inei" => "170303",
            "departamento_inei" => "17",
            "departamento" => "MADRE DE DIOS",
            "provincia_inei" => "1703",
            "provincia" => "TAHUAMANU",
            "distrito" => "TAHUAMANU",
            "region" => "MADRE DE DIOS",
            "superficie" => "3794",
            "altitud" => "261",
            "latitud" => "-11.4547",
            "longitud" => "-69.3214"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1517,
            "ubigeo_reniec" => "170101",
            "ubigeo_inei" => "180101",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "MOQUEGUA",
            "region" => "MOQUEGUA",
            "superficie" => "3949",
            "altitud" => "1428",
            "latitud" => "-17.1942",
            "longitud" => "-70.9333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1518,
            "ubigeo_reniec" => "170102",
            "ubigeo_inei" => "180102",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "CARUMAS",
            "region" => "MOQUEGUA",
            "superficie" => "2256",
            "altitud" => "3054",
            "latitud" => "-16.8092",
            "longitud" => "-70.6947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1519,
            "ubigeo_reniec" => "170103",
            "ubigeo_inei" => "180103",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "CUCHUMBAYA",
            "region" => "MOQUEGUA",
            "superficie" => "68",
            "altitud" => "3156",
            "latitud" => "-16.7508",
            "longitud" => "-70.6861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1520,
            "ubigeo_reniec" => "170106",
            "ubigeo_inei" => "180104",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "SAMEGUA",
            "region" => "MOQUEGUA",
            "superficie" => "63",
            "altitud" => "1615",
            "latitud" => "-17.1822",
            "longitud" => "-70.9003"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1521,
            "ubigeo_reniec" => "170104",
            "ubigeo_inei" => "180105",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "SAN CRISTOBAL",
            "region" => "MOQUEGUA",
            "superficie" => "543",
            "altitud" => "3472",
            "latitud" => "-16.7392",
            "longitud" => "-70.6833"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1522,
            "ubigeo_reniec" => "170105",
            "ubigeo_inei" => "180106",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1801",
            "provincia" => "MARISCAL NIETO",
            "distrito" => "TORATA",
            "region" => "MOQUEGUA",
            "superficie" => "1793",
            "altitud" => "2203",
            "latitud" => "-17.0767",
            "longitud" => "-70.8442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1523,
            "ubigeo_reniec" => "170201",
            "ubigeo_inei" => "180201",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "OMATE",
            "region" => "MOQUEGUA",
            "superficie" => "251",
            "altitud" => "2169",
            "latitud" => "-16.6736",
            "longitud" => "-70.9706"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1524,
            "ubigeo_reniec" => "170203",
            "ubigeo_inei" => "180202",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "CHOJATA",
            "region" => "MOQUEGUA",
            "superficie" => "848",
            "altitud" => "3634",
            "latitud" => "-16.3883",
            "longitud" => "-70.7303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1525,
            "ubigeo_reniec" => "170202",
            "ubigeo_inei" => "180203",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "COALAQUE",
            "region" => "MOQUEGUA",
            "superficie" => "248",
            "altitud" => "2300",
            "latitud" => "-16.6489",
            "longitud" => "-71.0217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1526,
            "ubigeo_reniec" => "170204",
            "ubigeo_inei" => "180204",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "ICHUŃA",
            "region" => "MOQUEGUA",
            "superficie" => "1018",
            "altitud" => "3794",
            "latitud" => "-16.1406",
            "longitud" => "-70.5356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1527,
            "ubigeo_reniec" => "170205",
            "ubigeo_inei" => "180205",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "LA CAPILLA",
            "region" => "MOQUEGUA",
            "superficie" => "776",
            "altitud" => "1817",
            "latitud" => "-16.7567",
            "longitud" => "-71.1792"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1528,
            "ubigeo_reniec" => "170206",
            "ubigeo_inei" => "180206",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "LLOQUE",
            "region" => "MOQUEGUA",
            "superficie" => "254",
            "altitud" => "3325",
            "latitud" => "-16.3239",
            "longitud" => "-70.7386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1529,
            "ubigeo_reniec" => "170207",
            "ubigeo_inei" => "180207",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "MATALAQUE",
            "region" => "MOQUEGUA",
            "superficie" => "557",
            "altitud" => "2577",
            "latitud" => "-16.4811",
            "longitud" => "-70.8267"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1530,
            "ubigeo_reniec" => "170208",
            "ubigeo_inei" => "180208",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "PUQUINA",
            "region" => "MOQUEGUA",
            "superficie" => "551",
            "altitud" => "3092",
            "latitud" => "-16.6253",
            "longitud" => "-71.1839"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1531,
            "ubigeo_reniec" => "170209",
            "ubigeo_inei" => "180209",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "QUINISTAQUILLAS",
            "region" => "MOQUEGUA",
            "superficie" => "194",
            "altitud" => "1789",
            "latitud" => "-16.7489",
            "longitud" => "-70.8803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1532,
            "ubigeo_reniec" => "170210",
            "ubigeo_inei" => "180210",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "UBINAS",
            "region" => "MOQUEGUA",
            "superficie" => "875",
            "altitud" => "3395",
            "latitud" => "-16.3867",
            "longitud" => "-70.8556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1533,
            "ubigeo_reniec" => "170211",
            "ubigeo_inei" => "180211",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1802",
            "provincia" => "GENERAL SANCHEZ CERRO",
            "distrito" => "YUNGA",
            "region" => "MOQUEGUA",
            "superficie" => "111",
            "altitud" => "3619",
            "latitud" => "-16.195",
            "longitud" => "-70.6778"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1534,
            "ubigeo_reniec" => "170301",
            "ubigeo_inei" => "180301",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1803",
            "provincia" => "ILO",
            "distrito" => "ILO",
            "region" => "MOQUEGUA",
            "superficie" => "296",
            "altitud" => "33",
            "latitud" => "-17.625",
            "longitud" => "-71.3433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1535,
            "ubigeo_reniec" => "170302",
            "ubigeo_inei" => "180302",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1803",
            "provincia" => "ILO",
            "distrito" => "EL ALGARROBAL",
            "region" => "MOQUEGUA",
            "superficie" => "747",
            "altitud" => "136",
            "latitud" => "-17.6228",
            "longitud" => "-71.2683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1536,
            "ubigeo_reniec" => "170303",
            "ubigeo_inei" => "180303",
            "departamento_inei" => "18",
            "departamento" => "MOQUEGUA",
            "provincia_inei" => "1803",
            "provincia" => "ILO",
            "distrito" => "PACOCHA",
            "region" => "MOQUEGUA",
            "superficie" => "338",
            "altitud" => "77",
            "latitud" => "-17.6108",
            "longitud" => "-71.3403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1537,
            "ubigeo_reniec" => "180101",
            "ubigeo_inei" => "190101",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "CHAUPIMARCA",
            "region" => "PASCO",
            "superficie" => "7",
            "altitud" => "4373",
            "latitud" => "-10.6825",
            "longitud" => "-76.2569"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1538,
            "ubigeo_reniec" => "180103",
            "ubigeo_inei" => "190102",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "HUACHON",
            "region" => "PASCO",
            "superficie" => "846",
            "altitud" => "3400",
            "latitud" => "-10.6364",
            "longitud" => "-75.9511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1539,
            "ubigeo_reniec" => "180104",
            "ubigeo_inei" => "190103",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "HUARIACA",
            "region" => "PASCO",
            "superficie" => "133",
            "altitud" => "2986",
            "latitud" => "-10.4392",
            "longitud" => "-76.1917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1540,
            "ubigeo_reniec" => "180105",
            "ubigeo_inei" => "190104",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "HUAYLLAY",
            "region" => "PASCO",
            "superficie" => "1027",
            "altitud" => "4341",
            "latitud" => "-11.0019",
            "longitud" => "-76.3647"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1541,
            "ubigeo_reniec" => "180106",
            "ubigeo_inei" => "190105",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "NINACACA",
            "region" => "PASCO",
            "superficie" => "509",
            "altitud" => "4172",
            "latitud" => "-10.8556",
            "longitud" => "-76.1131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1542,
            "ubigeo_reniec" => "180107",
            "ubigeo_inei" => "190106",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "PALLANCHACRA",
            "region" => "PASCO",
            "superficie" => "74",
            "altitud" => "3126",
            "latitud" => "-10.4153",
            "longitud" => "-76.2356"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1543,
            "ubigeo_reniec" => "180108",
            "ubigeo_inei" => "190107",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "PAUCARTAMBO",
            "region" => "PASCO",
            "superficie" => "782",
            "altitud" => "2954",
            "latitud" => "-10.7744",
            "longitud" => "-75.8133"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1544,
            "ubigeo_reniec" => "180109",
            "ubigeo_inei" => "190108",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "SAN FRANCISCO DE ASIS DE YARUSYACAN",
            "region" => "PASCO",
            "superficie" => "118",
            "altitud" => "3785",
            "latitud" => "-10.49",
            "longitud" => "-76.1961"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1545,
            "ubigeo_reniec" => "180110",
            "ubigeo_inei" => "190109",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "SIMON BOLIVAR",
            "region" => "PASCO",
            "superficie" => "697",
            "altitud" => "4234",
            "latitud" => "-10.6892",
            "longitud" => "-76.3164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1546,
            "ubigeo_reniec" => "180111",
            "ubigeo_inei" => "190110",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "TICLACAYAN",
            "region" => "PASCO",
            "superficie" => "748",
            "altitud" => "3543",
            "latitud" => "-10.535",
            "longitud" => "-76.1642"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1547,
            "ubigeo_reniec" => "180112",
            "ubigeo_inei" => "190111",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "TINYAHUARCO",
            "region" => "PASCO",
            "superficie" => "94",
            "altitud" => "4281",
            "latitud" => "-10.7697",
            "longitud" => "-76.2769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1548,
            "ubigeo_reniec" => "180113",
            "ubigeo_inei" => "190112",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "VICCO",
            "region" => "PASCO",
            "superficie" => "173",
            "altitud" => "4128",
            "latitud" => "-10.8383",
            "longitud" => "-76.2383"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1549,
            "ubigeo_reniec" => "180114",
            "ubigeo_inei" => "190113",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1901",
            "provincia" => "PASCO",
            "distrito" => "YANACANCHA",
            "region" => "PASCO",
            "superficie" => "165",
            "altitud" => "4394",
            "latitud" => "-10.6633",
            "longitud" => "-76.2531"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1550,
            "ubigeo_reniec" => "180201",
            "ubigeo_inei" => "190201",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "YANAHUANCA",
            "region" => "PASCO",
            "superficie" => "921",
            "altitud" => "3203",
            "latitud" => "-10.4914",
            "longitud" => "-76.5164"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1551,
            "ubigeo_reniec" => "180202",
            "ubigeo_inei" => "190202",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "CHACAYAN",
            "region" => "PASCO",
            "superficie" => "199",
            "altitud" => "3385",
            "latitud" => "-10.4344",
            "longitud" => "-76.4372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1552,
            "ubigeo_reniec" => "180203",
            "ubigeo_inei" => "190203",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "GOYLLARISQUIZGA",
            "region" => "PASCO",
            "superficie" => "23",
            "altitud" => "4202",
            "latitud" => "-10.4731",
            "longitud" => "-76.4083"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1553,
            "ubigeo_reniec" => "180204",
            "ubigeo_inei" => "190204",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "PAUCAR",
            "region" => "PASCO",
            "superficie" => "134",
            "altitud" => "3381",
            "latitud" => "-10.3711",
            "longitud" => "-76.4433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1554,
            "ubigeo_reniec" => "180205",
            "ubigeo_inei" => "190205",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "SAN PEDRO DE PILLAO",
            "region" => "PASCO",
            "superficie" => "92",
            "altitud" => "3648",
            "latitud" => "-10.4389",
            "longitud" => "-76.4953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1555,
            "ubigeo_reniec" => "180206",
            "ubigeo_inei" => "190206",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "SANTA ANA DE TUSI",
            "region" => "PASCO",
            "superficie" => "353",
            "altitud" => "3786",
            "latitud" => "-10.4725",
            "longitud" => "-76.3536"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1556,
            "ubigeo_reniec" => "180207",
            "ubigeo_inei" => "190207",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "TAPUC",
            "region" => "PASCO",
            "superficie" => "60",
            "altitud" => "3713",
            "latitud" => "-10.4547",
            "longitud" => "-76.4625"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1557,
            "ubigeo_reniec" => "180208",
            "ubigeo_inei" => "190208",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1902",
            "provincia" => "DANIEL ALCIDES CARRION",
            "distrito" => "VILCABAMBA",
            "region" => "PASCO",
            "superficie" => "102",
            "altitud" => "3459",
            "latitud" => "-10.4786",
            "longitud" => "-76.4469"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1558,
            "ubigeo_reniec" => "180301",
            "ubigeo_inei" => "190301",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "OXAPAMPA",
            "region" => "PASCO",
            "superficie" => "420",
            "altitud" => "1832",
            "latitud" => "-10.575",
            "longitud" => "-75.4047"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1559,
            "ubigeo_reniec" => "180302",
            "ubigeo_inei" => "190302",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "CHONTABAMBA",
            "region" => "PASCO",
            "superficie" => "457",
            "altitud" => "1849",
            "latitud" => "-10.6022",
            "longitud" => "-75.4389"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1560,
            "ubigeo_reniec" => "180303",
            "ubigeo_inei" => "190303",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "HUANCABAMBA",
            "region" => "PASCO",
            "superficie" => "1182",
            "altitud" => "1769",
            "latitud" => "-10.4261",
            "longitud" => "-75.5239"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1561,
            "ubigeo_reniec" => "180307",
            "ubigeo_inei" => "190304",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "PALCAZU",
            "region" => "PASCO",
            "superficie" => "2912",
            "altitud" => "302",
            "latitud" => "-10.1842",
            "longitud" => "-75.1481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1562,
            "ubigeo_reniec" => "180306",
            "ubigeo_inei" => "190305",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "POZUZO",
            "region" => "PASCO",
            "superficie" => "751",
            "altitud" => "750",
            "latitud" => "-10.0711",
            "longitud" => "-75.5503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1563,
            "ubigeo_reniec" => "180304",
            "ubigeo_inei" => "190306",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "PUERTO BERMUDEZ",
            "region" => "PASCO",
            "superficie" => "8014",
            "altitud" => "281",
            "latitud" => "-10.2992",
            "longitud" => "-74.9372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1564,
            "ubigeo_reniec" => "180305",
            "ubigeo_inei" => "190307",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "VILLA RICA",
            "region" => "PASCO",
            "superficie" => "859",
            "altitud" => "1551",
            "latitud" => "-10.7392",
            "longitud" => "-75.2758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1565,
            "ubigeo_reniec" => "180308",
            "ubigeo_inei" => "190308",
            "departamento_inei" => "19",
            "departamento" => "PASCO",
            "provincia_inei" => "1903",
            "provincia" => "OXAPAMPA",
            "distrito" => "CONSTITUCION",
            "region" => "PASCO",
            "superficie" => "3171",
            "altitud" => "247",
            "latitud" => "-9.8564",
            "longitud" => "-75.0169"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1566,
            "ubigeo_reniec" => "190101",
            "ubigeo_inei" => "200101",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "PIURA",
            "region" => "PIURA",
            "superficie" => "196",
            "altitud" => "57",
            "latitud" => "-5.1525",
            "longitud" => "-80.6578"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1567,
            "ubigeo_reniec" => "190103",
            "ubigeo_inei" => "200104",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "CASTILLA",
            "region" => "PIURA",
            "superficie" => "657",
            "altitud" => "35",
            "latitud" => "-5.2014",
            "longitud" => "-80.6228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1568,
            "ubigeo_reniec" => "190104",
            "ubigeo_inei" => "200105",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "CATACAOS",
            "region" => "PIURA",
            "superficie" => "2287",
            "altitud" => "35",
            "latitud" => "-5.2672",
            "longitud" => "-80.6725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1569,
            "ubigeo_reniec" => "190113",
            "ubigeo_inei" => "200107",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "CURA MORI",
            "region" => "PIURA",
            "superficie" => "217",
            "altitud" => "35",
            "latitud" => "-5.3236",
            "longitud" => "-80.6656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1570,
            "ubigeo_reniec" => "190114",
            "ubigeo_inei" => "200108",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "EL TALLAN",
            "region" => "PIURA",
            "superficie" => "101",
            "altitud" => "21",
            "latitud" => "-5.4092",
            "longitud" => "-80.6811"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1571,
            "ubigeo_reniec" => "190105",
            "ubigeo_inei" => "200109",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "LA ARENA",
            "region" => "PIURA",
            "superficie" => "171",
            "altitud" => "33",
            "latitud" => "-5.3431",
            "longitud" => "-80.7036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1572,
            "ubigeo_reniec" => "190106",
            "ubigeo_inei" => "200110",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "LA UNION",
            "region" => "PIURA",
            "superficie" => "321",
            "altitud" => "27",
            "latitud" => "-5.3883",
            "longitud" => "-80.7372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1573,
            "ubigeo_reniec" => "190107",
            "ubigeo_inei" => "200111",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "LAS LOMAS",
            "region" => "PIURA",
            "superficie" => "558",
            "altitud" => "257",
            "latitud" => "-4.65",
            "longitud" => "-80.2392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1574,
            "ubigeo_reniec" => "190109",
            "ubigeo_inei" => "200114",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "TAMBO GRANDE",
            "region" => "PIURA",
            "superficie" => "1497",
            "altitud" => "76",
            "latitud" => "-4.9281",
            "longitud" => "-80.3372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1575,
            "ubigeo_reniec" => "190115",
            "ubigeo_inei" => "200115",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2001",
            "provincia" => "PIURA",
            "distrito" => "VEINTISEIS DE OCTUBRE",
            "region" => "PIURA",
            "superficie" => "72",
            "altitud" => "53",
            "latitud" => "-5.1792",
            "longitud" => "-80.6781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1576,
            "ubigeo_reniec" => "190201",
            "ubigeo_inei" => "200201",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "AYABACA",
            "region" => "PIURA",
            "superficie" => "1550",
            "altitud" => "2735",
            "latitud" => "-4.6406",
            "longitud" => "-79.7153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1577,
            "ubigeo_reniec" => "190202",
            "ubigeo_inei" => "200202",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "FRIAS",
            "region" => "PIURA",
            "superficie" => "565",
            "altitud" => "1703",
            "latitud" => "-4.9317",
            "longitud" => "-79.9475"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1578,
            "ubigeo_reniec" => "190209",
            "ubigeo_inei" => "200203",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "JILILI",
            "region" => "PIURA",
            "superficie" => "105",
            "altitud" => "1311",
            "latitud" => "-4.5847",
            "longitud" => "-79.7972"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1579,
            "ubigeo_reniec" => "190203",
            "ubigeo_inei" => "200204",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "LAGUNAS",
            "region" => "PIURA",
            "superficie" => "191",
            "altitud" => "2219",
            "latitud" => "-4.7892",
            "longitud" => "-79.845"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1580,
            "ubigeo_reniec" => "190204",
            "ubigeo_inei" => "200205",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "MONTERO",
            "region" => "PIURA",
            "superficie" => "131",
            "altitud" => "1058",
            "latitud" => "-4.6322",
            "longitud" => "-79.8289"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1581,
            "ubigeo_reniec" => "190205",
            "ubigeo_inei" => "200206",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "PACAIPAMPA",
            "region" => "PIURA",
            "superficie" => "982",
            "altitud" => "1980",
            "latitud" => "-4.9956",
            "longitud" => "-79.6678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1582,
            "ubigeo_reniec" => "190210",
            "ubigeo_inei" => "200207",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "PAIMAS",
            "region" => "PIURA",
            "superficie" => "320",
            "altitud" => "598",
            "latitud" => "-4.6275",
            "longitud" => "-79.9456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1583,
            "ubigeo_reniec" => "190206",
            "ubigeo_inei" => "200208",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "SAPILLICA",
            "region" => "PIURA",
            "superficie" => "267",
            "altitud" => "1464",
            "latitud" => "-4.7792",
            "longitud" => "-79.9822"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1584,
            "ubigeo_reniec" => "190207",
            "ubigeo_inei" => "200209",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "SICCHEZ",
            "region" => "PIURA",
            "superficie" => "33",
            "altitud" => "1452",
            "latitud" => "-4.57",
            "longitud" => "-79.7639"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1585,
            "ubigeo_reniec" => "190208",
            "ubigeo_inei" => "200210",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2002",
            "provincia" => "AYABACA",
            "distrito" => "SUYO",
            "region" => "PIURA",
            "superficie" => "1079",
            "altitud" => "417",
            "latitud" => "-4.5128",
            "longitud" => "-80.0025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1586,
            "ubigeo_reniec" => "190301",
            "ubigeo_inei" => "200301",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "HUANCABAMBA",
            "region" => "PIURA",
            "superficie" => "447",
            "altitud" => "1955",
            "latitud" => "-5.2386",
            "longitud" => "-79.4503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1587,
            "ubigeo_reniec" => "190302",
            "ubigeo_inei" => "200302",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "CANCHAQUE",
            "region" => "PIURA",
            "superficie" => "306",
            "altitud" => "1152",
            "latitud" => "-5.3758",
            "longitud" => "-79.6056"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1588,
            "ubigeo_reniec" => "190306",
            "ubigeo_inei" => "200303",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "EL CARMEN DE LA FRONTERA",
            "region" => "PIURA",
            "superficie" => "703",
            "altitud" => "2472",
            "latitud" => "-5.1483",
            "longitud" => "-79.4283"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1589,
            "ubigeo_reniec" => "190303",
            "ubigeo_inei" => "200304",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "HUARMACA",
            "region" => "PIURA",
            "superficie" => "1908",
            "altitud" => "2188",
            "latitud" => "-5.5681",
            "longitud" => "-79.5244"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1590,
            "ubigeo_reniec" => "190308",
            "ubigeo_inei" => "200305",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "LALAQUIZ",
            "region" => "PIURA",
            "superficie" => "139",
            "altitud" => "972",
            "latitud" => "-5.2158",
            "longitud" => "-79.68"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1591,
            "ubigeo_reniec" => "190307",
            "ubigeo_inei" => "200306",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "SAN MIGUEL DE EL FAIQUE",
            "region" => "PIURA",
            "superficie" => "202",
            "altitud" => "1259",
            "latitud" => "-5.4019",
            "longitud" => "-79.6061"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1592,
            "ubigeo_reniec" => "190304",
            "ubigeo_inei" => "200307",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "SONDOR",
            "region" => "PIURA",
            "superficie" => "337",
            "altitud" => "2003",
            "latitud" => "-5.3156",
            "longitud" => "-79.4097"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1593,
            "ubigeo_reniec" => "190305",
            "ubigeo_inei" => "200308",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2003",
            "provincia" => "HUANCABAMBA",
            "distrito" => "SONDORILLO",
            "region" => "PIURA",
            "superficie" => "226",
            "altitud" => "1886",
            "latitud" => "-5.3394",
            "longitud" => "-79.4286"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1594,
            "ubigeo_reniec" => "190401",
            "ubigeo_inei" => "200401",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "CHULUCANAS",
            "region" => "PIURA",
            "superficie" => "842",
            "altitud" => "135",
            "latitud" => "-5.0972",
            "longitud" => "-80.1603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1595,
            "ubigeo_reniec" => "190402",
            "ubigeo_inei" => "200402",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "BUENOS AIRES",
            "region" => "PIURA",
            "superficie" => "245",
            "altitud" => "154",
            "latitud" => "-5.2669",
            "longitud" => "-79.9669"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1596,
            "ubigeo_reniec" => "190403",
            "ubigeo_inei" => "200403",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "CHALACO",
            "region" => "PIURA",
            "superficie" => "152",
            "altitud" => "2261",
            "latitud" => "-5.0411",
            "longitud" => "-79.7956"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1597,
            "ubigeo_reniec" => "190408",
            "ubigeo_inei" => "200404",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "LA MATANZA",
            "region" => "PIURA",
            "superficie" => "1044",
            "altitud" => "126",
            "latitud" => "-5.2136",
            "longitud" => "-80.0906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1598,
            "ubigeo_reniec" => "190404",
            "ubigeo_inei" => "200405",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "MORROPON",
            "region" => "PIURA",
            "superficie" => "170",
            "altitud" => "151",
            "latitud" => "-5.1861",
            "longitud" => "-79.9692"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1599,
            "ubigeo_reniec" => "190405",
            "ubigeo_inei" => "200406",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "SALITRAL",
            "region" => "PIURA",
            "superficie" => "614",
            "altitud" => "175",
            "latitud" => "-5.3419",
            "longitud" => "-79.8336"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1600,
            "ubigeo_reniec" => "190410",
            "ubigeo_inei" => "200407",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "SAN JUAN DE BIGOTE",
            "region" => "PIURA",
            "superficie" => "245",
            "altitud" => "201",
            "latitud" => "-5.3194",
            "longitud" => "-79.7861"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1601,
            "ubigeo_reniec" => "190406",
            "ubigeo_inei" => "200408",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "SANTA CATALINA DE MOSSA",
            "region" => "PIURA",
            "superficie" => "77",
            "altitud" => "881",
            "latitud" => "-5.1028",
            "longitud" => "-79.885"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1602,
            "ubigeo_reniec" => "190407",
            "ubigeo_inei" => "200409",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "SANTO DOMINGO",
            "region" => "PIURA",
            "superficie" => "187",
            "altitud" => "1490",
            "latitud" => "-5.0294",
            "longitud" => "-79.8758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1603,
            "ubigeo_reniec" => "190409",
            "ubigeo_inei" => "200410",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2004",
            "provincia" => "MORROPON",
            "distrito" => "YAMANGO",
            "region" => "PIURA",
            "superficie" => "217",
            "altitud" => "1192",
            "latitud" => "-5.1808",
            "longitud" => "-79.7511"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1604,
            "ubigeo_reniec" => "190501",
            "ubigeo_inei" => "200501",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "PAITA",
            "region" => "PIURA",
            "superficie" => "706",
            "altitud" => "71",
            "latitud" => "-5.0931",
            "longitud" => "-81.0994"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1605,
            "ubigeo_reniec" => "190502",
            "ubigeo_inei" => "200502",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "AMOTAPE",
            "region" => "PIURA",
            "superficie" => "91",
            "altitud" => "23",
            "latitud" => "-4.8819",
            "longitud" => "-81.0153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1606,
            "ubigeo_reniec" => "190503",
            "ubigeo_inei" => "200503",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "ARENAL",
            "region" => "PIURA",
            "superficie" => "8",
            "altitud" => "37",
            "latitud" => "-4.8836",
            "longitud" => "-81.0264"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1607,
            "ubigeo_reniec" => "190505",
            "ubigeo_inei" => "200504",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "COLAN",
            "region" => "PIURA",
            "superficie" => "125",
            "altitud" => "25",
            "latitud" => "-4.9006",
            "longitud" => "-81.0564"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1608,
            "ubigeo_reniec" => "190504",
            "ubigeo_inei" => "200505",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "LA HUACA",
            "region" => "PIURA",
            "superficie" => "600",
            "altitud" => "33",
            "latitud" => "-4.9103",
            "longitud" => "-80.9614"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1609,
            "ubigeo_reniec" => "190506",
            "ubigeo_inei" => "200506",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "TAMARINDO",
            "region" => "PIURA",
            "superficie" => "64",
            "altitud" => "33",
            "latitud" => "-4.8783",
            "longitud" => "-80.9758"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1610,
            "ubigeo_reniec" => "190507",
            "ubigeo_inei" => "200507",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2005",
            "provincia" => "PAITA",
            "distrito" => "VICHAYAL",
            "region" => "PIURA",
            "superficie" => "134",
            "altitud" => "27",
            "latitud" => "-4.8642",
            "longitud" => "-81.0731"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1611,
            "ubigeo_reniec" => "190601",
            "ubigeo_inei" => "200601",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "SULLANA",
            "region" => "PIURA",
            "superficie" => "530",
            "altitud" => "76",
            "latitud" => "-4.8906",
            "longitud" => "-80.6878"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1612,
            "ubigeo_reniec" => "190602",
            "ubigeo_inei" => "200602",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "BELLAVISTA",
            "region" => "PIURA",
            "superficie" => "3",
            "altitud" => "77",
            "latitud" => "-4.89",
            "longitud" => "-80.6803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1613,
            "ubigeo_reniec" => "190608",
            "ubigeo_inei" => "200603",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "IGNACIO ESCUDERO",
            "region" => "PIURA",
            "superficie" => "307",
            "altitud" => "39",
            "latitud" => "-4.8461",
            "longitud" => "-80.8731"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1614,
            "ubigeo_reniec" => "190603",
            "ubigeo_inei" => "200604",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "LANCONES",
            "region" => "PIURA",
            "superficie" => "2153",
            "altitud" => "156",
            "latitud" => "-4.6328",
            "longitud" => "-80.5456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1615,
            "ubigeo_reniec" => "190604",
            "ubigeo_inei" => "200605",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "MARCAVELICA",
            "region" => "PIURA",
            "superficie" => "1688",
            "altitud" => "53",
            "latitud" => "-4.8817",
            "longitud" => "-80.7036"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1616,
            "ubigeo_reniec" => "190605",
            "ubigeo_inei" => "200606",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "MIGUEL CHECA",
            "region" => "PIURA",
            "superficie" => "480",
            "altitud" => "62",
            "latitud" => "-4.9003",
            "longitud" => "-80.8147"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1617,
            "ubigeo_reniec" => "190606",
            "ubigeo_inei" => "200607",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "QUERECOTILLO",
            "region" => "PIURA",
            "superficie" => "270",
            "altitud" => "66",
            "latitud" => "-4.8392",
            "longitud" => "-80.6483"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1618,
            "ubigeo_reniec" => "190607",
            "ubigeo_inei" => "200608",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2006",
            "provincia" => "SULLANA",
            "distrito" => "SALITRAL",
            "region" => "PIURA",
            "superficie" => "28",
            "altitud" => "65",
            "latitud" => "-4.8569",
            "longitud" => "-80.6808"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1619,
            "ubigeo_reniec" => "190701",
            "ubigeo_inei" => "200701",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "PARIŃAS",
            "region" => "PIURA",
            "superficie" => "1117",
            "altitud" => "23",
            "latitud" => "-4.5794",
            "longitud" => "-81.2694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1620,
            "ubigeo_reniec" => "190702",
            "ubigeo_inei" => "200702",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "EL ALTO",
            "region" => "PIURA",
            "superficie" => "491",
            "altitud" => "276",
            "latitud" => "-4.2686",
            "longitud" => "-81.2214"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1621,
            "ubigeo_reniec" => "190703",
            "ubigeo_inei" => "200703",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "LA BREA",
            "region" => "PIURA",
            "superficie" => "693",
            "altitud" => "8",
            "latitud" => "-4.6547",
            "longitud" => "-81.3058"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1622,
            "ubigeo_reniec" => "190704",
            "ubigeo_inei" => "200704",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "LOBITOS",
            "region" => "PIURA",
            "superficie" => "233",
            "altitud" => "31",
            "latitud" => "-4.4569",
            "longitud" => "-81.285"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1623,
            "ubigeo_reniec" => "190706",
            "ubigeo_inei" => "200705",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "LOS ORGANOS",
            "region" => "PIURA",
            "superficie" => "165",
            "altitud" => "7",
            "latitud" => "-4.1792",
            "longitud" => "-81.1294"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1624,
            "ubigeo_reniec" => "190705",
            "ubigeo_inei" => "200706",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2007",
            "provincia" => "TALARA",
            "distrito" => "MANCORA",
            "region" => "PIURA",
            "superficie" => "100",
            "altitud" => "8",
            "latitud" => "-4.1069",
            "longitud" => "-81.0539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1625,
            "ubigeo_reniec" => "190801",
            "ubigeo_inei" => "200801",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "SECHURA",
            "region" => "PIURA",
            "superficie" => "5711",
            "altitud" => "12",
            "latitud" => "-5.5572",
            "longitud" => "-80.8222"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1626,
            "ubigeo_reniec" => "190804",
            "ubigeo_inei" => "200802",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "BELLAVISTA DE LA UNION",
            "region" => "PIURA",
            "superficie" => "14",
            "altitud" => "23",
            "latitud" => "-5.4403",
            "longitud" => "-80.755"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1627,
            "ubigeo_reniec" => "190803",
            "ubigeo_inei" => "200803",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "BERNAL",
            "region" => "PIURA",
            "superficie" => "72",
            "altitud" => "22",
            "latitud" => "-5.4589",
            "longitud" => "-80.7419"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1628,
            "ubigeo_reniec" => "190805",
            "ubigeo_inei" => "200804",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "CRISTO NOS VALGA",
            "region" => "PIURA",
            "superficie" => "234",
            "altitud" => "25",
            "latitud" => "-5.4931",
            "longitud" => "-80.7411"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1629,
            "ubigeo_reniec" => "190802",
            "ubigeo_inei" => "200805",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "VICE",
            "region" => "PIURA",
            "superficie" => "261",
            "altitud" => "23",
            "latitud" => "-5.4222",
            "longitud" => "-80.7764"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1630,
            "ubigeo_reniec" => "190806",
            "ubigeo_inei" => "200806",
            "departamento_inei" => "20",
            "departamento" => "PIURA",
            "provincia_inei" => "2008",
            "provincia" => "SECHURA",
            "distrito" => "RINCONADA LLICUAR",
            "region" => "PIURA",
            "superficie" => "19",
            "altitud" => "26",
            "latitud" => "-5.4636",
            "longitud" => "-80.7653"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1631,
            "ubigeo_reniec" => "200101",
            "ubigeo_inei" => "210101",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "PUNO",
            "region" => "PUNO",
            "superficie" => "461",
            "altitud" => "3848",
            "latitud" => "-15.8403",
            "longitud" => "-70.0281"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1632,
            "ubigeo_reniec" => "200102",
            "ubigeo_inei" => "210102",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "ACORA",
            "region" => "PUNO",
            "superficie" => "1941",
            "altitud" => "3848",
            "latitud" => "-15.9736",
            "longitud" => "-69.7978"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1633,
            "ubigeo_reniec" => "200115",
            "ubigeo_inei" => "210103",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "AMANTANI",
            "region" => "PUNO",
            "superficie" => "15",
            "altitud" => "3871",
            "latitud" => "-15.6572",
            "longitud" => "-69.7183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1634,
            "ubigeo_reniec" => "200103",
            "ubigeo_inei" => "210104",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "ATUNCOLLA",
            "region" => "PUNO",
            "superficie" => "125",
            "altitud" => "3844",
            "latitud" => "-15.6883",
            "longitud" => "-70.1439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1635,
            "ubigeo_reniec" => "200104",
            "ubigeo_inei" => "210105",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "CAPACHICA",
            "region" => "PUNO",
            "superficie" => "117",
            "altitud" => "3872",
            "latitud" => "-15.6417",
            "longitud" => "-69.8308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1636,
            "ubigeo_reniec" => "200106",
            "ubigeo_inei" => "210106",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "CHUCUITO",
            "region" => "PUNO",
            "superficie" => "121",
            "altitud" => "3893",
            "latitud" => "-15.8947",
            "longitud" => "-69.8894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1637,
            "ubigeo_reniec" => "200105",
            "ubigeo_inei" => "210107",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "COATA",
            "region" => "PUNO",
            "superficie" => "104",
            "altitud" => "3839",
            "latitud" => "-15.5714",
            "longitud" => "-69.9506"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1638,
            "ubigeo_reniec" => "200107",
            "ubigeo_inei" => "210108",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "HUATA",
            "region" => "PUNO",
            "superficie" => "130",
            "altitud" => "3863",
            "latitud" => "-15.615",
            "longitud" => "-69.9714"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1639,
            "ubigeo_reniec" => "200108",
            "ubigeo_inei" => "210109",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "MAŃAZO",
            "region" => "PUNO",
            "superficie" => "411",
            "altitud" => "3949",
            "latitud" => "-15.8011",
            "longitud" => "-70.3433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1640,
            "ubigeo_reniec" => "200109",
            "ubigeo_inei" => "210110",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "PAUCARCOLLA",
            "region" => "PUNO",
            "superficie" => "170",
            "altitud" => "3864",
            "latitud" => "-15.7456",
            "longitud" => "-70.0561"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1641,
            "ubigeo_reniec" => "200110",
            "ubigeo_inei" => "210111",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "PICHACANI",
            "region" => "PUNO",
            "superficie" => "1633",
            "altitud" => "3962",
            "latitud" => "-16.15",
            "longitud" => "-70.0633"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1642,
            "ubigeo_reniec" => "200114",
            "ubigeo_inei" => "210112",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "PLATERIA",
            "region" => "PUNO",
            "superficie" => "239",
            "altitud" => "3835",
            "latitud" => "-15.9483",
            "longitud" => "-69.8333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1643,
            "ubigeo_reniec" => "200111",
            "ubigeo_inei" => "210113",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "SAN ANTONIO",
            "region" => "PUNO",
            "superficie" => "377",
            "altitud" => "4330",
            "latitud" => "-16.1406",
            "longitud" => "-70.3439"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1644,
            "ubigeo_reniec" => "200112",
            "ubigeo_inei" => "210114",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "TIQUILLACA",
            "region" => "PUNO",
            "superficie" => "456",
            "altitud" => "3912",
            "latitud" => "-15.7969",
            "longitud" => "-70.1867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1645,
            "ubigeo_reniec" => "200113",
            "ubigeo_inei" => "210115",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2101",
            "provincia" => "PUNO",
            "distrito" => "VILQUE",
            "region" => "PUNO",
            "superficie" => "193",
            "altitud" => "3878",
            "latitud" => "-15.7667",
            "longitud" => "-70.2589"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1646,
            "ubigeo_reniec" => "200201",
            "ubigeo_inei" => "210201",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "AZANGARO",
            "region" => "PUNO",
            "superficie" => "706",
            "altitud" => "3878",
            "latitud" => "-14.9081",
            "longitud" => "-70.1956"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1647,
            "ubigeo_reniec" => "200202",
            "ubigeo_inei" => "210202",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "ACHAYA",
            "region" => "PUNO",
            "superficie" => "132",
            "altitud" => "3868",
            "latitud" => "-15.2847",
            "longitud" => "-70.1611"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1648,
            "ubigeo_reniec" => "200203",
            "ubigeo_inei" => "210203",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "ARAPA",
            "region" => "PUNO",
            "superficie" => "330",
            "altitud" => "3846",
            "latitud" => "-15.1389",
            "longitud" => "-70.11"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1649,
            "ubigeo_reniec" => "200204",
            "ubigeo_inei" => "210204",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "ASILLO",
            "region" => "PUNO",
            "superficie" => "392",
            "altitud" => "3927",
            "latitud" => "-14.7864",
            "longitud" => "-70.3536"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1650,
            "ubigeo_reniec" => "200205",
            "ubigeo_inei" => "210205",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "CAMINACA",
            "region" => "PUNO",
            "superficie" => "147",
            "altitud" => "3857",
            "latitud" => "-15.3247",
            "longitud" => "-70.0728"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1651,
            "ubigeo_reniec" => "200206",
            "ubigeo_inei" => "210206",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "CHUPA",
            "region" => "PUNO",
            "superficie" => "143",
            "altitud" => "3847",
            "latitud" => "-15.1058",
            "longitud" => "-69.9872"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1652,
            "ubigeo_reniec" => "200207",
            "ubigeo_inei" => "210207",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "JOSE DOMINGO CHOQUEHUANCA",
            "region" => "PUNO",
            "superficie" => "70",
            "altitud" => "3887",
            "latitud" => "-15.0339",
            "longitud" => "-70.3381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1653,
            "ubigeo_reniec" => "200208",
            "ubigeo_inei" => "210208",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "MUŃANI",
            "region" => "PUNO",
            "superficie" => "764",
            "altitud" => "3925",
            "latitud" => "-14.7708",
            "longitud" => "-69.9556"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1654,
            "ubigeo_reniec" => "200210",
            "ubigeo_inei" => "210209",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "POTONI",
            "region" => "PUNO",
            "superficie" => "603",
            "altitud" => "4133",
            "latitud" => "-14.39",
            "longitud" => "-70.105"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1655,
            "ubigeo_reniec" => "200212",
            "ubigeo_inei" => "210210",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "SAMAN",
            "region" => "PUNO",
            "superficie" => "189",
            "altitud" => "3836",
            "latitud" => "-15.2919",
            "longitud" => "-70.0172"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1656,
            "ubigeo_reniec" => "200213",
            "ubigeo_inei" => "210211",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "SAN ANTON",
            "region" => "PUNO",
            "superficie" => "515",
            "altitud" => "3971",
            "latitud" => "-14.5839",
            "longitud" => "-70.3172"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1657,
            "ubigeo_reniec" => "200214",
            "ubigeo_inei" => "210212",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "SAN JOSE",
            "region" => "PUNO",
            "superficie" => "373",
            "altitud" => "4094",
            "latitud" => "-14.6803",
            "longitud" => "-70.16"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1658,
            "ubigeo_reniec" => "200215",
            "ubigeo_inei" => "210213",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "SAN JUAN DE SALINAS",
            "region" => "PUNO",
            "superficie" => "106",
            "altitud" => "3841",
            "latitud" => "-14.9914",
            "longitud" => "-70.1061"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1659,
            "ubigeo_reniec" => "200216",
            "ubigeo_inei" => "210214",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "SANTIAGO DE PUPUJA",
            "region" => "PUNO",
            "superficie" => "301",
            "altitud" => "3933",
            "latitud" => "-15.0528",
            "longitud" => "-70.2781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1660,
            "ubigeo_reniec" => "200217",
            "ubigeo_inei" => "210215",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2102",
            "provincia" => "AZANGARO",
            "distrito" => "TIRAPATA",
            "region" => "PUNO",
            "superficie" => "199",
            "altitud" => "3903",
            "latitud" => "-14.955",
            "longitud" => "-70.4028"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1661,
            "ubigeo_reniec" => "200301",
            "ubigeo_inei" => "210301",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "MACUSANI",
            "region" => "PUNO",
            "superficie" => "1030",
            "altitud" => "4311",
            "latitud" => "-14.0686",
            "longitud" => "-70.4311"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1662,
            "ubigeo_reniec" => "200302",
            "ubigeo_inei" => "210302",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "AJOYANI",
            "region" => "PUNO",
            "superficie" => "413",
            "altitud" => "4272",
            "latitud" => "-14.2294",
            "longitud" => "-70.2236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1663,
            "ubigeo_reniec" => "200303",
            "ubigeo_inei" => "210303",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "AYAPATA",
            "region" => "PUNO",
            "superficie" => "1092",
            "altitud" => "3481",
            "latitud" => "-13.7767",
            "longitud" => "-70.3228"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1664,
            "ubigeo_reniec" => "200304",
            "ubigeo_inei" => "210304",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "COASA",
            "region" => "PUNO",
            "superficie" => "3573",
            "altitud" => "3768",
            "latitud" => "-13.9892",
            "longitud" => "-70.0158"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1665,
            "ubigeo_reniec" => "200305",
            "ubigeo_inei" => "210305",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "CORANI",
            "region" => "PUNO",
            "superficie" => "853",
            "altitud" => "4039",
            "latitud" => "-13.8686",
            "longitud" => "-70.6044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1666,
            "ubigeo_reniec" => "200306",
            "ubigeo_inei" => "210306",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "CRUCERO",
            "region" => "PUNO",
            "superficie" => "836",
            "altitud" => "4146",
            "latitud" => "-14.3617",
            "longitud" => "-70.0236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1667,
            "ubigeo_reniec" => "200307",
            "ubigeo_inei" => "210307",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "ITUATA",
            "region" => "PUNO",
            "superficie" => "1201",
            "altitud" => "3787",
            "latitud" => "-13.8764",
            "longitud" => "-70.2139"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1668,
            "ubigeo_reniec" => "200308",
            "ubigeo_inei" => "210308",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "OLLACHEA",
            "region" => "PUNO",
            "superficie" => "596",
            "altitud" => "2746",
            "latitud" => "-13.7939",
            "longitud" => "-70.4725"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1669,
            "ubigeo_reniec" => "200309",
            "ubigeo_inei" => "210309",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "SAN GABAN",
            "region" => "PUNO",
            "superficie" => "2029",
            "altitud" => "641",
            "latitud" => "-13.4383",
            "longitud" => "-70.4028"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1670,
            "ubigeo_reniec" => "200310",
            "ubigeo_inei" => "210310",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2103",
            "provincia" => "CARABAYA",
            "distrito" => "USICAYOS",
            "region" => "PUNO",
            "superficie" => "644",
            "altitud" => "3781",
            "latitud" => "-14.1253",
            "longitud" => "-69.9675"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1671,
            "ubigeo_reniec" => "200401",
            "ubigeo_inei" => "210401",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "JULI",
            "region" => "PUNO",
            "superficie" => "720",
            "altitud" => "3878",
            "latitud" => "-16.2128",
            "longitud" => "-69.4594"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1672,
            "ubigeo_reniec" => "200402",
            "ubigeo_inei" => "210402",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "DESAGUADERO",
            "region" => "PUNO",
            "superficie" => "178",
            "altitud" => "3849",
            "latitud" => "-16.5644",
            "longitud" => "-69.0394"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1673,
            "ubigeo_reniec" => "200403",
            "ubigeo_inei" => "210403",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "HUACULLANI",
            "region" => "PUNO",
            "superficie" => "705",
            "altitud" => "3945",
            "latitud" => "-16.6306",
            "longitud" => "-69.3219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1674,
            "ubigeo_reniec" => "200412",
            "ubigeo_inei" => "210404",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "KELLUYO",
            "region" => "PUNO",
            "superficie" => "486",
            "altitud" => "3858",
            "latitud" => "-16.7269",
            "longitud" => "-69.2503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1675,
            "ubigeo_reniec" => "200406",
            "ubigeo_inei" => "210405",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "PISACOMA",
            "region" => "PUNO",
            "superficie" => "959",
            "altitud" => "3932",
            "latitud" => "-16.9086",
            "longitud" => "-69.3714"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1676,
            "ubigeo_reniec" => "200407",
            "ubigeo_inei" => "210406",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "POMATA",
            "region" => "PUNO",
            "superficie" => "383",
            "altitud" => "3878",
            "latitud" => "-16.2736",
            "longitud" => "-69.2928"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1677,
            "ubigeo_reniec" => "200410",
            "ubigeo_inei" => "210407",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2104",
            "provincia" => "CHUCUITO",
            "distrito" => "ZEPITA",
            "region" => "PUNO",
            "superficie" => "547",
            "altitud" => "3836",
            "latitud" => "-16.4969",
            "longitud" => "-69.1033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1678,
            "ubigeo_reniec" => "201201",
            "ubigeo_inei" => "210501",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2105",
            "provincia" => "EL COLLAO",
            "distrito" => "ILAVE",
            "region" => "PUNO",
            "superficie" => "875",
            "altitud" => "3907",
            "latitud" => "-16.0869",
            "longitud" => "-69.6381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1679,
            "ubigeo_reniec" => "201204",
            "ubigeo_inei" => "210502",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2105",
            "provincia" => "EL COLLAO",
            "distrito" => "CAPAZO",
            "region" => "PUNO",
            "superficie" => "1039",
            "altitud" => "4402",
            "latitud" => "-17.1839",
            "longitud" => "-69.7444"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1680,
            "ubigeo_reniec" => "201202",
            "ubigeo_inei" => "210503",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2105",
            "provincia" => "EL COLLAO",
            "distrito" => "PILCUYO",
            "region" => "PUNO",
            "superficie" => "157",
            "altitud" => "3841",
            "latitud" => "-16.1108",
            "longitud" => "-69.5542"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1681,
            "ubigeo_reniec" => "201203",
            "ubigeo_inei" => "210504",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2105",
            "provincia" => "EL COLLAO",
            "distrito" => "SANTA ROSA",
            "region" => "PUNO",
            "superficie" => "2524",
            "altitud" => "3981",
            "latitud" => "-16.7422",
            "longitud" => "-69.7167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1682,
            "ubigeo_reniec" => "201205",
            "ubigeo_inei" => "210505",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2105",
            "provincia" => "EL COLLAO",
            "distrito" => "CONDURIRI",
            "region" => "PUNO",
            "superficie" => "1006",
            "altitud" => "3969",
            "latitud" => "-16.6219",
            "longitud" => "-69.7086"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1683,
            "ubigeo_reniec" => "200501",
            "ubigeo_inei" => "210601",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "HUANCANE",
            "region" => "PUNO",
            "superficie" => "382",
            "altitud" => "3866",
            "latitud" => "-15.2008",
            "longitud" => "-69.7678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1684,
            "ubigeo_reniec" => "200502",
            "ubigeo_inei" => "210602",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "COJATA",
            "region" => "PUNO",
            "superficie" => "881",
            "altitud" => "4354",
            "latitud" => "-15.0153",
            "longitud" => "-69.3656"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1685,
            "ubigeo_reniec" => "200511",
            "ubigeo_inei" => "210603",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "HUATASANI",
            "region" => "PUNO",
            "superficie" => "107",
            "altitud" => "3849",
            "latitud" => "-15.0594",
            "longitud" => "-69.8019"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1686,
            "ubigeo_reniec" => "200504",
            "ubigeo_inei" => "210604",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "INCHUPALLA",
            "region" => "PUNO",
            "superficie" => "289",
            "altitud" => "3930",
            "latitud" => "-15.0097",
            "longitud" => "-69.6828"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1687,
            "ubigeo_reniec" => "200506",
            "ubigeo_inei" => "210605",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "PUSI",
            "region" => "PUNO",
            "superficie" => "148",
            "altitud" => "3851",
            "latitud" => "-15.4419",
            "longitud" => "-69.9297"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1688,
            "ubigeo_reniec" => "200507",
            "ubigeo_inei" => "210606",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "ROSASPATA",
            "region" => "PUNO",
            "superficie" => "301",
            "altitud" => "3891",
            "latitud" => "-15.2347",
            "longitud" => "-69.5275"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1689,
            "ubigeo_reniec" => "200508",
            "ubigeo_inei" => "210607",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "TARACO",
            "region" => "PUNO",
            "superficie" => "198",
            "altitud" => "3848",
            "latitud" => "-15.2972",
            "longitud" => "-69.9783"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1690,
            "ubigeo_reniec" => "200509",
            "ubigeo_inei" => "210608",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2106",
            "provincia" => "HUANCANE",
            "distrito" => "VILQUE CHICO",
            "region" => "PUNO",
            "superficie" => "499",
            "altitud" => "3851",
            "latitud" => "-15.2139",
            "longitud" => "-69.6892"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1691,
            "ubigeo_reniec" => "200601",
            "ubigeo_inei" => "210701",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "LAMPA",
            "region" => "PUNO",
            "superficie" => "676",
            "altitud" => "3881",
            "latitud" => "-15.3647",
            "longitud" => "-70.3678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1692,
            "ubigeo_reniec" => "200602",
            "ubigeo_inei" => "210702",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "CABANILLA",
            "region" => "PUNO",
            "superficie" => "443",
            "altitud" => "3890",
            "latitud" => "-15.6203",
            "longitud" => "-70.3456"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1693,
            "ubigeo_reniec" => "200603",
            "ubigeo_inei" => "210703",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "CALAPUJA",
            "region" => "PUNO",
            "superficie" => "141",
            "altitud" => "3851",
            "latitud" => "-15.3106",
            "longitud" => "-70.2217"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1694,
            "ubigeo_reniec" => "200604",
            "ubigeo_inei" => "210704",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "NICASIO",
            "region" => "PUNO",
            "superficie" => "134",
            "altitud" => "3868",
            "latitud" => "-15.2356",
            "longitud" => "-70.2611"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1695,
            "ubigeo_reniec" => "200605",
            "ubigeo_inei" => "210705",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "OCUVIRI",
            "region" => "PUNO",
            "superficie" => "878",
            "altitud" => "4227",
            "latitud" => "-15.1139",
            "longitud" => "-70.9092"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1696,
            "ubigeo_reniec" => "200606",
            "ubigeo_inei" => "210706",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "PALCA",
            "region" => "PUNO",
            "superficie" => "484",
            "altitud" => "4082",
            "latitud" => "-15.2369",
            "longitud" => "-70.5981"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1697,
            "ubigeo_reniec" => "200607",
            "ubigeo_inei" => "210707",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "PARATIA",
            "region" => "PUNO",
            "superficie" => "745",
            "altitud" => "4352",
            "latitud" => "-15.4542",
            "longitud" => "-70.5997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1698,
            "ubigeo_reniec" => "200608",
            "ubigeo_inei" => "210708",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "PUCARA",
            "region" => "PUNO",
            "superficie" => "538",
            "altitud" => "3894",
            "latitud" => "-15.0417",
            "longitud" => "-70.3678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1699,
            "ubigeo_reniec" => "200609",
            "ubigeo_inei" => "210709",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "SANTA LUCIA",
            "region" => "PUNO",
            "superficie" => "1596",
            "altitud" => "4053",
            "latitud" => "-15.6994",
            "longitud" => "-70.6064"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1700,
            "ubigeo_reniec" => "200610",
            "ubigeo_inei" => "210710",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2107",
            "provincia" => "LAMPA",
            "distrito" => "VILAVILA",
            "region" => "PUNO",
            "superficie" => "157",
            "altitud" => "4316",
            "latitud" => "-15.1883",
            "longitud" => "-70.66"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1701,
            "ubigeo_reniec" => "200701",
            "ubigeo_inei" => "210801",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "AYAVIRI",
            "region" => "PUNO",
            "superficie" => "1013",
            "altitud" => "3937",
            "latitud" => "-14.8817",
            "longitud" => "-70.5894"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1702,
            "ubigeo_reniec" => "200702",
            "ubigeo_inei" => "210802",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "ANTAUTA",
            "region" => "PUNO",
            "superficie" => "636",
            "altitud" => "4152",
            "latitud" => "-14.2997",
            "longitud" => "-70.2922"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1703,
            "ubigeo_reniec" => "200703",
            "ubigeo_inei" => "210803",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "CUPI",
            "region" => "PUNO",
            "superficie" => "214",
            "altitud" => "3984",
            "latitud" => "-14.905",
            "longitud" => "-70.8667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1704,
            "ubigeo_reniec" => "200704",
            "ubigeo_inei" => "210804",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "LLALLI",
            "region" => "PUNO",
            "superficie" => "216",
            "altitud" => "3998",
            "latitud" => "-14.9481",
            "longitud" => "-70.8806"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1705,
            "ubigeo_reniec" => "200705",
            "ubigeo_inei" => "210805",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "MACARI",
            "region" => "PUNO",
            "superficie" => "674",
            "altitud" => "3979",
            "latitud" => "-14.7717",
            "longitud" => "-70.9033"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1706,
            "ubigeo_reniec" => "200706",
            "ubigeo_inei" => "210806",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "NUŃOA",
            "region" => "PUNO",
            "superficie" => "2200",
            "altitud" => "4038",
            "latitud" => "-14.4761",
            "longitud" => "-70.6364"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1707,
            "ubigeo_reniec" => "200707",
            "ubigeo_inei" => "210807",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "ORURILLO",
            "region" => "PUNO",
            "superficie" => "379",
            "altitud" => "3915",
            "latitud" => "-14.7278",
            "longitud" => "-70.5122"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1708,
            "ubigeo_reniec" => "200708",
            "ubigeo_inei" => "210808",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "SANTA ROSA",
            "region" => "PUNO",
            "superficie" => "790",
            "altitud" => "4010",
            "latitud" => "-14.6075",
            "longitud" => "-70.7878"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1709,
            "ubigeo_reniec" => "200709",
            "ubigeo_inei" => "210809",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2108",
            "provincia" => "MELGAR",
            "distrito" => "UMACHIRI",
            "region" => "PUNO",
            "superficie" => "324",
            "altitud" => "3943",
            "latitud" => "-14.8539",
            "longitud" => "-70.7539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1710,
            "ubigeo_reniec" => "201301",
            "ubigeo_inei" => "210901",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2109",
            "provincia" => "MOHO",
            "distrito" => "MOHO",
            "region" => "PUNO",
            "superficie" => "494",
            "altitud" => "3902",
            "latitud" => "-15.3603",
            "longitud" => "-69.4997"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1711,
            "ubigeo_reniec" => "201302",
            "ubigeo_inei" => "210902",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2109",
            "provincia" => "MOHO",
            "distrito" => "CONIMA",
            "region" => "PUNO",
            "superficie" => "73",
            "altitud" => "3862",
            "latitud" => "-15.4578",
            "longitud" => "-69.4378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1712,
            "ubigeo_reniec" => "201304",
            "ubigeo_inei" => "210903",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2109",
            "provincia" => "MOHO",
            "distrito" => "HUAYRAPATA",
            "region" => "PUNO",
            "superficie" => "388",
            "altitud" => "3912",
            "latitud" => "-15.3214",
            "longitud" => "-69.3411"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1713,
            "ubigeo_reniec" => "201303",
            "ubigeo_inei" => "210904",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2109",
            "provincia" => "MOHO",
            "distrito" => "TILALI",
            "region" => "PUNO",
            "superficie" => "48",
            "altitud" => "3843",
            "latitud" => "-15.515",
            "longitud" => "-69.3481"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1714,
            "ubigeo_reniec" => "201101",
            "ubigeo_inei" => "211001",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2110",
            "provincia" => "SAN ANTONIO DE PUTINA",
            "distrito" => "PUTINA",
            "region" => "PUNO",
            "superficie" => "1022",
            "altitud" => "3878",
            "latitud" => "-14.9142",
            "longitud" => "-69.8689"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1715,
            "ubigeo_reniec" => "201104",
            "ubigeo_inei" => "211002",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2110",
            "provincia" => "SAN ANTONIO DE PUTINA",
            "distrito" => "ANANEA",
            "region" => "PUNO",
            "superficie" => "940",
            "altitud" => "4705",
            "latitud" => "-14.6786",
            "longitud" => "-69.535"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1716,
            "ubigeo_reniec" => "201102",
            "ubigeo_inei" => "211003",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2110",
            "provincia" => "SAN ANTONIO DE PUTINA",
            "distrito" => "PEDRO VILCA APAZA",
            "region" => "PUNO",
            "superficie" => "566",
            "altitud" => "3873",
            "latitud" => "-15.0636",
            "longitud" => "-69.8817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1717,
            "ubigeo_reniec" => "201103",
            "ubigeo_inei" => "211004",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2110",
            "provincia" => "SAN ANTONIO DE PUTINA",
            "distrito" => "QUILCAPUNCU",
            "region" => "PUNO",
            "superficie" => "517",
            "altitud" => "3928",
            "latitud" => "-14.8936",
            "longitud" => "-69.7303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1718,
            "ubigeo_reniec" => "201105",
            "ubigeo_inei" => "211005",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2110",
            "provincia" => "SAN ANTONIO DE PUTINA",
            "distrito" => "SINA",
            "region" => "PUNO",
            "superficie" => "163",
            "altitud" => "3181",
            "latitud" => "-14.4967",
            "longitud" => "-69.2803"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1719,
            "ubigeo_reniec" => "200901",
            "ubigeo_inei" => "211101",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2111",
            "provincia" => "SAN ROMAN",
            "distrito" => "JULIACA",
            "region" => "PUNO",
            "superficie" => "534",
            "altitud" => "3877",
            "latitud" => "-15.4839",
            "longitud" => "-70.1333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1720,
            "ubigeo_reniec" => "200902",
            "ubigeo_inei" => "211102",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2111",
            "provincia" => "SAN ROMAN",
            "distrito" => "CABANA",
            "region" => "PUNO",
            "superficie" => "191",
            "altitud" => "3912",
            "latitud" => "-15.6492",
            "longitud" => "-70.3219"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1721,
            "ubigeo_reniec" => "200903",
            "ubigeo_inei" => "211103",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2111",
            "provincia" => "SAN ROMAN",
            "distrito" => "CABANILLAS",
            "region" => "PUNO",
            "superficie" => "1267",
            "altitud" => "3894",
            "latitud" => "-15.6444",
            "longitud" => "-70.3539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1722,
            "ubigeo_reniec" => "200904",
            "ubigeo_inei" => "211104",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2111",
            "provincia" => "SAN ROMAN",
            "distrito" => "CARACOTO",
            "region" => "PUNO",
            "superficie" => "286",
            "altitud" => "3844",
            "latitud" => "-15.5675",
            "longitud" => "-70.1025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1723,
            "ubigeo_reniec" => "200905",
            "ubigeo_inei" => "211105",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2111",
            "provincia" => "SAN ROMAN",
            "distrito" => "SAN MIGUEL",
            "region" => "PUNO",
            "superficie" => "122",
            "altitud" => "3875",
            "latitud" => "-15.4603",
            "longitud" => "-70.1269"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1724,
            "ubigeo_reniec" => "200801",
            "ubigeo_inei" => "211201",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "SANDIA",
            "region" => "PUNO",
            "superficie" => "580",
            "altitud" => "2206",
            "latitud" => "-14.3222",
            "longitud" => "-69.4664"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1725,
            "ubigeo_reniec" => "200803",
            "ubigeo_inei" => "211202",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "CUYOCUYO",
            "region" => "PUNO",
            "superficie" => "504",
            "altitud" => "3425",
            "latitud" => "-14.4703",
            "longitud" => "-69.5372"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1726,
            "ubigeo_reniec" => "200804",
            "ubigeo_inei" => "211203",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "LIMBANI",
            "region" => "PUNO",
            "superficie" => "2112",
            "altitud" => "3333",
            "latitud" => "-14.1497",
            "longitud" => "-69.6906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1727,
            "ubigeo_reniec" => "200806",
            "ubigeo_inei" => "211204",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "PATAMBUCO",
            "region" => "PUNO",
            "superficie" => "463",
            "altitud" => "3650",
            "latitud" => "-14.3617",
            "longitud" => "-69.6194"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1728,
            "ubigeo_reniec" => "200805",
            "ubigeo_inei" => "211205",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "PHARA",
            "region" => "PUNO",
            "superficie" => "401",
            "altitud" => "3485",
            "latitud" => "-14.1519",
            "longitud" => "-69.6653"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1729,
            "ubigeo_reniec" => "200807",
            "ubigeo_inei" => "211206",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "QUIACA",
            "region" => "PUNO",
            "superficie" => "448",
            "altitud" => "2970",
            "latitud" => "-14.4222",
            "longitud" => "-69.345"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1730,
            "ubigeo_reniec" => "200808",
            "ubigeo_inei" => "211207",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "SAN JUAN DEL ORO",
            "region" => "PUNO",
            "superficie" => "197",
            "altitud" => "1308",
            "latitud" => "-14.2208",
            "longitud" => "-69.1536"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1731,
            "ubigeo_reniec" => "200810",
            "ubigeo_inei" => "211208",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "YANAHUAYA",
            "region" => "PUNO",
            "superficie" => "671",
            "altitud" => "1419",
            "latitud" => "-14.2586",
            "longitud" => "-69.1694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1732,
            "ubigeo_reniec" => "200811",
            "ubigeo_inei" => "211209",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "ALTO INAMBARI",
            "region" => "PUNO",
            "superficie" => "1125",
            "altitud" => "1352",
            "latitud" => "-14.09",
            "longitud" => "-69.2433"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1733,
            "ubigeo_reniec" => "200812",
            "ubigeo_inei" => "211210",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2112",
            "provincia" => "SANDIA",
            "distrito" => "SAN PEDRO DE PUTINA PUNCO",
            "region" => "PUNO",
            "superficie" => "5362",
            "altitud" => "948",
            "latitud" => "-14.1125",
            "longitud" => "-69.0478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1734,
            "ubigeo_reniec" => "201001",
            "ubigeo_inei" => "211301",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "YUNGUYO",
            "region" => "PUNO",
            "superficie" => "171",
            "altitud" => "3850",
            "latitud" => "-16.2267",
            "longitud" => "-69.0956"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1735,
            "ubigeo_reniec" => "201003",
            "ubigeo_inei" => "211302",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "ANAPIA",
            "region" => "PUNO",
            "superficie" => "10",
            "altitud" => "3864",
            "latitud" => "-16.3139",
            "longitud" => "-68.8528"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1736,
            "ubigeo_reniec" => "201004",
            "ubigeo_inei" => "211303",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "COPANI",
            "region" => "PUNO",
            "superficie" => "47",
            "altitud" => "3864",
            "latitud" => "-16.4",
            "longitud" => "-69.0403"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1737,
            "ubigeo_reniec" => "201005",
            "ubigeo_inei" => "211304",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "CUTURAPI",
            "region" => "PUNO",
            "superficie" => "22",
            "altitud" => "3861",
            "latitud" => "-16.2706",
            "longitud" => "-69.1769"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1738,
            "ubigeo_reniec" => "201006",
            "ubigeo_inei" => "211305",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "OLLARAYA",
            "region" => "PUNO",
            "superficie" => "24",
            "altitud" => "3852",
            "latitud" => "-16.2197",
            "longitud" => "-68.9911"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1739,
            "ubigeo_reniec" => "201007",
            "ubigeo_inei" => "211306",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "TINICACHI",
            "region" => "PUNO",
            "superficie" => "6",
            "altitud" => "3853",
            "latitud" => "-16.1986",
            "longitud" => "-68.9617"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1740,
            "ubigeo_reniec" => "201002",
            "ubigeo_inei" => "211307",
            "departamento_inei" => "21",
            "departamento" => "PUNO",
            "provincia_inei" => "2113",
            "provincia" => "YUNGUYO",
            "distrito" => "UNICACHI",
            "region" => "PUNO",
            "superficie" => "11",
            "altitud" => "3827",
            "latitud" => "-16.2236",
            "longitud" => "-68.9811"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1741,
            "ubigeo_reniec" => "210101",
            "ubigeo_inei" => "220101",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "MOYOBAMBA",
            "region" => "SAN MARTIN",
            "superficie" => "2738",
            "altitud" => "895",
            "latitud" => "-6.0347",
            "longitud" => "-76.9742"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1742,
            "ubigeo_reniec" => "210102",
            "ubigeo_inei" => "220102",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "CALZADA",
            "region" => "SAN MARTIN",
            "superficie" => "95",
            "altitud" => "856",
            "latitud" => "-6.0303",
            "longitud" => "-77.0667"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1743,
            "ubigeo_reniec" => "210103",
            "ubigeo_inei" => "220103",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "HABANA",
            "region" => "SAN MARTIN",
            "superficie" => "91",
            "altitud" => "850",
            "latitud" => "-6.0797",
            "longitud" => "-77.0914"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1744,
            "ubigeo_reniec" => "210104",
            "ubigeo_inei" => "220104",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "JEPELACIO",
            "region" => "SAN MARTIN",
            "superficie" => "360",
            "altitud" => "1067",
            "latitud" => "-6.1081",
            "longitud" => "-76.9153"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1745,
            "ubigeo_reniec" => "210105",
            "ubigeo_inei" => "220105",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "SORITOR",
            "region" => "SAN MARTIN",
            "superficie" => "388",
            "altitud" => "904",
            "latitud" => "-6.1394",
            "longitud" => "-77.1025"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1746,
            "ubigeo_reniec" => "210106",
            "ubigeo_inei" => "220106",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2201",
            "provincia" => "MOYOBAMBA",
            "distrito" => "YANTALO",
            "region" => "SAN MARTIN",
            "superficie" => "100",
            "altitud" => "862",
            "latitud" => "-5.9744",
            "longitud" => "-77.0208"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1747,
            "ubigeo_reniec" => "210701",
            "ubigeo_inei" => "220201",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "BELLAVISTA",
            "region" => "SAN MARTIN",
            "superficie" => "287",
            "altitud" => "330",
            "latitud" => "-7.0522",
            "longitud" => "-76.5897"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1748,
            "ubigeo_reniec" => "210704",
            "ubigeo_inei" => "220202",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "ALTO BIAVO",
            "region" => "SAN MARTIN",
            "superficie" => "6117",
            "altitud" => "253",
            "latitud" => "-7.2558",
            "longitud" => "-76.4767"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1749,
            "ubigeo_reniec" => "210706",
            "ubigeo_inei" => "220203",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "BAJO BIAVO",
            "region" => "SAN MARTIN",
            "superficie" => "975",
            "altitud" => "256",
            "latitud" => "-7.1017",
            "longitud" => "-76.4719"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1750,
            "ubigeo_reniec" => "210705",
            "ubigeo_inei" => "220204",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "HUALLAGA",
            "region" => "SAN MARTIN",
            "superficie" => "210",
            "altitud" => "267",
            "latitud" => "-7.1311",
            "longitud" => "-76.6486"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1751,
            "ubigeo_reniec" => "210703",
            "ubigeo_inei" => "220205",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "SAN PABLO",
            "region" => "SAN MARTIN",
            "superficie" => "362",
            "altitud" => "278",
            "latitud" => "-6.8097",
            "longitud" => "-76.5747"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1752,
            "ubigeo_reniec" => "210702",
            "ubigeo_inei" => "220206",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2202",
            "provincia" => "BELLAVISTA",
            "distrito" => "SAN RAFAEL",
            "region" => "SAN MARTIN",
            "superficie" => "98",
            "altitud" => "242",
            "latitud" => "-7.0231",
            "longitud" => "-76.4658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1753,
            "ubigeo_reniec" => "211001",
            "ubigeo_inei" => "220301",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2203",
            "provincia" => "EL DORADO",
            "distrito" => "SAN JOSE DE SISA",
            "region" => "SAN MARTIN",
            "superficie" => "300",
            "altitud" => "342",
            "latitud" => "-6.6139",
            "longitud" => "-76.6953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1754,
            "ubigeo_reniec" => "211002",
            "ubigeo_inei" => "220302",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2203",
            "provincia" => "EL DORADO",
            "distrito" => "AGUA BLANCA",
            "region" => "SAN MARTIN",
            "superficie" => "168",
            "altitud" => "318",
            "latitud" => "-6.7253",
            "longitud" => "-76.6953"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1755,
            "ubigeo_reniec" => "211004",
            "ubigeo_inei" => "220303",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2203",
            "provincia" => "EL DORADO",
            "distrito" => "SAN MARTIN",
            "region" => "SAN MARTIN",
            "superficie" => "563",
            "altitud" => "437",
            "latitud" => "-6.5144",
            "longitud" => "-76.7406"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1756,
            "ubigeo_reniec" => "211005",
            "ubigeo_inei" => "220304",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2203",
            "provincia" => "EL DORADO",
            "distrito" => "SANTA ROSA",
            "region" => "SAN MARTIN",
            "superficie" => "243",
            "altitud" => "288",
            "latitud" => "-6.7464",
            "longitud" => "-76.6236"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1757,
            "ubigeo_reniec" => "211003",
            "ubigeo_inei" => "220305",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2203",
            "provincia" => "EL DORADO",
            "distrito" => "SHATOJA",
            "region" => "SAN MARTIN",
            "superficie" => "24",
            "altitud" => "413",
            "latitud" => "-6.5283",
            "longitud" => "-76.72"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1758,
            "ubigeo_reniec" => "210201",
            "ubigeo_inei" => "220401",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "SAPOSOA",
            "region" => "SAN MARTIN",
            "superficie" => "545",
            "altitud" => "317",
            "latitud" => "-6.9367",
            "longitud" => "-76.7722"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1759,
            "ubigeo_reniec" => "210205",
            "ubigeo_inei" => "220402",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "ALTO SAPOSOA",
            "region" => "SAN MARTIN",
            "superficie" => "1347",
            "altitud" => "408",
            "latitud" => "-6.7647",
            "longitud" => "-76.8136"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1760,
            "ubigeo_reniec" => "210206",
            "ubigeo_inei" => "220403",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "EL ESLABON",
            "region" => "SAN MARTIN",
            "superficie" => "123",
            "altitud" => "293",
            "latitud" => "-7.0217",
            "longitud" => "-76.7233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1761,
            "ubigeo_reniec" => "210202",
            "ubigeo_inei" => "220404",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "PISCOYACU",
            "region" => "SAN MARTIN",
            "superficie" => "185",
            "altitud" => "310",
            "latitud" => "-6.9811",
            "longitud" => "-76.7694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1762,
            "ubigeo_reniec" => "210203",
            "ubigeo_inei" => "220405",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "SACANCHE",
            "region" => "SAN MARTIN",
            "superficie" => "143",
            "altitud" => "269",
            "latitud" => "-7.07",
            "longitud" => "-76.7136"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1763,
            "ubigeo_reniec" => "210204",
            "ubigeo_inei" => "220406",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2204",
            "provincia" => "HUALLAGA",
            "distrito" => "TINGO DE SAPOSOA",
            "region" => "SAN MARTIN",
            "superficie" => "37",
            "altitud" => "259",
            "latitud" => "-7.0919",
            "longitud" => "-76.6414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1764,
            "ubigeo_reniec" => "210301",
            "ubigeo_inei" => "220501",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "LAMAS",
            "region" => "SAN MARTIN",
            "superficie" => "80",
            "altitud" => "764",
            "latitud" => "-6.4239",
            "longitud" => "-76.5233"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1765,
            "ubigeo_reniec" => "210315",
            "ubigeo_inei" => "220502",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "ALONSO DE ALVARADO",
            "region" => "SAN MARTIN",
            "superficie" => "294",
            "altitud" => "1090",
            "latitud" => "-6.3558",
            "longitud" => "-76.7753"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1766,
            "ubigeo_reniec" => "210303",
            "ubigeo_inei" => "220503",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "BARRANQUITA",
            "region" => "SAN MARTIN",
            "superficie" => "1065",
            "altitud" => "173",
            "latitud" => "-6.2522",
            "longitud" => "-76.0333"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1767,
            "ubigeo_reniec" => "210304",
            "ubigeo_inei" => "220504",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "CAYNARACHI",
            "region" => "SAN MARTIN",
            "superficie" => "1679",
            "altitud" => "193",
            "latitud" => "-6.3308",
            "longitud" => "-76.2842"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1768,
            "ubigeo_reniec" => "210305",
            "ubigeo_inei" => "220505",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "CUŃUMBUQUI",
            "region" => "SAN MARTIN",
            "superficie" => "191",
            "altitud" => "248",
            "latitud" => "-6.5106",
            "longitud" => "-76.4817"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1769,
            "ubigeo_reniec" => "210306",
            "ubigeo_inei" => "220506",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "PINTO RECODO",
            "region" => "SAN MARTIN",
            "superficie" => "524",
            "altitud" => "276",
            "latitud" => "-6.3792",
            "longitud" => "-76.6044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1770,
            "ubigeo_reniec" => "210307",
            "ubigeo_inei" => "220507",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "RUMISAPA",
            "region" => "SAN MARTIN",
            "superficie" => "39",
            "altitud" => "328",
            "latitud" => "-6.4489",
            "longitud" => "-76.4717"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1771,
            "ubigeo_reniec" => "210316",
            "ubigeo_inei" => "220508",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "SAN ROQUE DE CUMBAZA",
            "region" => "SAN MARTIN",
            "superficie" => "525",
            "altitud" => "611",
            "latitud" => "-6.3856",
            "longitud" => "-76.4386"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1772,
            "ubigeo_reniec" => "210311",
            "ubigeo_inei" => "220509",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "SHANAO",
            "region" => "SAN MARTIN",
            "superficie" => "25",
            "altitud" => "260",
            "latitud" => "-6.4117",
            "longitud" => "-76.5942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1773,
            "ubigeo_reniec" => "210313",
            "ubigeo_inei" => "220510",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "TABALOSOS",
            "region" => "SAN MARTIN",
            "superficie" => "485",
            "altitud" => "597",
            "latitud" => "-6.3894",
            "longitud" => "-76.6342"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1774,
            "ubigeo_reniec" => "210314",
            "ubigeo_inei" => "220511",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2205",
            "provincia" => "LAMAS",
            "distrito" => "ZAPATERO",
            "region" => "SAN MARTIN",
            "superficie" => "175",
            "altitud" => "299",
            "latitud" => "-6.5297",
            "longitud" => "-76.4942"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1775,
            "ubigeo_reniec" => "210401",
            "ubigeo_inei" => "220601",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2206",
            "provincia" => "MARISCAL CACERES",
            "distrito" => "JUANJUI",
            "region" => "SAN MARTIN",
            "superficie" => "335",
            "altitud" => "299",
            "latitud" => "-7.1767",
            "longitud" => "-76.7239"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1776,
            "ubigeo_reniec" => "210402",
            "ubigeo_inei" => "220602",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2206",
            "provincia" => "MARISCAL CACERES",
            "distrito" => "CAMPANILLA",
            "region" => "SAN MARTIN",
            "superficie" => "2250",
            "altitud" => "318",
            "latitud" => "-7.4831",
            "longitud" => "-76.6497"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1777,
            "ubigeo_reniec" => "210403",
            "ubigeo_inei" => "220603",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2206",
            "provincia" => "MARISCAL CACERES",
            "distrito" => "HUICUNGO",
            "region" => "SAN MARTIN",
            "superficie" => "9830",
            "altitud" => "308",
            "latitud" => "-7.3169",
            "longitud" => "-76.7772"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1778,
            "ubigeo_reniec" => "210404",
            "ubigeo_inei" => "220604",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2206",
            "provincia" => "MARISCAL CACERES",
            "distrito" => "PACHIZA",
            "region" => "SAN MARTIN",
            "superficie" => "1840",
            "altitud" => "295",
            "latitud" => "-7.2981",
            "longitud" => "-76.7733"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1779,
            "ubigeo_reniec" => "210405",
            "ubigeo_inei" => "220605",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2206",
            "provincia" => "MARISCAL CACERES",
            "distrito" => "PAJARILLO",
            "region" => "SAN MARTIN",
            "superficie" => "244",
            "altitud" => "286",
            "latitud" => "-7.1767",
            "longitud" => "-76.6886"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1780,
            "ubigeo_reniec" => "210901",
            "ubigeo_inei" => "220701",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "PICOTA",
            "region" => "SAN MARTIN",
            "superficie" => "219",
            "altitud" => "228",
            "latitud" => "-6.92",
            "longitud" => "-76.3303"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1781,
            "ubigeo_reniec" => "210902",
            "ubigeo_inei" => "220702",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "BUENOS AIRES",
            "region" => "SAN MARTIN",
            "superficie" => "273",
            "altitud" => "209",
            "latitud" => "-6.7917",
            "longitud" => "-76.3278"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1782,
            "ubigeo_reniec" => "210903",
            "ubigeo_inei" => "220703",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "CASPISAPA",
            "region" => "SAN MARTIN",
            "superficie" => "81",
            "altitud" => "238",
            "latitud" => "-6.9564",
            "longitud" => "-76.4186"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1783,
            "ubigeo_reniec" => "210904",
            "ubigeo_inei" => "220704",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "PILLUANA",
            "region" => "SAN MARTIN",
            "superficie" => "239",
            "altitud" => "218",
            "latitud" => "-6.7767",
            "longitud" => "-76.2917"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1784,
            "ubigeo_reniec" => "210905",
            "ubigeo_inei" => "220705",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "PUCACACA",
            "region" => "SAN MARTIN",
            "superficie" => "231",
            "altitud" => "228",
            "latitud" => "-6.8489",
            "longitud" => "-76.3411"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1785,
            "ubigeo_reniec" => "210906",
            "ubigeo_inei" => "220706",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "SAN CRISTOBAL",
            "region" => "SAN MARTIN",
            "superficie" => "30",
            "altitud" => "238",
            "latitud" => "-6.9919",
            "longitud" => "-76.4178"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1786,
            "ubigeo_reniec" => "210907",
            "ubigeo_inei" => "220707",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "SAN HILARION",
            "region" => "SAN MARTIN",
            "superficie" => "97",
            "altitud" => "230",
            "latitud" => "-7.0039",
            "longitud" => "-76.4394"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1787,
            "ubigeo_reniec" => "210910",
            "ubigeo_inei" => "220708",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "SHAMBOYACU",
            "region" => "SAN MARTIN",
            "superficie" => "416",
            "altitud" => "289",
            "latitud" => "-7.0242",
            "longitud" => "-76.1328"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1788,
            "ubigeo_reniec" => "210908",
            "ubigeo_inei" => "220709",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "TINGO DE PONASA",
            "region" => "SAN MARTIN",
            "superficie" => "340",
            "altitud" => "244",
            "latitud" => "-6.9361",
            "longitud" => "-76.2539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1789,
            "ubigeo_reniec" => "210909",
            "ubigeo_inei" => "220710",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2207",
            "provincia" => "PICOTA",
            "distrito" => "TRES UNIDOS",
            "region" => "SAN MARTIN",
            "superficie" => "247",
            "altitud" => "237",
            "latitud" => "-6.8058",
            "longitud" => "-76.2322"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1790,
            "ubigeo_reniec" => "210501",
            "ubigeo_inei" => "220801",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "RIOJA",
            "region" => "SAN MARTIN",
            "superficie" => "186",
            "altitud" => "850",
            "latitud" => "-6.0625",
            "longitud" => "-77.1683"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1791,
            "ubigeo_reniec" => "210509",
            "ubigeo_inei" => "220802",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "AWAJUN",
            "region" => "SAN MARTIN",
            "superficie" => "481",
            "altitud" => "888",
            "latitud" => "-5.8161",
            "longitud" => "-77.3828"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1792,
            "ubigeo_reniec" => "210506",
            "ubigeo_inei" => "220803",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "ELIAS SOPLIN VARGAS",
            "region" => "SAN MARTIN",
            "superficie" => "200",
            "altitud" => "853",
            "latitud" => "-5.9872",
            "longitud" => "-77.2781"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1793,
            "ubigeo_reniec" => "210505",
            "ubigeo_inei" => "220804",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "NUEVA CAJAMARCA",
            "region" => "SAN MARTIN",
            "superficie" => "330",
            "altitud" => "869",
            "latitud" => "-5.9361",
            "longitud" => "-77.3069"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1794,
            "ubigeo_reniec" => "210508",
            "ubigeo_inei" => "220805",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "PARDO MIGUEL",
            "region" => "SAN MARTIN",
            "superficie" => "1132",
            "altitud" => "963",
            "latitud" => "-5.7394",
            "longitud" => "-77.5044"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1795,
            "ubigeo_reniec" => "210502",
            "ubigeo_inei" => "220806",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "POSIC",
            "region" => "SAN MARTIN",
            "superficie" => "55",
            "altitud" => "838",
            "latitud" => "-6.0133",
            "longitud" => "-77.1619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1796,
            "ubigeo_reniec" => "210507",
            "ubigeo_inei" => "220807",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "SAN FERNANDO",
            "region" => "SAN MARTIN",
            "superficie" => "64",
            "altitud" => "828",
            "latitud" => "-5.9019",
            "longitud" => "-77.2694"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1797,
            "ubigeo_reniec" => "210503",
            "ubigeo_inei" => "220808",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "YORONGOS",
            "region" => "SAN MARTIN",
            "superficie" => "75",
            "altitud" => "883",
            "latitud" => "-6.1386",
            "longitud" => "-77.1442"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1798,
            "ubigeo_reniec" => "210504",
            "ubigeo_inei" => "220809",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2208",
            "provincia" => "RIOJA",
            "distrito" => "YURACYACU",
            "region" => "SAN MARTIN",
            "superficie" => "14",
            "altitud" => "812",
            "latitud" => "-5.9311",
            "longitud" => "-77.2264"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1799,
            "ubigeo_reniec" => "210601",
            "ubigeo_inei" => "220901",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "TARAPOTO",
            "region" => "SAN MARTIN",
            "superficie" => "68",
            "altitud" => "342",
            "latitud" => "-6.4894",
            "longitud" => "-76.3603"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1800,
            "ubigeo_reniec" => "210602",
            "ubigeo_inei" => "220902",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "ALBERTO LEVEAU",
            "region" => "SAN MARTIN",
            "superficie" => "268",
            "altitud" => "215",
            "latitud" => "-6.6631",
            "longitud" => "-76.2867"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1801,
            "ubigeo_reniec" => "210604",
            "ubigeo_inei" => "220903",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "CACATACHI",
            "region" => "SAN MARTIN",
            "superficie" => "75",
            "altitud" => "309",
            "latitud" => "-6.4619",
            "longitud" => "-76.4514"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1802,
            "ubigeo_reniec" => "210606",
            "ubigeo_inei" => "220904",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "CHAZUTA",
            "region" => "SAN MARTIN",
            "superficie" => "966",
            "altitud" => "189",
            "latitud" => "-6.5736",
            "longitud" => "-76.1378"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1803,
            "ubigeo_reniec" => "210607",
            "ubigeo_inei" => "220905",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "CHIPURANA",
            "region" => "SAN MARTIN",
            "superficie" => "500",
            "altitud" => "152",
            "latitud" => "-6.3542",
            "longitud" => "-75.7414"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1804,
            "ubigeo_reniec" => "210608",
            "ubigeo_inei" => "220906",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "EL PORVENIR",
            "region" => "SAN MARTIN",
            "superficie" => "483",
            "altitud" => "152",
            "latitud" => "-6.2117",
            "longitud" => "-75.8008"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1805,
            "ubigeo_reniec" => "210609",
            "ubigeo_inei" => "220907",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "HUIMBAYOC",
            "region" => "SAN MARTIN",
            "superficie" => "1609",
            "altitud" => "181",
            "latitud" => "-6.4178",
            "longitud" => "-75.7681"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1806,
            "ubigeo_reniec" => "210610",
            "ubigeo_inei" => "220908",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "JUAN GUERRA",
            "region" => "SAN MARTIN",
            "superficie" => "197",
            "altitud" => "207",
            "latitud" => "-6.5842",
            "longitud" => "-76.3308"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1807,
            "ubigeo_reniec" => "210621",
            "ubigeo_inei" => "220909",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "LA BANDA DE SHILCAYO",
            "region" => "SAN MARTIN",
            "superficie" => "287",
            "altitud" => "418",
            "latitud" => "-6.49",
            "longitud" => "-76.3406"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1808,
            "ubigeo_reniec" => "210611",
            "ubigeo_inei" => "220910",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "MORALES",
            "region" => "SAN MARTIN",
            "superficie" => "44",
            "altitud" => "290",
            "latitud" => "-6.4792",
            "longitud" => "-76.3831"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1809,
            "ubigeo_reniec" => "210612",
            "ubigeo_inei" => "220911",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "PAPAPLAYA",
            "region" => "SAN MARTIN",
            "superficie" => "686",
            "altitud" => "149",
            "latitud" => "-6.2453",
            "longitud" => "-75.7906"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1810,
            "ubigeo_reniec" => "210616",
            "ubigeo_inei" => "220912",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "SAN ANTONIO",
            "region" => "SAN MARTIN",
            "superficie" => "93",
            "altitud" => "499",
            "latitud" => "-6.4094",
            "longitud" => "-76.4067"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1811,
            "ubigeo_reniec" => "210619",
            "ubigeo_inei" => "220913",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "SAUCE",
            "region" => "SAN MARTIN",
            "superficie" => "103",
            "altitud" => "622",
            "latitud" => "-6.6906",
            "longitud" => "-76.2167"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1812,
            "ubigeo_reniec" => "210620",
            "ubigeo_inei" => "220914",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2209",
            "provincia" => "SAN MARTIN",
            "distrito" => "SHAPAJA",
            "region" => "SAN MARTIN",
            "superficie" => "270",
            "altitud" => "214",
            "latitud" => "-6.5797",
            "longitud" => "-76.2619"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1813,
            "ubigeo_reniec" => "210801",
            "ubigeo_inei" => "221001",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "TOCACHE",
            "region" => "SAN MARTIN",
            "superficie" => "1142",
            "altitud" => "519",
            "latitud" => "-8.1883",
            "longitud" => "-76.5094"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1814,
            "ubigeo_reniec" => "210802",
            "ubigeo_inei" => "221002",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "NUEVO PROGRESO",
            "region" => "SAN MARTIN",
            "superficie" => "861",
            "altitud" => "512",
            "latitud" => "-8.4506",
            "longitud" => "-76.3264"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1815,
            "ubigeo_reniec" => "210803",
            "ubigeo_inei" => "221003",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "POLVORA",
            "region" => "SAN MARTIN",
            "superficie" => "2174",
            "altitud" => "543",
            "latitud" => "-7.9078",
            "longitud" => "-76.6678"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1816,
            "ubigeo_reniec" => "210804",
            "ubigeo_inei" => "221004",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "SHUNTE",
            "region" => "SAN MARTIN",
            "superficie" => "964",
            "altitud" => "1015",
            "latitud" => "-8.3517",
            "longitud" => "-76.7297"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1817,
            "ubigeo_reniec" => "210805",
            "ubigeo_inei" => "221005",
            "departamento_inei" => "22",
            "departamento" => "SAN MARTIN",
            "provincia_inei" => "2210",
            "provincia" => "TOCACHE",
            "distrito" => "UCHIZA",
            "region" => "SAN MARTIN",
            "superficie" => "724",
            "altitud" => "566",
            "latitud" => "-8.4583",
            "longitud" => "-76.4617"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1818,
            "ubigeo_reniec" => "220101",
            "ubigeo_inei" => "230101",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "TACNA",
            "region" => "TACNA",
            "superficie" => "1878",
            "altitud" => "583",
            "latitud" => "-18.0019",
            "longitud" => "-70.2519"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1819,
            "ubigeo_reniec" => "220111",
            "ubigeo_inei" => "230102",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "ALTO DE LA ALIANZA",
            "region" => "TACNA",
            "superficie" => "371",
            "altitud" => "603",
            "latitud" => "-17.9931",
            "longitud" => "-70.2478"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1820,
            "ubigeo_reniec" => "220102",
            "ubigeo_inei" => "230103",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "CALANA",
            "region" => "TACNA",
            "superficie" => "108",
            "altitud" => "881",
            "latitud" => "-17.9433",
            "longitud" => "-70.1883"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1821,
            "ubigeo_reniec" => "220112",
            "ubigeo_inei" => "230104",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "CIUDAD NUEVA",
            "region" => "TACNA",
            "superficie" => "173",
            "altitud" => "695",
            "latitud" => "-17.9819",
            "longitud" => "-70.2381"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1822,
            "ubigeo_reniec" => "220104",
            "ubigeo_inei" => "230105",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "INCLAN",
            "region" => "TACNA",
            "superficie" => "1415",
            "altitud" => "519",
            "latitud" => "-17.7939",
            "longitud" => "-70.4947"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1823,
            "ubigeo_reniec" => "220107",
            "ubigeo_inei" => "230106",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "PACHIA",
            "region" => "TACNA",
            "superficie" => "604",
            "altitud" => "1087",
            "latitud" => "-17.8964",
            "longitud" => "-70.1539"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1824,
            "ubigeo_reniec" => "220108",
            "ubigeo_inei" => "230107",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "PALCA",
            "region" => "TACNA",
            "superficie" => "1418",
            "altitud" => "2939",
            "latitud" => "-17.7783",
            "longitud" => "-69.9597"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1825,
            "ubigeo_reniec" => "220109",
            "ubigeo_inei" => "230108",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "POCOLLAY",
            "region" => "TACNA",
            "superficie" => "266",
            "altitud" => "690",
            "latitud" => "-17.9967",
            "longitud" => "-70.2258"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1826,
            "ubigeo_reniec" => "220110",
            "ubigeo_inei" => "230109",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "SAMA",
            "region" => "TACNA",
            "superficie" => "1116",
            "altitud" => "397",
            "latitud" => "-17.8625",
            "longitud" => "-70.56"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1827,
            "ubigeo_reniec" => "220113",
            "ubigeo_inei" => "230110",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "CORONEL GREGORIO ALBARRACIN LANCHIP",
            "region" => "TACNA",
            "superficie" => "188",
            "altitud" => "562",
            "latitud" => "-18.0431",
            "longitud" => "-70.2517"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1828,
            "ubigeo_reniec" => "220114",
            "ubigeo_inei" => "230111",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2301",
            "provincia" => "TACNA",
            "distrito" => "LA YARADA LOS PALOS",
            "region" => "TACNA",
            "superficie" => "529",
            "altitud" => "42",
            "latitud" => "-18.2861",
            "longitud" => "-70.4392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1829,
            "ubigeo_reniec" => "220401",
            "ubigeo_inei" => "230201",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "CANDARAVE",
            "region" => "TACNA",
            "superficie" => "1111",
            "altitud" => "3427",
            "latitud" => "-17.2681",
            "longitud" => "-70.2503"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1830,
            "ubigeo_reniec" => "220402",
            "ubigeo_inei" => "230202",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "CAIRANI",
            "region" => "TACNA",
            "superficie" => "371",
            "altitud" => "3389",
            "latitud" => "-17.2853",
            "longitud" => "-70.3636"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1831,
            "ubigeo_reniec" => "220406",
            "ubigeo_inei" => "230203",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "CAMILACA",
            "region" => "TACNA",
            "superficie" => "519",
            "altitud" => "3853",
            "latitud" => "-17.2425",
            "longitud" => "-70.3881"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1832,
            "ubigeo_reniec" => "220403",
            "ubigeo_inei" => "230204",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "CURIBAYA",
            "region" => "TACNA",
            "superficie" => "127",
            "altitud" => "2412",
            "latitud" => "-17.3814",
            "longitud" => "-70.3347"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1833,
            "ubigeo_reniec" => "220404",
            "ubigeo_inei" => "230205",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "HUANUARA",
            "region" => "TACNA",
            "superficie" => "96",
            "altitud" => "3226",
            "latitud" => "-17.3136",
            "longitud" => "-70.3225"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1834,
            "ubigeo_reniec" => "220405",
            "ubigeo_inei" => "230206",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2302",
            "provincia" => "CANDARAVE",
            "distrito" => "QUILAHUANI",
            "region" => "TACNA",
            "superficie" => "38",
            "altitud" => "3205",
            "latitud" => "-17.3183",
            "longitud" => "-70.2586"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1835,
            "ubigeo_reniec" => "220301",
            "ubigeo_inei" => "230301",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2303",
            "provincia" => "JORGE BASADRE",
            "distrito" => "LOCUMBA",
            "region" => "TACNA",
            "superficie" => "969",
            "altitud" => "589",
            "latitud" => "-17.6139",
            "longitud" => "-70.7628"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1836,
            "ubigeo_reniec" => "220303",
            "ubigeo_inei" => "230302",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2303",
            "provincia" => "JORGE BASADRE",
            "distrito" => "ILABAYA",
            "region" => "TACNA",
            "superficie" => "1111",
            "altitud" => "1387",
            "latitud" => "-17.4181",
            "longitud" => "-70.5131"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1837,
            "ubigeo_reniec" => "220302",
            "ubigeo_inei" => "230303",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2303",
            "provincia" => "JORGE BASADRE",
            "distrito" => "ITE",
            "region" => "TACNA",
            "superficie" => "848",
            "altitud" => "160",
            "latitud" => "-17.8617",
            "longitud" => "-70.9658"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1838,
            "ubigeo_reniec" => "220201",
            "ubigeo_inei" => "230401",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "TARATA",
            "region" => "TACNA",
            "superficie" => "864",
            "altitud" => "3077",
            "latitud" => "-17.475",
            "longitud" => "-70.0319"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1839,
            "ubigeo_reniec" => "220205",
            "ubigeo_inei" => "230402",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "CHUCATAMANI",
            "region" => "TACNA",
            "superficie" => "372",
            "altitud" => "2352",
            "latitud" => "-17.4806",
            "longitud" => "-70.1231"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1840,
            "ubigeo_reniec" => "220206",
            "ubigeo_inei" => "230403",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "ESTIQUE",
            "region" => "TACNA",
            "superficie" => "313",
            "altitud" => "3149",
            "latitud" => "-17.5419",
            "longitud" => "-70.0183"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1841,
            "ubigeo_reniec" => "220207",
            "ubigeo_inei" => "230404",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "ESTIQUE-PAMPA",
            "region" => "TACNA",
            "superficie" => "186",
            "altitud" => "3064",
            "latitud" => "-17.5386",
            "longitud" => "-70.0314"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1842,
            "ubigeo_reniec" => "220210",
            "ubigeo_inei" => "230405",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "SITAJARA",
            "region" => "TACNA",
            "superficie" => "251",
            "altitud" => "3163",
            "latitud" => "-17.3753",
            "longitud" => "-70.1339"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1843,
            "ubigeo_reniec" => "220211",
            "ubigeo_inei" => "230406",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "SUSAPAYA",
            "region" => "TACNA",
            "superficie" => "373",
            "altitud" => "3462",
            "latitud" => "-17.3481",
            "longitud" => "-70.1336"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1844,
            "ubigeo_reniec" => "220212",
            "ubigeo_inei" => "230407",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "TARUCACHI",
            "region" => "TACNA",
            "superficie" => "113",
            "altitud" => "3054",
            "latitud" => "-17.5258",
            "longitud" => "-70.0317"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1845,
            "ubigeo_reniec" => "220213",
            "ubigeo_inei" => "230408",
            "departamento_inei" => "23",
            "departamento" => "TACNA",
            "provincia_inei" => "2304",
            "provincia" => "TARATA",
            "distrito" => "TICACO",
            "region" => "TACNA",
            "superficie" => "347",
            "altitud" => "3272",
            "latitud" => "-17.4472",
            "longitud" => "-70.0467"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1846,
            "ubigeo_reniec" => "230101",
            "ubigeo_inei" => "240101",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "TUMBES",
            "region" => "TUMBES",
            "superficie" => "158",
            "altitud" => "9",
            "latitud" => "-3.5711",
            "longitud" => "-80.4592"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1847,
            "ubigeo_reniec" => "230102",
            "ubigeo_inei" => "240102",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "CORRALES",
            "region" => "TUMBES",
            "superficie" => "132",
            "altitud" => "27",
            "latitud" => "-3.6014",
            "longitud" => "-80.4806"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1848,
            "ubigeo_reniec" => "230103",
            "ubigeo_inei" => "240103",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "LA CRUZ",
            "region" => "TUMBES",
            "superficie" => "65",
            "altitud" => "10",
            "latitud" => "-3.6372",
            "longitud" => "-80.59"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1849,
            "ubigeo_reniec" => "230104",
            "ubigeo_inei" => "240104",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "PAMPAS DE HOSPITAL",
            "region" => "TUMBES",
            "superficie" => "728",
            "altitud" => "28",
            "latitud" => "-3.6933",
            "longitud" => "-80.4392"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1850,
            "ubigeo_reniec" => "230105",
            "ubigeo_inei" => "240105",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "SAN JACINTO",
            "region" => "TUMBES",
            "superficie" => "599",
            "altitud" => "23",
            "latitud" => "-3.6408",
            "longitud" => "-80.4453"
        ]);

        Ubigeo::firstOrCreate([
            "id" => 1851,
            "ubigeo_reniec" => "230106",
            "ubigeo_inei" => "240106",
            "departamento_inei" => "24",
            "departamento" => "TUMBES",
            "provincia_inei" => "2401",
            "provincia" => "TUMBES",
            "distrito" => "SAN JUAN DE LA VIRGEN",
            "region" => "TUMBES",
            "superficie" => "119",
            "altitud" => "26",
            "latitud" => "-3.6278",
            "longitud" => "-80.4336"
        ]);
    }
}
