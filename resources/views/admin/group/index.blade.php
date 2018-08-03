@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header text-right">
                <form method="GET" class="form-inline" action="{{ url('/admin/group') }}">
                    <div class="form-group">
                        <label for="name">名称：</label>
                        <input type="text" class="form-control" name="name" value="{{ @$name }}">
                    </div>
                    <div class="form-group">
                        <label for="city">城市：</label>
                        <select class="form-control" name="city">
                            <option value="">不限</option>
                            @foreach ($city_groups as $group)
                            <option @if(@$city == $group->city) selected @endif value="{{ $group->city }}">{{ $group->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
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
                            <th style="text-align:center;">组名</th>
                            <th style="text-align:center;">组长</th>
                            <th style="text-align:center;">成员</th>
                            <th style="text-align:center;">积分</th>
                            <th style="text-align:center;">按时组建任务</th>
                            <!-- <th style="text-align:center;">操作</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($groups as $key=>$group)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $group->id }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $group->city }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $group->name }}</td>
                            <td style='vertical-align: middle;text-align:center;'><img src="/{{ $group->leader->icon}}" width="30" alt="{{ $group->leader->name }}" title="{{ $group->leader->name }}"></td>
                            <td style='vertical-align: middle;text-align:center;'>
                              @if(count($group->members) >0 )
                              @foreach($group->members as $member)
                                <img src="/{{ $member->user->icon}}" width="30" alt="{{ $member->user->name}}" title="{{ $member->user->name}}">
                              @endforeach
                              @endif
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $group->points }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                                @if($group->make_task_status == 1) <img src="/images/gou.png"/> @endif
                                @if($group->make_task_status == 0) <img src="/images/cha.png"/> @endif
                            </td>
                            <!-- <td style='vertical-align: middle;text-align:center;'><a class="text-warning" href='/admin/group/show/{{ $group->id }}'>详情</a></td> -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $groups->total()}}</b> 项@if($groups->total() > 1)，本页显示第 <b>{{ $groups->firstItem()}}</b> 到第 <b>{{ $groups->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $groups->appends(Request::only('name', 'city'))->links() !!}</div>
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
