<!DOCTYPE html>
<html>
@include('partials._head')

@yield('extra_style')
<body>
	@include('partials._setting')
	<div class="container-scroller">
		@include('partials._sidebar')

		@yield('content')

		@include('partials._footer')
	</div>
@include('partials._script')

@yield('extra_script')
</body>
</html>