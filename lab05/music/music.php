<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			<?php $song_count = 5678; ?>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count / 10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
		
			<ol>
				<?php 
				if (isset($_GET["newspages"])) {
					$num_pages = $_GET["newspages"];
				}
				else {
					$num_pages = 5;
				}
				
				for ($news_pages = 11; $num_pages > 0 && $news_pages > 0; $news_pages-- && $num_pages--) {
					if ($news_pages >= 10) {
						echo "<li><a href='https://www.billboard.com/archive/article/2019$news_pages'>2019-$news_pages</a></li>";
					}
					else {
						echo "<li><a href='https://www.billboard.com/archive/article/20190$news_pages'>2019-0$news_pages</a></li>";
					}
				} ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php 
				$artists = file("favorite.txt");
				foreach ($artists as $artist) {
					$artist_link = str_replace(" ", "_", $artist);
					$artist_link_real = str_replace("'", "%27", $artist_link);
					echo "<li><a href='http://en.wikipedia.org/wiki/$artist_link_real'>$artist</a></li>";
				}
				?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php 
				$musics = glob("lab5/musicPHP/songs/*.mp3");
				foreach ($musics as $music) {
					$size = (int)(filesize($music)/1024);
					$musicsize[$music] = $size;
				}
				arsort($musicsize);
				foreach ($musicsize as $music => $size) {
					echo "<li class='mp3item'><a href=$music>" . basename($music) . "</a> (" . $size . " KB)</li>";
				}
				print_r($musicsize);

				$playli = glob("lab5/musicPHP/songs/*.m3u");
				arsort($playli);
				foreach ($playli as $playli_sort) {
					echo"<li class='playlistitem'>" . basename($playli_sort) . ":";
					echo"<ul>";
					$listmusic = file("$playli_sort");
					shuffle($listmusic);
					foreach ($listmusic as $listmusic_rand) {
						if (strpos($listmusic_rand, "mp3")) {
							echo"<li>" . $listmusic_rand . "</li>";
						}
					}
					echo"</ul>";
				}
				?>

				<!-- Exercise 8: Playlists (Files) -->
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
