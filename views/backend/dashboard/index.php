 <?php require_once('../views/backend/header.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <main class="px-3">
    <h1>Chào Mừng Đến Với Admin TeamFive's Shop</h1>
    <p class="lead">
      Giúp TeamFive's Shop phát triển và chốt được nhiều đơn hàng ngay nào
    </p>
    <p class="lead">
      <!-- <a href="" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a> -->
    </p>
  </main>
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('../views/backend/footer.php');?>
  <script>
    $(document).ready( function () 
    {
    $('#myTable').DataTable();
    } );
  </script>