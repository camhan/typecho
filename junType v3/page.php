<?php
 $this->need('header.php');
?>
<div class="junC">
<div class="jLay">
<div class="jMain">
<div class="jWrap">
<div class="jPost">
<h2 class="jH2"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
<div class="jPostCont">
<?php $this->content(); ?>
</div>
</div><!--/.jPost-->
<?php $this->need('comments.php'); ?>
</div>
</div><!--/.jMain-->
</div>
</div><!--/.junC-->
<?php $this->need('sidebar.php'); ?>
