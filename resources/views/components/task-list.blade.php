

<div class="py-8">
    <div class="flex flex-row mb-1 justify-between w-full">
        <h2 class="text-2xl leading-tight">
            Task Lists
        </h2>
        <div>
            <a class="button" type="submit" href="{{ route('tasks.create') }}">
                Create Task
            </a>
        </div>
    </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th scope="col" class="table-heading">
                            List Name
                        </th>
                        <th scope="col" class="table-heading">
                            Created at
                        </th>
                        <th scope="col" class="table-heading">
                            status
                        </th>
                        <th scope="col" class="table-heading">
                        </th>

                        <th scope="col" class="table-heading">
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $task->name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $task->created_at }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    @if ($task->is_complete)
                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    @endif

                                    <span class="relative">
                                        {{ $task->is_complete ? "Complete" : "In Progress" }}
                                    </span>
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if (empty($task->deleted_at) && empty($task->is_complete))

                                    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="button" type="submit">Complete Task</button>
                                    </form>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if (empty($task->deleted_at))
                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                @else
                                    <span class="text-red-600 hover:text-red-900">DELETED</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
