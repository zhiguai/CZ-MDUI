<?php
/**
 * 一款基于MDUI打造的极简风格Typecho模板，作者博客<a href="//chizg.cn">chizg.cn</a>，邮箱：2903074366@qq.com，更多联系方式在博客，有问题可以到博客留言哦！还有这是作者的Github[<a href="//github.com/zhiguai">github.com/zhiguai</a>]也可以关注一下哦！
 * 
 * @package CZMDUI
 * @author 吃纸怪
 * @version 1.0.0
 * @link http://chizg.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('header.php');
?>

<div class="mdui-container doc-container doc-no-cover">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentSearch', $this->options->sidebarBlock)): ?>
        <form method="post" action="<?php $this->options->siteUrl(); ?>">

        <div class="mdui-card">
            <div class="mdui-card-media">
                <?php if (!empty($this->options->PostShow) && in_array('PostShowCatoon', $this->options->PostShow)): ?>
                    <img src="<?php $this->options->themeUrl('img/rand/3.png'); ?>"/>  
                <?php endif; ?>
                <div class="mdui-col-xs-8 mdui-col-sm-10">
                    <div class="mdui-textfield">
                        <i class="mdui-icon material-icons">search</i>
                        <input class="mdui-textfield-input"  name="s" type="search" placeholder="search"/>
                    </div>
                </div>
                <div class="mdui-col-xs-4 mdui-col-sm-2 mdui-text-center mdui-float-right">
                    <button type="submit" class="mdui-m-y-2 mdui-btn mdui-btn-raised mdui-color-theme-accent">搜 索</button>
                </div>
            </div>
        </div><br>
        </form>
    <?php endif; ?>

    <div class="doc-chapter">

    <!-- 判断文章存在 -->
    <?php if ($this->have()): ?>
        <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3 mdui-row-lg-3">
        <!-- 文章循环 -->
        <?php while($this->next()): ?>
        <div class="mdui-col mdui-m-b-1">
            <div class="mdui-card">

            <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
            <!-- img_postthemb($this,$this->options->imgHead) -->
            <div class="mdui-card-media">
                <a href="<?php $this->permalink() ?>">
                    <div class="main-section-card" 
                        style="background: url(<?php echo img_postthemb($this,"")?>) no-repeat center;
                                background-size: cover;
                                padding-top: 80px !important;
                                padding-bottom: 80px !important;">  
                    </div>
                </a>
            </div>

            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><?php $this->title(12, '...') ?></div>
                <div class="mdui-card-primary-subtitle mdui-typo">
                [<?php $this->category(','); ?>]-[<?php $this->author(); ?>]-[<?php $this->date('F j, Y'); ?>]
                </div>
            </div>

            <!-- 卡片的内容 -->
            <div class="mdui-card-content"><?php $this->excerpt(20, '...');?></div>

            <!-- 卡片的按钮 -->
            <div class="mdui-card-actions">
                <div class="mdui-chip mdui-typo">
                    <span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">&#xe0b7;</i></span>
                    <span class="mdui-chip-title"><a href="<?php $this->permalink(); ?>#comments"><?php $this->commentsNum('%d'); ?></a></span>
                </div>
                <a href="<?php $this->permalink() ?>">
                    <button class="mdui-btn mdui-ripple mdui-text-color-theme-accent mdui-float-right">继续阅读</button>
                </a>
            </div>

            </div>
        </div>
        <?php endwhile; ?>
        </div>

        <br><br><br><br>
        <div class="mdui-row mdui-text-center">
            <div class="mdui-btn-group">
                <?php $this->pageLink(' <button type="button" class="mdui-btn  mdui-color-theme-accent"><i class="mdui-icon material-icons">&#xe5cb;</i></button>'); ?>
                <button type="button" class="mdui-btn mdui-color-theme-accent"><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></button>
                <?php $this->pageLink('<button type="button" class="mdui-btn mdui-color-theme-accent"><i class="mdui-icon material-icons">&#xe5cc;</i></button>','next'); ?>
                <!--<button type="button" class="mdui-btn">
                <i class="mdui-icon material-icons">format_align_left</i>
                </button>-->
            </div>
        </div>
        <?php else: ?>
        <div class="mdui-card">
            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary mdui-text-color-theme">
                <div class="mdui-card-primary-title">无查询结果</div>
                <div class="mdui-card-primary-subtitle">No query results</div>
                <div class="mdui-divider"></div>
            </div>
            <!-- 卡片的内容 -->
            <div class="mdui-card-content">
                <div class="mdui-row-xs-1">
                    <img class="mdui-img-fluid mdui-float-right" src="<?php $this->options->themeUrl('img/img_tips_error_not_foud.png'); ?>">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
            <div class="mdui-typo">
                <h4 class="doc-article-title">最新文章</h4>
            </div>
            <!-- 最新文章循环 -->
            <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3 mdui-row-lg-4">
                <?php $this->widget('Widget_Contents_Post_Recent')->parse('<div class="mdui-col mdui-m-b-1"><a href="{permalink}" class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple">{title}</a></div>'); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
            <div class="mdui-typo">
                <h4 class="doc-article-title">最新评论</h4>
            </div>
            <!-- 最新评论循环 -->
            <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3 mdui-row-lg-4">
                <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                <?php while($comments->next()): ?>
                    <div class="mdui-col mdui-m-b-1">
                        <a href="<?php $comments->permalink(); ?>" class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple"><?php $comments->author(false); ?>：<?php $comments->excerpt(10, '[...]'); ?></a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentTags', $this->options->sidebarBlock)): ?>
            
            <div class="mdui-typo">
                <h4 class="doc-article-title">标签</h4>
            </div>
            <!-- 最新评论循环 -->
            <div class="mdui-row-xs-2 mdui-row-sm-3 mdui-row-md-4 mdui-row-lg-5">
                <?php $this->widget('Widget_Metas_Tag_Cloud')->to($taglist); ?>
                <?php while($taglist->next()): ?>
                    <div class="mdui-col mdui-m-b-1">
                        <a href="<?php $taglist->permalink(); ?>" title="<?php $taglist->name(); ?>" class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple"><?php $taglist->name(); ?></a>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

    </div>
</div>

<?php $this->need('footer.php'); ?>