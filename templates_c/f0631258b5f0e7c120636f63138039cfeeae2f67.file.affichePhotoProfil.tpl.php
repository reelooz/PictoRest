<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 15:46:41
         compiled from "tpl\affichePhotoProfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2067252f25a2cd54651-36777817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0631258b5f0e7c120636f63138039cfeeae2f67' => 
    array (
      0 => 'tpl\\affichePhotoProfil.tpl',
      1 => 1391615199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2067252f25a2cd54651-36777817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f25a2cda2931_67643915',
  'variables' => 
  array (
    'nbPhoto' => 0,
    'photos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f25a2cda2931_67643915')) {function content_52f25a2cda2931_67643915($_smarty_tpl) {?><section>
    <a href="/PictoRest/profil/ajouterPhoto">
        <div id="creaAlbum">
            <p ><b>Ajouter des photos</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>
    <div class="nb_photo" style="display:none;">
        <?php echo $_smarty_tpl->tpl_vars['nbPhoto']->value;?>

    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['photo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['name'] = 'photo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['photos']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['photo']['total']);
?>


        <a href=# class='aphoto'>
            <div class="photo" id="<?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['idPhoto'];?>
">
                <p class="titrePhoto"> <?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['titrePhoto'];?>
 </p>
                <img src="<?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['cheminThumb'];?>
"/>
                <p class="description"><?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['desc'];?>
</p>
                <p class="from"><?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['photo']['index']]['titreAlbum'];?>
</p>
            </div>
        </a>

    <?php endfor; endif; ?>

</section><?php }} ?>
