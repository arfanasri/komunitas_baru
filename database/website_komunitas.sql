--
-- Database: `website_komunitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_komunitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Social'),
(3, 'Bussines'),
(4, 'Animals'),
(8, 'Literature'),
(9, 'Religious'),
(10, 'Culture'),
(13, 'hiburan'),
(14, 'Pemerhati lingkungan'),
(15, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `id_komunitas` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `deskripsi_kegiatan`, `id_komunitas`, `id_user`) VALUES
(1, 'Volluntary Camp  ', '<p>Volluntary Camp &nbsp;ini insya allah akan di adakan pada malam tahun baru .</p><p>hari/tanggal : &nbsp;minggu, 31 desember 2017</p><p>waktu : 21.00 -selesai</p><p>tempat : di hotel bukit kenari</p>', 9, 'marniaty yunus,S.Psi');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `isi_komentar` text NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_komunitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komunitas`
--

CREATE TABLE `komunitas` (
  `id_komunitas` int(11) NOT NULL,
  `nama_komunitas` varchar(50) NOT NULL,
  `logo_komunitas` varchar(100) NOT NULL,
  `deskripsi_komunitas` text NOT NULL,
  `verifikasi_komunitas` enum('ya','tidak') NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komunitas`
--

INSERT INTO `komunitas` (`id_komunitas`, `nama_komunitas`, `logo_komunitas`, `deskripsi_komunitas`, `verifikasi_komunitas`, `id_kategori`) VALUES
(1, 'PAREPARE MENULIS', 'WhatsApp Image 2017-11-24 at 12.12.05 PM.jpeg', '<p>Komunitas yang bergerak dalam bidang literasi,terutama dalam minat baca dan dunia kepenulisan. secret berada di teras baca di btn lompoe, syarat penggabungan dalam komunitas yaitu betul-betul mau dan ada niat ingin bergabung,ikut serta setiap kegiatan yang dilaksanakan.</p>', 'ya', 8),
(2, 'EXAIVER (Exotik Animals Lovers Parepare', 'WhatsApp Image 2017-11-22 at 9.11.24 AM.jpeg', '<p>Sebuah Komunitas yang menyukai segalal jenis hewan, Exaiver juga merupakan sebuah wadah dalam mensharing pengetahuan tentang hewan dan umumnya masyarakat, melestarikan dan melindungi hewan lokal Indinesia. Syarat dalam gabung komunitas ini, syarat dalam bergabung di komunitas ini yaitu : memmiliki kecintaan terhadap hewan,serius dalam berkumunitas,dan ikut gathering minimal 4x<strong>.</strong></p>', 'ya', 4),
(3, 'BUMI LESTARI', 'icon1.jpg', '<p>Bumi Lestari adalah sebuah organisasi pemerhati lingkungan berskala lokal di Kota Parepare. Kami mengundang teman-teman untuk bergabung jika hati kalian tergugah melihat segala bentuk kerusakan di muka bumi ini. melalui sebuah aksi mari membawa perubahan untuk bumi yang lebih baik.</p>', 'ya', 14),
(4, 'CERITA ANAK KOMPLEKS', 'IMG-20171012-WA0048.jpg', '<p>Cerita Anak Kompleks Merupakan ruang belajar dan bermain , bertujuan untuk memantik dan merangsang anak-anak untuk belajar kreatif dan gemar membaca. Project ini berlokasi di Perumnas Wekke Parepare.Jika berminat memberi manfaat kepada anak-anak serta menyediakan waktu luangnya, maka bergabunglah dikomunitas Cerita anak kompleks.</p>', 'ya', 8),
(5, 'TDA Parepare', 'TDA comunyti.jpg', '<p>TDA (Tangan Di Atas) Parepare adalah sebuah komunitas yang bertujuan membentuk pengusaha-pengusaha tangguh dan sukses yang memiliki kontribusi positif bagi peradaban.dan mempunyai misi&nbsp;Menumbuhkembangkan semangat kewirausahaan,&nbsp;menciptakan sinerji diantara sesama anggota &amp; antara anggota dengan pihak lain, berlandaskan - prinsip high trust community,menumbuhkan jiwa sosial &amp; berbagi di antara anggota, dan juga menciptakan pusat sumber daya bisnis berbasis teknologi.</p><p>&nbsp;</p>', 'ya', 3),
(6, 'TARIAN PENA', 'IMG-20171016-WA0003.jpg', '<p>Komunitas para pecinta naskah dan seni.Kata tarian pada nama tarian PENA bermakna <em>karya</em> sedangkan PENA bermakna alat tulis yang juga sebagai akronim dari kata PECINTA NASKAH. Komunitas Pecinta Naskah Tarian PENA merupakan kumpulan orang-orang yang&nbsp; memiliki hobi menulis dan membaca buku. Program utama dari Tarian PENA adalah menulis dan menerbitkan buku karya para Penari Pena. Komunitas Tarian Pena bukan hanya bergelut pada buku melainkan juga hal-hal yang berbau seni.</p>', 'ya', 8),
(7, 'MADDUTA ', 'WhatsApp Image 2017-12-02 at 10.03.47 PM.jpeg', '<p>MADDUTA adalah sebuha komunitas yang fokus pada satra, budaya, dan juga lagu budaya seajatapareng. bagi mempunyai ketarikan akan sastra dan budaya, silahkan gabung dikomunitas MADDUTA Parepare.</p>', 'ya', 10),
(8, 'NUNCHAKU', 'WhatsApp Image 2017-10-18 at 7.16.31 PM.jpeg', '<p>Komunitas yang bergerak di bidang hiburan, berbagai keahlian di dalam komunitas ini salah satunya aktraksi api yang sering memukau banyak mata para penonton ketika sedang melakukan latihan di lapangan andi makkasau lebih umumnya,yang mempunyai hobby suka yang anti mainstream bisa gabung di komunitas kami.</p>', 'ya', 13),
(9, 'CAC (Coin a chance) Parepare', 'LOGOCAC.jpg', '<p>Komunitas sosial yang mengumpulkan koin untuk membantu adik-adik yang kurang mampu dalam hal pendidikan,tempat sering berkumpul komunitas CAC umumnya sering di Lapangan Andi Makkasau. Yang mempunyai jiwa sosial yang tinggi serta tingginya kepedulian terhada anak-anak yang kurang mampu, Komunitas CAC adalah wadah yang cocok dengan anda, syarat dalam bergabung dalam komunitas ini yakni bersungguh-sungguh dan tidak terikat dengan komunitas yang lain.</p>', 'ya', 2),
(12, 'UFAIRAH MUSLIMAH PAREPARE', 'WhatsApp Image 2017-12-22 at 12.21.35 PM.jpeg', '<p>Komunitas musliman berhijab, wanita muslimah yang pemberani, yang anggota-anggotanya perempuan/ wanita muslimah yang berasal dari kota parepare dan sekitarnya.</p>', 'ya', 9);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `id_komunitas` int(11) NOT NULL,
  `level` enum('admin','anggota') NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `id_komunitas`, `level`, `id_user`) VALUES
(1, 1, 'admin', 'ilham mustamin'),
(2, 2, 'admin', 'allu'),
(3, 3, 'admin', 'syahrani said'),
(4, 4, 'admin', 'wirawan setialaksana'),
(5, 5, 'admin', 'syamsul rijal madani'),
(6, 6, 'admin', 'hj.rahmatia'),
(7, 7, 'admin', 'syamsul bahri '),
(8, 8, 'admin', 'ical'),
(9, 9, 'admin', 'marniaty yunus,S.Psi'),
(10, 9, 'anggota', 'ningrum wulansari'),
(11, 9, 'anggota', 'lia'),
(12, 9, 'anggota', 'edy sanjaya'),
(13, 9, 'anggota', 'nurfajri abdullah'),
(14, 9, 'anggota', 'aulia wijayanti'),
(15, 9, 'anggota', 'awan salawat'),
(16, 9, 'anggota', 'muh. iksan'),
(17, 9, 'anggota', 'david abdul rahman'),
(18, 9, 'anggota', 'dahniar'),
(19, 9, 'anggota', 'eka febrianti'),
(20, 9, 'anggota', 'eka julia'),
(21, 9, 'anggota', 'haidir'),
(22, 9, 'anggota', 'ade ayu lestari'),
(23, 9, 'anggota', 'ardi riskapasari'),
(24, 9, 'anggota', 'yusman'),
(25, 9, 'anggota', 'sukma'),
(26, 9, 'anggota', 'muhammas zulfikar'),
(27, 9, 'anggota', 'muhammad agustus'),
(28, 9, 'anggota', 'allu'),
(29, 9, 'anggota', 'guntur'),
(30, 9, 'anggota', 'andi ratrisuwandini'),
(31, 9, 'anggota', 'haslinda'),
(32, 7, 'admin', 'asran'),
(33, 7, 'admin', 'rahmat hidayat'),
(34, 7, 'anggota', 'muh. hamdan'),
(35, 7, 'anggota', 'harjuna'),
(36, 7, 'anggota', 'purnamasari'),
(37, 7, 'anggota', 'siti sri cahyani'),
(38, 8, 'anggota', 'wawan'),
(39, 8, 'anggota', 'risman'),
(40, 8, 'anggota', 'agus'),
(41, 8, 'anggota', 'kasmi'),
(42, 8, 'anggota', 'ifna'),
(43, 8, 'anggota', 'fadli'),
(44, 8, 'anggota', 'erus'),
(45, 8, 'anggota', 'inno'),
(46, 8, 'anggota', 'fera'),
(47, 8, 'anggota', 'toki'),
(48, 3, 'anggota', 'irwan setiawan'),
(49, 3, 'anggota', 'alamsyah'),
(50, 3, 'anggota', 'hardianto rahim'),
(51, 3, 'anggota', 'muhammad ansar'),
(52, 3, 'anggota', 'halida syarif'),
(53, 1, 'anggota', 'syahrani said'),
(54, 1, 'anggota', 'fadjiani ramadhan'),
(55, 1, 'anggota', 'emur'),
(56, 1, 'anggota', 'rahmat saleh'),
(57, 1, 'anggota', 'muhammad iksan'),
(58, 1, 'anggota', 'asti pratiwi'),
(59, 1, 'anggota', 'arianaonaka'),
(60, 1, 'anggota', 'henra ahmad'),
(61, 1, 'anggota', 'muh. ibrahim leman'),
(62, 1, 'anggota', 'sunardi purwanda'),
(63, 1, 'anggota', 'desi wulandari'),
(64, 2, 'anggota', 'agus'),
(65, 2, 'anggota', 'atri'),
(66, 2, 'anggota', 'ikram'),
(67, 2, 'anggota', 'agung'),
(68, 2, 'anggota', 'rina dewi'),
(69, 2, 'anggota', 'taufik'),
(70, 2, 'anggota', 'ibha'),
(71, 2, 'anggota', 'anton'),
(72, 2, 'anggota', 'ichal'),
(73, 2, 'anggota', 'ghozali m'),
(74, 2, 'anggota', 'ema sagita'),
(75, 2, 'anggota', 'isrank bondan'),
(76, 2, 'anggota', 'bucek'),
(77, 2, 'anggota', 'anjesk'),
(78, 2, 'anggota', 'rahmat'),
(82, 5, 'anggota', 'ibrahim lemon'),
(83, 5, 'anggota', 'dwiyanti lannang'),
(84, 5, 'anggota', 'ade tamala'),
(85, 5, 'anggota', 'zulfani'),
(86, 5, 'anggota', 'andi haswan saddade'),
(87, 5, 'anggota', 'afif ahmadi'),
(88, 4, 'anggota', 'syahrani said'),
(89, 4, 'anggota', 'sri mulyati'),
(90, 4, 'anggota', 'muh. iksan'),
(91, 4, 'anggota', 'darmawan'),
(92, 4, 'anggota', 'muliawati taif'),
(93, 4, 'anggota', 'khaidir amin'),
(94, 4, 'anggota', 'ririn rismayanti'),
(95, 6, 'anggota', 'nur janna'),
(96, 6, 'anggota', 'mulyana kim'),
(97, 6, 'anggota', 'dirgayanti indah'),
(98, 6, 'anggota', 'hajrah muhammad nur'),
(99, 6, 'anggota', 'badriani baharuddin'),
(100, 6, 'anggota', 'sarina ahmad maroga'),
(101, 6, 'anggota', 'nurul aqmaria'),
(102, 6, 'anggota', 'haslinda'),
(103, 6, 'anggota', 'amrihani'),
(104, 6, 'anggota', 'riska angriani'),
(105, 6, 'anggota', 'suriani'),
(106, 6, 'anggota', 'ummy kalsum muis'),
(107, 6, 'anggota', 'nur jihan '),
(108, 6, 'anggota', 'khaerani'),
(109, 6, 'anggota', 'nursam'),
(110, 6, 'anggota', 'caling'),
(111, 6, 'anggota', 'muh.ikhsan akib'),
(112, 6, 'anggota', 'mirna anwar'),
(113, 6, 'anggota', 'ermayanti'),
(114, 6, 'anggota', 'ipunk sugiarti'),
(115, 6, 'anggota', 'sakin mustafa'),
(116, 6, 'anggota', 'ramly raditya'),
(117, 6, 'anggota', 'nursakia'),
(118, 6, 'anggota', 'mustika'),
(119, 6, 'anggota', 'andi rahmadani'),
(120, 6, 'anggota', 'nadila'),
(121, 6, 'anggota', 'ratna'),
(122, 6, 'anggota', 'rosmeni'),
(123, 6, 'anggota', 'sinar'),
(124, 6, 'anggota', 'kurnia ilahi'),
(125, 6, 'anggota', 'munawara'),
(126, 6, 'anggota', 'sri ratnasari'),
(127, 6, 'anggota', 'salmawati'),
(128, 6, 'anggota', 'nur asma'),
(129, 6, 'anggota', 'diana aris'),
(130, 6, 'anggota', 'haslina'),
(131, 6, 'anggota', 'juwita anwar'),
(132, 12, 'admin', 'nisma isnaenin'),
(133, 12, 'anggota', 'rosmiati'),
(134, 12, 'anggota', 'nurul walinda'),
(135, 12, 'anggota', 'st. fajariayah'),
(136, 12, 'anggota', 'nurhardianti'),
(137, 12, 'anggota', 'yenni cahyani'),
(138, 12, 'anggota', 'dewi mustika'),
(139, 12, 'anggota', 'anita anggreani'),
(140, 12, 'anggota', 'rizki amalia'),
(141, 12, 'anggota', 'nurhikmah B'),
(142, 12, 'anggota', 'Nur Reski Abdullah'),
(143, 12, 'anggota', 'afrijani'),
(144, 12, 'anggota', 'sri ulfa r '),
(145, 12, 'anggota', 'surah hijriani'),
(146, 12, 'anggota', 'yunita');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `level_user` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `foto`, `jenkel`, `tgl_lahir`, `alamat`, `level_user`) VALUES
('ade tamala', '202cb962ac59075b964b07152d234b70', 'ade tamala', 'default.jpg', 'P', '1992-02-09', 'parepare', 'user'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'WIN_20161109_13_49_26_Pro.jpg', 'P', '1995-06-21', 'Admin', 'admin'),
('afif ahmadi', '202cb962ac59075b964b07152d234b70', 'afif ahmadi', 'default.jpg', 'L', '1990-05-15', 'parepare', 'user'),
('afrijani', '202cb962ac59075b964b07152d234b70', 'afrijani', 'default.jpg', 'P', '1996-02-04', 'parepare', 'user'),
('agung', '202cb962ac59075b964b07152d234b70', 'agung', 'default.jpg', 'L', '1997-08-07', 'parepare', 'user'),
('agus', '202cb962ac59075b964b07152d234b70', 'agus', 'default.jpg', 'L', '1995-04-23', 'parepare', 'user'),
('alamsyah', '202cb962ac59075b964b07152d234b70', 'alamsyah', 'default.jpg', 'L', '1995-09-09', 'parepare', 'user'),
('allu', '202cb962ac59075b964b07152d234b70', 'allu', 'default.jpg', 'L', '1998-02-19', 'parepare', 'user'),
('amrihani', '202cb962ac59075b964b07152d234b70', 'amrihani', 'default.jpg', 'P', '1997-03-23', 'parepare', 'user'),
('andi haswan saddade', '202cb962ac59075b964b07152d234b70', 'andi haswan saddade', 'default.jpg', 'L', '1993-04-12', 'parepare', 'user'),
('andi rahmadani', '202cb962ac59075b964b07152d234b70', 'andi rahmadani', 'default.jpg', 'P', '1995-07-21', 'parepare', 'user'),
('andi ratrisuwandini', '202cb962ac59075b964b07152d234b70', 'andi ratrisuwandini', 'default.jpg', 'P', '1994-04-13', 'parepare', 'user'),
('anita anggreani', '202cb962ac59075b964b07152d234b70', 'anita anggreani', 'default.jpg', 'P', '1996-09-21', 'parepare', 'user'),
('anjesk', '202cb962ac59075b964b07152d234b70', 'anjesk', 'default.jpg', 'L', '1997-05-11', 'parepare', 'user'),
('anton', '202cb962ac59075b964b07152d234b70', 'anton', 'default.jpg', 'L', '1997-05-04', 'parepare', 'user'),
('ardi riskapasari', '202cb962ac59075b964b07152d234b70', 'ardi riskapasari', 'default.jpg', 'L', '1994-12-01', 'parepare', 'user'),
('arianaonaka', '202cb962ac59075b964b07152d234b70', 'arianaonaka', 'default.jpg', 'L', '1995-12-02', 'parepare', 'user'),
('asran', '202cb962ac59075b964b07152d234b70', 'asran', 'default.jpg', 'L', '1994-04-21', 'parepare', 'user'),
('asti pratiwi', '202cb962ac59075b964b07152d234b70', 'asti pratiwi', 'default.jpg', 'P', '1994-04-04', 'parepare', 'user'),
('atri', '202cb962ac59075b964b07152d234b70', 'atri', 'default.jpg', 'P', '1995-07-19', 'parepare', 'user'),
('aulia wijayanti', '202cb962ac59075b964b07152d234b70', 'aulia wijayanti', 'default.jpg', 'P', '1995-06-10', 'parepare', 'user'),
('awan salawat', '202cb962ac59075b964b07152d234b70', 'awan salawat', 'default.jpg', 'L', '1996-01-09', 'parepare', 'user'),
('ayu paranti', '202cb962ac59075b964b07152d234b70', 'ayu paranti', 'default.jpg', 'P', '1996-12-12', 'parepare', 'user'),
('badriani baharuddin', '202cb962ac59075b964b07152d234b70', 'badriani baharuddin', 'default.jpg', 'P', '1995-01-19', 'parepare', 'user'),
('bucek', '202cb962ac59075b964b07152d234b70', 'bucek', 'default.jpg', 'L', '1997-10-27', 'parepare', 'user'),
('caling', '202cb962ac59075b964b07152d234b70', 'caling', 'default.jpg', 'L', '1996-02-28', 'parepare', 'user'),
('dahniar', '202cb962ac59075b964b07152d234b70', 'dahniar', 'default.jpg', 'P', '1995-11-06', 'parepare', 'user'),
('darmawan', '202cb962ac59075b964b07152d234b70', 'darmawan', 'default.jpg', 'L', '1991-02-14', 'parepare', 'user'),
('david abdul rahman', '202cb962ac59075b964b07152d234b70', 'david abdul rahman', 'default.jpg', 'L', '1996-01-25', 'parepare', 'user'),
('dedi', '202cb962ac59075b964b07152d234b70', 'dedi', 'default.jpg', 'L', '1995-07-17', 'parepare', 'user'),
('desi wulandari', '202cb962ac59075b964b07152d234b70', 'desi wulandari', 'default.jpg', 'P', '1995-06-09', 'parepare', 'user'),
('dewi mustika', '202cb962ac59075b964b07152d234b70', 'dewi mustika', 'default.jpg', 'P', '1994-04-05', 'parepare', 'user'),
('diah ayu', '202cb962ac59075b964b07152d234b70', 'diah ayu', 'default.jpg', 'P', '1995-04-19', 'parepare', 'user'),
('diana aris', '202cb962ac59075b964b07152d234b70', 'diana aris', 'default.jpg', 'P', '1997-11-09', 'parepare', 'user'),
('dirgayanti indah', '202cb962ac59075b964b07152d234b70', 'dirgayanti indah', 'default.jpg', 'P', '1995-08-06', 'parepare', 'user'),
('dirlang', '202cb962ac59075b964b07152d234b70', 'dirlang', 'default.jpg', 'L', '1994-07-26', 'parepare', 'user'),
('dwiyanti lannang', '202cb962ac59075b964b07152d234b70', 'dwiyanti lannang', 'default.jpg', 'P', '1990-11-07', 'parepare', 'user'),
('edy sanjaya', '202cb962ac59075b964b07152d234b70', 'edy sanjaya', 'default.jpg', 'P', '1995-10-13', 'parepare', 'user'),
('eka febrianti', '202cb962ac59075b964b07152d234b70', 'eka febrianti', 'default.jpg', 'P', '1996-04-21', 'parepare', 'user'),
('eka julia', '202cb962ac59075b964b07152d234b70', 'eka julia', 'default.jpg', 'P', '1997-02-15', 'parepare', 'user'),
('ema sagita', '202cb962ac59075b964b07152d234b70', 'ema sagita', 'default.jpg', 'L', '1995-08-31', 'parepare', 'user'),
('emur', '202cb962ac59075b964b07152d234b70', 'emur', 'default.jpg', 'L', '1993-06-07', 'parepare', 'user'),
('ermayanti', '202cb962ac59075b964b07152d234b70', 'ermayanti', 'default.jpg', 'P', '1995-07-18', 'parepare', 'user'),
('erus', '202cb962ac59075b964b07152d234b70', 'erus', 'default.jpg', 'L', '1997-02-18', 'parepare', 'user'),
('fadjiani ramadhan', '202cb962ac59075b964b07152d234b70', 'fadjiani ramadhan', 'default.jpg', 'P', '1994-10-07', 'parepare', 'user'),
('fadli', '202cb962ac59075b964b07152d234b70', 'fadli', 'default.jpg', 'L', '1996-08-27', 'parepare', 'user'),
('fera', '202cb962ac59075b964b07152d234b70', 'fera', 'default.jpg', 'P', '1997-04-02', 'parepare', 'user'),
('ghozali m', '202cb962ac59075b964b07152d234b70', 'ghozali m', 'default.jpg', 'L', '1995-08-21', 'parepare', 'user'),
('guntur', '202cb962ac59075b964b07152d234b70', 'guntur', 'default.jpg', 'L', '1994-01-03', 'parepare', 'user'),
('haidir', '202cb962ac59075b964b07152d234b70', 'haidir', 'default.jpg', 'L', '1994-11-09', 'parepare', 'user'),
('hajrah muhammad nur', '202cb962ac59075b964b07152d234b70', 'hajrah muhammad nur', 'default.jpg', 'P', '1995-02-26', 'parepare', 'user'),
('halida syarif', '202cb962ac59075b964b07152d234b70', 'halida syarif', 'default.jpg', 'P', '1994-12-06', 'parepare', 'user'),
('hardianto rahim', '202cb962ac59075b964b07152d234b70', 'hardianto rahim', 'default.jpg', 'L', '1994-08-16', 'parepare', 'user'),
('harjuna', '202cb962ac59075b964b07152d234b70', 'harjuna', 'default.jpg', 'L', '1994-03-13', 'parepare', 'user'),
('haslina', '202cb962ac59075b964b07152d234b70', 'haslina', 'default.jpg', 'P', '1996-12-07', 'parepare', 'user'),
('haslinda', '202cb962ac59075b964b07152d234b70', 'haslinda', 'default.jpg', 'P', '1997-09-10', 'parepare', 'user'),
('henra ahmad', '202cb962ac59075b964b07152d234b70', 'henra ahmad', 'default.jpg', 'L', '1993-12-15', 'parepare', 'user'),
('hj.rahmatia', '202cb962ac59075b964b07152d234b70', 'hj.rahmatia', 'default.jpg', 'P', '1993-11-27', 'parepare', 'user'),
('ibha', '202cb962ac59075b964b07152d234b70', 'ibha', 'default.jpg', 'L', '1998-06-20', 'parepare', 'user'),
('ibrahim lemon', '202cb962ac59075b964b07152d234b70', 'ibrahim lemon', 'default.jpg', 'L', '1990-07-17', 'parepare', 'user'),
('ical', '202cb962ac59075b964b07152d234b70', 'ical', 'default.jpg', 'L', '1992-09-26', 'parepare', 'user'),
('ichal', '202cb962ac59075b964b07152d234b70', 'ical', 'default.jpg', 'L', '1995-12-30', 'parepare', 'user'),
('ifna', '202cb962ac59075b964b07152d234b70', 'ifna', 'default.jpg', 'P', '1995-08-07', 'parepare', 'user'),
('ikram', '202cb962ac59075b964b07152d234b70', 'ikram', 'default.jpg', 'L', '1995-06-09', 'parepare', 'user'),
('ilham mustamin', '202cb962ac59075b964b07152d234b70', 'ilham mustamin', 'default.jpg', 'L', '1993-08-15', 'parepare', 'user'),
('inno', '202cb962ac59075b964b07152d234b70', 'inno', 'default.jpg', 'L', '1996-05-11', 'parepare', 'user'),
('ipunk sugiarti', '202cb962ac59075b964b07152d234b70', 'ipunk sugiarti', 'default.jpg', 'L', '1996-06-04', 'parepare', 'user'),
('irwan setiawan', '202cb962ac59075b964b07152d234b70', 'irwan setiawan', 'default.jpg', 'L', '1994-09-19', 'parepare', 'user'),
('isrank bondan', '202cb962ac59075b964b07152d234b70', 'isrank bondan', 'default.jpg', 'L', '1995-01-19', 'parepare', 'user'),
('juwita anwar', '202cb962ac59075b964b07152d234b70', 'juwita anwar', 'default.jpg', 'P', '1995-09-12', 'parepare', 'user'),
('kasmi', '202cb962ac59075b964b07152d234b70', 'kasmi', 'default.jpg', 'P', '1996-02-21', 'parepare', 'user'),
('khaerani', '202cb962ac59075b964b07152d234b70', 'khaerani', 'default.jpg', 'P', '1994-01-09', 'parepare', 'user'),
('khaidir amin', '202cb962ac59075b964b07152d234b70', 'khaidir amin', 'default.jpg', 'L', '1992-05-02', 'parepare', 'user'),
('kurnia ilahi', '202cb962ac59075b964b07152d234b70', 'kurnia ilahi', 'default.jpg', 'P', '1994-07-04', 'parepare', 'user'),
('lia', '202cb962ac59075b964b07152d234b70', 'lia', 'default.jpg', 'P', '1996-08-12', 'parepare', 'user'),
('lutfiah mutmainnah', '202cb962ac59075b964b07152d234b70', 'lutfiah mutmainnah', 'default.jpg', 'P', '1996-07-14', 'parepare', 'user'),
('marniaty yunus,S.Psi', '202cb962ac59075b964b07152d234b70', 'marniaty yunus', '20170820_142554.jpg', 'P', '1990-11-17', 'parepare', 'user'),
('mirna anwar', '202cb962ac59075b964b07152d234b70', 'mirna anwar', 'default.jpg', 'P', '1996-08-08', 'parepare', 'user'),
('muh. hamdan', '202cb962ac59075b964b07152d234b70', 'muh. hamdan', 'default.jpg', 'L', '1995-08-04', 'parepare', 'user'),
('muh. ibrahim leman', '202cb962ac59075b964b07152d234b70', 'muh. ibrahim leman', 'default.jpg', 'L', '1993-10-28', 'parepare', 'user'),
('muh. iksan', '202cb962ac59075b964b07152d234b70', 'muh. iksan', 'default.jpg', 'L', '1991-06-09', 'parepare', 'user'),
('muh.ikhsan akib', '202cb962ac59075b964b07152d234b70', 'muh.ikhsan akib', 'default.jpg', 'L', '1996-01-17', 'parepare', 'user'),
('muhammad agustus', '202cb962ac59075b964b07152d234b70', 'muhammad agustus', 'default.jpg', 'L', '1994-08-05', 'parepare', 'user'),
('muhammad ansar', '202cb962ac59075b964b07152d234b70', 'muhammad ansar', 'default.jpg', 'L', '1993-12-06', 'parepare', 'user'),
('muhammad ikhsan', '202cb962ac59075b964b07152d234b70', 'muhammad ikhsan', 'default.jpg', 'L', '1996-11-17', 'parepare', 'user'),
('muhammad iksan', '202cb962ac59075b964b07152d234b70', 'muhammad iksan', 'default.jpg', 'L', '1995-05-27', 'parepare', 'user'),
('muhammas zulfikar', '202cb962ac59075b964b07152d234b70', 'muhammas zulfikar', 'default.jpg', 'L', '1994-04-12', 'parepare', 'user'),
('muliawati taif', '202cb962ac59075b964b07152d234b70', 'muliawati taif', 'default.jpg', 'P', '1992-09-17', 'parepare', 'user'),
('mulyana kim', '202cb962ac59075b964b07152d234b70', 'mulyana kim', 'default.jpg', 'P', '1994-12-04', 'parepare', 'user'),
('munawara', '202cb962ac59075b964b07152d234b70', 'munawara', 'default.jpg', 'P', '1994-10-23', 'parepare', 'user'),
('mustika', '202cb962ac59075b964b07152d234b70', 'mustika', 'default.jpg', 'P', '1997-08-16', 'parepare', 'user'),
('musyafirah', '202cb962ac59075b964b07152d234b70', 'musyafirah', 'default.jpg', 'P', '1996-08-17', 'parepare', 'user'),
('nadila', '202cb962ac59075b964b07152d234b70', 'nadila', 'default.jpg', 'P', '1995-07-06', 'parepare', 'user'),
('ningrum wulansari', '202cb962ac59075b964b07152d234b70', 'ningrum wulansari', 'default.jpg', 'P', '1995-01-09', 'parepare', 'user'),
('nisma isnaenin', '202cb962ac59075b964b07152d234b70', 'nisma isnaenin', 'default.jpg', 'P', '1995-10-24', 'parepare', 'user'),
('nisma muslimah parep', '202cb962ac59075b964b07152d234b70', 'nisma muslimah parep', 'default.jpg', 'P', '1993-08-24', 'parepare', 'user'),
('nur asma', '202cb962ac59075b964b07152d234b70', 'nur asma', 'default.jpg', 'P', '1997-03-06', 'parepare', 'user'),
('nur janna', '202cb962ac59075b964b07152d234b70', 'nur janna', 'default.jpg', 'P', '1997-10-05', 'parepare', 'user'),
('nur jihan ', '202cb962ac59075b964b07152d234b70', 'nur jihan ', 'default.jpg', 'P', '1995-05-13', 'parepare', 'user'),
('Nur Reski Abdullah', '202cb962ac59075b964b07152d234b70', 'Nur Reski Abdullah', 'default.jpg', 'P', '1996-06-10', 'parepare', 'user'),
('nurfajri abdullah', '202cb962ac59075b964b07152d234b70', 'nurfajri abdullah', 'default.jpg', 'P', '1995-07-12', 'parepare', 'user'),
('nurhardianti', '202cb962ac59075b964b07152d234b70', 'nurhardianti', 'default.jpg', 'P', '1994-11-04', 'parepare', 'user'),
('nurhikmah B', '202cb962ac59075b964b07152d234b70', 'nurhikmah B', 'default.jpg', 'P', '1996-12-02', 'parepare', 'user'),
('nursakia', '202cb962ac59075b964b07152d234b70', 'nursakia', 'default.jpg', 'P', '1997-01-31', 'parepare', 'user'),
('nursam', '202cb962ac59075b964b07152d234b70', 'nursam', 'default.jpg', 'P', '1994-06-07', 'parepare', 'user'),
('nurul aqmaria', '202cb962ac59075b964b07152d234b70', 'nurul aqmaria', 'default.jpg', 'P', '1997-06-05', 'parepare', 'user'),
('nurul fadillah musta', '202cb962ac59075b964b07152d234b70', 'nurul fadillah musta', 'default.jpg', 'P', '1995-03-09', 'parepare', 'user'),
('nurul fadillah syafa', '202cb962ac59075b964b07152d234b70', 'nurul fadillah syafa', 'default.jpg', 'P', '1995-07-19', 'parepare', 'user'),
('nurul walinda', '202cb962ac59075b964b07152d234b70', 'nurul walinda', 'default.jpg', 'P', '1995-04-28', 'parepare', 'user'),
('purnamasari', '202cb962ac59075b964b07152d234b70', 'purnamasari', 'default.jpg', 'P', '1994-06-06', 'parepare', 'user'),
('rahmat', '202cb962ac59075b964b07152d234b70', 'rahmat', 'default.jpg', 'L', '1998-04-30', 'parepare', 'user'),
('rahmat hidayat', '202cb962ac59075b964b07152d234b70', 'rahmat hidayat', 'default.jpg', 'L', '1995-05-15', 'parepare', 'user'),
('rahmat saleh', '202cb962ac59075b964b07152d234b70', 'rahmat saleh', 'default.jpg', 'L', '1993-12-01', 'parepare', 'user'),
('ramly raditya', '202cb962ac59075b964b07152d234b70', 'ramly raditya', 'default.jpg', 'L', '1995-05-07', 'parepare', 'user'),
('ratna', '202cb962ac59075b964b07152d234b70', 'ratna', 'default.jpg', 'P', '1996-03-27', 'parepare', 'user'),
('rina dewi', '202cb962ac59075b964b07152d234b70', 'rina dewi', 'default.jpg', 'P', '1996-04-14', 'parepare', 'user'),
('ririn rismayanti', '202cb962ac59075b964b07152d234b70', 'ririn rismayanti', 'default.jpg', 'P', '1992-05-20', 'parepare', 'user'),
('riska angriani', '202cb962ac59075b964b07152d234b70', 'riska angriani', 'default.jpg', 'P', '1994-01-21', 'parepare', 'user'),
('risman', '202cb962ac59075b964b07152d234b70', 'risman', 'default.jpg', 'L', '1997-09-09', 'parepare', 'user'),
('rizki amalia', '202cb962ac59075b964b07152d234b70', 'rizki amalia', 'default.jpg', 'P', '1995-05-18', 'parepare', 'user'),
('rosmeni', '202cb962ac59075b964b07152d234b70', 'rosmeni', 'default.jpg', 'P', '1995-03-22', 'parepare', 'user'),
('rosmiati', '202cb962ac59075b964b07152d234b70', 'rosmiati', 'default.jpg', 'P', '1995-04-19', 'parepare', 'user'),
('sakin mustafa', '202cb962ac59075b964b07152d234b70', 'sakin mustafa', 'default.jpg', 'L', '1997-07-05', 'parepare', 'user'),
('salmawati', '202cb962ac59075b964b07152d234b70', 'salmawati', 'default.jpg', 'P', '1994-04-28', 'parepare', 'user'),
('sarina ahmad maroga', '202cb962ac59075b964b07152d234b70', 'sarina ahmad maroga', 'default.jpg', 'P', '1997-10-10', 'parepare', 'user'),
('sinar', '202cb962ac59075b964b07152d234b70', 'sinar', 'default.jpg', 'P', '1995-09-09', 'parepare', 'user'),
('siti sri cahyani', '202cb962ac59075b964b07152d234b70', 'siti sri cahyani', 'default.jpg', 'P', '1995-09-04', 'parepare', 'user'),
('sri mulya dwi indahw', '202cb962ac59075b964b07152d234b70', 'sri mulya dwi indahw', 'default.jpg', 'P', '0994-04-11', 'parepare', 'user'),
('sri mulyati', '202cb962ac59075b964b07152d234b70', 'sri mulyati', 'default.jpg', 'P', '1991-07-04', 'parepare', 'user'),
('sri ratnasari', '202cb962ac59075b964b07152d234b70', 'sri ratnasari', 'default.jpg', 'P', '1996-02-15', 'parepare', 'user'),
('sri ulfa r ', '202cb962ac59075b964b07152d234b70', 'sri ulfa r ', 'default.jpg', 'P', '1997-12-04', 'parepare', 'user'),
('st. fajariayah', '202cb962ac59075b964b07152d234b70', 'st. fajariayah', 'default.jpg', 'P', '1995-05-16', 'parepare', 'user'),
('sukma', '202cb962ac59075b964b07152d234b70', 'sukma', 'default.jpg', 'P', '0995-02-11', 'parepare', 'user'),
('sunardi purwanda', '202cb962ac59075b964b07152d234b70', 'sunardi purwanda', 'default.jpg', 'L', '1995-07-17', 'parepare', 'user'),
('surah hijriani', '202cb962ac59075b964b07152d234b70', 'surah hijriani', 'default.jpg', 'P', '1996-03-01', 'parepare', 'user'),
('suriani', '202cb962ac59075b964b07152d234b70', 'suriani', 'default.jpg', 'P', '1994-06-24', 'parepare', 'user'),
('syahrani said', '202cb962ac59075b964b07152d234b70', 'syahrani said', 'default.jpg', 'L', '1993-08-08', 'parepare', 'user'),
('syamsul bahri ', '202cb962ac59075b964b07152d234b70', 'syamsul bahri ', 'default.jpg', 'L', '1994-01-01', 'parepare', 'user'),
('syamsul rijal madani', '202cb962ac59075b964b07152d234b70', 'syamsul rijal madani', 'default.jpg', 'L', '1990-09-10', 'parepare', 'user'),
('taufik', '202cb962ac59075b964b07152d234b70', 'taufik', 'default.jpg', 'L', '1996-02-15', 'parepare', 'user'),
('toki', '202cb962ac59075b964b07152d234b70', 'toki', 'default.jpg', 'L', '1998-09-13', 'parepare', 'user'),
('ummy kalsum muis', '202cb962ac59075b964b07152d234b70', 'ummy kalsum muis', 'default.jpg', 'P', '1997-08-05', 'parepare', 'user'),
('wawan', '202cb962ac59075b964b07152d234b70', 'wawan', 'default.jpg', 'L', '1995-10-10', 'parepare', 'user'),
('wirawan setialaksana', '202cb962ac59075b964b07152d234b70', 'wirawan setialaksana', 'default.jpg', 'L', '1990-12-20', 'parepare', 'user'),
('yenni cahyani', '202cb962ac59075b964b07152d234b70', 'yenni cahyani', 'default.jpg', 'P', '1995-06-24', 'parepare', 'user'),
('yunita', '202cb962ac59075b964b07152d234b70', 'yunita', 'default.jpg', 'P', '1996-08-09', 'parepare', 'user'),
('yusman', '202cb962ac59075b964b07152d234b70', 'yusman', 'default.jpg', 'L', '1993-02-14', 'parepare', 'user'),
('zulfani', '202cb962ac59075b964b07152d234b70', 'zulfani', 'default.jpg', 'P', '1993-03-31', 'parepare', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id_komunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
