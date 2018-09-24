<!DOCTYPE html>
<html>
@include('partials._head')

@yield('extra_style')
<body style="min-height: 1000px">
	@include('partials._setting')
	<div class="container-scroller">
		@include('partials._sidebar')

		@yield('content')

		@include('partials._footer')
	</div>
@include('modal_global')
@include('partials._script')

@yield('extra_script')
</body>
</html>