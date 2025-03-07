<?php
get_header();
?>
<!-- 3 -->
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
            while ( have_posts() ) : the_post();
            the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>
<!-- 3.end -->

<?php
get_footer();
