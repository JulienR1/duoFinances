<?php
if (!isset($users)) {
    echo "Variable 'users' is not set and is necessary to generate the view.";
    exit();
}
?>

<aside class="container">
    <div class="shadow-bg">
        <h1 class="open-sans semibold">Sommaire</h1>

        <?php
if (sizeof($users) > 0) {
    ?>

        <div class="scroll" id="summary">
            <table>
                <tbody>

                    <?php
foreach ($users as $user) {
        $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
        $paidAmount = number_format($user["moneySpent"] - $total / sizeof($users), 2);
        $inDepth = $paidAmount < 0;
        $paidAmountStr = !$inDepth ? "+" . $paidAmount : $paidAmount;

        echo '<tr>';
        echo '<td><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></td>';
        echo '<td><span class="amount open-sans regular">' . $user["moneySpent"] . '$</span></td>';
        echo '<td><span class="amount open-sans semibold" inDepth="' . ($inDepth ? 1 : 0) . '">' . $paidAmountStr . '$</span></td>';
        echo '</tr>';
    }
    ?>

                </tbody>
            </table>
        </div>
        <div id="total" class="open-sans">
            <p class="semibold">Total:</p>
            <p class="regular"><?php echo $total . "$"; ?></p>
        </div>
    </div>

    <?php
} else {
    echo '<div id="total" class="open-sans">';
    echo '<br><p>Aucun utilisateur n\'est enregistré</p>';
    echo '</div>';
}
?>

</aside>