<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/base/style.css">
    <link rel="stylesheet" href="css/summary/style-summary.css">
    <?php
if ($_SERVER["SCRIPT_NAME"] == "/index.php") {
    echo '<link rel="stylesheet" href="css/transactionList/style-transactionList.css">';
    echo '<link rel="stylesheet" href="css/dateSelector/style-dateSelector.css">';
}
if ($_SERVER["SCRIPT_NAME"] == "/newTransaction.php") {
    echo '<link rel="stylesheet" href="css/newTransaction/style-newTransaction.css">';
}
?>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df8eedba6f.js" crossorigin="anonymous"></script>

    <title>Multi Finances</title>
</head>

<body>