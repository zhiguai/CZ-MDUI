<?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
    include "mdui-colour.php";
?>

<div class="doc-footer-nav mdui-color-theme">
  <div class="mdui-container">
    <div class="mdui-row">
      <?php post_footer_thePrev($this); //上一页?>
      <?php post_footer_theNext($this); //下一页?>
    </div>
  </div>
</div>

<div class="mdui-dialog" id="dialog-docs-theme">
  <div class="mdui-dialog-title">设置文档主题</div>
  <div class="mdui-dialog-content">

    <p class="mdui-typo-title">主题色</p>
    <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-layout" <?php echo $docs_theme_layout_light ?> value="light" />
          <i class="mdui-radio-icon"></i>
          Light
        </label>
      </div>
      <div class="mdui-col">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-layout" <?php echo $docs_theme_layout_dark ?> value="dark" />
          <i class="mdui-radio-icon"></i>
          Dark
        </label>
      </div>
    </div>

    <p class="mdui-typo-title mdui-text-color-theme">主色</p>
    <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col mdui-text-color-amber">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_amber ?> value="amber" />
          <i class="mdui-radio-icon"></i>
          Amber
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_blue ?> value="blue" />
          <i class="mdui-radio-icon"></i>
          Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue-grey">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_bluegrey ?> value="blue-grey" />
          <i class="mdui-radio-icon"></i>
          Blue Grey
        </label>
      </div>
      <div class="mdui-col mdui-text-color-brown">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_brown ?> value="brown" />
          <i class="mdui-radio-icon"></i>
          Brown
        </label>
      </div>
      <div class="mdui-col mdui-text-color-cyan">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_cyan ?> value="cyan" />
          <i class="mdui-radio-icon"></i>
          Cyan
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_deeporange ?> value="deep-orange" />
          <i class="mdui-radio-icon"></i>
          Deep Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_deeppurple ?> value="deep-purple" />
          <i class="mdui-radio-icon"></i>
          Deep Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_green ?> value="green" />
          <i class="mdui-radio-icon"></i>
          Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-grey">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_grey ?> value="grey" />
          <i class="mdui-radio-icon"></i>
          Grey
        </label>
      </div>
      <div class="mdui-col mdui-text-color-indigo">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_indigo ?> value="indigo" />
          <i class="mdui-radio-icon"></i>
          Indigo
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_lightblue ?> value="light-blue" />
          <i class="mdui-radio-icon"></i>
          Light Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_lightgreen ?> value="light-green" />
          <i class="mdui-radio-icon"></i>
          Light Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-lime">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_lime ?> value="lime" />
          <i class="mdui-radio-icon"></i>
          Lime
        </label>
      </div>
      <div class="mdui-col mdui-text-color-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_orange ?> value="orange" />
          <i class="mdui-radio-icon"></i>
          Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-pink">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_pink ?> value="pink" />
          <i class="mdui-radio-icon"></i>
          Pink
        </label>
      </div>
      <div class="mdui-col mdui-text-color-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_purple ?> value="purple" />
          <i class="mdui-radio-icon"></i>
          Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-red">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_red ?> value="red" />
          <i class="mdui-radio-icon"></i>
          Red
        </label>
      </div>
      <div class="mdui-col mdui-text-color-teal">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_teal ?> value="teal" />
          <i class="mdui-radio-icon"></i>
          Teal
        </label>
      </div>
      <div class="mdui-col mdui-text-color-yellow">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" <?php echo $docs_theme_primary_yellow ?> value="yellow" />
          <i class="mdui-radio-icon"></i>
          Yellow
        </label>
      </div>
    </form>

    <p class="mdui-typo-title mdui-text-color-theme-accent">强调色</p>
    <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col mdui-text-color-amber">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_amber ?> value="amber" />
          <i class="mdui-radio-icon"></i>
          Amber
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_blue ?> value="blue" />
          <i class="mdui-radio-icon"></i>
          Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-cyan">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_cyan ?> value="cyan" />
          <i class="mdui-radio-icon"></i>
          Cyan
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_deeporange ?> value="deep-orange" />
          <i class="mdui-radio-icon"></i>
          Deep Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_deeppurple ?> value="deep-purple" />
          <i class="mdui-radio-icon"></i>
          Deep Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_green ?> value="green" />
          <i class="mdui-radio-icon"></i>
          Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-indigo">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_indigo ?> value="indigo" />
          <i class="mdui-radio-icon"></i>
          Indigo
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_lightblue ?> value="light-blue" />
          <i class="mdui-radio-icon"></i>
          Light Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_lightgreen ?> value="light-green" />
          <i class="mdui-radio-icon"></i>
          Light Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-lime">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_lime?> value="lime" />
          <i class="mdui-radio-icon"></i>
          Lime
        </label>
      </div>
      <div class="mdui-col mdui-text-color-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_orange ?> value="orange" />
          <i class="mdui-radio-icon"></i>
          Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-pink">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_pink ?> value="pink" />
          <i class="mdui-radio-icon"></i>
          Pink
        </label>
      </div>
      <div class="mdui-col mdui-text-color-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_purple ?> value="purple" />
          <i class="mdui-radio-icon"></i>
          Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-red">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_red ?> value="red" />
          <i class="mdui-radio-icon"></i>
          Red
        </label>
      </div>
      <div class="mdui-col mdui-text-color-teal">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_teal ?> value="teal" />
          <i class="mdui-radio-icon"></i>
          Teal
        </label>
      </div>
      <div class="mdui-col mdui-text-color-yellow">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" <?php echo $docs_theme_accent_yellow ?> value="yellow" />
          <i class="mdui-radio-icon"></i>
          Yellow
        </label>
      </div>
    </form>

  </div>
  <div class="mdui-divider"></div>
  <div class="mdui-dialog-actions">
    <button class="mdui-btn mdui-ripple mdui-float-left" mdui-dialog-cancel>恢复默认主题</button>
    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>ok</button>
  </div>
</div>

<script src="<?php $this->options->themeUrl('mdui/smooth-scroll-11.1.0/smooth-scroll.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('mdui/holder-2.9.4/holder.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('mdui/highlight-9.12.0/highlight.pack.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('mdui/mdui-v0.4.3/js/mdui.min.js'); ?>"></script>
<script>
  var $$ = mdui.JQ;
/**
 * 设置文档主题
 */
  var DEFAULT_PRIMARY_PHP = '<?php echo $docs_theme_default_primary; ?>';
  var DEFAULT_ACCENT_PHP = '<?php echo $docs_theme_default_accent; ?>';
  var DEFAULT_LAYOUT_PHP = '<?php echo $docs_theme_default_layout; ?>';
</script>
<script src="<?php $this->options->themeUrl('mdui/docs/js/docs.js'); ?>"></script>
</html>