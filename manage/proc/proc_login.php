<?php
/*************************
파일명 : login_proc.php
기 능  : 로그인 처리
 **************************/
include_once $_SERVER['DOCUMENT_ROOT'].'/manage/include/common.php';


foreach($_SESSION as $key => $val) {
    $_SESSION[$key] = '';
}

$result['code']='FALSE';
$result['msg']='잘못된 접근입니다.';

$id = $_REQUEST['id'];
$pwd = $_REQUEST['pwd'];

if(empty($id) || empty($pwd)){
    echo json_encode($result);
    exit;
}

$pwd = base64_encode(hash('sha256', $pwd, true));
$query="SELECT COUNT(*) as cnt, T1.*
			FROM tbl_admin as T1 
			WHERE ta_id=? and ta_pwd = ?";
$ps = pdo_query($db,$query,array($id,$pwd));
$data = $ps->fetch(PDO::FETCH_ASSOC);

if($data['cnt']<1){
    $result['msg']='일치하는 정보가 없습니다.';
    echo json_encode($result);
    exit;
}

$_SESSION['admin_idx'] = $data['ta_seq'];
$_SESSION['admin_name'] = $data['ta_name'];
$_SESSION['ta_auth_num'] = $data['ta_auth_num'];
$_SESSION['admin_info'] = $data;

$result['code']='TRUE';
$result['msg'] =$data['ta_name']."님 환영합니다.";
echo json_encode($result);


?>