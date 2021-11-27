<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto px-4 sm:px-8 max-w-full">
                        <div class="py-8">
                            <div class="flex flex-row mb-1 justify-between w-full">
                                <h2 class="text-2xl leading-tight">
                                    Create Task
                                </h2>
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                                <form action="{{ route('tasks.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block text-indigo-700 text-sm font-bold mb-2" for="username">
                                                Task Name
                                            </label>
                                            <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 mb-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                name="name" type="text" placeholder="A Name for a task" required>
                                                <button class="button" type="submit">Create Task</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
