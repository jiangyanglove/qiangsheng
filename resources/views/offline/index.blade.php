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
        <div class="login_panel alert_a">
          <h3>{{ __('您好,请输入WWID获得积分') }}</h3>

          <div class="input">
            <input type="password" id="wwid" value="">
          </div>
          <button class="login_btn">{{ __('登录') }}</button>
        </div>
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
    <script type="text/javascript">
        $(function () {
            $('.login_btn').on('click', function () {
                var wwid = $('#wwid').val()
                if (!wwid) {
                    alert('请输入wwid')
                    return false
                }
                $.ajax({
                    url: '/api/offline',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        wwid: wwid
                    },
                    success: function (res) {
                        if (res.code === 2) {
                            alert(res.error_msg)
                        }
                        else if(res.code === 0){
                            window.location.href = '/offline/ok';
                        }
                        else{
                          alert(res.data)
                        }
                    }
                })
            })
        })

    </script>
</body>
</html>