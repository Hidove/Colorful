<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="mdui-col-lg-12 mdui-col-md-8">
    <div class="mdui-card mdui-typo">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php $this->title() ?></div>
            <div class="mdui-card-primary-subtitle">
                作者: <?php $this->author() ?>&nbsp;&nbsp;&nbsp;
                时间: <?php $this->date() ?>&nbsp;&nbsp;&nbsp;
                分类: <?php $this->category(','); ?></div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content">
            <?php $this->content(); ?>
        </div>
    </div>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
