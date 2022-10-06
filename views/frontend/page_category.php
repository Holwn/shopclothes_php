<?php require_once('views/frontend/header.php') ?>
<?php
use App\Models\Post;
$post =Post::where([['Status','=','1'],['Type','=','page']])->orderBy('CreatedAt','asc')->get();
$slug=$_REQUEST['cat'];
$row_page=$post->Slug=$lug;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <?php require_once('views/frontend/mod_listcategory.php') ?>
            </div>
            <div class="col-md-9">
                <h1><?=$row_page->Title;?></h1>
                <p><?=$row_page->Detail;?></p>
            </div>
        </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php') ?>