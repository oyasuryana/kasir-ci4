<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<?=session()->getFlashdata('pesan');?>

<p><a href="<?=site_url('/tambah-produk');?>" class="btn btn-sm btn-primary">Tambah Produk</a></p>
<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
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
                $html .='<td class="text-center">
                        <a href="'.site_url('/edit-produk/'.md5($row['ProdukID'])).'"><i span class="mdi mdi-apps menu-icon-outline"></i></a>

                        <a href="'.site_url('/hapus-produk/'.md5($row['ProdukID'])).'" data-confirm="Anda yakin ?"><i span class="mdi mdi-alert-outline text-danger"></i></a>
                        
                        </td>';
                $html .='</tr>';
            endforeach;
            echo $html;        
        endif;    
        ?>
        </tbody>   
    </table>
</div>


<?=$this->endSection();?>