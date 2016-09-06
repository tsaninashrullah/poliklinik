DROP TABLE obat;

CREATE TABLE `obat` (
  `kd_obat` varchar(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO obat VALUES("O0001","Paracetamol","Pt. Sanbe Yeah unch","Butir","18000");
INSERT INTO obat VALUES("O0002","Amoxilin","Pt. Kimia Farma","Butir","90000");



