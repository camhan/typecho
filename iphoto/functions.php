<?php
	function post_thumbnail($obj){
        $content = $obj-> text;			
        preg_match_all( "/\<img.*?src\=\"(.*?)\".*?data-height\=\"(.*?)\"[^>]*>/i", $content, $thumbUrl );    
        $cnt = count($thumbUrl[0]);
		if( $cnt > 0 ) {
			$img_src=$thumbUrl [1][0];
			$alt = $obj-> title;
			$h   = $thumbUrl [2][0];
			$args = array('img' => $img_src,'h'   => (int) $h,'alt' => $alt);
			return $args;         
		}
    }

	
	//主题设置
    function themeConfig($form) {
        $excerptLength = new Typecho_Widget_Helper_Form_Element_Text('excerptLength',NULL,'200','日志截断长度', '首页显示的日志截断长度。');
        $excerptLength->input->setAttribute('class', 'mini');
        $form->addInput($excerptLength->addRule('isInteger', '请填入一个数字')->addRule('required', '请填入一个数字。'));

    }
	
    //自定义评论列表
    function threadedComments($comments,$singleCommentOptions) {
            $author = '<a href="'.$comments->url.'" rel="external nofollow" target="_blank">'.$comments->author.'</a>';
        ?>
	<li id="<?php $comments->theId(); ?>" class="<? if($comments->levels > 0){
                echo 'comment-child';
            }else{
                echo 'comment-parent';
            }
            if($comments->levels > 1){
                echo ' comment-depth';
            }
            ?>">
		<div id="div-<?php $comments->theId(); ?>" class="comment-info">
            <div class="comment-authorinfo">
			    <?php $comments->gravatar(48, 'mm'); ?>
                <div class="comment-text">
                    <span class="comment-author"><?php echo $author; ?></span>
				    <span class="comment-time"><?php $comments->date('Y-m-d H:i:s') ?></span>
                </div>
                <div class="comment-reply">
				    <?php $comments->reply('回复') ?>
                </div>
            </div>
            <div class="comment-content">
                <?php $comments->content(); ?>
            </div>
            <div class="comment-children">
                <?php if ($comments->children) { ?><?php $comments->threadedComments($singleCommentOptions); ?><?php } ?>
            </div>
		</div>
	</li>
<?php } ?>