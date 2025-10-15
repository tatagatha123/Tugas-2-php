<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #001f3f;
            color: #fff;
        }

        header {
            background: #ffcc00;
            color: #001f3f;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header form button {
            background: #001f3f;
            color: #ffcc00;
            font-weight: bold;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        header form button:hover {
            background: #002b5b;
        }

        main {
            padding: 30px;
        }

        h2 {
            color: #ffcc00;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #002b5b;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background: #ffcc00;
            color: #001f3f;
        }

        tr:nth-child(even) {
            background: #003366;
        }

        tr:hover {
            background: #004080;
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #001933;
            color: #aaa;
            font-size: 13px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard User</h1>
        <form method="POST" action="logout.php">
            <button type="submit">Logout</button>
        </form>
    </header>

    <main>
        <h2>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
        <p>Berikut adalah informasi akun Anda:</p>

        <table>
            <thead>
                <tr>
                    <th>Informasi</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Username</td>
                    <td><?= htmlspecialchars($_SESSION['username']) ?></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><?= htmlspecialchars($_SESSION['role']) ?></td>
                </tr>
                <tr>
                    <td>Status Akun</td>
                    <td>Aktif</td>
                </tr>
                <tr>
                    <td>Tanggal Login</td>
                    <td><?= date("d F Y") ?></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>


