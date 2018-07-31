<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('精彩预告') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="javascript:history.back(-1)"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="citys">
         <div class="city @if($week == 1) active @endif"><a href="/preview/1">{{ __('第一周') }}</a></div>
         <div class="city" @if($week == 1) active @endif><a href="/preview/2">{{ __('第二周') }}</a></div>
         <div class="city" @if($week == 1) active @endif><a href="/preview/2">{{ __('第三周') }}</a></div>
         <div class="city" @if($week == 1) active @endif><a href="/preview/2">{{ __('第四周') }}</a></div>
       </div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="preview_cards">
      @if(count($weeknotices)>0)
      @foreach ($weeknotices as $o)
      <div class="preview_card">
        <img src="{{ $o->icon }}" alt="">
        <div class="preview_txt">
          <h4>{{ $o->name }}</h4>
          <p>{{ $o->name }}</p>
          <div class="btn">{{ __('我要提问') }}</div>
        </div>
      </div>
      @endforeach
      @endif
    </div>

    <div class="preview_textarea_wrap">
      <textarea class="preview_textarea" name="" id="" cols="5"></textarea>
    </div>

    <div class="preview_conts">
      @if(count($weekfaqs)>0)
      @foreach ($weekfaqs as $q)
      <div class="preview_cont">
        <div class="l">
          <img src="/{{ $q->user->icon }}" alt="">
          <div class="c">
            <h4>{{ $q->user->name }}</h4>
            <p>{{ $q->content }}</p>
          </div>
        </div>
        <span class="time">{{ $q->created_at }}</span>
      </div>
      @endforeach
      @endif
    </div>

    <div class="modal"></div>
    @include('include.sidebar', ['user' => $user])
 </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script>
        $(function () {
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
        })
    </script>
</body>
</html>