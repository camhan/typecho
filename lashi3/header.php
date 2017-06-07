<?php if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
   echo "";
}else{ ;?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<link href="<?php $this->options->themeUrl('css/ys.css'); ?>" rel="stylesheet">
<link href="/favicon.ico" rel="icon">
<link rel='dns-prefetch' href='//s.w.org'>
<link rel="icon" href="/favicon.ico" sizes="32x32">
<link rel="icon" href="/favicon.ico" sizes="192x192">
<link rel="apple-touch-icon-precomposed" href="/favicon.ico">
</head>
<body>
<?php if ( $this->options->bg =='0' ) : ?>
<img class="MIDD-927" id="bgimg" ondragstart="return false"  src="<?php echo file_get_contents('https://api.sa.bi/yitu/');?>">
<?php endif; ?>
<div class="ABP-268 这位先生请开始您的表演。">
<header>
  	<h1 style="display:none" id="blog-bt"><?php $this->options->title(); ?></h1>
  	<h1 style="display:none" id="td"></h1>
  	<h1 id="td2h"><?php $this->options->name();?></h1>
	<p><?php $this->options->fname();?></p>
	<nav class="EKDV-208">
		<a href="<?php $this->options->siteUrl(); ?>">文章</a> ┋
        <a href="<?php $this->options->ly();?>">关于</a> ┋
        <a href="<?php $this->options->links();?>">友達</a> ┋
        <a href="<?php $this->options->siteUrl(); ?>/admin" target="_blank">管理</a>
    </nav>
</header>
<?php };?>