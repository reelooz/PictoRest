<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-05 16:00:40
         compiled from "tpl\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2780152f0a733438156-65044994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e66305ba4bb7982307a893e4dba8f87e18e007f' => 
    array (
      0 => 'tpl\\header.tpl',
      1 => 1391615809,
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
        <script type="text/javascript">

            $(document).ready(function() { // Quand le document est complètement chargé

                var load = false; // aucun chargement de commentaire n'est en cours

                /* la fonction offset permet de récupérer la valeur X et Y d'un élément
                 dans une page. Ici on récupère la position du dernier div qui 
                 a pour classe : ".commentaire" */
                var offset = $('.photo:last').offset();

                $(window).scroll(function() { // On surveille l'évènement scroll

                    /* Si l'élément offset est en bas de scroll, si aucun chargement 
                     n'est en cours, si le nombre de commentaire affiché est supérieur 
                     à 5 et si tout les commentaires ne sont pas affichés, alors on 
                     lance la fonction. */
                    if ((offset.top - $(window).height() <= $(window).scrollTop())
                            && load == false && ($('.photo').size() >= 12)
                            &&($('.photo').size()!=$('.nb_photo').text())){

                        // la valeur passe à vrai, on va charger
                        load = true;

                        //On récupère l'id du dernier commentaire affiché
                        var last_id = $('.photo:last').attr('id');

                        //On affiche un loader

                        if (last_id == 1) {
                            $('.loadmore').hide();
                        } else {
                            $('.loadmore').show();
                        }

                        //On lance la fonction ajax
                        $.ajax({
                            url: '/PictoRest/php/pictorest/Ajax/ajax.php',
                            type: 'get',
                            data: 'last=' + last_id,
                            //Succès de la requête
                            success: function(data) {
                                //On masque le loader
                                $('.loadmore').fadeOut(500);
                                /* On affiche le résultat après
                                 le dernier commentaire */
                                $('.aphoto:last').after(data);
                                /* On actualise la valeur offset
                                 du dernier commentaire */
                                offset = $('.photo:last').offset();
                                //On remet la valeur à faux car c'est fini
                                load = false;
                            }
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
