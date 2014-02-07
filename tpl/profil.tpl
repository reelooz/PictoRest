<section>

    <a href="/PictoRest/profil/creerAlbum">
        <div id="creaAlbum">
            <p ><b>Créer un album</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>

    {section name=album loop=$albums}


        <a href="/PictoRest/profil/{$albums[album].idAlbum}" class='aphoto'>
            <div class="photo" id="{$albums[album].idAlbum}">
                <p class="titrePhoto"> {$albums[album].titreAlbum} </p>
                <img src="{$albums[album].photoCouv}"/>
                <p class="description">{$albums[album].desc}</p>
            </div>
        </a>

    {/section}



</section>