<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
{{--    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
</head>

<body class="m-8 p-8">

    <div x-data="{
            first: 0,
            second: 0
        }"
    >
        <input type="text" x-model.number="first"> +
        <input type="text" x-model.number="second"> =
        <output x-text="first + second"></output>
    </div>

</body>
</html>
