<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/manage/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/manage/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/manage/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width : 390px">
    <div class="login-logo">
        <a href="/manage/index2.html"><img src="/lua/img/logo_lua.png" style="width: 30%"></i></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
            </p>
            <form action="/manage/index3.html" method="post">
                <div class="input-group mb-3">
                    <input type="id" class="form-control" placeholder="아이디를 입력해 주세요." id="inputId" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="비밀번호를 입력해 주세요." id="inputPwd">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="button" class="btn btn-primary btn-block" id="btn_save">로그인</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="login-box-msg" style="font-size: 0.658rem; margin-top: 20px">COPYRIGHT 2023 lua KOREA ALL RIGHTS ARE RESERVED.<br>
               허가 없는 해당 사이트의 접근은 민,형사상 처벌을 받을 수 있습니다.</p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/manage/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/manage/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/manage/dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
    $('#btn_save').click(function(){
        go_login();
    });
    $('#inputPwd').keypress(function(e){
        if(e.keyCode==13){
            go_login();
        }
    })
    function go_login(){
        var chk = $('#validChk').val();
        var inputId = $.trim($('#inputId').val());
        var inputPwd = $.trim($('#inputPwd').val());
        var inputCaptcha = $.trim($('#inputCaptcha').val());
        if(inputId==""){
            alert("아이디를 입력해주세요");
            return;
        }
        if(inputPwd==""){
            alert("비밀번호를 입력해주세요");
            return;
        }

        $.ajax({
            url : "/manage/proc/proc_login",
            data : {
                id : inputId,
                pwd : inputPwd,
                captcha : inputCaptcha
            },
            dataType : "json",
            method : 'POST',
            success : function(result){
                alert(result.msg);
                if(result.code=='TRUE'){
                    location.href="/manage/view/main.php";
                }
            }
        })
    }


</script>