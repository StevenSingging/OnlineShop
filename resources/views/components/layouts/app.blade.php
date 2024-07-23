<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('theme/dist/favicon.ico')}}" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/dist/favicon.ico')}}" />
  <link href="{{asset('theme/dist/css/tabler.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('theme/dist/css/tabler-flags.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('theme/dist/css/tabler-payments.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('theme/dist/css/tabler-vendors.min.css?1692870487')}}" rel="stylesheet" />
  <link href="{{asset('theme/dist/css/demo.min.css?1692870487')}}" rel="stylesheet" />
  <title>{{ $title ?? 'OnlineShop' }}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
  @livewireStyles
  </head>
  <main>
    {{ $slot }}
  </main>
  <livewire:scripts />
  @livewireScripts
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('theme/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487')}}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.js" defer></script>
  <x-livewire-alert::scripts />

<!-- Libs JS -->
<script src="{{asset('theme/dist/libs/list.js/dist/list.min.js?1720208459')}}" defer></script>
<script src="{{asset('theme/dist/js/tabler.min.js?1692870487')}}" defer></script>
<script src="{{asset('theme/dist/js/demo.min.js?1692870487')}}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</html>