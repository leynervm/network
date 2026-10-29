import {
  Entity,
  PrimaryGeneratedColumn,
  Column,
  ManyToOne,
  JoinColumn,
  Index,
  BeforeInsert,
  BeforeUpdate,
} from 'typeorm';
import { Formapay } from './Formapay.js';

@Entity('payments')
@Index('payments_paymentable_type_paymentable_id_index', ['paymentable_type', 'paymentable_id'])
export class Payment {
  @PrimaryGeneratedColumn({ type: 'bigint' })
  id: number;

  @Column({ type: 'timestamp' })
  @Index('payments_date_index')
  date: Date | string;

  @Column({ type: 'char', length: 7 })
  @Index('payments_month_index')
  month: string;

  @Column({ type: 'decimal', precision: 12, scale: 2 })
  amount: number;

  @Column({ type: 'varchar', length: 255, nullable: true })
  codetransferencia: string | null;

  @Column({ type: 'text', nullable: true })
  detalle: string | null;

  @Column({ type: 'smallint' })
  formapay_id: number;

  @Column({ type: 'varchar', length: 255 })
  paymentable_type: string;

  @Column({ type: 'bigint' })
  paymentable_id: number;

  @ManyToOne(() => Formapay, (formapay) => formapay.payments)
  @JoinColumn({ name: 'formapay_id' })
  formapay: Formapay;

  @BeforeInsert()
  @BeforeUpdate()
  formatAttributes() {
    if (this.codetransferencia) this.codetransferencia = this.codetransferencia.trim().toUpperCase();
    if (this.detalle) this.detalle = this.detalle.trim().toUpperCase();
  }
}
