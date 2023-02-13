<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Login Page</title>
</head>
<body>
  
<style>
  body {
    background-image: url('asset/img/logiinin.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  .logcontainer {
    width: 40%;
    padding: 10px 2px;
    margin-left: 320px;
    background-color: white;
    margin-bottom: 266px;
    margin-top: 10%;
    border-radius: 20px;
    box-shadow: 3px 2px 4px 3px #b1b1b1;
  }
</style>
    <div class="iamge">
      <img src="assets/img/login.jpg" alt="">
    </div>
      <div class="logcontainer">
        <div class="col-7 col-5 col-5 offset-xl-1 mx-auto my-5">
          <form method="POST" action="{{route('login.auth')}}">

            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            @if (session('notAllowed'))
            <div class="alert alert-danger">
                {{ session('notAllowed') }}
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Username</label>
              <input type="text" class="form-control" placeholder="Username terdaftar" aria-label="Username" aria-describedby="addon-wrapping" name="username"> 
            </div>
  
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
            </div>
  
            <div class="d-flex justify-content-around align-items-center mb-4">
              <button type="submit" class="btn btn-primary btn-lg btn-block mx-auto">Login</button>
            </div>
          </form>
          <div class="d-flex justify-content-around align-items-center mb-4">
          <p>Belum punya akun?</p>
          <p>Yaudah sini <a href="{{url('/register')}}">buat akun</a> dulu</p>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>
    </html>