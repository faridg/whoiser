<?php
require_once("whois.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>GeoIP Web Locator</title>
  <meta name="description" content="what's my ip">
  <meta name="author" content="fargas">
  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet" type="text/css">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body class="code-snippets-visible">
<div class="navbar-spacer"></div>
<nav class="navbar">
      <div class="container">
	  <br>
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
	<img src="images/git.png" alt="faridg on github" height="42px" width="42px"></a>
</footer>
</html>
