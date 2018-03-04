<?php
require_once("whois.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>GeoIP Web Locator</title>
  <meta name="description" content="what's my ip">
  <meta name="author" content="fargas">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/ribbon.css">
  <style>
	a:link {
		text-decoration: none;
	}
	a:visited {
		text-decoration: none;
	}
	a:hover {
		text-decoration: none;
	}
	a:active {
		text-decoration: none;
	}
	</style>
  <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body class="code-snippets-visible">
<div class="navbar-spacer"></div>
<nav class="navbar">
      <div class="container">
	  <br>	  
		<a href="javascript:history.back()">&larr;</a>
		Displaying WHOIS results for <?php echo '<span style="color:green">'. $domain .'</span>'; ?>:
      </div>
</nav>
<div class="container">
<table width='100%'>
		
<?php echo '<pre>'. $whois->whoislookup($domain) .'</pre>'; ?>
</table>
</div>
</body>
<footer>
	<a href="https://github.com/faridg/whoiser" target="_blank">
	<div class="corner-ribbon bottom-right sticky white"><img src="images/git.png" alt="faridg on github" height="30px" width="30px"></div>
	</a>
</footer>
</html>
