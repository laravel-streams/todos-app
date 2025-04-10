<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Todos</h1>
    <ul class="list-disc pl-5">
        @foreach ($todos as $todo)
            <li class="mb-2">
                <span class="{{ $todo['completed'] ? 'line-through text-gray-500' : '' }}">
                    {{ $todo['title'] }}
                </span>
            </li>
        @endforeach
    </ul>
</div>
