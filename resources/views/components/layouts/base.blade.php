<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Subida CV' }}</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f6ff;
            color: #1a2b4c;
        }

        .container {
            max-width: 450px;
            margin: 60px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            animation: fadeIn 0.6s ease-out;
        }

        h1 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 25px;
        }

        input, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #c5d9ff;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #0d47a1;
            box-shadow: 0 0 5px rgba(13,71,161,0.3);
            transition: 0.3s;
        }

        button {
            background: #0d47a1;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #1565c0;
            transform: translateY(-2px);
        }

        a {
            color: #0d47a1;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .success {
            background: #d4edda;
            padding: 10px;
            border-radius: 8px;
            color: #155724;
            margin-bottom: 15px;
            border-left: 5px solid #28a745;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <div class="container">
        {{ $slot }}
    </div>
</body>
</html>
