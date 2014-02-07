<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-07 08:03:54
         compiled from "tpl\uploadPhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2643852f261e20bda25-73732251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b86cf80e688e77ca0acd39551e945a77490014' => 
    array (
      0 => 'tpl\\uploadPhoto.tpl',
      1 => 1391616543,
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
    'url' => 0,
    'idAlbum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f261e20f53d7_54923676')) {function content_52f261e20f53d7_54923676($_smarty_tpl) {?>
<section>
    <h3>Vous pouvez ajouter jusqu'à 20 photos !</h3>
    <form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" enctype="multipart/form-data">
        <input type="hidden" name="dateAnnonce" value="<?php echo $_smarty_tpl->tpl_vars['idAlbum']->value;?>
"/> 
        Photo n°1 :   <INPUT name="file1" type=file size=50><br>
        <span id="leschamps_2"><a class=bouton href="javascript:create_champ(2)">Ajouter une photo</a></span><br><br>
        <input type="submit" value="Ajouter photo"/>
    </form>
</section><?php }} ?>
