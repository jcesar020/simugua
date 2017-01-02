<div class="ibox float-e-margins">
	@if ($__env->yieldContent('title',false))
	<div class="ibox-title">
		<h5>
			@yield('title')
		</h5>

		<div class="ibox-tools">
			<a class="collapse-link">
				<i class="fa fa-chevron-up"></i>
			</a>

			@if (false)
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-wrench"></i>
			</a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="#">Config option 1</a>
				</li>
				<li><a href="#">Config option 2</a>
				</li>
			</ul>
			<a class="close-link">
				<i class="fa fa-times"></i>
			</a>
			@endif

		</div>
	</div>
	@endif
	<div class="ibox-content">
		@yield('content')
	</div>
</div>
