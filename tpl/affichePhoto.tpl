<section>
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
</section>