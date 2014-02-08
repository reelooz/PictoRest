window.rechercheAjax = (idUtil) ->
  tache = $("#recherche").val()
  tabid = []
  $.getJSON("/PictoRest/rest/albums?filter="+tache+"&callback=?", (data) ->
    $('section').remove()
    $('#rech').remove()
    $('#photo').remove()
    section = '<div id="rech"></div>';
    element = jQuery(section)
    $('body').append(element)
    for d in data
      idAlb = d['idAlbum']
      photos = '<a class="aphoto" href="/PictoRest/profil/'+d['idAlbum']+'">
                      <div id="'+idAlb+'" class="photo">
                        <p class="titrePhoto">'+d['titreAlbum']+'</p>'
      $.getJSON("/PictoRest/rest/photoRecherche/"+d['photoCouv']+"?callback=?", (data) ->
        photos += '<img src="'+data['cheminThumb']+'"/>
                        <p class="description">'+d['desc']+'</p>
                      </div>
                  </a>'
        element = jQuery(photos)
        $('#rech').append(element)
      )
      tabid.push(d['idAlbum'])
    ).done( () -> 
      tabFeed = []
      photos= ''
      $.getJSON("/PictoRest/rest/users/"+idUtil+"/feeds?callback=?", (dataFeed) ->
          for feeds in dataFeed
            tabFeed.push(feeds)
      ).done( () ->
        for id in tabid
          console.log(id)
          for feed in tabFeed
            console.log(feed['idAlbum']+' '+id)
            if feed['idAlbum']!=id
              photos = '<a onClick="ajoutFeed('+feed['idAlbum']+','+id+')">S\'abonner</a>'
            else
              console.log('ok')
              photos = ''
              break
          element = jQuery(photos)
          console.log(photos)
          $('#'+id+':last-child').append(element)
          photos = ''
        tabFeed = []
      )
    
  ).fail( () ->
    $('section').remove()
    photos = '<section>'
    photos += '<p>Aucun résultat</p>'
    photos += '</section>'
    element = jQuery(photos)
    $('body').append(element)
  )

   


  

window.afficheflux = (id) ->
  tabFeed = []
  tabAlbUtil = []
  tabPhotos = []
  $('section').remove()
  $('#rech').remove()
  $('#photo').remove()
  photos = '<div id="rech"> </div>';
  element = jQuery(photos)
  $('body').append(element)
  photos = ''
  $.getJSON("/PictoRest/rest/users/"+id+"/feeds?callback=?", (data) ->
    for feed in data
      tabFeed.push(feed)
  ).done( () -> 
    
    for feed in tabFeed
      $.getJSON("/PictoRest/rest/albums/"+feed['idAlbum']+"/photos?callback=?", (dataPhoto) ->
        for photo in dataPhoto
          tabPhotos.push(photo)
      ).done( () ->       
        for photo in tabPhotos
          photos+='<a class="aphoto" href="/PictoRest/photo/'+photo['idPhoto']+'">
                          <div id="'+photo['idPhoto']+'" class="photo">
                            <p class="titrePhoto">'+photo['titrePhoto']+'</p>
                            <img src="'+photo['cheminThumb']+'">
                            <p class="description">'+photo['desc']+'</p>
                            </div>
                          </a>'
          element = jQuery(photos)
          $('#rech').append(element)
          photos = ''
        $.getJSON("/PictoRest/rest/users/"+id+"/albums?callback=?", (dataUtil) ->
          for albums in dataUtil
            tabAlbUtil.push(albums)
        ).done( () -> 
          console.log tabAlbUtil
          for albums in tabAlbUtil
            console.log albums
            console.log albums['idAlbum']
            photos = '<a class="aphoto" href="/PictoRest/profil/'+albums['idAlbum']+'">
                          <div id="'+albums['idAlbum']+'" class="photo">
                            <p class="titrePhoto">'+albums['titreAlbum']+'</p>'
            $.getJSON("/PictoRest/rest/photoRecherche/"+albums['photoCouv']+"?callback=?", (dataPix) ->
              console.log dataPix['idPhoto']
              photos += '<img src="'+dataPix['cheminThumb']+'"/>
                        <p class="description">'+albums['desc']+'</p>
                      </div>
                  </a>'
              console.log photos
              element = jQuery(photos)
              $('#rech').append(element)
            )
        )
      )
  )
 
window.ajoutFeed = (id, idAlbum)->
  $.post( '/PictoRest/rest/users/'+id+'/feeds', {idAlbum: idAlbum})
    