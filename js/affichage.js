
var affichage;
var tri;

function cleanAndAddAllCollection() {
	var clone = collection.slice();
	clone.sort(getCompareFct());
	
	$("#content-body").html("");
	for (var i = 0; i < clone.length; i++) {
		addOeuvre(clone[i]);
	}
}

function setAffichage(classe) {
	if (affichage != null && affichage === classe) {
		return;
	}
	$('#content').removeClass(affichage);
	affichage = classe;
	$('#content').addClass(affichage);
	switch (affichage) {
		case 'list1':
			$('#dropdown-affichage .dropdown-back-value').html('<span class="fui-list-columned"></span>');
			break;
		case 'list2':
			$('#dropdown-affichage .dropdown-back-value').html('<span class="fui-list-small-thumbnails"></span>');
			break;
		case 'list3':
			$('#dropdown-affichage .dropdown-back-value').html('<span class="fui-list-large-thumbnails"></span>');
			break;
		default:
			return;
	}
	/*
	myPost("index.php", {m: "init", f: "affichage", v: affichage}, function (data) {
	}, "json");
	*/
}