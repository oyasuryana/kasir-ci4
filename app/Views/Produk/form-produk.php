<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<p class="card-description">
Silahkan masukan data produk pada form dibawah ini.
</p>
<form class="mt-3" method="POST">
<?=csrf_field();?>
<div class="form-group row">
    <label for="txtNamaProduk" class="col-md-3">Nama Produk</label>
    <div class="col-md-9">
        <!--<input type="hidden" name="txtProdukId" value="<?=isset($detailProduk[0]['ProdukID']) ? $detailProduk[0]['ProdukID'] : null;?>" />-->
        
        <input type="text" id="txtNamaProduk" name="txtNamaProduk" class="form-control" placeholder="Masukan nama produk" autofocus autocomplete="off" value="<?=isset($detailProduk[0]['NamaProduk']) ? $detailProduk[0]['NamaProduk'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtHargaBeliProduk" class="col-md-3">Harga Beli Produk</label>
    <div class="col-md-9">
        
        <input type="text" id="txtHargaBeliProduk" name="txtHargaBeliProduk" class="form-control uang" placeholder="Masukan harga beli produk"  autocomplete="off" value="<?=isset($detailProduk[0]['HargaBeli']) ? $detailProduk[0]['HargaBeli'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtHargaJualProduk" class="col-md-3">Harga Jual Produk</label>
    <div class="col-md-9">
        <input type="text" id="txtHargaJualProduk" name="txtHargaJualProduk" class="form-control uang" placeholder="Masukan harga jual produk"   autocomplete="off" value="<?=isset($detailProduk[0]['Harga']) ? $detailProduk[0]['Harga'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtStokProduk" class="col-md-3">Persediaan Produk (Stok) </label>
    <div class="col-md-9">
        <input type="text" id="txtStokProduk" name="txtStokProduk" class="form-control uang" value="<?=isset($detailProduk[0]['Stok']) ? $detailProduk[0]['Stok'] : null;?>" placeholder="Masukan stok barang" autocomplete="off"/>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-3">
     <button class="btn btn-primary btn-sm">Simpan Data</button>   
    </div>
</div>
</form>


<?=$this->endSection();?>