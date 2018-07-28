@if (count($errors) > 0)
<br>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<strong><i class="icon fa fa-ban"></i> 错误！</strong>
		<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
	</div>
@endif

@if (session('status'))
    <div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<strong>提示！</strong>
        {{ session('status') }}
    </div>
@endif
<!--
				<div class="callout callout-danger">
					<h4>Warning!</h4>

					<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar and the content will slightly differ than that of the normal layout.</p>
				</div>
-->