<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 07:13:34
         compiled from "tpl\inscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2410052efbbaa695457-79389557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4a680e8e886028674f67d16865d4541f31879e4' => 
    array (
      0 => 'tpl\\inscription.tpl',
      1 => 1391801598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2410052efbbaa695457-79389557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52efbbaa7c7543_66424614',
  'variables' => 
  array (
    'msgError' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52efbbaa7c7543_66424614')) {function content_52efbbaa7c7543_66424614($_smarty_tpl) {?><div id="contenu">
    <p clas="error"><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</p>
    <a href="/PictoRest/aPropos"/>A propos du projet ! </a>
    <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
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

</div><?php }} ?>
