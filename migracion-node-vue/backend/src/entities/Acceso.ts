import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
} from 'typeorm';
import { User } from './User.js';

@Entity('accesos')
export class Acceso {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'timestamp' })
  date: Date | string;

  @Column({ type: 'smallint' })
  status: number;

  @Column({ type: 'text', nullable: true })
  description: string | null;

  @Column({ type: 'bigint', nullable: true })
  user_id: number | null;

  @ManyToOne(() => User, { nullable: true, onDelete: 'SET NULL' })
  @JoinColumn({ name: 'user_id' })
  user: User;
}
