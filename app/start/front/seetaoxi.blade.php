<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索页</title>
    <link rel="stylesheet" href="{{asset('xincss/style1.css')}}">
    <link rel="stylesheet" href="{{asset('xincss/dateRange.css')}}">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="{{asset('xinjs/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('xinjs/dateRange.js')}}"></script>
    <script type="text/javascript" src="{{asset('xinjs/jquery.SuperSlide.2.1.1.js')}}" ></script>
    <style type="text/css">
    ::-webkit-input-placeholder { /* WebKit browsers */ 
color: #FFF; 
} 
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */ 
color: #FFF; 
} 
::-moz-placeholder { /* Mozilla Firefox 19+ */ 
color: #FFF; 
} 
:-ms-input-placeholder { /* Internet Explorer 10+ */ 
color: #FFF; 
}
.iconfont {
    font-family: iconfont!important;
    font-size: inherit;
    font-style: normal;
    -webkit-text-stroke-width: .2px;
    -moz-osx-font-smoothing: grayscale;
}
</style>
</head>
<body>
<header>
    <div class="main">
        <h1 class="lft"><a href="javascript:void(0)"><img src="{{asset('xinimage/logo.png')}}"></a> </h1>       
         <div class="city">
            <ul class="nav-main">
                <li id="li-1" class="txtCtr "><font class="area1" id="area"><?php if(isset($tenantinfo->city)){ echo $tenantinfo->city; }else{ echo "北京"; }?></font><span>[切换]</span></li>
            </ul>
            <!--隐藏盒子-->
            <div id="box-1" class="hidden-box hidden-loc-index">
                <h3>当前所在的地区：<span class="area2">北京</span></h3>
                <p class="quyu">华北东北</p>
                <p>
                    <a class="cy" href="javascript:void(0)">北京</a><a class="cy" href="javascript:void(0)">天津</a><a class="cy" href="javascript:void(0)">沈阳</a><a class="cy" href="javascript:void(0)">大连</a><a class="cy" href="javascript:void(0)">哈尔滨</a><a class="cy" href="javascript:void(0)">石家庄</a>
                </p>
                <p class="quyu">华东地区</p>
                <p>
                    <a class="cy" href="javascript:void(0)">上海</a><a class="cy" href="javascript:void(0)">杭州</a><a class="cy" href="javascript:void(0)">厦门</a><a class="cy" href="javascript:void(0)">南京</a><a class="cy" href="javascript:void(0)">苏州</a><a class="cy" href="javascript:void(0)">无锡</a><a class="cy" href="javascript:void(0)">宁波</a><a class="cy" href="javascript:void(0)">福州</a><a class="cy" href="javascript:void(0)">青岛</a><a class="cy" href="javascript:void(0)">合肥</a>
                </p>
                <p class="quyu">中部西部</p>
                <p>
                  <a class="cy" href="javascript:void(0)">成都</a><a class="cy" href="javascript:void(0)">重庆</a><a class="cy" href="javascript:void(0)">长沙</a><a class="cy" href="javascript:void(0)">郑州</a><a class="cy" href="javascript:void(0)">西安</a><a class="cy" href="javascript:void(0)">武汉</a>
                </p>
                <p class="quyu">华南地区</p>
                <p>
                 <a class="cy" href="javascript:void(0)">广州</a><a class="cy" href="javascript:void(0)">深圳</a>
                </p>
            </div>
        </div>
        <nav>
            <a href="javascript:void(0)">首页</a>
            <a href="javascript:void(0)" class="cur">婚纱摄影</a>
            <a href="javascript:void(0)">婚礼策划</a>
            <a href="javascript:void(0)">数据营销</a>
            <a href="javascript:void(0)">榜单规则</a>
        </nav>
               <div class="search"><ul><form onsubmit="return false;" id="search_form" action="/search/index" method="get" ><li class="li1" style="position: relative;">
               <input type="text" name="keyword" placeholder="搜索商家" value="" id="search_keyword" autocomplete="off">
               <input name="city" type="hidden" value="" id="city">
               <button type="submit" id="submit"><svg viewBox="0 0 16 16" class="Icon Icon--search" width="16" height="16" aria-hidden="true" style="height: 16px; width: 16px;"><title></title><g><path d="M12.054 10.864c.887-1.14 1.42-2.57 1.42-4.127C13.474 3.017 10.457 0 6.737 0S0 3.016 0 6.737c0 3.72 3.016 6.737 6.737 6.737 1.556 0 2.985-.533 4.127-1.42l3.103 3.104c.765.46 1.705-.37 1.19-1.19l-3.103-3.104zm-5.317.925c-2.786 0-5.053-2.267-5.053-5.053S3.95 1.684 6.737 1.684 11.79 3.95 11.79 6.737 9.522 11.79 6.736 11.79z"></path></g></svg></button></li></form></ul></div>
    </div>
</header>

