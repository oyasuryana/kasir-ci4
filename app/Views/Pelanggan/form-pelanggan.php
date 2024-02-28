<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<p class="card-description">
Silahkan masukan data pengguna pada form dibawah ini.
</p>
<form class="mt-3" method="POST">
<?=csrf_field();?>
<div class="form-group row">
    <label for="txtNamaPelanggan" class="col-md-3">Nama Pelanggan</label>
    <div class="col-md-9">
        <input type="text" id="txtNamaPelanggan" name="txtNamaPelanggan" class="form-control" placeholder="Masukan nama pelanggan" <?=isset($detailPelanggan[0]['NamaPelanggan']) ? 'readonly' :'autofocus';?> autocomplete="off" value="<?=isset($detailPelanggan[0]['NamaPelanggan']) ? $detailPelanggan[0]['NamaPelanggan'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtNoTelpPelanggan" class="col-md-3">Nomor Telepon Pelanggan</label>
    <div class="col-md-9">
        <input type="text" id="txtNoTelpPelanggan" name="txtNoTelpPelanggan" class="form-control" placeholder="Masukan nama pelanggan"  <?=isset($detailPelanggan[0]['NomorTelepon']) ? 'autofocus' :null;?>  autocomplete="off" value="<?=isset($detailPelanggan[0]['NomorTelepon']) ? $detailPelanggan[0]['NomorTelepon'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtPassword" class="col-md-3">Alamat</label>
    <div class="col-md-9">
        <input type="text" id="txtAlamatPelanggan" name="txtAlamatPelanggan" class="form-control" placeholder="Masukan alamat pelanggan" value="<?=isset($detailPelanggan[0]['Alamat']) ? $detailPelanggan[0]['Alamat'] : null;?>" autocomplete="off" required/>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-3">
     <button class="btn btn-primary btn-sm">Simpan Data</button>   
    </div>
</div>
</form>


<?=$this->endSection();?>