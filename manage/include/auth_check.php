<?
	if(empty($_SESSION['admin_info'])){
		page_move('/manage/view/login.php');
		exit;
	}
	
	$admin_idx = $_SESSION['admin_idx'];
	$admin_info = $_SESSION['admin_info'];
	
?>