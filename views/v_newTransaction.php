<main class="container main-panel">
    <form action="newTransaction.php" method="GET" autocomplete="off">
        <header class="shadow-bg">
            <input type="checkbox" onclick="switchLayout(event)" name="typeToggle" id="typeToggle">
            <label for="typeToggle">
                <h3 id="transactionToggle" class="open-sans regular">Transaction</h2>
                    <h3 id="refundToggle" class="open-sans regular">Remboursement</h2>
                        <div id="toggle"><i class="fas fa-angle-right"></i></div>
            </label>
        </header>

        <div class="shadow-bg" id="form-core">
            <section>
                <h3 class="open-sans regular">Émetteur</h3>
                <ul>
                    <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input type="radio" name="sender" id="sender-' . $user["id"] . '" value="' . $user["id"] . '"><label for="sender-' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></label></li>';
}
?>
                </ul>
            </section>

            <section class="refund-only">
                <h3 class="open-sans regular">Receveur</h3>
                <ul>
                    <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input type="radio" name="receiver" id="receiver-' . $user["id"] . '" value="' . $user["id"] . '"><label for="receiver-' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></label></li>';
}
?>
                </ul>
            </section>

            <section id="fields">
                <div>
                    <label for="amount" class="open-sans regular">Montant: </label>
                    <input type="number" class="open-sans regular" name="amount" id="amount" required>
                </div>
                <div>
                    <label for="proof" class="open-sans regular">Témoin: </label>
                    <input type="file" class="open-sans regular" name="proof" id="proof">
                </div>
            </section>

            <section id="buttons">
                <a href="/" class="open-sans regular">Annuler</a>
                <button type="submit" name="saveButton" class="open-sans regular shadow-bg">Enregistrer</button>
            </section>
        </div>
    </form>
</main>