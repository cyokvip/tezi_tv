///-------------------------------------------------------------------------
//jQuery弹出窗口 By Await [2010-08-12]
//mod by hades.jr[2010-10-29]
//--------------------------------------------------------------------------
/*参数：[可选参数在调用时可写可不写,其他为必写]
----------------------------------------------------------------------------
  content:  内容(可选内容为){ text | id | img | url | iframe }
    width:	内容宽度
   height:	内容高度
	 drag:  是否可以拖动(ture为是,false为否)
     time:	自动关闭等待的时间，为空是则不自动关闭
   showbg:	[可选参数]设置是否显示遮罩层(0为不显示,1为显示)
 ------------------------------------------------------------------------*/
 //示例:
 //------------------------------------------------------------------------
 //tipsWindown("例子","text:例子","500","400","true","3000","0")
 //------------------------------------------------------------------------
var showWindown = true;
var templateSrc = "."; //设置loading.gif路径
function popup(title,content,width,height,drag,time,showbg) {
	$("#windown-box").remove(); //清除内容
	var width = width>= 950?this.width=950:this.width=width;	    //设置最大窗口宽度
	var height = height>= 527?this.height=527:this.height=height;  //设置最大窗口高度
	if(showWindown == true) {
		var simpleWindown_html = new String;
			simpleWindown_html = "<div id=\"windownbg\" style=\"height:"+$(document).height()+"px;;filter:alpha(opacity=0);opacity:0;z-index: 999901\"><iframe style=\"width:100%;height:100%;border:none;filter:alpha(opacity=0);opacity:0;\"></iframe></div>";
			simpleWindown_html += '<div id="windown-box"><div id="windown-title"><div id="pos7"></div><div id="pos8"></div><div id="pos9"></div></div><div id="row"><div id="pos4"></div><div id="windown-content"></div><div id="pos6"></div></div><div id="row"><div id="pos1"></div><div id="pos2"></div><div id="pos3"></div></div></div>';
			$("body").append(simpleWindown_html);
			show = false;
			
			document.getElementById("pos8").style.width=width-7;
			document.getElementById("pos2").style.width=width;
			document.getElementById("windown-content").style.width=width;
			document.getElementById("windown-content").style.height=height;
			document.getElementById("pos4").style.height=height;
			document.getElementById("pos6").style.height=height;
			document.getElementById("windown-box").style.width=width+80;
			document.getElementById("windown-title").style.width=width+80;
			document.getElementById("row").style.width=width+80;
	}
	contentType = content.substring(0,content.indexOf(":"));
	content = content.substring(content.indexOf(":")+1,content.length);
	switch(contentType) {
		case "text":
		$("#windown-content").html(content);
		break;
		case "id":
		$("#windown-content").html($("#"+content+"").html());
		break;
		case "img":
		$("#windown-content").ajaxStart(function() {
			$(this).html("<img src='"+templateSrc+"/images/loading.gif' class='loading' />");
		});
		$.ajax({
			error:function(){
				$("#windown-content").html("<p class='windown-error'>加载数据出错...</p>");
			},
			success:function(html){
				$("#windown-content").html("<img src="+content+" alt='' />");
			}
		});
		break;
		case "url":
		var content_array=content.split("?");
		$("#windown-content").ajaxStart(function(){
			$(this).html("<img src='"+templateSrc+"/images/loading.gif' class='loading' />");
		});
		$.ajax({
			type:content_array[0],
			url:content_array[1],
			data:content_array[2],
			error:function(){
				$("#windown-content").html("<p class='windown-error'>加载数据出错...</p>");
			},
			success:function(html){
				$("#windown-content").html(html);
			}
		});
		break;
		case "iframe":
		$("#windown-content").ajaxStart(function(){
			$(this).html("<img src='"+templateSrc+"/images/loading.gif' class='loading' />");
		});
		$.ajax({
			error:function(){
				$("#windown-content").html("<p class='windown-error'>加载数据出错...</p>");
			},
			success:function(html){
				$("#windown-content").html("<iframe src=\""+content+"\" width=\""+parseInt(width)+"px"+"\" height=\""+parseInt(height)+"px"+"\" scrolling=\"no\" frameborder=\"0\"></iframe>");
			}
		});
	}
	$("#pos8").html(title);
	if(showbg == "true") {$("#windownbg").show();}else {$("#windownbg").remove();};
	$("#windownbg").animate({opacity:"0.7"},"normal");//设置透明度
	$("#windown-box").show();
	
	var cw,ch,est = document.documentElement.scrollTop;//窗口的高和宽
	//取得窗口的高和宽
	if (self.innerHeight) {
		cw=self.innerWidth;
		ch=self.innerHeight;
	}else if (document.documentElement&&document.documentElement.clientHeight) {
		cw=document.documentElement.clientWidth;
		ch=document.documentElement.clientHeight;
	} else if (document.body) {
		cw=document.body.clientWidth;
		ch=document.body.clientHeight;
	}
	
	var isIE6=false;
	if (isIE6) {
		$("#windown-box").css({left:"50%",top:(parseInt((ch)/2)+est)+"px",marginTop: -((parseInt(height)+53)/2)+"px",marginLeft:-((parseInt(width)+32)/2)+"px",zIndex: "999999"});
	}else {
		$("#windown-box").css({left:"50%",top:"50%",marginTop:-((parseInt(height)+53)/2)+"px",marginLeft:-((parseInt(width)+32)/2)+"px",zIndex: "999999"});
	};
	var Drag_ID = document.getElementById("windown-box"),DragHead = document.getElementById("windown-title");
		
	var moveX = 0,moveY = 0,moveTop,moveLeft = 0,moveable = false;
		if (isIE6) {
			moveTop = est;
		}else {
			moveTop = 0;
		}
	var	sw = Drag_ID.scrollWidth,sh = Drag_ID.scrollHeight;
		DragHead.onmouseover = function(e) {
			if(drag == "true"){DragHead.style.cursor = "move";}else{DragHead.style.cursor = "default";}
		};
		DragHead.onmousedown = function(e) {
		/*$("#windown-box").css({opacity:"0.7"},"normal");*/
		if(drag == "true"){moveable = true;}else{moveable = false;}
		e = window.event?window.event:e;
		var ol = Drag_ID.offsetLeft, ot = Drag_ID.offsetTop-moveTop;
		moveX = e.clientX-ol;
		moveY = e.clientY-ot;
		document.onmousemove = function(e) {
				if (moveable) {
				
				e = window.event?window.event:e;
				var x = e.clientX - moveX;
				var y = e.clientY - moveY;
					if ( x > 0 &&( x + sw < cw) && y > 0 && (y + sh < ch) ) {
						Drag_ID.style.left = x + "px";
						Drag_ID.style.top = parseInt(y+moveTop) + "px";
						Drag_ID.style.margin = "auto";
						}
					}
				}
		document.onmouseup = function () {moveable = false;$("#windown-box").css({opacity:"1"},"normal");};
		Drag_ID.onselectstart = function(e){return false;}
	}

	var closeWindown = function() {
		$("#windownbg").remove();
		$("#windown-box").fadeOut("slow",function(){$(this).remove();});
	}
	if( time == "" || typeof(time) == "undefined") {
		$("#pos9").click(function() {
			$("#windownbg").remove();
			$("#windown-box").remove();
		});
	}else { 
		setTimeout(closeWindown,time);
	}
}
