<?php
get_header();

// 引入首页顶部轮播模块
$home_slide = cx_option('slide');
if( $home_slide != 'none' ){
    get_template_part( 'template/home/home', 'slide-'.$home_slide );
}

// 引入首页DIY推荐位
if( cx_switcher('home-custom') ){
    get_template_part( 'template/home/home', 'custom' );
}

// 引入热点推荐模块
$list_style = cx_option('list-style','blog');
get_template_part( 'template/home/home', $list_style == 'fillgrid' ? 'fillgrid' : 'bloglist' );

do_action('xhtheme_home_after');

get_footer();
