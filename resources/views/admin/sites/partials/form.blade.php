@csrf()
<input
    type="text"
    name="url"
    id="url"
    value="{{ $site->url ?? old('url') }}"
    placeholder="Digite a URL do site"
    required
/>

<button type="submit"> Enviar </button>