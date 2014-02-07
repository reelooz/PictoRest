<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 14:47:51
         compiled from "tpl\addAlbum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:528852f249e050da99-47474050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0ff00163302ffe110d20a1b0e83e6f8edb04620' => 
    array (
      0 => 'tpl\\addAlbum.tpl',
      1 => 1391610993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '528852f249e050da99-47474050',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f249e053cca5_63950571',
  'variables' => 
  array (
    'url' => 0,
    'msgError' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f249e053cca5_63950571')) {function content_52f249e053cca5_63950571($_smarty_tpl) {?><div id="contenu">
    
    <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
        
            <h3> Créez votre albums ! </h3>
            <p class="error"><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</p>
            <input type="text" name="titreAlbum" placeholder="Titre (limite 100 caractères)" size="100" autofocus/><br>
            <input type="text" name="description" placeholder="Description (limite 100 caractères)" size="100"/><br>
            <input type="submit" name="ajoutAlbum" value="Valider">
        
        
    </form>
    <br>
</div><?php }} ?>
