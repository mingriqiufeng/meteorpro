<?php
/**
 * Template Name: 管理面板
 */

$manage_menu = apply_filters('xhtheme_manage_menu',[]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();?>
    <link href="<?php echo get_theme_file_uri('assets/css/flatpickr.min.css?v=4.6.13' );?>" rel="stylesheet">
    <style>   
    .nav-link {
        outline: 0;
    }
    .nav-link.active {
        color:#f66;
        font-weight: bold;
    } 
    .form-select:focus {
        border-color: var(--cbg-color);
        box-shadow: none
    }
    .date-input {
        position: relative;
    }
    .date-input::before {
        content: attr(data-placeholder);
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        pointer-events: none;
        z-index: 0;
    }
    .date-input:focus::before,
    .date-input:not(:placeholder-shown)::before {
        display: none;
    }
    </style>
</head>
<body x-data="xhData">
    <div x-data="XH_adminPage">
        <?php
        if($manage_menu){
            ?>
            <header class="admin-header border-bottom py-3 container-fluid fs-7 shadow-sm">
                <div class="row">
                    <div class="col-auto me-auto">
                        <ul class="nav d-flex list-unstyled mb-0" style="--scale:1.1">
                        <?php
                        foreach($manage_menu as $menukey => $menu){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link px-3" href="javascript:;" @click="adminPage('<?php echo $menu['slug'];?>',false)" :class="{'active': pageType == '<?php echo $menu['slug'];?>' }"><i class="<?php echo $menu['icon'];?>"></i> <?php echo $menu['name'];?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-auto">
                        <span :class="{'d-none' : userStatus != 'login'}">登录用户：<span x-text="userData.display_name"></span></span>
                        <span :class="{'d-none' : userStatus == 'login'}"  @click="$refs.userloginbtn.click()">未登录</span>
                        <div class="d-none">
                            <?php
                            do_action('xhtheme_usermenu_html', 'header-login');
                            ?>                                   
                        </div>
                    </div>
                </div>      
            </header>
            <?php            
        }else{
            ?>
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: calc(100vh - 160px);">
                <div class="text-center py-5">
                    <i class="cxicon cxicon-none mb-4 opacity-50" style="--scale:3"></i>
                    <p>您暂时没有需要管理的数据！</p>
                </div>
            </div>            
            <?php
        }
        
        /**
         * 内容主体
         */
        if($manage_menu):?>
        <main class="container-fluid" style="--bs-gutter-x: 2.5rem;">
            <?php
            foreach($manage_menu as $menukey => $menu){
                ?>
                <template x-if="pageType == '<?php echo $menu['slug'];?>'">
                    <div>
                        <?php
                        call_user_func($menu['headform']);
                        ?>
                    </div>
                </template>
                <?php
            }
            ?>
                
            <div class="admin-mainbox">
                <!-- 加载动画 -->
                <template x-if="ploadIng">
                    <div class="loading-box">
                        <div class="loadbox w-100 d-flex flex-column justify-content-center align-items-center" style="min-height:500px">
                            <div class="loadsvg p-5" role="status">
                                <div class="p-3 text-center pb-0">
                                    <span class="d-block donut"><i class="cxicon cxicon-loadm text-danger me-0" style="--scale: 2"></i></span>
                                    <p class="fs-6 mt-3 opacity-75">加载中...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <?php
                foreach($manage_menu as $menukey => $menu){
                    ?>
                    <template x-if="!ploadIng && pageType == '<?php echo $menu['slug'];?>'">
                        <div>
                            <?php
                            call_user_func($menu['manageBody']);
                            ?>
                        </div>
                    </template>
                    <?php
                }
                ?>
            </div>    
        </main>   
        <?php endif;?>

        <!-- 弹出层代码 -->
        <div class="popbg-box anim" style="--speed:0.1s" :class="{visible: popData.bgShow,blackcolor: popData.bgBlack }" @click="_bgclose('bg')"></div>
        <div class="emon rounded" :class="{visible: popData.Emon,loading: popData.loadclass,mbemon: popData.mbemon}" :style="popData.popMwidth ? '--maxwidth:'+popData.popMwidth : ''">
            <div class="emon-close" @click="_bgclose('btn')"><i class="cxicon cxicon-error" style="--scale:.85"></i></div>
            <div class="emon-title" x-show="popData.title" x-html="popData.title"></div>
            <div class="emon-content" x-html="popData.content"></div>
        </div>
        <!-- 弹窗部分结束 -->

    </div>
    <!-- 引入 flatpickr CSS -->
    
    <script type="text/javascript" src="<?php echo get_theme_file_uri('assets/js/flatpickr.min.js?v=4.6.13' );?>"></script>
    <script type="text/javascript" src="<?php echo get_theme_file_uri('assets/js/adminmanage.js?v=2.7.1' );?>" id="xhtheme-admin-js"></script>
    <?php wp_footer();?>
</body>
</html>