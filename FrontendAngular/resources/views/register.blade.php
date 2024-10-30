<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #618985;
        }
        .box {
            background-color: #96BBBB;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn {
            width: 100%;
            padding: 0.625rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-align: center;
            border-radius: 0;
            transition: background-color 0.2s ease;
        }
        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(6px);
        }
        .modal {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .modal p {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        .modal-buttons {
            display: flex;
            justify-content: space-around;
        }
        .confirm-btn {
            background-color: #4CAF50;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .cancel-btn {
            background-color: #F44336;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="max-w-sm mx-auto mt-10">
        <!-- Cuadro para el formulario completo -->
        <div class="box">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="https://i.ibb.co/q0SVKMQ/bibliotech-logo1.png" alt="Bibliotech Logo" class="w-24 h-24">
            </div>

            <!-- Título -->
            <h2 class="text-3xl font-semibold text-center mb-6">Regístrate</h2>

            <!-- Mensajes de éxito -->
            @if (session('success'))
                <div class="mb-5">
                    <ul class="bg-green-500 text-white p-3 rounded">
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="mb-5">
                    <ul class="bg-red-500 text-white p-3 rounded">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <!-- Campo RUT -->
                <div class="mb-5">
                    <label for="rut" class="block mb-2 text-sm font-medium text-gray-900">RUT:</label>
                    <input type="text" id="rut" name="rut" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su RUT" />
                </div>

                <!-- Campo Nombre -->
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre:</label>
                    <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su nombre"/>
                </div>

                <!-- Campo Apellido -->
                <div class="mb-5">
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Apellidos:</label>
                    <input type="text" id="lastname" name="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese sus apellidos"/>
                </div>

                <!-- Campo Correo Electrónico -->
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese su correo"/>
                </div>

                <!-- Campo Teléfono -->
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono:</label>
                    <input type="text" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required placeholder="Ingrese un número Telefónico (+56)"/>
                </div>

                <!-- Botones -->
                <div class="flex flex-col space-y-3">
                    <button type="submit" class="btn text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300">Registrar</button>

                    <!-- Botón de Volver -->
                    <a href="{{ route('login') }}" class="btn text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300">Volver</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div class="modal-bg" id="modal">
        <div class="modal">
            <p>¿Estás seguro de que deseas registrarte?</p>
            <div class="modal-buttons">
                <button class="confirm-btn">Confirmar</button>
                <button class="cancel-btn" id="cancel-btn">Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        // Mostrar la ventana emergente al hacer clic en el botón "Registrar"
        document.getElementById('register-btn').addEventListener('click', function(event) {
            event.preventDefault();  // Evita el envío inmediato del formulario
            document.getElementById('modal').style.display = 'flex';
        });

        // Cerrar la ventana emergente al hacer clic en "Cancelar"
        document.getElementById('cancel-btn').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
        });

        // Enviar el formulario al hacer clic en "Confirmar"
        document.querySelector('.confirm-btn').addEventListener('click', function() {
            document.querySelector('form').submit();
        });
    </script>
</body>
</html>