<div class="main details">
    <div class="breadcrumb"><a href="">北京结婚</a>&gt;&gt;<a href="">27°罗马风情婚纱摄影(北京总部)</a>&gt;&gt; 27°<最强权限>系列 </div>
    <div class="lft l-box">
        <div class="ban" id="demo1">
            <div class="ban2" id="ban_pic1">
                <div class="prev1" id="prev1"><img src="images/index_tab_l.png"  alt=""/></div>
                <div class="next1" id="next1"><img src="images/index_tab_r.png"  alt=""/></div>
                <ul>
                    <li><a href="javascript:;"><img src="images/b1.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b2.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b3.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b4.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b5.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b1.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b2.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b3.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b4.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b5.jpg" alt=""/></a></li>
                </ul>
            </div>
            <div class="min_pic">
                <div class="prev_btn1" id="prev_btn1"><img src="images/prev_off.png"  alt=""/></div>
                <div class="num clearfix" id="ban_num1">
                    <ul>
                        <li><a href="javascript:;"><img src="images/s1.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s2.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s3.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s4.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s5.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s1.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s2.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s3.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s4.jpg" alt=""/></a></li>
                        <li><a href="javascript:;"><img src="images/s5.jpg" alt=""/></a></li>
                    </ul>
                </div>
                <div class="next_btn1" id="next_btn1"><img src="images/next_off.png" /></div>
            </div>
        </div>

        <div class="mhc"></div>

        <div class="pop_up" id="demo2">
            <div class="pop_up_xx"><img src="images/chacha3.png" width="40" height="40"  alt=""/></div>
            <div class="pop_up2" id="ban_pic2">
                <div class="prev1" id="prev2"><img src="images/index_tab_l.png"  alt=""/></div>
                <div class="next1" id="next2"><img src="images/index_tab_r.png"  alt=""/></div>
                <ul>
                    <li><a href="javascript:;"><img src="images/b1.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b2.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b3.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b4.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b5.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b1.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b2.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b3.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b4.jpg" alt=""/></a></li>
                    <li><a href="javascript:;"><img src="images/b5.jpg" alt=""/></a></li>
                </ul>
            </div>
        </div>


    </div>
    <div class="rgt r-box">
        <div class="bor shop">
            <div class="title">拍摄商家</div>
            <h3>韩国爱暮AM+WONKYU(北京爱唯一婚纱摄影）</h3>
            <p>人均消费：<span class="red">1980</span>元</p>
            <div class="ask txtCtr"><a href="">咨询商家</a></div>
        </div>

        <div class="bor share">
            <h3><span>分享套系</span></h3>
            <!-- JiaThis Button BEGIN -->
            <div class="jiathis_style">
                <a class="jiathis_button_weixin"></a>
                <a class="jiathis_button_qzone"></a>
                <a class="jiathis_button_cqq"></a>
                <a class="jiathis_button_tsina"></a>
            </div>
            <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
            <!-- JiaThis Button END -->
        </div>

        <div class="bor case">
            <div class="title">相似案例</div>
            <ul>
                <li>
                    <a href=""><img src="images/img3.jpg">
                    <p>花城</p>
                    </a>
                </li>
                <li>
                    <a href=""><img src="images/img3.jpg">
                        <p>花城</p>
                    </a>
                </li>
                <li>
                    <a href=""><img src="images/img3.jpg">
                        <p>花城</p>
                    </a>
                </li>
                <li>
                    <a href=""><img src="images/img3.jpg">
                        <p>花城</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<footer class="txtCtr">
    © 2017-2030 卢硕排行  |  卢硕排行版权说明   京ICP备08107937号-1
</footer>

<script src="js/pic_tab.js"></script>
<script type="text/javascript">
    $('#demo1').banqh({
        box:"#demo1",//总框架
        pic:"#ban_pic1",//大图框架
        pnum:"#ban_num1",//小图框架
        prev_btn:"#prev_btn1",//小图左箭头
        next_btn:"#next_btn1",//小图右箭头
        pop_prev:"#prev2",//弹出框左箭头
        pop_next:"#next2",//弹出框右箭头
        prev:"#prev1",//大图左箭头
        next:"#next1",//大图右箭头
        pop_div:"#demo2",//弹出框框架
        pop_pic:"#ban_pic2",//弹出框图片框架
        pop_xx:".pop_up_xx",//关闭弹出框按钮
        mhc:".mhc",//朦灰层
        autoplay:true,//是否自动播放
        interTime:5000,//图片自动切换间隔
        delayTime:400,//切换一张图片时间
        pop_delayTime:400,//弹出框切换一张图片时间
        order:0,//当前显示的图片（从0开始）
        picdire:true,//大图滚动方向（true为水平方向滚动）
        mindire:true,//小图滚动方向（true为水平方向滚动）
        min_picnum:5,//小图显示数量
        pop_up:true//大图是否有弹出框
    })
</script>

</body>
</html>