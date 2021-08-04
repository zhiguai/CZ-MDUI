<?php
/*
 * @Description: 
 * @Autor: 吃纸怪
 * @QQ: 2903074366
 * @Email: 2903074366@qq.com
 * @QQgroup: 801235342
 * @Github: https://github.com/zhiguai
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('Version','1.0.0');

function themeConfig($form) {
    $Version = Version;
    echo <<<EOF
    <center>
    <p>   
        <h2>CZMDUI</h2>
        <h3>版本 <code id="mdr-version">{$Version}</code></h3>
        <a href="https://github.com/zhiguai/CZ-MDUI"><button class="btn primary">前往GITHUB</button></a>
        <a href="//fatda.cn/"><button class="btn primary">查看文档</button></a>
        <a href="http://wpa.qq.com/msgrd?v=3&uin=801235342&site=qq&menu=yes"><button class="btn primary">加入交流群801235342</button></a>
        <p>请大家务必入群，如有问题或更新将在群内第一时间告知！</p>
	</p>
    </center>
    <br>
EOF;
    /**
     * 主题设置备份
     */
    $db = Typecho_Db::get();
    $nameQuery = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme'));
    $name = isset($nameQuery['value']) ? $nameQuery['value'] : false;
    $themeQuery = $db->fetchRow($db->select()->from('table.options')->where('name = ?', "theme:$name"));
    if (isset($_GET['themeBackup']) && isset($_POST['type'])) :
        $theme = $themeQuery ? $themeQuery['value'] : false;
        $backupQuery = $db->fetchRow($db->select()->from('table.options')->where('name = ?', "theme:themeBackup-$name"));
        $backup = $backupQuery ? $backupQuery['value'] : false;

        if ($_POST["type"] == "备份主题设置") {
            if ($theme) {
                if ($backup) {
                    $update = $db->update('table.options')->rows(array('value' => $theme))->where('name = ?', "theme:themeBackup-$name");
                    $db->query($update);
                    Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置备份已更新'), 'success');
                } else {
                    $insert = $db->insert('table.options')->rows(array('name' => "theme:themeBackup-$name", 'user' => '0', 'value' => $theme));
                    $db->query($insert);
                    Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置备份已完成'), 'success');
                }
            } else Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置备份错误: 无法找到主题设置数据'), 'error');
        } else if ($_POST["type"] == "还原主题设置") {
            if ($backup) {
                $update = $db->update('table.options')->rows(array('value' => $backup))->where('name = ?', "theme:$name");
                $db->query($update);
                Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置已恢复，若浏览器没有自动刷新，请手动刷新页面'), 'success');
                echo '<script language="JavaScript">window.setTimeout("location=\'\'", 2000);</script>';
            } else Typecho_Widget::widget('Widget_Notice')->set(_t('没有找到主题设置备份'), 'notice');
        } else if ($_POST["type"] == "删除备份设置") {
            if ($backup) {
                $delete = $db->delete('table.options')->where('name = ?', "theme:themeBackup-$name");
                $db->query($delete);
                Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置备份已删除'), 'success');
            } else Typecho_Widget::widget('Widget_Notice')->set(_t('没有找到主题设置备份'), 'notice');
        } else Typecho_Widget::widget('Widget_Notice')->set(_t('主题设置备份错误: 未知操作'), 'error');
    endif;

    echo <<<EOF
	<p>
		<form class="protected" action="?themeBackup" method="post" id="mdr-backup">
			<input type="submit" name="type" class="btn btn-s" value="备份主题设置" />
			<input type="submit" name="type" class="btn btn-s" value="还原主题设置" />
			<input type="submit" name="type" class="btn btn-s" value="删除备份设置" />
		</form>
	</p>
