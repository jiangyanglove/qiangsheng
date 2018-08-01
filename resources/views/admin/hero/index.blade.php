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
                <table class="table table-bordered table-hover row mx-0">
                    <thead class="w-100">
                        <tr class="row mx-0">
                            <th class="col-1" style="text-align:center;">ID</th>
                            <th class="col-1" style="text-align:center;">头像</th>
                            <th class="col-2" style="text-align:center;">名字</th>
                            <th class="col-2" style="text-align:center;">测评结果</th>
                            <th class="col-2" style="text-align:center;">说明</th>
                            <th class="col-2" style="text-align:center;">工作时</th>
                            <th class="col-2" style="text-align:center;">英雄描述</th>
                        </tr>
                    </thead>
                    <tbody class="w-100">
                    @foreach ($heroes as $key=>$hero)
                        <tr class="row mx-0 bg-dark">
                            <td class="col-2" style='text-align:left;'>{{ $hero->id }}</td>
                            <td class="col-2" style='text-align:left;'>@if($hero->icon)<img src="/images/hero/{{ $hero->icon }}" class="img" width="50px;">@endif</td>
                            <td class="col-2" style='text-align:left;'>《{{ $hero->hero_name }}》<br>{{ $hero->hero_name_en }}</small></td>
                            <td class="col-2" style='text-align:left;'><span title="{{ $hero->title_en }}">{{ $hero->title }}</span></td>
                            <td class="col-2" style='text-align:left;'><span title="{{ $hero->explanations_en }}">{{ $hero->explanations }}</span></td>
                            <td class="col-2" style='text-align:left;'><span title="{{ $hero->when_at_work_en }}">{{ $hero->when_at_work }}</span></td>
                            <td class="col-2" style='text-align:left;'><span title="{{ $hero->hero_desc_en }}">{{ $hero->hero_desc }}</span></td>
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
