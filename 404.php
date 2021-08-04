<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('archive-header.php'); ?>

<div class="mdui-container">

    <!-- 在超小屏幕设备上，第一列 100% 宽度，第二列 50% 宽度。在小屏幕及以上设备上，第一列为 66.6% 宽度，第二列为 33.3% 宽度。 -->
    <div class="mdui-row  doc-container">

        <div class="mdui-col-xs-12 mdui-col-sm-9">
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
            

            <!-- 内容卡 -->
            <div class="mdui-card">
                <!-- 卡片的标题和副标题 -->
                <div class="mdui-card-primary mdui-text-color-theme">
                    <div class="mdui-card-primary-title">页面不存在 404</div>
                    <div class="mdui-card-primary-subtitle">Page does not exist</div>
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
            <br>
        </div>

        <div class="mdui-col-xs-12 mdui-col-sm-3">
            <?php $this->need('archive-sidebar.php'); ?>
        </div>
    </div>

</div>

<?php $this->need('footer.php'); ?>
