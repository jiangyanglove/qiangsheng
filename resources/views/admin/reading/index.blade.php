@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header text-right">
            </div>
            <!-- /.box-header -->



            <div class="box-body">
            <!-- Display Validation Errors -->
            @include('admin.common.errors')
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">图片</th>
                            <th style="text-align:center;">书名</th>
                            <th style="text-align:center;">推荐人</th>
                            <th style="text-align:center;">简介</th>
                            <th style="text-align:center;">评论</th>
                            <th style="text-align:center;">点赞</th>
                            <th style="text-align:center;">状态</th>
                            <th style="text-align:center;">发布时间</th>
                            <th style="text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($readings as $key=>$reading)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $reading->id }}</td>
                            <td style='text-align:center;'>@if($reading->icon)<img src="/{{ $reading->icon }}" class="img" width='200px;'>@endif</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $reading->name }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $reading->user->name }}<br>{{ $reading->user->wwid }}</td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $reading->description }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o"></i>({{ $reading->comments }})</a>
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up"></i>({{ $reading->likes }})</a>
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>
                            @if($reading->enabled == 1) <span class="text-green">显示中</span> @endif
                            @if($reading->enabled == 0) <span class="text-yellow">已屏蔽</span> @endif
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>{{ $reading->created_at }}</td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <!-- <a class="text-warning" href='/admin/reading/show/{{ $reading->id }}'>详情</a> -->
                                @if($reading->enabled == 1) <a class="btn btn-warning disable" href='/admin/reading/{{ $reading->id }}/disable'>屏蔽</a> @endif
                                @if($reading->enabled == 0) <a class="btn btn-success enable" href='/admin/reading/{{ $reading->id }}/enable'>显示</a> @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $readings->total()}}</b> 项@if($readings->total() > 1)，本页显示第 <b>{{ $readings->firstItem()}}</b> 到第 <b>{{ $readings->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $readings->links() !!}</div>
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
