<?
function db_con($conInfo){ //db 접속		
  try{
    $conDb=new PDO($conInfo[0],$conInfo[1],$conInfo[2],array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true));
    return $conDb;
  }catch(PDOException $e){  //관리자메일 및 sms전송 추가 할것
	  echo  $e->getMessage();
    echo"죄송합니다. 접속량이 많아 접속이 원할하지 않습니다. 잠시 후에 다시 접속해 주십시요. [code:m0001]";
    exit;
  }
}


// 하나
function _MQ($query, $var_con=null) {
	global $db ;
	$arr = array();
	if( !$var_con ) { $var_con = $db ; }
	$res =  pdo_query( $var_con,$query ) or msg_Error( $query );
	return $res ->fetch(PDO::FETCH_ASSOC);
}

// 실행
function _MQ_noreturn($query , $var_con=null) {
	global $db ;
	if( !$var_con ) { $var_con = $db ; }
	$res = pdo_query( $var_con,$query ) or msg_Error( $query );
	return $res;
}

// array
function _MQ_assoc($query , $var_con=null) {
	global $db ;
	$arr = array();
	if( !$var_con ) { $var_con = $db ; }
	$res = pdo_query( $var_con,$query ) or msg_Error( $query );
	for($i=0;$r= $res ->fetch(PDO::FETCH_ASSOC); $i++){
		foreach($r as $k=>$v) {
			$arr[$i][$k] = $v;
		}
	}
	mysqli_free_result($res);
	return $arr ;
}


function getRealClientIp() {

    $ipaddress = '';

    if (getenv('HTTP_CLIENT_IP')) {

        $ipaddress = getenv('HTTP_CLIENT_IP');

    } else if(getenv('HTTP_X_FORWARDED_FOR')) {

        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');

    } else if(getenv('HTTP_X_FORWARDED')) {

        $ipaddress = getenv('HTTP_X_FORWARDED');

    } else if(getenv('HTTP_FORWARDED_FOR')) {

        $ipaddress = getenv('HTTP_FORWARDED_FOR');

    } else if(getenv('HTTP_FORWARDED')) {

        $ipaddress = getenv('HTTP_FORWARDED');

    } else if(getenv('REMOTE_ADDR')) {

        $ipaddress = getenv('REMOTE_ADDR');

    } else {

        $ipaddress = '';

    } 

    return $ipaddress;

}



function getDayMain($start_date,$end_date,$e_type){
	$timenow = date("Y-m-d"); 
	$str_target = date($start_date);
	$time_dif = strtotime($str_target) - strtotime($timenow);
	$dd =  ceil($time_dif/(60*60*24));
	
	
	$str_target = date($end_date);
	$time_dif2 = strtotime($str_target) - strtotime($timenow);
	$dd2 =  ceil($time_dif2/(60*60*24));
	

	if($e_type==1){
		if($dd2<0){
			return 'END';
		}else{
	
		if($dd<=0){
				return 'NOW';
			}else{
				return 'D-'.$dd.'';
			}
		}
	
	}else{
		if($dd<=0){
			return 'NOW';
		}else{
			return "D-".$dd;
		}
	}
}


function getDay($start_date,$end_date,$e_type){
	$timenow = date("Y-m-d"); 
	$str_target = date($start_date);
	$time_dif = strtotime($str_target) - strtotime($timenow);
	$dd =  ceil($time_dif/(60*60*24));
	
	
	$str_target = date($end_date);
	$time_dif2 = strtotime($str_target) - strtotime($timenow);
	$dd2 =  ceil($time_dif2/(60*60*24));
	

	if($e_type==1){
		if($dd2<0){
			return '<span class="tag small light">END</span>';
		}else{
	
		if($dd<=0){
				return '<span class="tag small normal">NOW</span>';
			}else{
				return '<span class="tag small normal">D-'.$dd.'<span>';
			}
		}
	
	}else{
		if($dd<=0){
			return '<span class="tag small normal">NOW</span>';
		}else{
			return '<span class="tag small normal"></span>D-'.$dd.'</span>';
		}
	}
}

function getDay_number($start_date,$end_date,$e_type){
	$timenow = date("Y-m-d");
	$str_target = date($start_date);
	$time_dif = strtotime($str_target) - strtotime($timenow);
	$dd =  ceil($time_dif/(60*60*24));


	$str_target = date($end_date);
	$time_dif2 = strtotime($str_target) - strtotime($timenow);
	$dd2 =  ceil($time_dif2/(60*60*24));


	if($e_type==1){
		if($dd2<0){
			return 'END';
		}else{
			if($dd<=0){
				return 'NOW';
			}else{
				return 'D-'.$dd;
			}
		}

	}else{
		if($dd<=0){
			return 'NOW';
		}else{
			return 'D-'.$dd;
		}
	}
}

