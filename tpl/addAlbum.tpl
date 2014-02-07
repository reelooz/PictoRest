<div id="contenu">
    
    <form method="POST" action="{$url}">
        
            <h3> Créez votre albums ! </h3>
            <p class="error">{$msgError}</p>
            <input type="text" name="titreAlbum" placeholder="Titre (limite 100 caractères)" size="100" autofocus/><br>
            <input type="text" name="description" placeholder="Description (limite 100 caractères)" size="100"/><br>
            <input type="submit" name="ajoutAlbum" value="Valider">
        
        
    </form>
    <br>
</div>