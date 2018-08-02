@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header text-right">
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
            <!-- Display Validation Errors -->
            @include('admin.common.errors')
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:left;">发布人&时间</th>
                            <th style="text-align:center;">内容</th>
                            <th style="text-align:center;">评论</th>
                            <th style="text-align:center;">点赞</th>
                            <th style="text-align:center;">状态</th>
                            <th style="text-align:center;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($freetalks as $key=>$freetalk)
                        <tr>
                            <td style='vertical-align: middle;text-align:center;'>{{ $freetalk->id }}</td>
                            <td style='vertical-align: middle;text-align:left;'>
                                @if($freetalk->user->icon)<img src="/{{ $freetalk->user->icon }}" class="img-circle" width='30' height='30'>@else <img src="/images/user_icon_default{{ @$freetalk->user->sex}}.png" class="img-circle" width='30' height='30'>@endif
                                <br>{{ $freetalk->user->name }}<br>wwid:{{ $freetalk->user->wwid }}<br><small>at:{{ $freetalk->created_at }}</small>
                            </td>
                            <td style='text-align:left;'>[@if($freetalk->type == 'photo')照片 @endif @if($freetalk->type == 'plan')行动计划 @endif]<br>
@if($freetalk->type == 'photo' && $freetalk->photo_number == 1)
<img src="{{ $freetalk->real_photos}}" alt="" class="img" width="50px;">
@endif
@if($freetalk->type == 'photo' && $freetalk->photo_number > 1)
   @foreach ($freetalk->real_photos as $photo)
        <img src="{{ $photo }}" alt="" class="img" width="50px;">
  @endforeach
@endif
<br>
                            <span title="{{ $freetalk->content }}">{{ str_limit($freetalk->content,30) }}</span>
                            </td>

                            <td style='vertical-align: middle;text-align:left;'>
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o"></i>({{ $freetalk->comments }})</a>
                            </td>
                            <td style='vertical-align: middle;text-align:left;'>
                                <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up"></i>({{ $freetalk->likes }})</a>
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>
                            @if($freetalk->enabled == 1) <span class="text-green">显示中</span> @endif
                            @if($freetalk->enabled == 0) <span class="text-yellow">已屏蔽</span> @endif
                            </td>
                            <td style='vertical-align: middle;text-align:center;'>
                                <!-- <a class="text-warning" href='/admin/freetalk/show/{{ $freetalk->id }}'>详情</a> -->
                                @if($freetalk->enabled == 1) <a class="btn btn-warning disable" href='/admin/freetalk/{{ $freetalk->id }}/disable'>屏蔽</a> @endif
                                @if($freetalk->enabled == 0) <a class="btn btn-success enable" href='/admin/freetalk/{{ $freetalk->id }}/enable'>显示</a> @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $freetalks->total()}}</b> 项@if($freetalks->total() > 1)，本页显示第 <b>{{ $freetalks->firstItem()}}</b> 到第 <b>{{ $freetalks->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $freetalks->links() !!}</div>
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
