<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<?php if($this->is('index')): ?><title><?php $this->options->title(); ?>&#160;&#124;&#160;<?php $this->options->description(); ?></title>
<?php else: ?><title><?php $this->archiveTitle('', '', ''); ?>&#160;&#124;&#160;<?php $this->options->title(); ?></title><?php endif; ?>
<link rel="shortcut icon" href="<?php $this->options->siteUrl('favicon.ico'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.4.2/jquery.min.js"></script>
<?php if($this->is('index') || $this->is('archive')) { ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.waterfall.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/index.js'); ?>"></script>
<?php } elseif($this->is('post')) { ?>
<!--[if IE 6]><script src="<?php $this->options->themeUrl('js/jQuery.autoIMG.min.js'); ?>"></script><![endif]-->
<script type="text/javascript" src="<?php $this->options->themeUrl('js/phzoom.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/post.js'); ?>"></script>
<?php }?>
<?php $this->header(); ?>
</head>
<body <?php if($this->is('single')): ?> class="single"<?php endif; ?>>
	<div id="header">
		<div id="header-box">
			<div id="logo"><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>"><img src="<?php $this->options->themeUrl(); ?>images/logo.png" /></a></div>
			<div id="nav">
				<ul>
					<li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
					<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
					<?php while($category->next()): ?>
					<li<?php if($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>><a href="<?php $category->permalink(); ?>" title="<?php $category->title(); ?>"><?php $category->name(); ?></a></li>
					<?php endwhile; ?>
					<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
					<?php while($pages->next()): ?>
					<li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="wrap">