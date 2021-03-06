<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    <script src="/js/app.js"></script>
</head>

<body class="p-10 max-w-lg mx-auto">

    <form
        x-data="{
            form: {
                name: ''
            },

            user: null,

            submit() {
                fetch('https://reqres.in/api/users', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.form)
                })
                .then(response => response.json())
                .then(user => this.user = user);
            }
        }"
        @submit.prevent="submit"
    >
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="name"
            >
                Name
            </label>

            <input x-model="form.name"
                   class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="name"
                   id="name"
                   required
            >
        </div>

        <template x-if="user">
            <div x-text="'The user ' + user.name + ' was created at ' + user.createdAt"></div>
        </template>
    </form>

    <hr class="mb-8 mt-8">

    <div x-data="taskApp()"
        class="bg-gray-300 px-10 py-6 rounded">
        <form @submit.prevent="submit()">
            <input x-model="newTask"
                   class="border border-gray-400 p-2 w-full"
                   type="text"
                   placeholder="Go to the market..."
            >
        </form>
        <ul class="list-disc mt-3">
            <template x-for="(task, index) in tasks" :key="index">
                <li>
                    <input type="checkbox" x-model="task.completed">
                    <span x-text="task.body" :class="{ 'line-through' : task.completed }"></span>
                </li>
            </template>
        </ul>
    </div>

</body>

</html>
