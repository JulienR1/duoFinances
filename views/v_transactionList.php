<main class="container">
    <header class="shadow-bg">
        <button onclick="getPreviousMonth()"><i class="fas fa-caret-left"></i></button>
        <h2 onclick="openDateSelector()" class=" open-sans semibold">Janvier 1921</h2>
        <button onclick="getNextMonth()"><i class="fas fa-caret-right"></i></button>
    </header>

    <div id="transaction-list" class="shadow-bg">
        <h3 class="open-sans semibold">Transactions du mois</h3>
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