<main class="container main-panel">
    <form action="newTransaction.php" method="POST" onkeydown="return event.key != 'Enter';"
        enctype="multipart/form-data" autocomplete="off"
        <?php echo (isset($data["isRefund"]) && $data["isRefund"]) ? "isRefund" : ""; ?>>
        <header class="shadow-bg">
            <input type="checkbox" onclick="switchLayout(event)" name="typeToggle" id="typeToggle"
                <?php echo (isset($data["isRefund"]) && $data["isRefund"]) ? "checked" : ""; ?>>
            <label for="typeToggle">
                <h3 id="transactionToggle" class="open-sans regular">Transaction</h2>
                    <h3 id="refundToggle" class="open-sans regular">Remboursement</h2>
                        <div id="toggle"><i class="fas fa-angle-right"></i></div>
            </label>
        </header>

        <div class="shadow-bg <?php echo (isset($data) && $data["valid"] === false) ? "error" : ""; ?>" id="form-core">
            <?php
if (isset($data) && $data["valid"] === false) {
    echo '<p class="open-sans semibold error-msg">
                La saisie est invalide.<br>Données non-sauvegardées.
            </p>';
}
?>
            <section>
                <h3 class="open-sans regular">Émetteur</h3>
                <ul>
                    <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input onclick="disableReceiver(event)" type="radio" name="sender" id="sender-' . $user["id"] . '" value="' . $user["id"] . '" ' . ((isset($data["sender"]) && $data["sender"] == $user["id"]) ? "checked" : "") . '><label for="sender-' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></label></li>';
}
?>
                </ul>
            </section>

            <section id="refund-only">
                <h3 class="open-sans regular">Receveur</h3>
                <ul>
                    <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input type="radio" name="receiver" id="receiver-' . $user["id"] . '" value="' . $user["id"] . '" ' . ((isset($data["receiver"]) && $data["receiver"] == $user["id"]) ? "checked" : "") . '><label for="receiver-' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></label></li>';
}
?>
                </ul>
            </section>

            <section id="fields">
                <div>
                    <label for="desc" class="open-sans regular">Description: </label>
                    <input type="text" class="open-sans regular" name="desc" id="desc"
                        <?php echo 'value="' . (isset($data["desc"]) ? $data["desc"] : "") . '"'; ?>>
                </div>
                <div>
                    <label for="amount" class="open-sans regular">Montant: </label>
                    <input type="number" class="open-sans regular" name="amount" id="amount"
                        <?php echo 'value="' . ((isset($data["amount"]) && $data["amount"] > 0) ? $data["amount"] : "") . '"'; ?>>
                </div>
                <div>
                    <label for="proof" class="open-sans regular">Témoin: </label>
                    <input type="file" class="open-sans regular" name="proof" id="proof" accept="image/*">
                </div>
            </section>

            <section id="buttons">
                <a href="/multifinances/" class="open-sans regular">Annuler</a>
                <button type="submit" name="saveButton" class="open-sans regular shadow-bg">Enregistrer</button>
            </section>
        </div>
    </form>
</main>