<?php $this->need('header.php'); ?>
<div id="single-content">
	<div id="post-home">
		<div id="post-<?php $this->cid(); ?>" class="post">
			<div id="post-header">
				<?php $this->author->gravatar('48') ?>
				<h1 id="post-title"><?php $this->title(); ?></h1>
				<div id="post-msg"><div id="post-msg2"><span><?php Views_Plugin::theViews(); ?>&#160;Views</span><span><?php $this->commentsNum('0', '1', '%d'); ?>&#160;Comments</span><span><?php Likes_Plugin::theLikes(); ?>&#160;Likes</span></div>by <?php $this->author() ?>&#160;&#124;&#160;<?php $this->date('M d, Y'); ?>&#160;&#124;&#160;in <?php $this->category(','); ?></div>
				<div class="clear"></div>
			</div>
			<div class="post-content"><?php $this->content(); ?></div>
			<div class="post-tags">±Í«©:<?php $this->tags(', ', true, 'none'); ?></div>
		</div>
		<?php $this->need('comments.php'); ?>
	</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>