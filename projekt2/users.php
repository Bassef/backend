<?php include "init.php" ?>
<?php include "head.php" ?>


<article>
    <h1>Bläddra bland kontaktannonser</h1>
    <p>Använd gärna filtrerings och sorteringsformuläret:</p>
    <p>
        <!-- Filtreringsformulär -->
    <form action="users.php" method="get">
        <!-- Radio buttons för sortering -->

        <!-- <label for="rich">Rika först</label> -->
        <!-- <input type="radio" name="salary" value="rich" checked> -->
        <!-- <label for="poor">Rika sist</label> -->
        <!-- <input type="radio" name="salary" value="poor"><br> -->


        <input type="radio" name="salary" <?php if (isset($salary) && $salary=="rich") echo "checked";?> value="rich">Rika först

        <input type="radio" name="salary" <?php if (isset($salary) && $salary=="poor") echo "checked";?> value="poor">Rika sist<br>

        <input type="radio" name="like" <?php if (isset($like) && $like=="pop") echo "checked";?> value="pop">Populära först

        <input type="radio" name="like" <?php if (isset($like) && $like=="notpop") echo "checked";?> value="notpop">Populära sist<br>


        <!-- <label for="pop">Populära först</label> -->
        <!-- <input type="radio" name="likes" value="pop" checked> -->
       

        <!-- <label for="notpop">Populära sist</label> -->
        <!-- <input type="radio" name="likes" value="notpop"><br> -->


        <!-- Dropdown för preferens -->


        

        <label for="pref">Preferens</label>

        <select name="pref">
            <option value="male">Manlig</option>
            <option value="female">Kvinnlig</option>
            <option value="other">Annan</option>
            <option value="both">Båda</option>
            <option value="all">Alla</option>
        </select>

        <input type="submit" value="Filtrera">
        
        </form>

        </p>
    <?php include "fetch.php" ?>
</article>




<?php include "footer.php" ?>