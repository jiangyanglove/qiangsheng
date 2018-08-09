@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header text-right">
                <form method="GET" class="form-inline" action="{{ url('/admin/user/point_record') }}">
                    <div class="form-group">
                        <label for="wwid">wwid：</label>
                        <input type="text" class="form-control" name="wwid" value="{{ @$wwid }}">
                    </div>
                    <div class="form-group">
                        <label for="type">积分类型：</label>
                        <select class="form-control" name="type">
                            <option value="">不限</option>
                            <option @if(@$type == 1) selected @endif value="1">线下扫码</option>
                            <option @if(@$type == 2) selected @endif value="2">每日签到</option>
                            <option @if(@$type == 3) selected @endif value="3">8月3日下午6点前完成建组</option>
                            <option @if(@$type == 4) selected @endif value="4">参加性格测试</option>
                            <option @if(@$type == 5) selected @endif value="5">在活动预览区提问</option>
                            <option @if(@$type == 6) selected @endif value="6">上传职业照和生活照</option>
                            <option @if(@$type == 7) selected @endif value="7">推荐书籍</option>
                            <option @if(@$type == 8) selected @endif value="8">在自由讨论区发布话题</option>
                            <option @if(@$type == 9) selected @endif value="9">将未来邮局的内容转发到自由讨论区</option>
                            <option @if(@$type == 10) selected @endif value="10">6号线下扫码</option>
                            <option @if(@$type == 11) selected @endif value="11">9号线下扫码</option>
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
                            <th style="text-align:center;">用户</th>
                            <th style="text-align:center;">积分类型</th>
                            <th style="text-align:center;">积分</th>
                            <th style="text-align:center;">描述</th>
                            <th style="text-align:center;">状态</th>
                            <th style="text-align:center;">创建时间</th>
                            <th style="text-align:center;">更新时间</th>
                            <th style="text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $key=>$record)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $record->id }}</td>
                            <td style='vertical-align: middle;text-align:left;'>@if($record->user->icon)<img src="/{{ $record->user->icon }}" class="img-circle" width='30' height='30'>@else <img src="/images/user_icon_default{{ @$record->user->sex}}.png" class="img-circle" width='30' height='30'>@endif
                               {{ @$record->user->name }}-{{ @$record->wwid }}-<span style="color:red;">{{ @$record->user->points }}分</span></td>
                            <td style='vertical-align: middle;text-align:center;'>
                                @if($record->type == 1) 线下扫码 @endif
                                @if($record->type == 2) 每日签到 @endif
                                @if($record->type == 3) 8月3日下午6点前完成建组 @endif
                                @if($record->type == 4) 参加性格测试 @endif
                                @if($record->type == 5) 在活动预览区提问 @endif
                                @if($record->type == 6) 上传职业照和生活照 @endif
                                @if($record->type == 7) 推荐书籍 @endif
                                @if($record->type == 8) 在自由讨论区发布话题 @endif
                                @if($record->type == 9) 将未来邮局的内容转发到自由讨论区 @endif
                                @if($record->type == 10) 6号线下扫码 @endif
                                @if($record->type == 11) 9号线下扫码 @endif

                            </td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $record->point }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $record->description }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                            @if($record->enabled == 1) <span class="text-green">有效</span> @endif
                            @if($record->enabled == 0) <span class="text-yellow">已作废</span> @endif
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $record->created_at }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $record->updated_at }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                                @if($record->enabled == 1) <a class="btn btn-warning disable" href='/admin/user/point_record/{{ $record->id }}/disable'>作废</a> @endif
                                @if($record->enabled == 0) <a class="btn btn-success enable" href='/admin/user/point_record/{{ $record->id }}/enable'>从新生效</a> @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $records->total()}}</b> 项@if($records->total() > 1)，本页显示第 <b>{{ $records->firstItem()}}</b> 到第 <b>{{ $records->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $records->appends(Request::only('wwid', 'type'))->links() !!}</div>
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
<script>
    $(".enable").on("click", function(){
        return confirm("你确定要使该积分从新生效吗？此操作将影响用户的总积分！！！点击确定以继续！");
    });
    $(".disable").on("click", function(){
        return confirm("你确定要将该积分作废吗？此操作将影响用户的总积分！！！点击确定以继续！");
    });
</script>
@endsection
