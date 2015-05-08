jQuery(document).ready(function(){
jQuery(".menu_tree ").each(function(){
    jQuery(this).hide();
    jQuery(this).mouseover(function(){
     jQuery(this).show();
                   });
    jQuery(this).mouseout(function(){
     jQuery(this).hide();
                   });
  });


jQuery('.hide_menu').click(function(){

 jQuery('#main-main-menu').toggle(200);

});


jQuery("#main-main-menu ul li").each(function(){
    jQuery(this).mouseover(function(){
     jQuery(this).find(".menu_tree").show();

   });
jQuery(this).mouseout(function(){
     jQuery(this).find(".menu_tree").hide();

});

});
    jQuery(".menu_tree_tree ").each(function(){
    jQuery(this).hide();
    jQuery(this).mouseover(function(){
     jQuery(this).show();
                   });
    jQuery(this).mouseout(function(){
     jQuery(this).hide();
                   });
  });
  
jQuery(".menu_tree ul li").each(function(){
    jQuery(this).mouseover(function(){
     jQuery(this).find(".menu_tree_tree").show();

   });
jQuery(this).mouseout(function(){
     jQuery(this).find(".menu_tree_tree").hide();

});

});
jQuery(".menu_tree ul").each(function(){
  jQuery(this).prepend('<span></span>');

});
jQuery(".menu_tree_tree").each(function(){
 jQuery(this).parent().prepend('<div class=bgcolor></div>');
 jQuery(this).parent().css({'background-image': 'url("sites/all/themes/yeaoh/images/arrow_main_nav.png") '});
 jQuery(this).parent().css({'background-repeat': 'no-repeat '});
 jQuery(this).parent().css({'background-position': '156px 8px '});
});
});
