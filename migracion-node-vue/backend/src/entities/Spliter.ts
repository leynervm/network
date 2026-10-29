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
import { Olt } from './Olt.js';
import { Boxnav } from './Boxnav.js';
import { SpliterPort } from './SpliterPort.js';

@Entity('spliters')
export class Spliter {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @Column({ type: 'varchar', length: 4 })
  code: string;

  @Column({ type: 'int' })
  outs: number;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @Column({ type: 'bigint' })
  olt_id: number;

  @ManyToOne(() => Olt, (olt) => olt.spliters, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'olt_id' })
  olt: Olt;

  @OneToMany(() => Boxnav, (boxnav) => boxnav.spliter)
  boxnavs: Boxnav[];

  @OneToMany(() => SpliterPort, (port) => port.spliter)
  ports: SpliterPort[];

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
    if (this.code) this.code = this.code.trim().toUpperCase();
    if (this.direccion) this.direccion = this.direccion.trim().toUpperCase();
  }
}
