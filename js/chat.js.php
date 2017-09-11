window.onload=function(){
			check();
			scroll();
		}
		document.onkeydown = function(){
    if(window.event && window.event.keyCode == 13){ 
                checkmsg()
            }
}
function checkHtml(htmlStr) {
     var reg = /<[^>]+>/g;
     return reg.test(htmlStr);
 }
function checkmsg(){
     var html=document.getElementById('text').value;
     if (!checkHtml(html)) {
		 send();
	 };
 };
		function none(){
			document.getElementById("sendmessage").style.display = "none";
			document.getElementById("sendimg").style.display = "block";
		}
		
		function none_img(){
			document.getElementById("sendmessage").style.display = "block";
			document.getElementById("sendimg").style.display = "none";
		}
		function send()
		{
		var xmlhttp;
		var get = document.getElementById('text').value;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		if (document.getElementById('text').value != "") {
		     if (document.getElementById('name').value != "") {
		xmlhttp.open("GET","./write.php?password=<?php echo wpassword; ?>&message=" + get + "&username=" + document.getElementById('name').value,true);
		xmlhttp.send();
		document.getElementById('text').value = "";
		setTimeout("scroll()",320);
		} else {
		window.alert("非法请求"); 
		}
		}
		}
		
		function scroll(){
			document.getElementById('allspace').scrollTop = document.getElementById('allspace').scrollHeight;
			setTimeout("document.getElementById('allspace').scrollTop = document.getElementById('allspace').scrollHeight;",550)
		};
		function check()
		{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("allspace").innerHTML=xmlhttp.responseText;
			}
		  }
		  if (document.getElementById('name').value!="")
		  {
		xmlhttp.open("GET","read.php?username=" + document.getElementById('name').value,true);
		xmlhttp.send();
		} else {
				document.getElementById("allspace").innerHTML="<center style=\"-webkit-app-region: drag;\"><font color=\"#C2C2DA\">非法请求</font></center>"
				document.getElementById("footer").style="display:none";
			}
		setTimeout("check()",1000)
		}