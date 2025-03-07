<?php
/*
Template Name:点赞排行
*/
get_header();
?>
<!-- 3 -->
<div class="banner trem-banner mb-4">
    <div class="container-xl">
        <div class="trem-headbox bordered">
            <div class="bgimage"></div>
            <div class="trem-data">
                <h1 class="page-title mb-3 fs-2"><?php _e('榜单推荐','meteor');?></h1>
                <div class="taxonomy-description"><?php _e('根据文章互动次数进行排序为您推荐最受欢迎的 Top20 的内容！','meteor');?></div>
            </div>        
        </div>
    </div>
</div>

<section class="wi widget-coltow">
    <div class="container-xl"  style="max-width:960px">
        <div class="row cxrow">
            <div class="rowleft mb-4">
                <div class="module-content row row-cols-1">
                    <?php
                    // The Query
                    $livePost_args = [
                        'post_type'           => 'post',
                        'post_status'         => 'publish',
                        'posts_per_page'      => 20,
                        'orderby'             => 'meta_value_num modified',
                        'ignore_sticky_posts' => true,
                        'meta_key'            => 'likes'
                    ];
                    $livePost_query = new WP_Query( $livePost_args );
                    if( $livePost_query->have_posts() ):
                        $ranking = 1;
                        while ( $livePost_query->have_posts() ): $livePost_query->the_post();
                            cx_template_html('blog',['type' => 'ranking','number' => $ranking]);
                            $ranking++;
                        endwhile;
                    else:
                        get_template_part( 'template/content/content', 'none' );
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- 3.end -->
<?php
get_footer();