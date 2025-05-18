<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>fsociety</title>
  <style>
    :root {
      --primary: #6366f1;
      --primary-hover: #4f46e5;
      --background: #0f172a;
      --glass: rgba(255, 255, 255, 0.05);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Courier New', monospace;
      background: var(--background);
      color: #00ffcc;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-image:
        radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
        radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.15) 0%, transparent 50%);
      overflow: hidden;
    }

    .container {
      background: var(--glass);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 3rem;
      border: 1px solid rgba(255, 255, 255, 0.1);
      text-align: center;
      max-width: 1200px;
      box-shadow: 0 0 20px #00ffcc33;
      animation: flicker 2s infinite;
    }

    h1 {
      font-size: 2.2rem;
      margin-bottom: 1rem;
      letter-spacing: 2px;
      text-shadow: 0 0 10px #00ffcc;
    }

    p {
      color: #e0e0e0;
      margin-bottom: 1rem;
    }

    .hint {
      background: rgba(255, 255, 255, 0.05);
      border-left: 4px solid var(--primary);
      padding: 1rem;
      border-radius: 5px;
      font-size: 0.9rem;
      color: #888;
    }

    .btn {
      margin-top: 2rem;
      padding: 1rem 2rem;
      background: linear-gradient(45deg, #ff0055, #ff5500);
      color: white;
      text-decoration: none;
      border-radius: 50px;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0 0 10px #ff005588;
    }

    .btn:hover {
      background: linear-gradient(45deg, #ff0033, #ff7700);
      box-shadow: 0 0 20px #ff5500aa;
    }

    .glitch {
      color: #00ffcc;
      font-family: monospace;
      font-size: 0.85rem;
      text-align: center;
      opacity: 0.8;
      margin-top: 2rem;
    }

    iframe {
      margin-top: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px #00ffcc55;
    }

    @keyframes flicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.97; }
    }

    /* Particles */
    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      width: 2px;
      height: 2px;
      animation: move 10s linear infinite;
    }

    @keyframes move {
      0% { transform: translateY(0); opacity: 0.5; }
      100% { transform: translateY(-100vh); opacity: 0; }
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>🕶️ fsociety</h1>
    <p>“Control is an illusion. But in this vault... truths are hidden.”</p>

    <div class="hint">
      <p>Hint: Check the `fsociety/` path... if you *dare*</p>
    </div>

    <a href="fsociety/fsociety.php" class="btn">Access Node</a>

    <div class="glitch">
      <p>root@fsociety:~$ ./decrypt --clip</p>
    
<iframe width="1100" height="500" src="https://www.youtube.com/embed/KK0FBQBM60A?autoplay=1" title="Mr. Robot | Elliot Alderson - I&#39;m Crazy" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  <script>
    for (let i = 0; i < 100; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.left = Math.random() * 100 + 'vw';
      particle.style.top = Math.random() * 100 + 'vh';
      particle.style.animationDuration = (Math.random() * 5 + 5) + 's';
      document.body.appendChild(particle);
    }
  </script>

</body>
</html>
