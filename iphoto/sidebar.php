    <div id="sidebar">
		<div id="sidebar-inner">
		<div class="widget related">
			<h2>相关文章</h2>
			<?php $this->related(9)->to($relatedPosts); ?>
			<ul>
				<?php while ($relatedPosts->next()): 
					preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$relatedPosts->text, $matches); 
					$cnt = count($matches);
				?>
				<li>
				<?php if ( $cnt > 0 ) {  ?>
					<a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php echo $matches[1];?>&amp;w=60&amp;h=60&amp;zc=1" alt="<?php $relatedPosts->title(); ?>" /></a>
				<?php } else {  ?>
					<a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php $this->options->themeUrl('images/default.jpg'); ?>&amp;w=60&amp;h=60&amp;zc=1" alt="<?php $relatedPosts->title(); ?>" /></a>
				<?php } ?>
				</li>
				<?php endwhile; ?>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="widget">
			<h2>最新文章</h2>
			<ul>
				<?php $this->widget('Widget_Contents_Post_Recent')->to($post); ?>
				<?php while($post->next()): 
					preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->text, $matches2); 
					$cnt2 = count($matches2);
				?>
				<?php if ($this->cid != $post->cid) {  ?>
					<li>
					<?php if ( $cnt2 > 0 ) {  ?>
						<a href="<?php $post->permalink(); ?>" title="<?php $post->title(); ?>"><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php echo $matches2[1];?>&amp;w=60&amp;h=60&amp;zc=1" alt="<?php $post->title(); ?>" /></a>
					<?php } else {  ?>
						<a href="<?php $post->permalink(); ?>" title="<?php $post->title(); ?>"><img src="<?php $this->options->themeUrl('timthumb.php'); ?>?src=<?php $this->options->themeUrl('images/default.jpg'); ?>&amp;w=60&amp;h=60&amp;zc=1" alt="<?php $post->title(); ?>" /></a>
					<?php } ?>
					</li>
				<?php } ?>
				<?php endwhile; ?>
				<div class="clear"></div>
			</ul>
		</div>
		</div>
    </div>