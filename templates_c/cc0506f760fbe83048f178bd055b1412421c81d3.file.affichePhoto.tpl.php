<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 09:07:42
         compiled from "tpl\affichePhoto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1006752f0ffd6be8606-63318260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc0506f760fbe83048f178bd055b1412421c81d3' => 
    array (
      0 => 'tpl\\affichePhoto.tpl',
      1 => 1391850460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1006752f0ffd6be8606-63318260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f0ffd6dbf272_64353781',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0ffd6dbf272_64353781')) {function content_52f0ffd6dbf272_64353781($_smarty_tpl) {?><section>
    <script type="text/javascript">
    tab = new Array();
    
    $.getJSON("/PictoRest/rest/albums?callback=?", function(dataAlb) {
        for(i = 0; i <= dataAlb.length-1 ; i++){
            tab[i+1]=dataAlb[i];
        }
        }).done(function (){
            $.getJSON("/PictoRest/rest/photos/0?callback=?", function(data) {
                photos='<section>';
                for(i = 0; i <= data.length-1 ; i++){
                    photos+='<a href="#" class="aphoto"><div class="photo" id="'+data[i]["idPhoto"]+'"><p class="titrePhoto">'+data[i]["titrePhoto"]+'</p><img src="'+data[i]["cheminThumb"]+'"/><p class="description">'+data[i]["desc"]+'</p><p class="from">'+tab[data[i]["idAlbum"]]['titreAlbum']+'</p></div></a>';
                }
                photos+='</section>';
                $('section').remove();
                element=jQuery(photos);
                $('body').append(element);  
            });
        })
        .fail( function(){
            alert('OupppssS');
        });

    
    </script>
</section><?php }} ?>
