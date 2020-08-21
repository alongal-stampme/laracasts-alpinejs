<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alpine Example Events</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    </head>
    <body class="p-12">
        <div x-data>
            <button @click="$dispatch('flash', 'HI THERE AGAIN')">Trigger flash message</button>
        </div>

        <hr>

        <!-- Flash -->
        <div
            x-data="{ show: false, message: '' }"
            x-show.transition.opacity.scale.75="show"
            @flash.window="
                show = true;
                message = $event.detail;
                setTimeout(() => show = false, 3000)
            "
            x-text="message"
            class="fixed bottom-0 right-0 mb-4 mr-4 bg-blue-500 text-white p-4 rounded"
        >

        </div>

        <script>
            // window.flash = message => window.dispatchEvent(new CustomEvent('flash', { detail: message }))
        </script>
    </body>
</html>
