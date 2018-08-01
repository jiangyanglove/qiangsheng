@extends('admin.layouts.main')
@section('content')
      <div class="row">
      	<div class="row">
      		<div class="col-md-12 text-right">
                <a href="/admin/user" class="link-black text-sm"><i class="fa fa-arrow-left margin-r-5"></i> 返回用户列表</a>
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
				@if($user->icon)<img src="/{{ $user->icon }}" class="profile-user-img img-responsive img-circle" width='30' height='30'>@else <img src="/images/user_icon_default{{ @$user->sex}}.png" class="profile-user-img img-responsive img-circle" width='30' height='30'>@endif
              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">wwid:{{ $user->wwid }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>姓名</b> <a class="pull-right">{{ $user->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>性别</b> <a class="pull-right">@if($user->sex == 1) 男 @endif @if($user->sex == 2) 女 @endif</a>
                </li>
                <li class="list-group-item">
                  <b>城市</b> <a class="pull-right">{{ $user->city }}</a>
                </li>
                <li class="list-group-item">
                  <b>积分</b> <a class="pull-right">{{ $user->points }}</a>
                </li>
                <li class="list-group-item">
                  <b>所在分组</b> <a class="pull-right">@if($user->group_id){{ @$user->group->name }} @else 尚未分组 @endif</a>
                </li>
                <li class="list-group-item">
                  <b>DISC测评时间</b> <a class="pull-right">{{ $user->disc_time }}</a>
                </li>
                <li class="list-group-item">
                  <b>匹配英雄</b> <a class="pull-right">{{ @$user->hero->hero_name }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-sm-8 col-md-8">
            <div class="box box-solid">
                <div class="box-body">
                    <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        其他信息
                    </h4>
                    <div class="media">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.row -->
@endsection