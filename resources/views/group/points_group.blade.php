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
       <div class="back"><img src="/dist/static/img/back.png" alt=""></div>
       <div class="citys">
         <div class="city active">团队</div>
         <div class="city"><a href="/group/member/points/list">个人</a></div>
       </div>
       <div class="md-toolbar-section-end">
         <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
       </div>
     </div>
     </div>

    <div class="group_cards">
      @if($my_group)
      <div class="group_card">
         <div class="df item">
           <div class="red">小组名称：{{ $my_group->name }}</div>
           <div class="black">积分：{{ $my_group->points }}</div>
         </div>
         <div class="item member">
           <span class="fw">{{ $my_group->leader->name }}(组长)</span>
            @if(count($my_group->members) > 0)
            @foreach ($my_group->members as $member)
            <span>{{ $member->name }}</span>
            @endforeach
            @endif
         </div>
         <div class="join_btn">我的小组</div>
       </div>
      @endif

      @if(count($other_groups) > 0)
      @foreach ($other_groups as $group)
      <div class="group_card">
         <div class="df item">
           <div class="red">小组名称：{{ $group->name }}</div>
           <div class="black">积分：{{ $group->points }}</div>
         </div>
         <div class="item member">
           <span class="fw">{{ $group->leader->name }}(组长)</span>
            @if(count($group->members) > 0)
            @foreach ($group->members as $member)
           <span>john</span>
            @endforeach
            @endif
         </div>
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