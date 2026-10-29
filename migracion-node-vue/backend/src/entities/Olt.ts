import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  OneToMany,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Spliter } from './Spliter.js';
import { OltPort } from './OltPort.js';

@Entity('olts')
export class Olt {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @Column({ type: 'char', length: 4, unique: true, nullable: true })
  code: string | null;

  @Column({ type: 'int' })
  outs: number;

  @OneToMany(() => Spliter, (spliter) => spliter.olt)
  spliters: Spliter[];

  @OneToMany(() => OltPort, (port) => port.olt)
  ports: OltPort[];

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
    if (this.code) this.code = this.code.trim().toUpperCase();
  }
}
