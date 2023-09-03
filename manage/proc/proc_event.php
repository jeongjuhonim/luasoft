<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
$data_array = array();
$result = array(
    'code'=> false,
    'msg' => '잘못된 접근입니다.'
);


if($te_fix=='on'){
    $te_fix = 'Y';
}else{
    $te_fix = 'N';
}

if($te_status=='on'){
    $te_status = 'Y';
}else{
    $te_status = 'N';
}

$set_query = "
te_title = ?
, te_content = ?
, te_regdate = ?
, te_sdate = ?
, te_edate = ?
, te_status = ?
, te_fix = ?
, te_cate = ?
";

$data_array[] = $te_title;
$data_array[] = $te_content;
$data_array[] = $te_regdate;
$data_array[] = $te_sdate;
$data_array[] = $te_edate;
$data_array[] = $te_status;
$data_array[] = $te_fix;
$data_array[] = $te_cate;

$file_data = upload_file('te_thumbnail','/upload_file');
if(!empty($file_data)){
    $set_query .="
    , te_thumbnail = ?
    , te_thumbnail_org = ?";

    $data_array[] = $file_data['location'];
    $data_array[] = $file_data['org_file_name'];
}

if(empty($seq)){
    $query = "insert tbl_event set
           {$set_query} ";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '등록 완료 되었습니다.';
}else{
    $data_array[] = $seq;
    $query = "update tbl_event set
           {$set_query} 
           where te_seq = ?";

    $ps = pdo_query($db, $query, $data_array);
    $result['msg'] = '수정 완료 되었습니다.';
}

$result['code'] = true;
echo json_encode($result);
?>