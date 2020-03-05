<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}
function getCommentAt($coid){
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    if (empty($prow['parent'])){
        echo '';
        return;
    }
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-'.$parent.'">@'.$author.'</a>';
        echo $href;
    } else {
        echo '';
    }
}
function getHotComments($limit = 10){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($limit)
        ->order('commentsNum', Typecho_Db::SORT_DESC)
    );
    if($result){
        foreach($result as $val){
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<a class="mdui-list-item mdui-ripple" href="'.$permalink.'" target="_blank">'.$post_title.'</a>';
        }
    }
}
function getAvatar($mail,$size=130){
    if (strpos($mail,'@qq.com')!==false){
        $avatar = 'https://q.qlogo.cn/g?b=qq&nk='.$mail.'&s=100';
    }else{
        $host = 'https://cdn.v2ex.com/gravatar/';
        $default = 'mm';
        $rating = Helper::options()->commentsAvatarRating;
        $hash = md5(strtolower($mail));
        $avatar = $host . $hash . '?s='.$size.'&r=' . $rating . '&d=' . $default;
    }
    return $avatar;
}
function getContent($content,$title){
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$title.'" title="点击放大图片"></a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
function getComments($content){
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $replacement = '<a href="$1" data-fancybox="comments" /><img src="$1" title="点击放大图片"></a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}
/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

