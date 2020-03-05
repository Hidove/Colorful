<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--pingl-->
<?php
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
    $depth = $comments->levels +1;

    if ($comments->url) {
        $author = '<a href="' . $comments->url . '"target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
if ($depth > 1 && $depth < 3) {
    echo ' comment-child ';
    $comments->levelsAlt('comment-level-odd', ' comment-level-even');
}
else if( $depth > 2){
    echo ' comment-child2';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
}
else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
?>">
    <div id="<?php $comments->theId(); ?>">
        <?php
        $size = '80';
        $avatar = getAvatar($comments->mail,$size);
        ?>
        <div class="mdui-card mdui-typo mdui-m-t-2">
            <!-- 卡片头部，包含头像、标题、副标题 -->
            <div class="mdui-card-header">
                <img class="mdui-card-header-avatar" src="<?php echo $avatar ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
                <div class="mdui-card-header-title">
                    <span class="comment-author<?php echo $commentClass; ?>"><?php echo $author; ?></span>
                </div>
                <div class="mdui-card-header-subtitle">
                    <?php $comments->date('Y-m-d H:i:s'); ?>
                </div>
            </div>
            <!-- 卡片的内容 -->
            <div class="mdui-card-content comment-content">
                <span class="comment-author-at"><?php getCommentAt($comments->coid); ?></span>&nbsp;&nbsp;
                <?php echo getComments($comments->content); ?>
                <?php if ('waiting' == $comments->status) { ?>
                    <em class="mdui-text-color-grey">（<?php $options->commentStatus(); ?>）</em>
                <?php } ?>
            </div>
            <!-- 卡片的按钮 -->
            <div class="mdui-card-actions">
                <?php $comments->reply('Reply'); ?>
            </div>
        </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children mdui-m-l-5">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
</li>
<?php } ?>
<!--pingl-->
<?php $this->comments()->to($comments); ?>
<div id="comments" class="mdui-card mdui-m-t-3 mdui-hoverable">
    <div class="mdui-card-content mdui-typo">
    <?php if($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <h3 id="response"><?php _e('添加新评论'); ?></h3>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <i class="mdui-icon material-icons">&#xe0d8;</i>
                    <label for="textarea" class="mdui-textfield-label"><?php _e('Message'); ?></label>
                    <textarea name="text" id="textarea" class="mdui-textfield-input" required ><?php $this->remember('text'); ?></textarea>
                </div>
                <?php if($this->user->hasLogin()): ?>
                    <p><span class="mdui-typo-caption-opacity"><?php _e('登录身份: '); ?></span><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
                <?php else: ?>
                <div class="mdui-row-xs-1 mdui-row-sm-<?php if ($this->options->commentsRequireURL): ?>3<?php else: ?>2<?php endif; ?>">
                    <div class="mdui-textfield mdui-textfield-floating-label mdui-col">
                        <i class="mdui-icon material-icons">&#xe853;</i>
                        <label for="author" class="mdui-textfield-label"><?php _e('称呼'); ?></label>
                        <input type="text" name="author" id="author" class="mdui-textfield-input" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label mdui-col">
                        <i class="mdui-icon material-icons">&#xe158;</i>
                        <label for="mail" class="mdui-textfield-label"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>><?php _e('Email'); ?></label>
                        <input type="email" name="mail" id="mail" class="mdui-textfield-input" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </div>
                    <?php if ($this->options->commentsRequireURL): ?>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-col">
                            <i class="mdui-icon material-icons">&#xe89a;</i>
                            <label for="url" class="mdui-textfield-label" required><?php _e('网站'); ?></label>
                            <input type="url" name="url" id="url" class="mdui-textfield-input" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="mdui-m-t-3">
                    <button type="submit" class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple"><?php _e('提交评论'); ?></button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php $comments->listComments(); ?>
    <?php endif; ?>
    </div>
    <?php $comments->pageNav('前一页', '后一页', 1, '...', array('wrapTag' => 'div', 'wrapClass' => 'page-navigator mdui-card mdui-hoverable mdui-p-y-3', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
</div>
