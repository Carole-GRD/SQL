
<form method="post" action="../functions/addCityFunction.php">
    
    <div class="form-group">

        <div class="input-group">
            <label for="city">City :</label>
            <input type="text" name="city" id="city" required>
        </div>

        <div class="input-group">
            <label for="max">Haut :</label>
            <input type="number" name="max" id="max" required>
        </div>

        <div class="input-group">
            <label for="min">Bas :</label>
            <input type="number" name="min" id="min" required>
        </div>

    </div>

    <!-- <button type="submit" name="submit">ADD</button> -->
    <input type="submit" value="ADD">

</form>