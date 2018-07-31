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
<style>
.cont_news {
    border: 1px solid #000;
    margin: 10px;
    text-align: right;
    z-index: -1;
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    height: 100px;
}
.cont_news.active{
    z-index: 1001;
}
.cont_news textarea {
    width: 100%;
    height: 100%;
    border: 0;
    outline: none;
    resize: none;
}
.cont_news_btn {
    background: #000;
    color: #fff;
    font-size: 13px;
    display: inline-block;
    padding: 6px 20px;
}
        
</style>
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
                            <div class="like" data_id="{{ $reading->id }}">
                                <img src="/dist/static/img/hongxin.png" alt="">
                                <span class"num">12</span>
                            </div>
                            <div class="news">
                                <img src="/dist/static/img/xiaoxi.png" alt="">
                                <span class="num">12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
          @endif
        <div class="modal"></div>
        <div class="cont_news">
            <textarea id="aaa"></textarea>
            <div class="cont_news_btn">评论</div>
        </div>
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
@include('include.sidebar', ['user' => $user])


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>
$(function () {
        $('.sex_item').on('click', function() {
                $(this).addClass('active').siblings('.sex_item').removeClass('active')
            })
            $('.lang_item').on('click', function() {
                $(this).addClass('active').siblings('.lang_item').removeClass('active')
            })

            $('.menu_icon').on('click', function() {
              $('.drawer_l, .modal').addClass('active')
              $('.index-container').addClass('hide')
            })
            $('.modal, .close_btn').on('click', function() {
              $('.drawer_l, .dense_r, .modal').removeClass('active')
              $('.index-container').removeClass('hide')
            })
            $('.drawer_item').on('click', function() {
              $(this).children('.md-inset').toggleClass('active');
              $(this).siblings('.drawer_item').children('.md-inset').removeClass('active')
            })
            $('.thumb').on('click', function() {
              $('.dense_r, .modal').addClass('active')
              $('.index-container').addClass('hide')
            })

            $('.news').on('click', function () {
                $('.cont_news').addClass('active').siblings('.modal').addClass('active');
            })

            $('.cont_news_btn').on('click', function () {
                var content = $('#aaa').val();
                $.ajax({
                    url: 'api/reading/comment/add',
                    data: {
                        reading_id: {{ $reading->id }},
                        content: content
                    },
                    success: function (res) {
                        console.log(res)
                        $('.cont_news').removeClass('active').siblings('.modal').removeClass('active');
                    }
                })
            })
            
            $('.like').on('click', function () {
                var id = $(this).attr('data_id');
                var num = $(this).children('.num')
                $.ajax({
                    url: 'api/reading/like',
                    data: {
                        reading_id: id
                    },
                    success: function (res) {
                        console.log(res)
                        num.text(res.data.likes)
                    }
                })
            })
    })
</script>
</body>
</html>