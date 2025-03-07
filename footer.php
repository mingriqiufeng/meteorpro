</main><!-- main.end -->

<footer class="footer-s1">
    <div class="linebox bg-auto"></div>
    <div class="foottop">
        <div class="container-xl">
            <div class="footmain-box">
                <?php
                if( cx_switcher('foot-nav') ){
                    $foot_navdata = (array)cx_option('foot-navdata',[]);
                    $menustr      = '';
                    $pattern      = '<a href="%s"%s>%s</a>';
                    if( empty($foot_navdata) ){
                        $menustr  = __('<p>请到后台配置面板中添加菜单项目!</p>','meteor');
                    }else{
                        foreach ($foot_navdata as $navdata ) {
                            if( empty($navdata) || empty($navdata['name']) ) continue;
                            $menustr .= sprintf(
                                $pattern,
                                $navdata['url'],
                                !empty($navdata['target']) ? ' target="_blank"' : '',
                                $navdata['name']
                            );
                        }
                    }
                    printf(
                        '<div class="aboutus_link">%s</div>',
                        $menustr
                    );
                }

                // 底部说明
                $foot_desc = cx_option('foot-desc');
                if( $foot_desc ){
                    printf('<div class="footer-desc">%s</div>',$foot_desc);
                }

                // 底部版权
                $foot_copyright = cx_option('foot-copyright');
                if( $foot_copyright ){
                    printf('<div class="foot-copyright">%s</div>',$foot_copyright);
                }else{
                    printf(
                        '<div class="foot-copyright">%s &copy; %s. %s</div>',
                        get_bloginfo('name'),
                        esc_html( date_i18n( esc_html__( 'Y', 'meteor' ) ) ),
                        esc_html__( 'All Rights Reserved.', 'meteor' )
                    );
                }
                // 备案信息
                $cn_icp = cx_option('foot-icp');
                $cn_ga  = cx_option('foot-ga');
                if( $cn_icp || $cn_ga ){
                    printf('<div class="foot-icp mb-4 fs-6 opacity-50">');                            
                    if( $cn_ga ){
                        printf('<span>%s</span>',$cn_ga);
                    }
                    if( $cn_icp && $cn_ga ){
                        echo '<span class="px-1"></span>';
                    }
                    if( $cn_icp ){
                        printf('<a href="http://beian.miit.gov.cn/" target="_blank" rel="noreferrer noopener nofollow">%s</a>',$cn_icp);
                    }
                    
                    printf('</div>');
                }
                ?>
            </div>
        </div>
    </div>
</footer>
<!-- 弹出层代码 -->
<div class="popbg-box anim" style="--speed:0.1s" :class="{visible: popData.bgShow,blackcolor: popData.bgBlack }" @click="_bgclose('bg')"></div>
<div class="emon rounded" :class="{visible: popData.Emon,loading: popData.loadclass,mbemon: popData.mbemon}" :style="popData.popMwidth ? '--maxwidth:'+popData.popMwidth : ''">
    <div class="emon-close" @click="_bgclose('btn')" _widese="468119"><i class="cxicon cxicon-error" style="--scale:.85"></i></div>
    <div class="emon-title" x-show="popData.title" x-html="popData.title"></div>
    <div class="emon-content" x-html="popData.content"></div>
</div>

<!-- 弹窗部分结束 -->
<?php 
$head_searchbtn = cx_option('head-searchbtn','all');
if( $head_searchbtn != 'none' ):?>
<div class="search-popup anim" :class="{'visible': searchData.Popup}">
    <div class="search-content anim" :class="{'top-lg-40':searchData.Inputtop}">
        <div class="search-form-box">
            <form class="d-flex search-form" method="get" @submit.prevent="searchData.searchFormSubmit($data)" action="<?php echo home_url();?>">
                <div class="d-flex w-100 justify-content-between align-items-center position-relative">
                    <div class="search-inputbox flex-grow-1">
                        <input class="form-control search-input py-2 py-lg-3 px-4 border-2 anim" @input.debounce.1000ms="searchData.searchFormSubmit($data)" x-model="searchData.formData.word" autocomplete="off" placeholder="<?php _e('搜索并按回车键...','meteor');?>" type="text" name="s" aria-label="<?php _e('搜索','meteor');?>">
                    </div>
                    <botton type="submit" class="submitbox position-absolute top-0 end-0 d-flex align-items-center px-4 h-100 opacity-50">
                        <i class="cxicon cxicon-search" :class="{'d-none':searchData.loadIng}"></i>
                        <span class="spinner-border spinner-border-sm spinner-b1" :class="{'d-none':!searchData.loadIng}"></span>
                    </botton>
                </div>
            </form>
        </div>   
        <ul class="searchList anim pt-4" x-html="searchData.postList" x-show="!searchData.Inputtop && searchData.formData.word" x-transition :class="{'opacity-25':searchData.loadIng}"></ul>          
    </div>
</div>
<!-- .end -->
<?php endif;?>

</div>

<!--.sit-wrapper-->
<?php wp_footer();?>
</body>

</html>