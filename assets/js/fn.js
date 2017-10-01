(function($){
	$(function(){
		
		$('.nav-mobile').hide;
		$('.toggle').click(function() {
			$('.nav-mobile').slideToggle(300);
			return true;
		});

		$('.reload-secureimage').live('click', function(){
			var d = new Date();
			var $t = $(this);
			var $loader = $('<span>Please wait...</span>');
			
			// $('.secureimage').attr('src', reb.ajaxurl + '?action=reb_secure_image&_=' + d.getTime());

			$.ajax({
				// type: 'POST',
				// url: reb.ajaxurl + '?action=reb_secure_image&_=' + d.getTime(),
				beforeSend: function() {
					$('.fa-refresh').replaceWith($loader);
				},
				success: function(data) {
					$('.secureimage').attr('src', reb.ajaxurl + '?action=reb_secure_image&_=' + d.getTime());
					$loader.replaceWith('<i class="fa fa-refresh"></i>');
				},
				dataType: 'html'
			});
			// return false;
		});
		
		$('.form').submit(function(e){
			e.preventDefault();
			var $t = $(this);
			var $submit = $(':submit', $t);
			var $loader = $('<span>Please wait...</span>');
			$('.errmsg', $t).remove();
			$submit.replaceWith($loader);
			$.post($t.attr('action'), $t.serializeArray(), function(rs){
				if (rs.status=='SUCCESS') {
					$t.replaceWith(rs.body);
				} else {
					for (var i in rs.errors)
					{
						$(':input[name="'+i+'"]').after('<div class="errmsg">'+rs.errors[i]+'</div>');
					}
					$loader.replaceWith($submit);
				}
			}, 'json');
		});

		$('.bxslider').bxSlider({
			mode: 'fade',
			captions: true,
			auto: true,
		});

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});
		$('#back-top').click(function () {
			$('body,html').stop().animate({
				scrollTop: 0
			}, 800, 'linear');
			return false;
		});

		$.simpleWeather({
			location: 'Ha Noi, VN',
			woeid: '',
			unit: 'c',
			success: function(weather) {
				html = 		'<ul class="weather-container"><li class="weather-thumb"><img src="'+weather.thumbnail+'"></li>';
				html +=		'<li class="weather-temp">'+weather.temp+'&deg;'+weather.units.temp+'</li>';
				html += 	'<li class="weather-location">'+weather.city+', '+weather.country+'</li>';
				html += 	'<li class="weather-day">'+checkWXLang(weather.forecast[0].day)+', </li>';
				html += 	'<li class="wearther-date">'+changeDate(weather.forecast[0].date)+' </li></ul>';
				//html += 	'<li class="weather-currently">'+checkWXLang(weather.currently)+'</li>';
				// html += '<li>'+weather.wind.direction+' '+weather.wind.speed+' '+weather.units.speed+'</li></ul>';
				$("#weather").html(html);
			},
			error: function(error) {
				$("#weather").html('<p>'+error+'</p>');
			}
		});

		console.log("Weather retrieved.");

		function changeDate (weather) {
			if(jQuery("body").hasClass("vn")) {
				var arrDate = weather.split(" ");

				for (var key in myWXDate) {
					if(key === arrDate[1]) {
						var myDate = myWXDate[key];
						return arrDate[0] + ' ' + myDate + ' ' + arrDate[2];
					}
				}
			} else {
				return weather;
			}
		}

		var myWXDate = ({
			"Jan":"Tháng 1",
			"Feb":"Tháng 2",
			"Mar":"Tháng 3",
			"Apr":"Tháng 4",
			"May":"Tháng 5",
			"Jun":"Tháng 6",
			"Jul":"Tháng 7",
			"Aug":"Tháng 8",
			"Sep":"Tháng 9",
			"Oct":"Tháng 10",
			"Nov":"Tháng 11",
			"Dec":"Tháng 12",
		});

		function checkWXLang(weather){
			if (jQuery("body").hasClass("vn")){
				// return weather;
				for (var key in myWXcodes) {
					if (key === weather){
						var myWX = myWXcodes[key]
						return myWX;
					}
				}
			} else {
				console.log("Weather in correct language");
				return weather;
			}
		}
		var myWXcodes = ({
			"Mon":"Th&#7913; 2",
			"Tue":"Th&#7913; 3",
			"Wed":"Th&#7913; 4",
			"Thu":"Th&#7913; 5",
			"Fri":"Th&#7913; 6",
			"Sat":"Th&#7913; 7",
			"Sun":"Ch&#7911; Nh&#7853;t",
			"Scattered Thunderstorms":"M&#432;a, S&#7845;m ch&#7899;p",
			"Tornado":"Tournade",
			"Tropical storm":"Temp�te Tropicale",
			"Hurricane":"Ouragan",
			"Sever thunderstorms":"Orages Violents",
			"Thunderstorms":"Orages",
			"Mixed rain and snow":"M�lange de pluie et neige",
			"Mixed rain and sleet":"M�lange de pluie et gr�sil",
			"Mixed snow and sleet":"M�lange de neige et gr�sil",
			"Freezing drizzle":"Bruine Vergla�ante",
			"Freezing drizzle":"Bruine Vergla�ante",
			"Drizzle":"Bruine",
			"Freezing rain":"Pluie vergla�ante",
			"Showers":"Pluie",
			"Showers":"Pluie",
			"Snow flurries":"Averse de neige",
			"Light snow showers":"Averse de neige l�g�re",
			"Blowing snow":"Poudrerie",
			"Snow":"Neige",
			"Hail":"Gr�le",
			"Sleet":"Gr�sil",
			"Dust":"Poussi�reux",
			"Foggy":"S&#432;&#417;ng m�",
			"Haze":"Br�me",
			"Smoky":"Enf�m�",
			"Blustery":"Blustery",
			"Windy":"Venteux",
			"Cold":"L&#7841;nh",
			"Cloudy":"Nhi&#7873;u m�y",
			"Mostly cloudy (night)":"Quelques �claircis (nuit)",
			"Mostly cloudy (day)":"Quelques �claircis (jours)",
			"Party cloudy (night)":"Partiellement nuageux (nuit)",
			"Partly cloudy (day)":"Partiellement nuageux (jours)",
			"Clear (night)":"Clair (nuit)",
			"Sunny":"Ensoleiller",
			"Fair (night)":"Beau (nuit)",
			"Fair (day)":"Beau (jours)",
			"Mixed rain and hail":"M�lange de pluie et verglats",
			"hot":"Chaud",
			"Isolated Thunderstorms":"Orages isol�e",
			"Scattered thunderstorms":"Orages disperc�s",
			"Scattered thunderstorms":"Orages disperc�s",
			"Scattered showers":"Pluie disperc�s",
			"Heavy snow":"Fortes ch�tes de neige",
			"Partly cloudy":"Partiellement nuageux",
			"Thundershowers":"Averses orageuses",
			"Snow showers":"Averses de neige",
			"Isolated Thundershowers":"Orages isol�s",
			"Breezy":"Hihi"
		});

	});
})(jQuery);