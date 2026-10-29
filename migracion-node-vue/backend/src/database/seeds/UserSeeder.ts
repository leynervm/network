import bcrypt from 'bcryptjs';
import { DataSource } from 'typeorm';
import { User } from '../../entities/User.js';

export class UserSeeder {
  static async run(dataSource: DataSource): Promise<void> {
    const userRepo = dataSource.getRepository(User);
    const hashedPassword = await bcrypt.hash('12345678', 10);

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
      } else {
        user.name = data.name;
        user.password = data.password;
        await userRepo.save(user);
        console.log(`  [UserSeeder] Usuario actualizado: ${data.email}`);
      }
    }
  }
}
