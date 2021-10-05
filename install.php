<?php
// v3.0.3.7.2
// Check and create tables if not exits
$check_modification = $this->db->query("SELECT * "
	. " FROM information_schema.tables "
	. " WHERE table_schema = '" . DB_DATABASE . "'"
	. " AND table_name = '" . DB_PREFIX . "modification'"
	. " LIMIT 1;"
	)->num_rows;
if (!$check_modification) {
	$modification_table_sql = "CREATE TABLE `". DB_PREFIX . "modification` ("
		. " `modification_id` INT(11) NOT NULL AUTO_INCREMENT,"
		. " `extension_install_id` INT(11) NOT NULL,"
		. " `name` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',"
		. " `code` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',"
		. " `author` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',"
		. " `version` VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci',"
		. " `link` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',"
		. " `xml` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',"
		. " `status` TINYINT(1) NOT NULL,"
		. " `date_added` DATETIME NOT NULL,"
		. " PRIMARY KEY (`modification_id`) USING BTREE"
		. ")"
		. "	COLLATE='utf8_general_ci'"
		. " ENGINE=MyISAM;";
	$this->db->query($modification_table_sql);
}
$check_modification_backup = $this->db->query("SELECT * "
	. " FROM information_schema.tables "
	. " WHERE table_schema = '" . DB_DATABASE . "'"
	. " AND table_name = '" . DB_PREFIX . "modification_backup'"
	. " LIMIT 1;"
	)->num_rows;
if (!$check_modification_backup) {
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