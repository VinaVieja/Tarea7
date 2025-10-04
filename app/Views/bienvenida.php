<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container-box {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 420px;
            width: 100%;
        }

        h1 {
            color: #333;
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 25px;
        }

        img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 3px solid #007bff;
        }

        p {
            color: #555;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .btn-logout {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-weight: 500;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #bb2d3b;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container-box">
        <h1>¡Bienvenido, <?= esc(session()->get('nombre') . ' ' . session()->get('apellido')) ?>!</h1>
        
        <img src="<?= base_url(esc(session()->get('avatar'))) ?>" alt="Avatar de usuario">

        <p>Tu rol es: <strong class="text-primary"><?= esc(session()->get('tipo')) ?></strong></p>

        <a href="<?= base_url('logout') ?>" class="btn btn-logout mt-3">Cerrar Sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
