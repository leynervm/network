import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  Unique,
  Index,
} from 'typeorm';
import { Olt } from './Olt.js';

@Entity('olt_ports')
@Unique(['olt_id', 'port_number'])
export class OltPort {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'bigint' })
  @Index('olt_ports_olt_id_index')
  olt_id: number;

  @Column({ type: 'integer' })
  port_number: number;

  @Column({ type: 'varchar', length: 255, nullable: true })
  alias: string | null;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @ManyToOne(() => Olt, (olt) => olt.ports, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'olt_id' })
  olt: Olt;
}
