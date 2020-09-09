<?php
date_default_timezone_set("America/Toronto");
$month = date("m");
$year = date("Y");

require "models/mdl_newTransaction.php";
$newTransactionModel = new mdl_newTransaction();

if (isset($_POST["saveButton"])) {
    $data = validateData();
    if ($data["valid"] === true) {
        $saveSuccess = $newTransactionModel->save($data);
        if ($saveSuccess) {
            header("Location: /");
        } else {
            echo "Une erreur SQL est survenue.";
            exit();
        }
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
include "views/v_newTransaction.php";
#endregion

require "req/footer.php";

function validateData()
{
    $data = array();
    $data["valid"] = true;

    $isRefund = isset($_POST["typeToggle"]) && $_POST["typeToggle"] == "on";
    $data["isRefund"] = $isRefund;

    $senderId = $receiverId = $amount = -1;
    $proof = "";
    if (isset($_POST["sender"])) {
        $senderId = $_POST["sender"];
        if (!is_numeric($senderId)) {
            $senderId = -1;
            $data["valid"] = false;
        }
        $data["sender"] = $senderId;
    } else {
        $data["valid"] = false;
    }

    if ($isRefund) {
        if (isset($_POST["receiver"])) {
            $receiverId = $_POST["receiver"];
            if (!is_numeric($receiverId)) {
                $receiverId = -1;
                $data["valid"] = false;
            }
            $data["receiver"] = $receiverId;
        } else {
            $data["valid"] = false;
        }
    }

    if (isset($_POST["amount"])) {
        $amount = $_POST["amount"];
        if (!is_numeric($amount) || $amount < 0) {
            $amount = -1;
            $data["valid"] = false;
        }
        $data["amount"] = $amount;
    } else {
        $data["valid"] = false;
    }

    if (isset($_POST["proof"])) {
        $data["proof"] = $_POST["proof"];
    }

    if (isset($data["sender"]) && isset($data["receiver"]) && $data["sender"] == $data["receiver"]) {
        $data["valid"] = false;
        $data["receiver"] = -1;
    }

    return $data;
}