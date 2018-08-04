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
        <div class="recommendContent">
            <div class="martop1rem">
                <div class="plan">
                        <div class="planContent">
                            <h4 class="pc_t">TO<input type="number" class="years_input">年后的自己</h4>
                            <textarea class="letter" placeholder="{{ __('年后的自己') }}做什么..."></textarea>
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
            发布
        </div>
    </footer>
</div>


<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>
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
        // console.log(years)
        console.log(plans)
        // console.log(letter)
        $.ajax({
            url: '/api/post/letter/add',
            data: {
                "years": years,
                "contents": letter,
                "plans": plans
            },
            traditional: true,
            success: function (res) {
                console.log(res)
            }
        })
    })
})
function addPlan () {
        if (plan_num === 5) {
            alert('最多可添加5条计划');
            return false;
        }
        plan_num ++
        var plan_str = "<div class='plan_item'>" + 
                            "<div class='title'>" + '我的计划' + '#' + plan_num +
                                "<span class='add_plan' onclick='addPlan(this)'>" + '添加计划+' + "</span>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_what' placeholder=" + '做什么' + "..." + "></textarea>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_how' placeholder=" + '如何做' + "..." + "></textarea>" +
                            "</div>" +
                            "<div class='planContent'>" +
                                "<textarea class='plan_when' placeholder=" + '开始/结束' + "..." + "></textarea>" + 
                            "</div>" + 
                        "</div>"
        $('.plan_list').append(plan_str)
    }
</script>
</body>
</html>