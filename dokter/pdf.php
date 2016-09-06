<?php
include "../config/koneksi.php";
require('../fpdf17/fpdf.php');
$result= mysql_query("SELECT * FROM dokter ORDER BY kd_dokter ASC") or die(mysql_error());
echo mysql_error();
//Inisiasi untuk membuat header kolom
$column_kd_dokter = "";
$column_nama = "";
$column_alamat = "";
$column_telepon = "";
$column_j_kel = "";
$column_poli = "";


$i = 0;

while($data=mysql_fetch_row($result))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[3];
        $cell[$i][4] = $data[4];
        $obat = mysql_query("select * from poliklinik where kd_poli='$data[5]'");
        while ($ambil=mysql_fetch_array($obat)) {
        $cell[$i][5] = $ambil[1];
        }
        $i++;
    }

class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
            // Logo
            $this->Image('../images/logo.png',10,6,30);
            // Arial bold 15
            $this->SetFont('helvetica','B',18);
            // Move to the right
            $this->Cell(0,5, 'POLIKLINIK TRSNW.' , '0' , '1' , 'C' , false);
            $this->Ln(2);
            $this->SetFont('Arial','i',14);
            $this->Cell(0,5, 'Alamat : Jl. Abdul Halim, Cigugur Tengah Kota Cimahi, Jawa Barat', '0', '1', 'C', false );
            $this->Ln(2);
            $this->SetFont('Arial','b','i','14');
            $this->Cell(0,5, 'Kami Siap Membantu Anda', '0', '1', 'C', false );
            $this->Ln(7);
            $this->Cell(270,0.6,'','0','1','c',true);
            $this->Ln(10);
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
        //     $this->SetFont('Times','B',14); //jenis font : Times New Romans, Bold, ukuran 14
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
    $pdf = new PDF('L','mm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(10,10,'No','LRTB',0,'C');
    $pdf->Cell(25,10,'Kode Dokter','LRTB',0,'C');
    $pdf->Cell(32,10,'Nama Dokter','LRTB',0,'C');
    $pdf->Cell(50,10,'Alamat','LRTB',0,'C');
    $pdf->Cell(37,10,'Telepon','LRTB',0,'C');
    $pdf->Cell(30,10,'Jenis Kelamin','LRTB',0,'C');
    $pdf->Cell(40,10,'Poliklinik','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(10,10,$j+1,'LBTR',0,'C');
        $pdf->Cell(25,10,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(32,10,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(50,10,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(37,10,$cell[$j][3],'LBTR',0,'C');
        $pdf->Cell(30,10,$cell[$j][4],'LBTR',0,'C');
        $pdf->Cell(40,10,$cell[$j][5],'LBTR',0,'C');
        $pdf->Ln();
    }
    $name = 'Laporan Dokter.pdf';
    $dest = '';
    //menampilkan output berupa halaman PDF
    $pdf->Output($name,$dest);
?>