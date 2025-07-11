@csrf()
<div class="w-full flex flex-col gap-3">
    <div>
        <label for="endpoint" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endpoint</label>
        <input
            type="text"
            name="endpoint"
            id="endpoint"
            value="{{ $endpoint->endpoint ?? old('endpoint') }}"
            placeholder="Digite o Endpoint"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required
        />
    </div>

    <div>
        <label for="frequency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequência</label>
        <input
            type="text"
            name="frequency"
            id="frequency"
            value="{{ $endpoint->frequency ?? old('frequency') }}"
            placeholder="Digite a Frequência"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required
        />
    </div>
</div>