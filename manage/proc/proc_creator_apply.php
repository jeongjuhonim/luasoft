<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';

$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);

if($status=='Y'){
    $msg_title = '승인';
}else{
    $msg_title = '거절';
}

foreach($seq_array as $index => $val){
    $query="UPDATE tbl_member SET
        tm_status = ?
        WHERE tm_seq = ? ";
    $ps = pdo_query($db,$query,array($status,$val));
}


$result = array(
    'code'=> true,
    'msg' => '성공적으로 '.$msg_title.'되었습니다.'
);

echo json_encode($result);
?>