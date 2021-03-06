
var error_message = "Une erreur s'est produite. En êtes-vous le fautif ? Probablement :)";
var timeout_error = "<br />\n\
<b>Fatal error</b>:  Maximum execution time of 30 seconds exceeded";

function ajax_init() {
	$(document).ajaxStart(function () {
		ajax_start();
	}).ajaxStop(function () {
		$('body').removeClass('wait');
	});

	if ($.active > 0) {
		ajax_start();
	}

	setInterval(function () {
		if ($.active === 0) {
			$('body').removeClass('wait');
		}
	}, 5000);
}

function ajax_start() {
//	console.log("start");
	if (cfg['curseur_load']) {
		$('body').addClass('wait');
	}
}

function myPost(url, items, func, type, fail) {
/*
	if (arguments.length === 3) {
		$.post(url, items, function (data) {
			var sc_accessible = data !== false;
//			setSCAccessible(sc_accessible);
			func(data, sc_accessible);
		}).fail(function (jqXHR, textStatus, error) {
			default_error_function(jqXHR, textStatus, error);
		});
	} else if (arguments.length === 4) {
		myPost(url, items, func, type, function (jqXHR, textStatus, error) {
			default_error_function(jqXHR, textStatus, error);
		});
	} else {
		$.post(url, items, function (data) {
			var sc_accessible = data !== false;
//			setSCAccessible(sc_accessible);
			func(data, sc_accessible);
		}, type).fail(function (jqXHR, textStatus, error) {
			fail(jqXHR, textStatus, error);
		});
	}
	*/
}

function default_error_function(jqXHR, textStatus, error) {
	if (isTimeoutError(jqXHR.responseText)) {
		errorAlert("Timeout de la requête atteint. Le serveur de Senscritique est-il encore joignable ? Vous pouvez changer la valeur du timeout dans les paramètres.");
	} else {
		errorAlert(textStatus + '<br/>' + error + '<br/><br/>' + jqXHR.responseText);
		console.debug([textStatus, error, jqXHR]);
	}
}

function isTimeoutError(data) {
//	console.debug(data.indexOf(timeout_error));
	return data.indexOf(timeout_error) >= 0;
}