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
.recommendContent {
    padding-bottom: 50px;
}
.recommendContent .borderhas .appreciate .right div img {
    width: .7rem;
    height: .6rem;
    margin-right: 6px;
}
.recommendContent .borderhas {
    margin-top: 0;
}
.link_where {
    background: #fff;
    color: #000;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    transition:-webkit-transform .6s cubic-bezier(.55,0,.1,1);
    transition:transform .6s cubic-bezier(.55,0,.1,1);
    transition:transform .6s cubic-bezier(.55,0,.1,1),-webkit-transform .6s cubic-bezier(.55,0,.1,1);
    -webkit-transform: translateY(100%);
    -ms-transform: translateY(100%);
    -o-transform: translateY(100%);
    transform: translateY(100%);
    z-index: 1001;
    text-align: center;
}
.close_btn {
    border-top: 1px solid #ccc;
}
.link_where div {
    font-size: 14px;
    padding: 15px;
    border-bottom: 1px solid #ccc;
}
.link_where a {
    display: block;
}
.link_where.active {
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
}
.martop1rem .images .item img {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    transform: translateY(-50%);
    left: 0;
    right: 0;
    width: 100%;
    height: auto;
}
.martop1rem .images {
    display: flex;
    flex-wrap: wrap;
    padding: 0 0.5rem;
    overflow: hidden;
    -webkit-column-count: initial;
    -moz-column-count: initial;
    column-count: initial;
}
.martop1rem .images .item {
    padding-bottom: 0;
    width: 5.5rem;
    height: 5.5rem;
    overflow: hidden;
    margin-right: 0.5rem;
    margin-bottom: 0.4rem;
    position: relative;
}
.martop1rem .images .item:nth-child(3n) {
    margin-right: 0;
}
.img_view {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    opacity: 0;
    background: rgba(0,0,0,.8);
    overflow-y: scroll;
    transition:all .6s cubic-bezier(.55,0,.1,1);
}
.img_view.active {
    z-index: 1004;
    opacity: 1;
}
.img_view img {
    max-width: 96%;
    display: block;
    position: absolute;
    top: 50%;
    transform: translate(-50%,-50%);
    left: 50%;
}

  .martop1rem .plan .planContent, .martop1rem .plan .title {
    border-bottom: 1px solid red;
    border-top: 1px solid red;
    border-left: 0;
    border-right: 0;
  }
  .martop1rem .plan .title {
    margin: 0 1px;
    font-size: 0.8rem;
    font-weight: 500;
  }
  .martop1rem .plan .planContent:first-child {
    border-top: 0;
  }
  .martop1rem .plan .planContent:last-child {
    border-bottom: 0;
  }
  .plan {
    background: url(/dist/static/img/post_bnd.png) no-repeat center center / 100% 100%;
  }
  .pc_t {
    font-size: 0.8rem;
    margin-bottom: 10px;
  }
  .martop1rem .plan .planContent textarea, .martop1rem .plan .title textarea {
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    border: 0;
  }
  .add_plan {
    float: right;
    font-weight: 400;
    font-size: 0.7rem;
  }
  .years_input {
    border-bottom: 1px solid #000;
    outline: none;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    appearance: none;
    -webkit-appearance: none;
    width: 50px;
    text-align: center;
  }
  .plan_title_wrap {
      position: relative;
      border-bottom: 1px solid red;
        background: #eee;
        padding: 20px;
        font-size: 14px;
  }
  .plan_list {
    border: 1px solid red;
  }
  .plan_item {
      /* padding: 0 20px; */
  }
  .swiper-pagination {
    right: 10px;
    top: 50%;
    margin-top: -9px;
  }
  .swiper-pagination-bullet-active {
    background: #ef3d42;
  }
  .swiper-pagination-bullet {
      margin: 0 5px;
  }
  .plan_pre_pd {
    min-height: 60px;
    padding: 10px 20px;
    border-bottom: 1px solid red;
    font-size: 14px;
  }
  .plan_prewview_div {
      padding: 30px 0 60px;
  }
  .plan_input_div {
      padding: 0 0 60px;
  }
  .del_plan {
      margin-right: 10px;
  }
  .recommendContent .borderhas .desc {
      color: #666;
  }
  .martop1rem .images.col-2 .item {
    width: 9rem;
    height: 12rem;
  }
  .martop1rem .images.col-2 .item:nth-child(2) {
      margin-right: 0;
  }
