<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <!-- Primary Meta Tags -->
    <title>{{__("og.title")}}</title>
    <meta name="title" content="{{__("og.title")}}" />
    <meta name="description" content="{{__("og.description")}}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{__("og.url")}}" />
    <meta property="og:title" content="{{__("og.title")}}" />
    <meta property="og:description" content="{{__("og.description")}}" />
    <meta property="og:image" content="{{__("og.url")}}/images/og/{{app()->getLocale()}}.jpg" />

    <!-- X (Twitter) -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{__("og.url")}}" />
    <meta property="twitter:title" content="{{__("og.title")}}" />
    <meta property="twitter:description" content="{{__("og.description")}}" />
    <meta property="twitter:image" content="{{__("og.url")}}/images/og/{{app()->getLocale()}}.jpg" />

    <link rel="icon" type="image/png" href="/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Nein / Minute" />
    <link rel="manifest" href="/images/favicon/site.webmanifest" />
  </head>
  <body class="bg-background">
    {{ $slot }}
  </body>
</html>
