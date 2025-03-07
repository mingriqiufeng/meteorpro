<?php
if (!defined('CX_THEMES_NAME'))     define('CX_THEMES_NAME', 'meteor' );
if (!defined('CX_THEMES_VERSION'))  define('CX_THEMES_VERSION', '2.7.2' );
if (!defined('CX_THEMES_VERIFY'))   define('CX_THEMES_VERIFY', '8faf9f198d7341' );
if (!defined('CX_WPCODE_CERSION'))  define('CX_WPCODE_CERSION', 15.9 );
if (!defined('CX_EXTEND_DEPEND'))   define('CX_EXTEND_DEPEND', 'optimize-extend,webseo-extend,userlogin-extend,usercenter-extend' );
if (!defined('CX_fONTICON'))        define('CX_fONTICON', '//at.alicdn.com/t/c/font_1989294_jp814gauov.css' );

// 授权
require_once get_theme_file_path('inc/theme-option.php'); // 主题公共函数
require_once get_theme_file_path('classes/class-cxtheme-wpdb.php');
require_once get_theme_file_path('admin/classes/setup.class.php');
require_once get_theme_file_path('admin/classes/extend-data.class.php');
require_once get_theme_file_path('inc/core/index.php');
require_once get_theme_file_path('admin/classes/extend-setup.class.php');

require_once get_theme_file_path('classes/class-cxtheme-theme.php');    // 主题类
require_once get_theme_file_path('classes/class-cxtheme-post.php');     // 主题通用类
require_once get_theme_file_path('classes/class-cxtheme-comment.php');  // 评论类
require_once get_theme_file_path('classes/class-cxtheme-setup.php');    // 主题通用类
require_once get_theme_file_path('classes/class-cxtheme-power.php');    // 文章权限模块
require_once get_theme_file_path('classes/class-cxtheme-download.php'); // 下载模块
require_once get_theme_file_path('classes/class-cxtheme-blocks.php');   // Blocks块
require_once get_theme_file_path('blocks/cxtheme-blocks.php');          // Blocks块

// 核心支持类
require_once get_theme_file_path('classes/class-cxtheme-order.php');
require_once get_theme_file_path('classes/class-cxtheme-template.php');   // 模版类
require_once get_theme_file_path('classes/class-cxtheme-userData.php');   // 用户类
require_once get_theme_file_path('classes/class-cxtheme-content.php');    // 文章内容类
require_once get_theme_file_path('classes/class-cxtheme-wpjson.php');     // 接口类
require_once get_theme_file_path('classes/class-cxtheme-manage.php');     // 管理类

// 挂载支持
require_once get_theme_file_path('inc/action.php');
if( is_admin() ):    
require_once get_theme_file_path('admin/index.php');  
endif;

// 星河WordPress主题
// 自定义代码请添加到下方⬇