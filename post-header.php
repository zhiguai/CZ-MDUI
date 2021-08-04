<?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    include "mdui-colour.php";
?>

<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="<?php $this->options->charset(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <title><?php $this->archiveTitle(array(
          'category'  =>  _t('分类 %s 下的文章'),
          'search'    =>  _t('包含关键字 %s 的文章'),
          'tag'       =>  _t('标签 %s 下的文章'),
          'author'    =>  _t('%s 发布的文章')
      ), '', ' - '); ?><?php $this->options->title(); ?>
  </title>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('mdui/mdui-v0.4.3/css/mdui.min.css'); ?>"/>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('mdui/highlight-9.12.0/styles/github-gist.css'); ?>"/>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('mdui/highlight-9.12.0/styles/railscasts.css'); ?>"/>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('mdui/docs/css/docs.css'); ?>"/>
  <link href="<?php $this->options->themeUrl('mdui/index/css/style.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php $this->options->themeUrl('mdui/index/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
  
  <?php if ($this->options->IconlogoUrl): ?>
    <link rel="icon" href="<?php $this->options->IconlogoUrl() ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php $this->options->IconlogoUrl() ?>" type="image/x-icon"/>
  <?php else: ?>
    <link rel="icon" href="https://z3.ax1x.com/2021/07/29/Wbvyzq.png" type="image/x-icon" />
    <link rel="shortcut icon" href="https://z3.ax1x.com/2021/07/29/Wbvyzq.png" type="image/x-icon"/>
  <?php endif; ?>
  <style>
  /* 头部壁纸 */
  .main-section {
      background: url(<?php echo img_postthemb($this,$this->options->imgHead)?>) no-repeat center;
      /*background: url() 50% 17vh no-repeat; */
      background-size: cover;
  }
  </style>
  <!-- Matomo -->
  <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//matomo.fatda.cn/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '4']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
  <!--[if lt IE 9]>
  <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
  <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
  <!-- 通过自有函数输出HTML头部信息 -->
  <?php $this->header(); ?>
</head>

<body class="mdui-appbar-with-toolbar  
mdui-theme-primary-<?php echo $docs_theme_primary; ?> 
mdui-theme-accent-<?php echo $docs_theme_accent; ?> 
mdui-theme-layout-<?php echo $docs_theme_layout; ?>
<?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowState2', $this->options->HeeaderShow)): ?>
  mdui-drawer-body-left
<?php endif; ?>
">
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
    <a href="/" class="mdui-typo-headline mdui-hidden-xs"><?php echo $this->options->title();?></a>
    <div class="mdui-toolbar-spacer"></div>
    
    <?php if (!empty($this->options->HeaderTopPostShow) && in_array('HeaderTopPostShowBut1', $this->options->HeaderTopPostShow)): ?>
      <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-dialog="{target: '#dialog-docs-theme'}" mdui-tooltip="{content: '设置主题'}"><i class="mdui-icon material-icons">color_lens</i></span>
    <?php endif; ?>

    <?php if (!empty($this->options->HeaderTopPostShow) && in_array('HeaderTopPostShowBut2', $this->options->HeaderTopPostShow)): ?>
    <span style="clear:margin-left;" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white mdui-hidden-xs" mdui-tooltip="{content: '二维码'}" mdui-menu="{target: '#example-attr'}"><i class="mdui-icon material-icons">&#xe1b1;</i></span>
    <ul class="mdui-menu" id="example-attr">
      <img class="mdui-img-fluid" src="<?php $this->options->themeUrl('poster/api.php?url='); ?><?php $this->options->siteUrl(''); ?>"/>
    </ul>
    <?php endif; ?>

    <?php if (!empty($this->options->HeaderTopPostShow) && in_array('HeaderTopPostShowBut3', $this->options->HeaderTopPostShow)): ?>
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white mdui-hidden-xs" mdui-tooltip="{content: 'RSS'}" mdui-menu="{target: '#example-attr1'}"><i class="mdui-icon material-icons">&#xe0e5;</i></span>
    <ul class="mdui-menu" id="example-attr1">
      <li class="mdui-menu-item"><a href="<?php $this->options->feedUrl(); ?>" target="_blank" class="mdui-ripple"><?php _e('文章 RSS'); ?></a></li>
      <li class="mdui-menu-item"><a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank" class="mdui-ripple"><?php _e('评论 RSS'); ?></a></li>
    </ul>
    <?php endif; ?>

    <?php if (!empty($this->options->HeaderTopPostShow) && in_array('HeaderTopPostShowBut4', $this->options->HeaderTopPostShow)): ?>
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '分享'}" mdui-menu="{target: '#example-attr2'}"><i class="mdui-icon material-icons">share</i></span>
    <ul class="mdui-menu" id="example-attr2">
      <li class="mdui-menu-item"><a href="http://connect.qq.com/widget/shareqq/index.html?site=<?php echo $this->options->title();?>&amp;title=<?php $this->title(); ?>&amp;summary=<?php $this->commentsNum('%d'); ?>&amp;pics=<?php echo img_postthemb($this,'https://z3.ax1x.com/2021/07/27/WhYQZd.png')?>&amp;url=<?php $this->permalink() ?>" target="_blank" class="mdui-ripple">分享到 QQ</a></li>
      <li class="mdui-menu-item"><a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&amp;title=<?php $this->title(); ?>&amp;content=utf-8" target="_blank" class="mdui-ripple">分享到 QQ空间</a></li>
      <li class="mdui-menu-item"><a href="https://telegram.me/share/url?url=<?php $this->permalink() ?>&amp;text=<?php $this->title(); ?>" target="_blank" class="mdui-ripple">分享到 微博</a></li>
      <li class="mdui-menu-item"><a href="https://telegram.me/share/url?url=<?php $this->permalink() ?>&amp;text=<?php $this->title(); ?>" target="_blank" class="mdui-ripple">分享到 Telegram</a></li>
      <li class="mdui-menu-item"><a href="https://www.facebook.com/sharer.php?u=<?php $this->permalink() ?>" target="_blank" class="mdui-ripple">分享到 Facebook</a></li>
      <li class="mdui-menu-item"><a href="https://twitter.com/intent/tweet?text=<?php $this->title(); ?>&amp;url=<?php $this->permalink() ?>" target="_blank" class="mdui-ripple">分享到 Twitter</a></li>
    </ul>
    <?php endif; ?>
  </div>
