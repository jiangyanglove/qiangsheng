@extends('admin.layouts.main')
@section('content')
      <div class="row">
      	<div class="row">
      		<div class="col-md-12 text-right">
                <a href="/admin/staff" class="link-black text-sm"><i class="fa fa-arrow-left margin-r-5"></i> 返回员工列表</a>
            </div>
        </div>
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
				@if($staff->icon)<img src="/{{ $staff->icon }}" class="profile-user-img img-responsive img-circle">@else <img src="/staff-icon-default.jpg" class="profile-user-img img-responsive img-circle">@endif
              <h3 class="profile-username text-center">{{ $staff->nickname }}</h3>

              <p class="text-muted text-center">{{ $staff->position }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>姓名</b> <a class="pull-right">{{ $staff->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>国家</b> <a class="pull-right">{{ $staff->country }}</a>
                </li>
                <li class="list-group-item">
                  <b>城市</b> <a class="pull-right">{{ $staff->city }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          	<div class="box box-success">
				<div class="box-header ui-sortable-handle" style="cursor: move;">
	              <i class="fa fa-comments-o"></i>
	              <h3 class="box-title">员工帖子</h3>
	            </div>
	            <div class="box-body">
	            	<div class="col-md-12">
              	@if(count($staff->posts) > 0)
	              	@foreach ($staff->posts as $key=>$post)
	                  <div class="pull-right>
	                    <span class="description">{{ $post->created_at }}</span>
	                  </div>
	                  <!-- /.user-block -->
	                  <p>
	                    {{ $post->title }}
	                  </p>
	                  <p>
	                  	@if($post->video)<img width="50" height="50" src="/icon_video.png">@endif
	                            @if(count($post->pictures) > 0)
	                                @foreach($post->pictures as $pic)
	                                    <a href="/{{ $pic->path }}"><img width="50" height="50" src="/{{ $pic->path }}"></a>
	                                @endforeach
	                    @endif
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like ({{ count($post->likes) }})</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        ({{ count($post->comments) }})</a></li>
	                  </ul><hr>
	              </div>
	                @endforeach
	              	@foreach ($staff->posts as $key=>$post)
	                  <p>  <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $post->created_at }}</small></p>
	                  <!-- /.user-block -->
	                  <p>
	                    {{ $post->title }}
	                  </p>
	                  <p>
	                  	@if($post->video)<img width="50" height="50" src="/icon_video.png">@endif
	                            @if(count($post->pictures) > 0)
	                                @foreach($post->pictures as $pic)
	                                    <a href="/{{ $pic->path }}"><img width="50" height="50" src="/{{ $pic->path }}"></a>
	                                @endforeach
	                    @endif
	                  </p>
	                  <ul class="list-inline">
	                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like ({{ count($post->likes) }})</a>
	                    </li>
	                    <li class="pull-right">
	                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
	                        ({{ count($post->comments) }})</a></li>
	                  </ul>
	                @endforeach
                @else
                	<center>尚未发布帖子</center>
                @endif
	            </div>
	            <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection