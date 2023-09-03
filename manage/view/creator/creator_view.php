<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
include $_SERVER['DOCUMENT_ROOT'] . "/manage/include/header.php";

if (empty($seq)) {
    $view_title = "등록";
} else {
    $view_title = "수정";

    $query = "SELECT * FROM tbl_member where tm_seq = ? ";
    $ps = pdo_query($db, $query, array($seq));
    $data = $ps->fetch(PDO::FETCH_ASSOC);
}
unset($_REQUEST['seq']);
$subquery = http_build_query($_REQUEST);
?>
<link rel="stylesheet" href="/manage/plugins/summernote/summernote-bs4.min.css">
<script type="text/javascript" src="/manage/ckeditorfolder/ckeditor/ckeditor.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>크리에이터 정보</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <form id="view_form">
                    <input type="hidden" name="seq" value="<?= $seq ?>">
                    <div class="card-body">
                        <div class="row"></div>
                        <div class="col-lg-12" style="margin-bottom: 30px">
                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <dl>
                                    <dt>이름</dt>
                                    <dd><?=$data['tm_name']?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl>
                                    <dt>핸드폰번호</dt>
                                    <dd><?=$data['tm_phone']?></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <dl>
                                    <dt>이메일</dt>
                                    <dd><?=$data['tm_email']?></dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl>
                                    <dt>등급</dt>
                                    <select class="form-control select2" name="tm_grade"  style="width: 20%">
                                        <option <?if($data['tm_grade']=='0' || empty($data)){?>selected<?}?> value="0" >-</option>
                                        <option <?if($data['tm_grade']=='1'){?>selected<?}?> value="1">Trainee</option>
                                        <option <?if($data['tm_grade']=='2'){?>selected<?}?> value="2">Artist</option>
                                        <option <?if($data['tm_grade']=='3'){?>selected<?}?> value="3">Zenonian</option>
                                    </select>
                                </dl>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <dl>
                                <dt>후원코드</dt>
                                <dd><?=$data['tm_code']?></dd>
                            </dl>
                        </div>
                        <div class="row">
                            <?if($data['tm_status']=='Y'){?>
                            <div class="col-lg-6">
                                <dl>
                                    <dt>후원자 수</dt>
                                    <dd>0</dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl>
                                    <dt>보유 Z포인트</dt>
                                    <dd><?=$data['tm_point']?></dd>
                                </dl>
                            </div>
                            <?}?>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <dl>
                                    <dt>youtube</dt>
                                    <dd>https://www.youtube.com/channel/UCz0byPdTCm-xDaL3W5Ln-5L</dd>
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl>
                                    <dt>팔로워</dt>
                                    <input type="text" class="form-control" id="tm_follow_cnt" name="tm_follow_cnt" placeholder="팔로워 수 입력"  value="<?=$data['tm_follow_cnt']?>" style="width: 20%">
                                </dl>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <dl>
                                <dt>afreevs TV</dt>
                                <dd>fdaskfjasdkjfkasdjf</dd>
                            </dl>
                        </div>
                        <div class="input-group mb-3">
                            <dl>
                                <dt>기타 채널</dt>
                                <dd>트위치 : fdaskfjasdkjfkasdjf</dd>
                                <dd>instagram : fdaskfjasdkjfkasdjf</dd>
                            </dl>
                        </div>
                        <div class="input-group mb-3">
                            <dl>
                                <dt>채널명</dt>
                                <dd><?=$data['tm_channel_title']?></dd>
                            </dl>
                        </div>
                        <div class="input-group mb-3">
                            <dl>
                                <dt>채널소개</dt>
                                <dd><?=$data['tm_channel_info']?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="card-footer" style="text-align: center">
                        <button type="button" class="btn btn-primary" id="btn_save"><?= $view_title ?>하기</button>
                        <button type="button" class="btn btn-default"
                                onclick="history.back();">목록으로
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<? include $_SERVER['DOCUMENT_ROOT'] . "/manage/include/footer.php" ?>
<script src="/manage/plugins/summernote/summernote-bs4.min.js"></script>

<script>


    $('#btn_save').click(function () {
        var form = $('#view_form')[0];
        var data = new FormData(form);
        $.ajax({
            url: '/manage/proc/proc_creator.php',
            data: data,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            async: false,
            success: function (result) {
                alert(result.msg);
                if (result.code) {
                    location.reload();
                }
            }
        })

    })
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Date and time picker
        $('#te_regdate').datetimepicker({
            icons: {time: 'far fa-clock'},
            format: 'YYYY-MM-DD H:mm:ss'
        });

        $('#te_sdate').datetimepicker({
            icons: {time: 'far fa-clock'},
            format: 'YYYY-MM-DD H:mm:ss'
        });

        $('#te_edate').datetimepicker({
            icons: {time: 'far fa-clock'},
            format: 'YYYY-MM-DD H:mm:ss'
        });


        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
</script>
<script>
    $(function () {
        $('#summernote').summernote()
    })
</script>