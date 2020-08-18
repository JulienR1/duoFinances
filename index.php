<?php
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