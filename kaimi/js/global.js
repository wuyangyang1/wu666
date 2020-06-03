	// 检查用户登录
	function checkuserLogin(){
		if( !localStorage.getItem("userToken") ){
			//用户没登录
			return false;
		}else{
			//用户已登录，判断该用户是否收藏了当前商品，购物车中是否已添加有商品
			updataCartNum();
			return true;
		}		
	}
	// 更新底部购物车角标
	function updataCartNum(){
	$.ajax({
		url:"http://api.shenzhou888.com.cn/v2/ecapi.cart.get",
		headers:{
			 'X-ECAPI-Authorization':localStorage.getItem("userToken")
		},
		type:"post",
		dataType:"json",
		success:function(data){
			console.log(data);
			if( data.error_code ==0){
				$("#total_number").text(data.goods_groups[0].total_amount );
			}
		}
	})	
	}
	