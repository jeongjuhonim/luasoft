<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
$data_array = array();
$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);


if($tn_fix=='on'){
    $tn_fix = 'Y';
}else{
    $tn_fix = 'N';
}

if($tn_status=='on'){
    $tn_status = 'Y';
}else{
    $tn_status = 'N';
}

$set_query = "
tn_title = ?
, tn_content = ?
, tn_regdate = ?
, tn_status = ?
, tn_fix = ?
";

$data_array[] = $tn_title;
$data_array[] = $tn_content;
$data_array[] = $tn_regdate;
$data_array[] = $tn_status;
$data_array[] = $tn_fix;

if(empty($seq)){
    $query = "insert tbl_notice set
           {$set_query} ";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '등록 완료 되었습니다.';
}else{
    $data_array[] = $seq;
    $query = "update tbl_notice set
           {$set_query} 
           where tn_seq = ?";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '수정 완료 되었습니다.';
}

$result['code'] = true;
echo json_encode($result);
?>