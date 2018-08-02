<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('照片') }} - {{ __('发布') }} - {{ __('自由讨论') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/recommend.css">
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
                <div class="city><a style="color: #ffffff;" href="/freetalk/new">{{ __('最新') }}</a></div>
                <div class="city><a style="color: #ffffff;" href="/freetalk/hot">{{ __('热门') }}</a></div>
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
            <div class="martop1rem">
                <div class="images">
                    <div class="item">
                        <img src="http://img.zcool.cn/community/01bad358f9a153a8012160f765ae6e.jpg" width="100%">
                    </div>
                    <div class="item">
                        <img src="http://img.zcool.cn/community/01bad358f9a153a8012160f765ae6e.jpg" width="100%">
                    </div>
                    <div class="item">
                        <img src="http://img.zcool.cn/community/01bad358f9a153a8012160f765ae6e.jpg" width="100%">
                    </div>
                    <div class="item">
                        <img src="http://img.zcool.cn/community/01bad358f9a153a8012160f765ae6e.jpg" width="100%">
                    </div>
                   <div class="item">
                        <img src="http://img.zcool.cn/community/01bad358f9a153a8012160f765ae6e.jpg" width="100%">
                    </div>
                    <div class="item">
                        <img src="/dist/static/img/add-b.png" width="100%">
                    </div>

                </div>
                <div class="textContent">
                    <textarea>|{{ __('这一刻的想法') }}...</textarea>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="bootmbuttonSmall">
            {{ __('发布') }}
        </div>
    </footer>
</div>


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>

</script>
</body>
</html>