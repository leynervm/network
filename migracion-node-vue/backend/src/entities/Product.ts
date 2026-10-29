import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Marca } from './Marca.js';

@Entity('products')
export class Product {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'text' })
  name: string;

  @Column({ type: 'varchar', length: 255, nullable: true })
  modelo: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  mac: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  ip: string | null;

  @Column({ type: 'decimal', precision: 18, scale: 2, nullable: true })
  pricebuy: number | null;

  @Column({ type: 'decimal', precision: 18, scale: 2, nullable: true })
  pricesale: number | null;

  @Column({ type: 'varchar', length: 5, nullable: true })
  unit: string | null;

  @Column({ type: 'decimal', precision: 18, scale: 2, default: 0.0 })
  stock: number;

  @Column({ type: 'varchar', length: 255, nullable: true })
  image: string | null;

  @Column({ type: 'bigint', nullable: true })
  marca_id: number | null;

  @ManyToOne(() => Marca, (marca) => marca.products, { nullable: true, onDelete: 'SET NULL' })
  @JoinColumn({ name: 'marca_id' })
  marca: Marca;

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
    if (this.modelo) this.modelo = this.modelo.trim().toUpperCase();
    if (this.mac) this.mac = this.mac.trim().toUpperCase();
    if (this.unit) this.unit = this.unit.trim().toUpperCase();
  }
}
