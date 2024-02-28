<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
            $data=[
                'judulHalaman'=>'<i class="mdi mdi-apps menu-icon-outline"></i> Daftar Produk',
                'listProduk'=>$this->produk->findAll()
            ];
            return view('Produk/daftar-produk',$data);
    }

    public function hapusProduk($idProduk){
        $this->produk->where(['md5(ProdukID)'=>$idProduk])->delete();
        return redirect()->to(site_url('/produk'))->with('pesan','<div class="alert alert-warning">Produk berhasil dihapus</div>');
    }

    public function tambahProduk($idProduk=null){
        $data=[
            'judulHalaman'=>'<i class="mdi mdi-apps menu-icon-outline"></i> Form Produk',
            'detailProduk'=>isset($idProduk) ? $this->produk->where(['md5(ProdukID)'=>$idProduk])->find() : null
        ];

        $valdasiForm=[
            'txtNamaProduk'=>'required',
            'txtHargaBeliProduk'=>'required',
            'txtHargaJualProduk'=>'required',
            'txtStokProduk'=>'required'
        ];

        if($this->validate($valdasiForm)){
            $cekProduk=$this->produk->where(['md5(ProdukID)'=>$idProduk])->findAll();
            
            // str_replace membuang tanda titik
            $dataProduk=[
                'NamaProduk'=>$this->request->getPost('txtNamaProduk'),
                'Harga'=>str_replace('.','',$this->request->getPost('txtHargaJualProduk')), 
                'HargaBeli'=>str_replace('.','',$this->request->getPost('txtHargaBeliProduk')), 
                'Stok'=>str_replace('.','',$this->request->getPost('txtStokProduk')),
            ];

            if(count($cekProduk)==0){
                if(str_replace('.','',$this->request->getPost('txtHargaJualProduk')) <= str_replace('.','',$this->request->getPost('txtHargaBeliProduk') )) {
                    
                return redirect()->to(site_url('/produk'))->with('pesan','<div class="alert alert-warning">Harga Juak lebih kecil dari harga beli</div>');
                    
                  }  else {
                    
                     $cekNamaProduk=$this->produk->where(['NamaProduk'=>$this->request->getPost('txtNamaProduk')])->findAll();
                    
                    if(count($cekNamaProduk)==0){
                        $this->produk->insert($dataProduk);
                    } else {
                       return redirect()->to(site_url('/produk'))->with('pesan','<div class="alert alert-warning">Produk dengan nama '.$this->request->getPost('txtNamaProduk').' sudah ada</div>');   
                        
                    }
                     
                     return redirect()->to(site_url('/produk'))->with('pesan','<div class="alert alert-success">Produk berhasil disimpan</div>');
                  }
                
            
                
            } else {
                $this->produk->update($cekProduk[0]['ProdukID'],$dataProduk);
                
                return redirect()->to(site_url('/produk'))->with('pesan','<div class="alert alert-success">Produk berhasil disimpan</div>');
            }


        }    
        return view('Produk/form-produk',$data);

    }
}
