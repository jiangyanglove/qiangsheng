@extends('admin.layouts.main')
@section('content')
<div class="row">
<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-success">
                <!-- Display Validation Errors -->
                @include('admin.common.errors')
            <div class="box-header with-border">
              <h3 class="box-title">添加用户</h3>
                <div class="text-right">
                    <a href="/admin/user" class="link-black text-sm"><i class="fa fa-arrow-left margin-r-5"></i> 返回用户列表</a>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="{{ url('/admin/user') }}" enctype="multipart/form-data">
                {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">城市：</label>
                  <div class="col-sm-4 controls">
                      <select class="form-control" name="city">
                          <option value='0'>选择城市</option>
                          <option @if( old('city') == '上海') selected @endif value="上海">上海</option>
                          <option @if( old('city') == '北京') selected @endif value="北京">北京</option>
                          <option @if( old('city') == '广州') selected @endif value="广州">广州</option>
                          <option @if( old('city') == '杭州') selected @endif value="杭州">杭州</option>
                          <option @if( old('city') == '苏州') selected @endif value="苏州">苏州</option>
                          <option @if( old('city') == '西安') selected @endif value="西安">西安</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">姓名：</label>
                  <div class="col-sm-4 controls">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="姓名">
                  </div>

                </div>
                <div class="form-group">
                  <label for="wwid" class="col-sm-2 control-label">wwid：</label>
                  <div class="col-sm-4 controls">
                    <input type="text" class="form-control" id="wwid" name="wwid" value="{{ old('wwid') }}" placeholder="wwid">
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
@endsection
