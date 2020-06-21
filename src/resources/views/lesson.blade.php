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

    <div x-data="{ currentTab: 'first' }">
        <button @click="currentTab = 'first'">First</button>
        <button @click="currentTab = 'second'">Second</button>
        <button @click="currentTab = 'third'">Third</button>

        <div style="border: 1px dotted grey; padding: 1rem;">
            <div x-show="currentTab === 'first'">First tab.</div>
            <div x-show="currentTab === 'second'">Second tab.</div>
            <div x-show="currentTab === 'third'">Third tab.</div>
        </div>
    </div>

</body>
</html>
