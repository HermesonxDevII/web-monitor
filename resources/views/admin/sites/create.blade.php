<h1>Cadastrar Novo Site</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('sites.store') }}" method="post">
    @csrf()
    <input
        type="text"
        name="url"
        id="url"
        value="{{ old('url') }}"
        placeholder="Digite a URL do site"
        required
    />

    <button type="submit"> Enviar </button>
</form>