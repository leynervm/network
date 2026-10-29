import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Network } from './Network.js';

@Entity('equipos')
export class Equipo {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'text' })
  descripcion: string;

  @Column({ type: 'decimal', precision: 12, scale: 2, default: 0.0 })
  price: number;

  @Column({ type: 'varchar', length: 255 })
  type: string;

  @Column({ type: 'varchar', length: 255, nullable: true })
  mac: string | null;

  @Column({ type: 'bigint' })
  network_id: number;

  @ManyToOne(() => Network, (network) => network.equipos, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'network_id' })
  network: Network;

  // Compatibilidad con código previo que referenciaba .name
  get name(): string {
    return this.descripcion;
  }
  set name(value: string) {
    this.descripcion = value;
  }

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.descripcion) this.descripcion = this.descripcion.trim().toUpperCase();
    if (this.mac) this.mac = this.mac.trim().toUpperCase();
    if (this.type) this.type = this.type.trim().toUpperCase();
  }
}
