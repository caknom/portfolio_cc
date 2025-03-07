<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>
<h3>Login</h3>
<form action="login.php" method="post">
    <label for="username">Username: </label>
    <input name="username" type="text" required><br><br>
    <label for="password">Password: </label>
    <input name="password" type="password" required><br><br>
    <input name="submit" type="submit" value="Login">
</form>
</body>
</html>