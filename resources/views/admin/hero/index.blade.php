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
                            <th width="10%" style="text-align:left;">ID</th>
                            <th width="10%" style="text-align:left;">头像</th>
                            <th width="10%" style="text-align:left;">名字</th>
                            <th width="10%" style="text-align:left;">测评结果</th>
                            <th width="10%" style="text-align:left;">说明</th>
                            <th width="10%" style="text-align:left;">工作时</th>
                            <th width="10%" style="text-align:left;">英雄描述</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($heroes as $key=>$hero)
                        <tr>
                            <td style='text-align:left;'>{{ $hero->id }}</td>
                            <td style='text-align:left;'>@if($hero->icon)<img src="/images/hero/{{ $hero->icon }}" class="img" width="100px;">@endif</td>
                            <td style='text-align:left;'>《{{ $hero->hero_name }}》<br>{{ $hero->hero_name_en }}</small></td>
                            <td style='text-align:left;'>{{ $hero->title }}<br>{{ $hero->title_en }}</small></td>
                            <td style='text-align:left;'>{{ $hero->explanations }}<br>{{ $hero->explanations_en }}</td>
                            <td style='text-align:left;'>{{ $hero->when_at_work }}<br>{{ $hero->when_at_work_en }}</td>
                            <td style='text-align:left;'>{{ $hero->hero_desc }}<br>{{ $hero->hero_desc_en }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="row">
                  <div class="col-sm-4"><div class="pagination">共 <b>{{ $heroes->total()}}</b> 项@if($heroes->total() > 1)，本页显示第 <b>{{ $heroes->firstItem()}}</b> 到第 <b>{{ $heroes->lastItem()}} </b>项@endif</div></div>
                  <div class="col-sm-8">{!! $heroes->links() !!}</div>
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
