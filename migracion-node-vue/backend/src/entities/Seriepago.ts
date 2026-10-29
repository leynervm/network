import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  OneToMany,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Recibo } from './Recibo.js';

@Entity('seriepagos')
export class Seriepago {
  @PrimaryGeneratedColumn({ type: 'smallint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  descripcion: string;

  @Column({ type: 'char', length: 4, unique: true })
  serie: string;

  @Column({ type: 'integer', default: 0 })
  contador: number;

  @OneToMany(() => Recibo, (recibo) => recibo.seriepago)
  recibos: Recibo[];

  // Compatibilidad con accesos previos .name y .count
  get name(): string {
    return this.descripcion;
  }
  set name(value: string) {
    this.descripcion = value;
  }

  get count(): number {
    return this.contador;
  }
  set count(value: number) {
    this.contador = value;
  }

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.descripcion) this.descripcion = this.descripcion.trim().toUpperCase();
    if (this.serie) this.serie = this.serie.trim().toUpperCase();
  }
}
