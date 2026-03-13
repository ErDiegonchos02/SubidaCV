<x-layouts.base title="Registro">

    <h1>Crear cuenta</h1>

    @if($errors->any())
        <div class="success" style="background:#ffdddd; color:#a10000; border-left-color:#ff4444;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Nombre completo">

        <input type="email" name="email" placeholder="Correo electrónico">

        <input type="password" name="password" placeholder="Contraseña">

        <button type="submit">Registrarme</button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        ¿Ya tienes cuenta? <a href="/login">Inicia sesión</a>
    </p>

</x-layouts.base>
