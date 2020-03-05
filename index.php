<?php
/**
 * 这是 Hidove 的一款多彩主题
 * 
 * @package Colorful
 * @author Hidove 余生
 * @version 1.0
 * @link http://blog.hidove.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="mdui-col-md-8">

<?php while($this->next()): ?>
    <div class="mdui-card mdui-m-t-3 mdui-hoverable">
            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><a target="_blank" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></div>
                <div class="mdui-card-primary-subtitle"><?php $this->author() ?></div>
            </div>
            <!-- 卡片的内容 -->
        <div class="mdui-card-content"><a target="_blank" href="<?php $this->permalink() ?>"><?php $this->excerpt(100,'...'); ?></a></div>
            <!-- 卡片的按钮 -->
            <div class="mdui-card-actions mdui-m-l-1">
                <a target="_blank" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent" href="<?php $this->permalink() ?>">阅读</a>
                <span class="tags"><?php $this -> tags('', true,'<a href="javascript:`;">暂无标签</a>'); ?></span>
                <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-btn-icon mdui-float-right"><i class="mdui-icon material-icons">expand_more</i></button>
            </div>
    </div>
<?php endwhile; ?>
    <?php $this->pageNav('前一页', '后一页', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'page-navigator mdui-card mdui-m-t-3 mdui-hoverable mdui-p-y-3', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
