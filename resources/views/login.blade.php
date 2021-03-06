<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('登录') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

<div class="content">
    <div class="logo">
        <img src="/dist/static/img/logo.png" alt="">
    </div>
    <div class="login_panel">
        <h3>{{ __('你好，请登录') }}</h3>
        <div class="lang">
            <span class="lang_item @if($lang == 'zh_cn')active @endif">{{ __('中文') }}</span>
            <span class="lang_item @if($lang == 'en')active @endif">EN</span>
        </div>
        <div class="sex">
            <div class="male sex_item active">
                <input type="radio" id="male" value="1" name="sex">
                <label for="male"></label>
                <img src="/dist/static/img/male.png" alt="">
                <span>{{ __('男') }}</span>
            </div>
            <div class="female sex_item">
                <input type="radio" id="female" value="2" name="sex">
                <label for="female"></label>
                <img src="/dist/static/img/female.png" alt="">
                <span>{{ __('女') }}</span>
            </div>
        </div>
        <div class="input">
            <input type="password" id="wwid" value="">
        </div>
        <button class="login_btn">{{ __('登录') }}</button>
    </div>
    <p class="copyRight">2018 ONE China Finance Career Month by Johnson & Johnson</p>
</div>

<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<!-- <script src="../static/vendor/swiper-3.4.0.jquery.min.js"></script> -->
<script>
    $(function () {
        $('.sex_item').on('click', function () {
            $(this).addClass('active').siblings('.sex_item').removeClass('active')
        })
        $('.lang_item').on('click', function () {
            $(this).addClass('active').siblings('.lang_item').removeClass('active')
        })
    })
</script>
<script type="text/javascript">
    $(function () {
        $('.lang_item').on('click', function () {
            var language = 'en';
            if ($(this).index() == 0) {
                language = 'zh_cn';
            }
            $.ajax({
                url: '/api/change/language?lang=' + language,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                }
            })
        })
        $('.login_btn').on('click', function () {
            var sex = $(".sex_item.active input").val()
            var wwid = $('#wwid').val()
            if (!wwid) {
                alert('请输入wwid')
                return false
            }
            $.ajax({
                url: '/api/login',
                type: 'GET',
                dataType: 'json',
                data: {
                    wwid: wwid,
                    sex: sex
                },
                success: function (res) {
                    if (res.code === 2) {
                        alert(res.error_msg)
                    }
                    window.location.href = '/';
                }
            })
        })
    })

</script>
</body>
</html>