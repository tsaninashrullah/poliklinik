DROP TABLE pendaftaran;

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` varchar(7) NOT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `no_urut` varchar(5) DEFAULT NULL,
  `kd_pasien` varchar(5) DEFAULT NULL,
  `kd_dokter` varchar(5) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pendaftaran VALUES("D0001","2016-02-10","TN001","P0003","D0001","admin");
INSERT INTO pendaftaran VALUES("D0002","2016-02-10","TN002","P0004","D0001","admin");
INSERT INTO pendaftaran VALUES("D0003","2016-02-10","TN003","P0005","D0001","admin");
INSERT INTO pendaftaran VALUES("D0004","2016-02-10","TN004","P0008","D0001","hantu");
INSERT INTO pendaftaran VALUES("D0005","2016-02-10","TN005","P0008","D0001","hantu");
INSERT INTO pendaftaran VALUES("D0006","2016-02-10","TN006","P0003","D0001","hantu");



