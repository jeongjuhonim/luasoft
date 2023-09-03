<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>크리에이터 플랫폼</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/manage/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/manage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/manage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/manage/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/manage/@resource/css/reset_css.css">
    <link rel="stylesheet" href="/manage//plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/manage//plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/manage//plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/manage//plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/manage//plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/manage//plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/manage//plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/manage//plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="/manage//plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="/manage//plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="/manage/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <?=$_SESSION['admin_info']['tmm_name']?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                   |
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="/manage/proc/proc_logout.php" >
                    logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/manage/view/main.php" class="brand-link">
            <img src="/manage/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Creator</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item">
                        <a href="/manage/view/creator/creator_apply_list.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>크리에이터 신청</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/view/creator/creator_list.php" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>크리에이터 정보</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/view/main.php" class="nav-link">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>쿠폰 관리</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/view/main.php" class="nav-link">
                            <i class="nav-icon fas fa-money-check"></i>
                            <p>정산 관리</p>
                        </a>
                    </li>
                    <li class="nav-header">공지 관리</li>
                    <li class="nav-item">
                        <a href="/manage/view/notice/notice_list.php" class="nav-link">
                            <i class="nav-icon fas fa-volume-off"></i>
                            <p>공지사항 관리</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/view/event/event_list.php" class="nav-link">
                            <i class="nav-icon fas fa-volume-off"></i>
                            <p>이벤트 관리</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/manage/view/faq/faq_list.php" class="nav-link">
                            <i class="nav-icon fas fa-volume-off"></i>
                            <p>FAQ 관리</p>
                        </a>
                    </li>
                    <li class="nav-header">프렌Z 이벤트 관리</li>
                    <li class="nav-item">
                        <a href="/manage/view/event/event_list.php" class="nav-link">
                            <i class="nav-icon fas fa-volume-off"></i>
                            <p>1기 이벤트</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <style>
       .table-striped tbody tr:nth-of-type(odd){
            background-color: white;
       }
    </style>