<section>
    <p style="text-align:center;color:red;"> Pour visualiser les albums merci de vous connectez ou vous inscrire</p>
    {section name=tabRes loop=$tabRes}
        <a href="" class='aphoto'>
            <div class="photo">
                <p class="titrePhoto"> {$tabRes[tabRes].titreAlbum} </p>
                <img src="{$tabRes[tabRes].cheminThumb}"/>
                <p class="description">{$tabRes[tabRes].desc}</p>
            </div>
        </a>
    {/section}
</section>