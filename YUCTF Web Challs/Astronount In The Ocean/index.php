<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "dummy_key";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $users = ["astro" => "Astroo", "admin" => "V3ryStr0ngP4ssw0rd"];

    if (isset($users[$username]) && $users[$username] === $password) {
        $payload = ["username" => $username, "role" => "user"];
        $jwt = JWT::encode($payload, $key, 'HS256');
        setcookie("auth", $jwt, time() + 3600, "/");
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "🚨 Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>🛸 Quantum Rift Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap");

        body { 
            background: radial-gradient(circle, #1a0022, #000000);
            color: #ffffff; 
            font-family: 'Orbitron', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: colorCycle 15s infinite linear;
        }

        .login-box {
            background: linear-gradient(135deg, #2c003e, #100020);
            padding: 3rem;
            border-radius: 20px;
            width: 350px;
            box-shadow: 0 0 25px #00ffee, inset 0 0 15px #ff00ff;
            animation: floaty 5s ease-in-out infinite;
        }

        input {
            padding: 12px;
            margin: 12px;
            width: 80%;
            background: rgba(255,255,255,0.07);
            border: 1px solid #00ffcc;
            border-radius: 8px;
            color: #ffffff;
            font-family: 'Orbitron', monospace;
            box-shadow: 0 0 10px #00ffcc20;
            transition: transform 0.3s ease;
        }

        input:focus {
            outline: none;
            transform: scale(1.05);
            box-shadow: 0 0 20px #00ffccaa;
        }

        button {
            background: linear-gradient(45deg, #00ffff, #ff00ff);
            border: none;
            padding: 10px 25px;
            color: white;
            cursor: pointer;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 10px;
            animation: pulseGlow 2s infinite;
        }

        .hint {
            color: #ff00ff;
            font-size: 0.9em;
            animation: hintTwinkle 1.5s infinite alternate;
        }

        h2 {
            font-size: 1.5rem;
            color: #00ffee;
            text-shadow: 0 0 10px #0ff, 0 0 15px #f0f;
            margin-bottom: 1rem;
        }

        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 10px #00ffff88; }
            50% { box-shadow: 0 0 25px #ff00ff88; }
            100% { box-shadow: 0 0 10px #00ffff88; }
        }

        @keyframes hintTwinkle {
            from { opacity: 0.4; transform: scale(1); }
            to { opacity: 1; transform: scale(1.05); }
        }

        @keyframes colorCycle {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🚀 Welcome to Space Corp</h2>
        <?php if(isset($error)) echo "<p style='color:#ff4444'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Astronaut ID" required><br>
            <input type="password" name="password" placeholder="Launch Code" required><br>
            <!-- Hint: Try astronaut ID "astro" with launch code "Astroo" -->
            <button type="submit">🌌 Launch</button>
        </form>
        <p class="hint">🪐 Hint: Look deeper into the void...</p>
    </div>
</body>
</html>
