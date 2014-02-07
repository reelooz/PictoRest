<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 15:33:08
         compiled from "tpl\profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1217252f246d01cc094-75281994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa96e98eef57987d92251baa4f12a0bc62eb2176' => 
    array (
      0 => 'tpl\\profil.tpl',
      1 => 1391613471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1217252f246d01cc094-75281994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f246d021a0b7_76198504',
  'variables' => 
  array (
    'albums' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f246d021a0b7_76198504')) {function content_52f246d021a0b7_76198504($_smarty_tpl) {?><section>

    <a href="/PictoRest/profil/creerAlbum">
        <div id="creaAlbum">
            <p ><b>Créer un album</b></p>
            <img src="/PictoRest/web/images/add.png"/>
            <p class="description"> </p>
        </div>
    </a>

    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['album'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['album']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['name'] = 'album';
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['albums']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total']);
?>


        <a href="/PictoRest/profil/<?php echo $_smarty_tpl->tpl_vars['albums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['idAlbum'];?>
" class='aphoto'>
            <div class="photo" id="<?php echo $_smarty_tpl->tpl_vars['albums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['idAlbum'];?>
">
                <p class="titrePhoto"> <?php echo $_smarty_tpl->tpl_vars['albums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['titreAlbum'];?>
 </p>
                <img src="<?php echo $_smarty_tpl->tpl_vars['albums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['photoCouv'];?>
"/>
                <p class="description"><?php echo $_smarty_tpl->tpl_vars['albums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']]['desc'];?>
</p>
            </div>
        </a>

    <?php endfor; endif; ?>



</section><?php }} ?>
