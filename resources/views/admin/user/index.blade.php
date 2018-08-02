@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header text-right">
                <form method="GET" class="form-inline" action="{{ url('/admin/user') }}">
                    <div class="form-group">
                        <label for="name">姓名：</label>
                        <input type="text" class="form-control" name="name" value="{{ @$name }}">
                    </div>
                    <div class="form-group">
                        <label for="wwid">WWID：</label>
                        <input type="text" class="form-control" name="wwid" value="{{ @$wwid }}">
                    </div>
                        <div class="form-group">
                            <label for="city">城市：</label>
                            <select class="form-control" name="city">
                                <option value="">不限</option>
                                @foreach ($city_users as $user)
                                <option @if(@$city == $user->city) selected @endif value="{{ $user->city }}">{{ $user->city }}</option>
                                @endforeach
                            </select>
                        </div>
                    <button type="submit" class="btn btn-default">搜索</button><a href="/admin/user/create" class="btn btn-info btn-flat">添加用户</a> <!-- <a href="/admin/user/import" class="btn">导入用户</a> -->
                </form>
            </div>
            <!-- /.box-header -->



            <div class="box-body">
            <!-- Display Validation Errors -->
            @include('admin.common.errors')
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">城市</th>
                            <th style="text-align:center;">头像</th>
                            <th style="text-align:center;">WWID</th>
                            <th style="text-align:center;">姓名</th>
                            <th style="text-align:center;">性别</th>
                            <th style="text-align:center;">分组</th>
                            <th style="text-align:center;">积分</th>
                            <th style="text-align:center;">匹配英雄</th>
                            <!-- <th style="text-align:center;">登录次数</th> -->
                            <th style="text-align:center;">最后登录时间</th>
                            <th style="text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $key=>$user)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->id }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->city }}</td>
                            <td style='vertical-align: middle;text-align:center;'>@if($user->icon)<img src="/{{ $user->icon }}" class="img-circle" width='30' height='30'>@else <img src="/images/user_icon_default{{ @$user->sex}}.png" class="img-circle" width='30' height='30'>@endif</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->wwid }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->name }}</td>
                            <td style='vertical-align: middle;text-align:center;'>@if($user->sex == 1) 男 @endif @if($user->sex == 2) 女 @endif</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ @$user->group->name }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->points }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ @$user->hero->hero_name }}</td>

                            <!-- <td style='vertical-align: middle;text-align:center;'>{{ $user->logins }}</td> -->
                            <td style='vertical-align: middle;text-align:center;'>{{ $user->last_login_at }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <a class="btn btn-default" href='/admin/user/{{ $user->id }}/edit'>编辑</a>
                                <a class="btn btn-primary" href='/admin/user/{{ $user->id }}'>详情</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $users->total()}}</b> 项@if($users->total() > 1)，本页显示第 <b>{{ $users->firstItem()}}</b> 到第 <b>{{ $users->lastItem()}} </b>项@endif</div><!--a href="/admin/user/export" class="btn">导出Excel</a--></div>
                  <div class="col-sm-8">{!! $users->appends(Request::only('name', 'wwid', 'city'))->links() !!}</div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>

<!-- /.row -->
@endsection
@include('admin.common.img-pop')

@section('subJsFileBottom')
<script src="{{ asset('js/yyz_img.js') }}"></script>
@endsection
