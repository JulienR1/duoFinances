<script src="js/SwipeHandler.js"></script>
<?php
if (strpos($_SERVER["SCRIPT_NAME"], "/index.php")) {
    echo '<script src="js/DateSelector.js"></script>';
}
if (strpos($_SERVER["SCRIPT_NAME"], "/newTransaction.php")) {
    echo '<script src="js/TransactionLayout.js"></script>';
}
?>

</body>

</html>