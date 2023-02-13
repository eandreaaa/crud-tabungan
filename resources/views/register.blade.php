<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Register Page</title>
</head>
    <body>

    <style>  
      body {
        background: url('asset/img/reg.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }

      .container {
        width: 50%;
        margin-top: 10%;
        border-radius: 20px;
        box-shadow: 0px 10px 10px grey;
      }

      button {
        width: 603px;
      }
    </style>

    <div class="container">
      <div class="card-body p-5 shadow-5 text-center">
        <h2 class="fw-bold mb-5">Registrasi</h2>
        <form method="POST" action="{{route('register.input')}}">

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                  </ul>
              </div>
          @endif

          @csrf
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                  <label class="form-label" for="form3Example1">Nama lengkap</label>
                <input type="text" id="form3Example1" class="form-control" name="name"/>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="form-outline">
                  <label class="form-label" for="form3Example2">Username</label>
                <input type="text" id="form3Example2" class="form-control" name="username"/>
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Email</label>
            <input type="email" id="form3Example3" class="form-control" name="email"/>
          </div>

          <div class="form-outline mb-4">
              <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control" name="password"/>
          </div>

          <p>Sudah punya akun? <a href="/todo">Login</a> aja!</p></p>
          {{-- <button type="submit" class="btn btn-primary btn-block mb-4">Registrasi</button> --}}
          <button type="submit" class="btn btn-primary btn-block">Registrasi</button>

        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>
<style>