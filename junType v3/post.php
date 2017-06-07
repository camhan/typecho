<?php
 $this->need('header.php');
 ?>

<div class="junC">
<div class="jLay">
<div class="jMain">
<div class="jWrap">

<div class="jPost <?php if($this->authorId == '1'){echo 'jBF';}else{echo 'jGF';}?>">
<div class="jPTitle">
<div class="jPDate"><?php $this->date('Y-m-d'); ?></div>
<h2 class="jH2"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
</div>
<div class="jPostInfo clearfix">
<ul>
<?php 
	$uID = $this->authorId; 
	$db = Typecho_Db::get();
	$prefix  = $db->getPrefix();
	$select = $db->select('mail')->from($prefix.'users')
->where('uid = ?', $uID);
	$result = $db->fetchRow($select);
	$img = md5($result['mail']);
	$imgUrl = 'http://www.gravatar.com/avatar/' . $img  . '?s=46&r=G&d=X';
?>
<li class="jPAuthor"><img width="48" height="48" src="<?php _e($imgUrl); ?>" /></li>
<li class="jPCat"><?php _e('<b>In</b> '); ?><?php $this->category(','); ?></li>
<li class="jPComm"><b>Has</b> <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('No Comments', '1 Comment', '%d Comments'); ?></a></li>
<li class="jPTags"><?php _e('<b>Tags</b> '); ?> <?php $this->tags(', ', true, 'none'); ?></li>
</ul>
</div>
<div class="jPostCont">
<?php $this->content(); ?>
</div>
</div><!--/.jPost-->
<div class="jPost <?php if($this->authorId == '1'){echo 'jBF';}else{echo 'jGF';}?>">
<?php $this->need('comments.php'); ?>
</div>
</div>
</div><!--/.jMain-->
</div>
</div><!--/.junC-->
<?php $this->need('sidebar.php'); ?>
