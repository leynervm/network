import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  OneToMany,
  JoinColumn,
  DeleteDateColumn,
  Index,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Ubigeo } from './Ubigeo.js';
import { Network } from './Network.js';
import { Recibo } from './Recibo.js';

@Entity('clients')
export class Client {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'char', length: 11 })
  @Index('clients_document_index')
  document: string;

  @Column({ type: 'varchar', length: 255 })
  @Index('clients_name_index')
  name: string;

  @Column({ type: 'text', nullable: true })
  direccion: string | null;

  @Column({ type: 'bigint', nullable: true })
  ubigeo_id: number | null;

  @DeleteDateColumn({ type: 'timestamp', nullable: true })
  deleted_at: Date | null;

  @ManyToOne(() => Ubigeo, (ubigeo) => ubigeo.clients, { nullable: true })
  @JoinColumn({ name: 'ubigeo_id' })
  ubigeo: Ubigeo;

  @OneToMany(() => Network, (network) => network.client)
  networks: Network[];

  @OneToMany(() => Recibo, (recibo) => recibo.client)
  recibos: Recibo[];

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
    if (this.direccion) this.direccion = this.direccion.trim().toUpperCase();
  }
}
