<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<?=session()->getFlashdata('pesan');?>

<p><a href="<?=site_url('/tambah-pelanggan');?>" class="btn btn-sm btn-primary">Tambah Pelanggan</a></p>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Kontak</th>
                <th>Nama Pengguna</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($listPelanggan)) :
            $no=null;
            $html=null;
            foreach($listPelanggan as $row):
                $no++;
                $html .='<tr>';
                $html .='<td class="text-left">'.$no.'</td>';
                $html .='<td>'.$row['NomorTelepon'].'</td>';
                $html .='<td>'.$row['NamaPelanggan'].'</td>';
                $html .='<td>'.$row['Alamat'].'</td>';
                $html .='<td class="text-center">
                        <a href="'.site_url('/edit-pelanggan/'.md5($row['PelangganID'])).'"><i span class="mdi mdi-account-check-outline"></i></a>

                        <a href="'.site_url('/hapus-pelanggan/'.md5($row['PelangganID'])).'" data-confirm="Anda yakin ?"><i span class="mdi mdi-alert-outline text-danger"></i></a>
                        
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