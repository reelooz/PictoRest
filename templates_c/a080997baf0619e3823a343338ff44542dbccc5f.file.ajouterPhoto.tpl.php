<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 16:00:40
         compiled from "tpl\ajouterPhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1265652f25da8303095-32455545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a080997baf0619e3823a343338ff44542dbccc5f' => 
    array (
      0 => 'tpl\\ajouterPhoto.tpl',
      1 => 1391615588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1265652f25da8303095-32455545',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f25da8331c41_69331081',
  'variables' => 
  array (
    'msgError' => 0,
    'idAlbum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f25da8331c41_69331081')) {function content_52f25da8331c41_69331081($_smarty_tpl) {?><section>
    <p class="error"><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</p>
    <a href="/PictoRest/profil/ajouterPhotoAlbum/<?php echo $_smarty_tpl->tpl_vars['idAlbum']->value;?>
">
        <div id="creaAlbum">
            <p ><b>Ajouter des photos</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>
</section><?php }} ?>
