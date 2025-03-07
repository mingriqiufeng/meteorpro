<?php
/*
Template Name:下载链接转换
*/
$downstr   = isset($_GET['downid']) ? $_GET['downid'] : '';
$errorMsg  = '';
$postId    = 0;
$success   = false;
if( empty($downstr) ){
    $errorMsg = __('参数错误！','meteor');
}else{
    $downData = Xhdown::decrypt_downdata($downstr);
    if( empty($downData) || !is_array($downData) ){
        $errorMsg = __('参数错误[02]！','meteor');
    }else{
        $downArgs = Xhdown::download_pagedata($downData);
        if( $downArgs['code'] == 1 ){
            $errorMsg = $downArgs['msg'];
            $postId = $downArgs['data']['postId'];
        }else{
            $success = true;
        }
    }
}
if( empty($errorMsg) && $success ){
    if( empty($downArgs['data']['downData']['pass']) && empty($downArgs['data']['downData']['zippass']) ){
        // 跳转到下载链接
        wp_redirect($downArgs['data']['downData']['link']);
        exit;
    }
}

get_header();
?>
<div class="container">
    <div class="download-wrap" style="max-width: 500px;margin: 0 auto;min-height: 70vh;display: flex;flex-direction: column;padding-top: 20%;">
        <?php
        if( !empty($errorMsg) ){
            $postlink = isset($downArgs['data']['postId']) && $downArgs['data']['postId'] > 0 ? get_the_permalink($downArgs['data']['postId']) : 'javascript:history.back()';
            ?>
            <div class="border p-2 text-center rounded shadow-sm border-1">
                <div class="border p-4 rounded border-1">
                    <p class="opacity-75 my-4"><?php echo $errorMsg;?></p>
                    <p><a class="btn btn-default btn-lg fs-7 anim" href="<?php echo $postlink;?>"><?php _e('返回文章','meteor');?></a></p>
                </div>
            </div>        
            <?php
        }else{
            ?>
            <div class="border py-2 px-4 rounded shadow-sm" style="width:100%;max-width: 450px;margin: 0 auto;">
                <h2 class="mb-4 fs-3 py-3 fw-bold"><?php _e('下载信息','meteor');?></h2>
                <div class="row mb-3">
                    <!-- 提取密码 -->
                     <?php if( !empty($downArgs['data']['downData']['pass']) ):?>
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <svg class="me-2 text-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span class="text-secondary fs-7"><?php _e('提取密码','meteor');?></span>
                            </div>
                            <button class="btn btn-sm d-flex align-items-center border-0" style="background: rgba(155,155,155,.1)" x-data="{copyText:'<?php echo $downArgs['data']['downData']['pass'];?>',copyStatus:false}" x-bind="textCopy">
                                <span class="me-2" x-text="copyText"></span>
                                <i class="cxicon cxicon-fuzhi opacity-50 fw-bold" :class="{'cxicon-fuzhi':!copyStatus,'cxicon-zhengque1': copyStatus}"></i>
                            </button>
                        </div>
                    </div>
                    <?php endif;?>
                    <!-- 解压密码 -->
                     <?php if( !empty($downArgs['data']['downData']['zippass']) ):?>
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <svg class="me-2 text-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <span class="text-secondary fs-7"><?php _e('解压密码','meteor');?></span>
                            </div>
                            <button class="btn btn-sm d-flex align-items-center border-0" style="background: rgba(155,155,155,.1)" x-data="{copyText:'<?php echo $downArgs['data']['downData']['zippass'];?>',copyStatus:false}" x-bind="textCopy">
                                <span class="me-2" x-text="copyText"></span>
                                <i class="cxicon cxicon-fuzhi opacity-50 fw-bold" :class="{'cxicon-fuzhi':!copyStatus,'cxicon-zhengque1': copyStatus}"></i>
                            </button>
                        </div>
                    </div>  
                    <?php endif;?>
                    <!-- 下载按钮 -->
                    <div class="col-12 mt-4">
                        <a class="btn btn-default w-100 d-flex align-items-center justify-content-center lh-lg py-2 fs-7 anim" href="<?php echo $downArgs['data']['downData']['link'];?>" target="_blank">
                            <svg class="me-2" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" x2="12" y1="15" y2="3"></line>
                            </svg>
                            <?php echo apply_filters('meteor_downpage_linkbtn_text',__('跳转至下载地址','meteor'));?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
get_footer();

