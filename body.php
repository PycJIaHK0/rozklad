<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<?php require_once "blocks/attach_style.php";?>
<title>Головна сторінка</title>
<meta charset="utf-8"/>
<script>
	function showContent(link) {

		var cont = document.getElementById('contentBody');
		var loading = document.getElementById('loading');

		cont.innerHTML = loading.innerHTML;
 
		var http = createRequestObject();					
		if( http ) {
			http.open('get', link);							
			http.onreadystatechange = function () {			
				if(http.readyState == 4) {
					cont.innerHTML = http.responseText;		
				}
			}
			http.send(null);    
		} else {
			document.location = link;	
		}
	}

	
	function createRequestObject() {
		try { return new XMLHttpRequest() }
		catch(e) {
			try { return new ActiveXObject('Msxml2.XMLHTTP') }
			catch(e) {
				try { return new ActiveXObject('Microsoft.XMLHTTP') }
				catch(e) { return null; }
			}
		}
	}
</script>
</head>
<body>
	<table id="entered">
		<?php
			require_once "blocks/menu.php";
			require_once "blocks/header.php";
			require_once "blocks/content.php";
			require_once "blocks/footer.php";
		?>
	</table>

	<div id="loading" style="display: none">
	<img src="images/load.gif">
	</div>
	
</body>
