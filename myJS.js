window.onload = customize;

function customize(){
	window.document.getElementById('div6').style.display = 'none';
}


function fillContent(resource)
	{
	    xmlhttp = new XMLHttpRequest();
	    xmlhttp.open("GET", resource, true);
	    xmlhttp.onreadystatechange=function() {
	        if (xmlhttp.readyState==4) {
	            document.getElementById('content').innerHTML = xmlhttp.responseText;
	        }
	    }
	    xmlhttp.send(null);
	}

//Login to dropbpx
function authenticate() {
	//User asks DropboxServlet to generate URL and redirect there
	//window.document.getElementById('div6').style.display = 'none';	

	// var appKey = document.getElementById('t1_1').value;
	// var appSecret = document.getElementById('t1_2').value;
	// var appDetailsArray =  {"appKey": appKey, "appSecret": appSecret};
	// var json_data = JSON.stringify(appDetailsArray);
	// var q_strURL = 'json_data= ' + json_data;
	// alert(json_data);
	//doAjax('http://localhost/SyncData/DropBox/step-1.php','','doQuery_back','post',0);
	eval('http://localhost/SyncData/DropBox/step-1.php');
	eval('http://localhost/SyncData/DropBox/step-2.php');
}

function doQuery_back(result)
{
	if (result.substring(0,5)=='error'){
	   window.document.getElementById('div6').style.display = 'block';
	   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
   }else{
	   window.document.getElementById('div1').style.display = 'block';
	   window.document.getElementById('t1_3').value=""+result;

   }
}


//Ask user for appKey and appSecret, then receive built url from servlet
function getURL() 
{
	//User asks DropboxServlet to generate URL and redirect there
	window.document.getElementById('div6').style.display = 'none';
	var appKey = document.getElementById('t1_1').value;
	var appSecret = document.getElementById('t1_2').value;
	var appDetailsArray =  {"appKey": appKey, "appSecret": appSecret};
	var json_data = JSON.stringify(appDetailsArray);
	var q_strURL = 'json_data= ' + json_data;
	
	doAjax('DropboxServlet',q_strURL,'doQuery_back_getURL','post',0);
}

function doQuery_back_getURL(result)
{
	if (result.substring(0,5)=='error'){
	   window.document.getElementById('div6').style.display = 'block';
	   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
   }else{
	   window.document.getElementById('div1').style.display = 'block';
	   window.document.getElementById('t1_3').value=""+result;

   }
}

//use url to go to dropbox website to get code
function doRedirect(){
	 window.document.getElementById('div6').style.display = 'none';
	  var q_str = document.getElementById('b2_1').value;
	 	doAjax('DropboxServlet',q_str,'doQuery_back_doRedirect','get',0);
	}

function doQuery_back_doRedirect(result){
	if (result.substring(0,5)=='error'){
		   window.document.getElementById('div6').style.display = 'block';
		   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
	   }else{

		  // selectFrom(result);
		   window.document.getElementById('div2').style.display = 'block';
		   window.document.getElementById('t2_1').value=""+result;

	   }
}
function openInNewTab() {
	window.document.getElementById('div6').style.display = 'none';
	var url = document.getElementById('t2_1').value;
	//url = "";
	  //var win = window.open(url, '_blank');
	  //win.focus();
	  window.location = url;
	}

function submitCode() {
	window.document.getElementById('div6').style.display = 'none';
	var code = document.getElementById('t3_1').value;
	var code_data = JSON.stringify(code);
	var q_strSubmitCode = 'code_data= ' + code_data;
	doAjax('DropboxServlet2',q_strSubmitCode,'doQuery_back_submitCode','post',0);

}
function doQuery_back_submitCode(result){
	if (result.substring(0,5)=='error'){
		   window.document.getElementById('div6').style.display = 'block';
		   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
	   }else{

		   //selectFrom(result);
		   window.document.getElementById('div3').style.display = 'block';
		   window.document.getElementById('t3_2').value=""+result;
	   }
}

function submitToken() {
	window.document.getElementById('div6').style.display = 'none';
	var token = document.getElementById('t4_1').value;
	var token_data = JSON.stringify(token);
	var q_strSubmitToken = 'token_data= ' + token_data;
	doAjax('DropboxServlet3',q_strSubmitToken,'doQuery_back_submitToken','post',0);
	
}

function doQuery_back_submitToken(result) {
	if (result.substring(0,5)=='error'){
		   window.document.getElementById('div6').style.display = 'block';
		   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
	   }else{

		   //selectFrom(result);
		   window.document.getElementById('div4').style.display = 'block';
		   window.document.getElementById('t4_2').value=""+result;
	   }
	
}

function submitFile() {
	window.document.getElementById('div6').style.display = 'none';
	var token = document.getElementById('t5_1').value;
	var token_data = JSON.stringify(token);
	var q_str_submitFile = 'token_data= ' + token_data;
	doAjax('DropboxServlet4',q_str_submitFile,'doQuery_back_submitFile','post',0);
}

function doQuery_back_submitFile(result) {
	if (result.substring(0,5)=='error'){
		   window.document.getElementById('div6').style.display = 'block';
		   window.document.getElementById('div6').innerHTML="<p style='color:red;'><b>"+result.substring(6)+"</b></p>";
	   }else{

		   //display code here whether upload was successful or not
		   window.document.getElementById('div5').style.display = 'block';
		   window.document.getElementById('div5').value=""+result;
	   }
	
}