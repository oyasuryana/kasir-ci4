<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Laporan Stok Barang - Toko Kita</title>  

</head>  

<body>  
<h2 align="center">TOKO KITA<br/>Laporan Stok Barang</h2>  
<p  align="center">Per Tanggal <?=date('d M Y');?>
<table border="1" width="100%" cellpadding="2" cellspacing="0" style="margin-top: 5px;">  
    <thead>    
        <tr bgcolor="silver" align="center">  
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
                foreach($listProduk as $row) :
                $no++;    
            ?>        
            <tr>
                <td align="right"><?=$no;?>.</td>  
                <td><?=$row['NamaProduk'];?></td>  
                <td align="right">Rp. <?=number_format($row['HargaBeli'],2,',','.');?></td>  
                <td align="right">Rp. <?=number_format($row['Harga'],2,',','.');?></td>  
                <td align="right"><?=number_format($row['Stok'],0,',','.');?></td>  
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>  
</body>  

</html>