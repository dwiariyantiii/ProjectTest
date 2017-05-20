CREATE TABLE `pegawais` (
  `id` int(10) NOT NULL,
  `NIP` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gelar` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CreatedBy` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UpdatedBy` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `GolonganID` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `GolonganID` (`GolonganID`);
  
ALTER TABLE `pegawais`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
  
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_ibfk_1` FOREIGN KEY (`GolonganID`) REFERENCES `golongans` (`id`);