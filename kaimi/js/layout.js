;(function(d,w){
	var t = d.documentElement; //获取根元素html
	var evt = "orientationchange" in window ? "orientationchange" : "resize"; //如果是手机就监听orientationchange，如果是pc就监听resize

	//给docuemnt对象或window对象添加自定义监听事件
	d.addEventListener && w.addEventListener(evt,function(){
		// console.log("ok");
		var e = t.clientWidth; //获取当前页面视口宽度
		t.style.fontSize = (e/375)*12 + "px"; //给根元素重新设置字体大小
	},false);
})(document, window)