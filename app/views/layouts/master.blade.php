<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shorty</title>
  @section('css')
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/main.css">
  @show
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="jumbotron">
        <h1>Shorty</h1>
        <p>Simple url shortener</p>
      </div><!-- jumbotron -->
    </div><!-- row -->

    @if ($errors->any())
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <ul class="errors">
            @foreach ($errors->all() as $error)
              <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif


    @yield('content')

    <footer>
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="copyright">
            <span>&copy; Dominik {{ date('Y') }}.</span>
            <span><a href="https://github.com/dominikveils/shorty" target=_blank>View on GitHub</a></span>
          </div>
        </div>
      </div>
    </footer>
  </div>

  @section('js')
  <script src="/assets/js/vendor/requirejs.js" data-main="assets/js/main"></script>
  @show
</body>
</html>