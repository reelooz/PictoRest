window.rechercheAjax = (idUtil) ->
  tache = $("#recherche").val()
  tabid = []
  tabAlb = []
  $.getJSON("/PictoRest/rest/albums?filter="+tache+"&callback=?", (data) ->
    $('section').remove()
    $('#rech').remove()
    $('#photo').remove()
    section = '<div id="rech"></div>';
    element = jQuery(section)
    $('body').append(element)
    for d in data
      photos = '<a class="aphoto" href="/PictoRest/profil/'+d['idAlbum']+'">
                  <div id="'+d['idAlbum']+'" class="photo">
                    <p class="titrePhoto">Album : '+d['titreAlbum']+'</p>
                    <img src=""/>
                    <p class="description">'+d['desc']+'</p>
                  </div>
                </a>'
      tabAlb.push(d)
      element = jQuery(photos)
      $('#rech').append(element)
  ).done( () ->
    for alb in tabAlb
      $.getJSON("/PictoRest/rest/photoRecherche/"+alb['photoCouv']+"?callback=?", (dataPhoto) ->
        $('#'+dataPhoto['idAlbum']).children('img').attr('src',dataPhoto['cheminThumb'])
      )
    $.getJSON("/PictoRest/rest/users/"+idUtil+"/feeds?callback=?", (dataFeed) ->
      for alb in tabAlb
          abo = '<a onClick="ajoutFeed('+idUtil+','+alb['idAlbum']+')">S\'abonner</a>'
          element = jQuery(abo)
          $('#'+alb['idAlbum']).append(element)
      if dataFeed.length != 0
        for feed in dataFeed
          console.log feed['idUtil']
          console.log feed['idAlbum']
          $('#'+feed['idAlbum']).children('a').remove()
    )
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
        console.log tabPhotos.length
        for photo in tabPhotos
          photos = '<a class="aphoto" href="/PictoRest/photo/'+photo['idPhoto']+'">
                          <div id="'+photo['idPhoto']+'" class="photo">
                            <p class="titrePhoto">'+photo['titrePhoto']+'</p>
                            <img src="'+photo['cheminThumb']+'">
                            <p class="description">'+photo['desc']+'</p>
                            </div>
                          </a>'
          element = jQuery(photos)
          $('#rech').append(element)
      )
  )
  $.getJSON("/PictoRest/rest/users/"+id+"/albums?callback=?", (dataUtil) ->
    if dataUtil.length != 0
      for albums in dataUtil
        tabAlbUtil.push(albums)
        console.log albums
        $.getJSON("/PictoRest/rest/albums/"+albums['idAlbum']+"/photos?callback=?", (dataPhoto) ->
          for photo in dataPhoto
            photos = '<a class="aphoto" href="/PictoRest/photo/'+photo['idPhoto']+'">
                          <div id="'+photo['idPhoto']+'" class="photo">
                            <p class="titrePhoto">'+photo['titrePhoto']+'</p>
                            <img src="'+photo['cheminThumb']+'">
                            <p class="description">'+photo['desc']+'</p>
                            </div>
                          </a>'
            element = jQuery(photos)
            $('#rech').append(element)
        )
  )
 
window.ajoutFeed = (id, idAlbum)->
  $.post( '/PictoRest/rest/users/'+id+'/feeds', {idAlbum: idAlbum})
    