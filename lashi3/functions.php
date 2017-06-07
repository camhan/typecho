<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
  $name = new Typecho_Widget_Helper_Form_Element_Text('name', NULL, NULL, _t('自定义站名'), _t('在这里输入文字，例：ジャスティス'));
  $form->addInput($name);
  $fname = new Typecho_Widget_Helper_Form_Element_Text('fname', NULL, NULL, _t('自定义副标题'), _t('在这里输入文字，例“我有一壶酒，足矣慰风霜”'));
  $form->addInput($fname);
  $ly = new Typecho_Widget_Helper_Form_Element_Text('ly', NULL, NULL, _t('导航留言'), _t('在这里输入URL'));
  $form->addInput($ly);
  $links = new Typecho_Widget_Helper_Form_Element_Text('links', NULL, NULL, _t('导航隔壁'), _t('在这里输入URL'));
  $form->addInput($links);
  $bg = new Typecho_Widget_Helper_Form_Element_Radio('bg',
    array(
    '0' => _t('显示 &emsp;'),
    '1' => _t('不显示 &emsp;'),),
        '1',_t('背景随机图'),_t("关闭更清爽.")
    );
    $form->addInput($bg);
}
function dengji($i){
$db=Typecho_Db::get();
$mail=$db->fetchAll($db->select(array('COUNT(cid)'=>'rbq'))->from('table.comments')->where('mail = ?', $i)->where('authorId = ?','0'));
foreach ($mail as $sl){
$rbq=$sl['rbq'];}
if($rbq<1){
echo '蘭';
}elseif ($rbq<5 && $rbq>0) {
echo 'バラ';
}elseif ($rbq<10 && $rbq>=5) {
echo '椿';
}elseif ($rbq<15 && $rbq>=10) {
echo 'ケシ';
}elseif ($rbq<20 && $rbq>=15) {
echo '槿';
}elseif ($rbq<25 && $rbq>=20) {
echo '蓮';
}elseif ($rbq>=25) {
echo '桜';
}}
function getCommentAt($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        if($author){
        	$href   = '<a class="at" href="#comment-'.$parent.'">@'.$author.'</a>';
    	}else{
    		$href   = '<a href="javascript:void(0)">评论审核中···</a>';
    	}
        echo $href;
    } else {
        echo "";
    }
}
function getGravatar($i){
if(preg_match('|^[1-9]\d{4,10}@qq\.com$|i',$i)){
	echo 'https://q.qlogo.cn/g?b=qq&nk='.$i.'&s=100';
}else{
    $host = 'https://secure.gravatar.com';
    $url = '/avatar/';
    $size = '80';
    $rating = Helper::options()->commentsAvatarRating;
    $hash = md5(strtolower($i));
    $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=https://secure.gravatar.com/avatar/533cfdfce09a1cdedb785aaf5c3df7b4?s=30&r=X';
    echo $avatar;
	}
}
function art_count ($cid){$db=Typecho_Db::get ();$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));$text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);echo mb_strlen($text,'UTF-8');}
function themeInit($archive){if ($archive->is('single')){$archive->content = url($archive->content);}}
function url($content){ 
  $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#','<a$1 href="$2$3"$5 target="_blank">', $content);
  $content = preg_replace('#<img(.*?) src="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?) alt="(.*?)"(.*?)>#','<div style="position:relative"><img$1 src="$2$3"$5$7onerror="this.src=\'https://sa.bi/404.png\'"><div class="image-caption">$6</div></div>', $content);
  return $content;}
function timesince($older_date,$comment_date = false) {
$chunks = array(
array(86400 , '天'),
array(3600 , '时'),
array(60 , '分'),
array(1 , '秒'),
);
$newer_date = time();
$since = abs($newer_date - $older_date);
if($since < 2592000){
for ($i = 0, $j = count($chunks); $i < $j; $i++){
$seconds = $chunks[$i][0];
$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0) break;
}
$output = $count.$name.'前';
}else{
$output = !$comment_date ? (date('Y-m-j G:i', $older_date)) : (date('Y-m-j', $older_date));
}
return $output;
}