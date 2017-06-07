<div id="comments">
            <?php $this->comments()->to($comments); ?>
            <?php if ($comments->have()): ?>            
            <?php $comments->pageNav(); ?>
            
            <?php $comments->listComments(); ?>
            
            <?php endif; ?>

            <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
            
            <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
            </div>
            
            <h3>Add a comment</h3>
			<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
                <?php if($this->user->hasLogin()): ?>
				<p class="title welcome">
                    Login as <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">[Logout?]</a>
                    <span class="cancel-comment-reply"><?php $comments->cancelReply(); ?></span>
                </p>
                <?php else: ?>
                <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?>
                <p class="title welcome">
                    Remember as <?php $this->remember('author'); ?></strong>!
                    <span class="cancel-comment-reply"><?php $comments->cancelReply(); ?></span>
                </p>
                <div class="author_info" style="display:none;">
                <?php else : ?>
                <div class="author_info">
                <?php endif ; ?>
				<p>
					<input type="text" name="author" id="author" class="text" size="15" value="<?php $this->remember('author'); ?>" />
                    <label for="author"><small>Name</small></label>
				</p>
				<p>
					<input type="text" name="mail" id="email" class="text" size="15" value="<?php $this->remember('mail'); ?>" />
                    <label for="mail"><small>Mail</small></label>
				</p>
				<p>
					<input type="text" name="url" id="url" class="text" size="15" value="<?php $this->remember('url'); ?>" />
                    <label for="url"><small>Website</small></label>
				</p>
                </div>
                <?php endif; ?>
<div id="author_textarea">
<textarea rows="5" cols="50" name="text" id="comment" class="textarea"><?php $this->remember('text'); ?></textarea>
<p><input type="submit" value="Submit (Ctrl+Enter)" id="submit" class="submit" /></p>
</div>
			</form>
            </div>
            <?php else: ?>
            <h3>Comment are cloused</h3>
            <?php endif; ?>
		</div>