<?php
get_header();
?>
<style>
h1 {
    font-size: 9rem;
    font-weight: 800;
    margin: 0;
    animation: fadeInDown 0.8s ease-out;
}
p {
    font-size: 1.5rem;
    font-weight: 300;
    margin-bottom: 2rem;
    animation: fadeIn 0.8s ease-out 0.5s both;
}
.icon {
    width: 120px;
    height: 120px;
    margin-bottom: 2rem;
    animation: rotate 20s linear infinite;
}
.button {
    text-decoration: none;
    padding: 1rem 2rem;
    border-radius: 9999px;
    font-size: 1.125rem;
    font-weight: 600;
    transition: background-color 0.3s, transform 0.3s;
    display: inline-block;
}
.button:hover {
    transform: translateY(-2px);
}
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center flex-column my-5 py-5">
                <h1>404</h1>
                <p>页面未找到 | Page Not Found</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                </svg>
                <a href="<?php echo esc_url(home_url('/'));?>" class="button btn-default">返回首页 | Back to Home</a>
                <div style="height: 200px"></div>
            </div>            
        </div>
    </div>
</div>

<?php
get_footer();