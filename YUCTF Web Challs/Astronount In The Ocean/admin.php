<?php
if (!isset($_COOKIE['auth'])) die("Access denied!");

$token = $_COOKIE['auth'];
$payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], explode('.', $token)[1])));

if ($payload->role !== "admin") die("🔒 Insufficient clearance level!");

echo '
<!DOCTYPE html>
<html>
<head>
    <title>👾🌀 Wormhole Admin Panel 🛸🧬</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap");

        body {
            background: repeating-radial-gradient(circle at center, #000, #0f0 10%, #000 20%);
            font-family: "Orbitron", monospace;
            color: #ff00ff;
            animation: invertColors 3s infinite alternate;
        }

        .flag-box {
            background: linear-gradient(135deg, #00ffff, #ff00ff, #ffff00);
            padding: 3rem;
            border-radius: 50% 20% 50% 20%;
            width: 60%;
            margin: 10% auto;
            transform: rotate(-2deg) skew(3deg, 2deg);
            box-shadow: 0 0 50px #00f, inset 0 0 20px #f0f;
            animation: float 5s ease-in-out infinite;
            text-align: center;
        }

        @keyframes glow {
            0% { text-shadow: 0 0 5px #ff0, 0 0 10px #0ff; }
            50% { text-shadow: 0 0 20px #0f0, 0 0 40px #f0f; }
            100% { text-shadow: 0 0 5px #ff0, 0 0 10px #0ff; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-2deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
        }

        @keyframes invertColors {
            from { filter: invert(0); }
            to { filter: invert(1); }
        }

        h1 {
            font-size: 2.5rem;
            animation: glow 2s infinite;
        }

        strong {
            color: #00ffcc;
            background: #222;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            box-shadow: 0 0 15px #0ff;
        }

        p:last-child::after {
            content: " 👽💥";
            animation: wiggle 1s infinite alternate;
        }

        @keyframes wiggle {
            from { transform: rotate(-5deg); }
            to { transform: rotate(5deg); }
        }
    </style>
</head>
<body>
    <div class="flag-box">
        <h1>🛑 Interdimensional Breach Successful 🛑</h1>
        <p>Flag: <strong>YUCTF{D3epSp4c3_Dr1ft3r}</strong></p>
        <p>🌌 You\'ve breached reality and pwned the Quantum Core!</p>
    </div>
</body>
</html>
';
?>
