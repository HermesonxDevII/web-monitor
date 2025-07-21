<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __("Checks - {$endpoint->endpoint}") }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-alerts />

                    <a
                        href="{{ route('endpoints.index', $site->id) }}"
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight border rounded px-2 hover:bg-white hover:text-black transition duration-300 mb-3"
                    > Voltar </a>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-3">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-6">Status</th>
                                <th scope="col" class="p-6">Data/Hora</th>
                                <th scope="col" class="p-6">Response</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($checks as $check)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4"> {{ $check->status_code }} </td>
                                    <td class="px-6 py-4"> {{ $check->created_at }} </td>
                                    <td class="px-6 py-4"> {{ $check->response_body ?? '-' }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="p-6">
                        {{ $checks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>