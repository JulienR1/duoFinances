<?php
require "req/header.php";

#region Summary
require "models/mdl_summary.php";
$summaryModel = new mdl_summary();

$users = $summaryModel->getUsers("08", "2020");
$total = $summaryModel->getSummaryTotal("08", "2020");
include "views/v_summary.php";
#endregion

#region Main
require "models/mdl_transactionList.php";
$transactionListModel = new mdl_transactionList();

$transactions = $transactionListModel->getMonthlyTransactionDetails("08", "2020");
$month = "08";
$year = "2020";
include "views/v_transactionList.php";
#endregion

require "req/footer.php";