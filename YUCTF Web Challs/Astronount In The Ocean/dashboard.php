<?php
// Vulnerable JWT parsing (no signature check)
if (!isset($_COOKIE['auth'])) die("Access denied!");

$token = $_COOKIE['auth'];
$payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], explode('.', $token)[1])));
$username = htmlspecialchars($payload->username);
$role = htmlspecialchars($payload->role);
?>

<!DOCTYPE html>
<html>
<head>
    <title>🛸🚨 Space Corp Dashboard - Cosmic Edition</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap");

        body {
            background: radial-gradient(circle at center, #000000, #1a0022, #000000);
            color: #ff69b4;
            font-family: 'Orbitron', monospace;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: hueShift 20s infinite linear;
        }

        .container {
            text-align: center;
            background: linear-gradient(135deg, #220033, #330044);
            padding: 3rem;
            border-radius: 25px;
            box-shadow: 0 0 25px #0ff, inset 0 0 15px #f0f;
            animation: float 6s ease-in-out infinite;
        }

        h2 {
            color: #00ffee;
            font-size: 2rem;
            animation: neonPulse 2s infinite;
        }

        .badge {
            background: <?= ($role === "admin") ? "#00ff99" : "#ff0066" ?>;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-size: 1em;
            box-shadow: 0 0 10px #fff, 0 0 5px #000 inset;
            animation: wiggle 2s infinite alternate;
            display: inline-block;
        }

        .admin-link {
            color: #00ffff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            display: inline-block;
            margin-top: 1rem;
            transition: transform 0.3s ease;
        }

        .admin-link:hover {
            text-decoration: underline;
            transform: scale(1.1) rotate(-1deg);
        }

        @keyframes neonPulse {
            0%, 100% { text-shadow: 0 0 10px #00ffee, 0 0 20px #ff00ff; }
            50% { text-shadow: 0 0 30px #00ffee, 0 0 60px #ff00ff; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes wiggle {
            from { transform: rotate(-5deg); }
            to { transform: rotate(5deg); }
        }

        @keyframes hueShift {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🛸 Greetings, <?= $username ?>!</h2>
        <p>🧬 Clearance Level: <span class="badge"><?= $role ?></span></p>

        <?php if ($role === "admin"): ?>
            <p>🚀 Access Granted! <a href="admin.php" class="admin-link">Warp to Command Center</a></p>
        <?php else: ?>
            <p>🛑 <strong>Access Denied! The stars are not aligned for you.</strong></p>
        <?php endif; ?>
    </div>
</body>
</html>
