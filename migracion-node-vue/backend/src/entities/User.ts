import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  CreateDateColumn,
  UpdateDateColumn,
  ManyToMany,
  JoinTable,
  OneToMany,
} from 'typeorm';
import { Role } from './Role.js';
import { Permission } from './Permission.js';
import { Network } from './Network.js';

@Entity('users')
export class User {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @Column({ type: 'varchar', length: 255, unique: true })
  email: string;

  @Column({ type: 'timestamp', nullable: true })
  email_verified_at: Date | null;

  @Column({ type: 'varchar', length: 255 })
  password: string;

  @Column({ type: 'text', nullable: true })
  two_factor_secret: string | null;

  @Column({ type: 'text', nullable: true })
  two_factor_recovery_codes: string | null;

  @Column({ type: 'timestamp', nullable: true })
  two_factor_confirmed_at: Date | null;

  @Column({ type: 'varchar', length: 100, nullable: true })
  remember_token: string | null;

  @Column({ type: 'bigint', nullable: true })
  current_team_id: number | null;

  @Column({ type: 'varchar', length: 2048, nullable: true })
  profile_photo_path: string | null;

  @CreateDateColumn({ type: 'timestamp', nullable: true })
  created_at: Date;

  @UpdateDateColumn({ type: 'timestamp', nullable: true })
  updated_at: Date;

  @ManyToMany(() => Role)
  @JoinTable({
    name: 'model_has_roles',
    joinColumn: { name: 'model_id', referencedColumnName: 'id' },
    inverseJoinColumn: { name: 'role_id', referencedColumnName: 'id' },
  })
  roles: Role[];

  @ManyToMany(() => Permission)
  @JoinTable({
    name: 'model_has_permissions',
    joinColumn: { name: 'model_id', referencedColumnName: 'id' },
    inverseJoinColumn: { name: 'permission_id', referencedColumnName: 'id' },
  })
  permissions: Permission[];

  @OneToMany(() => Network, (network) => network.user)
  networks: Network[];
}
