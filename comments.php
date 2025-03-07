<?php
if ( post_password_required() ) {
	return;
}
?>
<section class="mso nobg comments mb-5" x-data="postComment">
    <div id="comments" class="comments-area" x-init="commentdepthlaceholder = commentlaceholder = '<?php _e('发表您的神评...','meteor');?>'">
        <?php
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments">
                <?php _e( '评论功能已关闭。', 'meteor' ); ?>
            </p>
            <?php
        else:
            Cx_Comment::comment_form(); 
            
            ?>
            <div class="module-tit item-center noborder mb-3 mt-5">
                <h3 style="font-size:1rem"><i class="cxline"></i>
                <?php
                // translators: %s is the number of comments
                printf(__('评论列表 (%s条)：','meteor'),get_comments_number());
                ?>
                </h3>
                <p><?php //printf('共 %d 条评论',get_comments_number());?></p>
                <div class="more-sort pe-0" style="background:none">
                    <button type="button" class="btn btn-xsm btn-sort lh-1 opacity-75" :class="{'active': commentlistType == 'hot'}" @click="hascommentType('hot')"><?php _e('热门','meteor');?></button>
                    <i class="cxline-1 mx-1"></i>
                    <button type="button" class="btn btn-xsm btn-sort lh-1 opacity-75" :class="{'active': commentlistType == 'date'}" @click="hascommentType('date')"><?php _e('最新','meteor');?></button>
                </div>
            </div>
            <div class="border rounded pt-3" :class="{'opacity-50':commentTypeload}" style="--bs-border-color:var(--cbg-grey-color);">
                <ul class="comment-list list-unstyled " x-ref="commentList" style="--bs-border-style: dashed;">
                    <?php printf( '<li class="commentlist-none"><div class="nonebox my-5" style="min-height:150px"><div class="d-flex justify-content-center my-5 opacity-50"><div class="spinner-border text-danger sbw-2" role="status"></div></div></div></li>' );?>
                </ul>
                <div class="comment-page" x-show="commentListpage">
                    <p class="text-center ahover fs-7 anim cursor-pointer py-3 opacity-50 mb-0 border-top" @click="commentMore()" style="--scale:.8">
                        <span x-show="!commentListload"> <?php _e('加载更多评论','meteor');?> <i class="cxicon cxicon-xsj-down"></i></span>
                        <span x-show="commentListload"><span class="spinner-border spinner-border-ss" role="status" aria-hidden="true"></span> <span class="visually-hidden">Loading...</span></span>
                    </p>
                </div>
            </div>
            
            <?php
        endif;
        ?>
    </div>
</section>
<!-- #comments -->
