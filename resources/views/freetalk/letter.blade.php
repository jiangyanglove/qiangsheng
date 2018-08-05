<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('未来邮局') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <link rel="stylesheet" href="/dist/static/style/recommend.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<style>
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
</style>
<body>

<div class="index-container">
    <header class="head">
        <div class="nav">
            <a href="javascript:history.back()"><div class="back"><img src="/dist/static/img/back.png" alt=""></div></a>
            <div class="citys">
                <div class="city"><a style="color: #ffffff;" href="/freetalk/new">{{ __('最新') }}</a></div>
                <div class="city"><a style="color: #ffffff;" href="/freetalk/hot">{{ __('热门') }}</a></div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </header>
    @if(!$letter)
    <div class="plan_input_div">
        <section>
            <div class="recommendTop">
                <a href="javascript:history.back()">
                <div class="blacktitle">
                    {{ __('取消') }}
                </div>
                </a>
            </div>
            <div class="recommendContent">
                <div class="martop1rem">
                    <div class="plan">
                        <div class="planContent">
                            <h4 class="pc_t">
                                @if($lang == 'zh_cn')TO<input type="number" class="years_input">年后的自己@endif
                                @if($lang == 'en')To myself after <input type="number" class="years_input"> years</span>@endif
                            </h4>
                            <textarea class="letter" placeholder="{{ __('做什么') }}..."></textarea>
                        </div>
                        <div class="plan_list">
                            <div class="plan_item">
                                <div class="title">{{ __('我的计划') }} # 1
                                    <span class="add_plan" onclick='addPlan(this)'>{{ __('添加计划') }}+</span>
                                </div>
                                <div class="planContent">
                                    <textarea class="plan_what" placeholder="{{ __('做什么') }}..."></textarea>
                                </div>
                                <div class="planContent">
                                    <textarea class="plan_how" placeholder="{{ __('如何做') }}..."></textarea>
                                </div>
                                <div class="planContent">
                                    <textarea class="plan_when" placeholder="{{ __('开始/结束') }}..."></textarea>
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
    @endif
    @if($letter)
    <div class="plan_prewview_div">
        <div class="recommendContent">
            <div class="martop1rem">
                <div class="plan">
                    <div class="planContent">
                        <h4 class="pc_t">
                                @if($lang == 'zh_cn')To<span>{{ $letter->years }}</span>{{ __('年后的自己') }}@endif
                                @if($lang == 'en')To myself after <span>{{ $letter->years }} years</span>@endif
                        </h4>

                        <div>{{ $letter->contents }}</div>
                    </div>
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
            </div>
        </div>
    </div>
    @endif

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

var plan_num = 1
$(function () {
    $('.bootmbuttonSmall').on('click', function () {
        var years = $('.years_input').val();
        var letter = $('.letter').val();
        var plans = [];
        var plan_list = $('.plan_list');
        $('.plan_item').each(function (i) {
            var _this = $(this);
            var what = _this.find('.plan_what').val();
            var how = _this.find('.plan_how').val();
            var when = _this.find('.plan_when').val();
            var plan_item = {
                what: what,
                how: how,
                when: when
            }
            plans.push(plan_item)
        })
        var plans_str = JSON.stringify(plans)
        $.ajax({
            url: '/api/post/letter/add',
            data: {
                "years": years,
                "contents": letter,
                "plans": plans_str
            },
            traditional: true,
            success: function (res) {
                console.log(res)
                if (res.code === 2) {
                    alert(res.error_msg)
                    return false
                }
                if (res.code === 0) {
                	var success_tip = '{{ __("提交成功") }}';
                    alert(success_tip)
                    window.location.href = "/"
                }
            }
        })
    })
})
function addPlan () {
        if (plan_num === 5) {
        	 @if($lang == 'zh_cn')
        	 var tip = '最多可添加5条计划';
        	 @endif

        	 @if($lang == 'en')
        	 var tip = 'You can add up to 5 plans';
        	 @endif
            alert(tip);
            return false;
        }
        plan_num ++
        var my_plan_lang = '{{ __("我的计划") }}';
        var add_plan_lang = '{{ __("添加计划") }}';
        var what_lang = '{{ __("做什么") }}';
        var how_lang = '{{ __("如何做") }}';
        var when_lang ='{{ __("开始/结束") }}';
        var plan_str = "<div class='plan_item'>" +
                            "<div class='title'>" + my_plan_lang + '#' + plan_num +
                                "<span class='add_plan' onclick='addPlan(this)'>" + add_plan_lang + '+' + "</span>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_what' placeholder=" + what_lang + "..." + "></textarea>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_how' placeholder=" + how_lang + "..." + "></textarea>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_when' placeholder=" + when_lang + "..." + "></textarea>" +
                            "</div>" +
                        "</div>"
        $('.plan_list').append(plan_str)
    }
</script>
</body>
</html>