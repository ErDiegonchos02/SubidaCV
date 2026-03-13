<x-layouts.base title="Iniciar sesión">

    <h1>Iniciar sesión</h1>

    @if($errors->any())
        <div class="success" style="background:#ffdddd; color:#a10000; border-left-color:#ff4444;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="Correo electrónico">

        <input type="password" name="password" placeholder="Contraseña">

        <button type="submit">Entrar</button>
    </form>

    <p style="text-align:center; margin-top:15px;">
        ¿No tienes cuenta? <a href="/register">Regístrate</a>
    </p>

</x-layouts.base>
