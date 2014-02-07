<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-04 10:08:59
         compiled from "tpl\nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3117552f0b9e441f068-95049086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07ff54392fb40d083c6e95e4bff25592c201d431' => 
    array (
      0 => 'tpl\\nav.tpl',
      1 => 1391508529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3117552f0b9e441f068-95049086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f0b9e4523237_44300408',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0b9e4523237_44300408')) {function content_52f0b9e4523237_44300408($_smarty_tpl) {?><nav id="nav">
    <form method="POST" action="#">
        <input type="text" name="recherche" placeholder="Votre recherche"/>
        <select name="rechercheListe">
            <option name="photo"> Photos </option>
            <option name="user"> Users </option>
        </select>
        <input type="submit" value="Go"/>
    </form>
    <?php if (isset($_SESSION['idUtil'])) {?>
        <div id="gestion">
            <a id="inscription" href="/PictoRest/deconnexion">Deconnexion [ <?php echo $_SESSION['identifiant'];?>
 ]</a>   				
            <a id="profil" href="/PictoRest/profil">Mon profil</a>
        </div>
    <?php } else { ?>
        <div id="gestion">
            <a id="inscription" href="/PictoRest/connexion">S'inscrire / S'identifier</a>	    				
            <a id="profil" href="/PictoRest/connexion">Mon profil</a>
        </div>
    <?php }?>

</nav><?php }} ?>