</header>

<div class="mdui-drawer 
<?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowState2', $this->options->HeeaderShow)): ?>
  mdui-drawer
<?php else: ?>
  mdui-drawer-close
<?php endif; ?>
" id="main-drawer">
    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowLogo', $this->options->HeeaderShow)): ?>
      <?php if ($this->options->SidebarlogoUrl): ?>
        <div class="mdui-list"  mdui-collapse="{accordion: true}" style="margin-bottom: 76px; padding: 0px 0;">
        <img class="mdui-img-fluid" src="<?php $this->options->SidebarlogoUrl(); ?>"/>
      <?php else: ?>
        <div class="mdui-list"  mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <img class="mdui-img-fluid" src="<?php $this->options->themeUrl('img/music_search_empty.png'); ?>"/>
      <?php endif; ?>
    <?php else: ?>
        <div class="mdui-list"  mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
    <?php endif; ?>

    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowIndex', $this->options->HeeaderShow)): ?>
      <!-- 首页 -->
      <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
        <li class="mdui-list-item mdui-ripple">
          <i class="mdui-list-item-icon mdui-icon material-icons">&#xe88a;</i>
          <div class="mdui-list-item-content"><?php _e('主页'); ?></div>
        </li>
      </a>
    <?php endif; ?>

    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowPage', $this->options->HeeaderShow)): ?>
      <!-- 单页循环 -->
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while($pages->next()): ?>
      <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
        <li class="mdui-list-item mdui-ripple">
          <i class="mdui-list-item-icon mdui-icon material-icons">&#xe02f;</i>
          <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
        </li>
      </a>
      <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowCategory', $this->options->HeeaderShow)): ?>
      <li class="mdui-divider"></li>
      <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">&#xe431;</i>
          <div class="mdui-list-item-content"><?php _e('分类'); ?></div>
          <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
        </div>
        <div class="mdui-collapse-item-body mdui-list">
          <!-- 分类循环 -->
          <?php $this->widget('Widget_Metas_Category_List')->parse('<a class="mdui-list-item mdui-ripple" href="{permalink}">{name}({count})</a>'); ?>
        </div>
      </div>
    <?php else: ?>
      <li class="mdui-divider"></li>
    <?php endif; ?>

    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowArchive', $this->options->HeeaderShow)): ?>
      <div class="mdui-collapse-item ">
        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">&#xe226;</i>
          <div class="mdui-list-item-content"><?php _e('归档'); ?></div>
          <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
        </div>
        <div class="mdui-collapse-item-body mdui-list">
          <!-- 归档循环 -->
          <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a class="mdui-list-item mdui-ripple" href="{permalink}">{date}</a>'); ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($this->options->HeeaderShow) && in_array('HeeaderShowOther', $this->options->HeeaderShow)): ?>
      <li class="mdui-divider"></li>
      <div class="mdui-collapse-item ">

        <?php if($this->user->hasLogin()): ?>
        <a href="<?php $this->options->adminUrl(); ?>">
          <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe853;</i>
            <div class="mdui-list-item-content"><?php _e('进入后台'); ?>(<?php $this->user->screenName(); ?>)</div>
          </li>
        </a>

        <a href="<?php $this->options->logoutUrl(); ?>">
          <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe8c6;</i>
            <div class="mdui-list-item-content"><?php _e('退出登入'); ?></div>
          </li>
        </a>
        <?php else: ?>
        
        <a href="<?php $this->options->adminUrl('login.php'); ?>">
          <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe8ac;</i>
            <div class="mdui-list-item-content"><?php _e('登入'); ?></div>
          </li>
        </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
 
  </div>
</div>

<a id="anchor-top"></a>

<div class="main-section mdui-color-theme header-dark">
		<div class="mdui-container">
			<div class="logo-container">
        <br><br><br><br><br><br><br><br><br><br>
				<h1><?php $this->title() ?></h1>
				<h4><?php $this->date('F j, Y'); ?></h4>
        <br><br><br><br><br><br><br><br><br><br><br>
				<div class="link_group">
					
					<span class="link_single">
            <i class="mdui-icon material-icons">&#xe853;</i> <a href="#" rel="nofollow" class="main-meta-btn"><?php $this->author() ?></a>
					</span>
					<span class="link_single">
            <i class="mdui-icon material-icons">&#xe8f4;</i> <a href="#" rel="nofollow" class="main-meta-btn"><?php get_post_view($this) ?></a>
					</span>
					<span class="link_single">
            <i class="mdui-icon material-icons">&#xe0b7;</i> <a href="#" rel="nofollow" class="main-meta-btn"><?php $this->commentsNum() ?></a>
					</span>
				</div>
			</div>
		</div>
</div>