
<div id="contenu">

    <p class="error">{$msgError}</p>
    <div id="uploadUrl"> 
        <h3>Ajouter une photo depuis une Url.</h3>
        <form action="/PictoRest/profil/ajouterPhotoAlbum/{$idAlbum}" method="post">
            <input type="text" name="titrePhotoURL" size="100" placeholder="Titre de la photo"/><br>
            <input type="text" name="descriptionPhotoURL"  placeholder="Description de la photo"/><br>
            <input type="text" name="url" placeholder=" Url de l'image Ex : http://www.monSite/monImage.jpg"/>
            <input type="hidden" name="source" value="url" /><br>
            <input type="submit" name="submit" value="Upload !" />
        </form>
    </div>
    <div id="uploadFile">
        <h3>Ajouter une photo depuis votre PC.</h3>
        <form method="POST" action="/PictoRest/profil/ajouterPhotoAlbum/{$idAlbum}" enctype="multipart/form-data">
            <input type="text" name="titrePhotoFILE" size="35"  placeholder="Titre de la photo"/>
            <input type="text" name="descriptionPhotoFILE" size="35"  placeholder="Description de la photo"/>
            <INPUT name="file" type=file size=50>
            <input type="hidden" name="source" value="local" /><br>
            <input type="submit" name="submit" value="Upload !" />
        </form>
    </div>
</div>