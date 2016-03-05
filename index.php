<?php
	include_once("inc/dbconn.php");
	
	$sql_commandPopular = 'SELECT * FROM worlds order by worldLikes desc limit 5';
	$resultPopular = mysqli_query($conn, $sql_commandPopular);
	
	$sql_commandLatest = 'SELECT * FROM worlds order by worldDate desc limit 5';
	$resultLatest = mysqli_query($conn, $sql_commandLatest);
	
	mysqli_close($conn);	
?>

<?php include("inc/header.php") ?>

<div id="mainContainer">
	
	<div id="leftCol"  class="box">
		<div class="featuredWorlds">
			<div id="popularHeader" class="worldHeader">Most Popular</div>
			<?php while($rowPopular = mysqli_fetch_assoc($resultPopular)) { ?>
				<a href="world.php?ID=<?php echo $rowPopular["worldID"] ?>">
					<div class="test">
						<span><?php echo $rowPopular["worldName"]; ?></span>
						<dl>
							<dt><?php echo $rowPopular["worldAuthor"]; ?></dt>
							<dd><?php echo $rowPopular["worldLikes"];?> Likes</dd>
						</dl>
					</div>
				</a>
				<?php } ?>
		</div>
		
		<div class="featuredWorlds">
			<div id="latestHeader" class="worldHeader">Latest</div>	
			<?php while($rowLatest = mysqli_fetch_assoc($resultLatest)) { ?>
				<a href="world.php?ID=<?php echo $rowLatest["worldID"] ?>">
					<div class="test">
						<span><?php echo $rowLatest["worldName"]; ?></span>
						<dl>
							<dt><?php echo $rowLatest["worldAuthor"]; ?></dt>
							<dd><?php echo $rowLatest["worldLikes"];?> Likes</dd>
						</dl>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
	
	<div id="rightCol" class="box">
		<div class="featuredWorlds">
			<div id="linksHeader" class="worldHeader">Links</div>
			<ul><a href="http://www.reddit.com/r/worldhaven">
				<li id="redditLi">Subreddit</li>
			</a>
			<a href="forums">
				<li id="forumsLi">Forums</li>
			</a>
			<a href="https://twitter.com/world_haven">
				<li id="twitterLi">Twitter</li>
			</a>
			</ul>
		</div>
		<div id="adspace">
			
		</div>
	</div>
	
	<div id="centerCol" class="center box">
		<div id="welcomeImg" class="noselect center">
			WELCOME TO<br> WORLDHAVEN
		</div>
		<div id="welcomeText" class="center">
			WorldHaven is a new site created to help worldbuilders manage, organize and share their worlds.
		</div>
	</div>
</div>

<script>
	function randomImage() {
		var description = [
		"wb1",
		"wb2",
		"wb3",
		"wb4"
		];
		
		var size = description.length
		var x = Math.floor(size*Math.random())
		document.getElementById("welcomeImg").style.backgroundImage = 'url(img/'+description[x]+'.jpg)';
	}
	
	randomImage();
	
	$("#login").on('click', function() {
		$('#account').css("z-index", 1);
		$('#account').animate({opacity:'1'}, 200);
		$("#account").on("clickoutside", function(event){
			if ($("#account").css("opacity") == 1) {
				$(this).animate({opacity:'0'}, 200, function() {
					$(this).css("z-index", 0);
				});
			}
		});
	});
	if ($('#toast').length > 0) { //If toast exists... (to prevent console errors)
		$('#toast').css("left", (($(document).width() / 2) - ($('#toast').outerWidth() / 2))); // I JUST WANT TO CENTER A GODDAMN POSITION ABSOLUTE ELEMENT
		console.log($('#toast').css("left"));
		$('#toast').animate({opacity:'1'}, 400); //Animate it into existence
		setInterval(function(){ 
			$('#toast').animate({opacity:'0', bottom:'50px'}, 200); //Then hide it after 4s
		}, 4000);
	}
</script>
</body>
</html>					