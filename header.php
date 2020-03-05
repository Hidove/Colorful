<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js" lang="zh">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?> - 分享互联网的宝藏<?php endif; ?></title>

    <link rel="icon" type="image/ico" href="<?php $this->options->themeUrl('favicon.ico'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/mdui-v0.4.3/css/mdui.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/highlight/styles/github-gist.css'); ?>">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/fancybox/jquery.fancybox.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body class="mdui-appbar-with-toolbar mdui-drawer-body-left mdui-theme-primary-indigo mdui-theme-accent-pink">
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a
    href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.
</div>
<![endif]-->
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-indigo">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon " mdui-drawer="{target: '#left-drawer'}"><i
                class="mdui-icon material-icons">&#xe5d2;</i></a>
        <a href="/" class="mdui-typo-headline"><?php $this->options->title() ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-tooltip="{content: '搜索'}"
           mdui-dialog="{target: '#search'}"><i class="mdui-icon material-icons">&#xe8b6;</i></a>
    </div>
</div>
<div class="mdui-dialog" id="search">
    <form method="post" action="<?php $this->options->siteUrl(); ?>">
        <div class="mdui-textfield mdui-textfield-floating-label">
            <i class="mdui-icon material-icons"></i>
            <label class="mdui-textfield-label">Keyword</label>
            <input class="mdui-textfield-input" name="s" type="text" name="s" required/>
            <div class="mdui-textfield-error">关键词不能为空</div>
            <div class="mdui-textfield-helper">Please enter text.</div>
        </div>
        <div class="mdui-dialog-actions">
            <button type="submit" class="mdui-btn mdui-ripple">Search</button>
            <button class="mdui-btn mdui-ripple" mdui-dialog-close="">cancel</button>
        </div>
    </form>
</div>
<!-- 抽屉 -->
<div class="mdui-drawer" id="left-drawer">
    <div class="my-info mdui-text-center">
        <img class="mdui-img-circle mdui-img-fluid avatar"
             src="https://ae01.alicdn.com/kf/U70631aeb863445a588d2d5258ed173e0F.jpg"/>
        <span><?php $this->options->title() ?><i class="mdui-icon material-icons">&#xe5cf;</i></span>
    </div>
    <div class="mdui-list" mdui-collapse="{accordion: true}">
        <!-- 组合导航 -->
        <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">&#xe569;</i>
                <div class="mdui-list-item-content">分类</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">&#xe313;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while ($category->next()): ?>
                    <a href="<?php $category->permalink(); ?>"
                       class="mdui-list-item mdui-ripple "><?php $category->name(); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- 组合导航 -->
        <div class="mdui-collapse-item ">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-deep-orange">&#xe53b;</i>
                <div class="mdui-list-item-content">页面</div>
                <i class="mdui-icon material-icons">&#xe313;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
                <?php $this->widget('Widget_Contents_Page_List')->to($page); ?>
                <?php while ($page->next()): ?>
                    <a href="<?php $page->permalink(); ?>"
                       class="mdui-list-item mdui-ripple "><?php $page->title(); ?></a>
                <?php endwhile; ?>
            </div>
        </div>
        <!-- 组合导航 -->
        <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">&#xe157;</i>
                <div class="mdui-list-item-content">友情链接</div>
                <i class="mdui-icon material-icons">&#xe313;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
                <?php
                if (class_exists('Links_Plugin')){
                    $mypattern = '<a href="{url}" target="_blank" rel="nofollow" class="mdui-list-item mdui-ripple ">{name}</a>';
                    Links_Plugin::output($mypattern, 0, "ten");
                }
            ?>
            </div>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-collapse-item">
<!--            mdui-ripple hitokoto -->
            <div class="hitokoto mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-cyan">&#xe7f5;</i>
                <span class="hitokoto-content">
                    正在加载一言...
                </span>
            </div>
        </div>
    </div>
</div>
<div id="body">
    <div class="mdui-container-fluid">
        <div class="mdui-row">

    
    
