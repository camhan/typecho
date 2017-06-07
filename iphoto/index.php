<?php
/**
 * iPhoto is evolved from one theme of Tumblr and turned it into photo theme which can be used at typecho.
 * 
 * @package iPhoto
 * @author MuFeng
 * @version 3.0.0
 * @link http://mufeng.me
 */
if(isset($_GET["action"]) && $_GET["action"] == "ajax_post"){
	while($this->next()): $args=post_thumbnail($this);?>
		<div id="post-<?php $this->cid(); ?>" class="post-home">
				<div class="post-thumbnail">
					<a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>"><span><?php $this->title(); ?></span><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php echo $args["img"];?>&amp;w=285&amp;zc=1" width="285" height=<?php echo $args["h"];?> alt="<?php echo $args["alt"];?>" /></a>
				</div>
				<div class="post-info">
					<div class="views"><?php Views_Plugin::theViews(); ?></div>
					<div class="comments"><span><?php $this->commentsNum('0', '1', '%d'); ?></span></div>
					<div class="likes"><span><?php Likes_Plugin::theLikes(); ?></span><span class="likes-count" data-cid="<?php $this->cid(); ?>"></span></div>
				</div>
		</div>
	<?php endwhile;
}else{
	if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
	$this->need('header.php');
?>
	<div id="container">
		<?php while($this->next()): $args=post_thumbnail($this);?>
		<div id="post-<?php $this->cid(); ?>" class="post-home">
				<div class="post-thumbnail">
					<a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>"><span><?php $this->title(); ?></span><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php echo $args["img"];?>&amp;w=285&amp;zc=1" width="285" height=<?php echo $args["h"];?> alt="<?php echo $args["alt"];?>" /></a>
				</div>
				<div class="post-info">
					<div class="views"><?php Views_Plugin::theViews(); ?></div>
					<div class="comments"><span><?php $this->commentsNum('0', '1', '%d'); ?></span></div>
					<div class="likes"><span><?php Likes_Plugin::theLikes(); ?></span><span class="likes-count" data-cid="<?php $this->cid(); ?>"></span></div>
				</div>
		</div>
		<?php endwhile; ?>
	</div>
	<div id="pagenavi">
		<?php $this->pageNav(); ?>
	</div>
<?php $this->need('footer.php'); ?>
<?php }?>