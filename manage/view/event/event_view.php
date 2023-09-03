<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
include $_SERVER['DOCUMENT_ROOT']."/manage/include/header.php";

if(empty($seq)){
    $view_title="등록";
}else{
    $view_title="수정";

    $query="SELECT * FROM tbl_event where te_seq = ? ";
    $ps = pdo_query($db, $query, array($seq));
    $data = $ps->fetch(PDO::FETCH_ASSOC);
}
unset($_REQUEST['seq']);
$subquery = http_build_query($_REQUEST);
?>
<link rel="stylesheet" href="/manage/plugins/summernote/summernote-bs4.min.css">
<script type="text/javascript" src="/manage/ckeditorfolder/ckeditor/ckeditor.js"> </script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>이벤트 <?=$view_title?></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <form id="view_form">
                        <input type="hidden" name="seq" value="<?=$seq?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>등록일 <span style="font-size: 0.9rem; color: red">(시/분/초는 노출 되지 않으며 게시글에 정렬에 쓰입니다.)</span></label>
                                        <div class="input-group date" id="te_regdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="te_regdate" data-target="#te_regdate" value="<?=$data['te_regdate']?>"/>
                                            <div class="input-group-append" data-target="#te_regdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>노출 여부</label>
                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <input type="checkbox" name="te_status" <?if($data['te_status']=='Y'){?>checked<?}?> data-bootstrap-switch>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">제목</label>
                                        <input type="text" class="form-control" id="te_title" name="te_title" placeholder="제목을 입력해주세요."  value="<?=$data['te_title']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>썸네일</label>
                                        <input type="file" class="form-control" name="te_thumbnail" id="exampleInputEmail1" >
                                        <?if(!empty($data['te_thumbnail'])){?>
                                            <br>
<!--                                            <img src="--><?//=$data['te_thumbnail']?><!--" alt="..." width="150" height="100">-->
                                        <?}?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>카테고리</label>
                                        <select class="form-control select2" style="width: 100%;" name="te_cate">
                                            <option <?if($data['te_cate']=='-' || empty($data)){?>selected<?}?> value="-" >-</option>
                                            <option <?if($data['te_cate']=='HOT'){?>selected<?}?> value="HOT">HOT</option>
                                            <option <?if($data['te_cate']=='NEW'){?>selected<?}?> value="NEW">NEW</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>고정 여부</label>
                                        <div class="card card-secondary">
                                            <div class="card-body">
                                                <input type="checkbox" name="te_fix" <?if($data['te_fix']=='Y'){?>checked<?}?> data-bootstrap-switch>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>이벤트 기간</label>
                                        <div class="flex-wrap" style="display: flex;  align-items: center;">
                                            <div class="input-group date" id="te_sdate" data-target-input="nearest" style="width: 48%;">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default">시작일</button>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input" name="te_sdate" data-target="#te_sdate"  value="<?=$data['te_sdate']?>"/>
                                                <div class="input-group-append" data-target="#te_sdate" data-toggle="datetimepicker" >
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            <span style="display: inline-flex;align-items: center; justify-content: center; width: 4%">~</span>
                                            <div class="input-group date" id="te_edate" data-target-input="nearest" style="width: 48%;">
                                                <div class="input-group-prepend" >
                                                    <button type="button" class="btn btn-default">종료일</button>
                                                </div>
                                                <input type="text" class="form-control datetimepicker-input" name="te_edate" data-target="#te_edate" value="<?=$data['te_edate']?>"/>
                                                <div class="input-group-append" data-target="#te_edate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>내용</label>
                                    <div class="card card-outline card-info" style="border-top : 0px">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea name="te_content" id="te_content" class="form-control" style="height:500px;" ><?=$data['te_content']?></textarea>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center">
                            <button type="button" class="btn btn-primary" id="btn_save"><?=$view_title?>하기</button>
                            <button type="button" class="btn btn-default" onclick="location.href='event_list.php?<?=$subquery?>'">목록으로</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?include $_SERVER['DOCUMENT_ROOT']."/manage/include/footer.php"?>
<script src="/manage/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    CKEDITOR.replace('te_content', {height: 500, allowedContent :true});
</script>
<script>


    $('#btn_save').click(function(){
        var form = $('#view_form')[0];
        var data = new FormData(form);
        var te_content = CKEDITOR.instances['te_content'].getData();
        data.append('te_content', te_content);
        $.ajax({
            url : '/manage/proc/proc_event.php',
            data : data,
            type : 'post',
            dataType : 'json',
            contentType: false,
            processData: false,
            async: false,
            success : function (result){
                alert(result.msg);
                if(result.code){
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
            icons: { time: 'far fa-clock' } ,
            format: 'YYYY-MM-DD H:mm:ss'
        });

        $('#te_sdate').datetimepicker({
            icons: { time: 'far fa-clock' } ,
            format: 'YYYY-MM-DD H:mm:ss'
        });

        $('#te_edate').datetimepicker({
            icons: { time: 'far fa-clock' } ,
            format: 'YYYY-MM-DD H:mm:ss'
        });


        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
</script>
<script>
    $(function () {
        $('#summernote').summernote()
    })
</script>