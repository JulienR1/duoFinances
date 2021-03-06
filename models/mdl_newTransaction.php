<?php

require_once "DatabaseHandler.php";

class mdl_newTransaction extends DatabaseHandler
{
    public static function save($data)
    {
        $fileName = self::copyFile($data["sender"]);

        $success = true;
        self::connect();

        try {
            $sql = "";
            if ($data["isRefund"]) {
                $sql = "CALL CreateRefund(?, ?, ?, ?, ?)";
                self::executeSqlStmt($sql, "iidss", $data["sender"], $data["receiver"], $data["amount"], $fileName, $data["desc"]);
            } else {
                $sql = "CALL CreateTransaction(?, ?, ?, ?)";
                self::executeSqlStmt($sql, "idss", $data["sender"], $data["amount"], $fileName, $data["desc"]);
            }
        } catch (Exception $e) {
            echo $e;
            $success = false;
        } finally {
            self::close();
        }

        return $success;
    }

    private static function copyFile($senderId)
    {
        try {
            if (empty($_FILES["proof"]["name"])) {
                return null;
            }

            $info = pathinfo($_FILES["proof"]["name"]);

            $ext = $info["extension"];
            $newName = $senderId . "_" . date("Ymd_His") . "." . $ext;

            $dir = "receipts/" . date("Y-m") . "/";
            if (!is_dir($dir)) {
                mkdir($dir);
            }

            $target = $dir . $newName;
            move_uploaded_file($_FILES["proof"]["tmp_name"], $target);
        } catch (Exception $e) {
            return null;
        }
        return $newName;
    }
}