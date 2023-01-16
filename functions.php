<?php

function getForm($id, $token) {

    include "connect.php";
    $query = $pdo->prepare("SELECT * FROM form WHERE id = $id");
    $query->execute();

    $form = $query->fetch(PDO::FETCH_ASSOC);

    if (empty($form)) {
        header("Location: redirect.php");
    }

    if ($token != $form["token"]) {
        header("Location: redirect.php");
    }

}

function getFormQuestions($id) {

    include "connect.php";
    $query = $pdo->prepare("SELECT * FROM question WHERE form_id = $id");
    $query->execute();

    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $question) {
        echo $question["question"];
    }
}

