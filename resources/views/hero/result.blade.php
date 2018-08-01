<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('匹配英雄') }} - {{ __('DISC测评') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<style>
  .test_f {
    padding: 20px;
    line-height: 1.5;
  }
  .test_f .red {
    color: #ef3d42;
    font-size: 12px;
  }
  .test_f p {
    font-size: 10px;
    color: #000;
  }
  .test_f h3 {
    font-size: 12px;
  }
  .test_f img {
    display: block;
    margin: 50px auto;
    width: 60%;
  }
</style>
<body>

   <div class="index-container">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

     <div class="test_f">
       <h4 class="red">@if($lang == 'en'){{ $hero->title_en }} @else {{ $hero->title }} @endif</h4>
       <p>@if($lang == 'en'){{ $hero->explanations_en }} @else {{ $hero->explanations }} @endif</p>
       @if($hero->when_at_work)<h3>{{ __('工作时') }}：</h3>
       <p>@if($lang == 'en'){{ $hero->when_at_work_en }} @else {{ $hero->when_at_work }} @endif</p>
       @endif
       <h3>{{ __('匹配英雄') }}：@if($lang == 'en'){{ $hero->hero_name_en }} @else {{ $hero->hero_name }} @endif</h3>
        <p>@if($lang == 'en'){{ $hero->hero_desc_en }} @else {{ $hero->hero_desc }} @endif</p>
        <img src="/images/hero/{{ $hero->icon }}" alt="">
     </div>

    <div class="modal"></div>
    @include('include.sidebar', ['user' => $user])
 </div>

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script src="/dist/static/vendor/swiper-3.4.0.jquery.min.js"></script>
    <script>
        $(function () {
            var mySwiper = new Swiper ('.swiper-container', {
               loop: false,
               pagination : '.swiper-pagination',
               prevButton:'.swiper-button-prev',
               nextButton:'.swiper-button-next',
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
            $('.qu_item').on('click', function() {
              $(this).addClass('active').siblings('.qu_item').removeClass('active');
            })
        })
    </script>
</body>
</html>