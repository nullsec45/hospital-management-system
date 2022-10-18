<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include("admin.css")
    <style>
      .form-control:focus{
        /* color:white; */
        background-color:white;
      }
    </style>
    
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include("admin.sidebar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        @include("admin.navbar")
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="text-center">Add Doctor</h1>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if(session()->has("message"))
                          <div class="alert alert-success  alert-dismissible fade show" role="alert">
                            {{session()->get("message")}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                          </div>
                        @endif
                        <form action="{{url("admin-doctors/$data->id")}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("patch")
                            <div class="mb-3">
                                <label for="doctor" class="form-label">Doctor Name</label>
                                <input type="text" class="form-control text-black" id="doctor" name="doctor_name" value="{{$data->name}}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control text-black" id="phone" name="phone" value="{{$data->phone}}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="specialty" class="form-label">Specialty</label>
                                <select class="form-select" id="specialty" name="specialty">
                                    <option value="skin" {{($data->specialty === "skin") ? "selected" : ""}}>Skin</option>
                                    <option value="eye" {{($data->specialty === "eye") ? "selected" : ""}}>Eye</option>
                                    <option value="nose" {{($data->specialty === "nose") ? "selected" : ""}}>Nose</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="room" class="form-label">Room</label>
                                <input type="text" class="form-control text-black" id="room" name="room" value="{{$data->room}}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Doctor Image</label>
                                <img src="{{url("doctorimage/$data->image")}}" alt="{{$data->image}}" class="img-fluid" width="200px">
                                <input type="file" class="form-control mt-3" type="file" id="image" name="image">
                            </div>
                            <button class="btn btn-success float-end">Add</button>
                            <button class="btn btn-danger float-end me-3">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- container-scroller -->
    @include("admin.scripts")
  </body>
</html>