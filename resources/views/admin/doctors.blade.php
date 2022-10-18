<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include("admin.css")
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
              <div class="row justify-content-center">
                <h1 class="text-center">All Doctors</h1>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <table class="table text-center text-white  mt-3">
                      <tr>
                        <th>No</th>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Specialty</th >
                        <th>Room</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                      </tr>
                      @foreach($doctors as $doctor)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->specialty}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img src="doctorimage/{{$doctor->image}}" alt=""></td>
                        <td>
                          <a href="{{url("/admin-doctors/$doctor->id")}}" class="btn btn-success">Update</a>
                          <td>
                            <form action="/admin-doctors/{{$doctor->id}}" class="d-inline" method="POST">
                              @csrf
                              @method("delete")
                             <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                  </table>
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