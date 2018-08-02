<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('自由讨论') }} - {{ __('中国强生财务职业发展月') }}</title>
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
                <div class="city @if($type == 'new')active @endif"><a style="color: #ffffff;" href="/freetalk/new">{{ __('最新') }}</a></div>
                <div class="city @if($type == 'hot')active @endif"><a style="color: #ffffff;" href="/freetalk/hot">{{ __('热门') }}</a></div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    <section>
        <div class="recommendTop">
            <div class="blacktitle">
                {{ __('发布') }}
                <!-- 发布照片的url /freetalk/photo/add -->
            </div>
        </div>
        <div class="recommendContent">
            @if(count($freetalks) > 0)
            @foreach ($freetalks as $key=>$freetalk)

            <!--
            @if($freetalk->type == 'plan')
            <div class="martop1rem">
                 <div class="borderhas">
                    <div class="appreciate">
                        <div class="left">
                            <img src="/dist/static/img/thumb.png" alt="">
                            <p>Jason<br/>Moderik</p>
                        </div>
                    </div>
                    <div class="plan">
                        <div class="title">我的计划 # 1
                            <p class="dot"><span class="red"></span><span></span><span></span><span></span></p>
                        </div>
                        <div class="planContent">做什么...</div>
                        <div class="planContent">如何做...</div>
                        <div class="planContent">开始/结束...</div>
                    </div>
                        <p class="biaoti"></p>
                        <p class="desc">We need everyone's opinion about the form, color and describe the details that you like.</p>
                        <div class="appreciate">
                            <div class="left">
                                <p class="time">1 HOUR AGO</p>
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
            @endif
            -->
            @if($freetalk->type == 'photo' && $freetalk->photo_number == 1)
            <div class="martop1rem">
                 <div class="borderhas">
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ @$freetalk->user->icon }}" alt="">
                            <p>{{ @$freetalk->user->name }}</p>
                        </div>
                    </div>
                    <div>
                        <img src="{{ $freetalk->real_photos}}" alt="" width="100%" style="height: 12rem;">
                    </div>
                    <p class="biaoti"></p>
                    <p class="desc">{{ $freetalk->content }}</p>
                    <div class="appreciate">
                        <div class="left">
                            <p class="time">{{ $freetalk->time }}</p>
                        </div>
                        <div class="right">
                            <div class="like">
                                <img src="/dist/static/img/hongxin.png" alt="">
                                <span>{{ $freetalk->likes }}</span>
                            </div>
                            <div class="news">
                                <img src="/dist/static/img/xiaoxi.png" alt="">
                                <span>{{ $freetalk->comments }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($freetalk->type == 'photo' && $freetalk->photo_number > 1)
            <div class="martop1rem">
                 <div class="borderhas">
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ @$freetalk->user->icon }}" alt="">
                            <p>{{ @$freetalk->user->name }}</p>
                        </div>
                    </div>
                <div class="images">
                   @foreach ($freetalk->real_photos as $photo)
                    <div class="item">
                        <img src="{{ $photo }}" width="100%">
                    </div>
                  @endforeach
                </div>
                <p class="biaoti"></p>
                <p class="desc">{{ $freetalk->content }}</p>
                <div class="appreciate">
                    <div class="left">
                        <p class="time">{{ $freetalk->time }}</p>
                    </div>
                    <div class="right">
                        <div class="like">
                            <img src="/dist/static/img/hongxin.png" alt="">
                            <span>{{ $freetalk->likes }}</span>
                        </div>
                        <div class="news">
                            <img src="/dist/static/img/xiaoxi.png" alt="">
                            <span>{{ $freetalk->comments }}</span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endif

            @endforeach
            @endif
        </div>
        <div class="recommendBottom">
            <div class="border1px">
                <div class="comment">
                    <div class="left">
                        <img src="/dist/static/img/thumb.png" alt="">
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
        </div>
    </section>
    <footer>
        <div class="bootmbutton">
            Send Message
        </div>
    </footer>
</div>


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>

</script>
</body>
</html>