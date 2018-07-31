     <div class="drawer md-dense dense_r">
        <div class="panel">
          <div class="drawer-title">
            <img class="close_btn" src="/dist/static/img/close_icon.png" alt="">
          </div>
          <div class="thumb_l">
            <img src="/{{ $user->icon }}" alt="">
            <p class="username">{{ $user->name }}</p>
            <input class="username_input" type="text" placeholder="{{ $user->name }}">
            <p class="city">{{ __('城市') }}: {{ $user->city }}</p>
          </div>
          <div class="panel_item">
            <p>{{ __('消息') }}</p>
          </div>
          <div class="panel_item">
            <p><a href="/group/points/list">{{ __('排行榜') }}</p>
          </div>
          <button class="md-dense md-raised md-primary">{{ __('设置') }}</button>
        </div>
      </div>