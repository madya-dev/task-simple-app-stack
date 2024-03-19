<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body.dark {
            background-color: #1F2937;
            color: #F3F4F6;
        }

        body.dark input,
        body.dark button {
            background-color: #374151;
            color: #F3F4F6;
        }

        body.dark button:hover {
            background-color: #4C566A;
        }
    </style>
</head>

<body class="bg-white text-gray-800" id="body">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-semibold mb-4">To-Do List</h1>

        <!-- Dark Mode Switch -->
        <div class="flex items-center mb-4">
            <label for="darkMode" class="mr-2">Dark Mode:</label>
            <input type="checkbox" id="darkMode" class="form-checkbox h-5 w-5 text-indigo-600">
        </div>

        <!-- Task Input -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="name" placeholder="Add a new task"
                class="w-full p-4 border border-gray-300 rounded-md">
            <button type="submit"
                class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Task</button></form>

        <!-- Task List -->
        <ul>
            @foreach ($tasks as $task)
            <li class="flex justify-between items-center p-2 border-b border-gray-300">
                <span>{{ $task->name }}</span>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 p-4">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>

    <script>
        const darkModeSwitch = document.getElementById('darkMode');
        darkModeSwitch.addEventListener('change', () => {
            document.getElementById('body').classList.toggle('dark')
        });
    </script>
</body>

</html>