<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('行动计划') }} - {{ __('自由讨论') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/recommend.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<style>
  .martop1rem .plan .planContent, .martop1rem .plan .title {
    border: 0;
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
    border: 0;
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
      padding: 10px 0 20px;
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
  .swiper-container {
      border: 1px solid red;
      border-top: 0;
  }
  .plan_title_wrap {
      border: 1px solid red;
  }
  .martop1rem .plan .planContent, .martop1rem .plan .title {
      border-bottom: 1px solid red;
  }
  .input_idea {
      padding: 20px;
      border: 1px solid #666;
      margin-top: 10px;
  }
  .input_idea_in textarea {
      width: 100%;
      display: block;
      border: 0;
      font-size: 14px;
      outline: none;
      resize: none;
      line-height: 1.5;
  }
  footer {
      padding-bottom: 50px;
  }
  .bootmbuttonSmall {
      margin-top: -20px;
  }
</style>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <a href="/freetalk"><div class="back"><img src="/dist/static/img/back.png" alt=""></div></a>
            <div class="citys">
                <div class="city"><a style="color: #ffffff;" href="/freetalk/new">{{ __('最新') }}</a></div>
                <div class="city"><a style="color: #ffffff;" href="/freetalk/hot">{{ __('热门') }}</a></div>
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
        <!-- <div class="recommendContent"> -->
            <input type="hidden" id="letter_id" value="{{ $letter->id }}" />
            <!-- <input type="hidden" id="type" value="plan" /> -->
            <!-- @if($letter)
            <div class="martop1rem">
                <div class="plan">
                        <div class="planContent">
                            <h4 style="margin-bottom: 10px">
                                @if($lang == 'zh_cn')To<span>{{ $letter->years }}</span>{{ __('年后的自己') }}@endif
                                @if($lang == 'en')To myself after <span>{{ $letter->years }} years</span>@endif
                            </h4>

                            <textarea>{{ $letter->contents }}</textarea>
                        </div>
                        @foreach($plans as $key=>$plan)
                        @if($key == 0)
                        <div class="title">{{ __('我的计划') }} # {{ $key+1}}
                            <p class="dot"><span class="red"></span><span></span><span></span><span></span></p>
                        </div>
                        @endif
                        <div class="planContent"><textarea>{{ $plan->what}}</textarea></div>
                        <div class="planContent"><textarea>{{ $plan->how}}</textarea></div>
                        <div class="planContent"><textarea>{{ $plan->when}}</textarea></div>
                        @endforeach
                    </div>
                <div class="textContent">
                    <textarea>|{{ __('这一刻的想法') }}...</textarea>
                </div>
            </div>
            @else
            {{ __('发布') }}
            @endif -->
            <!-- <div class="plan">
            <div class="plan_list">
                <div class="plan_item">
                    <div class="plan_title_wrap">
                        <div class="title">{{ __('我的计划') }} # <span class="plan_preview_num">1</span></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($plans as $key=>$plan)
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
            </div>
        </div> -->
        <div class="plan_prewview_div">
        <div class="recommendContent">
            <div class="martop1rem">
                <div class="plan">
                    <div class="plan_list">
                        <div class="plan_item">
                            <div class="plan_title_wrap">
                                <div class="title">{{ __('我的计划') }} # <span class="plan_preview_num">1</span></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                	@foreach($plans as $key=>$plan)
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
                    <div class="input_idea">
                        <div class="input_idea_in">
                            <textarea rows="6" id="idea_cont" placeholder="这一刻的想法"></textarea>
                        </div>
                    </div>
                </div>
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
<script src="/dist/static/vendor/swiper-3.4.0.jquery.min.js"></script>
<script>
var mySwiper = new Swiper ('.swiper-container', {
    loop: false,
    pagination : '.swiper-pagination',
    onSlideChangeStart: function (swiper) {
        var plan_preview_num = swiper.activeIndex +1;
        $('.plan_preview_num').text(plan_preview_num)
    }
})
$('.bootmbuttonSmall').on('click', function () {
    var letter_id = $('#letter_id').val();
    var content = $('#idea_cont').val();
    $.ajax({
        url: '/api/freetalk/add',
        data: {
            type: 'plan',
            content: content,
            letter_id: letter_id
        },
        success: function(res) {
            if (res.code === 0) {
                window.location.href = '/freetalk';
            } else {
                alert(res.error_msg)
            }
        }
    })
})
</script>
</body>
</html>