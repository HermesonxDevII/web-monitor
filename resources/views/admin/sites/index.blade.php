<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sites') }}
            </h2>

            <a
                href="{{ route('sites.create') }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border rounded px-2 hover:bg-white hover:text-black transition duration-300"
            > Novo </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts />
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-6">Site</th>
                                <th scope="col" class="p-6">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sites as $site)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4"> {{ $site->url }} </td>
                                    <td class="px-6 py-4 flex flex-row gap-2">
                                        <a
                                            href="{{ route('sites.edit', $site->id) }}"
                                            class="font-semibold text-gray-800 dark:text-gray-200 leading-tight border rounded p-1 hover:bg-white hover:text-black transition duration-300"
                                        > Editar </a> 

                                        <a
                                            href="{{ route('endpoints.index', $site->id) }}"
                                            class="font-semibold text-gray-800 dark:text-gray-200 leading-tight border rounded p-1 hover:bg-white hover:text-black transition duration-300"
                                        > Endpoints </a>

                                        <form
                                            action="{{ route('sites.destroy', $site->id) }}"
                                            method="post"
                                            class="flex flex-row gap-2"
                                        >
                                            @method('DELETE')
                                            @csrf()

                                            <button
                                                type="submit"
                                                class="font-semibold text-gray-800 dark:text-gray-200 leading-tight border rounded p-1 hover:bg-white hover:text-black transition duration-300"
                                            > Deletar </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-6">
                        {{ $sites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>