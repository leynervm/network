import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  OneToMany,
  JoinColumn,
  Index,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Client } from './Client.js';
import { User } from './User.js';
import { Ubigeo } from './Ubigeo.js';
import { Recibo } from './Recibo.js';
import { Equipo } from './Equipo.js';

@Entity('networks')
export class Network {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'timestamp' })
  @Index('networks_date_index')
  date: Date | string;

  @Column({ type: 'varchar', length: 12, unique: true, nullable: true })
  code: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  portnumber: string | null;

  @Column({ type: 'text', nullable: true })
  descripcion: string | null;

  @Column({ type: 'varchar', length: 255 })
  @Index('networks_type_index')
  type: string;

  @Column({ type: 'varchar', length: 15, nullable: true })
  telefono: string | null;

  @Column({ type: 'decimal', precision: 12, scale: 2, default: 0.0 })
  price: number;

  @Column({ type: 'text' })
  direccion: string;

  @Column({ type: 'varchar', length: 20, default: 'PROPIO', nullable: true })
  typelocal: string;

  @Column({ type: 'char', length: 1, default: '0' })
  @Index('networks_status_index')
  status: string;

  @Column({ type: 'bigint' })
  @Index('networks_client_id_index')
  client_id: number;

  @Column({ type: 'bigint', nullable: true })
  user_id: number | null;

  @Column({ type: 'bigint', nullable: true })
  @Index('networks_ubigeo_id_index')
  ubigeo_id: number | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  networkable_type: string | null;

  @Column({ type: 'bigint', nullable: true })
  networkable_id: number | null;

  @Column({ type: 'decimal', precision: 10, scale: 7, nullable: true })
  latitude: number | null;

  @Column({ type: 'decimal', precision: 10, scale: 7, nullable: true })
  longitude: number | null;

  @Column({ type: 'smallint', default: 16, nullable: true })
  zoom: number | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  codigo_slp: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  location: string | null;

  @ManyToOne(() => Client, (client) => client.networks, { onDelete: 'CASCADE' })
  @JoinColumn({ name: 'client_id' })
  client: Client;

  @ManyToOne(() => User, (user) => user.networks, { nullable: true })
  @JoinColumn({ name: 'user_id' })
  user: User | null;

  @ManyToOne(() => Ubigeo, (ubigeo) => ubigeo.networks, { nullable: true })
  @JoinColumn({ name: 'ubigeo_id' })
  ubigeo: Ubigeo | null;

  @OneToMany(() => Recibo, (recibo) => recibo.network)
  recibos: Recibo[];

  @OneToMany(() => Equipo, (equipo) => equipo.network)
  equipos: Equipo[];

  // Helpers de compatibilidad 1:1
  static readonly ALQUILADO = 'ALQUILADO';
  static readonly PROPIO = 'PROPIO';
  static readonly TV = 'CABLE TELEVISIÓN';
  static readonly FIBRA = 'FIBRA OPTICA';
  static readonly FIBRA_TV = 'FIBRA OPTICA + CABLE TELEVISIÓN';
  static readonly SATELITAL = 'INTERNET SATELITAL';
  static readonly ACTIVO = '0';
  static readonly SUSPENDIDO = '2';

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.descripcion) this.descripcion = this.descripcion.trim().toUpperCase();
    if (this.code) this.code = this.code.trim().toUpperCase();
    if (this.direccion) this.direccion = this.direccion.trim().toUpperCase();
    if (this.location) this.location = this.location.trim().toUpperCase();
  }
}
