
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link href="img/logo/logo.png" rel="icon"> -->
  <title>@yield("title")</title>
  @include('layouts.app.styles')
</head>

<body id="page-top">
  <div id="wrapper">
    @include("layouts.app.sidebar")
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include("layouts.app.header")

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <ol class="breadcrumb">

            </ol>
          </div>

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
  
</body>

</html>