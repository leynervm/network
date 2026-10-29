import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  Index,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Boxnav } from './Boxnav.js';

@Entity('portboxnavs')
export class Portboxnav {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 12 })
  code: string;

  @Column({ type: 'char', length: 1, default: '0' })
  status: string;

  @Column({ type: 'bigint' })
  boxnav_id: number;

  @Column({ type: 'varchar', length: 255, nullable: true })
  @Index('portboxnavs_alias_index')
  alias: string | null;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @ManyToOne(() => Boxnav, (boxnav) => boxnav.portboxnavs, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'boxnav_id' })
  boxnav: Boxnav;

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.code) this.code = this.code.trim().toUpperCase();
    if (this.alias) this.alias = this.alias.trim().toUpperCase();
    if (this.direccion) this.direccion = this.direccion.trim().toUpperCase();
  }
}
