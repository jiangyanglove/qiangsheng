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
    /* z-index: -1; */
    /* position: fixed; */
    /* top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%; */
    height: 100px;
    border: 1px solid #000;
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
.preview_textarea_wrap {
    margin: 20px 0;
    padding: 10px 60px 10px 10px;
    border: 1px solid #eee;
    box-shadow: inset 0 0 20px -8px rgba(0,0,0,0.5);
    position: relative;
    box-sizing: border-box;
}
.recommendBottom .border1px .comment {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: flex-start;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 19.8rem;
    margin-left: .9rem;
    padding: 1.3rem 0;
    justify-content: flex-start;
}
.recommendBottom .border1px .comment .left {
    margin-right: 20px;
}
.recommendBottom {
    border-bottom: 0;
}
.recommendContent .borderhas .appreciate .right div {
    padding: 10px;
}
.send_btn {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 46px;
    background: #ef3d42;
    top: 0;
}
.send_btn img {
    position: absolute;
    width: 100%;
    top: 50%;
    left: 0;
    right: 0;
    margin-top: -17px;
}
.cus_img {
    border: 1px solid #ccc;
    border-bottom: 0;
}
.cus_img img {
    display: block;
}
.trigger_comment:first-child .recommendBottom .border1px {
    border-top: 0;
}
.recommendContent .borderhas .appreciate .right div img {
    width: .7rem;
    height: .6rem;
    margin-right: 6px;
}
.recommendContent .borderhas {
    margin-top: 0;
}
</style>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
            <div class="citys">
                <div class="city @if($type == 'new')active @endif"><a style="color: #ffffff;" href="/reading/new">{{ __('最新') }}</a></div>
                <div class="city @if($type == 'hot')active @endif"><a style="color: #ffffff;" href="/reading/hot">{{ __('热门') }}</a></div>
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
        <div class="cont_cus" data_id="{{ $reading->id }}">
            <div class="martop1rem">
                <div class="cus_img">
                    <img src="{{ $reading->icon }}" alt="" width="100%">
                </div>
                <div class="borderhas">
                    <p class="biaoti">{{ $reading->name }}</p>
                    <p class="desc">{{ $reading->description }}</p>
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ @$reading->user->icon }}" alt="">
                            <p>{{ @$reading->user->name }}</p>
                        </div>
                        <div class="right">
                            <div class="like" data_id="{{ $reading->id }}">
                                <img src="/dist/static/img/hongxin.png" alt="">
                                <span class"num">{{ $reading->likes }}</span>
                            </div>
                            <div class="news" data_id="{{ $reading->id }}">
                                <img src="/dist/static/img/xiaoxi.png" alt="">
                                <span class="num">{{ $reading->comments }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="preview_textarea_wrap" style="display: none">
                <textarea class="preview_textarea" name="" cols="5"></textarea>
                <div class="send_btn" data_id="{{ $reading->id }}">
                    <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                </div>
            </div>
            @if(count(@$reading->comments)>0)
            <div>
            @foreach ($reading->commentsList as $comment)
            <div class="trigger_comment">
                <div class="recommendBottom">
                    <div class="border1px">
                        <div class="comment">
                            <div class="left">
                                <img src="/{{ @$comment->user->icon }}" alt="">
                            </div>
                            <div class="right">
                                <p class="information">
                                    <span class="name">{{ @$comment->user->name }}</span>
                                    <span class="time">{{ @$comment->time }}</span>
                                </p>
                                @if($comment->parent >0)<p class="one">{{ __('回复') }}<span class="three">{{ @$comment->parent_user_name }}</span></p>@endif
                                <p class="two">”{{ @$comment->content }}”</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="preview_textarea_wrap" style="display: none">
                    <textarea class="preview_textarea" name="" cols="5"></textarea>
                    <div class="send_btn" data_id="{{ $reading->id }}" parent_id="{{ $comment->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @endif
        </div>
          @endforeach
          @endif
    </section>
@include('include.sidebar')


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
              $('.cont_news').removeClass('active')
            })
            $('.drawer_item').on('click', function() {
              $(this).children('.md-inset').toggleClass('active');
              $(this).siblings('.drawer_item').children('.md-inset').removeClass('active')
            })
            $('.thumb').on('click', function() {
              $('.dense_r, .modal').addClass('active')
              $('.index-container').addClass('hide')
            })

            var news_id;
            $('.cont_cus').on('click', function() {
                news_id = $(this).attr('data_id');
                $(this).children('.preview_textarea_wrap').fadeToggle().children('.preview_textarea').focus();
            })
            $('.preview_textarea').on('click', function (event) {
                event.stopPropagation();
            })
            $('.trigger_comment').on('click', function(event) {
                event.stopPropagation();
                $(this).children('.preview_textarea_wrap').fadeToggle().children('.preview_textarea').focus();
                // addComment(data_id, )
            })
            function addComment(reading_id, content, parent_id) {
                $.ajax({
                    url: 'api/reading/comment/add',
                    data: {
                        reading_id: reading_id,
                        content: content,
                        parent: parent_id
                    },
                    success: function (res) {
                        if (res.code == 0) {
                            window.location.reload();
                        } else {
                            alert(res.error_msg)
                        }
                    }
                })
            }
            $('.send_btn').on('click', function (event) {
                var content = $(this).siblings('.preview_textarea').val();
                var parent_id = $(this).attr('parent_id');
                var data_id = $(this).attr('data_id');
                event.stopPropagation();
                addComment(data_id, content, parent_id)
            })

            $('.like').on('click', function (e) {
                e.stopPropagation();
                var id = $(this).attr('data_id');
                var num = $(this).children('.num')
                $.ajax({
                    url: '/api/reading/like/add',
                    data: {
                        reading_id: id
                    },
                    success: function (res) {
                        console.log(res)
                        window.location.reload();
                        num.text(res.data.likes)
                    }
                })
            })
    })
</script>
</body>
</html>