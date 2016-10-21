// by kuangfan at 2015/9/16

(function($,f){
	var Kuang = function(){
		//复制对象
		var _ = this;
		//设置默认选项
		_.o = {
			speed:600,
			delay:4000,
			autoplay:true
		}
		_.init = function(el,o){            
			_.o = $.extend(_.o,o);
			_.el = el;
			_.ul = _.el.find("ul");
			_.li = _.ul.find("li");
			_.handle = _.el.find(".handle");
			_.prevBtn = _.el.find(".btn-prev");
			_.nextBtn = _.el.find(".btn-next");
			var n = _.li.length,
				_index = 0,
				_timer = "";                
			_.ul.css("width",n*_.li.outerWidth());            
			for(var i=0;i<n;i++){
				_.handle.append("<span>"+(i+1)+"</span>");
			}
			_.span = _.handle.children("span");
			_.span.eq(0).addClass("cur");
			_.span.on("hover",function(){
				_index=$(this).index();
				imgScroll(_index);
			});
			_.prevBtn.on("click",function(){
				_index--;
				if(_index<0){
					_index=n-1;
				}
				imgScroll(_index);
			});
			_.nextBtn.on("click",function(){
				_index++;
				if(_index>n-1){
					_index=0;
				}
				imgScroll(_index);
			});
			_.el.hover(function(){
				clearInterval(_timer);
			},function(){
				_timer=setInterval(function(){_.nextBtn.click()},_.o.delay);
			});
			function imgScroll(_index){
				var leftMove = _.li.outerWidth();
				_.ul.stop(true).animate({left:-leftMove*_index},_.o.speed);
				_.span.eq(_index).addClass("cur").siblings("span").removeClass("cur");
			}
			_timer=setInterval(function(){_.nextBtn.click()},_.o.delay);
			return _;
		}
	}
	$.fn.banner = function(o){
		var len = this.length;        
		return this.each(function(index){
			var me = $(this),
				key = 'banner' + (len > 1 ? '-' + ++index : ''),
				instance = (new Kuang).init(me, o);
			me.data(key,instance).data('key',key);
		});
	}
	Kuang.version = "1.0.0";
})(jQuery,false);