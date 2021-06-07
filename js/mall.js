
// //商品细节页面跳转
// $('.item-content-bottom-img').click(function(){
// 	window.location = 'item_detail.html';
// })

$('#logout').click(function(){
	var r=confirm("确认退出");
	if(r==true){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
				location.reload();
		};
		xhttp.open("GET","php/logout.php",true);
		xhttp.send();
	}
})

function detail(obj){
	var name = $(obj).find('.name')[0].innerHTML;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200)
			location.href = "item_detail.html";
	};
	xhttp.open("GET","php/detail_save.php?name="+name,true);
	xhttp.send();
}

$('#car').click(function(){
	var obj = document.getElementById('login');
	if(obj==null){
		location.href="car.html";
	}
})