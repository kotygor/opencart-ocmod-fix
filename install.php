<?php
// Перевірка на існування таблиць
$check = $this->db->query("SELECT * "
	. " FROM information_schema.tables "
	. " WHERE table_schema = '" . DB_DATABASE . "'"
	. " AND table_name = '" . DB_PREFIX . "modification_backup'"
	. " LIMIT 1;"
	)->num_rows;
if (!$check) {
	$table_sql = "CREATE TABLE `" . DB_PREFIX . "modification_backup` ("
		. " `backup_id` INT(11) NOT NULL AUTO_INCREMENT,"
		. " `modification_id` INT(11) NOT NULL,"
		. " `code` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',"
		. " `xml` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',"
		. " `date_added` DATETIME NOT NULL,"
		. " PRIMARY KEY (`backup_id`) USING BTREE"
		. " ) COLLATE='utf8_general_ci' ENGINE=MyISAM;";
	$this->db->query($table_sql);
}