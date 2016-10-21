$(function(){
  var $slide_li=$(".video-slide ul li");
	var v_len=$slide_li.length,
	    v_li_width=$slide_li.outerWidth(),
	    v_max_num=v_len-1,
	    v_index=0,
	    timer=null;
    // $(".video_slide ul").css("width",v_len*v_li_width);
    $(".video-slide ul li:gt(0)").hide();
    function slide_video(){
      // var v_left=-v_index*v_li_width;
      // $(".video_slide ul").animate({"left":v_left},900);
      $slide_li.eq(v_index).fadeIn(1000).siblings().stop(true,false).fadeOut(500);
    }

    timer=setInterval(function(){
    	v_index++;
    	if(v_index>=v_len){
            v_index=0;
    	}
    	slide_video();
    },6200);

   $(".video-slide").hover(function(){
     	 clearInterval(timer);
   },function(){
     	timer=setInterval(function(){
      	v_index++;
      	if(v_index>=v_len){
              v_index=0;
      	}
      	slide_video();
      },6200);
   });

   $(".prev-video").click(function(){
   	    v_index--;
   	    if(v_index<=-1){
   	    	v_index=v_max_num;
   	    }
   	    slide_video();
   })
   $(".next-video").click(function(){
   	    v_index++;
   	    if(v_index>=v_len){
   	    	v_index=0;
   	    }
   	    slide_video();
   });	
});