
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="token" content="{{ csrf_token() }}">
    
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>@yield("title_page")</title>
  @include('layouts.app.styles')
  @yield('styles_page')
</head>

<body id="page-top">
  <div id="wrapper">
    @include("layouts.app.sidebar")
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include("layouts.app.header")

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">


          @yield("content")





        </div>
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      @include("layouts.app.footer")
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  @include('layouts.app.scripts')

  @yield('scripts_page')

  @yield("js")
  
</body>

</html>