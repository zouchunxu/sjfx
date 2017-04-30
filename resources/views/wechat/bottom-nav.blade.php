<div style="clear:both;height: 60px;"></div>
<div class="bottom-nav">
    <a href="/index">
        <div class="nav-item">
            <div class="icon">
                <span class="fa fa-home"></span>
            </div>
            <div class="title">
                农场主页
            </div>
        </div>
    </a>
    <a href="/good">
        <div class="nav-item">
            <div class="icon">
                <span class="fa fa-shopping-cart"></span>
            </div>
            <div class="title">
                现代商城
            </div>
        </div>
    </a>
    <div class="nav-item">
        <div class="icon">
            <span class="fa fa-user"></span>
        </div>
        <div class="title">
            我的庄园
        </div>
    </div>
    <a href="/user">
        <div class="nav-item">
            <div class="icon">
                <span class="fa fa-tree"></span>
            </div>
            <div class="title">
                庄主家园
            </div>
        </div>
    </a>


</div>
<script>
    $(document).ready(function () {
//        $('.nav-item').click(function () {
//            $('.bottom-nav').children(0).removeClass('active');
//            $(this).addClass('active');
//        });

        var wechatCurrentUrl = window.location.pathname;

        $('.bottom-nav a').each(function () {
            if (typeof $(this).attr('href') == 'string' && wechatCurrentUrl.match($(this).attr('href'))) {
                $(this).find('.nav-item').addClass('active');
            }
        });

    });
</script>