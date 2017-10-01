$(document).ready(function(){
//    nav-li hover e
    var num;
    $('.nav-main>li[id]').hover(function(){
       /*图标向上旋转*/
        $(this).children().removeClass().addClass('hover-up');
        /*下拉框出现*/
        var Obj = $(this).attr('id');
        num = Obj.substring(3, Obj.length);
        $('#box-'+num).slideDown(300);
    },function(){
        /*图标向下旋转*/
        $(this).children().removeClass().addClass('hover-down');
        /*下拉框消失*/
        $('#box-'+num).hide();
    });
//    hidden-box hover e
    $('.hidden-box').hover(function(){
        /*保持图标向上*/
        $('#li-'+num).children().removeClass().addClass('hover-up');
        $(this).show();
    },function(){
        $(this).slideUp(200);
        $('#li-'+num).children().removeClass().addClass('hover-down');
    });
    
    $('.cy').click(function(){
		$('#area').html($(this).html());
		$('.area2').html($(this).html());
		var type=$("li").filter(".on").attr('tt');
		var city = $(this).html();
		var url = "{{ url('index/index') }}?city="+city;
		location.href=url;
    })
    
    
	
	
	$('#nextclient').click(function(){
		var allpicspage = $('#nextclient').attr('tt');
		var currentpicspage = $('#nextclient').attr('dd');
		var id = $('#tenantId').val();
		if(currentpicspage<allpicspage){
			$('#nextclient').attr('dd',parseInt(currentpicspage)+1);
			$.ajax({
					url: "http://web.weixinkc.com/2/myweb/public/index/detailclients",
					type: "get",
					dataType: "json",
					data: {'id': id,'page': parseInt(currentpicspage)+1},
					success: function(data){
						if(data.result=='00'){
							$("#setpics").html(template("setpicstemp",data));	
 					}
					}
				});
		}else{
			alert('暂无更多数据');
		}
	})
	
	$('#prevclient').click(function(){
		var allpicspage = $('#nextclient').attr('tt');
		var currentpicspage = $('#nextclient').attr('dd');
		var id = $('#tenantId').val();
		if(parseInt(currentpicspage)-1<=0){
			alert('当前就是第一页');
			return false;
		}else{
			if(currentpicspage<=allpicspage){
				if(currentpicspage>1){
					$('#nextclient').attr('dd',parseInt(currentpicspage)-1);
				}
				$.ajax({
						url: "http://web.weixinkc.com/2/myweb/public/index/detailclients",
						type: "get",
						dataType: "json",
						data: {'id': id,'page': parseInt(currentpicspage)-1},
						success: function(data){
	 					console.log(JSON.stringify(data));
							if(data.result=='00'){
								$("#setpics").html(template("setpicstemp",data));		
	 					}
						}
					});
			}
		}
		
	})
	
	//加载更多评论
	$('#more').click(function(){
		var allcommentpage = $('#more').attr('tt');//总页数
		var currentcommentpage = $('#more').attr('dd');//当前页码
		var id = $('#tenantId').val();
		if(currentcommentpage<allcommentpage){
			$('#more').attr('dd',parseInt(currentcommentpage)+1);
			$.ajax({
					url: "http://web.weixinkc.com/2/myweb/public/index/morecomment",
					type: "post",
					dataType: "json",
					data: {'id': id,'page': parseInt(currentcommentpage)+1},
					success: function(data){
						if(data.result=='00'){
 						var temphtml = $("#commentlist").html();
 						var allhtml = temphtml+template("commentlistTemp",data);
							$("#commentlist").html(allhtml);	
 					}
					}
				});
		}else{
			alert('暂无更多数据');
			var temphtml = $("#commentlist").html();
			$("#commentlist").html(temphtml);
		}
	})
	
});
