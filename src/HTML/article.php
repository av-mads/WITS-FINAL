<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WITS Wiki</title>
	<link rel="stylesheet" href="../CSS/Style.css">
	<?php
	include "list.php";
	?>
</head>
<body>
<div class="top">WITS-Wiki</div>

<div class="left">
	<?php
	foreach ($articles as $article){
		if(isset($articleNames[$article]))
			echo "<a href='article.php?link=".$article."'>".$articleNames[$article]."</a><br>";
		else
			echo "<a href='article.php?link=".$article."'>".$article."</a><br>";
	}
	?>
</div>

<div class="main">
	<div id="mainTxt">
		<?php
		if(isset($_GET['link'])){
			$contents = explode("|", file_get_contents(__DIR__ . "/../ARTICLES/".$_GET['link']));
			if(sizeof($contents)>1)
				echo $contents[1];
			else
				echo $contents[0];
		}
		?>
	</div>

	<div class="functions">
		<button id="knas" onclick="onClickEdit()">Edit Article</button>

		<script>
			function onClickEdit() {
				var t = document.getElementById("mainTxt").innerHTML;
				document.getElementById("mainTxt").innerHTML ='<textarea class="txt">' + t + '</textarea>';
				document.getElementById("knas").onclick = onClickSave;
				document.getElementById("knas").innerHTML = "Save Changes";
			}
			function onClickSave() {
				var t = document.getElementsByClassName("txt").item(0).innerHTML;
				document.getElementById("mainTxt").innerHTML = t;
				document.getElementById("knas").onclick = onClickEdit;
				document.getElementById("knas").innerHTML = "Edit Article";
			}
		</script>
	</div>
</div>
</body>
</html>
