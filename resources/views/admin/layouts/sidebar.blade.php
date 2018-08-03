<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ Auth::guard('admin')->user()->name }}</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i> 管理员 </a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header"></li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-users"></i>
                    <span>用户管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="/admin/user">
                            <i class="fa fa-list-ul"></i>用户列表
                        </a>
                    </li>
                    <li>
                        <a href="/admin/user/point_record">
                            <i class="fa fa-list-ul"></i>积分记录
                        </a>
                    </li>
                </ul>
            </li>
			<li><a href="/admin/group"><i class="fa fa-users"></i> <span>分组管理</span></a></li>
			<li><a href="/admin/weeknotice"><i class="fa fa-users"></i> <span>精彩预告</span></a></li>
			<li><a href="/admin/hero"><i class="fa fa-users"></i> <span>DISC英雄</span></a></li>
			<li><a href="/admin/reading"><i class="fa fa-users"></i> <span>读书的力量</span></a></li>
			<li><a href="/admin/freetalk"><i class="fa fa-users"></i> <span>自由讨论</span></a></li>

<!--  			<li><a href="/admin/group"><i class="fa fa-users"></i> <span>我的职场范</span></a></li>
			<li><a href="/admin/group"><i class="fa fa-users"></i> <span>每周回顾</span></a></li>
			<li><a href="/admin/group"><i class="fa fa-users"></i> <span>未来邮局</span></a></li> -->
		</ul>
		<!-- /.sidebar-menu -->
	</section>
<!-- /.sidebar -->
</aside>

<script>
    $(document).ready(function(){
        // 左侧菜单高亮
        var currentMenu = $('.sidebar-menu a[href="'+ window.location.pathname+'"]:first');

        if (currentMenu) {
            var menu = currentMenu.closest('.sidebar-menu li');
			var treeview = currentMenu.closest('.treeview');
            menu.addClass('active').siblings().removeClass('active');
			treeview.addClass('menu-open').siblings().removeClass('menu-open');
			treeview.addClass('active').siblings().removeClass('active');
        };
    });
</script>