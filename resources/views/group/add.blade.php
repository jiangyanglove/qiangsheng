<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('添加') }} - {{ __('活动分组') }} - {{ __('中国强生财务职业发展月') }}</title>
    <link rel="stylesheet" href="/dist/static/style/index.css">
</head>
<body>

<div class="index-container" :class="{'hide': showDrawer || showUser}">
    <div class="head">
        <div class="nav">
            <div class="back">
                <a href="javascript:history.back(-1)">
                    <img src="/dist/static/img/back.png" alt=""></a>
            </div>
            <div class="citys">
                <div class="city @if($city == '北京') active @endif"><a style="color: #ffffff;"
                                                                      href="/group/{{ __('北京') }}">{{ __('北京') }}</a>
                </div>
                <div class="city @if($city == '上海') active @endif"><a style="color: #ffffff;"
                                                                      href="/group/{{ __('上海') }}">{{ __('上海') }}</a>
                </div>
                <div class="city @if($city == '广州') active @endif"><a style="color: #ffffff;"
                                                                      href="/group/{{ __('广州') }}">{{ __('广州') }}</a>
                </div>
                <div class="city @if($city == '西安') active @endif"><a style="color: #ffffff;"
                                                                      href="/group/{{ __('西安') }}">{{ __('西安') }}</a>
                </div>
                <div class="city @if($city == '苏州') active @endif"><a style="color: #ffffff;"
                                                                      href="/group/{{ __('苏州') }}">{{ __('苏州') }}</a>
                </div>
            </div>
            <div class="md-toolbar-section-end">
                <div class="thumb"><img src="/{{ $user->icon }}" alt=""></div>
            </div>
        </div>
    </div>

    <div class="search_bar">
        <div class="num">已分组人数：{{ $do_number }} | 未分组人数：{{ $undo_number }}</div>
        <div class="serarch_wrap">
            <div class="search">
                <input type="text" placeholder="搜索" id="search">
            </div>
            <a href="/group/add">
                <button class="search_btn">创建一个小组</button>
            </a>
        </div>
    </div>

    <div class="group_cards">
        <div class="group_new">
            <div class="df">
                <div class="group_name">
                    <label for="">小组名称</label>
                    <input type="text" id="group_name">
                </div>
                <div class="black">积分：{{ $user->points }}</div>
            </div>
            <div>
                <div class="leader">组长</div>
                <div class="df wrap">
                    <div class="member">
                        <img src="/{{ $user->icon }}" alt="">
                        <p>{{ $user->name }}</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="leader">成员</div>
                <div class="df wrap">
                    <!--               <div class="member">
                                    <img src="/dist/static/img/thumb_l.png" alt="">
                                    <p>Mila Yvovich</p>
                                  </div>
                                  <div class="member">
                                    <img src="/dist/static/img/thumb_l.png" alt="">
                                    <p>Mila Yvovich</p>
                                  </div> -->
                </div>
            </div>
            <div class="join_btn" id="create_group">创建小组</div>
        </div>
    </div>
</div>

<div class="modal"></div>
@include('include.sidebar', ['user' => $user])

<script src="/dist/static/vendor/jquery-3.1.1.min.js"></script>
<script>
    $(function () {
        $('.sex_item').on('click', function () {
            $(this).addClass('active').siblings('.sex_item').removeClass('active')
        })
        $('.lang_item').on('click', function () {
            $(this).addClass('active').siblings('.lang_item').removeClass('active')
        })
        $('.menu_icon').on('click', function () {
            $('.drawer_l, .modal').addClass('active')
            $('.index-container').addClass('hide')
        })
        $('.modal, .close_btn').on('click', function () {
            $('.drawer_l, .dense_r, .modal').removeClass('active')
            $('.index-container').removeClass('hide')
        })
        $('.drawer_item').on('click', function () {
            $(this).children('.md-inset').toggleClass('active');
            $(this).siblings('.drawer_item').children('.md-inset').removeClass('active')
        })
        $('.thumb').on('click', function () {
            $('.dense_r, .modal').addClass('active')
            $('.index-container').addClass('hide')
        })

        $('#create_group').on('click', function () {
            if (!$('#group_name').val()) {
                alert('请输入小组名称');
                return false;
            }
            $.ajax({
                url: '/api/group/make',
                type: 'GET',
                dataType: 'json',
                data: {
                    group_name: $('#group_name').val()
                },
                success: function (res) {
                    if (res.code === 0) {
                        // alert(res.error_msg)
                        window.location.href = '/';
                    } else {
                        alert('您已创建小组')
                    }
                }
            })
        })

        $('#search').on('keypress', function (event) {
            if (event.keyCode == 13) {
                if (!$('#search').val()) {
                    return false;
                }

                $.ajax({
                    url: '/api/group/search',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        group_name: $('#search').val()
                    },
                    success: function (res) {
                        // console.log(res)
                        // return false;
                        if (res.code === 0) {
                            if (res.data.group) {
                                $('.group_cards').html('');
                                var data = res.data.group;
                                var html = '';
                                html += '<div class="group_card">' +
                                    '    <div class="df item">' +
                                    '        <div class="red">小组名称：' + data.name + '</div>' +
                                    '            <div class="black">积分：' + data.points + '</div>' +
                                    '        </div>' +
                                    '        <div class="item member">' +
                                    '            <span class="fw">' + data.leader_name + '(组长)</span>'

                                for (var j = 0; j < data.members.length; j++) {
                                    html += '<span>' + data.members[j].user_name + '</span>'
                                }

                                html += '</div>' +
                                    '<div class="join_btn" data-id="' + data.id + '">申请加入</div>' +
                                    '</div>'
                                $('.group_cards').append(html);
                            }
                        }
                    }
                })
            }
        });
        // 加入小组
        $(document).on('click', '.join_btn', function () {
            $.ajax({
                url: '/api/group/join',
                type: 'GET',
                dataType: 'json',
                data: {
                    group_id: $(this).data('id')
                },
                success: function (res) {
                    if (res.code === 0) {
                        alert('您已成功加入该小组')
                        window.location.reload();
                    } else {
                        alert(res.error_msg)
                    }
                }
            })
        })
    })
</script>
</body>
</html>