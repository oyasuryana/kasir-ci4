<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {

        // membuat label sumbu X
        //siapkan aray
        $bulan=[1=>'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nop','Des'];
        $sourceLabelGrafik='[';
        foreach($this->penjualan->sourceGrafikTrendPenualan(date('Y')) as $row){
            $sourceLabelGrafik .='"'.$bulan[$row['Periode']].'",';
        }
        $sourceLabelGrafik .=']';

        // membuat label sumbu Y
        $sourceDataGrafik='[';
        foreach($this->penjualan->sourceGrafikTrendPenualan(date('Y')) as $row){
            $sourceDataGrafik .='"'.$row['TotalPendapatan'].'",';
        }
        $sourceDataGrafik .=']';

        $data=[
            'pendapatanHariIni'=>$this->penjualan->totalPendapatanHariIni(),
            'pendapatanBulanIni'=>$this->penjualan->totalPendapatanBulaniIni(),
            'produkStokKosong'=>$this->produk->jmlStokKosong(),
            'pendapatanDuaBlnTerakhir'=>$this->penjualan->pendapatanBlnSebelumnya(),
            'sourceLabelGrafik'=>$sourceLabelGrafik,
            'sourceDataGrafik'=>$sourceDataGrafik

        ];
        return view('dashboard',$data);
    }
}