EOF;

    $IconlogoUrl = new Typecho_Widget_Helper_Form_Element_Text('IconlogoUrl', NULL, "https://z3.ax1x.com/2021/08/03/fijuIH.png", _t('站点LOGO 地址'), _t('留空则显示默认,填写格式为一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($IconlogoUrl);

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, "https://z3.ax1x.com/2021/08/03/fijuIH.png", _t('首页头部 LOGO 地址'), _t('留空则显示默认,填写格式为一个图片 URL 地址, 更换首页顶部的 LOGO'));
    $form->addInput($logoUrl);

    $imgHead = new Typecho_Widget_Helper_Form_Element_Text('imgHead', NULL, NULL, _t('首页头部 背景 地址'), _t('留空则显示默认,填写格式为一个图片 URL 地址, 更换首页顶部的 蓝色壁纸且在其他文章或页面没有选图时将默认使用该图片'));
    $form->addInput($imgHead);

    $SidebarlogoUrl = new Typecho_Widget_Helper_Form_Element_Text('SidebarlogoUrl', NULL, "https://z3.ax1x.com/2021/08/03/fiXyUH.png", _t('侧栏头部 LOGO 地址'), _t('留空则显示默认,填写格式为一个图片 URL 地址, 更换侧便栏顶部的 LOGO'));
    $form->addInput($SidebarlogoUrl);

    $IndexFooter = new Typecho_Widget_Helper_Form_Element_Textarea('IndexFooter', NULL, NULL, _t('首页底部 版权 内容'), _t('留空则显示默认,填写格式为"Copyright © 2022 &lt;a href="//fatda.cn"&gt;Fatda.cn&lt;/a&gt; All rights reserved.&lt;br&gt;Made by &lt;a href="//chizg.cn"&gt;Chizg.cn&lt;/a&gt;"'));
    $form->addInput($IndexFooter);

    $PostAgreement = new Typecho_Widget_Helper_Form_Element_Textarea('PostAgreement', NULL, NULL, _t('页面内 协议 内容'), _t('留空则显示默认,填写格式为"本文采用 &lt;a href="https://creativecommons.org/licenses/by-nc-sa/3.0/deed.zh" target="_blank" rel="noopener"&gt;CC BY-NC-SA 3.0 Unported&lt;/a&gt; 协议进行许可"'));
    $form->addInput($PostAgreement);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentLogo' => _t('首页-显示头部LOGO'),
    'ShowRecentSearch' => _t('首页-显示搜索框'),
    'ShowRecentPosts' => _t('首页-显示最新文章'),
    'ShowRecentComments' => _t('首页-显示最近回复'),
    'ShowRecentTags' => _t('首页-显示全部标签')),
    array('ShowRecentLogo', 'ShowRecentSearch', 'ShowRecentPosts', 'ShowRecentComments', 'ShowRecentTags'), _t('首页 显示管理'));
    $form->addInput($sidebarBlock->multiMode());
    
    $HeeaderShow = new Typecho_Widget_Helper_Form_Element_Checkbox('HeeaderShow', 
    array('HeeaderShowState1' => _t('侧栏-首页默认开关'),
    'HeeaderShowState2' => _t('侧栏-post"文章页"默认开关'),
    'HeeaderShowState3' => _t('侧栏-archive"其他页"默认开关'),
    'HeeaderShowLogo' => _t('侧栏-显示顶部部LOGO'),
    'HeeaderShowIndex' => _t('侧栏-显示首页'),
    'HeeaderShowPage' => _t('侧栏-显示单页'),
    'HeeaderShowCategory' => _t('侧栏-显示分类'),
    'HeeaderShowArchive' => _t('侧栏-显示归档'),
    'HeeaderShowOther' => _t('侧栏-显示管理员入口')),
    array('HeeaderShowState1', 'HeeaderShowState2', 'HeeaderShowState3', 'HeeaderShowLogo', 'HeeaderShowIndex', 'HeeaderShowPage', 'HeeaderShowCategory', 'HeeaderShowArchive', 'HeeaderShowOther'), _t('侧栏 显示管理'));
    $form->addInput($HeeaderShow->multiMode());   

    $HeaderTopPostShow = new Typecho_Widget_Helper_Form_Element_Checkbox('HeaderTopPostShow', 
    array('HeaderTopPostShowBut1' => _t('顶栏-顶栏显示主题按钮'),
    'HeaderTopPostShowBut2' => _t('顶栏-顶栏显示二维码按钮'),
    'HeaderTopPostShowBut3' => _t('顶栏-顶栏显示RSS按钮'),
    'HeaderTopPostShowBut4' => _t('顶栏-顶栏显示分享按钮')),
    array('HeaderTopPostShowBut1', 'HeaderTopPostShowBut2', 'HeaderTopPostShowBut3', 'HeaderTopPostShowBut4'), _t('顶栏 显示管理'));
    $form->addInput($HeaderTopPostShow->multiMode());   

    $PostShow = new Typecho_Widget_Helper_Form_Element_Checkbox('PostShow', 
    array('PostShowComment' => _t('页面-显示评论关闭提醒'),
    'PostShowCatoon' => _t('全页面-显示卡通装饰')),
    array('PostShowComment', 'PostShowCatoon'), _t('页面 显示管理'));
    $form->addInput($PostShow->multiMode());   

    $defaultGravatar = new Typecho_Widget_Helper_Form_Element_Select('defaultGravatar', [
        '' => 'Gravatar Logo',
        'mp' => '神秘人',
        'identicon' => '随机的几何图案',
        'monsterid' => '随机的小怪兽',
        'wavatar' => '随机的卡通脸',
        'retro' => '随机的像素图案',
        'robohash' => '随机的小机器人'
    ], '', _t('评论者默认头像'), _t('在评论者没有设置过 Gravatar 时使用的头像'));
    $form->addInput($defaultGravatar->multiMode());

    $layoutColor = new Typecho_Widget_Helper_Form_Element_Select('layoutColor', [
        'light' => 'Light（亮）',
        'dark' => 'Dark（暗）',
        'now' => '随昼夜自动切换亮暗'
    ], 'light', _t('默认主题色'), _t('自定切换将在晚9点到早6点间默认设置为暗主题'));
    $form->addInput($layoutColor->multiMode());

    $primaryColor = new Typecho_Widget_Helper_Form_Element_Select('primaryColor', [
    'indigo' => 'Indigo',
    'red' => 'Red',
    'pink' => 'Pink',
    'purple' => 'Purple',
    'deep-purple' => 'Deep Purple',
    'blue' => 'Blue',
    'light-blue' => 'Light Blue',
    'cyan' => 'Cyan',
    'teal' => 'Teal',
    'green' => 'Green',
    'light-green' => 'Light Green',
    'lime' => 'Lime',
    'yellow' => 'Yellow',
    'amber' => 'Amber',
    'orange' => 'Orange',
    'deep-orange' => 'Deep Orange',
    'brown' => 'Brown',
    'grey' => 'Grey',
    'blue-grey' => 'Blue Grey'
    ], 'indigo', _t('默认主色调'), _t('不影响前台访客使用调色盘DIY喜好配色，只是初次访问时显示配色'));
    $form->addInput($primaryColor->multiMode());

    $accentColor = new Typecho_Widget_Helper_Form_Element_Select('accentColor', [
    'pink' => 'Pink',
    'red' => 'Red',
    'purple' => 'Purple',
    'deep-purple' => 'Deep Purple',
    'indigo' => 'Indigo',
    'blue' => 'Blue',
    'light-blue' => 'Light Blue',
    'cyan' => 'Cyan',
    'teal' => 'Teal',
    'green' => 'Green',
    'light-green' => 'Light Green',
    'lime' => 'Lime',
    'yellow' => 'Yellow',
    'amber' => 'Amber',
    'orange' => 'Orange',
    'deep-orange' => 'Deep Orange'
    ], 'pink', _t('默认强调色'), _t('不影响前台访客使用调色盘DIY喜好配色，只是初次访问时显示配色'));
    $form->addInput($accentColor->multiMode());
}
/*
获取文章第一个图
方法<img src="<?php echo img_postthemb($this,'https://p.pstatp.com/origin/pgc-image/c07270dd9f4f46fea798cbb3721b661c')?>"/>
*/
function img_postthemb($thiz,$default_img){
    $maxnum = count(glob("img/usr/themes/MDUI/img*",GLOB_ONLYDIR));
    $content = $thiz->content;
    $ret = preg_match("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $content, $thumbUrl);
    if($ret === 1 && count($thumbUrl) == 2){
            return $thumbUrl[1];
    }elseif($default_img == ""){
            $rand = rand(1,20); 
            $default_img1 = $thiz->widget('Widget_Options')->themeUrl . '/img/rand-post/' . $rand . '.jpg'; // 随机缩略图路径
            return $default_img1;
    }else {
            return $default_img;
    }
}
//限制字数输出
function cutstr($str,$cutleng){
    $str = $str; //要截取的字符串
    $cutleng = $cutleng; //要截取的长度
    $strleng = strlen($str); //字符串长度
    if($cutleng-->$strleng)return
    $str;//字符串长度小于规定字数时,返回字符串本身
    $notchinanum = 0;//初始不是汉字的字符数
    for($i=0;$i<$cutleng;$i++){
        if(ord(substr($str,$i,1))<=128){
            $notchinanum++;
        }
    }
    //如果要截取奇数个字符，所要截取长度范围内的字符必须含奇数个非汉字，否则截取的长度加一
    if(($cutleng%2==1)&&($notchinanum%2==0)){
        $cutleng++;
    }
    //如果要截取偶数个字符，所要截取长度范围内的字符必须含偶数个非汉字，否则截取的长度加一
    if(($cutleng%2==0)&&($notchinanum%2==1)){
        $cutleng++;
    }
    return mb_substr($str,0,$cutleng,'utf-8')."...";
}

/**
* post-footer显示下一篇
*
* @access public
* @param string 
* @return void
*/
function post_footer_theNext($widget){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
    ->where('table.contents.created > ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_ASC)
    ->limit(1);
    $content = $db->fetchRow($sql);
    if ($content) {
        $content = $widget->filter($content);
        $content['title'] = cutstr($content['title'],8);
        $link = '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-color-theme mdui-col-xs-10 mdui-col-sm-6 doc-footer-nav-right"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_forward</i><span class="doc-footer-nav-direction">Next</span><div class="doc-footer-nav-chapter">' . $content['title'] . '</div></div></a>';
        echo $link;
    } else {
        echo '<div class="mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-right"></div>';
    }
} 
/**
* post-footer显示上一篇
*
* @access public
* @param string
* @return void
*/
function post_footer_thePrev($widget){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
    ->where('table.contents.created < ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_DESC)
    ->limit(1);
    $content = $db->fetchRow($sql); 
    if ($content) {
    $content = $widget->filter($content);
    $content['title'] = cutstr($content['title'],8);
    $link = '<a href="' . $content['permalink'] . '" class="mdui-ripple mdui-color-theme mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left"><div class="doc-footer-nav-text"><i class="mdui-icon material-icons">arrow_back</i><span class="doc-footer-nav-direction mdui-hidden-xs-down">Previous</span><div class="doc-footer-nav-chapter mdui-hidden-xs-down">' . $content['title'] . '</div></div></a>';
    echo $link;
    } else {
    echo '<div class="mdui-col-xs-2 mdui-col-sm-6 doc-footer-nav-left"></div>';
    }
}

function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

//热门文章
function getHotPosts($limit = 10){
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
            echo '<div class="list-news-item"><div class="list-news-dot"></div><div class="list-news-body"><div class="list-news-content mt-2 pb-1"><div class="text-sm" id="news_title_4814"><a href="' .$permalink. '">' .$post_title. '</a></div><div class="text-xs text-muted my-1">' . $val['commentsNum'] . ' 评论</div></div></div></div>';        
        }
    }
}
/*
*<?php getRandomPosts($num);?>抽随机指定数量文章 
*/
function getRandomPosts($num) {
    $db = Typecho_Db::get();
    $adapterName = $db->getAdapterName();
    if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
      $orderBy = 'RANDOM()';
    } else {
      $orderBy = 'RAND()';
    }
    $sql = $db->select()->from('table.contents')->where('status = ?', 'publish')->where('table.contents.created <= ?', time())->where('type = ?', 'post')->limit($num)->order($orderBy);
    $result = $db->fetchAll($sql);
    if ($result) {
      foreach ($result as $val) {
        $obj = Typecho_Widget::widget('Widget_Abstract_Contents');
        $val = $obj->push($val);
        $title = htmlspecialchars($val['title']);
        $title = cutstr($title,10);
        $permalink = $val['permalink'];
        echo '<a class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple" href="' . $permalink . '"><i class="mdui-icon mdui-icon-right material-icons">&#xe5cc;</i>' . $title . '</a>';
      }
    }
  }
function getIndex() {
    if ($GLOBALS["index"]) {
        $index = '<ul class="index mdui-text-color-theme-accent">' . "\n";
        $current = 0;
        foreach ($GLOBALS["index"] as $item) {
            $indexDepth = $item["depth"];
            if (isset($parent)) {
                if ($indexDepth == $parent) {
                    $index .= '</li>' . "\n";
                } elseif ($indexDepth > $parent) {
                    $current++;
                    $index .= '<ul>' . "\n";
                } else {
                    $child = ($current > ($parent - $indexDepth)) ? ($parent - $indexDepth) : $current;
                    if ($child) {
                    for ($i = 0; $i < $child; $i++) {
                        $index .= '</li>' . "\n" . '</ul>' . "\n";
                        $current--;
                    }
                }
                    $index .= '</li>';
                }
            }
            $index .= '<li><a href="#' . $item["count"] . '-anchor">' . $item["text"] . '</a>';
            $parent = $item["depth"];
        }
        for ($i = 0; $i <= $current; $i++) {
            $index .= '</li>' . "\n" . '</ul>' . "\n";
        }
        echo $index;
    }
}