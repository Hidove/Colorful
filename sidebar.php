<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="mdui-col-md-4 mdui-hidden-sm-down">
    <div class="mdui-tab" mdui-tab>
        <a href="#tab-article" class="mdui-ripple">
            <i class="mdui-icon material-icons">&#xe80e;</i>
            <label>最新文章</label>
        </a>
        <a href="#tab-reply" class="mdui-ripple">
            <i class="mdui-icon material-icons">&#xe0ca;</i>
            <label>最新回复</label>
        </a>
        <a href="#tab-category" class="mdui-ripple">
            <i class="mdui-icon material-icons">&#xe2c2;</i>
            <label>分类</label>
        </a>
    </div>
    <div class="mdui-card mdui-m-t-3 mdui-hoverable" id="tab-article">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php _e('最热文章'); ?></div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content">
            <div class="mdui-list">
                <?php getHotComments('10');?>
            </div>
        </div>
    </div>
    <div class="mdui-card mdui-m-t-3 mdui-hoverable" id="tab-reply">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php _e('最近回复'); ?></div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content">
            <div class="mdui-list">
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while($comments->next()): ?>
                    <a class="mdui-list-item mdui-ripple" href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="mdui-card mdui-m-t-3 mdui-hoverable" id="tab-category">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php _e('分类'); ?></div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content">
            <div class="mdui-list">
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while($category->next()): ?>
                    <a class="mdui-list-item mdui-ripple" href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <div class="mdui-card mdui-m-t-3 mdui-hoverable">
            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><?php _e('归档'); ?></div>
            </div>
            <!-- 卡片的内容 -->
            <div class="mdui-card-content">
                <div class="mdui-list">
                    <?php $this->widget('Widget_Contents_Post_Date')->to($category); ?>
                    <?php while($category->next()): ?>
                        <a class="mdui-list-item mdui-ripple" href="<?php $category->permalink(); ?>"><?php $category->date(); ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
        <div class="mdui-card mdui-m-t-3 mdui-hoverable">
            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><?php _e('其它'); ?></div>
            </div>
            <!-- 卡片的内容 -->
            <div class="mdui-card-content">
                <div class="mdui-list">
                    <?php if($this->user->hasLogin()): ?>
                        <a class="mdui-list-item mdui-ripple" href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>(<?php $this->user->screenName(); ?>)</a>
                        <a class="mdui-list-item mdui-ripple" href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a>
                    <?php endif; ?>
                    <a class="mdui-list-item mdui-ripple" href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a>
                    <a class="mdui-list-item mdui-ripple" href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="mdui-card mdui-m-t-3 mdui-hoverable">
        <!-- 卡片的标题和副标题 -->
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title"><?php _e('标签云'); ?></div>
        </div>
        <!-- 卡片的内容 -->
        <div class="mdui-card-content">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
            <?php if($tags->have()): ?>
            <div class="tags">
                <?php while ($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" title="<?php $tags->count(); ?> 个话题" target="_blank"><?php $tags->name(); ?></a>
                <?php endwhile; ?>
                <?php else: ?>
                    <a href="javascript:;">没有任何标签</a>
                <?php endif; ?>
            </div>

        </div>
    </div>

</div><!-- end #sidebar -->
