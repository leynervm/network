"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.UserSeeder = void 0;
const bcryptjs_1 = __importDefault(require("bcryptjs"));
const User_js_1 = require("../../entities/User.js");
class UserSeeder {
    static async run(dataSource) {
        const userRepo = dataSource.getRepository(User_js_1.User);
        const hashedPassword = await bcryptjs_1.default.hash('12345678', 10);
        const usersToSeed = [
            {
                email: 'admin@gmail.com',
                name: 'Red Center',
                password: hashedPassword,
            },
            {
                email: 'eliceo@gmail.com',
                name: 'Eliceo',
                password: hashedPassword,
            },
        ];
        for (const data of usersToSeed) {
            let user = await userRepo.findOne({ where: { email: data.email } });
            if (!user) {
                user = userRepo.create(data);
                await userRepo.save(user);
                console.log(`  [UserSeeder] Usuario creado: ${data.email}`);
            }
            else {
                user.name = data.name;
                user.password = data.password;
                await userRepo.save(user);
                console.log(`  [UserSeeder] Usuario actualizado: ${data.email}`);
            }
        }
    }
}
exports.UserSeeder = UserSeeder;
