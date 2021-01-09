 <?= $this->extend('templates/template'); ?>

 <?= $this->section('content'); ?>
 <?php

  $total = [
    'name' => 'total',
    'id' => 'total',
    'value' => NULL,
    'class' => 'form-control',
    'readonly' => true,
  ];
  $waktu_pinjam = [
    'name' => 'waktu_pinjam',
    'id' => 'waktu_pinjam',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date',
  ];
  $waktu_kembali = [
    'name' => 'waktu_kembali',
    'id' => 'waktu_kembali',
    'value' => null,
    'class' => 'form-control',
    'type' => 'date',
  ];
  $user_id = [
    'name' => 'user_id',
    'id' => 'user_id',
    'value' => user()->id,
    'type' => 'hidden'
  ];

  $produk_id = [
    'name' => 'produk_id',
    'id' => 'produk_id',
    'value' => $produkz->id,
    'type' => 'hidden'
  ];

  $jumlah = [
    'name' => 'jumlah',
    'id' => 'jumlah',
    'value' => 1,
    'min' => 1,
    'class' => 'form-control',
    'type' => 'number',
    'max' => $produkz->stok,
  ];

  $alamat = [
    'name' => 'alamat',
    'id' => 'alamat',
    'class' => 'form-control',
    'value' => null,
  ];
  $ongkir = [
    'name' => 'ongkir',
    'id' => 'ongkir',
    'value' => 12000,
    'class' => 'form-control',
    'type' => 'number',
    'readonly' => true,
  ];

  $submit = [
    'name' => 'submit',
    'id' => 'submit',
    'type' => 'submit',
    'value' => 'Sewa',
    'class' => 'btn btn-success',
  ];
  ?>

 <div class="container mt-5">
   <h2 class="text-white pb-2">Barang Yang Dipilih</h2>
   <div class="row">
     <div class="col-6">
       <div class="card">
         <div class="card-body">
           <img class="img-fluid" src="<?= base_url('uploads/' . $produkz->gambar_produk) ?>" />
           <h1 class="text-success"><?= $produkz->nama_produk ?></h1>
           <h4> Harga : <?= $produkz->harga ?></h4>
           <h4> Stok : <?= $produkz->stok ?></h4>
         </div>
       </div>
     </div>
     <div class="col-6">
       <hr class="bg-white">
       <?= form_open('user/cart') ?>
       <?= form_input($produk_id) ?>
       <?= form_input($user_id) ?>
       <div class="form-group text-white">
         <?= form_label('Jumlah Pembelian', 'jumlah',) ?>
         <?= form_input($jumlah) ?>
       </div>
       <div class="form-group text-white">
         <?= form_label('Waktu Pinjam', 'waktu_pinjam',) ?>
         <?= form_input($waktu_pinjam) ?>
       </div>
       <div class="form-group text-white">
         <?= form_label('Waktu Kembali', 'waktu_kembali',) ?>
         <?= form_input($waktu_kembali) ?>
       </div>
       <div class="form-group text-white">
         <?= form_label('Ongkir', 'ongkir') ?>
         <?= form_input($ongkir) ?>
       </div>
       <div class="form-group text-white">
         <?= form_label('Total Harga', 'total') ?>
         <?= form_input($total) ?>
       </div>
       <div class="form-group text-white">
         <?= form_label('Alamat', 'alamat') ?>
         <?= form_input($alamat) ?>
       </div>
       <div class="text-right">
         <?= form_submit($submit) ?>
       </div>
       <?= form_close() ?>
     </div>
   </div>
 </div>
 <?= $this->endSection(); ?>
 <?= $this->section('script') ?>

 <script>
   $("#jumlah").on("change", function() {
     jumlah_pembelian = $("#jumlah").val();
     if (jumlah_pembelian <= 0) {
       jumlah_pembelian = 1;
     }
     var waktu_pinjam = new Date($('#waktu_pinjam').val());
     var waktu_kembali = new Date($('#waktu_kembali').val());
     var ongkirr = parseInt($('#ongkir').val());
     var lama = waktu_kembali.getTime() - waktu_pinjam.getTime();
     var hasil = lama / (1000 * 3600 * 24);
     var harga = <?= $produkz->harga ?>;
     var total = (jumlah_pembelian * harga * hasil + ongkirr);
     $("#total").val(total);
   });
   $("#waktu_pinjam").on("change", function() {
     jumlah_pembelian = $("#jumlah").val();
     if (jumlah_pembelian <= 0) {
       jumlah_pembelian = 1;
     }
     var waktu_pinjam = new Date($('#waktu_pinjam').val());
     var waktu_kembali = new Date($('#waktu_kembali').val());
     var ongkirr = parseInt($('#ongkir').val());
     var lama = waktu_kembali.getTime() - waktu_pinjam.getTime();
     var hasil = lama / (1000 * 3600 * 24);
     var harga = <?= $produkz->harga ?>;
     var total = (jumlah_pembelian * harga * hasil + ongkirr);
     $("#total").val(total);
   });
   $("#waktu_kembali").on("change", function() {
     jumlah_pembelian = $("#jumlah").val();
     if (jumlah_pembelian <= 0) {
       jumlah_pembelian = 1;
     }
     var waktu_pinjam = new Date($('#waktu_pinjam').val());
     var waktu_kembali = new Date($('#waktu_kembali').val());
     var ongkirr = parseInt($('#ongkir').val());
     var lama = waktu_kembali.getTime() - waktu_pinjam.getTime();
     var hasil = lama / (1000 * 3600 * 24);
     var harga = <?= $produkz->harga ?>;
     var total = (jumlah_pembelian * harga * hasil + ongkirr);
     $("#total").val(total);
   });
 </script>

 <?= $this->endSection(); ?>