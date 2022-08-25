{{-- @extends('frontend.layouts.master')
@section('admin_content') --}}

<div class="container">
    <h2>Laravel Ajax Multiple Dependency</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="#" method="POST">
                @csrf
                <div class="form-group mt-2 mb-2 pd-2">
                    <div class="mb-3">
                      <label  class="form-label">Select Region</label>
                      <select class="form-control" name="region_id" id="region">
                        <option>Select Region</option>
                       
                        @foreach ( $regions as $region )
                            <option value="{{$region->id}}">
                                {{$region->region_name}}
                            </option>
                        @endforeach
                      </select>
                    </div>
                </div>
                
                <div class="form-group mt-2 mb-2 pd-2">
                    <div class="mb-3">
                      <label  class="form-label">Select Region</label>
                      <select class="form-control" name="country_id" id="country">
                        <option value="">Select country</option>
                        
                      </select>
                    </div>
                </div>

                <div class="form-group mt-2 mb-2 pd-2">
                    <div class="mb-3">
                      <label  class="form-label">Select city</label>
                      <select class="form-control" name="city_id" id="city">
                        <option value="">Select city</option>
                        
                      </select>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- @endsection --}}

