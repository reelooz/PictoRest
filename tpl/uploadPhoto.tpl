
<section>
    <h3>Vous pouvez ajouter jusqu'à 20 photos !</h3>
    <form method="POST" action="{$url}" enctype="multipart/form-data">
        <input type="hidden" name="dateAnnonce" value="{$idAlbum}"/> 
        Photo n°1 :   <INPUT name="file1" type=file size=50><br>
        <span id="leschamps_2"><a class=bouton href="javascript:create_champ(2)">Ajouter une photo</a></span><br><br>
        <input type="submit" value="Ajouter photo"/>
    </form>
</section>