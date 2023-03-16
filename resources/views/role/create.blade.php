<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Role') }}
            <a href='.' class='inline-flex px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md items-right dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800'>
                Go Back
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('role.store')}}" method="post">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="block mt-4">
                            Select Permissions
                            <x-input-error class="mt-2" :messages="$errors->get('permission')" />
                        </div>
                        @foreach ($permissions as $item)
                        <div class="block mt-4">
                            <label for="permission_{{$item->id}}" class="inline-flex items-center">
                                <input id="permission_{{$item->id}}" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="permission[]" value="{{$item->id}}">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $item->name }}</span>
                            </label>
                        </div>
                            @endforeach

                        <div class="flex items-center gap-4 pt-3">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'role-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
