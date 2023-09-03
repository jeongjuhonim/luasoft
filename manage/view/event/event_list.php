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

$where_query = " where 1 = 1 ";

if(!empty($sch_title)){
    $where_query .= " and te_title like ? ";
    $data_array[] = "%$sch_title%";
}


$query ="select count(*) as cnt from tbl_event 
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

$query ="select * from tbl_event 
        {$where_query}
        order by te_regdate desc
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
                        <h1>이벤트 관리</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button type="button" class="btn page-link" onclick="location.href='/manage/view/event/event_view.php'">+ 이벤트 등록</button>
                        </ol>
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
                                                    <label>
                                                        <input
                                                                type="search" class="form-control form-control-sm"
                                                                placeholder="검색어를 입력해주세요." aria-controls="example1" name="sch_title" value="<?=$sch_title?>">
                                                    </label>
                                                    <button type="submit" class="btn btn-default form-control-sm" style="vertical-align:baseline;padding: 0.2rem 0.2rem;font-size: 0.8rem;">
                                                        검색하기 <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
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
                                                        NO
                                                    </th>
                                                    <th class="sorting sorting_asc  text-center" style="width: 10%">
                                                        노출/비노출
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        등록일
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 10%">
                                                        상단고정
                                                    </th>
                                                    <th class="sorting sorting_asc text-center">
                                                        제목
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        썸네일
                                                    </th>
                                                    <th class="sorting sorting_asc text-center" style="width: 15%">
                                                        관리
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?if(sizeof($list) > 0 ){?>
                                                <?foreach($list as $key =>$val){?>
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1  text-center" tabindex="0"><?=$numbering--?></td>
                                                    <td class="text-center"><?=$val['te_status']=='Y'?'노출':'비노출';?></td>
                                                    <td class="text-center"><?=$val['te_regdate']?></td>
                                                    <td class="text-center"><?=$val['te_fix']=='Y'?'고정':'-';?></td>
                                                    <td><a href="event_view.php?seq=<?=$val['te_seq']?>&<?=$subquery?>"><?=$val['te_title']?></a></td>
                                                    <td class="text-center">썸네일</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-warning" onclick="location.href='event_view.php?seq=<?=$val['te_seq']?>&<?=$subquery?>'" >수정</button>
                                                        <button type="button" class="btn btn-danger" id="btn_delete">삭제</button>
                                                    </td>
                                                </tr>
                                                <?}?>
                                                <?}else{?>
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1 text-center" colspan="7">검색된 내용이 없습니다.</td>
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