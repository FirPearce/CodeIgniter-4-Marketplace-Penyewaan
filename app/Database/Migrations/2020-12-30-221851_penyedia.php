<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyedia extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'username'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
			'nama_toko'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
			'email'            => ['type' => 'varchar', 'constraint' => 255],
			'password'    => ['type' => 'varchar', 'constraint' => 255],
			'no_hp'         => ['type' => 'varchar', 'constraint' => 13, 'null' => true],
			'alamat_toko'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'toko_image'       => ['type' => 'varchar', 'constraint' => 255, 'default' => 'Store.png'],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addUniqueKey('username');
		$this->forge->addUniqueKey('email');
		$this->forge->addUniqueKey('no_hp');
		$this->forge->createTable('toko', true);

		$this->forge->addField([
			'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nama_produk'         => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
			'stok'         => ['type' => 'int', 'constraint' => 10, 'null' => true],
			'harga'         => ['type' => 'int', 'constraint' => 10, 'null' => true],
			'deskripsi_produk'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'toko_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey(['toko_id']);
		$this->forge->addForeignKey('toko_id', 'toko', 'id', false, 'CASCADE');
		$this->forge->createTable('produk', true);

		$this->forge->addField([
			'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'nama_kategori'         => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
			'deskripsi_kategori'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'produk_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey(['produk_id']);
		$this->forge->addForeignKey('produk_id', 'produk', 'id', false, 'CASCADE');
		$this->forge->createTable('kategori', true);

		$this->forge->addField([
			'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'no_pembayaran'         => ['type' => 'int', 'constraint' => 10, 'null' => true],
			'total'         => ['type' => 'int', 'constraint' => 10, 'null' => true],
			'waktu_pinjam'         => ['type' => 'datetime', 'null' => true],
			'waktu_kembali'         => ['type' => 'datetime', 'null' => true],
			'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'produk_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey(['produk_id', 'user_id']);
		$this->forge->addUniqueKey('no_pembayaran');
		$this->forge->addForeignKey('produk_id', 'produk', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
		$this->forge->createTable('transaksi', true);

		$this->forge->addField([
			'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
			'transaksi_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'status'			=> ['type' => 'varchar', 'constraint' => 30, 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey(['transaksi_id']);
		$this->forge->addForeignKey('transaksi_id', 'transaksi', 'id', false, 'CASCADE');
		$this->forge->createTable('pengembalian', true);

		$this->forge->addField([
			'transaksi_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'produk_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
		]);
		$this->forge->addKey(['produk_id', 'transaksi_id']);
		$this->forge->addForeignKey('produk_id', 'produk', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('transaksi_id', 'transaksi', 'id', false, 'CASCADE');
		$this->forge->createTable('transaksi_produk', true);


		$this->forge->addField([
			'kategori_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'produk_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
		]);
		$this->forge->addKey(['kategori_id', 'produk_id']);
		$this->forge->addForeignKey('kategori_id', 'kategori', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('produk_id', 'produk', 'id', false, 'CASCADE');
		$this->forge->createTable('kategori_produk', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('toko', true);
		$this->forge->dropTable('kategori', true);
		$this->forge->dropTable('produk', true);
		$this->forge->dropTable('transaksi', true);
		$this->forge->dropTable('pengembalian', true);
		$this->forge->dropTable('transaksi_produk', true);
		$this->forge->dropTable('kategori_produk', true);
		//
	}
}
