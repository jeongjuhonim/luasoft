<?
header("Content-Type: text/html; charset=UTF-8");
ini_set('log_errors', 'On');
ini_set( 'display_errors', '0' );
date_default_timezone_set('Asia/Seoul');

//error_reporting( E_ALL );
//ini_set( "display_errors", 1 );

// 보안설정이나 프레임이 달라도 쿠키가 통하도록 설정
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');

session_start();

include $_SERVER['DOCUMENT_ROOT'].'/lib/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/lib.php';
include $_SERVER['DOCUMENT_ROOT'].'/lib/encryption.php';

$db=db_con($_cfg['dsn']);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->exec("set names utf8mb4");

$enc = new encryption();

foreach ($_REQUEST as $key => $value){
    if(is_array($value)==1){
        if(!empty($value)){
            $requery_array = array();
            foreach($value as $key2 =>$val){
                $requery_array[$key2] = html_filter(removeXSS($val));
            }
            $_REQUEST[$key] = $requery_array;
            ${$key} = $requery_array;
        }

    }else {
        $_REQUEST[$key] = html_filter(removeXSS($value));
        ${$key} = html_filter(removeXSS($value));
    }
}
?>