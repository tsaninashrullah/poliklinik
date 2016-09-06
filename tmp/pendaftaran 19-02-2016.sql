DROP TABLE pendaftaran;

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` varchar(7) NOT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `no_urut` varchar(5) DEFAULT NULL,
  `kd_pasien` varchar(5) DEFAULT NULL,
  `kd_dokter` varchar(5) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `biaya` float NOT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pendaftaran VALUES("D0001","2016-02-19","TN001","P0003","D0001","admin","15");



