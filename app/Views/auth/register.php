<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #7e57c2;
            outline: none;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #7e57c2, #5c6bc0);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #5c6bc0, #7e57c2);
        }

        .error {
            color: #d32f2f;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: left;
        }

        p {
            margin-top: 25px;
            font-size: 14px;
        }

        a {
            color: #5c6bc0;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>

        <?= form_open_multipart('register/store') ?>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= old('nombre') ?>" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?= old('apellido') ?>" required>

            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <label for="tipo">Tipo de usuario:</label>
            <select name="tipo" id="tipo" required>
                <option value="usuario" <?= old('tipo') == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                <option value="administrador" <?= old('tipo') == 'administrador' ? 'selected' : '' ?>>Administrador</option>
            </select>

            <label for="avatar">Avatar (opcional):</label>
            <input type="file" name="avatar" id="avatar" accept="image/*">

            <?php if (isset($validation)): ?>
                <div class="error">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <input type="submit" value="Registrar">
        <?= form_close() ?>

        <p>¿Ya tienes cuenta? <a href="<?= base_url('/') ?>">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
