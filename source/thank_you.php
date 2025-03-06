<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link href="css/grid.css" rel="stylesheet">
    <style>
        @use '../abstracts' as a;

        body {
            color: white;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: black;
        }

        .container {
            text-align: center;
            padding: 30px 40px;
            border-radius: 10px;
            max-width: 400px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: white;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background: white;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            transition: background 0.3s;
        }

        a:hover {
            background: rgba(100, 100, 100, 0.5);
            color: white;
            border: 1px solid white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You!</h1>
        <p>Your message was sent successfully. We will get back to you soon.</p>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>