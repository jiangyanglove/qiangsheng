<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('读书的力量') }} - {{ __('中国强生财务职业发展月') }}</title>
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
            <div class="back"><a href="javascript:history.back(-1)"><img src="/dist/static/img/back.png" alt=""></a></div>
            <div class="citys">
                <div class="city @if($type == 'new')active @endif"><a href="/reading/new">{{ __('最新') }}</a></div>
                <div class="city" @if($type == 'hot')active @endif><a href="/reading/hot">{{ __('热门') }}</a></div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <div class="blacktitle">
                <a href="/reading/add">{{ __('推荐书籍') }}</a>
            </div>
        </div>
        <div class="recommendContent">
        @if(count($readings)>0)
        @foreach ($readings as $reading)
            <div class="martop1rem">
                <div>
                    <img src="{{ $reading->icon }}" alt="" width="100%" style="height: 12rem;">
                </div>
                <div class="borderhas">
                    <p class="biaoti">{{ $reading->name }}</p>
                    <p class="desc">{{ $reading->description }}</p>
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ $reading->user->icon }}" alt="">
                            <p>{{ $reading->user->name }}</p>
                        </div>
                        <div class="right">
                            <div class="like">
                                <img src="/dist/static/img/hongxin.png" alt="">
                                <span>12</span>
                            </div>
                            <div class="news">
                                <img src="/dist/static/img/xiaoxi.png" alt="">
                                <span>12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
          @endif
        </div>
<!--         <div class="recommendBottom">
            <div class="border1px">
                <div class="comment">
                    <div class="left">
                        <img src="/static/img/thumb.png" alt="">
                    </div>
                    <div class="right">
                        <p class="information">
                            <span class="name">STACY MARTIN</span>
                            <span class="time">17 MIN AGO</span>
                        </p>
                        <p class="one">Commented on <span class="three">Stop Wars Tree.</span></p>
                        <p class="two">”I hope this isn’t avaible in Germany”</p>
                    </div>
                </div>
            </div>
            <div class="border1px">
                <div class="comment">
                    <div class="left">
                        <img src="/static/img/thumb.png" alt="">
                    </div>
                    <div class="right">
                        <p class="information">
                            <span class="name">STACY MARTIN</span>
                            <span class="time">17 MIN AGO</span>
                        </p>
                        <p class="one">Commented on <span class="three">Stop Wars Tree.</span></p>
                        <p class="two">”I hope this isn’t avaible in Germany”</p>
                    </div>
                </div>
            </div>
            <div class="border1px">
                <div class="comment">
                    <div class="left">
                        <img src="/static/img/thumb.png" alt="">
                    </div>
                    <div class="right">
                        <p class="information">
                            <span class="name">STACY MARTIN</span>
                            <span class="time">17 MIN AGO</span>
                        </p>
                        <p class="one">Commented on <span class="three">Stop Wars Tree.</span></p>
                        <p class="two">”I hope this isn’t avaible in Germany”</p>
                    </div>
                </div>
            </div>
            <div class="border1px">
                <div class="comment">
                    <div class="left">
                        <img src="/static/img/thumb.png" alt="">
                    </div>
                    <div class="right">
                        <p class="information">
                            <span class="name">STACY MARTIN</span>
                            <span class="time">17 MIN AGO</span>
                        </p>
                        <p class="one">Commented on <span class="three">Stop Wars Tree.</span></p>
                        <p class="two">”I hope this isn’t avaible in Germany”</p>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
<!--     <footer>
        <div class="bootmbutton">
            Send Message
        </div>
    </footer> -->
</div>


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>

</script>
</body>
</html>