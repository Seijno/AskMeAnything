<?php

session_start();
$session = session_id();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="text-center bg-dark">
    <main class="form-signin">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal text-white">Create Form</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="title" placeholder="" required>
                <label for="title">Title</label>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" name="question_1" placeholder="" required>
                <label for="question_1">Question 1</label>
            </div>
            
            <button class="w-100 mt-3 btn btn-lg btn-primary" name="submit" type="submit">Submit</button>
            
        </form>
    </main>
</body>
</html>

<?php

include "connect.php";

?>