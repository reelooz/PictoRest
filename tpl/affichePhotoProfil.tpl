<section>
    <p class="error">{$msgError}</p>
    <a href="/PictoRest/profil/ajouterPhotoAlbum/{$idAlbum}">
        <div id="creaAlbum">
            <p ><b>Ajouter des photos</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>
    {section name=photo loop=$photos}


        <a href="/PictoRest/photo/{$photos[photo].idPhoto}" class='aphoto'>
            <div class="photo" id="{$photos[photo].idPhoto}">
                <p class="titrePhoto"> {$photos[photo].titrePhoto} </p>
                <img src="{$photos[photo].cheminThumb}"/>
                <p class="description">{$photos[photo].desc}</p>
                <p class="from">{$photos[photo].titreAlbum}</p>
            </div>
        </a>

    {/section}

</section>