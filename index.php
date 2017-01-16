<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
div.box {
    background-color: white;
    color: black;
    margin: 25px 0 25px 0; 
    border: 15px solid #00bfff;
    padding: 50px;
    font-family: Georgia, Serif;
    
} 
div.innerBox {
	 padding: 20px ;
}
</style>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Sync Data</title>
	<script language="javascript" type="text/javascript" src="public/myJS.js"></script>
    <script language="javascript" type="text/javascript" src="public/myAJAXlib.js"></script>
	<script language="javascript" type="text/javascript" src="public/jquery-3.1.1.js"></script>
    <script type="text/javascript">
	function doSomething() {
	    //$.get('http://localhost/SyncData/DropBox/stepOne.php');
	    window.open('http://localhost/SyncData/Application/DropBox/code.php');
	    return;
	}
    function loginSendSpace() {
    	window.open('http://localhost/SyncData/Application/SendSpace/login.php');
	}
	function downloadDropBox() {
    	window.open('http://localhost/SyncData/Application/DropBox/download.php');
	}
	function search() {
    	window.open('http://localhost/SyncData/search.php');
	}
    </script>
	
		
</head>
<body>


<div id="dropbox" class="box">
   <h1><b>Authenticate to dropbox</b></h1> 
   <input type="button" id="b2_1" value="authenticate"  onclick="doSomething()";  style="width:100">
</div>

<div id="dropbox" class="box">
   <h1><b>Download files from dropbox</b></h1> 
   <input type="button" id="b2_2" value="download"  onclick="downloadDropBox()";  style="width:100">
</div>

<div id="dropbox" class="box">
   <h1><b>Search files from dropbox</b></h1> 
   <input type="button" id="b2_3" value="Search"  onclick="search()";  style="width:100">
</div>

<div id="sendspace" class="box">
<h1>Sendspace</h1>
UserName/Email<input type="textbox" id="UserName">
Password<input type="textbox" id="PassWord">
<input type="button" id="b2_1" value="login"  onclick="loginSendSpace()";  style="width:100">
</div>

</body>
</html>
