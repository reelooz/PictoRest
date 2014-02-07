<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-04 09:56:30
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:342052f0b13a9f0958-41985180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1391507681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '342052f0b13a9f0958-41985180',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f0b13aa7a4e0_76015807',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0b13aa7a4e0_76015807')) {function content_52f0b13aa7a4e0_76015807($_smarty_tpl) {?><nav id="nav">
    <form method="POST" action="#">
        <input type="text" name="recherche" placeholder="Votre recherche"/>
        <select name="rechercheListe">
            <option name="photo"> Photos </option>
            <option name="user"> Users </option>
        </select>
        <input type="submit" value="Go"/>
    </form>
    <?php if (isset($_SESSION['id'])) {?>
        <div id="gestion">
            <a id="inscription" href="/PictoRest/deconnexion">Bonjour <?php echo $_SESSION['identifiant'];?>
 ! Deconnexion</a>   				
            <a id="profil" href="#">Mon profil</a>
        </div>
    <?php } else { ?>
        <div id="gestion">
            <a id="inscription" href="/PictoRest/inscription">S'inscrire / S'identifier</a>	    				
            <a id="profil" href="#">Mon profil</a>
        </div>
    <?php }?>

</nav><?php }} ?>
