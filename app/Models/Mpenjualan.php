<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpenjualan extends Model
{
    protected $table            = 'penjualan';
    protected $primaryKey       = 'PenjualanID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['PenjualanID','TanggalPenjualan','TotalHarga','PelangganID'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function totalPendapatanHariIni(){
        $penjualan = NEW Mpenjualan;
        $penjualan->select('sum(TotalHarga) as TotalPendapatan');
        $penjualan->groupby('TanggalPenjualan');
        $penjualan->where('Year(TanggalPenjualan)',date('Y'));
        $penjualan->where('Month(TanggalPenjualan)',date('m'));
        $penjualan->where('Day(TanggalPenjualan)',date('d'));
        return $penjualan->findAll();
    }

    public function totalPendapatanBulaniIni(){
        $penjualan = NEW Mpenjualan;
        $penjualan->select('sum(TotalHarga) as TotalPendapatan');
        $penjualan->groupby('TanggalPenjualan');
        $penjualan->where('Year(TanggalPenjualan)',date('Y'));
        $penjualan->where('Month(TanggalPenjualan)',date('m'));
        return $penjualan->findAll();
    }

    public function pendapatanBlnSebelumnya(){
        $penjualan = NEW Mpenjualan;
        $penjualan->select("Concat(Year(TanggalPenjualan),'-',MONTH(TanggalPenjualan)) as Periode,sum(TotalHarga) as TotalPendapatan");
        $penjualan->groupby("Concat(Year(TanggalPenjualan),'-',MONTH(TanggalPenjualan))");
        $penjualan->orderby("Concat(Year(TanggalPenjualan),'-',MONTH(TanggalPenjualan))","desc",false);
        $penjualan->limit(2);   
        return $penjualan->find();
    }

    public function sourceGrafikTrendPenualan($tahun){
        /*  select MONTH(TanggalPenjualan) as Periode , CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan)) As 
        PeriodeTahun, SUM(TotalHarga)  as TotalPendapatan
            From Penjualan  
            WHERE YEAR(TanggalPenjualan)='2024'
        GROUP BY CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan));*/

        $penjualan = NEW Mpenjualan;
        $penjualan->select(" MONTH(TanggalPenjualan) as Periode , CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan)) As 
        PeriodeTahun, SUM(TotalHarga)  as TotalPendapatan");
		$penjualan->groupby("MONTH(TanggalPenjualan)");
        $penjualan->groupby("CONCAT(MONTH(TanggalPenjualan),'/',YEAR(TanggalPenjualan))");
		$penjualan->orderby('MONTH(TanggalPenjualan)','asc');
        $penjualan->where("YEAR(TanggalPenjualan)",$tahun);
        return $penjualan->find();
    }


    public function laporanPendapatan($jenis,$periode){
        /* select penjualan.TanggalPenjualan,
            detailpenjualan.JumlahProduk * Produk.Harga AS HargaJual,
            detailpenjualan.JumlahProduk * Produk.HargaBeli AS HargaBeli,
            (detailpenjualan.JumlahProduk * Produk.Harga)-(detailpenjualan.JumlahProduk * Produk.HargaBeli) AS Margin
            FROM penjualan
            JOIN detailpenjualan On Penjualan.PenjualanID=detailpenjualan.PenjualanID
            JOIN Produk On Produk.ProdukID=detailpenjualan.ProdukID 
            Where Penjualan.TanggalPenjualan='2024-02-02';*/

        if($jenis=='harian'){
            $penjualan=NEW Mpenjualan;
            $penjualan->select('penjualan.TanggalPenjualan,
            (detailpenjualan.JumlahProduk * produk.Harga) AS HargaJual,
            (detailpenjualan.JumlahProduk * produk.HargaBeli) AS HargaBeli,
            (detailpenjualan.JumlahProduk * produk.Harga)-(detailpenjualan.JumlahProduk * produk.HargaBeli) AS Margin');
            $penjualan->join('detailpenjualan','penjualan.PenjualanID=detailpenjualan.PenjualanID');
            $penjualan->join('produk','produk.ProdukID=detailpenjualan.ProdukID');
            $penjualan->where('penjualan.TanggalPenjualan',$periode);

        } else if($jenis=='bulanan'){
            $periodeTemp=explode('-',$periode);
            $periodeBln=$periodeTemp[0].'-'.$periodeTemp[1];
            /*  select penjualan.TanggalPenjualan,
            sum(detailpenjualan.JumlahProduk * produk.Harga) AS HargaJual,
            sum(detailpenjualan.JumlahProduk * produk.HargaBeli) AS HargaBeli,
            sum((detailpenjualan.JumlahProduk * produk.Harga)-(detailpenjualan.JumlahProduk * produk.HargaBeli)) AS Margin
            FROM penjualan
            JOIN detailpenjualan On penjualan.PenjualanID=detailpenjualan.PenjualanID
            JOIN produk On produk.ProdukID=detailpenjualan.ProdukID 
            Where penjualan.TanggalPenjualan like '2024-01%'
			GROUP BY TanggalPenjualan, 
            (detailpenjualan.JumlahProduk * produk.Harga),
            (detailpenjualan.JumlahProduk * produk.HargaBeli),
            (detailpenjualan.JumlahProduk * produk.Harga)-(detailpenjualan.JumlahProduk * produk.HargaBeli);;*/
            
            $penjualan=NEW Mpenjualan;
            $penjualan->select('penjualan.TanggalPenjualan,
            sum(detailpenjualan.JumlahProduk * produk.Harga) AS HargaJual,
            sum(detailpenjualan.JumlahProduk * produk.HargaBeli) AS HargaBeli,
            sum((detailpenjualan.JumlahProduk * produk.Harga)-(detailpenjualan.JumlahProduk * produk.HargaBeli)) AS Margin');
            $penjualan->join('detailpenjualan','penjualan.PenjualanID=detailpenjualan.PenjualanID');
            $penjualan->join('produk','produk.ProdukID=detailpenjualan.ProdukID');
            $penjualan->groupby('TanggalPenjualan');
			$penjualan->groupby('(detailpenjualan.JumlahProduk * produk.Harga)');
			$penjualan->groupby('(detailpenjualan.JumlahProduk * produk.HargaBeli)');
			$penjualan->groupby('(detailpenjualan.JumlahProduk * produk.Harga)-(detailpenjualan.JumlahProduk * produk.HargaBeli)');
			
            $penjualan->like('TanggalPenjualan',$periodeBln);

        } else {

        }
            return $penjualan->findAll();
    }

}
