<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,700,900" rel="stylesheet" />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
  </head>
  <body class="text-center">
    {{ $slot }}
  </body>
</html>
