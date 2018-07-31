@extends('admin.layouts.main')
@section('content')
@include('vendor.ueditor.assets')
<div class="row">
<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-success">
                <!-- Display Validation Errors -->
                @include('admin.common.errors')
            <div class="box-header with-border">
              <h3 class="box-title">编辑精彩预告 - {{ $weeknotice->name }}</h3>
                <div class="text-right">
                    <a href="/admin/weeknotice" class="link-black text-sm"><i class="fa fa-arrow-left margin-r-5"></i> 返回精彩预告列表</a>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ url('/admin/weeknotice/' . $weeknotice->id) }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="week" class="col-sm-2 control-label">所属周：</label>
                  <div class="col-sm-2 controls">
                    <select name="week" class="form-control">
                      <option value='0'>选择周</option>
                      <option value="1"  @if ($weeknotice->week == 1)selected=selected @endif>WEEK1</option>
                      <option value="2" @if ($weeknotice->week == 2)selected=selected @endif>WEEK2</option>
                      <option value="3" @if ($weeknotice->week == 3)selected=selected @endif>WEEK3</option>
                      <option value="4" @if ($weeknotice->week == 4)selected=selected @endif>WEEK4</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="icon" class="col-sm-2 control-label">图片：</label>
                  @if(isset($weeknotice->icon) && $weeknotice->icon)<div class="col-sm-4 controls"><img src="/{{ $weeknotice->icon }}" width="50%" class="img-thumbnail"/></div>@endif
                  <div class="col-sm-4 controls"><input type="file" name="icon"></div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">中文标题：</label>
                  <div class="col-sm-10 controls">
                    <input type="text" class="form-control" id="name" name="name" value="@if (isset($weeknotice->name)){{ $weeknotice->name }}@endif" placeholder="请输入中文标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="name_en" class="col-sm-2 control-label">英文标题：</label>
                  <div class="col-sm-10 controls">
                    <input type="text" class="form-control" id="name_en" name="name_en" value="@if (isset($weeknotice->name_en)){{ $weeknotice->name_en }}@endif" placeholder="请输入英文标题">
                  </div>
                </div>
                <div class="form-group">
                  <label for="start_date" class="col-sm-2 control-label">自定义日期：</label>
                  <div class="col-sm-10 controls">
                    <input type="text" class="form-control" id="start_date" name="start_date" value="@if ($weeknotice->start_date){{ $weeknotice->start_date }}@endif" placeholder="自定义日期如2018-07-30">
                  </div>
                </div>
                <div class="form-group">
                  <label for="content" class="col-sm-2 control-label">中文内容：</label>
                  <div class="col-sm-10 controls">
                  <script id="container" name="content" type="text/plain">@if (isset($weeknotice->content)){!! $weeknotice->content !!}@endif</script>
                  </div>
                </div>
                <div class="form-group">
                  <label for="content_en" class="col-sm-2 control-label">英文内容：</label>
                  <div class="col-sm-10 controls">
                  <script id="container2" name="content_en" type="text/plain">@if (isset($weeknotice->content_en)){!! $weeknotice->content_en !!}@endif</script>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

        </div>
</div>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });

    var ue = UE.getEditor('container2');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

@endsection
