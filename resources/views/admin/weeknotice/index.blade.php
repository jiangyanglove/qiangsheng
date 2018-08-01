@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <div class="text-right">
                    <a href="/admin/weeknotice/create" class="btn btn-info btn-flat">添加精彩预告</a>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
            <!-- Display Validation Errors -->
            @include('admin.common.errors')
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">专属图片</th>
                            <th style="text-align:center;">周</th>
                            <th style="text-align:center;">标题</th>
                            <th style="text-align:center;">介绍</th>
                            <th style="text-align:center;">状态</th>
                            <th style="text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($weeknotices as $key=>$weeknotice)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $weeknotice->id }}</td>
                            <td style='vertical-align: middle;'>@if($weeknotice->icon)<img src="/{{ $weeknotice->icon }}" class="img" height='50'>@endif</td>
                            <td style='vertical-align: middle;text-align:center;'>WEEK{{ $weeknotice->week }}<br>{{ $weeknotice->start_date }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $weeknotice->name }}<br>{{ $weeknotice->name_en }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{!! $weeknotice->content !!}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                            @if($weeknotice->enabled == 1) <span class="text-green">显示中</span> @endif
                            @if($weeknotice->enabled == 0) <span class="text-yellow">已屏蔽</span> @endif
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <a class="btn btn-default" href='/admin/weeknotice/{{ $weeknotice->id }}/edit'>编辑</a>
                                @if($weeknotice->enabled == 1) <a class="btn btn-warning disable" href='/admin/weeknotice/{{ $weeknotice->id }}/disable'>屏蔽</a> @endif
                                @if($weeknotice->enabled == 0) <a class="btn btn-success enable" href='/admin/weeknotice/{{ $weeknotice->id }}/enable'>显示</a> @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $weeknotices->total()}}</b> 项@if($weeknotices->total() > 1)，本页显示第 <b>{{ $weeknotices->firstItem()}}</b> 到第 <b>{{ $weeknotices->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $weeknotices->links() !!}</div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('subCssFile')
<style>
    th, td {
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection

@include('admin.common.img-pop')

@section('subJsFileBottom')

<script>
    $(".delete").on("submit", function(){
        return confirm("你确定要删除该合同吗？点击确定以继续！");
    });
</script>

<script src="{{ asset('js/yyz_img.js') }}"></script>
@endsection


