<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: application/xml; charset=UTF-8");

    $xmlData = $_POST['vault_request'];

    $dom = new DOMDocument();

    if (!$dom->loadXML($xmlData, LIBXML_NOENT | LIBXML_DTDLOAD)) {
        die("<?xml version='1.0' encoding='UTF-8'?><response><error>Invalid XML!</error></response>");
    }

    $request = simplexml_import_dom($dom);

    echo "<?xml version='1.0' encoding='UTF-8'?>\n";
    echo "<response>\n";
    echo "  <status>request_received</status>\n";
    echo "  <vault_id>" . htmlspecialchars($request->vaultID) . "</vault_id>\n";
    echo "  <requested_by>" . htmlspecialchars($request->employeeName) . "</requested_by>\n";
    echo "</response>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vault Gateway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #0b0b0b;
            color: #00ff99;
            font-family: 'Courier New', Courier, monospace;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .terminal {
            background-color: #111;
            border: 2px solid #00ff99;
            border-radius: 8px;
            padding: 30px;
            max-width: 800px;
            width: 100%;
        }

        h1 {
            color: #00ff99;
            text-align: center;
        }

        textarea {
            background-color: #000;
            color: #00ff99;
            width: 100%;
            height: 200px;
            padding: 10px;
            border: 1px solid #00ff99;
            border-radius: 4px;
            font-size: 14px;
            resize: vertical;
        }

        button {
            background-color: #00ff99;
            color: #000;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 30px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="terminal">
        <h1>Should we trust you?</h1>
        <p>Here, We trust no one, No one should be Trusted!!</p>

        <form method="POST" action="">
            <textarea name="vault_request" placeholder="&lt;vault&gt;&#10;  &lt;employeeName&gt;Alice&lt;/employeeName&gt;&#10;  &lt;vaultID&gt;VAULT-42&lt;/vaultID&gt;&#10;&lt;/vault&gt;"></textarea>
            <button type="submit">Submit</button>
        </form>

        <div class="footer">
            
        </div>
    </div>
</body>
</html>
