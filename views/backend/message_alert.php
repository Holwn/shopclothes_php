<?php
use App\libraries\MyClass;
?>
<?php if(MyClass::exists_flash('message')) :?>
<?php $arr_message = MyClass::get_flash('message')?>
<div class="alert alert-<?=$arr_message['type'] ?>" role="alert">
<?php echo $arr_message['msg'] ?>
</div>
<?php endif;?>