function getDay_number_order($order_date , $start_date,$end_date,$e_type){
	$timenow = $order_date;
	$str_target = date($start_date);
	$time_dif = strtotime($str_target) - strtotime($timenow);
	$dd =  ceil($time_dif/(60*60*24));


	$str_target = date($end_date);
	$time_dif2 = strtotime($str_target) - strtotime($timenow);
	$dd2 =  ceil($time_dif2/(60*60*24));


	if($e_type==1){
		if($dd2<0){
			return '0';
		}else{
			if($dd<=0){
				return '0';
			}else{
				return $dd;
			}
		}

	}else{
		if($dd<=0){
			return '0';
		}else{
			return $dd;
		}
	}
}


function getDayDark($start_date,$end_date,$e_type){
	$timenow = date("Y-m-d"); 
	$str_target = date($start_date);
	$time_dif = strtotime($str_target) - strtotime($timenow);
	$dd =  ceil($time_dif/(60*60*24));
	
	
	$str_target = date($end_date);
	$time_dif2 = strtotime($str_target) - strtotime($timenow);
	$dd2 =  ceil($time_dif2/(60*60*24));
	

	if($e_type==1){
		if($dd2<0){
			return '<span class="tag medium dark">END</span>';
		}else{
	
		if($dd<=0){
				return '<span class="tag medium dark">NOW</span>';
			}else{
				return '<span class="tag medium dark">D-'.$dd.'<span>';
			}
		}
	
	}else{
		if($dd<=0){
			return '<span class="tag medium dark">NOW</span>';
		}else{
			return '<span class="tag medium dark"></span>D-'.$dd.'</span>';
		}
	}
}


class session{
  public $db;

  public function __destruct(){
    session_write_close();
  }

  public function open($path,$name){
    global $_cfg;
    $this->db=db_con($_cfg[whatsup_dsn]);
    $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return true;
  }

  public function close(){
    return true;
  }


  public function read($session_id){
    $ps=$this->db->prepare("select session_value from whatsup_session where session_id=?");
    $ps->execute(array($session_id));
    return $ps->fetchColumn();
  }

  public function write($session_id,$session_value){
    try{
      $ps=$this->db->prepare("insert into whatsup_session (session_id,session_value,r_date) values (?,?,now())");
      $ps->execute(array($session_id,$session_value));
    }catch(PDOException $e){
      $ps=$this->db->prepare("update whatsup_session set session_value=?,r_date=now() where session_id=?");
      $ps->execute(array($session_value,$session_id));
    }
  }

  public function destroy($session_id){
    $ps=$this->db->prepare("delete from whatsup_session where session_id=?");
    $result=$ps->execute(array($session_id));
    return $result;
  }

  public function gc($maxlifetime){
    $ps=$this->db->prepare("delete from whatsup_session where r_date < ?");
    $result=$ps->execute(array(date("Y-m-d H:i:s",$_SERVER[REQUEST_TIME]-$maxlifetime)));
    return $result;
  }
}

//--------------------------------------------------------------------------------------------------
// 실행시간 체크
//--------------------------------------------------------------------------------------------------

/** 
 * microtime 반환
 */
function getmicrotime() {

	list($usec, $sec) = explode(' ', microtime());
	
	return (float)$usec.'.'.(float)$sec;
}

function null_hyphen($data){
  	if(empty($data)){
  		return '-';
	}else{
  		return $data;
	}
}

//--------------------------------------------------------------------------------------------------

/**
 * 배열의 내용을 <xmp>태그를 이용하여 출력
 *
 * @param array print_array						출력 배열
 */
function print_x($print_array) {

	echo('<xmp>');
	print_r($print_array);
	echo('</xmp>');

}

//--------------------------------------------------------------------------------------------------
// URL 이동 관련 함수
//--------------------------------------------------------------------------------------------------

/** 
 * 페이지 뒤로 이동
 *
 * @param string msg					값이 있는 경우 에러메시지 출력
 */
function page_back($msg) {
	
	$script = '';

	//메시지가 있는 경우 메시지 출력..
	if (empty($msg) === FALSE) {
		$script = 'window.alert("'.$msg.'");';
	}

	$script .= 'history.back(-1);';

	javascript($script);
	exit;

}

//--------------------------------------------------------------------------------------------------

/**
 * javascript 실행 함수
 *
 * @param string script					실행할 javascript 명령어
 */
