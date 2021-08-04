<div class="mdui-card">
    <!-- 卡片的标题和副标题 -->
    <div class="mdui-card-primary mdui-text-color-theme">
        <div class="mdui-card-primary-title">猜你喜欢</div>
        <div class="mdui-card-primary-subtitle">Guess you like it</div>
        <div class="mdui-divider"></div>
    </div>
    <!-- 卡片的内容 -->
    <div class="mdui-card-content">
        <div class="mdui-row-xs-1">
            <?php getRandomPosts(5);?>
        </div>
    </div>
</div>
<br>

<div class="mdui-card">
    <!-- 卡片的标题和副标题 -->
    <div class="mdui-card-primary mdui-text-color-theme">
        <div class="mdui-card-primary-title">最新文章</div>
        <div class="mdui-card-primary-subtitle">Latest article</div>
        <div class="mdui-divider"></div>
    </div>
    <!-- 卡片的内容 -->
    <div class="mdui-card-content">
        <div class="mdui-row-xs-1">
            <?php $this->widget('Widget_Contents_Post_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <div class="mdui-col mdui-m-b-1">
                <a href="<?php $comments->permalink(); ?>" class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple"><i class="mdui-icon mdui-icon-right material-icons">&#xe5cc;</i><?php $comments->title(15, '...'); ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<br>

<div class="mdui-card">
    <!-- 卡片的标题和副标题 -->
    <div class="mdui-card-primary mdui-text-color-theme">
        <div class="mdui-card-primary-title">最新评论</div>
        <div class="mdui-card-primary-subtitle">Latest comments</div>
        <div class="mdui-divider"></div>
    </div>
    <!-- 卡片的内容 -->
    <div class="mdui-card-content">
        <div class="mdui-row-xs-1">
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <div class="mdui-col mdui-m-b-1">
                <a href="<?php $comments->permalink(); ?>" class="mdui-btn mdui-btn-block mdui-text-left mdui-ripple"><span class="mdui-text-color-theme-accent"><?php $comments->author(false); ?></span>：<?php $comments->excerpt(10, '...'); ?></a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<br>