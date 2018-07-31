<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('推荐书籍') }} - {{ __('读书的力量') }} - {{ __('中国强生财务职业发展月') }}</title>
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
            <div class="back"><a href="javascript:history.back(-1)"><img src="/dist/static/img/back.png" alt=""></a></div>
            <div class="citys">
                <div class="city active"><a href="/reading/new">{{ __('最新') }}</a></div>
                <div class="city"><a href="/reading/hot">{{ __('热门') }}</a></div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <div class="blacktitle">
                {{ __('取消') }}
            </div>
        </div>
        <div class="recommendContent">
            <div class="upfile">
                <img src="/static/img/xiangji.png" alt="">
            </div>
            <div class="bookname">
                <span>{{ __('书名') }}：</span>
                <input type="text" >
            </div>
            <div class="desc">
                <span>{{ __('简介') }}：</span>
                <textarea ></textarea>
            </div>
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