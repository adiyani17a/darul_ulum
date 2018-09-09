@extends('main')

@section('content')
<!-- partial -->
        <div class="content-wrapper">
         
          <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Monthly Sales</h4>
                  <h2 class="font-weight-normal mb-5">Rp. 0,00</h2>
                  <p class="card-text">{{date('F Y')}}</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Monthly Purchase</h4>
                  <h2 class="font-weight-normal mb-5">Rp. 0,00</h2>
                  <p class="card-text">{{date('F Y')}}</p>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
        <!-- content-wrapper ends -->
@endsection

@section('extra_script')

@endsection