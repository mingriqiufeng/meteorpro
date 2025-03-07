<?php get_header(); ?>
<!-- 3 -->
<div class="banner trem-banner mb-4">
    <div class="container-xl">
        <div class="trem-headbox bordered">
            <div class="bgimage"></div>
            <div class="trem-data">
                <?php
                $search_name = __('搜索:', 'meteor');
                printf( '<h1 class="page-title mb-3 fs-2">%s</h1>', $search_name.'<span>' . esc_html( get_search_query() ) . '</span>' );
                global $wp_query;
                // translators: %s is the number of search results.
                printf('<div class="taxonomy-description">%s</div>',sprintf( __('共检索到 %s条 相关内容！', 'meteor'),$wp_query->found_posts) );
                ?>
            </div>        
        </div>
    </div>
</div>

<section class="wi widget-coltow">
    <div class="container-xl">
        <div class="row cxrow">
            <div class="col-left">
                <div class="rowleft mb-4">
                    <div class="module-content px--1">
                        <?php
                        if ( have_posts() ) :
                            while ( have_posts() ) : the_post();
                                cx_template_html('blog');
                            endwhile;
                        else :
                            get_template_part( 'template/content/content', 'none' );
                        endif;
                        ?>
                    </div>
                    <?php
                    // 获取分页
                    the_posts_pagination(
                        array(
                            'mid_size'  => 1,
                            'prev_text' => '<span class="nav-prev-text"><i class="cxicon cxicon-jtleft"></i></span>',
                            'next_text' => '<span class="nav-next-text"><i class="cxicon cxicon-jtright"></i></span>',
                        )
                    );
                    ?>
                </div>
            </div>
            
            <?php 
            /**
             * 调用侧边栏
             */
            get_sidebar();
            ?>
            
        </div>
    </div>
</section>
<!-- 3.end -->
<?php
get_footer();