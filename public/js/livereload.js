(function(){

	var script = document.getElementById('bs-live-reload');
	var sseport = script.getAttribute('data-sseport');
	var lastchange = script.getAttribute('data-lastchange');

	if('EventSource' in window){
		var es = new EventSource("http://" + location.hostname + ":" + sseport + "/");
		es.onmessage = function(msg){
			
			var obj = JSON.parse(msg.data);

			if(obj.type == 'full'){
				window.location = '/';
				return;
			}

			if(obj.type == 'css'){

				var elem = $('link').filter(function(){
					return $(this).attr('href').match('/' + obj.target);
				});

				elem.attr('href', '/' + obj.target + '?r' + Math.random());
			}

		}
	}
	else {
		setInterval(checkForChanges, 2000);
	}


	function checkForChanges(){

		var req = new XMLHttpRequest();

		req.addEventListener("load", function(){

			if(lastchange != this.responseText){
				window.location.reload();
			}

		});

		req.open('GET', '/bs-lastchange', true);
		req.send();

	}
	
})();
