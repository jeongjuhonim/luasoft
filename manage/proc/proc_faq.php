<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
$data_array = array();
$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);


if($tf_fix=='on'){
    $tf_fix = 'Y';
}else{
    $tf_fix = 'N';
}

if($tf_status=='on'){
    $tf_status = 'Y';
}else{
    $tf_status = 'N';
}

$set_query = "
tf_title = ?
, tf_content = ?
, tf_regdate = ?
, tf_status = ?
, tf_fix = ?
";

$data_array[] = $tf_title;
$data_array[] = $tf_content;
$data_array[] = $tf_regdate;
$data_array[] = $tf_status;
$data_array[] = $tf_fix;

if(empty($seq)){
    $query = "insert tbl_faq set
           {$set_query} ";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '등록 완료 되었습니다.';
}else{
    $data_array[] = $seq;
    $query = "update tbl_faq set
           {$set_query} 
           where tf_seq = ?";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '수정 완료 되었습니다.';
}

$result['code'] = true;
echo json_encode($result);
?>