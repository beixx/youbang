<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     
    <head>
    <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
    <title>后台管理中心</title>
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Supr admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, masonry, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Supr admin template" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	 <script type="text/javascript" src="{{ asset('js/http/jquery-1.7.2.js') }}"></script>
    <!-- Le styles -->
    <!-- Use new way for google web fonts 
    http://www.smashingmagazine.com/2012/07/11/avoiding-faux-weights-styles-google-web-fonts -->
    <!-- Headings -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
    <!-- Text -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
    <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
    <![endif]-->

    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/supr-theme/jquery.ui.supr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Plugin stylesheets -->
 
    <link href="{{ asset('plugins/ibutton/jquery.ibutton.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('plugins/uniform/uniform.default.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('plugins/select/select2.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('plugins/dataTables/jquery.dataTables.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css') }}" type="text/css" rel="stylesheet" />
	
	
	
	<script type="text/javascript" src="{{asset('xinjs/jquery.SuperSlide.2.1.1.js')}}" ></script>
	 <script type="text/javascript" src="{{asset('xinjs/jquery.reveal.js')}}"></script>
	 <script type="text/javascript" src="{{asset('xinjs/layer.js')}}" ></script>
	 <script type="text/javascript" src="{{asset('xinjs/uploadImage.js')}}"></script>
	 <script type="text/javascript" src="{{asset('xinjs/exif.js')}}"></script>
	 <script type="text/javascript" src="{{ asset('xinjs/template.js') }}"></script>
	<script type="text/javascript" src="{{ asset('xinjs/zepto.min.js') }}"></script>
	 <link href="{{ asset('xincss/style1.css') }}" rel="stylesheet" type="text/css" />
    <!-- Main stylesheets -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" /> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    
    <style>
		body{background:#ddd;font:14px/1.7 tahoma,'\5fae\8f6f\96c5\9ed1',sans-serif;}
		h1,h2,h3{font-size:36px;line-height:1;}
		h2{font-size:24px;}
		h3{font-size:18px;}
		fieldset{margin:0 10%;}
		fieldset legend{font-weight:bold;font-size:16px;line-height:2;}
		select,button{padding:0.5em;}
		a{color:#06f;text-decoration:none;}
		a:hover{color:#00f;}
		.wrap{width:900px;margin:0 auto;padding:20px 50px;border-radius:8px;background:#fff;box-shadow:0 0 10px rgba(0,0,0,0.2);}
	</style>
    
  
<!-- <script src="http://cdn.staticfile.org/zepto/1.0/zepto.min.js"></script> -->

    
    
    <script type="text/javascript">
        //adding load class to body and hide page
        document.documentElement.className += 'loadstate';
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
      
    <body>
    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <div id="header">

        <div class="navbar">
            <div class="navbar-inner">
              <div class="container-fluid">
                <a class="brand" href="#">管理后台<span class="slogan"></span></a>
                <div class="nav-no-collapse">   
                  <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
                    <ul class="nav pull-right usernav">
                        <li class="dropdown">
                                <span class="txt"></span>  
                            </a>
                            <ul class="dropdown-menu">  
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/logout') }}"><span class="icon16 icomoon-icon-exit"></span> 退出</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
              </div>
            </div><!-- /navbar-inner -->
          </div><!-- /navbar --> 

    </div><!-- End #header -->

    <div id="wrapper">

        <!--Responsive navigation button-->  
        <div class="resBtn">
            <a href="#"><span class="icon16 minia-icon-list-3"></span></a>
        </div>
        
        <!--Sidebar collapse button-->  
        <div class="collapseBtn">
             <a href="#" class="tipR" title="Hide sidebar"><span class="icon12 minia-icon-layout"></span></a>
        </div>

        <!--Sidebar background-->
        <div id="sidebarbg"></div>
        <!--Sidebar content-->
        <div id="sidebar">

            <div class="shortcuts">
                <ul>
                    <li><a href="#" title="Support section" class="tip"><span class="icon24 icomoon-icon-support"></span></a></li>
                    <li><a href="#" title="Database backup" class="tip"><span class="icon24 icomoon-icon-database"></span></a></li>
                    <li><a href="#" title="Sales statistics" class="tip"><span class="icon24 iconic-icon-chart"></span></a></li>
                    <li><a href="#" title="Write post" class="tip"><span class="icon24 icomoon-icon-pencil"></span></a></li>
                </ul>
            </div><!-- End search -->            

            <div class="sidenav">

                <div class="sidebar-widget" style="margin: -1px 0 0 0;">
                    <h5 class="title" style="margin-bottom:0">栏目</h5>
                </div><!-- End .sidenav-widget -->

                <div class="mainnav">
                    <ul>
		                 <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>评论管理</a>
			                         <ul class="sub">
					                        <li>
					                           <a href="{{ url('comment/list') }}"><span class="icon16 icomoon-icon-paper"></span>评论列表</a>
					                        </li>
					                       <li>
					                           <a href="{{ url('comment/search') }}"><span class="icon16 icomoon-icon-paper"></span>根据商户搜查评论</a>
					                        </li>
					                       
			                         </ul>
		                 </li>
		                 
		                 <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>自平台评论</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('commentpt/list') }}?source=1"><span class="icon16 icomoon-icon-paper"></span>自平台评论打分列表</a>
					                        </li>
					             			<li>
					                           <a href="{{ url('comment/search') }}?source=0"><span class="icon16 icomoon-icon-paper"></span>根据商户搜查评论</a>
					                        </li>
			                         </ul> 
		                 </li>
		                 <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>商户管理</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('shop/list') }}"><span class="icon16 icomoon-icon-paper"></span>商户列表</a>
					                        </li>
					                        <li>
					                           <a href="{{ url('shop/search') }}"><span class="icon16 icomoon-icon-paper"></span>商户搜索</a>
					                        </li>
					                       
			                         </ul> 
		                 </li>
		                  
		          		
		          		<li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>全局广告管理</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('shop/globeladvlist') }}"><span class="icon16 icomoon-icon-paper"></span>全局广告列表</a>
					                        </li>
					                        <li>
					                           <a href="{{ url('shop/globeladdadv') }}"><span class="icon16 icomoon-icon-paper"></span>添加全局广告</a>
					                        </li>
					                       
			                         </ul> 
		                 </li>
		          		
		                  <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>预约看店管理</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('appointment/list') }}"><span class="icon16 icomoon-icon-paper"></span>预约看店列表</a>
					                        </li>
					                        <li>
					                           <a href="{{ url('appointment/add') }}"><span class="icon16 icomoon-icon-paper"></span>添加预约看店</a>
					                        </li>
			                         </ul> 
		                 </li>
		                 <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>定制管理</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('custom/list') }}"><span class="icon16 icomoon-icon-paper"></span>定制列表</a>
					                        </li>
					                        
			                         </ul> 
		                 </li>
		                 <!-- 
		                 <li>
			                        <a href="#"><span class="icon16 minia-icon-list-4"></span>客片管理</a>  
			                        <ul class="sub">
					                        <li>
					                           <a href="{{ url('shop/globalclientlist') }}"><span class="icon16 icomoon-icon-paper"></span>客片列表</a>
					                        </li>
					                        
			                         </ul> 
		                 </li>
		                  -->
                    </ul>
                </div>
            </div><!-- End sidenav -->
        </div><!-- End #sidebar -->

        <!--Body content-->
        @yield('content')
        
       <!-- End #content -->
    
    </div><!-- End #wrapper -->
    
    <!-- Le javascript
    ================================================== -->
  
    <script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mousewheel.js') }}"></script>
    <!-- THIS IS DOWNLOADED FROM WWW.SXRIPTGATES.COM - SO THIS IS YOUR NEW SITE FOR DOWNLOAD SCRIPT ;) -->
    
    <!-- Load plugins -->
    <script type="text/javascript" src="{{ asset('plugins/qtip/jquery.qtip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.grow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.resize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.tooltip_0.4.4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/flot/jquery.flot.orderBars.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/prettify/prettify.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/watermark/jquery.watermark.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/elastic/jquery.elastic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/inputlimiter/jquery.inputlimiter.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/maskedinput/jquery.maskedinput-1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/ibutton/jquery.ibutton.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/stepper/ui.stepper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/color-picker/colorpicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/timeentry/jquery.timeentry.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/select/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/dualselect/jquery.dualListBox-1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/tiny_mce/jquery.tinymce.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/validate/jquery.validate.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/animated-progress-bar/jquery.progressbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/pnotify/jquery.pnotify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/lazy-load/jquery.lazyload.min.js') }}"></script>
   
    <script type="text/javascript" src="{{ asset('plugins/pretty-photo/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/smartWizzard/jquery.smartWizard-2.0.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/ios-fix/ios-orientationchange-fix.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/dataTables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/elfinder/elfinder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/plupload/plupload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/plupload/plupload.html4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js') }}"></script>

    <!-- Init plugins -->
    <script type="text/javascript" src="{{ asset('js/statistic.js') }}"></script><!-- Control graphs ( chart, pies and etc) -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="{{ asset('js/http/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
 
    <script type="text/javascript">
        
        	$('.del').click(function(){
        		if (confirm("你確定要刪除嗎？")) {
        			return true;
        			}
        			else {
        			return false;
        			}
            	})
              function check(){
        		if (confirm("你確定要刪除嗎？")) {
        			return true;
        			}
        			else {
        			return false;
        			}
           }
		
     </script>
	 <!-- 百度编辑区引入的js -->
    <script type="text/javascript" charset="utf-8" src="{{ url('js/fck/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ url('js/fck/ueditor.all.min.js') }}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{ url('js/fck/lang/zh-cn/zh-cn.js') }}"></script>
    <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
    
</script>
	
    </body>
</html>
