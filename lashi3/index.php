<?php
/**
 * 拉屎的时候写博文岂不更惬意?
 * 
 * 
 * @package LaShi
 * @author 远山
 * @version 0.2
 * @link https://sa.bi/
 */
 $this->need('header.php');
 ?>
    <div class="ABP-268" id="m">
      <div class="box">
        <?php while($this->next()): ?>
            <article class="JUX-766">
              <p class="ULT-130"><?php $this->date('Y.m.d');?></p>
              <p class="UER-015">「<?php $this->date('m.d'); ?>」</p>
              <p class="STA-362"><?php art_count($this->cid); ?> 字</p>
              <h3 class="BBI-094"><a href="<?php $this->permalink() ?>"><?php $this->title(); ?></a></h3>
            </article>
        <?php endwhile; ?>
      </div>
    </div>
<?php $this->need('footer.php');?>