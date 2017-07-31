
  var jq = $.noConflict();
  jq(document).ready(function(){
    jq(function(){
		var tag1Bg = 9;
		var tag2Bg = 9;
		var tag1Br = 9;
		var tag2Br = 9;
 
        /***************************
                Map
        ****************************/

        function myMap() {
          var green = [{"featureType":"all","elementType":"geometry","stylers":[{"saturation":"0"},{"lightness":"0"},{"visibility":"on"},{"gamma":"1"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#e0e9f2"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"off"},{"color":"#000000"},{"lightness":"0"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"saturation":"-100"},{"lightness":"-43"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#5a5858"},{"lightness":"0"},{"visibility":"on"},{"weight":"1.00"},{"gamma":"1"},{"saturation":"-54"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#6a6969"},{"lightness":"0"}]},{"featureType":"poi.attraction","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#698577"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"invert_lightness":true}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"},{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"lightness":"0"},{"color":"#474747"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":"0"},{"weight":0.2},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"invert_lightness":true}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"off"},{"saturation":"-100"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#a1a1a1"},{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":"0"},{"visibility":"on"},{"color":"#474747"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#454545"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"saturation":"-80"},{"lightness":"42"},{"color":"#989898"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#474747"},{"lightness":"0"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"lightness":"8"},{"color":"#909090"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"saturation":"-100"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#6d6d6d"},{"lightness":"0"},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#616e74"},{"lightness":"0"}]}];
          var green2 = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"off"},{"hue":"#ff0000"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"on"},{"hue":"#ff0000"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"all","stylers":[{"visibility":"on"},{"color":"#626368"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#83e7c3"},{"visibility":"on"}]}];
          var mapCanvas = document.getElementById("contact-map");

          var mapOptions = {
            center: new google.maps.LatLng(41.850033, -87.6500523), zoom: 5,
            styles: green,
            scrollwheel: false
          };

          var map = new google.maps.Map(mapCanvas, mapOptions);

          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(41.850033, -87.6500523),
            map: map,
            title: 'Comapny Name'
          });


        }
        myMap();
		jq(window).resize(function() {
			if(jq( window ).width() < 1165){
			  if (jq(window).scrollTop() > 260) {
				jq('#myTopnav').addClass('fixedTop');
			   }
			   else {
				jq('#myTopnav').removeClass('fixedTop');
			   }
			}
		});
		jq(window).bind('scroll', function() {
			if(jq( window ).width() < 1165){
			  if (jq(window).scrollTop() > 260) {
				jq('#myTopnav').addClass('fixedTop');
			   }
			   else {
				jq('#myTopnav').removeClass('fixedTop');
			   }
			}
		});

    jq("#showDropDown").click(function(){
      jq(".topnav").toggleClass("responsive");
    })
		/***************************
          Show hide shooping cart
        ****************************/
        jq("#shopping").click(function(res){
          jq(".shopping-cart").toggle("slow");
        })
    });
	  
	  
	   /***************************************
	               change the border-----2
	  ***************************************/
	  jq(".tag").click(function(){
	    var src= jq(this).data("tag");
	    var id= jq(this).data("img");
		  if(jq('#tag-two-enable').is(':checked')){
		  	jq(".demo-pic2").attr("src",src);
		  	tag2Br=id;
		  }else{
		  	jq(".demo-pic2").attr("src",src);
			jq(".demo-pic1").attr("src",src);
			tag1Br=id;
			tag2Br=id;
		  }
		
	});
	  /***************************************
	           change the background------2
	  ***************************************/
	  jq(".button-back").click(function(){
		var src= jq(this).data("back");
		var id= jq(this).data("img");
		  if(jq('#tag-two-enable').is(':checked')){
		  	jq(".demo-pic2").css({
			   "background-image": "url("+src+")"
			});
			tag2Bg = id;    	
		  }else{
			  jq(".demo-pic2").css({
				   "background-image": "url("+src+")"
				});
		  	jq(".demo-pic1").css({
			   "background-image": "url("+src+")"
			});
			tag1Bg = id;
			tag2Bg = id;
		  }
			
		});
	  
	  /***************************************
	               cahnge the text
	  ***************************************/
	  function changeValue(c,o){
		jq(c).html(o.val());
	  }
	  function changeValueData(c,o){
		jq(c).val(o.val());
	  }
	
	  
/*****************************************
     checkbox-click
*****************************************/
	  
	  jq(".input1").keyup(function(){
	  	if(jq('#tag-two-enable').is(':checked')){			
			jq("#ans6").html(jq('#input6').val());
		}else{
			changeValueData("#input6",jq(this))
			changeValue(".ans1",jq(this))
		}
	  });
	  jq(".input2").keyup(function(){
	  	if(jq('#tag-two-enable').is(':checked')){			
			jq("#ans7").html(jq('#input7').val());
		}else{			
			changeValueData("#input7",jq(this))
			changeValue(".ans2",jq(this))
		}
	  });
	  jq(".input3").keyup(function(){
	  	if(jq('#tag-two-enable').is(':checked')){			
			jq("#ans8").html(jq('#input8').val());
		}else{			
			changeValueData("#input8",jq(this))
			changeValue(".ans3",jq(this))
		}
	  });
	  jq(".input4").keyup(function(){
	  	if(jq('#tag-two-enable').is(':checked')){			
			jq("#ans9").html(jq('#input9').val());
		}else{			
			changeValueData("#input9",jq(this))
			changeValue(".ans4",jq(this))
		}
	  });
	  jq(".input5").keyup(function(){
	  	if(jq('#tag-two-enable').is(':checked')){			
			jq("#ans10").html(jq('#input10').val());
		}else{					
			changeValueData("#input10",jq(this))
			changeValue(".ans5",jq(this))
		}
	  });

/*****************************************
     checkbox-value
*****************************************/
	  
	 //  jq(".input1").keyup(function(){
	 //  	if(jq('#tag-two-enable').is(':checked')){			
		// 	jq("#ans6").html(jq('#check-1').val());
		// }else{
		// 	changeValue(".hiden-text1",jq(this))
		// }
	 //  });
	 //  jq(".input2").keyup(function(){
	 //  	if(jq('#tag-two-enable').is(':checked')){			
		// 	jq("#ans7").html(jq('#check-2').val());
		// }else{
		// 	changeValue(".hiden-text2",jq(this))
		// }
	 //  });
	 //  jq(".input3").keyup(function(){
	 //  	if(jq('#tag-two-enable').is(':checked')){			
		// 	jq("#ans8").html(jq('#check-3').val());
		// }else{
		// 	changeValue(".hiden-text3",jq(this))
		// }
	 //  });
	 //  jq(".input4").keyup(function(){
	 //  	if(jq('#tag-two-enable').is(':checked')){			
		// 	jq("#ans9").html(jq('#check-4').val());
		// }else{
		// 	changeValue(".hiden-text4",jq(this))
		// }
	 //  });
	 //  jq(".input5").keyup(function(){
	 //  	if(jq('#tag-two-enable').is(':checked')){			
		// 	jq("#ans10").html(jq('#check-5').val());
		// }else{
		// 	changeValue(".hiden-text5",jq(this))
		// }
	 //  });

	  
	  /***************************************
	               text-aling-center
	  ***************************************/
	   //jq(".check2").click(function(){
		  //if(jq('#tag-two-enable').is(':checked')){
		  //	jq("#answer-fild").css('text-', 'center')
		  //	jq("#answer-fild").data('align','center')
		  //	var align_ment = "1";
		 // }else{
		 // 	jq(".answer-fild").css('text-align', 'center')
		  //	jq(".answer-fild").data('align','center')
		  	//var align_ment = "3";
		  //}
		
	//});
	 // jq(".check1").click(function(){
		//  if(jq('#tag-two-enable').is(':checked')){
		//  	jq("#answer-fild").css('text-align', 'left')
		//  	jq("#answer-fild").data('align','left')
		//  	var align_ment2 = 1;
		//  }else{
		 // 	jq(".answer-fild").css('text-align', 'left')
		//  	jq(".answer-fild").data('align','left')
		//  	var align_ment2 = 2;
		//  }
		
//	});
	//  	console.log(jq('.answer-fild').css(["text-align"]));
      
      
      /***************************************
	               text-aling-center
	  ***************************************/
	  jq(".check2").click(function(){
		  if(jq('#tag-two-enable').is(':checked')){
		  	jq("#answer-fild").css('text-align', 'center')
            jq("#answer-fild").data('align','center')
		  	var align_ment = "1";
		  }else{
		  	jq(".answer-fild").css('text-align', 'center')
            jq(".answer-fild").data('align','center')
		  	var align_ment = "3";
		  }
		
	});
	  jq(".check1").click(function(){
		  if(jq('#tag-two-enable').is(':checked')){
		  	jq("#answer-fild").css('text-align', 'left')
            jq("#answer-fild").data('align','left')
		  	var align_ment2 = 1;
		  }else{
		  	jq(".answer-fild").css('text-align', 'left')
            jq(".answer-fild").data('align','left')
		  	var align_ment2 = 2;
		  }
		
	});
      console.log(jq('.answer-fild').css(["text-align"]));
      
	  

	jq('#add-to-cart-btn').click(function(res){
		
		jq.ajax({
			url:'index.php',
			data:{
				'tag1-line-1':jq('.input1').val(),
				'tag1-line-2':jq('.input2').val(),
				 'tag1-line-3':jq('.input3').val(),
				 'tag1-line-4':jq('.input4').val(),
				 'tag1-line-5':jq('.input5').val(),
				 'tag2-line-1':jq('#input6').val(),
				 'tag2-line-2':jq('#input7').val(),
				 'tag2-line-3':jq('#input8').val(),
				 'tag2-line-4':jq('#input9').val(),
				 'tag2-line-5':jq('#input10').val(),
				'tag2-text-align':jq('.answer-field-tag1').data('align'),
				'tag1-text-align':jq('.answer-field-tag2').data('align'),
				'tag1Bg':tag1Bg,			
				'tag2Bg':tag2Bg,
				'tag1Br':tag1Br,
				'tag2Br':tag2Br,
				'qty'   : jq('#input-size').val()
			},
			type:'POST',
			success:function(res){
				console.log(res);
			}
		})
	})

	/***************************************
	               text-aling-center
	  ***************************************/  
	  jq("#tag-two-enable").click(function(){
		  if(jq('#tag-two-enable').is(':checked')){
		  	jq("#show-first").hide();
		  	jq("#show-second-hidden").show();
		  }else{
		  	jq("#show-first").show();
		  	jq("#show-second-hidden").hide();
		  }
		
	});


  });
