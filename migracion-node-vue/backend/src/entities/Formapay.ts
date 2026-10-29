import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  OneToMany,
  DeleteDateColumn,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Payment } from './Payment.js';

@Entity('formapays')
export class Formapay {
  @PrimaryGeneratedColumn({ type: 'smallint' })
  id: number;

  @Column({ type: 'varchar', length: 255 })
  name: string;

  @Column({ type: 'char', length: 1, default: '0' })
  type: string;

  @DeleteDateColumn({ type: 'timestamp', nullable: true })
  deleted_at: Date | null;

  @OneToMany(() => Payment, (payment) => payment.formapay)
  payments: Payment[];

  static readonly EFECTIVO = '0';
  static readonly TRANSFERENCIA = '1';

  isTransferencia(): boolean {
    return this.type === Formapay.TRANSFERENCIA;
  }

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.name) this.name = this.name.trim().toUpperCase();
  }
}
