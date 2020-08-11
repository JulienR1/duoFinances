<?php require "req/header.php";?>

<?php
require "models/mdl_summary.php";
$summaryModel = new mdl_summary();

$users = $summaryModel->getUsers("08", "2020");
$total = $summaryModel->getSummaryTotal("08", "2020");

include "views/v_summary.php";

?>

<?php require "req/footer.php";?>