function javascript($script) {
	
	echo('<meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
	echo('<script type="text/javascript">');
	echo($script);
	echo('</script>');

}

//--------------------------------------------------------------------------------------------------

/**
 * 페이지 이동 함수
 * 
 * @param string url					이동할 URL
 * @param string msg					값이 있는 경우 에러메시지 출력
 */
function page_move($url='', $msg = '') {

	$script = '';

	//메시지가 있는 경우 메시지 출력..
	if (empty($msg) === FALSE) {
		$script = 'window.alert("'.$msg.'");';
	}

	$script .= 'document.location.href="'.$url.'";';

	javascript($script);
	exit;

}

//--------------------------------------------------------------------------------------------------

/**
 * 페이지 닫는 함수
 * 
 * @param string msg					값이 있는 경우 에러메시지 출력
 */
function page_close($msg = '') {

	//메시지가 있는 경우 메시지 출력..
	if (empty($msg) === FALSE) {
		$script = 'window.alert("'.$msg.'");';
	}

	$script .= 'window.close();';

	javascript($script);
	exit;

}

//--------------------------------------------------------------------------------------------------

/**
 * 페이지 새로고침으로 이동 함수
 * 
 * @param string url					이동할 URL
 * @param string msg					값이 있는 경우 에러메시지 출력
 * @param string target					이동 target
 */
function page_replace($url='', $msg = '', $target = '') {

	$script = '';

	//메시지가 있는 경우 메시지 출력..
	if (empty($msg) === FALSE) {
		$script = 'window.alert("'.$msg.'");';
	}	

	if (empty($target) === FALSE) {
		$script = 'if ( window.'.$target.' ) { ';
		$script.= $target.'.document.location.replace("'.$url.'");';
		$script.= '} else { ';
		$script.= 'document.location.replace("'.$url.'");';
		$script.= '}';

	} else {
		$script .= 'document.location.replace("'.$url.'");';

	}

	javascript($script);
	exit;

}



/*
 * 경고창 띄우기
 * 
 * @param string msg					에러메시지 출력
 */

function alert($msg){

    $script = 'alert("'.$msg.'");';

    javascript($script);
    exit;

}

//--------------------------------------------------------------------------------------------------
// HTML Form 관련 함수
//--------------------------------------------------------------------------------------------------

/** 
 * checked
 * @param mix value												원본값
 * @param mix value												비교값 (배열)
 * @param string type											in => in_array, out => out_array 일경우 check
 * return string												선택여부
 */
function checked($ori, $value, $type = 'in') {
	$in_flag = FALSE;					//비교조건이 포함되는지여부 

	if (is_array($value) === TRUE) {

		if (in_array($ori, $value) === TRUE) {
			$in_flag = TRUE;
		}

		if($type == 'equal') {
			if ($ori == $value) {
				$in_flag = TRUE;
			}
		}

	} else { 

		if ($ori == $value) {
			$in_flag = TRUE;
		}

	}

	if ( ($type == 'in' && $in_flag == TRUE) || ($type == 'out' && $in_flag == FALSE) || ($type == 'equal' && $in_flag == TRUE) ) {
		echo 'checked="checked"';
	} 

}

//--------------------------------------------------------------------------------------------------

/** 
 * option 값 selected
 * @param mix value												원본값
 * @param mix value												비교값
 * @param string option											in => value에 값이 있는 경우 selected (기본값)
 *																out => value에 값이 없을경우 selected
 * return string												선택여부
 */
function selected($ori, $value, $option = 'in') {
	$selected_html = '';
	if (is_array($value) === FALSE) {
		$value = array($value);
	}

	$flag = $option == 'in' ? TRUE : FALSE;

	if (in_array($ori, $value) === $flag) {
		$selected_html = 'selected="selected"';
	}

	return $selected_html;
}

//--------------------------------------------------------------------------------------------------

/** 
 * disabled check
 * @param mix value											원본값
 * @param mix value											비교값
 * @param string option										in => value에 값이 있는 경우 disabled (기본값)
 *															out => value에 값이 없을경우 disabled
 * return string											선택여부
 */
function disabled($ori, $value, $option = 'in') {

	if (is_array($value) === FALSE) {
		$value = array($value);
	}

	$flag = $option == 'in' ? TRUE : FALSE;

	if (in_array($ori, $value) === $flag) {
		$disabled_html = 'disabled="disabled"';
	}

	return $disabled_html;

}

function get_page_html_for_admin($page, $total_rows, $list_max, $page_max = 10, $str = '') {
		
	@$url = load_class('/lib/url');
	if ($total_rows > 0) {
		//전체 페이지수를 구한다.
		$total_page = ceil($total_rows / $list_max);
	} else {
		$total_page = 0;
	}

	if ($total_page <= 0) {
		$total_page = 1;
	}

	if ($page <= 0) {
		$page = 1;
	}	

	//시작 페이지 번호를 구한다.
	$start_page = (floor(($page-1) / $page_max) * $page_max ) + 1;

	//종료 페이지 번호를 구한다.
	$end_page = $start_page + $page_max - 1;
	if ($end_page > $total_page) {
		$end_page = $total_page;
	}

	//이전 페이지 번호를 만든다.
	$before_page = $page - 1;
	if ($before_page < 1) {
		$before_page = 1;
	}

	//이전 page_max 의 번호를 구한다.
	$before_before_page = $page - $page_max;
	$before_before_page = (floor(($before_before_page-1) / $page_max) * $page_max ) + 1;
	if ($before_before_page < 1) {
		$before_before_page = 1;
	}

	//다음 페이지 번호를 만든다.
	$next_page = $page + 1;
	if ($next_page > $total_page) {
		$next_page = $total_page;
	}
	
	//다음 page_max 의 번호를 구한다.
	$next_next_page = $page + $page_max;
	$next_next_page = (floor(($next_next_page-1) / $page_max) * $page_max ) + 1;

	if ($next_next_page > $total_page) {
		$next_next_page = $total_page;
	}

	$page_array = array();

	//페이지 html 생성
	for($i=$start_page;$i<=$end_page;$i=$i+1) {
		// <li class="active"><a href="#" data-link="http://adm.yg-producer.com/applicant/list#">1</a></li>
		if ($page == $i) {
			$page_array[$i] = '<li class="paginate_button page-item active"><a href="#" class="page-link">'.$i.'</a></li>';
		} else {
			$page_array[$i] = '<li class="paginate_button page-item"><a href="'.$url->replace_url(array('page'=>$i)).$str.'" class="page-link">'.$i.'</a></li>';
		}
	}

	if (is_array($page_array) === TRUE && sizeof($page_array) > 0) {
		$page_html = implode('', $page_array).'';
	} else {
		$page_html = '';
	}

	$_page_html = '<ul class="pagination">';
	$_page_html.= '<li class="paginate_button page-item previous"><a href="'.$url->replace_url(array('page'=>1)).$str.'" class="page-link">처음</a></li>';
	$_page_html.= $page_html;
	$_page_html.= '<li  class="paginate_button page-item next"><a href="'.$url->replace_url(array('page'=>$total_page)).$str.'" class="page-link">끝</a></li>';
	$_page_html .= '</ul>';

	return $_page_html;

}

function get_page_homepage($page, $total_rows, $list_max, $page_max = 10, $str = '') {
		
	@$url = load_class('/lib/url');

	if ($total_rows > 0) {
		//전체 페이지수를 구한다.
		$total_page = ceil($total_rows / $list_max);
	} else {
		$total_page = 0;
	}

	if ($total_page <= 0) {
		$total_page = 1;
	}

	if ($page <= 0) {
		$page = 1;
	}	

	//시작 페이지 번호를 구한다.
	$start_page = (floor(($page-1) / $page_max) * $page_max ) + 1;

	//종료 페이지 번호를 구한다.
	$end_page = $start_page + $page_max - 1;
	if ($end_page > $total_page) {
		$end_page = $total_page;
	}

	//이전 페이지 번호를 만든다.
	$before_page = $page - 1;
	if ($before_page < 1) {
		$before_page = 1;
	}

	//이전 page_max 의 번호를 구한다.
	$before_before_page = $page - $page_max;
	$before_before_page = (floor(($before_before_page-1) / $page_max) * $page_max ) + 1;
	if ($before_before_page < 1) {
		$before_before_page = 1;
	}

	//다음 페이지 번호를 만든다.
	$next_page = $page + 1;
	if ($next_page > $total_page) {
		$next_page = $total_page;
	}
	
	//다음 page_max 의 번호를 구한다.
	$next_next_page = $page + $page_max;
	$next_next_page = (floor(($next_next_page-1) / $page_max) * $page_max ) + 1;

	if ($next_next_page > $total_page) {
		$next_next_page = $total_page;
	}

	$page_array = array();

	//페이지 html 생성
	for($i=$start_page;$i<=$end_page;$i=$i+1) {

		if ($page == $i) {
			$page_array[$i] = '<strong>'.$i.'</strong>';
		} else {
			$page_array[$i] = '<a href="'.$url->replace_url(array('page'=>$i)).$str.'">'.$i.'</a>';
		}
	}

	if (is_array($page_array) === TRUE && sizeof($page_array) > 0) {
		$page_html = implode('', $page_array).'';
	} else {
		$page_html = '1';
	}

	//$_page_html = '<div class="paginate_complex">';
	//$_page_html.= '<span class="first"><a href="'.$url->replace_url(array('page'=>1)).$str.'">&lt;&lt;</a></span>';
	$_page_html.= '<a  class="prev" href="'.$url->replace_url(array('page'=>$before_page)).$str.'"></a>';
	$_page_html.="<span class='page'>";
	$_page_html.= $page_html;
	$_page_html.= "</span>";
	$_page_html.= '<a class="next" href="'.$url->replace_url(array('page'=>$next_page)).$str.'"></a>';
	//$_page_html.= '<span class="end"><a href="'.$url->replace_url(array('page'=>$total_page)).$str.'">&gt;&gt;</a></span>';
	//$_page_html.= '</div>';

	return $_page_html;

}


//--------------------------------------------------------------------------------------------------

/** 
 * 입력받은 경로에 있는 class 파일을 instance 해서 반환
 *
 * @param class_path
 * @return object
 */
function load_class($class_path, $variables = array()) {
	
	static $loaded_class = array();

	$path = dirname($class_path);
	$class = basename($class_path);
	$class_name = $class.'_class';	

	$class_path = $_SERVER['DOCUMENT_ROOT'].'/'.$class_path;

	if (is_object($loaded_class[$class]) === FALSE) {

		if (is_file($class_path.'.class.php') === TRUE) {

			include_once $class_path.'.class.php';

			if (is_array($variables) === TRUE && sizeof($variables) > 0) {
				
				$loaded_class[$class] = new $class_name($variables);

			} else {

				$loaded_class[$class] = new $class_name();

			}

		} else {

			echo('Class Load Error');
			exit;

		}

	}

	return $loaded_class[$class];

}

//--------------------------------------------------------------------------------------------------
// Mail
//--------------------------------------------------------------------------------------------------

/**
 * 메일 발송
 *
 * @param string email							받는사람 email
 * @param string html							보낼 내용
 * @return bool									성공/실패
 */
function mail_send($title, $to_name, $to_email, $from_name, $from_email, $html) {

	//기본적으로 문자열을 UTF-8로 보냄
	$encode_title = "=?UTF-8?B?".base64_encode($title)."?=\n"; 
	$encode_to = "\"=?UTF-8?B?".base64_encode($to_name)."?=\" <".$to_email.">";
	$encode_from = "\"=?UTF-8?B?".base64_encode($from_name)."?=\" <".$from_email.">" ;
	$encode_header = "MIME-Version: 1.0\n"."Content-Type: text/html; charset=UTF-8; format=flowed\n"."To:".$encode_to."\n"."From:".$encode_from."\n"."Content-Transfer-Encoding: 8bit\n"; 

	$mail = mail('', $encode_title, $html, $encode_header);

	return $mail;

}

//--------------------------------------------------------------------------------------------------
// 문자열 관련 함수
//--------------------------------------------------------------------------------------------------

/**
 * 인코딩 함수
 *
 * @param string str							인코딩할 문자열
 * @return string								인코딩된 문자열
 */
function encode_string($str) {
	
	//$encode_str = urlencode(str_replace('+', '_', base64_encode($str)));
	$encode_str = urlencode($str);
	
	return $encode_str;
}

//--------------------------------------------------------------------------------------------------

/**
 * 디코딩 함수
 *
 * @param string str							디코딩할 문자열
 * @return string								디코딩된 문자열
 */
function decode_string($str) {

	//$decode_str = base64_decode(urldecode(str_replace('_', '+', $str)));
	$decode_str = urldecode($str);
	
	return $decode_str;
}

//--------------------------------------------------------------------------------------------------

/** 
 * DB의 문자열 정리
 *
 * @param string str					정리할 문자열
 * @return string						정리된 문자열
 */
function strip_string($str) {
	return htmlspecialchars(strip_tags(stripslashes($str)));
}

//--------------------------------------------------------------------------------------------------

/** 
 * 문자 자르기
 *
 * @param string string					자를 문자열
 * @param int length					길이
 * @param string tail					자른 후 붙일 꼬리
 * @return string
 */
function strcut($string, $length, $tail = '...') {

	//글자 길이와 꼬리 길이를 구한다.
	$string_length = strlen($string);
	$tail_length = strlen($tail);

	$new_string = '';						//잘린 글자가 저장될 변수

	if ($length >= $string_length) {		//글자길이가 자를 길이보다 작으면 그대로 반환함
		return $string;
	}

	$to_length = $length - $tail_length;

	for($i=0;$i<$to_length;$i=$i+1) {

		$char = substr($string, $i, 1);

		if (ord($char) > 127) {					//아스키 코드값이 넘어가는 경우 3byte 처리

			if ( ($i+2) >= $length ) break;		//제한길이보다 크게 잘리지 않도록 검사

			$char = substr($string, $i, 3);
			$i=$i+2;

		}

		$new_string .= $char;

	}

	return $new_string.$tail;
}

//--------------------------------------------------------------------------------------------------

/** 
 * 랜덤 문자열 생성 함수
 *
 * @param int length					생성할 문자열 길이
 * @return string						생성된 랜덤 문자열
 */
function create_random_string($length = 20, $key = '') {
	
	if (empty($key) === TRUE) {
		$key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	}

	$random_string = '';

	$key_length = strlen($key);

	for($i=0;$i<$length;$i=$i+1) {

		$rand_key = mt_rand(0, $key_length-1);

		$random_string .= substr($key, $rand_key, 1);
	}
	
	return $random_string;
}

//-------------------------------------------------------------------------------------------------

/**
 * Javascript 의 Escape 를 decoding
 *
 * @param string text
 * @return string
 */
function unescape($text) {
	
	return urldecode(preg_replace_callback('/%u([[:alnum:]]{4})/', create_function('$word', 'return iconv("UTF-16LE", "UHC", chr(hexdec(substr($word[1], 2, 2))).chr(hexdec(substr($word[1], 0, 2))));'),$text));

}

//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------

/**
 * 문자의 유니코드 반환
 *
 * @param string char											반환값 가져올 문자
 * @return int				
 */
 /*
function utfCharToNumber($char) {
	$i = 0;
	$number = '';
	while (isset($char{$i})) {
		$number.= ord($char{$i});
		++$i;
	}
	return $number;
}
*/
//--------------------------------------------------------------------------------------------------

/** 
 * array_replace
 * @param array array											기본이 되는 배열
 * @param array array2, ...										변경및 통합이 될 배열, 
 * @return array												변경 및 통합이 된 배열
 */
if (function_exists('array_replace') === FALSE) {

	function array_replace() {

		$arrays = func_num_args();

		$temp_array = array();
		
		for($i=0;$i<$arrays;$i=$i+1) {

			foreach(func_get_arg($i) as $key => $val) {

				$temp_array[$key] = $val;

			}

		}

		return $temp_array;

	}
}

function strcut_utf8($str, $len, $checkmb=true, $tail = '..') {
	
	preg_match_all('/[\xEA-\xED][\x80-\xFF]{2}|./', $str, $match);
	$m = $match[0];
	$slen = strlen($str);
	$tlen = strlen($tail);
	$mlen = count($m);

	if ($slen <= $len) return $str;
	if (!$checkmb && $mlen <= $len) return $str;
	
	$ret = array();
	$count = 0;

	for($i=0;$i<$len;$i=$i+1) {

		$count += ($checkmb && strlen($m[$i]) > 1) ? 2:1;
		if ($count +$tlen > $len) break;
		$ret[] = $m[$i];

	}

	return join('', $ret).$tail;
}

//-------------------------------------------------------------------------------------------------

/** 
 * Query 실행
 * @param string query											Prepare Statement Query
 * @param array bind_data										Query Bind Data
 * @param string error_msg										Error message
 * @return object												Query Result
 */
function pdo_query($db, $query, $bind_data = array(), $error_msg = '') {

	global $_CONFIG;

	try {

		$ps = $db->prepare($query);
		$ps->execute($bind_data);

	} catch (PDOException $e) {	
		
		echo $error_msg.'<br/>';
		echo $e.'<br/>';
		exit;

	}

	return $ps;

}


function is_empty_array($array) {

	if (is_array($array) === TRUE && count($array) > 0) {
		return FALSE;
	}

	return TRUE;

}


function removeXSS($val) {
 // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
 // this prevents some character re-spacing such as <java\0script>
 // note that you have to handle splits with \n, \r, and \t later since they *are*
 // allowed in some inputs
 $val = preg_replace('/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val);

 // straight replacements, the user should never need these since they're normal characters
 // this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&
 // #X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
 $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
 // ;? matches the ;, which is optional
  // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

 // &#x0040 @ search for the hex values
 $val = preg_replace('/(&#[x|X]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);
 // with a ;

 // &#00064 @ 0{0,7} matches '0' zero to seven times
 $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
 }

 // now the only remaining whitespace attacks are \t, \n, and \r
 $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style',
 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
 $ra = array_merge($ra1, $ra2);
   
   $found = true; // keep replacing as long as the previous round replaced something
 while ($found == true) {
 $val_before = $val;
 for ($i = 0; $i < sizeof($ra); $i++) {
 $pattern = '/';
 for ($j = 0; $j < strlen($ra[$i]); $j++) {
 if ($j > 0) {
  $pattern .= '(';
  $pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
  $pattern .= '|(&#0{0,8}([9][10][13]);?)?';
   $pattern .= ')?';
  }
   $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
   $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
   $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
   if ($val_before == $val) {
   // no replacements were made, so exit the loop
   $found = false;
 }
 }
}
return $val;
}

/***********************************
					파일 업로드 체크 함수
************************************/
if (!function_exists('file_check_fn')){
	function file_check_fn($files,$adminfilesize=0){
		global $_site;
		$upload_max_filesize =  ini_get('upload_max_filesize');
		$ext_deny = $_site['ext_deny'];
		$ext_allow = $_site['ext_allow'];
		$upload = array(); //배열선언
		$num = -1;


		for ($i=0; $i<count($files['name']); $i++) {

			$chk_name = $files['name'][$i];
			$mime = mime_check($files);
			$chk_ext = pathinfo($files['name'][$i], PATHINFO_EXTENSION);

			if(strlen($chk_name)>0){
				$num++;
				$filename = '';
				$upload[$num]['name'] = '';
				$upload[$num]['ext'] = '';
				$upload[$num]['tmp_name'] = '';
				$upload[$num]['filesize'] = '';
				$upload[$num]['image'] = array();
				$upload[$num]['result']   = '';
				$upload[$num]['result_msg']   = '';
				$upload[$num]['error']   = '';

				if(empty($chk_ext)==FALSE){
					$filename  = $files['name'][$i];
					$filename  = preg_replace('/(<|>|=)/', '', $filename);
					$upload[$num]['name'] = $filename;
					$upload[$num]['ext'] = pathinfo($filename, PATHINFO_EXTENSION);
					$upload[$num]['error'] = $files['error'][$i];
					$upload[$num]['tmp_name'] = $files['tmp_name'][$i];
					$upload[$num]['filesize'] = $files['size'][$i];
				}else{
					$filename  = $files['name'];
					$filename  = preg_replace('/(<|>|=)/', '', $filename);
					$upload[$num]['name'] = $filename;
					$upload[$num]['ext'] = pathinfo($filename, PATHINFO_EXTENSION);
					$upload[$num]['error'] = $files['error'];
					$upload[$num]['tmp_name'] = $files['tmp_name'];
					$upload[$num]['filesize'] = $files['size'];
				}

				// 서버에 설정된 값보다 큰파일을 업로드 한다면 확인
				if ($filename) {
					if ($upload[$num]['error'] == 1) {
						$upload[$num]['result_msg'] = $filename.' 파일의 용량이 '.$upload_max_filesize.') 보다 큰 파일입니다.';
						$upload[$num]['result'] = 'FALSE';
						continue;
					}
					else if ($upload[$num]['error'] != 0) {
						$upload[$num]['file_upload_msg'] = $filename.' 파일이 정상적으로 업로드 되지 않았습니다.';
						$upload[$num]['result'] = 'FALSE';
						continue;
					}
				}

				// 관리자가 직접 지정한 파일 사이즈 확인
				if(empty($adminfilesize)===FALSE){
					if ($upload[$num]['filesize'] > $adminfilesize) {
						$upload[$num]['result_msg'] = $filename.' 파일의 용량('.number_format($upload[$num]['filesize']).' 바이트)이 설정('.number_format($adminfilesize).' 바이트)된 값보다 큰 파일입니다.';
						$upload[$num]['result'] = 'FALSE';
						continue;
					}
				}

				// 이미지나 플래시 파일에 악성코드를 심어 업로드 하는 경우를 방지
				$timg = @getimagesize($upload[$num]['tmp_name']);
				// image type
				/*
				if ( preg_match("/\.(gif|jpg|jpeg|png|swf)$/i", $filename) ) {
					if ($timg['2'] < 1 || $timg['2'] > 16) {
						$upload[$num]['result_msg'] = $filename.' 파일이 악성코드가 의심되는 파일입니다.';
						$upload[$num]['result'] = 'FALSE';
						continue;
					}

				}
				*/

				$upload[$num]['image'] = $timg;

				// 확장자 검사
				if (in_array(strtolower($upload[$num]['ext']), $ext_deny)){
					$upload[$num]['result_msg'] = $filename.' 파일 확장자가 허용된 확장자 파일이 아닙니다.';
					$upload[$num]['result'] = 'FALSE';
					continue;
				}
				if (!in_array(strtolower($upload[$num]['ext']), $ext_allow)){
					$upload[$num]['result_msg'] = $filename.' 파일 확장자가 허용된 확장자 파일이 아닙니다.';
					$upload[$num]['result'] = 'FALSE';
					continue;
				}

				/*
				if(!$mime){
					$upload[$num]['file_upload_msg'] = $filename.' 잘못된 파일 형식입니다.';
					$upload[$num]['result'] = 'FALSE';
					continue;
				}
				*/

				$upload[$num]['result_msg'] = $filename.' 파일 이상 없음';
				$upload[$num]['result'] = 'TRUE';

			}
		}
		return $upload;
	}
}



function html_filter($content)
{
 // Strip bad elements.
 $content = preg_replace('/(<)(|\/)(\!|\?|html|head|title|meta|body|style|link|base|script'.
 '|frameset|frame|noframes|iframe|applet|embed|object|param|noscript|noembed|map|area|basefont|xmp|plaintext|comment)/i',
 '&lt;$2$3', $content);

 // Strip script handlers.
 $content = preg_replace_callback("/([^a-z])(o)(n)/i",
 create_function('$matches', 'if($matches[2]=="o") $matches[2] = "o";
 else $matches[2] = "O"; return $matches[1].$matches[2].$matches[3];'), $content);

 return $content;
}

if (!function_exists('mime_check')){
	function mime_check($file){
		$regexp = '/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/';
		if(empty($file['tmp_name'])) {
			return true;
		}
		if (function_exists('finfo_file'))
		{
			$finfo = @finfo_open(FILEINFO_MIME);
			if (is_resource($finfo)){
				$mime = @finfo_file($finfo, $file['tmp_name']);
				finfo_close($finfo);
				$mime_type='';
				if (is_string($mime) && preg_match($regexp, $mime, $matches)){
					$mime_type =  $matches[1];
					$img_mimes = array('image/gif',	'image/jpeg', 'image/png','image/jpg', 'image/jpe', 'image/pjpeg', 'image/gif');
					if(in_array($mime_type, $img_mimes, TRUE)){
						return true;
					}else{
						return false;
					}
				}
			}
		}
	}
}


function objectToArray($d) 
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}



if (function_exists('inDate') === FALSE) {
	function inDate($int=0){
		if(!is_numeric($int)){
			return "";
		}
		if($int<10){
			return "0".$int;
		}else{
			return $int;
		}
	}
}

//userseq, 스케줄seq, 총쿠폰갯수,총사용갯수, 총남은갯수 동작하기전 동작후 설명
function setlog($db,$useq,$scseq, $all,$use,$remain,$prev,$next,$content){
	$query = "insert into tbl_history 
					 set useq = ?,
						 scseq = ?,
						 allcp = ?,
						 usecp = ?,
						 remain = ?,
						 prev = ?,
						 next = ?,
						 content = ?,
						 regdate = now()";
	$ps = pdo_query($db,$query,array($useq,$scseq,$all,$use,$remain,$prev,$next,$content));
}





/**
 * ### 마스킹 규칙 ### 
 * 	이름을 마스킹 처리 ( 김 * 엽 )
 *	이름이 외자일 경우 ( 서 * )
 *	이름이 네글자 이상의 경우 첫글자와 
 *	마지막글자를 제외 하고 마스킹 처리 ( 이 * * 나)
 * 
 */
function masking_name($name,  $except = array(), $masking_char = '*') {
	$default_encoding = 'utf-8';
	$masked_name = '';

	# 예외 처리
	if($name == '' || $name == '익명'){
		return $name;
	}
	
	# 예외 처리 ARRAY
	if(is_array($except) == TRUE && count($except) > 0) {
		if( in_array($name, $except) ) {
			return $name;
		}
	}

	$length = mb_strlen( $name, $default_encoding );

	for($i = 0; $i < $length; $i++) {
		if($i == 0) {
			$masked_name .= mb_substr($name, 0, 1 , $default_encoding );
		}
		else if( $i < $length -1 && $length > 2) {
			$masked_name .= $masking_char;
		}
		else if( $i < $length  && $length == 2) {
			$masked_name .= $masking_char;
		}
		else{
			$masked_name .= mb_substr($name, $i, 1, $default_encoding );
		}
	}

	return $masked_name;
}

 function dateTextFormat($dateText, $formatType){
		$date = new DateTime($dateText); 
		switch($formatType)
		{
			case 0:
				return date_format($date, 'Y.m.d'); 
			break;
			case 1:
				return date_format($date, 'Y.m.d H:i'); 
			break;
			case 2:
				return date_format($date, 'YmdHi'); 
			break;	
			case 3:
				return date_format($date, 'Y-m-d'); 
			break;	
			default:
				return date_format($date, 'Y.m.d H:i'); 
		} 
	}

function zsDebug($id=''){ // 내부만 허용
	$aChkIp = array('59.10.37.107','14.52.79.55');
	if(in_array($_SERVER['REMOTE_ADDR'],$aChkIp) || $id='와삭바' || $id=='Alan'  || $id=='제옹' || $id=='리빈' || $id=='하리보' || $id=='후암동집사' || $id=='jiyoon' || $id=='alantree'  || $id=='jvck'  || $id=='carry'  ){ return true; }else{ return false; }
}

function zsDebug_dev($id=''){ // 내부만 허용
	$aChkIp = array('59.10.37.107','14.52.79.55');
	if(in_array($_SERVER['REMOTE_ADDR'],$aChkIp) || $id='와삭바' || $id=='Alan'  || $id=='제옹' || $id=='리빈' || $id=='하리보' || $id=='후암동집사' || $id=='jiyoon' || $id=='alantree'  || $id=='jvck'  || $id=='carry'  ){ return true; }else{ return false; }
}

function shop_ordernum_create($type=null){
	//20220708-93688602
	$_code = "";
	for( $i=0;$i<8; $i++ ){
		$_code .= rand(0,9);
	}

	$ordernum = date("Ymd")."-".$_code;

	### 이미 존재하는 주문번호인지 확인한다.
	$r = _MQ("select count(*) as cnt from TBL_ORDER where to_order_code='".$ordernum."'");
	if($r[cnt] > 0)
		shop_ordernum_create();

	return $ordernum;
}

function upload_file($filesname, $dir, $division = '')
{
	$file_check = $_FILES[$filesname]['name'];
	$save_path = $_SERVER['DOCUMENT_ROOT'].$dir;
	if (!empty($file_check)) {
		$tmp_file_check = file_check_fn($_FILES[$filesname]);
		for ($i = 0; $i < sizeof($tmp_file_check); $i++) {
			if ($tmp_file_check[$i]['result'] == 'FALSE') {
				$result['msg'] = $tmp_file_check[$i]['result_msg'];
				$result['code'] = false;
				return $result;
				exit;
			}
		}
	}

	if (empty($file_check) == FALSE) {
		list($_ori_filename, $ext) = explode('.', $_FILES[$filesname]['name']);
		$ext = pathinfo($_FILES[$filesname]['name'], PATHINFO_EXTENSION);
		$filename = 'thumbnail_' . date('YmdHis') . $division;
		$photo = $_FILES[$filesname]['tmp_name'];
		move_uploaded_file($photo, $save_path . '/' . $filename . "." . $ext);
		$location = $dir . "/" . $filename . "." . $ext;
		$data['org_file_name'] = $_FILES[$filesname]['name'];
		$data['location'] = $location;
		return $data;
	} else {
		return '';
	}
}


?>
