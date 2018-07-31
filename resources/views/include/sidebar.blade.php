     <div class="drawer md-dense dense_r">
        <div class="panel">
          <div class="drawer-title">
            <img class="close_btn" src="/dist/static/img/close_icon.png" alt="">
          </div>
          <div class="thumb_l">
            <img src="/{{ $user->icon }}" alt="">
            <p class="username">{{ $user->name }}</p>
            <input style="display: none" class="username_input" type="text" placeholder="{{ $user->name }}">
            <p class="city">{{ __('城市') }}: {{ $user->city }}</p>
          </div>
          <div class="panel_item">
            <p>{{ __('消息') }}</p>
          </div>
          <div class="panel_item">
            <p><a href="/group/points/list">{{ __('排行榜') }}</p>
          </div>
          <button class="setting md-dense md-raised md-primary">{{ __('设置') }}</button>
          <button style="display: none" class="save md-dense md-raised md-primary">{{ __('保存') }}</button>
        </div>
      </div>

      <script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
      <script>
        $('.setting').on('click', function () {
          var _this = $(this);
          $('.save').show();
          $(this).hide();
          $('.username_input').show().siblings('.username').hide()
        });
        $('.save').on('click', function() {
          var _this = $(this);
          $('.setting').show();
          $(this).hide();
          var name = $('.username_input').val();
          $('.username').show().siblings('.username_input').hide();
          $.ajax({
            url: '/api/user/update',
            data: {
              name: name
            },
            success: function (res) {
              console.log(res)
            }
          })
        })
      </script>