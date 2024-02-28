<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman.' '.(isset($jenisLaporan) ? $jenisLaporan:null);?></h4>

<?php
if(!isset($jenisLaporan)) : ?>
<p class="card-description">
Silahkan jenis dan periode pelaporan pendapatan pada form dibawah ini.
</p>
<form class="mt-3" method="POST">
<?=csrf_field();?>

<div class="form-group row">
    <label for="opsiJenisLaporan" class="col-md-3">Jenis Laporan Pendapatan</label>
    <div class="col-md-9">
            <select class="form-control" name="opsiJenisLaporan" required>
                <option  value="harian">Laporan Harian</option>
                <option  value="bulanan">Laporan Bulanan</option>
                <option  value="tahunan">Laporan Tahunan</option>
            </select>
    </div>
</div>

<div class="form-group row">
    <label for="txtTanggalLaporan" class="col-md-3">Periode Laporan</label>
    <div class="col-md-9">
        <input type="date" id="txtTanggalLaporan" name="txtTanggalLaporan" class="form-control" placeholder="Masukan nama pengguna"  autocomplete="off" value="<?=date('Y-m-d');?>" required/>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-3">
     <button class="btn btn-primary btn-sm">Tampilkan</button>   
    </div>
</div>
</form>

<?php else  :  ?>
<p class="card-description">
Berikut laporan <?=$jenisLaporan;?> untuk periode <?=$periodeLaporan;?>
</p>    
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Penjualan</th>
            <th>Harga Pokok</th>
            <th>Penjualan</th>
            <th>Margin</th>
            <th>% Margin</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($listLaporan)) : 
            $no=null;
            $totalPenjualan=null;
            $totalMargin=null;
            $totalHPP=null;
            foreach($listLaporan as $row) :
                $no++;
                $totalHPP=$totalHPP+$row['HargaBeli'];
                $totalPenjualan=$totalPenjualan+$row['HargaJual'];
                $totalMargin=$totalMargin+$row['Margin'];
        ?>           
            <tr>    
                <td><?=$no;?></td>
                <td><?=$row['TanggalPenjualan'];?></td>
                <td align="right"><?=number_format($row['HargaBeli'],0,',','.');?></td>
                <td align="right"><?=number_format($row['HargaJual'],0,',','.');?></td>
                <td align="right"><?=number_format($row['Margin'],0,',','.');?></td>
                <td align="right"><?=number_format(($row['Margin']/$row['HargaBeli'])*100,2,',','.');?>%</td>

            </tr>
        <?php        
            endforeach;    
        endif;  
        ?>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td align="right"><strong><?=number_format($totalHPP,0,',','.');?></strong></td>
            <td align="right"><strong><?=number_format($totalPenjualan,0,',','.');?></strong></td>
            <td align="right"><strong><?=number_format($totalMargin,0,',','.');?></strong></td>
            <td align="right"><strong><?=($totalHPP==0 ? 0 : number_format(($totalMargin/$totalHPP)*100,2,',','.'));?>%</strong></td>
        </tr>        
    </tfoot>
</table>

<?php if($totalHPP != 0)  :  ?>
<p class="card-description">
<b>Deskrpsi:</b> 
    <br/>Penjualan pada tanggal <?=$periodeLaporan;?> memperoleh pendapatan sebesar <strong>Rp. <?=number_format($totalPenjualan,0,',','.');?></strong>, keuntungan kotor yang diperoleh sebesar <strong>Rp. <?=number_format($totalMargin,0,',','.');?></strong>, persentasi keuntungan dari harga pokok penjualan adalah sebesar <strong><?=number_format(($totalMargin/$totalHPP)*100,2,',','.');?>%</strong>.
</p>
<?php endif; ?>

<?php endif;?>

<?=$this->endSection();?>