</style>
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
    <div class="img_view">
        <img src="" alt="">
    </div>
    <section>
        <div class="recommendTop">
        <!-- <a href="/freetalk/photo/add"> -->
            <div class="blacktitle" id="pub">
                {{ __('发布') }}
                <!-- 发布照片的url /freetalk/photo/add -->
            </div>
        <!-- </a> -->
        </div>
        <div class="recommendContent">
            @if(count($freetalks) > 0)
            @foreach ($freetalks as $key=>$freetalk)

            @if($freetalk->type == 'plan')
            <div class="cont_cus">
            <div class="martop1rem">
                 <div class="borderhas">
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ @$freetalk->user->icon }}" alt="">
                            <p>{{ @$freetalk->user->name }}</p>
                        </div>
                    </div>
                    <div class="plan_list">
                        <div class="plan_item">
                            <div class="plan_title_wrap">
                                <div class="title">{{ __('我的计划') }} # <span class="plan_preview_num">1</span></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                	@foreach($freetalk->letter->letter_plans as $key=>$plan)
                                    <div class="swiper-slide">
                                        <div class="planContent">
                                            <div class="plan_pre_pd">{{ $plan->what}}</div>
                                        </div>
                                        <div class="planContent">
                                            <div class="plan_pre_pd">{{ $plan->how}}</div>
                                        </div>
                                        <div class="planContent">
                                            <div class="plan_pre_pd">{{ $plan->when}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="biaoti"></p>
                    <p class="desc">{{ $freetalk->content }}</p>
                    <div class="appreciate">
                        <div class="left">
                            <p class="time">{{ $freetalk->time }}</p>
                        </div>
                        <div class="right">
                            <div class="like" data_id="{{ $freetalk->id }}">
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
                <div class="preview_textarea_wrap" style="display: none">
                    <textarea class="preview_textarea" name="" cols="5"></textarea>
                    <div class="send_btn" data_id="{{ $freetalk->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endif

            @if($freetalk->type == 'photo' && $freetalk->photo_number == 1)
            <div class="cont_cus">
                <div class="martop1rem">
                    <div class="borderhas">
                        <div class="appreciate">
                            <div class="left">
                                <img src="/{{ @$freetalk->user->icon }}" alt="">
                                <p>{{ @$freetalk->user->name }}</p>
                            </div>
                        </div>
                        <div class="img_triger">
                            <img src="{{ $freetalk->real_photos}}" alt="" width="100%">
                        </div>
                        <p class="biaoti"></p>
                        <p class="desc">{{ $freetalk->content }}</p>
                        <div class="appreciate">
                            <div class="left">
                                <p class="time">{{ $freetalk->time }}</p>
                            </div>
                            <div class="right">
                                <div class="like" data_id="{{ $freetalk->id }}">
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
                <div class="preview_textarea_wrap" style="display: none">
                    <textarea class="preview_textarea" name="" cols="5"></textarea>
                    <div class="send_btn" data_id="{{ $freetalk->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endif

            @if($freetalk->type == 'photo' && $freetalk->photo_number == 0)
            <div class="cont_cus">
                <div class="martop1rem">
                    <div class="borderhas">
                        <div class="appreciate">
                            <div class="left">
                                <img src="/{{ @$freetalk->user->icon }}" alt="">
                                <p>{{ @$freetalk->user->name }}</p>
                            </div>
                        </div>
                        <p class="biaoti"></p>
                        <p class="desc">{{ $freetalk->content }}</p>
                        <div class="appreciate">
                            <div class="left">
                                <p class="time">{{ $freetalk->time }}</p>
                            </div>
                            <div class="right">
                                <div class="like" data_id="{{ $freetalk->id }}">
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
                <div class="preview_textarea_wrap" style="display: none">
                    <textarea class="preview_textarea" name="" cols="5"></textarea>
                    <div class="send_btn" data_id="{{ $freetalk->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endif

            @if($freetalk->type == 'photo' && $freetalk->photo_number > 1)
            <div class="cont_cus">
            <div class="martop1rem">
                 <div class="borderhas">
                    <div class="appreciate">
                        <div class="left">
                            <img src="/{{ @$freetalk->user->icon }}" alt="">
                            <p>{{ @$freetalk->user->name }}</p>
                        </div>
                    </div>
                <div class="images col-2">
                   @foreach ($freetalk->real_photos as $photo)
                    <div class="item img_triger">
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
                        <div class="like" data_id="{{ $freetalk->id }}">
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
            <div class="preview_textarea_wrap" style="display: none">
                    <textarea class="preview_textarea" name="" cols="5"></textarea>
                    <div class="send_btn" data_id="{{ $freetalk->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endif
            @if(count(@$freetalk->comments)>0)
            <div>
            @foreach ($freetalk->commentsList as $comment)
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
                    <div class="send_btn" data_id="{{ $freetalk->id }}" parent_id="{{ $comment->id }}">
                        <img class="send_btn_img" src="/dist/static/img/send_btn.png" alt="">
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            @endif
            @endforeach
            @endif
        </div>
        <div class="link_where">
            <div><a href="/freetalk/photo/add">照片</a></div>
            <div><a href="/freetalk/plan/add">行动计划</a></div>
            <div class="close_btn">取消</div>
        </div>
        <!-- <div class="recommendBottom">
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
        </div> -->
    </section>
    <footer>
        <!-- <div class="bootmbutton">
            Send Message
        </div> -->
    </footer>
    @include('include.sidebar')
</div>
<!-- <div style="padding-bottom: 80px"></div> -->

<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script src="/dist/static/vendor/swiper-3.4.0.jquery.min.js"></script>
<script>
$(function () {
    var mySwiper = new Swiper ('.swiper-container', {
        loop: false,
        pagination : '.swiper-pagination',
        onSlideChangeStart: function (swiper) {
            var plan_preview_num = swiper.activeIndex +1;
            $('.plan_preview_num').text(plan_preview_num)
        }
    })
    $('.img_triger').on('click', function (e) {
        e.stopPropagation();
        // $('.index-container').addClass('hide')
        var img_preview = $(this).children('img').attr('src')
        $('.img_view').addClass('active').children('img').attr('src',img_preview)
    })
    $('.img_view').on('click', function (e) {
        e.stopPropagation();
        $(this).removeClass('active')
        // $('.index-container').removeClass('hide')
    })
    $('#pub').on('click',function () {
        $('.link_where, .modal').addClass('active')
    })
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
        $('.drawer_l, .dense_r, .modal, .link_where').removeClass('active')
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
    function addComment(reading_id, content, parent_id) {
        $.ajax({
            url: '/api/freetalk/comment/add',
            data: {
                freetalk_id: reading_id,
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
    })
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
        var num = $(this).children('.num');
        $.ajax({
            url: '/api/freetalk/like/add',
            data: {
                freetalk_id: id
            },
            success: function (res) {
                window.location.reload();
                num.text(res.data.likes)
            }
        })
    })
})
</script>
</body>
</html>