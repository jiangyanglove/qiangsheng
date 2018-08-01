<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('排行榜') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
     <div class="head">
     <div class="nav">
       <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
       <div class="citys">
         <div class="city"><a href="/group/points/list">{{ __('团队') }}</a></div>
         <div class="city active">{{ __('个人') }}</div>
       </div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="group_cards group_mans">
      <div class="group_man" style="background-color: #c3c3c3;">
        <div class="l">
          <img src="/{{ $user->icon }}" alt="">
          <div class="l_r">
            <div>{{ $user->name }}</div>
            <div>{{ __('城市') }}：{{ __($user->city) }}</div>
          </div>
        </div>
        <div class="r">
          {{ __('积分') }}：{{ $user->points }}
        </div>
      </div>
      @foreach ($other_users as $u)
      <div class="group_man">
        <div class="l">
          <img src="/{{ $user->icon }}" alt="">
          <div class="l_r">
            <div>{{ $u->name }}</div>
            <div>{{ __('城市') }}：{{ __($u->city) }}</div>
          </div>
        </div>
        <div class="r">
          {{ __('积分') }}：{{ $u->points }}
        </div>
      </div>
      @endforeach
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