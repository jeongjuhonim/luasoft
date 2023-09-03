<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/manage/include/common.php';


$pass = base64_encode(hash('sha256', 'skql1506*', true));
$query = "SELECT EXISTS (
  SELECT 1 FROM Information_schema.tables 
  WHERE table_schema = 'lua' 
  AND table_name = 'tbl_admin' 
) AS flag";
$data = _MQ($query);
if($data['flag'] != 1){
    $query = "
    CREATE TABLE `tbl_admin` (
      `ta_seq` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `ta_id` varchar(100) NOT NULL,
      `ta_pwd` varchar(500) NOT NULL,
      `ta_auth_num` int(11) NOT NULL,
      `ta_name` varchar(100) NOT NULL,
      `ta_last_login` datetime DEFAULT NULL,
      `ta_last_ip` varchar(100) DEFAULT NULL,
      PRIMARY KEY (`ta_seq`)
    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
    ";
    _MQ_noreturn($query);

    $query = "
    insert tbl_admin set
    ta_id = 'wjdwngh733'
    , ta_pwd = '{$pass}'
    , ta_auth_num = 0
    , ta_name = '정주호'
    ";
    _MQ_noreturn($query);
}

?>