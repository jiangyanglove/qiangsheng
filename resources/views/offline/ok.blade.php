<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('扫码得积分') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

    <div class="content">
        <div class="logo">
              <img src="/dist/static/img/logo.png" alt="">
        </div>
        <div class="login_panel alert_b">
          <h3>{{ __('恭喜,成功获得积分') }}</h3>


        <p class="copyRight">2018 ONE China Finance Career Month by Johnson & Johnson</p>
      </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script>
        $(function () {
            $('.sex_item').on('click', function() {
                $(this).addClass('active').siblings('.sex_item').removeClass('active')
            })
            $('.lang_item').on('click', function() {
                $(this).addClass('active').siblings('.lang_item').removeClass('active')
            })
        })
    </script>
</body>
</html>