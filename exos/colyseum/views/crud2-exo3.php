<?php

    // Get all shows from the database
    // Récupérer tous les spectacles depuis la base de données
    $query = 'SELECT * FROM shows;';
    $stmtSelect = $bdd->query($query);
    $arrAllShows = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

    // Get all genres from the database
    // Récupérer tous les genres depuis la base de données
    $query = 'SELECT * FROM genres;';
    $stmtSelect = $bdd->query($query);
    $arrAllGenres = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

    // Get all show types from the database
    // Récupérer tous les types de spectacles depuis la base de données
    $query = 'SELECT * FROM showTypes;';
    $stmtSelect = $bdd->query($query);
    $arrShowTypes = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);


?>


<h2>Ajouter un spectacle</h2>

<form method="post" action="../DB/crud/crud2-exo3.php">
    <div>
        <input type="text" name="title" id="" placeholder="Title" required>
    </div>
    <div>
        <input type="text" name="performer" id="" placeholder="Performer" required>
    </div>
    <div>
        <input type="date" name="date" id="" required>
    </div>
    <div>
        <select name="showTypesId" id="showTypesId">
            <option value="">Choose a type ...</option>
            <?php foreach($arrShowTypes as $showType) { ?>
                <option value="<?php echo $showType['id']; ?>"><?php echo $showType['type']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <select name="firstGenresId" id="firstGenresId">
            <option value="">Choose a first genre...</option>
        </select>
    </div>
    <div>
        <select name="secondGenreId" id="secondGenreId">
            <option value="">Choose a second genre...</option>

        </select>
    </div>
    <div>
        <input type="time" name="duration" id="duration" placeholder="Duration" required>
    </div>
    <div>
        <input type="time" name="startTime" id="" placeholder="Start time" required>
    </div>

    <div>
        <button type="submit">ADD</button>
    </div>
</form>

<script>

    // JavaScript pour mettre à jour dynamiquement les genres en fonction du type sélectionné
    document.querySelector('#showTypesId').addEventListener('change', function() {
        const selectedType = this.value;
        const firstGenresSelect = document.querySelector('#firstGenresId');
        const secondGenresSelect = document.querySelector('#secondGenreId');

        // Réinitialiser les options
        firstGenresSelect.innerHTML = '<option value="">Choose a first gender ...</option>';
        secondGenresSelect.innerHTML = '<option value="">Choose a second gender ...</option>';

        // Mettre à jour les options en fonction du type sélectionné
        <?php foreach($arrAllGenres as $genre) { ?>
            // Vérifier si le type actuellement parcouru correspond au type sélectionné
            if (selectedType == '<?php echo $genre['showTypesId']; ?>') {
                
                // Créer une nouvelle option et l'ajouter à la liste déroulante des genres
                const option = document.createElement('option');
                option.value = '<?php echo $genre['id']; ?>';
                option.text = '<?php echo $genre['genre']; ?>';
                firstGenresSelect.appendChild(option);
                
                // Cloner l'option et l'ajouter à la deuxième liste déroulante des genres
                secondGenresSelect.appendChild(option.cloneNode(true));

            }
        <?php } ?>
    });
</script>


<h1>All Shows</h1>

<?php foreach ($arrAllShows as $show) { ?> 
    <div style="border: 1px solid black; margin: 20px; width: 400px; padding-left: 20px;">
        <p>id : <?php echo $show['id']; ?></p>
        <p>Title : <?php echo $show['title']; ?></p>
        <p>Performer : <?php echo $show['performer']; ?></p>
        <p>Date : <?php echo date('d/m/Y', strtotime($show['date'])); ?></p>
    </div>
<?php } ?> 

