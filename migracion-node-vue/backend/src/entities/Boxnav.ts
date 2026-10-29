import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  OneToMany,
  JoinColumn,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Spliter } from './Spliter.js';
import { Portboxnav } from './Portboxnav.js';

@Entity('boxnavs')
export class Boxnav {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @Column({ type: 'varchar', length: 12 })
  code: string;

  @Column({ type: 'smallint' })
  outs: number;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @Column({ type: 'char', length: 1, default: '0' })
  status: string;

  @Column({ type: 'bigint' })
  spliter_id: number;

  @Column({ type: 'integer', nullable: true })
  splitter_port: number | null;

  @ManyToOne(() => Spliter, (spliter) => spliter.boxnavs, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'spliter_id' })
  spliter: Spliter;

  @OneToMany(() => Portboxnav, (port) => port.boxnav)
  portboxnavs: Portboxnav[];

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
    if (this.code) this.code = this.code.trim().toUpperCase();
    if (this.direccion) this.direccion = this.direccion.trim().toUpperCase();
  }
}
