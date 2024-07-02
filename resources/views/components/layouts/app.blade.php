<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Fast PTS' Affiliate List</title>
    <!-- CSS files -->

    <style>
      @import url("https://rsms.me/inter/inter.css");
      :root {
        --tblr-font-sans-serif: "Inter Var", -apple-system, BlinkMacSystemFont,
          San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
        font-feature-settings: "cv03", "cv04", "cv11";
      }
      .loading-indicator {
  display: inline-block;
  padding: 10px;
  background-color: rgba(0, 123, 255, 0.2); /* Light blue background with some transparency */
  border-radius: 5px;
  color: #007bff; /* Primary blue color */
  font-weight: bold;
  text-align: center;
  animation: pulse 1.5s infinite; /* Animation to create a pulsing effect */
}

/* Keyframes for pulsing animation */
@keyframes pulse {
  0% {
    background-color: rgba(0, 123, 255, 0.2);
  }
  50% {
    background-color: rgba(0, 123, 255, 0.5);
  }
  100% {
    background-color: rgba(0, 123, 255, 0.2);
  }
}
.notfound{
  text-align: center; padding: 10px; color: #888; font-style: italic; color:rgb(32,107,196,0.8);
}

    </style>
<link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dist/css/demo.min.css') }}" rel="stylesheet" />

  </head>
  <body>
{{ $slot }}

   <script src="{{ asset('dist/js/demo-theme.min.js?1684106062')}}"></script>
  <script src="{{ asset('dist/js/tabler.min.js?1684106062')}}" defer=""></script>
  <script src="{{ asset('dist/js/demo.min.js?1684106062')}}" defer=""></script>
  <script src="{{ asset('dist/js/tabler.min.js?1684106062')}}" defer=""></script>
  <script src="{{ asset('dist/js/demo.min.js?1684106062')}}" defer=""></script>

</body>
</html>
