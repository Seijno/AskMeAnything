<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/signin.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="text-center bg-dark">
    <main class="form-signin">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal text-white">Please sign up</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                <label for="email">Email adress</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button class="w-100 mt-3 btn btn-lg btn-primary" name="submit" type="submit">Sign Up</button>

        </form>
    </main>
</body>
</html>

<?php

include "connect.php";

if (isset($_POST["submit"])) {

    if (empty($_POST["email"] || $_POST["password"])) {
        echo "<script>alert('You must fill in all the forms');</script>";
        return;
    }

    $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindParam(":email", $_POST["email"]);
    $query->execute();

    if ($query->rowCount() == 0) {

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $query = $pdo->prepare("INSERT INTO user (id, email, roles, password) VALUES (null, ?, ?, ?);");
        $data = array($_POST["email"], ["USER"], $password);
        $query->execute($data);
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>alert('This email is already used');</script>";
    }
}

?>