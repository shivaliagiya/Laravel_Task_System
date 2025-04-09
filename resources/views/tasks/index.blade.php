<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">📋 My Tasks</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="fixed top-5 right-5 z-50 bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded shadow-lg"
                    role="alert"
                >
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline ml-2">{{ session('success') }}</span>
                </div>
            @endif


            <div class="mb-4 text-right">
                <a href="{{ route('tasks.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    ➕ Add New Task
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Id</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Title</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Description</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Due Date</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($tasks as $index => $task)
                        <tr class="{{ $task->status === 'completed' ? 'bg-green-50' : 'hover:bg-gray-50' }}">
                            <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $task->title }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $task->description }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $task->due_date }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if ($task->status === 'completed')
                                    <span class="text-green-600 font-semibold">✅ Completed</span>
                                @else
                                    <span class="text-yellow-600 font-semibold">⏳ Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                                        @csrf
                                        <button
                                            type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded-md"
                                        >
                                            ✔ Complete
                                        </button>
                                    </form>

                                    <a href="{{ route('tasks.edit', $task->id) }}"
                                       class="bg-blue-500 hover:bg-blue-600 text-white text-xs px-3 py-1 rounded-md">
                                        ✏ Edit
                                    </a>

                                    <form action="{{ route('tasks.delete', $task->id) }}" method="POST">
                                        @csrf
                                        <button
                                            type="submit"
                                            onclick="return confirm('Are you sure?')"
                                            class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded-md"
                                        >
                                            🗑 Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-sm text-gray-500">
                                No tasks found. Create your first one!
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
