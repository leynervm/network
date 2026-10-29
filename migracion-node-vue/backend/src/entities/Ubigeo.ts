import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  OneToMany,
} from 'typeorm';
import { Client } from './Client.js';
import { Network } from './Network.js';

@Entity('ubigeos')
export class Ubigeo {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'varchar', length: 6 })
  ubigeo_reniec: string;

  @Column({ type: 'varchar', length: 6 })
  ubigeo_inei: string;

  @Column({ type: 'varchar', length: 100 })
  departamento_inei: string;

  @Column({ type: 'varchar', length: 100 })
  departamento: string;

  @Column({ type: 'varchar', length: 4 })
  provincia_inei: string;

  @Column({ type: 'varchar', length: 100 })
  provincia: string;

  @Column({ type: 'varchar', length: 100 })
  distrito: string;

  @Column({ type: 'varchar', length: 100 })
  region: string;

  @Column({ type: 'varchar', length: 255, nullable: true })
  superficie: string | null;

  @Column({ type: 'varchar', length: 12, nullable: true })
  altitud: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  latitud: string | null;

  @Column({ type: 'varchar', length: 255, nullable: true })
  longitud: string | null;

  @OneToMany(() => Client, (client) => client.ubigeo)
  clients: Client[];

  @OneToMany(() => Network, (network) => network.ubigeo)
  networks: Network[];
}
