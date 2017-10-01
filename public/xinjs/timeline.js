$(function() {
    tmSlider();
    fixNav();
    skipDay();
});

//时间线
function tmSlider() {
    if ($('#mycarousel').get(0) != null) {
        var carSize = $('#mycarousel').find('li').size()
        if (carSize == 1) {
            $('#timeline').remove();
        }
        else {
            var wid = 900 / carSize;
            if (carSize <= 9) {
                $('#mycarousel').find('li').css({ "width": wid + "px" });
            }
            $('#mycarousel').jcarousel({
                scroll: 1
            });
        }
    }
}

function fixNav() {
    var o = $('#timelineWrapInner');
	var top = 0;
	if(o.length){
		var top = o.offset().top;
	}


    var tab = $("#infoTab");
    var tabtop = tab.offset().top;
    var tabflag = $('.proMsg').offset().top - 40;


    $(window).scroll(function() {
        var st = (document.documentElement.scrollTop || document.body.scrollTop);
		if(o.length){
			if (st + 45 > top && st + 45 <= oflag) {
				o.css({ "position": "fixed", "top": 33 });

			}
			else {
				o.css({ "position": "static" });
			}
		}

        if (st > tabtop && st < tabflag) {
            tab.css({ "position": "fixed", "top": 0 });
            $('#tc_01').show();
        } else {
            tab.css({ "position": "static" });
            $('#tc_01').hide();
        }

       

        var itemlist = $(".J_item");
        itemlist.each(function(index, item) {
            var _top = $(this).offset().top;
            if (_top - 35 <= st) {
                $("#infoTab li").removeClass("cur");
                $("#infoTab li").eq(index).addClass("cur");
            }
        });
    });
}

