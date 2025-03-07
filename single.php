<?php 
get_header();
$post_id = get_the_ID();
$_template = get_post_meta($post_id,'_template',true);
$tempName  = '';
switch ($_template) {
    case 'concise': case 'featured':
        $tempName = $_template;
    break;
}
get_template_part( 'template/content/content',$tempName);
get_footer();
