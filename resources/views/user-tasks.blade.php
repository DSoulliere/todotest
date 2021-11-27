<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto px-4 sm:px-8 max-w-full">
                        <x-task-list :tasks="$tasks"></x-task-list>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
