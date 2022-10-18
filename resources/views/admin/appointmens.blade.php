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
                <h1 class="text-center">Appointments</h1>
              </div>
              <div class="row ">
                <div class="col-md-8">
                  <table class="table text-center text-white  mt-3">
                      <tr>
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Message</th >
                        <th>Status</th>
                        <th colspan="2">Action</th>
                      </tr>
                      @foreach($dataAppointments as $appointment)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$appointment->name}}</td>
                        <td>{{$appointment->doctor}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->message}}</td>
                        <td>{{$appointment->status}}</td>
                        <td>
                          <a href="{{url("/approved", $appointment->id)}}" class="btn btn-success">Approved</a>
                          <a href="{{url("/approved-cancel", $appointment->id)}}" class="btn btn-danger">Canceled</a>
                          <a href="{{url("/approved-email", $appointment->id)}}" class="btn btn-primary">Send Email</a>
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