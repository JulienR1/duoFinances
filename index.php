<?php
if(isset($_GET["today"])){
    header("Location: /");
    exit();
}

$month = validateMonth(isset($_GET["m"]) ? $_GET["m"] : null);
$year = "20".validateYear(isset($_GET["y"]) ? $_GET["y"] : null);

require "req/header.php";

date_default_timezone_set("America/Toronto");
$month = date("m");
$year = date("Y");

#region Summary
require "models/mdl_summary.php";
$summaryModel = new mdl_summary();

$users = $summaryModel->getUsers($month, $year);
$total = $summaryModel->getSummaryTotal($month, $year);
include "views/v_summary.php";
#endregion

#region Main
require "models/mdl_transactionList.php";
$transactionListModel = new mdl_transactionList();

$transactions = $transactionListModel->getMonthlyTransactionDetails($month, $year);
include "views/v_transactionList.php";
#endregion

require "req/footer.php";

#region Validations
function validateYear($yearTest){
    if(is_numeric($yearTest)){
        if($yearTest >= 0 && $yearTest < 100){
            return floor($yearTest);
        }
    }
    return date("y");
}

function validateMonth($monthTest){
    if(is_numeric($monthTest)){
        if($monthTest > 0 && $monthTest <= 12){
            return ceil($monthTest);
        }
    }
    return date("m");
}
#endregion