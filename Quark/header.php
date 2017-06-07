<!DOCTYPE html><html>
<head><title><?php $this->options->title(); ?><?php $this->archiveTitle(", ", ' - '); ?></title>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<link rel="stylesheet" type="text/css" href="http://ooqm9t7kf.bkt.clouddn.com/1.css">
<?php $this->header(); ?>
</head>
<body>
<div id="h">
<div id="nav" class="w1">
    <a href="#" class="x" onclick = "tg_c('h','o');"><div><span class="t"></span><span class="m"></span><span class="b"></span></div></a>
    <div class="logo"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></div>
    <ul><li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li><?php $this->widget('Widget_Contents_Page_List')->to($pages); ?><?php while($pages->next()): ?><li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li><?php endwhile; ?></ul>
</div>
</div>
<div id="m" class="w1">
<script>function tg_c(id,nc){var e=document.getElementById(id);var c=e.className;if(!c){e.className=nc}else{var classArr=c.split(' ');var exist=false;for(var i=0;i<classArr.length;i++){if(classArr[i]===nc){classArr.splice(i,1);e.className=Array.prototype.join.call(classArr," ");exist=true;break}}if(!exist){classArr.push(nc);e.className=Array.prototype.join.call(classArr," ")}}}</script>