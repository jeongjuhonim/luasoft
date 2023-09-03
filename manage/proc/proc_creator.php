<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
$data_array = array();
$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);
if(empty($seq)){
    echo json_encode($result);
    exit;
}
$set_query = "
tm_grade = ?
, tm_follow_cnt = ?
";

$data_array[] = $tm_grade;
$data_array[] = $tm_follow_cnt;


$data_array[] = $seq;
$query = "update tbl_member set
       {$set_query} 
       where tm_seq = ?";

$ps = pdo_query($db, $query, $data_array);
$result['msg'] = '수정 완료 되었습니다.';


$result['code'] = true;
echo json_encode($result);
?>