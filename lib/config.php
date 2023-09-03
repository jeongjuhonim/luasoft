<?php

#DB설정
$_cfg['db_host'] = 'localhost';
$_cfg['db_user'] = 'root';
$_cfg['db_password'] = 'skql1506*';
$_cfg['db_database'] = 'lua';
$_cfg['dsn']=array("mysql:host=".$_cfg['db_host'].";dbname=".$_cfg['db_database'],$_cfg['db_user'],$_cfg['db_password']);


$_site['ext_deny'] = array('php','phtm','htm','cgi','pl','exe','jsp','asp','inc','html','js','xml','css'); //차단 확장자 배열
$_site['ext_allow'] = array('jpg','jpeg','gif','png','zip','pdf','ppt','pptx','doc','docx','xls','xlsx','hwp','ico','mp4','mov');	//허용 첨부 파일

?>