<?php
/**
 * Template Name: 文章归档
 */

get_header();
?>
<style>
    .archive-page-list li:hover{
        transform: translateX(5px);
    }
</style>
<section class="wi widget-coltow">
    <div class="banner trem-banner mb-0">
        <div class="container-xl mw960">
            <div class="article-head d-flex flex-column justify-content-center align-items-center gap-4 pt-5">
                <?php the_title( '<h1 class="post-title display-6">', '</h1>' );?>
            </div>
        </div>
    </div>
    <div class="container-xl mw960">
        <div class="main-content pt-5 mb-5">
            <?php
            // 获取所有已发布文章的年份
            $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC");

            foreach($years as $year) :
                // 获取该年份的所有月份
                $months = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = %d ORDER BY post_date DESC", $year));
            ?>
                <section class="mb-8">
                    <h2 class="border-bottom border-3 mb-4 d-inline-block" style="--bs-border-color:var(--cbg-color)"><?php
                    /**
                     * %s 年
                     * translators: %s is the year.
                     */
                    printf( __('%s 年', 'meteor'), $year);
                    ?></h2>
                    <?php
                    foreach($months as $month) :
                        $posts = get_posts(array(
                            'year' => $year,
                            'monthnum' => $month,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                        ));
                    ?>
                        <div class="my-4">
                            <h3 class="d-inline-block btn btn-lg btn-default border-0 fs-6 mb-4"><?php echo date_i18n('F', mktime(0, 0, 0, $month, 1, $year)); ?></h3>
                            <ul class="list-disc list-inside ps-3 archive-page-list">
                                <?php foreach($posts as $post) : setup_postdata($post); ?>
                                    <li class="anim">
                                        <a href="<?php the_permalink(); ?>" class="lh-lg py-1 d-inline-block">
                                            <?php the_title(); ?>
                                        </a>
                                        <span class="ms-1 fs-7 opacity-50"><?php echo get_the_date('Y-m-d'); ?></span>
                                    </li>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
get_footer();