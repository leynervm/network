import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  OneToMany,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Product } from './Product.js';

@Entity('marcas')
export class Marca {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @OneToMany(() => Product, (product) => product.marca)
  products: Product[];

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
  }
}
