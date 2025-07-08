<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts />

                    <form
                        action="{{ route('sites.update', $site->id) }}"
                        method="post"
                        class="flex gap-1"
                    >
                        @method('PUT')
                        @include('admin/sites/partials/form')
                    </form>

                    <form
                        action="{{ route('sites.destroy', $site->id) }}"
                        method="post"
                        class="flex flex-row gap-2"
                    >
                        @method('DELETE')
                        @csrf()
                        <a
                            href="{{ route('sites.index') }}"
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
                        > Voltar </a>

                        <button
                            type="submit"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        > Deletar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>