<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ip = $_POST['ip'];

    if (strpos($ip, ';') !== false) {
        $output = "Semicolons are not allowed.";
    } else {
        $output = shell_exec("ping -c 4 $ip");
    }
}  
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Juice Ping Tool</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #222;
      color: #eee;
      font-family: 'Roboto', sans-serif;
    }
    .container {
      margin-top: 100px;
    }
    .card {
      background-color: #333;
      border: 1px solid #00c853;
      border-radius: 12px;
      color: #eee;
    }
    .card-header {
      background-color: #00c853;
      color: #111;
      text-align: center;
      font-weight: bold;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }
    .btn-success {
      background-color: #00c853;
      border: none;
      border-radius: 50px;
      width: 100%;
    }
    .output {
      background: #111;
      color: #9ccc65;
      padding: 15px;
      border-radius: 8px;
      margin-top: 15px;
      font-family: monospace;
      white-space: pre-wrap;
    }
    .error {
      color: #ff5252;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Juice Shop Ping Tool
        </div>
        <div class="card-body">
          <form method="POST">
            <div class="mb-3">
              <label for="ip" class="form-label">Enter IP or Host:</label>
              <input type="text" class="form-control" id="ip" name="ip" placeholder="8.8.8.8 or example.com" required />
            </div>
            <button type="submit" class="btn btn-success">Ping</button>
          </form>

          <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="output mt-3">
              <h5>Output:</h5>
              <pre><?php echo htmlspecialchars($output); ?></pre>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
