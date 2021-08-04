<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('post-header.php'); ?>

<div class="mdui-container">
    <div class="mdui-row  doc-container">
        <div class="mdui-card">

            <!-- 卡片的标题和副标题 -->
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title mdui-text-color-theme"><?php $this->title() ?></div>
                <div class="mdui-card-primary-subtitle mdui-typo">
                    <?php $this->date('Y年m月d日'); ?>
                </div>
                <div class="mdui-divider"></div>  
            </div>


            <!-- 卡片的内容 -->
            <div class="mdui-card-content">
                <div class="mdui-typo">
                    <!--判断文章是否加密-->
                    <?php if($this->hidden||$this->titleshow): ?>
                    <!--如果加密，输出自定义的表单格式-->
                    <form method="post" action="<?php echo Typecho_Widget::widget('Widget_Security')->getTokenUrl($this->permalink); ?>">
                        <div class="mdui-col-xs-8 mdui-col-sm-10">
                            <div class="mdui-textfield">
                                <i class="mdui-icon material-icons">&#xe899;</i>
                                <input  type="password" class="mdui-textfield-input" name="protectPassword" class="form-control" placeholder="请输入密码" aria-label="请输入密码">
                                <input type="hidden" name="protectCID" value="<?php $this->cid(); ?>" />
                            </div>
                        </div>
                        <div class="mdui-col-xs-4 mdui-col-sm-2 mdui-text-center mdui-float-right">
                            <button type="submit" class="mdui-m-y-2 mdui-btn mdui-btn-raised mdui-color-theme-accent">解 锁</button>
                        </div>
                        <br><br><br>
                    </form>
                    <?php else: ?>
                    <!--如果未加密，输出文章内容-->
                    <?php getIndex(); ?>
                    <?php $this->content(); ?> 
                    <?php endif;?>
                </div>
            </div>

            <!-- 内容卡2 -->

            <div class="mdui-card mdx-say-after header-dark-mdx1">
                <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="128" height="128">
                    <path d="M512 106.7a405.3 405.3 0 110 810.6 405.3 405.3 0 010-810.6zm0 85.3a320 320 0 100 640 320 320 0 000-640zm42.7 277.3V704h-85.4V469.3h85.4zM512 298.7a47 47 0 110 93.8 47 47 0 010-93.8z"></path>
                </svg>
                <div class="mdui-card-actions mdui-typo">
                    本文链接：<a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a><br> 
                    <?php if ($this->options->$PostAgreement): ?>
                        <?php $this->options->$PostAgreement(); ?>                            
                    <?php endif; ?>
                </div>
            </div>

            <div class="spanout mdui-typo header-dark-mdx2">

                <i class="mdui-icon material-icons">&#xe54e;</i>
                    <?php $this->tags('  #', true, 'none'); ?>
                <div class="mdui-divider"></div>

                <div itemscope="" itemtype="http://schema.org/WebPage" id="crumbs">
                    <?php if($this->is('index')):?><!-- 页面首页时 -->
                        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> &gt;	
                    <?php elseif ($this->is('post')): ?><!-- 页面为文章单页时 -->
                        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> &gt; <?php $this->category(); ?> &gt; <?php $this->title(); ?>
                    <?php else: ?><!-- 页面为其他页时 -->
                        <a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">首页</a> &gt; <?php $this->archiveTitle(' &raquo; ','',''); ?>
                    <?php endif; ?>
                </div>
            </div>
            </div><br>
        <?php $this->need('comments.php'); ?>
    </div>
</div>

<?php $this->need('footer.php'); ?>
