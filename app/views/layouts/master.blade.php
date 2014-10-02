<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shorty</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/css/main.css">
  @section('css')
  @show
</head>
<body>
  
  <div class="container">
    <div class="row">
      <div class="jumbotron">
        <h1>Shorty</h1>
        <p>A simple url shortener service</p>
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
            <span>&copy; DV {{ date('Y') }}.</span>
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