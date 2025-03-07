<!doctype html>
<html <?php language_attributes();?><?php Xhtheme_Meteor::darkModeinit();?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>

<body <?php body_class(); ?> x-data="xhData">
    <?php
    /**
     * 获取顶部导航配置集合
     */
    $headerConfig = cx_headerwidth();
    ?>
    <div class="site-wrapper<?php echo $headerConfig['siteclass'];?>">
        <header class="header-s1<?php echo $headerConfig['showtype'];?>" :class="{'onfixed' : searchData.Popup}" id="header-s1">
            <div class="headnav">
                <div class="container-xl xhnavbar hwdiy flex-nowrap flex-row"<?php echo $headerConfig['headwidth'];?>>
                    <div class="cxlogo">
                        <?php
                        Xhtheme_Meteor::webLogo();
                        ?>
                    </div>
                    <nav class="head-menu d-lg-flex<?php echo $headerConfig['navalign'];?>">
                        <ul class="navbar-nav headmenu-navbox">
                        <?php 
                        if( function_exists('wp_nav_menu')){
                            wp_nav_menu([
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'theme_location' => 'header-nav',
                                'fallback_cb'    => 'cx_menu_fallback'
                            ]);
                        }
                        ?>
                        </ul>
                    </nav>
                    <div class="header-btn z-1" style="--scale:1;--srcolor:#888a2e">
                        <ul class="h-btnbox d-flex mb-0 gap-2 align-items-center ps-3">
                            <?php do_action('xhtheme_header_rightbtn');?>
                        </ul>
                        <div class="h-buttons d-flex ms-3">
                            <?php
                            $head_searchbtn = cx_option('head-searchbtn','all');
                            if( $head_searchbtn != 'none' ){
                                $itemClass = 'search-icon btn-default icon-button';
                                if( $head_searchbtn == 'pc' ){
                                    $itemClass .= ' d-none d-lg-inline-flex';
                                }
                                printf('
                                    <button type="button" class="%s" :class="{active:searchData.Popup}" @click="searchData.searchbtnClick()" title="Search Btn">
                                        <i class="cxicon cxicon-error me-0 anim"></i>
                                        <i class="cxicon cxicon-search me-0 anim"></i>
                                    </button>',
                                    $itemClass
                                );
                            }                            
                            ?>
                            
                            <!-- 移动端菜单 -->                            
                            <button type="button" class="search2 btn-default icon-button<?php echo $headerConfig['menubtn'];?>" @click="moibleMenu = popData.bgShow = true" title="Menu Btn">
                                <i class="cxicon cxicon-menu3 me-0"></i>
                            </button>
                            
                            <!-- menu.end -->
                             <!-- 移动端菜单 -->
                        
                            <!-- menu.end -->
                            <?php if( $headerConfig['loginbtn'] ):?>
                                <!-- menu.end -->
                            <div class="burger-menu btn-default icon-button userlogin-box anim">
                                <span class="cxicon cxicon-load me-0 opacity-25" :class="{'d-none' : userStatus != 'load'}"></span>
                                <span class="login_in cursor-pointer d-none" title="User Login" @click="$refs.userloginbtn.click()" :class="{'d-none' : userStatus != 'nologin'}"><i class="cxicon cxicon-user me-0"></i></span>
                                <span class="logindata avatar-anima cursor-pointer d-none" :class="{'anima-playend':popData.Emon, 'd-none' : userStatus != 'login'}" @click="$refs.userlogininbtn.click()">
                                    <img class="avatar" :src="userData.avatar" :alt="userData.display_name" width="30" height="30" />
                                </span>
                                <div class="user-popbox anim d-none d-md-inline" :class="userStatus == 'load' ? 'hide' : ''">
                                    <div class="popbox">
                                        <?php
                                        do_action('xhtheme_usermenu_html', 'header-login');
                                        ?>
                                    </div>                                    
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>            
        </header><!-- header.end-->
        <!-- Moible Nav -->
        <div class="mobile-navbox anim" :class="{'visible': moibleMenu}">
            <button type="button" class="btn-close" aria-label="Close" @click="popData.bgShow = moibleMenu = false"><i class="cxicon cxicon-caidanshouqi"></i></button>
            <div class="m-menulogo p-4 pt-3"></div>
            <div class="m-navbox p-4 pt-0">
                <ul id="moible-menu" class="m-nav pe-4">
                <?php 
                if(function_exists('wp_nav_menu')){
                    wp_nav_menu([
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'theme_location' => 'moible-nav',
                        'fallback_cb'    => 'cx_menu_fallback_left'
                    ]);
                }
                ?>
                </ul>
            </div>
            <!--
            <div class="m-btnbox p-4">
                <ul class="h-btnbox">
                    <li class="list-inline-item">
                        <a href="#" target="_blank" aria-label="Msg">
                            <i class="cxicon cxicon-xiaoxi"></i>
                        </a>
                    </li>
                </ul>
            </div>
            -->
        </div>
        <!-- MN.end -->
        

        <main class="main-container<?php echo $headerConfig['mainclass'];?>" role="main">