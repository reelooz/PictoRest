<nav id="nav">
    <form method="POST" >
        <input type="text" id="recherche" placeholder="Votre recherche"/>
        <select name="rechercheListe">
            <option name="albums"> Albums </option>
            <option name="user"> Users </option>
        </select>
        <input type="button" onClick="rechercheAjax({$smarty.session.idUtil})" value="Go"/>
    </form>
    {if isset($smarty.session.idUtil)}
        
        <div id="gestion">
            <a id="flux" onClick="afficheflux( {$smarty.session.idUtil} )">Flux de photos</a>
            <a id="inscription" href="/PictoRest/deconnexion">Deconnexion [ {$smarty.session.identifiant} ]</a>   				
            <a id="profil" href="/PictoRest/profil">Mon profil</a>
        </div>
    {else}
        <div id="gestion">
            <a id="inscription" href="/PictoRest/connexion">S'inscrire / S'identifier</a>	    				
            <a id="profil" href="/PictoRest/connexion">Mon profil</a>
        </div>
    {/if}

</nav>