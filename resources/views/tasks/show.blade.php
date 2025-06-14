<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">{{ $task->title }}</h3>

                        <div class="mb-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if ($task->status == 'completed') bg-green-100 text-green-800
                                @elseif ($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ str_replace('_', ' ', ucfirst($task->status)) }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Created: {{ $task->created_at->format('M d, Y H:i') }}</p>
                            <p class="text-sm text-gray-600">Last Updated: {{ $task->updated_at->format('M d, Y H:i') }}</p>
                        </div>

                        <div class="mb-6">
                            <h4 class="text-md font-medium mb-2">Description:</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="whitespace-pre-line">{{ $task->description ?: 'No description provided.' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <a href="{{ route('tasks.edit', $task) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit Task
                            </a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete Task
                                </button>
                            </form>

                            <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
