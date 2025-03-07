<?php 
get_header();
$term = get_queried_object();
?>
<!-- 3 -->
<div class="banner trem-banner mb-4">
    <div class="container-xl">
        <div class="trem-headbox bordered pt-4">
            <div class="bgimage"></div>
            <div class="trem-data">
                <?php                    
                    the_archive_title( '<h1 class="page-title mb-3 fs-2">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description mb-3">', '</div>' );
                    printf(
                        '
                        <div class="statistics-box">
                            <span style="margin-right:10px"><i class="cxicon cxicon-uptop"></i> %s<em>%d</em></span>
                            <span><i class="cxicon cxicon-upjt"></i> %s<em>%d</em></span>
                        </div>
                        ',
                        __('今日更新：','meteor'),
                        cx_update_postnum('1 day ago',$term->term_id),
                        __('栏目文章数：','meteor'),
                        $term->count
                    );
                ?>
            </div>        
        </div>
    </div>
</div>
<?php
$_template = '';
if( $term->taxonomy == 'category' || $term->taxonomy == 'post_tag' ){
    $term_id = $term->term_id;
    $term_template = get_term_meta( $term_id, '_template', true );
    if( $term_template  == 'featured' ){
        $_template = 'featured';
    }
}

if ( have_posts() ) :
    get_template_part( 'template/archive/template',$_template);
else:
    get_template_part( 'template/content/content', 'none' );
endif;
get_footer();
