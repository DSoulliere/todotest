<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container mx-auto px-4 sm:px-8 max-w-full">
                        @if (session('status'))
                            <div class="flex-auto  px-2 py-2 bg-green-200 rounded-full font-semibold text-green-900 leading-tight text-center">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($user->role->name === 'user')
                            <x-task-list :tasks="$tasks"></x-task-list>
                        @else
                            <x-user-list :users="$users"></x-user-list>
                        @endif
                    </span>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
