<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #cfd9df, #e2ebf0);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 6px;
            color: #555;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(to right, #0056b3, #003f8a);
        }

        .error, .success {
            font-size: 13px;
            margin-bottom: 15px;
            text-align: left;
            padding: 10px;
            border-radius: 4px;
        }

        .error {
            background-color: #ffe5e5;
            color: #d32f2f;
        }

        .success {
            background-color: #e0f7e9;
            color: #2e7d32;
        }

        p {
            margin-top: 25px;
            font-size: 14px;
        }

        a {
            color: #007bff;
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
        <h2>Iniciar Sesión</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?= form_open('login') ?>
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>

            <label for="tipo">Tipo de usuario:</label>
            <select name="tipo" id="tipo" required>
                <option value="usuario" <?= old('tipo') == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                <option value="administrador" <?= old('tipo') == 'administrador' ? 'selected' : '' ?>>Administrador</option>
            </select>

            <?php if (isset($validation)): ?>
                <div class="error">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <input type="submit" value="Iniciar Sesión">
        <?= form_close() ?>

        <p>¿No tienes cuenta? <a href="<?= base_url('register') ?>">Regístrate aquí</a></p>
    </div>
</body>
</html>
