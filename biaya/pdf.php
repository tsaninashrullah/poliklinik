<?php
include "../config/koneksi.php";
require('../fpdf17/fpdf.php');
$result= mysql_query("SELECT * FROM jenis_biaya ORDER BY kd_jenis ASC") or die(mysql_error());
echo mysql_error();
//Inisiasi untuk membuat header kolom

$i = 0;

while($data=mysql_fetch_row($result))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $i++;
    }

class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
            //Pengaturan Font Header
            $this->SetFont('Times','B',17); //jenis font : Times New Romans, Bold, ukuran 14
            //untuk warna background Header
            $this->SetFillColor(255,255,255);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
            $this->Cell(194,10,'Pusat Data','TBLR',0,'C'); //TBLR (untuk garis)=> B = Bottom,
            $this->Ln();
            $this->Cell(194,10,'Poliklinik TRSNW.','TBLR',0,'C'); //TBLR (untuk garis)=> B = Bottom,
            $this->Ln();
            $this->Cell(194,10,'Report Data Biaya','TBLR',0,'C'); //TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
        }
    }
    //pengaturan ukuran kertas P = Portrait
    $pdf = new PDF('P','mm','A4');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',11);
    $pdf->Cell(10,10,'No','LRTB',0,'C');
    $pdf->Cell(25,10,'Kode Biaya','LRTB',0,'C');
    $pdf->Cell(129,10,'Nama Biaya','LRTB',0,'C');
    $pdf->Cell(30,10,'Tarif','LRTB',0,'C');
    $pdf->Ln();
    $pdf->SetFont('Times',"",10);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
        $pdf->Cell(10,10,$j+1,'LBTR',0,'C');
        $pdf->Cell(25,10,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(129,10,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(30,10,$cell[$j][2],'LBTR',0,'C');
        $pdf->Ln();
    }
    function Footer()
    {
        // Page footer
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->SetTextColor(128);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
    $name = 'Laporan Pasien.pdf';
    $dest = '';
    //menampilkan output berupa halaman PDF
    $pdf->Output($name,$dest);
?>
