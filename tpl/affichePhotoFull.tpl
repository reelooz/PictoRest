<div id="photo">
    <h3>{$photo['titrePhoto']}</h3>
    <p>Album : {$photo['titreAlbum']}</p>
    <img id="pics" src='{$photo['cheminFull']}'/><br>
    <p>{$photo['descPhoto']}</p>
    <img src='/PictoRest/web/images/zoom.png'/><a href="{$photo['cheminFull']}" target="_blank"> Voir la photo en taille réelle.</a>
    <p> Ajoutée le {$photo['datePhoto']} par {$photo['identifiant']} </p>
    
</div>