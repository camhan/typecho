<?php if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
   echo "";
}else{ ;?>
<?php $this->footer(); ?>
<div class="loader">
<svg class="spinner" width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="3" stroke-linecap="round" cx="12" cy="12" r="10"></circle></svg>
</div><div id="tip"></div>
<script src="<?php $this->options->themeUrl('js/pjax.js'); ?>"></script>
<lamu class="top" id="lamu"><a><img src="https://ooo.0o0.ooo/2017/04/22/58fb60706e07b.png"  onmouseover="this.src='https://ooo.0o0.ooo/2017/04/22/58fb608302e95.png'" ondragstart="return false" onmouseout="this.src='https://ooo.0o0.ooo/2017/04/22/58fb60706e07b.png'" id="audioBtn"></a></lamu>
<footer class="size">
<p>©2017 远山 鲁ICP备17005115号</p><p>除非特别注明，本站内容采用知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议进行许可。</p>
</footer>
</div>
</body>
</html>
<?php };?>