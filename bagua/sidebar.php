<div id="footer" class="border">
			<div class="node">
				<h3>About</h3>
				<p class="description">实名...,..年出生,目前就读于 ........ ,不敢表白的,有时候节操满天飞.伪小清新,萌控<br />目前使用大猫的<a href="http://miao.in/?deef">(miao)</a>.<br /><a href="http://yydd.be/about.html">ReadMore?</a></p>
			</div>
			<div class="node">
				<h3>Comments</h3>
				<ul>
					<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>:<?php $comments->excerpt(5, '…'); ?></li>
            <?php endwhile; ?>
				</ul>
			</div>
			<div class="node"> 	 	 	   
				<h3>Archive</h3>
				<ul>
					<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
				</ul>
			</div>
			<div class="node last">
				<h3>Blogroll</h3>
				<ul>
				<!--请修改sidebar.php中从第23行开始
				这个主题没有底部连接，如果你愿意，请尽量在友情链接的区域添加一下我的连接-->
				<li><a href="http://yydd.be">Deef</a></li>
				<li><a href="http://#">DEMO</a> 简介</li> <li><a href="http://#">DEMO</a> 简介</li> <li><a href="http://#">DEMO</a> 简介</li>
				</ul>
			</div>
		</div><!-- /footer -->