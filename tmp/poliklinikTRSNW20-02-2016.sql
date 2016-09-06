DROP TABLE dokter;

CREATE TABLE `dokter` (
  `kd_dokter` varchar(5) NOT NULL DEFAULT '',
  `nama_dokter` varchar(50) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(13) DEFAULT NULL,
  `j_kel` varchar(15) NOT NULL,
  `kd_poli` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kd_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO dokter VALUES("D0001","Dr. Haisugiman","Aduh Typo","Kumaha Atuh","Perempuan","PL001");
INSERT INTO dokter VALUES("D0002","Dr. Hadikusumo","Cipageran","0877166172881","Laki-Laki","PL002");
INSERT INTO dokter VALUES("D0003","Hansamu","Jaja Miharja","0718277188888","Perempuan","PL001");



DROP TABLE history_biaya;

CREATE TABLE `history_biaya` (
  `no_pendaftaran` varchar(5) DEFAULT NULL,
  `kd_jenis` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO history_biaya VALUES("D0001","JB002");
INSERT INTO history_biaya VALUES("D0001","JB001");
INSERT INTO history_biaya VALUES("D0001","JB001");



DROP TABLE history_obat;

CREATE TABLE `history_obat` (
  `kd_resep` varchar(5) DEFAULT NULL,
  `kd_obat` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO history_obat VALUES("R0001","O0002");
INSERT INTO history_obat VALUES("R0001","O0001");
INSERT INTO history_obat VALUES("R0001","O0003");



DROP TABLE jadwal_praktek;

CREATE TABLE `jadwal_praktek` (
  `kd_praktek` varchar(5) NOT NULL DEFAULT '',
  `hari` varchar(10) DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `kd_dokter` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kd_praktek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO jadwal_praktek VALUES("JP001","Senin","08:00:00","12:00:00","D0001");
INSERT INTO jadwal_praktek VALUES("JP002","Rabu","10:00:00","12:00:00","D0002");
INSERT INTO jadwal_praktek VALUES("JP003","Kamis","11:00:00","18:15:00","D0003");



DROP TABLE jenis_biaya;

CREATE TABLE `jenis_biaya` (
  `kd_jenis` varchar(5) NOT NULL,
  `nama_biaya` varchar(100) DEFAULT NULL,
  `biaya` float DEFAULT NULL,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO jenis_biaya VALUES("JB001","Administrasi Pertama","1");
INSERT INTO jenis_biaya VALUES("JB002","Pendaftaran","2");



DROP TABLE login;

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("admin","admin","1");
INSERT INTO login VALUES("hantu","123","1");
INSERT INTO login VALUES("salmaa","salmaa","0");
INSERT INTO login VALUES("tsania","tsania","0");



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
INSERT INTO obat VALUES("O0002","Amoxilin","Pt. Kimia Farma","Butir","7");
INSERT INTO obat VALUES("O0003","Bithe","Parmaton","Butir","19000");



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



DROP TABLE pegawai;

CREATE TABLE `pegawai` (
  `nip` varchar(13) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(13) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `j_kel` varchar(15) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pegawai VALUES("1892871882778","Salmaa Ihsania","Jl. Cisasawi No : 36","08997107901","1998-11-21","Perempuan","salmaa");
INSERT INTO pegawai VALUES("1910132002939","Tsani Nashrullah","Jl. Rh. Abdul Halim RT:03/03","0899829819","1998-06-22","Laki-Laki","tsania");
INSERT INTO pegawai VALUES("9881998219812","Haryanto Suparno","Bandung","089767676767","1968-04-02","Perempuan","hantu");
INSERT INTO pegawai VALUES("99999999999","Super Admin","-","-","2016-02-22","Laki-Laki","admin");



DROP TABLE pemeriksaan;

CREATE TABLE `pemeriksaan` (
  `no_pemeriksaan` varchar(5) NOT NULL,
  `keluhan` text,
  `diagnosa` text,
  `perawatan` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tensi_diastolik` int(11) DEFAULT NULL,
  `tensi_sistolik` int(11) DEFAULT NULL,
  `kd_resep` varchar(5) NOT NULL,
  `no_pendaftaran` varchar(5) NOT NULL,
  PRIMARY KEY (`no_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pemeriksaan VALUES("PR001","Unch","Yeah","Mwah","Rujukan Ke Rumah Sakit","21","199","999","R0001","D0001");



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

INSERT INTO pendaftaran VALUES("D0001","2016-02-19","TN001","P0003","D0001","admin","16");



DROP TABLE poliklinik;

CREATE TABLE `poliklinik` (
  `kd_poli` varchar(5) NOT NULL DEFAULT '',
  `nama_poli` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO poliklinik VALUES("PL001","Poli Anak");
INSERT INTO poliklinik VALUES("PL002","Poli Persalinan");
INSERT INTO poliklinik VALUES("PL003","Poli ISPA");



DROP TABLE resep;

CREATE TABLE `resep` (
  `kd_resep` varchar(5) NOT NULL DEFAULT '',
  `dosis` varchar(7) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `no_pemeriksaan` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_resep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO resep VALUES("R0001","1 X 1","7","PR001");



