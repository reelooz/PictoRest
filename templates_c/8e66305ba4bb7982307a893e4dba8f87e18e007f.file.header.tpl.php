<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 09:07:09
         compiled from "tpl\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2780152f0a733438156-65044994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e66305ba4bb7982307a893e4dba8f87e18e007f' => 
    array (
      0 => 'tpl\\header.tpl',
      1 => 1391850424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2780152f0a733438156-65044994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f0a7334bf3f0_56392044',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f0a7334bf3f0_56392044')) {function content_52f0a7334bf3f0_56392044($_smarty_tpl) {?><!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <title>PictoRest</title>       
        <link rel="stylesheet" href="/PictoRest/web/css/stylesheets/screen.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="/PictoRest/web/js/jquery.js"></script>
        <script type="text/javascript" src="/PictoRest/web/js/pieceJointe.js"></script>
        <script type="text/javascript" src="/PictoRest/web/src/dist/mesFonctions.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var load = false;
                var offset = $('a:last').offset();
                $(window).scroll(function() {
                    if ((offset.top - $(window).height() <= $(window).scrollTop()) && load == false && ($('.photo').size() >= 12)&&($('.photo').size()!=$('.nb_photo').text())){
                        load = true;
                        var last_id = $('.photo:last').attr('id');
                        tab = new Array();
                        $.getJSON("/PictoRest/rest/albums?callback=?", function(dataAlb) {
                            for(i = 0; i <= dataAlb.length-1 ; i++){
                                tab[i+1]=dataAlb[i];
                                
                            }
                        }).done(function (){
                            $.getJSON("/PictoRest/rest/photos/"+last_id+"?callback=?", function(data) {
                            photos='';
                            if(data!==false){
                                for(i = 0; i <= data.length-1 ; i++){
                                    photos+='<a href="#" class="aphoto"><div class="photo" id="'+data[i]["idPhoto"]+'"><p class="titrePhoto">'+data[i]["titrePhoto"]+'</p><img src="'+data[i]["cheminThumb"]+'"/><p class="description">'+data[i]["desc"]+'</p><p class="from">'+tab[data[i]["idAlbum"]]['titreAlbum']+'</p></div></a>';
                                }
                                element=jQuery(photos);
                                $('section').append(element);
                                offset = $('.photo:last').offset();
                                load = false;
                            }
                        });
                        })
                        .fail( function(){
                            alert('OupppssS');
                        });
                    }
                });
            });
        </script>
    </head>

    <body>
        <header>
            <a href="/PictoRest/"><h1> PictoRest </h1></a>    		
        </header><?php }} ?>
