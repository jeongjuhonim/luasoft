<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/lua/include/common.php';
$data_array = array();
$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);

$set_query = "
tc_type = ?
, tc_email = ?
, tc_company = ?
, tc_name = ?
, tc_phone = ?
, tc_content = ?
, tc_regdate = now()
";

$data_array[] = implode(',',$tc_type);
$data_array[] = $tc_email;
$data_array[] = $tc_company;
$data_array[] = $tc_name;
$data_array[] = $tc_phone;
$data_array[] = $tc_content;
$query = "insert tbl_contact set
       {$set_query} ";

$ps = pdo_query($db, $query, $data_array);
$result['msg'] = '문의가 완료되었습니다.';


$result['code'] = true;
echo json_encode($result);
?>