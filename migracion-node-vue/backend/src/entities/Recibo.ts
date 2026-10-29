import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  Index,
} from 'typeorm';
import { Network } from './Network.js';
import { Client } from './Client.js';
import { Seriepago } from './Seriepago.js';

@Entity('recibos')
export class Recibo {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'timestamp' })
  @Index('recibos_date_index')
  date: Date | string;

  @Column({ type: 'date' })
  vencimiento: string;

  @Column({ type: 'varchar', length: 13, unique: true })
  seriecompleta: string;

  @Column({ type: 'char', length: 7 })
  @Index('recibos_month_index')
  month: string;

  @Column({ type: 'decimal', precision: 12, scale: 2 })
  amount: number;

  @Column({ type: 'decimal', precision: 12, scale: 2, default: 0.0 })
  descuento: number;

  @Column({ type: 'decimal', precision: 12, scale: 2 })
  total: number;

  @Column({ type: 'char', length: 1, default: '0' })
  status: string;

  @Column({ type: 'smallint' })
  @Index('recibos_seriepago_id_index')
  seriepago_id: number;

  @Column({ type: 'bigint' })
  @Index('recibos_client_id_index')
  client_id: number;

  @Column({ type: 'bigint', nullable: true })
  @Index('recibos_network_id_index')
  network_id: number | null;

  @ManyToOne(() => Network, (network) => network.recibos, { nullable: true, onDelete: 'SET NULL', onUpdate: 'CASCADE' })
  @JoinColumn({ name: 'network_id' })
  network: Network | null;

  @ManyToOne(() => Client, (client) => client.recibos)
  @JoinColumn({ name: 'client_id' })
  client: Client;

  @ManyToOne(() => Seriepago, (seriepago) => seriepago.recibos)
  @JoinColumn({ name: 'seriepago_id' })
  seriepago: Seriepago;
}
