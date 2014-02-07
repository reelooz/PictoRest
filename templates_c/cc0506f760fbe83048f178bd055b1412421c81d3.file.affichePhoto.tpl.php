<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 10:21:14
         compiled from "tpl\affichePhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1006752f0ffd6be8606-63318260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc0506f760fbe83048f178bd055b1412421c81d3' => 
    array (
      0 => 'tpl\\affichePhoto.tpl',
      1 => 1391595669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1006752f0ffd6be8606-63318260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f0ffd6dbf272_64353781',
  'variables' => 
  array (
    'nbPhoto' => 0,
    'photos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0ffd6dbf272_64353781')) {function content_52f0ffd6dbf272_64353781($_smarty_tpl) {?><section>
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

    <div class="loadmore">
        <p>Chargement en cours</p>
    </div>
</section><?php }} ?>
