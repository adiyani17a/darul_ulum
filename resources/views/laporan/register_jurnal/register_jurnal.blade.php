<!DOCTYPE html>
<html>
{{-- @include('partials._head') --}}
<link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-4/css/bootstrap.min.css')}}">
<head>
	<title>YAYASAN DARUL ULUM</title>
  	<link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" />
</head>
<style type="text/css">
	@page {
	   size: 21cm 29.7cm;
   	 margin: 30mm 45mm 30mm 45mm;
	}

	@media print
	{
		body {margin-left: 0 !important;margin-right: 0 !important;height: 0px;background-color: white !important}
	}
	.printArea{
		padding-right:50px;
		padding-left:50px;
	}
</style>

<body style="background-color: grey;margin-left: 200px;margin-right: 200px;">
	<header id="navigation" style="padding: 0px 0px;height: 60px;vertical-align: middle;background: rgba(0, 0, 0, 0.4); box-shadow: 0px 2px 5px #444;position: fixed; z-index:2;width: 100%;left: 0">
		<div class="container" >
		  <div class="row">
		    <a href="{{ url('/') }}" class="col-sm-6 nopadding-left" style="padding-top: 20px">
		      <label style="color: white;cursor: pointer;">YAYASAN DARUL ULUM</label>
		    </a>
		  </div>
		</div>
	</header>
	<div  class="" id="printArea" style="padding-top: 60px;background-color: white">
    <div class="col-sm-12 height mt-2" >
		<div class="col-sm-12" style="margin-top: 20px" >
			<h2 class="black"><b>REGISTER JURNAL</b></h2>
			<h5 class="black">YAYASAN DARUL ULUM</h5>
			<p class="black">SDN MEDOKAN AYU</p>
			<hr class="black" style="border-bottom: 2px solid black">
		</div>
		<div class="col-sm-12">
        	<table class="table">
        		<tr>
        			<th>No</th>
        		</tr>
        	</table>
      	</div>
    </div>
  </div>
</body>
@include('partials._script')
<script type="text/javascript">
	// window.print();
</script>
</html>
	
