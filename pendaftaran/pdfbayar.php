<?php
include "../config/koneksi.php";
require('../fpdf17/fpdf.php');
$no_pendaftaran = $_GET['no_pendaftaran'];
$result= mysql_query("SELECT * FROM pendaftaran where no_pendaftaran='$no_pendaftaran'") or die(mysql_error());
$results= mysql_query("SELECT * FROM pemeriksaan where no_pendaftaran='$no_pendaftaran'") or die(mysql_error());
echo mysql_error();
//Inisiasi untuk membuat header kolom
// $column_kd_dokter = "";
// $column_nama = "";
// $column_alamat = "";
// $column_telepon = "";
// $column_j_kel = "";
// $column_poli = "";


$data = mysql_fetch_array($result);
$datas = mysql_fetch_array($results);
$pasien = mysql_query("select * from pasien where kd_pasien='$data[3]'");
$datapasien = mysql_fetch_array($pasien);
$dokter = mysql_query("select * from dokter where kd_dokter='$data[4]'");
$datadokter = mysql_fetch_array($dokter);
$obatresep = mysql_query("select * from history_obat where kd_resep='$datas[8]'");
        

class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
            // Logo
            $this->Image('../images/logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',18);
            // Move to the right
            $this->Cell(0,5, 'POLIKLINIK TRSNW.' , '0' , '1' , 'C' , false);
            $this->Ln(2);
            $this->SetFont('Arial','i',12);
            $this->Cell(0,5, 'Alamat : Jl. Abdul Halim, Cigugur Tengah', '0', '1', 'C', false );
            $this->Ln(2);
            $this->Cell(0,5, 'Telp. (022)6653119, Email:politrsnw@gmail.com', '0', '1', 'C', false );
            $this->Ln(2);
            $this->SetFont('Arial','b','14');
            $this->Cell(0,5, 'Cimahi', '0', '1', 'C', false );
            $this->Ln(2);
            $this->Cell(195,0.6,'','0','1','c',true);
            $this->Ln(4);
            $this->SetFont('Arial','b','18');
            $this->Cell(0,5, 'NOTA PEMBAYARAN', '0', '1', 'C', false );
            $this->Ln(2);
            // Line break
        }
        function Footer()
        {
            // Page footer
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->SetTextColor(128);
            $this->Cell(0,10,'Halaman '.$this->PageNo(),0,0,'C');
        }
        // function Header()
        // {
        //     $this->Image('../images/logo.png',10,6,30);
        //     //Pengaturan Font Header
        //     $this->SetFont('Arial','B',14); //jenis font : Arial New Romans, Bold, ukuran 14
        //     //untuk warna background Header
        //     $this->SetFillColor(255,255,255);
        //     //untuk warna text
        //     $this->SetTextColor(0,0,0);
        //     //Menampilkan tulisan di halaman
        //     $this->Cell(224,10,'Report Data Dokter Poliklinik TRSNW.','TBLR',0,'C'); //TBLR (untuk garis)=> B = Bottom,
        //     // L = Left, R = Right
        //     //untuk garis, C = center
        // }
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','mm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(2);
    $pdf->Cell(195,10,'A. DATA PENDAFTARAN',0,false);
    $pdf->Ln();
    $pdf->Cell(62,0.6,'','0','1','c',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'No Pendaftaran ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$data[0],0,false);

    $pdf->Cell(50,10,'Tanggal Pendaftaran ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$data[1],0,false);
    $pdf->Ln();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'No Urut ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$data[2],false);

    $pdf->Cell(50,10,'Nama Pasien ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$datapasien[1],0,false);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'Alamat ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$datapasien[2],0,false);

    $pdf->Cell(50,10,'Tanggal Lahir ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$datapasien[4],0,false);
    $pdf->Ln();
    
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'Jenis Kelamin ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$datapasien[5],0,false);

    $pdf->Cell(50,10,'Dokter Pemeriksa ',0,false);
    $pdf->Cell(5,10,' = ',false);
    $pdf->Cell(35,10,$datadokter[1],0,false);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(2);
    $pdf->Cell(190,10,'B. HASIL PEMERIKSAAN',0,false);
    $pdf->Ln();
    $pdf->Cell(62,0.6,'','0','1','c',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'Keluhan ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$datas[1],0,false);

    $pdf->Cell(50,10,'Diagnosa ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$datas[2],0,false);
    $pdf->Ln();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(50,10,'Perawatan ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$datas[3],0,false);

    $pdf->Cell(50,10,'Tindakan ',0,false);
    $pdf->Cell(5,10,' = ',0,false);
    $pdf->Cell(35,10,$datas[4],0,false);
    $pdf->Ln();

    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(2);
    $pdf->Cell(190,10,'C. RESEP OBAT',0,false);
    $pdf->Ln();
    $pdf->Cell(62,0.6,'','0','1','c',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(40,10,'Nama Obat','LRTB',0,'C');
    $pdf->Cell(38,10,'Harga Satuan','LRTB',0,'C');
    $pdf->Cell(36,10,'Dosis','LRTB',0,'C');
    $pdf->Cell(38,10,'Jumlah Obat','LRTB',0,'C');
    $pdf->Cell(38,10,'Total Biaya','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','',9);
    while ($dataresep=mysql_fetch_array($obatresep)) {
        $obatnama = mysql_query("select * from obat where kd_obat='$dataresep[1]'");
        while ($dataobat=mysql_fetch_array($obatnama)) {
            $pdf->Cell(40,10,$dataobat[1],'LRTB',0,'C');
            $pdf->Cell(38,10,$dataobat[4],'LRTB',0,'C');
        }
        $pdf->Cell(36,10,$dataresep[2],'LRTB',0,'C');
        $pdf->Cell(38,10,$dataresep[3],'LRTB',0,'C');
        $pdf->Cell(38,10,$dataresep[4],'LRTB',0,'C');
        $pdf->Ln();
    }

    $pdf->SetFont('Arial','B',13);
    $pdf->Ln(2);
    $pdf->Cell(190,10,'D. TOTAL BIAYA',0,false);
    $pdf->Ln();
    $pdf->Cell(62,0.6,'','0','1','c',true);
    $pdf->Ln();
    $pdf->SetFont('Arial','i',9);
    $jenissatu = mysql_query("select * from history_biaya where no_pendaftaran='$no_pendaftaran'");
    while ($datakdjenis=mysql_fetch_array($jenissatu)) {
        $queryjenis = mysql_query("select * from jenis_biaya where kd_jenis='$datakdjenis[1]'");
        while ($datajenis=mysql_fetch_array($queryjenis)) {
            $pdf->Cell(155,10,$datajenis[1],'LRTB',0,'L');
            $pdf->Cell(35,10,'RP. ' . $datajenis[2],'LRTB',0,'R');
            $pdf->Ln();
        }
    }
    $resepaja = mysql_query("select * from resep where kd_resep='$datas[8]'");
    $ambiltotalresep = mysql_fetch_array($resepaja);
    $pdf->Cell(155,10,'Biaya Obat','LRTB',0,'L');
    $pdf->Cell(35,10,'Rp. ' . $ambiltotalresep[3],'LRTB',0,'R');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(155,10,'TOTAL BIAYA KESELURUHAN','LRTB',0,'R');
    $pdf->Cell(35,10,'Rp. ' . $data[7],'LRTB',0,'R');
    $pdf->Ln();

    $pdf->SetFont('Arial','',9);
    $pdf->Cell(190,10,'Cimahi, ' . date("d-m-Y"),0,'R');
    $pdf->Ln(4);
    $pegawai = mysql_query("select * from pegawai where username='$data[6]'");
    $ambilpegawai = mysql_fetch_array($pegawai);
    $pdf->Cell(190,10,$ambilpegawai[1],0,'R');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(63,0.6,'','0','1','c',true);
        // $pdf->Cell(32,10,$cell[$j][1],'LBTR',0,'C');
        // $pdf->Cell(50,10,$cell[$j][2],'LBTR',0,'C');
        // $pdf->Cell(37,10,$cell[$j][3],'LBTR',0,'C');
        // $pdf->Cell(30,10,$cell[$j][4],'LBTR',0,'C');
        // $pdf->Cell(40,10,$cell[$j][5],'LBTR',0,'C');
        $pdf->Ln();
    $name = 'Laporan Dokter.pdf';
    $dest = '';
    //menampilkan output berupa halaman PDF
    $pdf->Output($name,$dest);
?>