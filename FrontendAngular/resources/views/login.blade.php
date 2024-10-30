<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#618985] flex items-center justify-center h-screen">
    <div class="bg-[#96bbbb] shadow-lg rounded-lg p-8 w-96">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="w-24 h-24">
        </div>

        <!-- Formulario de Iniciar Sesión -->
        <h2 class="text-2xl font-bold text-center mb-6">Iniciar Sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="nombre@dominio.com" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="********" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center">
                <!-- Botón Acceder -->
                <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Acceder</button>

                <!-- Botón Registrar (con color #c19875) -->
                <a href="{{ route('register') }}" class="bg-[#c19875] text-white px-4 py-2 rounded-md hover:bg-[#a67c55]">Registrar</a>
            </div>
        </form>
    </div>
</body>
</html>
