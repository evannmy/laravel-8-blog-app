<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.3/examples/dashboard/"
    />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <link href="/css/dashboard.css" rel="stylesheet" />
    <style>
      /* .trix-button-group.trix-button-group--file-tools {
        border: none;
      }

      .trix-button--icon-attach{
        display: none;
      } */

      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
  </head>
  <body>
    @include('dashboard.partials.header')

    <div class="container-fluid">
      <div class="row">
        @include('dashboard.partials.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
          @yield('content')
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js" class="astro-vvvwv3sm"></script>
  </body>
</html>
