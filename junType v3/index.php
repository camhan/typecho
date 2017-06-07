<?php
/**
 * 第三款基于junType Base 构建的 情侣主题 :)
 * 
 * @package junType v3
 * @author jun
 * @version 3.0
 * @link http://junne.net/
 */
 
 $this->need('header.php');
 ?>
<div class="junC">
<div class="jLay">
<div class="jMain">
<div class="jWrap">
<div class="jName">
<ul class="clearfix">
<li class="jBFName"><b>Boy</b></li>
<li class="jGFName"><b>Girl</b></li>
</ul>
</div>
<?php
	$posts = $this->stack;
	$boys = $girls = array();
	foreach($posts as $value){
		$uID = $value['authorId'];	
		if($uID == '1')
		{
			$boys[] = $value;
		}
		else
		{
			$girls[] = $value;
		}
	}
?>
<div class="jBoy">
<?php 
if(empty($boys)) echo '<div class="noData">该用户没有文章了</div>';
else{
foreach($boys as $postBoy){
$title = $postBoy['title'];
$title_link = $postBoy['permalink'];
$date = $postBoy['year'].'-'.$postBoy['month'].'-'.$postBoy['day'];

$u_id = $postBoy['authorId'];
$db = Typecho_Db::get();
$prefix  = $db->getPrefix();
$select = $db->select('mail')->from($prefix.'users')
->where('uid = ?', $u_id);
$result = $db->fetchRow($select);
$img = md5($result['mail']);
$imgUrl = 'http://www.gravatar.com/avatar/' . $img  . '?s=48&r=G&d=X';

$cat = $postBoy['categories'][0]['name'];
$cat_link = $postBoy['categories'][0]['permalink'];

$cmt_num = $postBoy['commentsNum'].' comments';
$cmt_link = $title_link.'#comments';

$text = $postBoy['text'];
?>
<div class="jPost jBF">
<div class="jPTitle">
<div class="jPDate"><?php echo $date; ?></div>
<h2 class="jH2"><a href="<?php echo $title_link; ?>"><?php echo $title; ?></a></h2>
</div>
<div class="jPostInfo clearfix">
<ul>
<li class="jPAuthor"><img src="<?php echo $imgUrl; ?>" alt="" /></li>
<li class="jPCat"><b>In</b> <a href="<?php echo $cat_link; ?>"><?php echo $cat; ?></a></li>
<li class="jPComm"><b>Has</b> <a href="<?php echo $cmt_link; ?>"><?php echo $cmt_num; ?></a></li>
</ul>
</div>
<div class="jPostCont">
<?php echo $text; ?>
</div>
<div class="jPMore"><a href="<?php echo $title_link; ?>">Read More »</a></div>
</div>
<!--/.jPost-->
<?php } } ?>
</div>

<div class="jGirl">
<?php 
if(empty($girls)) echo '<div class="noData">该用户没有文章了</div>';
else{
foreach($girls as $i => $postGirl){
$title = $postGirl['title'];
$title_link = $postGirl['permalink'];
$date = $postGirl['year'].'-'.$postGirl['month'].'-'.$postGirl['day'];

$u_id = $postGirl['authorId'];
$db = Typecho_Db::get();
$prefix  = $db->getPrefix();
$select = $db->select('mail')->from($prefix.'users')
->where('uid = ?', $u_id);
$result = $db->fetchRow($select);
$img = md5($result['mail']);
$imgUrl = 'http://www.gravatar.com/avatar/' . $img  . '?s=48&r=G&d=X';

$cat = $postGirl['categories'][0]['name'];
$cat_link = $postGirl['categories'][0]['permalink'];

$cmt_num = $postGirl['commentsNum'].' comments';
$cmt_link = $title_link.'#comments';

$text = $postGirl['text'];
?>
<div class="jPost jGF">
<div class="jPTitle">
<div class="jPDate"><?php echo $date; ?></div>
<h2 class="jH2"><a href="<?php echo $title_link; ?>"><?php echo $title; ?></a></h2>
</div>
<div class="jPostInfo clearfix">
<ul>
<li class="jPAuthor"><img src="<?php echo $imgUrl; ?>" alt="" /></li>
<li class="jPCat"><a href="<?php echo $cat_link; ?>"><?php echo $cat; ?></a> <b>In</b></li>
<li class="jPComm"><a href="<?php echo $cmt_link; ?>"><?php echo $cmt_num; ?></a> <b>Has</b></li>
</ul>
</div>
<div class="jPostCont">
<?php echo $text; ?>
</div>
<div class="jPMore"><a href="<?php echo $title_link; ?>">Read More »</a></div>
</div>
<!--/.jPost-->
<?php } } ?>
</div>

</div>

<div class="jPages">
<ul class="clearfix">
<?php $this->pageNav(); ?>
</ul>
</div><!--/.jPages-->
</div><!--/.jMain-->
</div>
</div><!--/.junC-->
<?php 
$this->need('sidebar.php');
?>