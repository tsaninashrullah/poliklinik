DROP TABLE pasien;

CREATE TABLE `pasien` (
  `kd_pasien` varchar(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `j_kel` varchar(15) DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  PRIMARY KEY (`kd_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pasien VALUES("P0003","Ukhroasj","Rumah","0717827812","1960-01-01","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0004","Ukhroasjsdasd","BubuhRumah","0717827812","1960-01-01","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0005","Sayang Sakit","Barjoh","0717827812","1960-01-01","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0006","Rian","Cimahi","089989898989","1960-01-02","Perempuan","2013-01-01");
INSERT INTO pasien VALUES("P0007","Juragan","psadia[ds","0812821923912","1960-01-01","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0008","Yeah","Yoshaa","0878178178","1962-03-03","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0009","Hardjono","Sugoi","081919179119","1960-01-01","Laki-Laki","2013-01-01");
INSERT INTO pasien VALUES("P0010","sadsdaasds","sadasd","08912882898","1960-01-01","Laki-Laki","2013-01-01");



