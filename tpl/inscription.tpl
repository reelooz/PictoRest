<div id="contenu">
    <p clas="error">{$msgError}</p>
    <a href="/PictoRest/aPropos"/>A propos du projet ! </a>
    <form method="POST" action="{$url}">
        <div id="identifier">
            <h3> Identifiez-vous </h3>
            <input type="text" name="logId" placeholder="Identifiant" autofocus/>
            <input type="password" name="passId" placeholder="Password"/>
            <input type="submit" name="choixAjout" value="S'identifier">
        </div>
        <div id="inscrire">
            <h3>Pas de compte ? Incrivez-vous</h3>
            <input type="text" name="logIns" placeholder="Identifiant"/>
            <input type="password" name="passIns" placeholder="Password"/>
            <input type="submit" name="choixAjout" value="S'inscrire">
        </div>
    </form>

</div>