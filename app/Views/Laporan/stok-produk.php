<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<p>Berikut laporan Stok Barang sampai dengan tanggal <?=date('d M Y');?>.</p>
<p><a href="<?=site_url('/download-pdf  ');?>" class="btn btn-sm btn-danger">Download PDF</a></p>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($listProduk)) :
            $no=null;
            $html=null;
            foreach($listProduk as $row):
                $no++;
                $html .='<tr>';
                $html .='<td class="text-left">'.$no.'.</td>';
                $html .='<td>'.$row['NamaProduk'].'</td>';
                $html .='<td align="right">'.number_format($row['HargaBeli'],2,',','.').'</td>';
                $html .='<td align="right">'.number_format($row['Harga'],2,',','.').'</td>';
                $html .='<td class="text-center">'.$row['Stok'].'</td>';
                $html .='</tr>';
            endforeach;
            echo $html;        
        endif;    
        ?>

        </tbody>
    </table>
</div>


<?=$this->endSection();?>