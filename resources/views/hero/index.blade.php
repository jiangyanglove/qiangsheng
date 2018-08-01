<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('DISC测评') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
    <script type="text/javascript">
        　　document.documentElement.style.fontSize = document.documentElement.clientWidth / 23.3 + 'px';
    </script>
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="qu_swiper">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="qu_wrap">
          <h4  class="title">{{ __('一、在同事（同学）眼中您是一位？') }}</h4>
          <div class="qu">
            <div class="qu_item active">
              <span>{{ __('A:积极、热情、有行动力的人。') }}</span>
              <div class="check_box"><label for="qu1"></label><input type="radio" name="qu1" id="qu1"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('B:活泼、开朗、风趣幽默的人。') }}</span>
              <div class="check_box"><label for="qu2"></label><input type="radio" name="qu1" id="qu2"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('C:忠诚、随和、容易相处的人。') }}</span>
              <div class="check_box"><label for="qu3"></label><input type="radio" name="qu1" id="qu3"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('D:谨慎、冷静、注意细节的人。') }}</span>
              <div class="check_box"><label for="qu4"></label><input type="radio" name="qu1" id="qu4"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="qu_wrap">
          <h4  class="title">{{ __('二、您喜欢看哪一类型的杂志？') }}</h4>
          <div class="qu">
            <div class="qu_item active">
              <span>{{ __('A:管理、财经、趋势类。') }}</span>
              <div class="check_box"><label for="qu1"></label><input type="radio" name="qu1" id="qu1"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('B:旅游、美食、时尚类。') }}</span>
              <div class="check_box"><label for="qu2"></label><input type="radio" name="qu1" id="qu2"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('C:心灵、散文、家庭类。') }}</span>
              <div class="check_box"><label for="qu3"></label><input type="radio" name="qu1" id="qu3"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('D:科技、专业、艺术类。') }}</span>
              <div class="check_box"><label for="qu4"></label><input type="radio" name="qu1" id="qu4"></div>
            </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="qu_wrap">
          <h4  class="title">{{ __('三、您做决策的方式？') }}</h4>
          <div class="qu">
            <div class="qu_item active">
              <span>{{ __('A:希望能立即有效。') }}</span>
              <div class="check_box"><label for="qu1"></label><input type="radio" name="qu1" id="qu1"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('B:感觉重于一切。') }}</span>
              <div class="check_box"><label for="qu2"></label><input type="radio" name="qu1" id="qu2"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('C:有时间考虑或寻求他人意见。') }}</span>
              <div class="check_box"><label for="qu3"></label><input type="radio" name="qu1" id="qu3"></div>
            </div>
            <div class="qu_item">
              <span>{{ __('D:要有详细的资料评估。') }}</span>
              <div class="check_box"><label for="qu4"></label><input type="radio" name="qu1" id="qu4"></div>
            </div>
            </div>
          </div>
        </div>

      </div>
      <div class="arrows">
        <div class="swiper-button-prev swiper-button-red"></div>
        <div class="swiper-button-next swiper-button-red"></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <div class="bootmbutton">
        {{ __('提交') }}
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