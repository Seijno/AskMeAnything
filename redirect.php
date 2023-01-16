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
            <h1 class="h3 mb-3 fw-normal text-white">Fill in your Token</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="token" placeholder="" required>
                <label for="token">Token</label>
            </div>

            <button class="w-100 mt-3 btn btn-lg btn-primary" name="submit" type="submit">Submit</button>

        </form>
    </main>
</body>
</html>

<?php

include "connect.php";

if (isset($_POST["submit"])) {

    $token = $_POST["token"];

    $query = $pdo->prepare("SELECT * FROM form WHERE token = $token");
    $query->execute();

    $form = $query->fetch(PDO::FETCH_ASSOC);

    if (empty($form)) {
        echo "<script>alert('No Form with this token');</script>";
    }

    $id = $form["id"];

    session_start();
    $_SESSION["ID"] = session_id();
    $_SESSION["TOKEN"] = $token;

    echo "<script>location.href='view_form.php?id=$id&token=$token';</script>";
    
}

?>