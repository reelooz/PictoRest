<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-07 11:07:14
         compiled from "tpl\affichePhotoFull.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2691752f4ad36158a73-23962064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03191c5632fc11781d9f03162a1e212433ad3ea7' => 
    array (
      0 => 'tpl\\affichePhotoFull.tpl',
      1 => 1391771221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2691752f4ad36158a73-23962064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f4ad36276111_58593313',
  'variables' => 
  array (
    'photo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f4ad36276111_58593313')) {function content_52f4ad36276111_58593313($_smarty_tpl) {?><div id="photo">
    <h3><?php echo $_smarty_tpl->tpl_vars['photo']->value['titrePhoto'];?>
</h3>
    <p>Album : <?php echo $_smarty_tpl->tpl_vars['photo']->value['titreAlbum'];?>
</p>
    <img id="pics" src='<?php echo $_smarty_tpl->tpl_vars['photo']->value['cheminFull'];?>
'/><br>
    <p><?php echo $_smarty_tpl->tpl_vars['photo']->value['descPhoto'];?>
</p>
    <img src='/PictoRest/web/images/zoom.png'/><a href="<?php echo $_smarty_tpl->tpl_vars['photo']->value['cheminFull'];?>
" target="_blank"> Voir la photo en taille réelle.</a>
    <p> Ajoutée le <?php echo $_smarty_tpl->tpl_vars['photo']->value['datePhoto'];?>
 par <?php echo $_smarty_tpl->tpl_vars['photo']->value['identifiant'];?>
 </p>
    
</div><?php }} ?>
