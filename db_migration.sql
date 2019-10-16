===== table kategori =====
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

=====end table kategori =====

===== update menu =====
INSERT INTO `tbl_menu` (`id_menu`, `label`, `link`, `icon`, `grup`, `parent`, `sort`) VALUES (NULL, 'Kategori', 'kategori', 'icon-price-tags', 'admin', '0', '7');
===== end update menu =====

===== event and forum relation ====
ALTER TABLE `event` ADD `id_forum` INT NOT NULL AFTER `id_kategori`;
===== end event and forum relation ====