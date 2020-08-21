<form id="dateSelector" class="shadow-bg" name="dateSelector" method="GET">
    <div>
        <label class="open-sans regular" for="yearSelection">20</label>
        <input class="open-sans regular" type="number" min="0" max="99" step="1" name="y" value="<?php echo ($year - 2000); ?>" required>
    </div>

    <ul>
        <?php 
            for($i = 0; $i < sizeof($months); $i++){
                echo '<li>
                        <input name="m" value="'.($i+1).'" id="'.$months[$i].'" type="radio" '.($month == $i+1 ? "checked":"").'></input>
                        <label for="'.$months[$i].'" class="open-sans regular">'.$months[$i].'</label>
                    </li>';
            }
        ?>
    </ul>

    <button class="open-sans regular" type="submit" name="today">Aujourd'hui</button>
    <button class="open-sans semibold" type="submit">Choisir</button>    
</form>