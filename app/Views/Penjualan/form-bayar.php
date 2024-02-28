<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<p class="card-description">
Silahkan masukan data pembayaran  pada form dibawah ini.
</p>

<div class="form-group row">
    <label for="txtHargaBeli" class="col-md-3">Harga Pembelian</label>
    <div class="col-md-9">
        <input type="text" id="txtHargaBeli" name="txtHargaBeli" class="form-control" placeholder="Masukan harga beli produk"  value ="<?=number_format($detailPenjualan[0]['TotalHarga'],0,'.',',');?>"readonly/>
    </div>
</div>

<div class="form-group row">
    <label for="txtUangBayar" class="col-md-3">Pembayaran</label>
    <div class="col-md-9">
        
        <input type="text" id="txtUangBayar" name="txtUangBayar" class="form-control uang" placeholder="Masukan jumlah pembayaran" autofocus autocomplete="off" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtUangKembali" class="col-md-3">Kembali</label>
    <div class="col-md-9">
        <input type="text" id="txtUangKembali" name="txtUangKembali" class="form-control uang"    required/>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-3">
     <a href="<?=site_url('/selesai-bayar');?>" class="btn btn-primary btn-sm">B A Y A R</a>   
    </div>
</div>


<?=$this->endSection();?>