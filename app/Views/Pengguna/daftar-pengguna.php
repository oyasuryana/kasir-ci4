<?=$this->extend('dashboard');?>
<?=$this->section('konten');?>
<h4 class="card-title"><?=$judulHalaman;?></h4>
<?=session()->getFlashdata('pesan');?>

<p><a href="<?=site_url('/tambah-pengguna');?>" class="btn btn-sm btn-primary">Tambah Pengguna</a></p>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Email (Username)</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($listPengguna)) :
            $no=null;
            $html=null;
            foreach($listPengguna as $row):
                $no++;
                $html .='<tr>';
                $html .='<td class="text-left">'.$no.'</td>';
                $html .='<td>'.$row['nama'].'</td>';
                $html .='<td>'.$row['email'].'</td>';
                $html .='<td>'.$row['level'].'</td>';
                $html .='<td class="text-center">
                        <a href="'.site_url('/edit-pengguna/'.md5($row['email'])).'"><i span class="mdi mdi-account-check-outline"></i></a>

                        <a href="'.site_url('/hapus-pengguna/'.md5($row['email'])).'" data-confirm="Anda yakin ?"><i span class="mdi mdi-alert-outline text-danger"></i></a>
                        
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