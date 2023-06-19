
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://squid-app-im2ht.ondigitalocean.app/backend/plugins/fontawesome-free/css/all.min.css">  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://squid-app-im2ht.ondigitalocean.app/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">  <!-- Theme style -->
  <link rel="stylesheet" href="https://squid-app-im2ht.ondigitalocean.app/backend/dist/css/adminlte.min.css"></head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{route('hotels.register')}}" class="h1"><b>Travel X</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register to start your session</p>

      <form action="{{route('hotels.register')}}" method="post" id="form">
        @csrf
        @error('Hotel_name') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
            <input type="text" name="Hotel_name" class="form-control" placeholder="Hotel Name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-user"></span>
              </div>
            </div>
          </div>
          @error('owner_name') <span class="text-danger">{{ $message }}</span> @enderror
          <div class="input-group mb-3">
              <input type="text" name="owner_name" class="form-control" placeholder="Owner Name" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
          @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('city_id') <span class="text-danger">{{ $message }}</span> @enderror
          <div class="input-group mb-3">
            <select type="text" name="city_id" class="form-control" placeholder="City" required>
                <option value="" disabled selected>city</option>
                <option value="1">Cairo</option>
                <option value="2">Alexandria</option>
                <option value="3">Giza</option>
                <option value="4">Sharm El Sheikh</option>
                <option value="5">Luxor</option>
                <option value="6">Aswan</option>
                <option value="7">Hurghada</option>
                <option value="8">Port Said</option>
                <option value="9">Damietta</option>
                <option value="10">Mansoura</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fa fa-flag "></span>
              </div>
            </div>
          </div>
          @error('facilities') <span class="text-danger">{{ $message }}</span> @enderror
          <div class="input-group mb-3">
              <textarea type="text" name="facilities" class="form-control" placeholder="Facilities" required></textarea>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>
          @error('application_document') <span class="text-danger">{{ $message }}</span> @enderror
          <div class="input-group mb-3">
              <textarea type="text" name="application_document" class="form-control" placeholder="Aplication Document" required></textarea>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-user"></span>
                </div>
              </div>
            </div>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div style="width: 100%">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
<script>
    localStorage.setItem('form', document.getElementById('inputField').value);
document.getElementById('form').value = localStorage.getItem('inputValue');
 </script>
      <!-- /.social-auth-links -->


      <p class="mb-1">
        <a href="{{route('hotels.login')}}">I already have a membership</a>
      </p>
      <p class="mb-0">
        <a href="{{route('hotels.register')}}" class="text-center">Register As Admin </a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
