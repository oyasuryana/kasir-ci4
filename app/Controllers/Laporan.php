<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public function index()
    {
        $data=[
            'judulHalaman'=>'<i class="mdi mdi-archive-outline"></i> Laporan Stok Produk',
            'listProduk'=>$this->produk->orderby('Stok','asc')->findAll()
        ];
        return view('Laporan/stok-produk',$data);
    }

    public function laporanPendapatan(){
        $data=[
            'judulHalaman'=>'<i class="mdi mdi-archive-outline"></i> Laporan Pendapatan',
        ];    

        $formValidation=[
            'opsiJenisLaporan'=>'required',
            'txtTanggalLaporan'=>'required'
        ];

        if($this->validate($formValidation)){
            $dataLaporan=[
                'jenisLaporan'=>$this->request->getPost('opsiJenisLaporan'),
                'periodeLaporan'=>$this->request->getPost('txtTanggalLaporan'),
                'listLaporan'=>$this->penjualan->laporanPendapatan($this->request->getPost('opsiJenisLaporan'),$this->request->getPost('txtTanggalLaporan'))
            ];

            $data=array_merge($data,$dataLaporan);
        }

        return view('Laporan/laporan-pendapatan',$data);
    }


    public function downloadPDF(){

        $filename = 'Laporan Stok Barang ';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        
        $data=[
            'listProduk'=>$this->produk->orderby('Stok','asc')->findAll()
        ];
        // load HTML content
        $dompdf->loadHtml(view('Laporan/stok-produk-pdf',$data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

    }
}
