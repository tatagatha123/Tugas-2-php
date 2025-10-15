<?php
session_start();

// Jika sudah login, arahkan langsung ke halaman role-nya
if (isset($_SESSION['role'])) {
    header("Location: {$_SESSION['role']}.php");
    exit;
}

// Simulasi data login (tanpa database)
$users = [
    'superadmin' => ['password' => '123', 'role' => 'superadmin'],
    'admin' => ['password' => '123', 'role' => 'admin'],
    'user'  => ['password' => '123', 'role' => 'user']
];

// Cek login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        header("Location: " . $users[$username]['role'] . ".php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Role System</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #001f3f, #004080);
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #002b5b;
            border: 3px solid #ffcc00;
            border-radius: 12px;
            padding: 40px 35px;
            width: 360px;
            text-align: center;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.6);
        }

        h2 {
            color: #ffcc00;
            margin-bottom: 25px;
            font-size: 24px;
            letter-spacing: 1px;
        }

        input {
            width: 92%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border: 2px solid #ffcc00;
            border-radius: 6px;
            background-color: #001f3f;
            color: #ffffff;
            font-size: 15px;
            transition: 0.3s;
        }

        input::placeholder {
            color: #bbbbbb;
        }

        input:focus {
            outline: none;
            border-color: #ffffff;
            background-color: #003366;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 6px;
            background-color: #ffcc00;
            color: #001f3f;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #ffd633;
            transform: scale(1.05);
        }

        .error {
            color: #fff;
            background: #b30000;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid #ff6666;
        }

        .hint {
            font-size: 13px;
            color: #ffeb99;
            margin-top: 20px;
            background: #003366;
            padding: 10px;
            border-radius: 8px;
            line-height: 1.5;
        }

        .hint b {
            color: #ffcc00;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Masukkan username" required><br>
            <input type="password" name="password" placeholder="Masukkan password" required><br>
            <button type="submit">Login</button>
        </form>

        <div class="hint">
            <b>Contoh akun login:</b><br>
            superadmin / 123<br>
            admin / 123<br>
            user / 123
        </div>
    </div>
</body>
</html> 