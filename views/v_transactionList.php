<main class="container main-panel">
    <header class="shadow-bg">
        <form class="offset-form">
            <input name="m" value="<?php echo $month - 1 + ($month == 1 ? 12 : 0); ?>">
            <input name="y" value="<?php echo $year - 2000 - ($month == 1 ? 1 : 0); ?>">
            <button type="submit"><i class="fas fa-caret-left"></i></button>
        </form>
        <?php
$months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
echo '<h2 onclick="openDateSelector(event)" class=" open-sans semibold">' . $months[$month - 1] . " " . $year . '</h2>';
?>
        <form class="offset-form">
            <input name="m" value="<?php echo $month + 1 - ($month == 12 ? 12 : 0); ?>">
            <input name="y" value="<?php echo $year - 2000 + ($month == 12 ? 1 : 0); ?>">
            <button type="submit"><i class="fas fa-caret-right"></i></button>
        </form>

        <?php include "views/v_dateSelector.php";?>
    </header>

    <div id="transaction-list" class="shadow-bg">
        <h3 class="open-sans semibold">
            Transactions du mois
            <a href="newTransaction.php"><i class="fas fa-plus"></i></a>
        </h3>
        <table>
            <tbody class="scroll">
                <?php
foreach ($transactions as $transaction) {
    echo formatTransaction($transaction, $month, $year);
}
?>
            </tbody>
        </table>
    </div>
</main>

<?php
function formatTransaction($transaction, $month, $year)
{
    $initials = strtoupper($transaction["firstname"][0] . $transaction["lastname"][0]);
    $proofSrc = isset($transaction["proofSrc"]) ? 'href="receipts/' . $year . '-' . $month . '/' . $transaction["proofSrc"] . '"' : "";

    $output = "";
    $output .= '<tr class="transaction">';
    $output .= '<td class="date open-sans regular">' . date("Y-m-d", strtotime($transaction["date"])) . '</td>';
    $output .= '<td class="implicated">';
    $output .= '<div' . (isset($transaction["receivingFirstname"]) ? ' class="multiple"' : "") . '>';
    $output .= '<img src="assets/img/' . $transaction["imgSrc"] . '" alt="' . $initials . '">';
    if (isset($transaction["receivingFirstname"])) {
        $output .= '<i class="fas fa-angle-right"></i>';
        $receivingInitials = strtoupper($transaction["receivingFirstname"][0] . $transaction["receivingLastname"][0]);
        $output .= '<img src="assets/img/' . $transaction["receivingImgSrc"] . '" alt="' . $receivingInitials . '">';
    }
    $output .= '</div></td>';
    $output .= '<td class="amount open-sans regular">' . $transaction["amount"] . '$</td>';
    $output .= '<td class="receipt">';
    $output .= '<a ' . $proofSrc . ' target="_blank"><i class="fas fa-external-link-alt"></i></a>';
    $output .= '</td></tr>';
    return $output;
}
?>