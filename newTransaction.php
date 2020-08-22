<?php
date_default_timezone_set("America/Toronto");
$month = date("m");
$year = date("Y");

$errors = array();
if (isset($_POST["saveButton"])) {
    $saveSuccess = saveData();
    if ($saveSuccess) {
        header("Location: /");
    }
}

require "req/header.php";

#region Summary
require "models/mdl_summary.php";
$summaryModel = new mdl_summary();

$users = $summaryModel->getUsers($month, $year);
$total = $summaryModel->getSummaryTotal($month, $year);
include "views/v_summary.php";
#endregion

#region Transaction
require "models/mdl_newTransaction.php";
$newTransactionModel = new mdl_newTransaction();

include "views/v_newTransaction.php";
#endregion

require "req/footer.php";

function saveData()
{

}