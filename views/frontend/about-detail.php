<?php
use App\Models\Post;
$id =$_REQUEST['id'];
$post=Post::find($id);
?>
<?php require_once('views/frontend/header.php') ?>
<div class="container">
    <h2><?php echo $post->Title?></h2>
    <img style="width:500px;height:350px" src="public/images/post/<?php echo $post->Img?>" alt="">
    <p>
    <?php echo $post->Detail?>
    </p>
</div>
<?php require_once('views/frontend/footer.php') ?>