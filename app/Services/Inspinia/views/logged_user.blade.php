<div class="dropdown profile-element">
	@if (Auth::check())
	<a data-toggle="dropdown" class="dropdown-toggle" href="#">
          <span class="clear">
            <span class="block m-t-xs">
              <strong class="font-bold">{{ Auth::user()->username }}</strong>
            </span>
            <span class="text-muted text-xs block">
              {{ Auth::user()->role }} <b class="caret"></b>
            </span>
          </span>
	</a>
	<ul class="dropdown-menu animated fadeInRight m-t-xs">
		<li><a href="{{ url('auth/logout')  }}">Logout</a></li>
	</ul>
	@endif
</div>