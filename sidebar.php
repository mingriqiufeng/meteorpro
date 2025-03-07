<?php
$sidebar_show = cx_option('sidebar-show', 'show');
$sidebarClass = ['col-right', 'ps-lg-4'];
if ($sidebar_show == 'hide') {
    $sidebarClass[] = 'd-none d-lg-block';
}
?>
<div class="<?php echo join(' ', $sidebarClass); ?>" id="sidebar">
    <div class="rowright sidebar-sticky">
        <aside class="side-area pb-3 spotlight-group">
            <?php
            if ( is_active_sidebar( 'meteor-index' ) ) :
                dynamic_sidebar( 'meteor-index' );
            endif;
            ?>
        </aside>
    </div>
</div>