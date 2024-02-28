<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<p class="card-description">
Silahkan masukan data pengguna pada form dibawah ini.
</p>
<form class="mt-3" method="POST">
<?=csrf_field();?>
<div class="form-group row">
    <label for="txtEmail" class="col-md-2">Email</label>
    <div class="col-md-10">
        <input type="email" id="txtEmail" name="txtEmail" class="form-control" placeholder="Masukan email" <?=isset($detailPengguna[0]['email']) ? 'readonly' :'autofocus';?> autocomplete="off" value="<?=isset($detailPengguna[0]['email']) ? $detailPengguna[0]['email'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtNama" class="col-md-2">Nama Pengguna</label>
    <div class="col-md-10">
        <input type="text" id="txtNama" name="txtNama" class="form-control" placeholder="Masukan nama pengguna"  <?=isset($detailPengguna[0]['email']) ? 'autofocus' :null;?>  autocomplete="off" value="<?=isset($detailPengguna[0]['nama']) ? $detailPengguna[0]['nama'] : null;?>" required/>
    </div>
</div>

<div class="form-group row">
    <label for="txtPassword" class="col-md-2">Password</label>
    <div class="col-md-10">
        <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Masukan nama password" autocomplete="off"/>
    </div>
</div>

<div class="form-group row">
    <label for="txtNama" class="col-md-2">Level Pengguna</label>
    <div class="col-md-10">
        <?php
            isset($detailPengguna[0]['level']) && $detailPengguna[0]['level']=='admin' ? $pilihAdmin='selected' : $pilihAdmin=null;
            isset($detailPengguna[0]['level']) && $detailPengguna[0]['level']=='petugas' ? $pilihPetugas='selected' : $pilihPetugas=null;

        ?>
            <select class="form-control" name="opsiLevelPengguna" required>
                <option <?=$pilihAdmin;?> value="admin">Administrator</option>
                <option <?=$pilihPetugas;?> value="petugas">Petugas</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-3">
     <button class="btn btn-primary btn-sm">Simpan Data</button>   
    </div>
</div>
</form>


<?=$this->endSection();?>