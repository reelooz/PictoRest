<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-09 12:45:02
         compiled from "tpl\afficheAlbumNonCo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:677752f777aeb3a5b1-17508982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95edd79a6a1e7ee93b209dff015b69fdd5023032' => 
    array (
      0 => 'tpl\\afficheAlbumNonCo.tpl',
      1 => 1391949900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '677752f777aeb3a5b1-17508982',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f777aec7b0e8_65034402',
  'variables' => 
  array (
    'tabRes' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f777aec7b0e8_65034402')) {function content_52f777aec7b0e8_65034402($_smarty_tpl) {?><section>
    <p style="text-align:center;color:red;"> Pour visualiser les albums merci de vous connectez ou vous inscrire</p>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['name'] = 'tabRes';
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['tabRes']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['tabRes']['total']);
?>
        <a href="" class='aphoto'>
            <div class="photo">
                <p class="titrePhoto"> <?php echo $_smarty_tpl->tpl_vars['tabRes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tabRes']['index']]['titreAlbum'];?>
 </p>
                <img src="<?php echo $_smarty_tpl->tpl_vars['tabRes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tabRes']['index']]['cheminThumb'];?>
"/>
                <p class="description"><?php echo $_smarty_tpl->tpl_vars['tabRes']->value[$_smarty_tpl->getVariable('smarty')->value['section']['tabRes']['index']]['desc'];?>
</p>
            </div>
        </a>
    <?php endfor; endif; ?>
</section><?php }} ?>
