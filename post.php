<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-col-md-8">
    <div class="mdui-card mdui-hoverable mdui-m-y-3 mdui-p-a-3">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php $this->title() ?></div>
            <div class="mdui-card-primary-subtitle mdui-typo">
                作者: <?php $this->author() ?>&nbsp;&nbsp;&nbsp;
                时间: <?php $this->date() ?>&nbsp;&nbsp;&nbsp;
                分类: <?php $this->category(','); ?>
            </div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content mdui-typo" id="article-content">
            <?php if(time() - $this -> modified >= 15552000): ?>
                <blockquote>这篇文章上次修改于 <?php echo ceil((time() - $this -> modified) / 86400) ?> 天前，可能其部分内容已经发生变化，如有疑问可询问作者。</blockquote>
            <?php endif ?>
            <?php echo getContent( $this->content,$this->title); ?>
        </div>
        <div class="mdui-card-content">
<!--            <i class="mdui-icon material-icons">&#xe3e3;</i>-->
            <span class="tags"><?php $this -> tags('', true, '<a href="javascript:`;">暂无标签</a>'); ?></span>
        </div>
    </div>
    <div class="mdui-card mdui-hoverable">
        <div class="mdui-card-content mdui-row mdui-text-center">
            <div class="mdui-col-xs-12 mdui-text-color-grey">如果觉得我的文章对你有用，请随意赞赏</div>
            <div class="mdui-col-sm-6 mdui-col-xs-12">
                <p>支付宝</p>
                <img style="width:150px;height:150px;" src="https://pic.abcyun.co/image/5e58628e4e04c.jpg" title="支付宝">
            </div>
            <div class="mdui-col-sm-6 mdui-col-xs-12">
                <p>微信支付</p>
                <img style="width:150px;height:150px;" src="https://pic.abcyun.co/image/5e58639366abb.jpg" title="微信支付">
            </div>
        </div>
    </div>
    <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-typo mdui-m-t-3">
        <div class="mdui-col">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block">上一篇: <?php $this->thePrev('%s','没有了'); ?></button>
        </div>
        <div class="mdui-col">
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-block">下一篇: <?php $this->theNext('%s','没有了'); ?></button>
        </div>
    </div>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>

<!-- CDN -->
<script src="https://lib.baomitu.com/highlight.js/9.15.10/highlight.min.js"></script>
<script src="https://lib.baomitu.com/highlightjs-line-numbers.js/2.8.0/highlightjs-line-numbers.min.js"></script>
<script src="https://lib.baomitu.com/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<!-- 本地 -->
<!-- <script src="<?php $this->options->themeUrl('assets/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/highlight/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/highlight/highlightjs-line-numbers.min.js'); ?>"></script> -->

<script>
    hljs.initHighlightingOnLoad();
    hljs.initLineNumbersOnLoad();
</script>
<?php $this->need('footer.php'); ?>
