jQuery(document).ready(function(){
	var clicks = 0;
	var clickRefine = 0;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		jQuery("#responsive1").removeAttr("id");		
}
jQuery("#responsive1").lightSlider({
loop:true,
item:3,
keyPress:true
});
jQuery("#responsive").lightSlider({
loop:true,
item:6,
keyPress:true
}); 
jQuery(".close-button").click(function(){
	jQuery(".search_box").css('display','none');
});
jQuery(".login").click(function(){
	jQuery("#LoginSection").slideToggle();
});	
jQuery(".mlogin").click(function(){
	jQuery("#LoginSection").slideToggle();
	jQuery("#RegisterSection").slideToggle();
});		
jQuery("#cross").click(function(){
	jQuery("#LoginSection").slideToggle();
});	
jQuery(".rclose").click(function(){
	jQuery("#RegisterSection").slideToggle();
});	
jQuery(".compclose").click(function(){
	jQuery("#RegisterSection").slideToggle();
});		
jQuery(".register").click(function(){
	jQuery("#RegisterSection").slideToggle();
	jQuery("#LoginSection").slideToggle();
});	
jQuery(".top-link-compare").click(function(){
	jQuery("#CompareSection").slideToggle();
});
jQuery(".searchmini").click(function(){
	jQuery(".search_box").toggle();
	});
jQuery('.toggle-menu').jPushMenu();
jQuery(".main-brands-whatsnew").click(function(){
				  jQuery(".back-arrow").show();				  
				  jQuery(".mmenu,.msubmenu").not(".sub-brands-whatsnew").hide();
                  jQuery(".sub-brands-whatsnew").slideToggle();
				});
jQuery(".main-brands").click(function(){
				  jQuery(".back-arrow").show();				  
				  jQuery(".mmenu,.msubmenu").not(".sub-brands").hide();
                  jQuery(".sub-brands").slideToggle();
				});
jQuery(".main-boutique").click(function(){
				  jQuery(".back-arrow").show();				  
				  jQuery(".mmenu,.msubmenu").not(".sub-boutique").hide();
                  jQuery(".sub-boutique").slideToggle();
				});

jQuery(".main-watch-finder").click(function(){
				  jQuery(".back-arrow").show();				  
				  jQuery(".mmenu,.msubmenu,.sub-msubmenu").hide();
                  jQuery(".sub-watch-finder,.sub-watch-price,.sub-watch-feature").show();
				});
jQuery(".main-watches-featured-watches").click(function(){
		          jQuery(".back-arrow").show();
				  jQuery(".mmenu,.msubmenu").not(".sub-watches-featured-watches").hide();
                  jQuery(".sub-watches-featured-watches").slideToggle();
				});
jQuery(".main-watches-accessories").click(function(){
				  jQuery(".back-arrow").show();				  
				  jQuery(".mmenu,.msubmenu,.sub-msubmenu1").hide();
                  jQuery(".sub-watches-accessories,.sub-watches-showpiece,.sub-watches-writing-instruments,.sub-watches-eyewear").show();
				});
jQuery(".main-watches-showroom").click(function(){
                  jQuery(".back-arrow").show();
				  jQuery(".mmenu,.msubmenu").not(".sub-watches-showroom").hide();
				  jQuery(".sub-watches-showroom").slideToggle();
				});
jQuery(".main-watches-service").click(function(){
                  jQuery(".back-arrow").show();
				  jQuery(".mmenu,.msubmenu").not(".sub-watches-service").hide();
				  jQuery(".sub-watches-service").slideToggle();
				});
jQuery(".main-watches-cservice").click(function(){
                  jQuery(".back-arrow").show();
				  jQuery(".mmenu,.msubmenu").not(".sub-watches-cservice").hide();
				  jQuery(".sub-watches-cservice").slideToggle();
				});
jQuery(".main-watches-watchcare").click(function(){
                  jQuery(".back-arrow").show();
				  jQuery(".mmenu,.msubmenu").not(".sub-watches-watchcare").hide();
				  jQuery(".sub-watches-watchcare").slideToggle();
				});
jQuery(".msubmenu").click(function(){
				  jQuery(".back-arrow").show();
				  jQuery(".sub-msubmenu").slideUp();
                  jQuery(this).next('.sub-msubmenu').toggle();
				});
jQuery(".msubmenu1").click(function(){
				  jQuery(".back-arrow").show();
				  jQuery(".sub-msubmenu1").slideUp();
                  jQuery(this).next('.sub-msubmenu1').toggle();
				});
jQuery(".back-arrow").click(function(){
				  jQuery(".mmenu").show();
				  jQuery(".msubmenu,.back-arrow").hide();
				});
jQuery(".jPushMenuBtn").click(function(){
					clicks = clicks+1;
					var baseurl = document.getElementById('baseurl').value;
					jQuery(".mmenu").show();
				  	jQuery(".msubmenu,.back-arrow").hide();
					if(clicks%2==0)
				 	 jQuery('.toggle-menu').removeClass('tgclose');
					else
				 	 jQuery('.toggle-menu').addClass('tgclose');
				});
/*jQuery(".jPushMenuBtn").blur(function(){
			clicks = clicks+1;
        	jQuery('.menu-left').css("background","url(http://"+window.location.host+"/magento/theprimewatches/skin/frontend/itcslive/primedemo/images/toggle_menu.png) no-repeat");
    });*/
jQuery(".odd").click(function(){
				  jQuery(this).next('.odd').slideToggle();
				});
jQuery(".even").click(function(){
				  jQuery(this).next('.even').slideToggle();

				});
jQuery(".refine-search").click(function(){
				  jQuery('.refinesearchblock').slideToggle();
				});


 jQuery('.ptab').click(function(){

     var cur_id = jQuery(this).attr("id");
	 if(cur_id == 'add-review')
	    cur_id = 'product_reviews'; 

     jQuery('.ptab a').removeClass('selected');

     jQuery('.shop_descrption_Mid_innr').hide("slow");

	 jQuery('#'+cur_id+' a').addClass('selected');

	  jQuery('#'+cur_id+'_block').show("slow");

  });

   jQuery('#in-store-pickup').submit(function(){
   var zipcode = jQuery('#pdpPostalCode').val();											  
   if(zipcode == '')
     {
		 alert('Please enter your postal code' );
		 jQuery('#pdpPostalCode').focus();
		 return false;
	 }
   jQuery('.location-search').show("slow");
   jQuery('#popPostalCode').val(jQuery('#pdpPostalCode').val());
   jQuery('#zipcode').text(jQuery('#pdpPostalCode').val());
   
   //alert(zipcode >= 700000)
   if(zipcode >= 700000 && zipcode <= 799999)
     jQuery('.shoplocation').show("slow");
   else
     jQuery('.noshoplocation').show("slow"); 	 
   return false;

   });
   jQuery('#product-addto-bag').click(function(){
       jQuery('#product_addtocart_form').submit();
   });
   jQuery('#product-addtocart-button').click(function(){
       jQuery('#product_addtocart_form').submit();
   });
   jQuery('.close-search').click(function(){

   jQuery('.location-search').hide("slow");

   return false;

   });

   jQuery('.mobile-description').click(function(){
	   var spanval = jQuery('span.itcsplus').text();
	   if(spanval == '+')
	     {
		//	jQuery("span.itcsplus").removeClass("fa-plus");  
		//	jQuery("span.itcsplus").addClass("fa-minus"); 
			jQuery('span.itcsplus').text('-')
		 }
		else
		{
			jQuery('span.itcsplus').text('+')
			//jQuery("span.itcsplus").removeClass("fa-minus");  
			//jQuery("span.itcsplus").addClass("fa-plus");  
		}
       jQuery('.category-description').slideToggle();
   });

  
  
});
	function openPopUp(v,i){
		document.getElementById('enqnew').style.display="block";
		document.getElementById('pname').value=v;
		document.getElementById('light_pname').innerHTML=v;
		document.getElementById('prod_img').src=i;
	}
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 80) {
        jQuery(".nav-container").addClass("fixed");
    } else {
        jQuery(".nav-container").removeClass("fixed");
    }
});
function showHide(id){
	for(var i=1; i<=2; i++){
		jQuery(".tab-"+i).hide();
		jQuery("#tab-"+i).removeClass("active");
	}
	jQuery(".tab-"+id).show();
	jQuery("#tab-"+id).addClass("active");
}
// Find all YouTube videos
var $allVideos = jQuery("iframe[src^='//www.youtube.com']"),
    // The element that is fluid width
    $fluidEl = jQuery("body");
// Figure out and save aspect ratio for each video
$allVideos.each(function() {
  jQuery(this)
    .data('aspectRatio', this.height / this.width)
    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');
});
// When the window is resized
jQuery(window).resize(function() {
  var newWidth = $fluidEl.width();
  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {
    var $el = jQuery(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));
  });
// Kick off one resize to fix all videos on page load
}).resize();