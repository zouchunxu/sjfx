<div style="clear:both;height: 60px;"></div>
<div class="bottom-nav">
    <div class="nav-item active">
        <div class="icon">
            <span class="fa fa-home"></span>
        </div>
        <div class="title">
            农场主页
        </div>
    </div>
    <div class="nav-item">
        <div class="icon">
            <span class="fa fa-shopping-cart"></span>
        </div>
        <div class="title">
            现代商城
        </div>
    </div>
    <div class="nav-item">
        <div class="icon">
            <span class="fa fa-user"></span>
        </div>
        <div class="title">
            我的庄园
        </div>
    </div>
    <div class="nav-item">
        <div class="icon">
            <span class="fa fa-tree"></span>
        </div>
        <div class="title">
            庄主家园
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.nav-item').click(function () {
            $('.bottom-nav').children(0).removeClass('active');
            $(this).addClass('active');
        });
    });
</script>