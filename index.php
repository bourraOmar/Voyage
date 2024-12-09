<!DOCTYPE html>
<html>
<head>
	<title>travel Vibe</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section>
		<header>
			<a href="omar basha.html" class="logo">Omar.</a>
			<div class="toggle" onclick="menuToggle();"></div>
		</header>
		<div class="glass"></div>
		<div class="content">
			<h2>Travel Vibe<br><span>discover the worldin a new way</span></h2>
		</div>
		<video src="beatch1.mp4" autoplay muted loop></video>
		<ul class="sci">
			<li style="--i:1"><a href="https://www.facebook.com/profile.php?id=100011428760121">Facebook</a></li>
			<li style="--i:2"><a href="https://twitter.com/omarbas66034018">Twitter</a></li>
			<li style="--i:3"><a href="https://www.instagram.com/talisse_basha/">Instagram</a></li>
		</ul>
		<ul class="navigation">
			<li style="--i:2"><a href="projet3.html">list des eleves</a></li>
			<li style="--i:3"><a href="projet2.html">Programme de 2eme année</a></li>
			<li style="--i:4"><a href="projet4.html">Emploie de temps</a></li>
		</ul>
	</section>
	<script>
		function menuToggle() {
			const toggleMenu = document.querySelector('.toggle');
			const section = document.querySelector('section');
			toggleMenu.classList.toggle('active');
			section.classList.toggle('active');
		}
	</script>
</body>
</html>	