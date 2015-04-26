<?php // Menu depend on type of user.
if (! Auth::guest () && Auth::user ()->role === null) 
{
	switch (Auth::user ()->user_type) 
	{
		case 1 : // Employer
?>
		@foreach(Config::get('employer.menu') as $menu => $url)
			<ul class="list-unstyled">
			@if(is_array($url))
				<li><h3 class="title">{{$menu}}</h3>
					<ul class="list-unstyled">
					@foreach($url as $menu => $url)
						<li><a href="{{$url}}">{{$menu}}</a><hr class="menu-seperator"></li>
					@endforeach
					</ul>
				</li>
			@else
				<li><h3 class="title"><a href="{{$url}}">{{$menu}}</a></h3></li>
			@endif
			</ul>
		@endforeach
<?php
			break;
		case 2 : // Employee
?>
		@foreach(Config::get('candidate.menu') as $menu => $url)
			<ul class="list-unstyled">
			@if(is_array($url))
				<li><h3 class="title">{{$menu}}</h3>
					<ul class="list-unstyled">
					@foreach($url as $menu => $url)
						<li><a href="{{$url}}">{{$menu}}</a><hr class="menu-seperator"></li>
					@endforeach
					</ul>
				</li>
			@else
				<li><h3 class="title"><a href="{{$url}}">{{$menu}}</a></h3></li>
			@endif
			</ul>
		@endforeach
<?php
			break;
	}
}
else
{ 
?>
		@foreach(Config::get('constant.menu') as $menu => $url)
			<ul class="list-unstyled">
			@if(is_array($url))
				<li><h3 class="title">{{$menu}}</h3>
					<ul class="list-unstyled">
					@foreach($url as $menu => $url)
						<li><a href="{{$url}}">{{$menu}}</a><hr class="menu-seperator"></li>
					@endforeach
					</ul>
				</li>
			@else
				<li><h3 class="title"><a href="{{$url}}">{{$menu}}</a></h3></li>
			@endif
			</ul>
		@endforeach
<?php
}
?>