<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('我的职场范儿') }} - {{ __('中国强生财务职业发展月') }}</title>

    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/release.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
            <div class="citys">
                <div class="city active">最新</div>
                <div class="city">热门</div>
            </div>
            <div class="md-toolbar-section-end">
              <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <div class="blacktitle">
                退出
            </div>
        </div>
        <div class="upfile_col2">
            <div class="upfile_item">
                <img class="icon" src="/dist/static/img/add.png" alt="">
            </div>
            <div class="upfile_item">
                <img class="icon" src="/dist/static/img/add.png" alt="">
            </div>
        </div>
        <div class="up_textarea">
            <textarea placeholder="这一刻的想法" name="" id="" cols="30" rows="10"></textarea>
        </div>

    </section>
    <footer>
        <div class="bootmbutton">
            发布
        </div>
    </footer>
</div>


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>

</script>
</body>
</html>