<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-07 10:52:00
         compiled from "tpl\uploadPhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2643852f261e20bda25-73732251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b86cf80e688e77ca0acd39551e945a77490014' => 
    array (
      0 => 'tpl\\uploadPhoto.tpl',
      1 => 1391770318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2643852f261e20bda25-73732251',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f261e20f53d7_54923676',
  'variables' => 
  array (
    'msgError' => 0,
    'idAlbum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f261e20f53d7_54923676')) {function content_52f261e20f53d7_54923676($_smarty_tpl) {?>
<div id="contenu">

    <p class="error"><?php echo $_smarty_tpl->tpl_vars['msgError']->value;?>
</p>
    <div id="uploadUrl"> 
        <h3>Ajouter une photo depuis une Url.</h3>
        <form action="/PictoRest/profil/ajouterPhotoAlbum/<?php echo $_smarty_tpl->tpl_vars['idAlbum']->value;?>
" method="post">
            <input type="text" name="titrePhotoURL" size="100" placeholder="Titre de la photo"/><br>
            <input type="text" name="descriptionPhotoURL"  placeholder="Description de la photo"/><br>
            <input type="text" name="url" placeholder=" Url de l'image Ex : http://www.monSite/monImage.jpg"/>
            <input type="hidden" name="source" value="url" /><br>
            <input type="submit" name="submit" value="Upload !" />
        </form>
    </div>
    <div id="uploadFile">
        <h3>Ajouter une photo depuis votre PC.</h3>
        <form method="POST" action="/PictoRest/profil/ajouterPhotoAlbum/<?php echo $_smarty_tpl->tpl_vars['idAlbum']->value;?>
" enctype="multipart/form-data">
            <input type="text" name="titrePhotoFILE" size="35"  placeholder="Titre de la photo"/>
            <input type="text" name="descriptionPhotoFILE" size="35"  placeholder="Description de la photo"/>
            <INPUT name="file" type=file size=50>
            <input type="hidden" name="source" value="local" /><br>
            <input type="submit" name="submit" value="Upload !" />
        </form>
    </div>
</div><?php }} ?>
