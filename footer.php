<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
} ?>

</div><!-- end .row -->
</div>
</div><!-- end #body -->
<footer class="mdui-color-theme mdui-text-center mdui-p-y-3 mdui-m-t-3">
    <div class="mdui-typo">
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    </div>
    <div class="mdui-typo">
        <span>由 <a href="http://www.typecho.org" target="_blank" rel="nofollow">Typecho</a> 强力驱动 .</span>
        <span>Theme By <a href="https://blog.hidove.cn">余生</a>.</span>
    </div>
    <div class="upyun">
        <a href="https://www.upyun.com/?utm_source=lianmeng&utm_medium=referral" target="_blank" rel="nofollow">
            <img style="width:100px;height:50px;" src="https://pic.abcyun.co/image/5e527bfbad323.jpg"/>
        </a>
    </div>
</footer><!-- end #footer -->
<?php $this->footer(); ?>
<a href="#top" target="_self" class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">&#xe5d8;</i></a>

<!-- cdn -->
<script src="https://lib.baomitu.com/mdui/0.4.3/js/mdui.min.js"></script>

<!-- 本地 -->
<!-- <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/mdui-v0.4.3/js/mdui.min.js'); ?>"> -->

<script>
    $.ajax({
        url:'https://v1.hitokoto.cn/?encode=text',
        success:function (data) {
            $('.hitokoto-content').text(data);
        }
    })
</script>
<div style="display:none;">
    <script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1274088821'%3E%3C/span%3E%3Cscript src='https://s13.cnzz.com/z_stat.php%3Fid%3D1274088821' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
</body>
</html>
