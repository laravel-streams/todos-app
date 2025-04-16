<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Todos</h1>

    <!-- Add New Todo Form -->
    <form wire:submit.prevent="addTodo" class="flex items-center mb-6">
        <input type="text" wire:model="newTodo" placeholder="Enter a new todo" class="flex-1 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="p-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">Add</button>
    </form>

    <!-- List of Todos -->
    <ul class="space-y-4">
        @foreach($todos as $todo)
            <li class="flex items-center justify-between p-4 bg-gray-100 rounded-md shadow-sm">
                <span class="{{ $todo->completed ? 'line-through text-gray-500' : '' }}">{{ $todo->title }}</span>
                <div class="flex space-x-2">
                    <button wire:click="toggleComplete({{ $todo->id }})" class="px-3 py-1 text-sm text-white rounded-md {{ $todo->completed ? 'bg-gray-500 hover:bg-gray-600' : 'bg-blue-600 hover:bg-blue-700' }}">
                        {{ $todo->completed ? 'Mark Incomplete' : 'Mark Complete' }}
                    </button>
                    <button wire:click="delete({{ $todo->id }})" class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
