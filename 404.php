<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <div class="mdui-card mdui-hoverable mdui-m-y-3">

        <div class="mdui-card-content mdui-typo">
            <div class="mdui-text-center">
                <h2>404 - <?php _e('页面没找到'); ?></h2>
                <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看:) '); ?></p>
            </div>
            <form method="post">
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons"></i>
                    <label class="mdui-textfield-label">Keyword</label>
                    <input class="mdui-textfield-input" name="s" type="text" name="s" required/>
                    <div class="mdui-textfield-error">关键词不能为空</div>
                    <div class="mdui-textfield-helper">Please enter text.</div>
                </div>
                <div class="mdui-text-center">
                    <button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent"><?php _e('搜索'); ?></button>
                </div>
            </form>
        </div>
    </div>
	<?php $this->need('footer.php'); ?>
