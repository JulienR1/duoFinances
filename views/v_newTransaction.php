<main>
    <form action="" method="POST">
        <header>
            <input type="checkbox" name="typeToggle" id="typeToggle">
            <label for="typeToggle">
                <h2>Transaction</h2>
                <h2>Remboursement</h2>
                <div id="toggle"><i class="fas fa-angle-right"></i></div>
            </label>
        </header>

        <section>
            <h3>Émetteur</h3>
            <ul>
                <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input name="sender" id="' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></input></li>';
}
?>
            </ul>
        </section>

        <section class="refund-only">
            <h3>Receveur</h3>
            <ul>
                <?php
foreach ($users as $user) {
    $initials = strtoupper($user["firstname"][0] . $user["lastname"][0]);
    echo '<li><input name="receiver" id="' . $user["id"] . '"><img src="assets/img/' . $user["imgSrc"] . '" alt="' . $initials . '"></input></li>';
}
?>
            </ul>
        </section>

        <section>
            <div>
                <label for="amount">Montant: </label>
                <input type="number" name="amount" id="amount" required>
            </div>
            <div>
                <label for="proof">Témoin: </label>
                <input type="file" name="proof" id="proof" required>
            </div>
        </section>

        <section>
            <a href="/">Annuler</a>
            <button type="submit" name="saveButton">Enregistrer</button>
        </section>
    </form>
</main>