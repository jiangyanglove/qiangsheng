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
            <input type="hidden" id="letter_id" value="{{ $letter->id }}" />
            <input type="hidden" id="type" value="plan" />
            @if($letter)
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
            {{ __('还没有行动计划') }}
            @endif
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