<?php
/*
 * Template Name:无样式页面
 * Description: 用于构建器或其他特殊用户的页面，无任何样式和Title的空页面
 */
get_header();
while ( have_posts() ) : the_post();
?>
<div class="custom-page">
    <?php the_content();?>
</div>
<?php
endwhile;
get_footer();