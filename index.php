<?php
session_start();
?>
<?php
	include "./chMult/classes/user.php";
?>
<?php
	$isAuthorized = user::isAuthorized();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="Chess, Engine, Javascript, Play Chess, Chess Program, Javascript Chess, Game">
		<title>JSChess</title>		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/sliderStyle.css">
		<link href="stylesChess.css" rel="stylesheet" type="text/css">
		<script type="text/javascript"> if (!window.console) console = {log: function() {}}; </script>
	</head>
	<body>
		<div class="container">
			<header>
				<h3>JS Chess</h3>
			</header>


			<div class="main__chess-position">
				<div id="FenInDiv">
					<input type="text" id="fenIn"/>		
					<button type="button" id="SetFen">Set Position</button>	
				</div>
			</div>

			<div class="game">

				<div class="main__board">
					<div id="Board">
					</div>
				</div>
				<div class="buttons">

					<?php if($isAuthorized):?>	
						<div id="SaveLoadOutput">		
							<div id="lMove"></div>
							<button type="button" id="NewGameButton">New Game</button><br/>
							<input type="submit" id="lMoveSQL_submit" value="Start saved game">	
							<div id="lMoveSQL_data" ></div>
							<input type="submit" id="lSaveSQL_submit" value="Save board">	
							<div id="lSaveSQL_data" ></div>
							<input type="submit" id="multiplayer_submit" 
							onclick="parent.location='chMult/pages/UserLogin.php'" 
							value="Multiplayer game">				
						</div>
					<?php endif;?>

					<div class="main__auth">
						<?php include 'php_pages/loginForm.php'; ?>
					</div>

				</div>


			</div>

			<div id="CurrentFenDiv">
				<span id="currentFenSpan"></span>		
			</div>	

			
			<span id="GameStatus"></span>

			<!--This div not outputted but needed to work  -->	
			<?php include 'php_pages/notOutputted.php'; ?>	
			<!--   -->
			
			<footer>
				<div  style="background-color:lavender;">
					&copy; ronnyalex.org 2015. All rights reserved.
				</div>
			</footer>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>		
		<script src="js/jquery-1.10.1.min.js"></script>
		<script src="js/buttons/loginlogout.js"></script>
		<script src="js/buttons/register.js"></script>
		<script src="js/defs.js"></script>
		<script src="js/io.js"></script>
		<script src="js/board.js"></script>
		<script src="js/movegen.js"></script>
		<script src="js/makemove.js"></script>
		<script src="js/perft.js"></script>
		<script src="js/evaluate.js"></script>
		<script src="js/pvtable.js"></script>
		<script src="js/search.js"></script>
		<script src="js/protocol.js"></script>
		<script src="js/gui.js"></script>
		<script src="js/main.js"></script>
		<script src="js/buttons/loadSaveGame.js"></script>
	</body>
</html>

