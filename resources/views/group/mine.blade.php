<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('我的小组') }} - {{ __('活动分组') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

   <div class="index-container" :class="{'hide': showDrawer || showUser}">
      <div class="head">
        <div class="nav">
          <div class="back"><a href="/"><img src="/dist/static/img/back.png" alt=""></a></div>
          <div class="citys">
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('北京') }}">{{ __('北京') }}</a>
                </div>
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('上海') }}">{{ __('上海') }}</a>
                </div>
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('广州') }}">{{ __('广州') }}</a>
                </div>
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('西安') }}">{{ __('西安') }}</a>
                </div>
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('苏州') }}">{{ __('苏州') }}</a>
                </div>
                <div class="city"><a style="color: #ffffff;" href="/group/{{ __('杭州') }}">{{ __('杭州') }}</a>
                </div>
          </div>
          <div class="md-toolbar-section-end">
            <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
          </div>
        </div>
      </div>

      <div class="search_bar">
        <div class="num">{{ __('已分组人数') }}：{{ $do_number }}  |  {{ __('未分组人数') }}：{{ $undo_number }}</div>
      </div>

      @if($my_group)
      <div class="group_cards">
        <div class="group_new">
          <div class="df">
            <div class="group_name">
              <label for="">{{ __('小组名称') }}</label>
              <span>{{ $my_group->name }}</span>
            </div>
            <div class="black">{{ __('积分') }}：{{ $my_group->points }}</div>
          </div>
          <div>
            <div class="leader">{{ __('组长') }}</div>
            <div class="df wrap">
              <div class="member">
                <img src="/{{ $my_group->leader->icon }}" alt="">
                <p>{{ $my_group->leader->name }}</p>
              </div>
            </div>
          </div>
          <div>
            <div class="leader">{{ __('成员') }}</div>
            <div class="df wrap">
              @if(count($my_group->members) >0 )
              @foreach($my_group->members as $member)
              <div class="member">
                <img src="/{{ $member->user->icon}}" alt="">
                <p>{{ $member->user->name}}</p>
              </div>
              @endforeach
              @endif
            </div>
          </div>
          <div class="join_btn"><a style="color: #ffffff;" href="/group/quit">{{ __('退出小组') }}</a></div>
        </div>
      </div>
      @endif
  </div>

  <div class="modal"></div>
  @include('include.sidebar')

    <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
    <script>
        $(function () {
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