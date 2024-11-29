<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arriendo de Libros y Películas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #618985;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #96bbbb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input, select, button, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .result-table th, .result-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .result-table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Arriendo de Libros y Películas</h1>

        <!-- Formulario de búsqueda -->
        <form id="searchForm">
            <div class="form-group">
                <label for="searchQuery">Buscar por título, autor/director o ISBN:</label>
                <input type="text" id="searchQuery" name="searchQuery" placeholder="Ingrese término de búsqueda" required>
            </div>
            <button type="submit">Buscar</button>
        </form>

        <!-- Resultados de búsqueda -->
        <h2>Resultados de la Búsqueda</h2>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor/Director</th>
                    <th>Disponibilidad</th>
                    <th>Fecha de Publicación/Estreno</th>
                    <th>Reseñas</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="results">
                <!-- Resultados dinámicos -->
            </tbody>
        </table>

        <!-- Selección de días para arriendo -->
        <form id="rentalForm" style="margin-top: 20px;">
            <h2>Solicitar Arriendo</h2>
            <div class="form-group">
                <label for="selectedItem">Seleccione un libro o película:</label>
                <select id="selectedItem" name="selectedItem" required>
                    <option value="">Seleccione de los resultados...</option>
                    <!-- Opciones dinámicas -->
                </select>
            </div>
            <div class="form-group">
                <label for="rentalDays">Número de días de arriendo:</label>
                <input type="number" id="rentalDays" name="rentalDays" min="1" placeholder="Ingrese número de días" required>
            </div>
            <div class="form-group">
                <label for="totalCost">Costo total estimado:</label>
                <input type="text" id="totalCost" name="totalCost" readonly>
            </div>
            <button type="submit">Confirmar Solicitud</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rentalForm = document.getElementById('rentalForm');
            const rentalDaysInput = document.getElementById('rentalDays');
            const totalCostInput = document.getElementById('totalCost');

            rentalDaysInput.addEventListener('input', () => {
                const days = parseInt(rentalDaysInput.value, 10) || 0;
                const costPerDay = 2000; // Ejemplo: $2000 por día
                totalCostInput.value = `$${days * costPerDay}`;
            });

            rentalForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert(`Solicitud confirmada. El costo total es ${totalCostInput.value}`);
            });
        });
    </script>
</body>
</html>
