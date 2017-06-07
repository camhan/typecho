<div class="junBot">
<div class="jSide clearfix">
<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
<div class="jBox">
<div class="jBoxH"><h3><?php _e('最新文章'); ?></h3></div>
<div class="jBoxC">
<ul class="junList">
<?php $this->widget('Widget_Contents_Post_Recent')
->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
</ul>
</div>
</div>
<?php endif; ?>
<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
<div class="jBox">
<div class="jBoxH"><h3><?php _e('最近回复'); ?></h3></div>
<div class="jBoxC">
<ul class="junList">
<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
<?php while($comments->next()): ?>
<li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
<?php endwhile; ?>
</ul>
</div>
</div>
<?php endif; ?>
<?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
<div class="jBox">
<div class="jBoxH"><h3><?php _e('分类'); ?></h3></div>
<div class="jBoxC">
<ul class="junList">
<?php $this->widget('Widget_Metas_Category_List')
->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
</ul>
</div>
</div>
<?php endif; ?>
<?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<div class="jBox">
<div class="jBoxH"><h3><?php _e('归档'); ?></h3></div>
<div class="jBoxC">
<ul class="junList">
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
</ul>
</div>
</div>
<?php endif; ?>
<?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
<div class="jBox">
<div class="jBoxH"><h3><?php _e('其它'); ?></h3></div>
<div class="jBoxC">
<ul class="junList">
<?php if($this->user->hasLogin()): ?>
<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
<?php else: ?>
<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
<?php endif; ?>
<li><a href="http://www.typecho.org">Typecho</a></li>
</ul>
</div>
</div>
<?php endif; ?>
</div><!--/.jSide-->
</div>
<div class="junF">
<div class="jCopy">
<p><a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a> <?php _e('is powered by'); ?> <a href="http://www.typecho.org">Typecho)))</a> and Theme From <a href="http://junne.net/">junType</a> {<a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章'); ?> RSS</a> and <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论'); ?> RSS</a>}</p>
</div>
</div><!--/.junF-->
</div><!--/.junP-->
</body>
</html>