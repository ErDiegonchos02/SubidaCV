<x-layouts.base title="Subir CV">

    <h1>Subir tu CV</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/cv/upload" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="cv" accept="application/pdf">

        <button type="submit">Subir CV</button>
    </form>

    @if($cv)
        <p style="margin-top:20px; text-align:center;">
            Ya tienes un CV subido.
        </p>

        <p style="text-align:center;">
            <a href="/cv/download">Ver / Descargar CV</a>
        </p>

        {{-- BOTÓN DE ELIMINAR CV --}}
        <form action="{{ route('cv.delete') }}" method="POST" style="margin-top:20px;">
            @csrf
            @method('DELETE')

            <button style="
                background:#c62828;
                color:white;
                padding:12px;
                width:100%;
                border:none;
                border-radius:8px;
                cursor:pointer;
                font-weight:bold;
                transition:0.3s;
            "
            onmouseover="this.style.background='#e53935'"
            onmouseout="this.style.background='#c62828'">
                Eliminar CV
            </button>
        </form>
    @endif

    <form action="/logout" method="POST" style="margin-top:20px;">
        @csrf
        <button style="background:#b71c1c;">Cerrar sesión</button>
    </form>

</x-layouts.base>
