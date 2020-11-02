<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap core CSS -->
      <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="../../public/blog-home.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
      <link rel="stylesheet" type="text/css" href="/css/util.css">
      <link rel="stylesheet" type="text/css" href="/css/main.css">
      
        <?=$this->getMeta();?>
    </head>
    <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="/">PENKA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about/info">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br>
      <?=$content?>
      <!-- Bootstrap core JavaScript -->
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Footer -->
      <footer class="py-5 bg-dark">
          <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; PENKA 2020</p>
          </div>
          <!-- /.container -->
      </footer>
    </body>
</html>
