/*
Navicat MySQL Data Transfer

Source Server         : beasiswa
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : beasiswa

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-05-09 09:52:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agama`
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama
-- ----------------------------
INSERT INTO `agama` VALUES ('1', 'Islam');
INSERT INTO `agama` VALUES ('2', 'Kristen');
INSERT INTO `agama` VALUES ('3', 'Katolik');
INSERT INTO `agama` VALUES ('4', 'Hindu');
INSERT INTO `agama` VALUES ('5', 'Budha');

-- ----------------------------
-- Table structure for `alasan_layak_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `alasan_layak_perpanjangan`;
CREATE TABLE `alasan_layak_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `alasan` text,
  PRIMARY KEY (`id`),
  KEY `id_penerima` (`registrasi_id`),
  CONSTRAINT `alasan_layak_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alasan_layak_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `bank`
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES ('1', 'MANDIRI');
INSERT INTO `bank` VALUES ('2', 'CIMB');

-- ----------------------------
-- Table structure for `biaya`
-- ----------------------------
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama_biaya` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biaya
-- ----------------------------
INSERT INTO `biaya` VALUES ('1', 'Kuliah');
INSERT INTO `biaya` VALUES ('2', 'Buku');
INSERT INTO `biaya` VALUES ('3', 'FC');
INSERT INTO `biaya` VALUES ('4', 'ATK');
INSERT INTO `biaya` VALUES ('5', 'Kost');
INSERT INTO `biaya` VALUES ('6', 'Makan');
INSERT INTO `biaya` VALUES ('7', 'Jajan');
INSERT INTO `biaya` VALUES ('8', 'Transport');
INSERT INTO `biaya` VALUES ('9', 'Pulsa');
INSERT INTO `biaya` VALUES ('10', 'Lain-lain');

-- ----------------------------
-- Table structure for `biaya_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `biaya_perpanjangan`;
CREATE TABLE `biaya_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `biaya_id` int(4) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `register_id` (`registrasi_id`),
  KEY `biaya_id` (`biaya_id`),
  CONSTRAINT `biaya_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `biaya_perpanjangan_ibfk_2` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of biaya_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `dokumen_baru`
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_baru`;
CREATE TABLE `dokumen_baru` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dokumen_baru_ibfk_1` (`registrasi_id`),
  CONSTRAINT `dokumen_baru_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokumen_baru
-- ----------------------------

-- ----------------------------
-- Table structure for `dokumen_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_perpanjangan`;
CREATE TABLE `dokumen_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `upload_file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `register_id` (`registrasi_id`),
  CONSTRAINT `dokumen_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokumen_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `fakultas`
-- ----------------------------
DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fakultas
-- ----------------------------
INSERT INTO `fakultas` VALUES ('1', 'MIPA');
INSERT INTO `fakultas` VALUES ('2', 'Biologi');
INSERT INTO `fakultas` VALUES ('3', 'Kedokteran Umum');
INSERT INTO `fakultas` VALUES ('4', 'Kedokteran Gigi');
INSERT INTO `fakultas` VALUES ('5', 'Kedokteran Hewan');
INSERT INTO `fakultas` VALUES ('6', 'Farmasi');
INSERT INTO `fakultas` VALUES ('7', 'Psikologi');
INSERT INTO `fakultas` VALUES ('8', 'Teknik');
INSERT INTO `fakultas` VALUES ('9', 'Geografi');
INSERT INTO `fakultas` VALUES ('10', 'Pertanian');
INSERT INTO `fakultas` VALUES ('11', 'Teknologi Pertanian');
INSERT INTO `fakultas` VALUES ('12', 'Kehutanan');
INSERT INTO `fakultas` VALUES ('13', 'Peternakan');
INSERT INTO `fakultas` VALUES ('14', 'Ekonomika dan Bisnis');
INSERT INTO `fakultas` VALUES ('15', 'Filsafat');
INSERT INTO `fakultas` VALUES ('16', 'Hukum');
INSERT INTO `fakultas` VALUES ('17', 'Ilmu Budaya');
INSERT INTO `fakultas` VALUES ('18', 'Ilmu Sosial dan Politik');
INSERT INTO `fakultas` VALUES ('19', 'Sekolah Vokasi');

-- ----------------------------
-- Table structure for `fasilitas`
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `merek` varchar(100) DEFAULT NULL,
  `series` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fasilitas_ibfk_1` (`registrasi_id`),
  CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------

-- ----------------------------
-- Table structure for `informasi_penerima`
-- ----------------------------
DROP TABLE IF EXISTS `informasi_penerima`;
CREATE TABLE `informasi_penerima` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` varchar(0) DEFAULT NULL,
  `fakultas` varchar(0) DEFAULT NULL,
  `kategori` enum('1','2','3') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `informasi_penerima_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of informasi_penerima
-- ----------------------------

-- ----------------------------
-- Table structure for `informasi_wawancara`
-- ----------------------------
DROP TABLE IF EXISTS `informasi_wawancara`;
CREATE TABLE `informasi_wawancara` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tgl_wawancara` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `interviewer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `informasi_wawancara_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of informasi_wawancara
-- ----------------------------

-- ----------------------------
-- Table structure for `jenis_dokumen`
-- ----------------------------
DROP TABLE IF EXISTS `jenis_dokumen`;
CREATE TABLE `jenis_dokumen` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jenis_dokumen
-- ----------------------------
INSERT INTO `jenis_dokumen` VALUES ('1', 'Surat Keterangan Tidak Mampu (SKTM)');
INSERT INTO `jenis_dokumen` VALUES ('2', 'KK');
INSERT INTO `jenis_dokumen` VALUES ('3', 'KTP');
INSERT INTO `jenis_dokumen` VALUES ('4', 'Kartu Tanda Mahasiswa (KTM)');
INSERT INTO `jenis_dokumen` VALUES ('5', 'Surat Rekomendasi dari Fakultas');
INSERT INTO `jenis_dokumen` VALUES ('6', 'Transkrip Nilai (Mahasiswa Baru Upload Ijazah)');
INSERT INTO `jenis_dokumen` VALUES ('7', 'Kartu Hasil Studi (KHS)');

-- ----------------------------
-- Table structure for `jenis_dokumen_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `jenis_dokumen_perpanjangan`;
CREATE TABLE `jenis_dokumen_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_dokumen_perpanjangan
-- ----------------------------
INSERT INTO `jenis_dokumen_perpanjangan` VALUES ('1', 'Kartu Hasil Studi (KHS)');
INSERT INTO `jenis_dokumen_perpanjangan` VALUES ('2', 'Surat Permohonan Perpanjangan');

-- ----------------------------
-- Table structure for `jurusan`
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(2) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fakultas_id` (`fakultas_id`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES ('1', '1', 'Matematika');
INSERT INTO `jurusan` VALUES ('2', '1', 'Fisika');
INSERT INTO `jurusan` VALUES ('3', '1', 'Kimia');
INSERT INTO `jurusan` VALUES ('4', '1', 'Statistika');
INSERT INTO `jurusan` VALUES ('5', '1', 'Geofisika');
INSERT INTO `jurusan` VALUES ('6', '1', 'Ilmu Komputer');
INSERT INTO `jurusan` VALUES ('7', '1', 'Elektronika dan Instrumentasi');
INSERT INTO `jurusan` VALUES ('8', '2', 'Biologi');
INSERT INTO `jurusan` VALUES ('9', '3', 'Pendidikan Dokter');
INSERT INTO `jurusan` VALUES ('10', '3', 'Gizi Kesehatan');
INSERT INTO `jurusan` VALUES ('11', '3', 'Ilmu Keperawatan');
INSERT INTO `jurusan` VALUES ('12', '4', 'Pendidikan Dokter Gigi');
INSERT INTO `jurusan` VALUES ('13', '4', 'Ilmu Keperawatan Gigi');
INSERT INTO `jurusan` VALUES ('14', '5', 'Pendidikan Dokter Hewan');
INSERT INTO `jurusan` VALUES ('15', '6', 'Farmasi');
INSERT INTO `jurusan` VALUES ('16', '7', 'Psikologi');
INSERT INTO `jurusan` VALUES ('17', '8', 'Arsitektur');
INSERT INTO `jurusan` VALUES ('18', '8', 'Fisika Teknik');
INSERT INTO `jurusan` VALUES ('19', '8', 'Perencanaan Wilayah dan Kota');
INSERT INTO `jurusan` VALUES ('20', '8', 'Teknik Elektro');
INSERT INTO `jurusan` VALUES ('21', '8', 'Teknik Geodesi');
INSERT INTO `jurusan` VALUES ('22', '8', 'Teknik Geologi');
INSERT INTO `jurusan` VALUES ('23', '8', 'Teknik Industri');
INSERT INTO `jurusan` VALUES ('24', '8', 'Teknik Kimia');
INSERT INTO `jurusan` VALUES ('25', '8', 'Teknik Mesin');
INSERT INTO `jurusan` VALUES ('26', '8', 'Teknik Nuklir');
INSERT INTO `jurusan` VALUES ('27', '8', 'Teknik Sipil');
INSERT INTO `jurusan` VALUES ('28', '8', 'Teknologi Informasi');
INSERT INTO `jurusan` VALUES ('29', '9', 'Geografi dan Ilmu Lingkungan');
INSERT INTO `jurusan` VALUES ('30', '9', 'Kartografi dan Penginderan Jauh');
INSERT INTO `jurusan` VALUES ('31', '9', 'Pembangunan Wilayah');

-- ----------------------------
-- Table structure for `kegiatan_kemahasiswaan_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan_kemahasiswaan_perpanjangan`;
CREATE TABLE `kegiatan_kemahasiswaan_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `nama_organisasi` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrasi_id` (`registrasi_id`),
  CONSTRAINT `kegiatan_kemahasiswaan_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kegiatan_kemahasiswaan_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `pemasukan_lain_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `pemasukan_lain_perpanjangan`;
CREATE TABLE `pemasukan_lain_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `uang_saku` decimal(10,0) DEFAULT NULL,
  `kerja_sampingan` decimal(10,0) DEFAULT NULL,
  `total_pemasukan_lain` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrasi_id` (`registrasi_id`),
  CONSTRAINT `pemasukan_lain_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pemasukan_lain_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `pendidikan`
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenjang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES ('1', 'SD');
INSERT INTO `pendidikan` VALUES ('2', 'SMP');
INSERT INTO `pendidikan` VALUES ('3', 'SMA');
INSERT INTO `pendidikan` VALUES ('4', 'UNIVERSITAS');

-- ----------------------------
-- Table structure for `prestasi_akademik_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `prestasi_akademik_perpanjangan`;
CREATE TABLE `prestasi_akademik_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `juara` int(4) DEFAULT NULL,
  `kompetisi` varchar(255) DEFAULT NULL,
  `lingkup` varchar(255) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestasi_akademik_perpanjangan_ibfk_1` (`registrasi_id`),
  CONSTRAINT `prestasi_akademik_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prestasi_akademik_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `registrasi`
-- ----------------------------
DROP TABLE IF EXISTS `registrasi`;
CREATE TABLE `registrasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `status_beasiswa` enum('B','P') DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `ta` varchar(9) DEFAULT NULL,
  `semester` enum('gasal','genap') DEFAULT NULL,
  `status_pendaftaran` enum('Tidak Lolos','Proses','Lolos Tahap I','Diterima') DEFAULT 'Proses',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of registrasi
-- ----------------------------
INSERT INTO `registrasi` VALUES ('41', '52', 'B', '2016', '2015/2016', 'genap', 'Lolos Tahap I');

-- ----------------------------
-- Table structure for `riwayat_beasiswa_lain`
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_beasiswa_lain`;
CREATE TABLE `riwayat_beasiswa_lain` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `nominal` decimal(10,0) DEFAULT NULL,
  `periode` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrasi_id` (`registrasi_id`),
  CONSTRAINT `riwayat_beasiswa_lain_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riwayat_beasiswa_lain
-- ----------------------------
INSERT INTO `riwayat_beasiswa_lain` VALUES ('1', '41', 'bri', null, '');
INSERT INTO `riwayat_beasiswa_lain` VALUES ('2', '41', 'bni', null, '');
INSERT INTO `riwayat_beasiswa_lain` VALUES ('3', '41', 'bni', null, '');

-- ----------------------------
-- Table structure for `riwayat_ipk_perpanjangan`
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_ipk_perpanjangan`;
CREATE TABLE `riwayat_ipk_perpanjangan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `ip_1` decimal(10,2) DEFAULT NULL,
  `ip_2` decimal(10,2) DEFAULT NULL,
  `ipk_saat_ini` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registrasi_id` (`registrasi_id`),
  CONSTRAINT `riwayat_ipk_perpanjangan_ibfk_1` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riwayat_ipk_perpanjangan
-- ----------------------------

-- ----------------------------
-- Table structure for `riwayat_pendidikan_baru`
-- ----------------------------
DROP TABLE IF EXISTS `riwayat_pendidikan_baru`;
CREATE TABLE `riwayat_pendidikan_baru` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(4) DEFAULT NULL,
  `pendidikan_id` int(4) DEFAULT NULL,
  `thn_masuk` varchar(255) DEFAULT NULL,
  `thn_lulus` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `nilai` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendidikan_id` (`pendidikan_id`),
  KEY `registrasi_id` (`registrasi_id`),
  CONSTRAINT `riwayat_pendidikan_baru_ibfk_2` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `riwayat_pendidikan_baru_ibfk_3` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of riwayat_pendidikan_baru
-- ----------------------------
INSERT INTO `riwayat_pendidikan_baru` VALUES ('3', '41', '1', '', '', '', '0.00');

-- ----------------------------
-- Table structure for `status_kegiatan_pth`
-- ----------------------------
DROP TABLE IF EXISTS `status_kegiatan_pth`;
CREATE TABLE `status_kegiatan_pth` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) DEFAULT NULL,
  `nama_kegiatan` text,
  `kelompok` varchar(14) DEFAULT NULL,
  `nama_penerima` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_penyaluran` date DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status_penyaluran` enum('belum','sudah') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `status_kegiatan_pth_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status_kegiatan_pth
-- ----------------------------
INSERT INTO `status_kegiatan_pth` VALUES ('1', '52', 'penyaluran sembako', '1', 'ibu sugiyem', 'pogung', '0000-00-00', '0000-00-00', 'belum');
INSERT INTO `status_kegiatan_pth` VALUES ('2', '52', 'penyaluran ke panti asuhan', '2', 'PA Diponegoro', 'Jln.Parangtritis', '0000-00-00', '0000-00-00', 'belum');

-- ----------------------------
-- Table structure for `tahun_ajaran`
-- ----------------------------
DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE `tahun_ajaran` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `ta` varchar(9) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tahun_ajaran
-- ----------------------------
INSERT INTO `tahun_ajaran` VALUES ('1', '2015/2016', 'genap', 'Y');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `jurusan_id` int(4) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `gender` enum('P','L') DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `semester` int(4) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat_asal` varchar(100) DEFAULT NULL,
  `alamat_domisili` varchar(100) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `agama_id` int(4) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` decimal(14,2) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` decimal(14,2) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` decimal(14,2) DEFAULT NULL,
  `jml_saudara` int(4) DEFAULT NULL,
  `bank_id` int(4) DEFAULT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `profile_photo` varchar(100) DEFAULT NULL,
  `block` enum('blokir','aktif') DEFAULT NULL,
  `level` enum('admin','mhs') DEFAULT NULL,
  `code_verifikasi` varchar(32) DEFAULT NULL,
  `is_verif` int(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_jurusan` (`jurusan_id`),
  KEY `id_agama` (`agama_id`),
  KEY `id_bank` (`bank_id`),
  CONSTRAINT `fk_agama` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('33', null, 'admin@admin.com', '12345', null, null, null, null, null, '1970-01-01', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '5555555', null, null, '', null, '1');
INSERT INTO `user` VALUES ('52', '7', 'morinka123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'morinka', 'L', '', null, '', '0000-00-00', '', '', '', null, '', '', null, 'tuminem', '', null, '', '', null, null, null, '', null, null, '', 'eaef97191d55196e6ac02a6aa9c6ffe5', '1');
