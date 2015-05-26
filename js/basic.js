$(document).ready(function () {

		//get the default top value
		var top_val = $('#menu li a').css('top');

		//animate the selected menu item
		$('#menu li.selected').children('a').stop().animate({top:0}, {easing: 'easeOutQuad', duration:500});		

		$('#menu li').hover(
			function () {
				
				//animate the menu item with 0 top value
				$(this).children('a').stop().animate({top:0}, {easing: 'easeOutQuad', duration:500});		
			},
			function () {

				//set the position to default
				$(this).children('a').stop().animate({top:top_val}, {easing: 'easeOutQuad', duration:500});		

				//always keep the previously selected item in fixed position			
				$('#menu li.selected').children('a').stop().animate({top:0}, {easing: 'easeOutQuad', duration:500});		
			}		
		);
	
	});
