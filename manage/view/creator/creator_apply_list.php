<?
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/common.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/manage/include/auth_check.php';
include $_SERVER['DOCUMENT_ROOT']."/manage/include/header.php";
$data_array = array();
if(empty($page)){
    $page=1;
}

if(empty($rows)){
    $rows=10;
}

$where_query = " where 1 = 1 and tm_status ='A' ";

$query ="select count(*) as cnt from tbl_member 
         {$where_query}";
$ps = pdo_query($db, $query, $data_array);
$data = $ps->fetch(PDO::FETCH_ASSOC);
$total_rows = $data['cnt'];
if ($total_rows > 0) {
    $total_page = ceil($total_rows / $rows);
} else {
    $total_page = 1;
}
$from = ($page - 1) * $rows;
$numbering = $total_rows - $from;
$limit_query = " limit {$from} , {$rows}";

$query ="select * from tbl_member 
        {$where_query}
        order by tm_regdate desc
        {$limit_query}";

$ps = pdo_query($db, $query, $data_array);
$list = array();
while($data = $ps->fetch(PDO::FETCH_ASSOC)){
    array_push($list, $data);
}

$subquery = http_build_query($_REQUEST);
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>크리에이터 신청</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_info" id="example1_info" role="status"
                                                 aria-live="polite">검색 결과 : <?=$total_rows?>건
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <form action="<?= $_SERVER['PHP_SELF']?>" id="search_form">
                                                    <input type="hidden" name="rows" id="rows" value="<?=$rows?>">
                                                    <input type="hidden" name="page" id="page" value="1">
                                                <button type="button" class="btn btn-success form-control-sm btn_status_update" data-type="Y" style="vertical-align:baseline;padding: 0.2rem 0.2rem;font-size: 0.8rem;">
                                                    승인하기</i>
                                                </button>
                                                <button type="button" class="btn btn-danger form-control-sm btn_status_update" data-type="N" style="vertical-align:baseline;padding: 0.2rem 0.2rem;font-size: 0.8rem;">
                                                    거부하기</i>
                                                </button>
<!--                                                <label>-->
<!--                                                <select class="form-control form-control-sm">-->
<!--                                                    <option>전체보기</option>-->
<!--                                                    <option>팔로워순</option>-->
<!--                                                    <option>최신순</option>-->
<!--                                                    <option>option 4</option>-->
<!--                                                    <option>option 5</option>-->
<!--                                                </select>-->
<!--                                                </label>-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                   class="table table-bordered table-striped dataTable dtr-inline"
                                                   aria-describedby="example1_info">
                                                <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc text-center" style="width: 3%">
                                                        <input type="checkbox" id="all-chk" style="width:18px;height:18px;"/>
                                                    </th>
                                                    <th class="sorting sorting_asc  text-center" style="width: 10%">
                                                        NO
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        등록일
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 10%">
                                                        이름
                                                    </th>
                                                    <th class="sorting sorting_asc text-center">
                                                        이메일
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        핸드폰번호
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        팔로워
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        비고
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?if(sizeof($list) > 0 ){?>
                                                    <?foreach($list as $key =>$val){?>
                                                        <tr class="odd">
                                                            <td class="text-center">
                                                                <input type="checkbox" class="class-chk" data-seq='<?=$val['tm_seq']?>' style="width:18px;height:18px;" />
                                                            </td>
                                                            <td class="text-center"><?=$numbering--?></td>
                                                            <td class="text-center"><?=$val['tm_regdate']?></td>
                                                            <td class="text-center"><?=$val['tm_name']?></td>
                                                            <td class="text-center"><?=$val['tm_email']?></td>
                                                            <td class="text-center"><?=$val['tm_phone']?></td>
                                                            <td class="text-center">
                                                                <?if($val['tm_follow_cnt']==0){?>
                                                                    입력필요
                                                                <?}else{?>
                                                                    <?=$val['tm_follow_cnt']?>
                                                                <?}?>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-warning" onclick="location.href='creator_view.php?seq=<?=$val['tm_seq']?>&<?=$subquery?>'" >더보기</button>
                                                            </td>
                                                        </tr>
                                                    <?}?>
                                                <?}else{?>
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 text-center" colspan="8">검색된 내용이 없습니다.</td>
                                                    </tr>
                                                <?}?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                                <?=get_page_html_for_admin($page, $total_rows, $rows,10)?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
    <!-- ./wrapper -->
<?include $_SERVER['DOCUMENT_ROOT']."/manage/include/footer.php"?>
<script>


    $('#all-chk').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.class-chk').prop('checked',false);
            $('.class-chk').attr('checked',false);
        }else{
            $(this).addClass('active');
            $('.class-chk').prop('checked',true);
            $('.class-chk').attr('checked',true);
        }
    });
    $('.class-chk').click(function(){
        if($(this).is(':checked')){
            $(this).prop('checked',true);
            $(this).attr('checked',true);

        }else{
            $(this).prop('checked',false);
            $(this).attr('checked',false);
        }
    })


    $('.btn_status_update').click(function(){
        var status = $(this).data('type');
        var type_title = '';
        if(status=='Y'){
            type_title = '승인';
        }else{
            type_title = '거절';
        }

        var seq_array = [];
        $('.class-chk:checked').each(function(){
            seq_array.push($(this).data('seq'));
        });
        if(seq_array.length<1){
            return alert('최소 하나의 게시물을 선택해주세요.');

        }
        console.log(seq_array);
        if(confirm('해당 크리에이터들을 '+type_title+'처리 하시겠습니까?')){
            $.ajax({
                url : '/manage/proc/proc_creator_apply',
                data : {
                    status : status,
                    seq_array : seq_array,
                },
                type : 'post',
                dataType : 'json',
                success : function(data){
                    alert(data.msg);
                    if(data.code){
                        $('#search_form').submit();
                    }
                }
            })
        }
    });

</script>
