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
                <tr class="transaction">
                    <td class="date open-sans regular">2020-08-12</td>
                    <td class="implicated">
                        <div>
                            <img src="assets/img/julien-rousseau.jpg" alt="JR">
                        </div>
                    </td>
                    <td class="amount open-sans regular">500$</td>
                    <td class="receipt">
                        <a href="#" target="_blank"><i class="fas fa-external-link-alt"></i></a>
                    </td>
                </tr>
                <tr class="transaction">
                    <td class="date open-sans regular">2020-08-12</td>
                    <td class="implicated">
                        <div class="multiple">
                            <img src="assets/img/julien-rousseau.jpg" alt="JR">
                            <i class="fas fa-angle-right"></i>
                            <img src="assets/img/rosalie-damphousse.jpg" alt="RD">
                        </div>
                    </td>
                    <td class="amount open-sans regular">500$</td>
                    <td class="receipt">
                        <a target="_blank"><i class="fas fa-external-link-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>