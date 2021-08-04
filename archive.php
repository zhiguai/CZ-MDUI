<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('archive-header.php'); ?>

<div class="mdui-container">

    <!-- 在超小屏幕设备上，第一列 100% 宽度，第二列 50% 宽度。在小屏幕及以上设备上，第一列为 66.6% 宽度，第二列为 33.3% 宽度。 -->
    <div class="mdui-row  doc-container">
        <div class="mdui-col-xs-12 mdui-col-sm-9">
            <!-- 内容卡 -->

            <!-- 判断文章存在 -->
            <?php if ($this->have()): ?>
            <div class="mdui-row-xs-1 mdui-row-sm-1 mdui-row-md-2 mdui-row-lg-3">
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
                            <div class="mdui-chip">
                                <span class="mdui-chip-icon mdui-color-theme-accent"><i class="mdui-icon material-icons">&#xe0b7;</i></span>
                                <span class="mdui-chip-title"><?php $this->commentsNum('%d'); ?></span>
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
                <form method="post" action="<?php $this->options->siteUrl(); ?>">
                    <div class="mdui-card">
                        <div class="mdui-card-media">
                            <?php if (!empty($this->options->PostShow) && in_array('PostShowCatoon', $this->options->PostShow)): ?>
                                <img src="<?php $this->options->themeUrl('img/rand/3.png'); ?>"/>  
                            <?php endif; ?>
                            <div class="mdui-col-xs-8 mdui-col-sm-9">
                                <div class="mdui-textfield">
                                    <i class="mdui-icon material-icons">search</i>
                                    <input class="mdui-textfield-input" name="s" type="search" placeholder="search"/>
                                </div>
                            </div>
                            <div class="mdui-col-xs-4 mdui-col-sm-3 mdui-text-center mdui-float-right">
                                <button type="submit" class="mdui-m-y-2 mdui-btn mdui-btn-raised mdui-color-theme-accent">搜 索</button>
                            </div>
                        </div>
                    </div><br>
                </form>

                <div class="mdui-card">
                    <!-- 卡片的标题和副标题 -->
                    <div class="mdui-card-primary mdui-text-color-theme">
                        <div class="mdui-card-primary-title">无查询结果</div>
                        <div class="mdui-card-primary-subtitle">No query results</div>
                        <div class="mdui-divider"></div>
                    </div>
                    <?php if (!empty($this->options->PostShow) && in_array('PostShowCatoon', $this->options->PostShow)): ?>
                    <!-- 卡片的内容 -->
                    <div class="mdui-card-content">
                        <div class="mdui-row-xs-1">
                            <img class="mdui-img-fluid mdui-float-right" src="<?php $this->options->themeUrl('img/img_tips_error_not_foud.png'); ?>">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <br>
        </div>

        <div class="mdui-col-xs-12 mdui-col-sm-3">
            <?php $this->need('archive-sidebar.php'); ?>
        </div>
    </div>

</div>

<?php $this->need('footer.php'); ?>
