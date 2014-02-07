
function create_champ(i) {

var i2 = i + 1;

document.getElementById('leschamps_'+i).innerHTML = 'Photo n° '+i+' : <input type="file" name="file'+i+'" size=50><br></span>';
document.getElementById('leschamps_'+i).innerHTML += (i <= 19) ? '<span id="leschamps_'+i2+'"><a class=bouton href="javascript:create_champ('+i2+')">Ajouter une photo</a></span>' : '';
}
			