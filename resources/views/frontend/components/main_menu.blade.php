	<div class="mainmenu pull-left">
		<ul class="nav navbar-nav collapse navbar-collapse">
			<li><a href="{{ route('home') }}" class="active">Home</a></li>

			@foreach($categorysLimit as $categoryParent)
			<li class="dropdown"><a href="#">{{ $categoryParent -> name }}<i class="fa fa-angle-down"></i></a>
				@include('frontend.components.child_menu',['categoryParent' => $categoryParent])
			</li>

			@endforeach
			
			
		</ul>
	</div>
