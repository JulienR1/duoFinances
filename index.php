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

include "views/v_index.php";
#endregion

require "req/footer.php";