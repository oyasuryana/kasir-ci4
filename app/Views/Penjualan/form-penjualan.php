<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>

<p class="card-description">
                    Tanggal : <?=date('d-M-Y');?>  .::.  Waktu : <?=date('H-i-s');?>  .::. Kasir : Ade .::. No. Faktur : 000001
                  </p>
<hr/>
<div class="row">
    <div class=" col-sm-12">
        <?=session()->getFlashdata('pesan');?>
    </div>
</div>


<div class="row">


    <div class="col-sm-5">
    <!-- kolom 1 -->
    <form method="POST">
    <div class="form-group">
        <label for="exampleInputUsername2"><strong>Pelanggan</strong></label>
            <select class="form-control" name="opsiPelanggan" readonly>
                <option>-- Pilih Pelangan --</option>
                <?php
                if(isset($listPelanggan)){
                    foreach($listPelanggan as $row){
                        session()->get('IdPelanggan')==$row['PelangganID'] ? $pilihPelanggan='selected' : $pilihPelanggan=null;  
                        echo '<option '.$pilihPelanggan.' value="'.$row['PelangganID'].'">'.$row['NamaPelanggan'].'</option>';
                    }
                }

                ?>
            </select>
    </div>

    <div class="form-group">
        <label for="exampleInputUsername2"><strong>Produk</strong></label>
            <select class="form-control" name="opsiProduk">
                <option>-- Pilih Produk --</option>`
                <?php
                if(isset($listProduk)){
                    foreach($listProduk as $row){
                        if($row['Stok']>0){
                            echo '<option value="'.$row['ProdukID'].'">'.$row['NamaProduk'].' ('.$row['Stok'].') - Rp.'.$row['HargaBeli'].'</option>';
                        }
                    }
                }

                ?>
            </select>
    </div>

    <div class="form-group">
        <label for="txtJumlahJual"><strong>Jumlah Barang</strong></label>
            <input type="text" class="form-control uang" name="txtJumlahJual" id="txtJumlahJual" placeholder="Jumlah barang dijual" autocomplete="off">
    </div>

        <button type="submit" class="btn btn-primary btn-sm me-2">Simpan</button>
        <?php
        session()->get('IdPelanggan')==null ? $tombolBayarNonAktif='style="pointer-events: none"' : $tombolBayarNonAktif=null;
        ?>
        <a href="<?=site_url('/bayar');?>" <?=$tombolBayarNonAktif;?> class="btn btn-success btn-sm me-2">Pembayaran</a>
    </form>

    <!-- end kolom 1 -->
    </div>

    <div class="col-sm-7">
    <!-- kolom 2 -->

    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
          <?php
          if(isset($listProdukTerjual)) {
            $no=null;
            $total=null;
            foreach($listProdukTerjual as $row){
                $no++;
                echo '<tr>
                <td>'.$row['NamaProduk'].'</td>
                <td align="right">'.$row['JumlahProduk'].'</td>
                <td align="right">Rp. '.number_format($row['Subtotal'],2,',','.').'</td>
                </tr>';
                $total = $total+$row['Subtotal'];

            }
          }
          ?>
        </tbody>
    </table>
    <h4 align="right" class="mt-4"><strong>Total Harga : Rp. <?=number_format($total,2,',','.');?></strong></h4>
        
    <!-- end kolom 2 -->
    </div>
</div>









<?=$this->endSection();?>