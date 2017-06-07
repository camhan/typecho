<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<title><?php $this->options->title(); ?><?php $this->archiveTitle(); ?></title>
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('juncss.css'); ?>" />
<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>

<?php if ($this->is('index') || $this->is('archive') || $this->is('category')){ ?>
<body class="index">
<?php }else if($this->is('page') || $this->is('tag')){?>
<body class="jPage">
<?php }else if($this->is('post')){
	$artType = $this->authorId;
	if($artType == '1'){
		echo '<body class="bfArt">';
	}else{
		echo '<body class="gfArt">';
	}
?>
<?php }?>
<div class="junP">
<div class="junH">
<div class="junHIn clearfix">
<h1 class="jLogo"><a href="<?php $this->options->siteUrl(); ?>">
        <?php if ($this->options->logoUrl): ?>
        <img height="60" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
        <?php endif; ?>
        <?php $this->options->title() ?>
        </a></h1>
<div class="jNav">
<ul class="jMenu clearfix">
<li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><i><?php _e('首页'); ?></i></a></li>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
    <li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><i><?php $pages->title(); ?></i></a></li>
    <?php endwhile; ?>
</ul>
</div>

<div class="jSearch">
<form id="search" method="post">
<input type="text" name="s" class="jSKey" size="20" />
</form>
</div>

</div>
</div>

<div class="junB"></div>