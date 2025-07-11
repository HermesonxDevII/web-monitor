<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __("Endpoints - {$site->url}") }}
            </h2>

            <a
                href="{{ route('endpoints.create', $site->id) }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border rounded px-2 hover:bg-white hover:text-black transition duration-300"
            > Novo </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts />

                    <a
                        href="{{ route('sites.index') }}"
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border rounded px-2 hover:bg-white hover:text-black transition duration-300 mb-3"
                    > Voltar </a>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-3">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-6">Endpoint</th>
                                <th scope="col" class="p-6">Frequência</th>
                                <th scope="col" class="p-6">Próxima Verificação</th>
                                <th scope="col" class="p-6">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($endpoints as $endpoint)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4"> {{ $endpoint->endpoint }} </td>
                                    <td class="px-6 py-4"> {{ $endpoint->frequency }} </td>
                                    <td class="px-6 py-4"> {{ $endpoint->next_check }} </td>
                                    <td class="px-6 py-4 flex flex-row gap-2">
                                        <a
                                            href="{{ route('endpoints.edit', [$site->id, $endpoint->id]) }}"
                                            class="font-semibold text-gray-800 dark:text-gray-200 leading-tight border rounded p-1 hover:bg-white hover:text-black transition duration-300"
                                        > Editar </a> 

                                        <form
                                            action="{{ route('endpoints.destroy', $endpoint->id) }}"
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>