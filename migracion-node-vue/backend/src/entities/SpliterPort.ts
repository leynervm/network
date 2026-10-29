import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  Unique,
  Index,
} from 'typeorm';
import { Spliter } from './Spliter.js';

@Entity('spliter_ports')
@Unique(['spliter_id', 'port_number'])
export class SpliterPort {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'bigint' })
  @Index('spliter_ports_spliter_id_index')
  spliter_id: number;

  @Column({ type: 'integer' })
  port_number: number;

  @Column({ type: 'varchar', length: 255, nullable: true })
  alias: string | null;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @ManyToOne(() => Spliter, (spliter) => spliter.ports, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'spliter_id' })
  spliter: Spliter;
}
