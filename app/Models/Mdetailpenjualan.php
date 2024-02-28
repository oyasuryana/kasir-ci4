<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdetailpenjualan extends Model
{
    protected $table            = 'detailpenjualan';
    protected $primaryKey       = 'DetailID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['PenjualanID','ProdukID','JumlahProduk','SubTotal'];

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

    public function listBarangTerjual($idPenjualan){
        $detailpenjualan= NEW Mdetailpenjualan;
        $detailpenjualan->select('produk.NamaProduk,
                            produk.Harga, 
                            produk.HargaBeli,
                            detailpenjualan.JumlahProduk,
                            (detailpenjualan.JumlahProduk * produk.Harga) as Subtotal');
        $detailpenjualan->join('produk','detailpenjualan.produkID=produk.ProdukID');
        $detailpenjualan->where('detailpenjualan.PenjualanID',$idPenjualan);
        return $detailpenjualan->findAll();
    }

}
