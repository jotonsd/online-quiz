<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://bootswatch.com/5/flatly/bootstrap.css" rel="stylesheet">

    <title>Online Quiz Management</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Online Quiz Management</h2>
            <div class="text-center text-dark">Login Form </div>
            <div class="card my-5">

              <form  method="post" action="{{route('login.action')}}" class="card-body cardbody-color p-lg-5">
                @csrf
                <div class="text-center">
                  <img src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px" alt="profile">
                </div>

                @if(session('error'))
                <div class="alert alert-danger">
                  <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="mb-3">
                  <input type="text" class="form-control" id="Username" name="user" aria-describedby="emailHelp"
                    placeholder="User Name">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" id="password" name="pass" placeholder="password">
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button></div>
                <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                  Registered? <a href="{{route('reg.view')}}" class="text-dark fw-bold"> Create an
                    Account</a>
                </div>
              </form>
            </div>

          </div>
        </div>
    </div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
