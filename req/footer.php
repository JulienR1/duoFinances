<script src="js/SwipeHandler.js"></script>
<?php
if ($_SERVER["SCRIPT_NAME"] == "/index.php") {
    echo '<script src="js/DateSelector.js"></script>';
}
if ($_SERVER["SCRIPT_NAME"] == "/newTransaction.php") {
    echo '<script src="js/TransactionLayout.js"></script>';
}
?>

</body>

</html>