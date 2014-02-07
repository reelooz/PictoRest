<section>
    <a href="/PictoRest/profil/ajouterPhoto">
        <div id="creaAlbum">
            <p ><b>Ajouter des photos</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>
    <div class="nb_photo" style="display:none;">
        {$nbPhoto}
    </div>
    {section name=photo loop=$photos}


        <a href=# class='aphoto'>
            <div class="photo" id="{$photos[photo].idPhoto}">
                <p class="titrePhoto"> {$photos[photo].titrePhoto} </p>
                <img src="{$photos[photo].cheminThumb}"/>
                <p class="description">{$photos[photo].desc}</p>
                <p class="from">{$photos[photo].titreAlbum}</p>
            </div>
        </a>

    {/section}

</section>