<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin TeamFive's Shop</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../public/index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link"  href="logout.php" role="button">
        <i class="fas fa-power-off"></i>
          Đăng Xuất
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
    <?php
    use App\Models\User;
    $user=User::find($_SESSION['userid']);
    ?>
      <img src="../public/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-max-10">TeamFive's Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../public/images/avatar/<?=$user['Img'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cat"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=product" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Tất Cả Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=product&cat=create" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Thêm Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=category" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Danh Mục Sản Phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cat"></i>
              <p>
                Bài Viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=post" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Tất Cả Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=post&cat=create" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Thêm Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=topic" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Chủ Đề Bài Viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=page" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Danh Sách Trang Đơn</p>
                </a>
              </li>
            </ul>
          </li>

            <li class="nav-item">
                <a href="index.php?option=order" class="nav-link">
                <i class="fas fa-cat"></i>
                  <p>Đơn Hàng</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="index.php?option=customer" class="nav-link">
                <i class="fas fa-cat"></i>
                  <p>Khách Hàng</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?option=contact" class="nav-link">
                <i class="fas fa-cat"></i>
                  <p>Liên Hệ</p>
                </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cat"></i>
              <p>
                Giao Diện
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=menu" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=slider" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-cat"></i>
              <p>
                Thành Viên
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?option=user" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Tất Cả Thành Viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?option=user&cat=create" class="nav-link">
                <i class="fas fa-crow"></i>
                  <p>Thêm Thành Viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a class="nav-link"  href="logout.php" role="button">
            <i class="fas fa-power-off"> Đăng Xuất</i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
