$(function() {
	var passowrd = $('.loginForm.fl input[name="password"]');
	$('[fs]').inputDefault( {
		bold : true,
		italic : false,
		color : '#333'
	});
	$('.loginBtn').bind('click', function() {
		if ($.trim(username.val()) == '') {
			alert('�������û���');
			return false;
		}
		if ($.trim(passowrd.val()) == '') {
			alert('���������룡');
			return false;
		}
	});
});
(function($) {
	$.fn.inputDefault = function(options) {
		var defaults = {
			attrName : 'fs',
			size : 0,
			bold : false,
			italic : false,
			color : '#CCC'
		};
		var options = $.extend(defaults, options);
		this.each(function() {
			var $this = $(this);
			var text = $this.attr(options.attrName);
			var offset = $this.position();
			var outerWidth = $this.outerWidth();
			var outerHeight = $this.outerHeight();
			var innerWidth = $this.innerWidth();
			var innerHeight = $this.innerHeight();
			var plusLeft = (outerWidth - innerWidth) / 2;
			var plusTop = (outerHeight - innerHeight + 26) / 2;
			var paddingTop = parseInt($this.css('paddingTop'));
			var paddingRight = parseInt($this.css('paddingRight'));
			var paddingBottom = parseInt($this.css('paddingBottom'));
			var paddingLeft = parseInt($this.css('paddingLeft'));
			if (!$.browser.chrome) {
				var width = innerWidth - (paddingLeft + paddingRight);
				var height = innerHeight - (paddingTop + paddingBottom);
			} else {
				var width = innerWidth - paddingRight;
				var height = innerHeight - paddingBottom;
			}
			var top = offset.top + plusTop;
			var left = offset.left + plusLeft;
			var lineHeight = $this.css('lineHeight');
//			if (navigator.userAgent.toLowerCase().indexOf('firefox')>0) {
//				lineHeight = Number(lineHeight.split('p')[0])
//						* 2 + 'px';
//			}
			var display = $this.val() ? 'none' : 'block';
			var fontSize = options.size ? options.size : $this.css('fontSize');
			var fontStyle = options.italic ? 'italic' : '';
			var fontWeight = options.bold ? 'normal' : $this.css('fontWeight');
			var css = {
				position : 'absolute',
				fontSize : fontSize,
				fontWeight : fontWeight,
				fontStyle : fontStyle,
				lineHeight : lineHeight,
				display : display,
				paddingTop : paddingTop,
				paddingRight : paddingRight,
				paddingBottom : paddingBottom,
				paddingLeft : paddingLeft,
				cursor : 'text',
				width : width,
				height : height,
				top : top,
				left : left,
				color : options.color,
				overflow : 'hidden'
			};
			var lable = $("<label></label>").text(text).css(css).click(function() {
						$(this).hide();
						$(this).prev().focus();
					});
			$this.after(lable);
		}).focus(function() {
			var $this = $(this);
			var $label = $(this).next('label');
			$label.hide();
		}).blur(function() {
			var $this = $(this);
			var $label = $(this).next('label');
			if (!$this.val())
				$label.show();
		});
	}
})(jQuery);
var flag = true;
function show_select(input, btn, option, value) {
	var inputobj = document.getElementById(input);
	var btnobj = document.getElementById(btn);
	var optionobj = document.getElementById(option);
	var valueobj = document.getElementById(value);
	function chk() {
		if (flag) {
			document.getElementById(option).style.display = 'none';
		}
	}
	optionobj.onmouseout = function() {
		setTimeout(chk, 50);
	}
	optionobj.style.display = optionobj.style.display == "" ? "none" : "";
	for ( var j = 0; j < optionobj.childNodes.length; j++) {
		optionobj.childNodes[j].onmouseover = function() {
			this.className = "qty_items_over";
			flag = false;
		};
		optionobj.childNodes[j].onmouseout = function() {
			this.className = "qty_items_out";
			flag = true;
		};
		optionobj.childNodes[j].onclick = function() {
			inputobj.innerHTML = this.innerHTML;
			valueobj.value = this.innerHTML;
			optionobj.style.display = "none";
			a = this.getElementsByTagName('a')[0];
			h = a.href;
			window.location.href = h;
		};
	}
};
function getRealLength(str) {
	return str.replace(/[^\x00-\xff]/ig, '**').length;
};
function isIdCardNo(num) {
	num = num.toUpperCase();
	if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(num))) {
		return false;
	}
	var len, re;
	len = num.length;
	if (len == 15) {
		re = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
		var arrSplit = num.match(re);
		var dtmBirth = new Date('19' + arrSplit[2] + '/' + arrSplit[3] + '/' + arrSplit[4]);
		var bGoodDay;
		bGoodDay = (dtmBirth.getYear() == Number(arrSplit[2]))
				&& ((dtmBirth.getMonth() + 1) == Number(arrSplit[3]))
				&& (dtmBirth.getDate() == Number(arrSplit[4]));
		if (!bGoodDay) {
			return false;
		} else {
			var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
			var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
			var nTemp = 0, i;
			num = num.substr(0, 6) + '19' + num.substr(6, num.length - 6);
			for (i = 0; i < 17; i++) {
				nTemp += num.substr(i, 1) * arrInt[i];
			}
			num += arrCh[nTemp % 11];
			return true;
		}
	}
	if (len == 18) {
		re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
		var arrSplit = num.match(re);
		var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);
		var bGoodDay;
		bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2]))
				&& ((dtmBirth.getMonth() + 1) == Number(arrSplit[3]))
				&& (dtmBirth.getDate() == Number(arrSplit[4]));
		if (!bGoodDay) {
			return false;
		} else {
			var valnum;
			var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
			var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
			var nTemp = 0, i;
			for (i = 0; i < 17; i++) {
				nTemp += num.substr(i, 1) * arrInt[i];
			}
			valnum = arrCh[nTemp % 11];
			if (valnum != num.substr(17, 1)) {
				return false;
			}
			return true;
		}
	}
	return false;
}