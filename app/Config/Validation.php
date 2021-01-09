<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'nama_toko' => [
			'rules' => 'required|min_length[3]',
		],

		'email' => [
			'rules' => 'required|min_length[5]',
		],

		'password' => [
			'rules' => 'required',
		],
		'repeatpassword' => [
			'rules' => 'required|matches[password]',
		],
	];
	public $register_errors = [
		'username' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimal 5 karakter',
		],

		'nama_toko' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimal 3 karakter',
		],

		'email' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimal 5 karakter',
		],

		'password' => [
			'required' => '{field} Harus Diisi',
		],
		'repeatpassword' => [
			'required' => '{field} Harus Diisi',
			'matches' => '{field} Tidak Match Dengan Password',
		],
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimal 5 karakter',
		],
		'password' => [
			'required' => '{field} Harus Diisi',
		],
	];

	public $barang = [
		'nama_produk' => [
			'rules' => 'required|min_length[3]',
		],
		'stok' => [
			'rules' => 'required|is_natural',
		],
		'harga' => [
			'rules' => 'required|is_natural',
		],
		'gambar_produk' => [
			'rules' => 'uploaded[gambar_produk]',
		],
		'deskripsi_produk' => [
			'rules' => 'required|min_length[3]',
		],
	];

	public $barang_errors = [
		'nama_produk' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimum 3 karakter',
		],
		'stok' => [
			'required' => '{field} Harus Diisi',
			'is_natural' => '{field} Tidak boleh negatif',
		],
		'harga' => [
			'required' => '{field} Harus Diisi',
			'is_natural' => '{field} Tidak boleh negatif',
		],
		'gambar_produk' => [
			'uploaded' => '{field} Harus di upload',
		],
		'deskripsi_produk' => [
			'required' => '{field} Harus Diisi',
		],
	];

	public $barangupdate = [
		'nama_produk' => [
			'rules' => 'required|min_length[3]',
		],
		'stok' => [
			'rules' => 'required|is_natural',
		],
		'harga' => [
			'rules' => 'required|is_natural',
		],
		'deskripsi_produk' => [
			'rules' => 'required|min_length[3]',
		],
	];

	public $barangupdate_errors = [
		'nama_produk' => [
			'required' => '{field} Harus Diisi',
			'min_length' => '{field} Minimum 3 karakter',
		],
		'stok' => [
			'required' => '{field} Harus Diisi',
			'is_natural' => '{field} Tidak boleh negatif',
		],
		'harga' => [
			'required' => '{field} Harus Diisi',
			'is_natural' => '{field} Tidak boleh negatif',
		],
		'deskripsi_produk' => [
			'required' => '{field} Harus Diisi',
		],
	];

	public $transaksi = [
		'total' => [
			'rules' => 'required',
		],
		'produk_id' => [
			'rules' => 'required',
		],
		'user_id' => [
			'rules' => 'required',
		],
		'waktu_pinjam' => [
			'rules' => 'required',
		],
		'waktu_kembali' => [
			'rules' => 'required',
		],
		'jumlah' => [
			'rules' => 'required',
		],
		'alamat' => [
			'rules' => 'required',
		],
	];
	public $pengembalian = [
		'transaksi_id' => [
			'rules' => 'required',
		],
		'status' => [
			'rules' => 'required',
		],
		'gambar_bukti' => [
			'rules' => 'uploaded[gambar_bukti]',
		],
	];
	public $pengembalian_errors = [
		'transaksi_id' => [
			'required' => '{field} Harus Diisi',
		],
		'status' => [
			'required' => '{field} Harus Diisi',
		],
		'gambar_bukti' => [
			'uploaded' => '{field} Harus di upload',
		],
	];
	public $pesan = [
		'user_id' => [
			'rules' => 'required',
		],
		'produk_id' => [
			'rules' => 'required',
		],
		'toko_id' => [
			'rules' => 'required',
		],
		'status' => [
			'rules' => 'required',
		],
	];
	public $pesan_errors = [
		'user_id' => [
			'rules' => '{field} Harus Diisi',
		],
		'produk_id' => [
			'rules' => '{field} Harus Diisi',
		],
		'toko_id' => [
			'rules' => '{field} Harus Diisi',
		],
		'status' => [
			'rules' => '{field} Harus Diisi',
		],
	];

	public $pesanupdate = [
		'status' => [
			'rules' => 'required',
		],
	];


	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
