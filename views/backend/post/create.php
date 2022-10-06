<?php 
use App\Models\Topic;
use App\Models\Post;

$list_top=Topic::where('Status','!=','0')->get();
  $strtopid="";
  foreach ($list_top as $item)
  {
    $strtopid.="<option value='".$item['Id']."'>".$item["Name"]."</option>";
  }
$list=Post::where('Status','!=','0')->get();
  $strtypeid="";
  foreach ($list as $item)
  {
    $strtypeid.=$item['Type'].",";
  }

?>
<?php require_once('../views/backend/header.php');?>
<form action="index.php?option=post&cat=process" name="form1" method="POST" enctype="multipart/form-data">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper py-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase text-danger">THÊM MỚI BÀI VIẾT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Thêm Bài Viết</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row mb-2">
            <div class="col-md-12 text-right">
                <button type="submit" name="THEM" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Thêm]
                </button>
              <a href="index.php?option=post" class="btn btn-sm btn-info">
                      <i class="fas fa-undo"></i>Quay về danh sách bài viết
              </a>
      
            </div>
          </div>
        </div>
        <div class="card-body">
        <?php require_once('../views/backend/message_alert.php'); ?>
          <div class="row">
              <div class="col-md-9">
                  <div class="mb-3">
                      <label for="name">Tên bài viết</label>
                      <input name="data[Title]" type="text" id="name" placeholder="Nhập tên bài viết" class="form-control">
                  </div>
                  <div class="mb-1">
                      <label for="metakey">Nội Dung bài viết</label>
                      <textarea name="data[Detail]" id="metakey" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="mb-1">
                      <label for="metakey">Từ khóa</label>
                      <textarea name="data[Metakey]" id="metakey" rows="1" class="form-control"></textarea>
                  </div>
                  <div class="mb-1">
                      <label for="metadesc">Mô tả</label>
                      <textarea name="data[MetaDesc]" id="metadesc" rows="1" class="form-control"></textarea>
                  </div>
              </div>
              <div class="col-md-3">
                <div class="mb-3">
                    <label for="topid">Chủ Đề bài viết</label>
                    <select id="topid" name="topid" class="form-control">
                        <option value="0">None</option>
                        <?=$strtopid; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type">Loại bài viết</label>
                    <input name="data[Type]" type="text" id="name" placeholder="<?=$strtypeid?>" class="form-control">
                </div>
                <div class="mb-3"> 
                    <label for="img">Hình</label> 
                    <input type="file" class="form-control" id="img" name="img">
                  </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select id="status" name="status" class="form-control">
                        <option value="1">Xuất bản</option>
                        <option value="2">Chưa xuất bản</option>
                     
                    </select>
                </div>
              </div>
          </div>
          </div>
        </div>
        <div class="card-footer">
        <div class="col-12 text-right">
            <button type="submit" name="THEM" class="btn btn-sm btn-success">
                <i class="fas fa-save"></i>Lưu[Thêm]
            </button>
            <a href="index.php?option=post" class="btn btn-sm btn-info">
              <i class="fas fa-undo"></i>Quay lại
            </a>
        </div>
      </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
<?php require_once('../views/backend/footer.php');?>
