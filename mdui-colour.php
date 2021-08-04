<?php
/*
 * @Description: 
 * @Autor: 吃纸怪
 * @QQ: 2903074366
 * @Email: 2903074366@qq.com
 * @QQgroup: 801235342
 * @Github: https://github.com/zhiguai
 */
    //默认配色设置
    if (!empty($this->options->primaryColor)){
        $docs_theme_default_primary = $this->options->primaryColor;//主色
    } else {
        $docs_theme_default_primary = "indigo";//主色
    }
    
    if (!empty($this->options->accentColor)){
        $docs_theme_default_accent = $this->options->accentColor;//强调色
    } else {
        $docs_theme_default_accent = "pink";//强调色
    }
    
    if (!empty($this->options->layoutColor)){
        if($this->options->layoutColor == "now"){
            $h = date('H');
            if($h>=6 && $h<=20){
                $docs_theme_default_layout = "light";//主题色
            }else{
                $docs_theme_default_layout = "dark";//主题色
            }
        } else {
            $docs_theme_default_layout = $this->options->layoutColor;//主题色
        }
    } else {
        $docs_theme_default_layout = "light";//主题色
    }
    

    //获取COOKIE参数
    if($_COOKIE["docs-theme-layout"] != $docs_theme_default_layout && $_COOKIE["docs-theme-layout"] != ""){$docs_theme_layout = $_COOKIE["docs-theme-layout"];}else{$docs_theme_layout = $docs_theme_default_layout;}
    if($_COOKIE["docs-theme-accent"] != $docs_theme_default_accent && $_COOKIE["docs-theme-accent"] != ""){$docs_theme_accent = $_COOKIE["docs-theme-accent"];}else{$docs_theme_accent = $docs_theme_default_accent;}
    if($_COOKIE["docs-theme-primary"] != $docs_theme_default_primary && $_COOKIE["docs-theme-primary"] != ""){$docs_theme_primary = $_COOKIE["docs-theme-primary"];}else{$docs_theme_primary = $docs_theme_default_primary;}

    //调色盘主题色判断checked
    if($docs_theme_layout == "light"){$docs_theme_layout_light = "checked";}
    if($docs_theme_layout == "dark"){$docs_theme_layout_dark = "checked";}

    //调色盘强调色判断checked
    if($docs_theme_accent == "amber"){$docs_theme_accent_amber = "checked";}
    if($docs_theme_accent == "blue"){$docs_theme_accent_blue = "checked";}
    if($docs_theme_accent == "cyan"){$docs_theme_accent_cyan = "checked";}
    if($docs_theme_accent == "deep-orange"){$docs_theme_accent_deeporange = "checked";}
    if($docs_theme_accent == "deep-purple"){$docs_theme_accent_deeppurple = "checked";}
    if($docs_theme_accent == "green"){$docs_theme_accent_green = "checked";}
    if($docs_theme_accent == "indigo"){$docs_theme_accent_indigo = "checked";}
    if($docs_theme_accent == "light-blue"){$docs_theme_accent_lightblue = "checked";}
    if($docs_theme_accent == "light-green"){$docs_theme_accent_lightgreen = "checked";}
    if($docs_theme_accent == "lime"){$docs_theme_accent_lime = "checked";}
    if($docs_theme_accent == "orange"){$docs_theme_accent_orange = "checked";}
    if($docs_theme_accent == "pink"){$docs_theme_accent_pink = "checked";}
    if($docs_theme_accent == "purple"){$docs_theme_accent_purple = "checked";}
    if($docs_theme_accent == "red"){$docs_theme_accent_red = "checked";}
    if($docs_theme_accent == "teal"){$docs_theme_accent_teal = "checked";}
    if($docs_theme_accent == "yellow"){$docs_theme_accent_yellow = "checked";}

    //调色盘主色判断checked
    if($docs_theme_primary == "amber"){$docs_theme_primary_amber = "checked";}
    if($docs_theme_primary == "blue"){$docs_theme_primary_blue = "checked";}
    if($docs_theme_primary == "blue-grey"){$docs_theme_primary_bluegrey = "checked";}
    if($docs_theme_primary == "brown"){$docs_theme_primary_brown = "checked";}
    if($docs_theme_primary == "cyan"){$docs_theme_primary_cyan = "checked";}
    if($docs_theme_primary == "deep-orange"){$docs_theme_primary_deeporange = "checked";}
    if($docs_theme_primary == "deep-purple"){$docs_theme_primary_deeppurple = "checked";}
    if($docs_theme_primary == "green"){$docs_theme_primary_green = "checked";}
    if($docs_theme_primary == "grey"){$docs_theme_primary_grey = "checked";}
    if($docs_theme_primary == "indigo"){$docs_theme_primary_indigo = "checked";}
    if($docs_theme_primary == "light-blue"){$docs_theme_primary_lightblue = "checked";}
    if($docs_theme_primary == "light-green"){$docs_theme_primary_lightgreen = "checked";}
    if($docs_theme_primary == "lime"){$docs_theme_primary_lime = "checked";}
    if($docs_theme_primary == "orange"){$docs_theme_primary_orange = "checked";}
    if($docs_theme_primary == "pink"){$docs_theme_primary_pink = "checked";}
    if($docs_theme_primary == "purple"){$docs_theme_primary_purple = "checked";}
    if($docs_theme_primary == "red"){$docs_theme_primary_red = "checked";}
    if($docs_theme_primary == "teal"){$docs_theme_primary_teal = "checked";}
    if($docs_theme_primary == "yellow"){$docs_theme_primary_yellow = "checked";}
?>