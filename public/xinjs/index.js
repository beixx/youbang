 $("#customized").click(function(){
    //类型
    var customized = $("#customized_name span").text();
    //风格
    var customized_style = $("#customized_style span").text();
 	//姓名
 	var name = $("input[name='user_name']").val();
 	//手机号
 	var phone = $("input[name='user_phone']").val();
 	//预算
 	var budget =  $("input[name='budget']").val();
 	//以后无用  
 	var test_url = $("input[name='test_url']").val();
    if ( typeof(name) == 'budget' || budget.length == 0) {
        alert("请输入预算");
        return false;
    }
 	if ( typeof(name) == 'undefined' || name.length == 0) {
 		alert("请输入姓名");
 		return false;
 	}
 	if ( typeof(phone) == 'undefined' || phone.length == 0) {
 		alert("请输入手机号");
 		return false;
 	}
 	var url =test_url+"index.php/index/customized";
 	$.ajax({
        type: 'post',
        dataType: 'json',
        data: {customized:customized, customized_style:customized_style, budget:budget, name:name,phone:phone},
        url: url,
        success: function(data){
            if (!data.code) {
            	alert("定制成功");
            } else {
            	alert("定制失败");
            }
        },
        error: function(){
           alert("服务器交互错误");
        }
    });

 })