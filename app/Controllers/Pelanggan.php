<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data=[
            'judulHalaman'=>'<i class="mdi mdi-account-box-outline"></i> Daftar Pelanggan',
            'listPelanggan'=>$this->pelanggan->findAll()
        ];
        return view('Pelanggan/daftar-pelanggan',$data);
    }

    public function tambahPelanggan($idPelanggan=null){
        $data=[
            'judulHalaman'=>'<i class="mdi mdi-account-box-outline"></i> Form Pelanggan',
            'detailPelanggan'=>isset($idPelanggan) ? $this->pelanggan->where(['md5(PelangganID)'=>$idPelanggan])->find() : null
        ];

        $valdasiForm=[
            'txtNamaPelanggan'=>'required',
            'txtAlamatPelanggan'=>'required',
            'txtNoTelpPelanggan'=>'required'
        ];

        if($this->validate($valdasiForm)){
            $cekPelanggan=$this->pelanggan->where(['md5(PelangganID)'=>$idPelanggan])->findAll();
            
            $dataPelanggan=[
                'NamaPelanggan'=>$this->request->getPost('txtNamaPelanggan'),
                'Alamat'=>$this->request->getPost('txtAlamatPelanggan'),
                'NomorTelepon'=>$this->request->getPost('txtNoTelpPelanggan')
            ];

            if(count($cekPelanggan)==0){
                $this->pelanggan->insert($dataPelanggan);
            } else {
                $this->pelanggan->update($cekPelanggan[0]['PelangganID'],$dataPelanggan);
            }

            return redirect()->to(site_url('/pelanggan'))->with('pesan','<div class="alert alert-success">Data Pelanggan berhasil disimpan</div>');
        }

        return view('Pelanggan/form-pelanggan',$data);
    }


    public function hapusPelanggan($idPelanggan){
        $this->pelanggan->where(['md5(PelangganID)'=>$idPelanggan])->delete();
        return redirect()->to(site_url('/pelanggan'))->with('pesan','<div class="alert alert-warning">Data Pelanggan berhasil dihapus</div>');
    }



}
