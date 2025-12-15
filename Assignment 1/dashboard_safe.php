<?php

// load_image
$basePath = 'images/'; // Base directory where images are stored
$realBasePath = realpath($basePath);

if (isset($_GET['image'])) 
{
	$image = basename($_GET['image']); // Sanitizes user input
	
	$filePath = $basePath . $image;
	$realFilePath = realpath($filePath);
	
	if (($realFilePath && strpos($realFilePath, $realBasePath) === 0)) 
	{
		header('Content-Type: image/jpg');
		readfile($filePath);
	} 
	else 
	{
		echo "File Does Not Exist";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>    
	<meta charset="UTF-8">    
	<title>Welcome</title>  
	<style type="text/css"> 
	       
		body{ 
			font: 14px sans-serif; 
			text-align: center; 
			background-color: #F0FFFF;
		}
		
		h2 {
			font-weight: bold; 
			color: #696969; 
			border-bottom: 2px solid #28a745; 
			padding-bottom: 10px; 
			margin-bottom: 20px;
		}
		
		p {
			font-style: italic;
		}
		
		form {
			background: #f8f9fa;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
			margin: 10px auto;
			max-width: 300px;
			display: flex;
			flex-direction: column;
		}
		
		label {
			margin-bottom: 5px; 
			color: #555; 
			font-weight: bold;
		}
		
		input {
			padding: 10px;
			margin-bottom: 20px;
		}
		
		button {
			width: auto;
			padding: 10px 10px;
			background-color: #3EA99f;
			color: #fff;
			border: none;
			border-radius: 8px;
			cursor: pointer;
			transition: background-color 0.5s;
			align-self: center;
		}
		
		button:hover {
			background-color: #008B8B;
		}   
		
		
		.prompt-list {
			display: flex;
			gap: 10px;
			flex-wrap: wrap;
			justify-content: center;
			margin-top: 20px;
		}

		.prompt {
			background-color: #f8f8f8;
			padding: 20px;
			border-radius: 8px;
			width: 25%;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}
		
		.prompt h3 {
			font-size: 16px;
			color: #28a745;
		}
		
		.prompt p {
			font-size: 14px;
			color: #555;
		} 
	</style>
</head>
<body>    
	<div class="wrapper">        
		<h1>Welcome To The Gallery!</h1>
		<p>🌟 Share the name of the prompt you’d love to see! 🌟</p>
		<p>✨ OR ✨</p>
		<p>🌟 Click the name of the prompt you’d love to see! 🌟</p>
		<br>    
	</div>            
	
	<div class="wrapper">
		<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="file">Enter Name:</label>
			<input type="text" name="file" autocomplete="off">
			<button class="btn btn-default">Search Image</button> 
		</form>
		<br>
		
		<?php
		 if(isset($_GET['file'])) {
		    	
		 	$allowed_files = ['snail.jpg', 'bird.jpg', 'field.jpg', 'nightsky.jpg', 'deer.jpg', 'stonehenge.jpg', 'turtle.jpg', 'ricefields.jpg', 'lighthouse.jpg', 'forest.jpg'];
		    
		    	$file = $_GET['file'];
		    	$base_dir = 'images/';
		    	
		    	if(in_array($file, $allowed_files)) 
		    	{
		    		$path = $base_dir . $file;
			    	if(file_exists($path) ) 
			    	{
			    		echo "<img src='$base_dir$file' alt='$file' style='max-width: 500px;' />";
				}
			}
			else
			{
				echo "File Does Not Exist";
			}
		}
		?>
	    	
		<div class="container">
			<h2>Available Options</h2> 	
			
			<section class="prompt-list">
				<div class="prompt">
					<a href="?image=snail.jpg"><h3>snail.jpg</h3></a>
					<p>A close-up of a snail with its spiral shell, slowly moving across a green leafy surface</p>
				</div>
				<div class="prompt">
					<a href="?image=bird.jpg"><h3>bird.jpg</h3></a>
					<p>A striking image of a bird perched on a branch, with its feathers puffed up and eyes alert</p>
				</div>
				<div class="prompt">
					<a href="?image=field.jpg"><h3>field.jpg</h3></a>
					<p>A vast, open field under a clear blue sky, with lush green grass stretching into the distance</p>
				</div>
				<div class="prompt">
					<a href="?image=nightsky.jpg"><h3>nightsky.jpg</h3></a>
					<p>A breathtaking view of the Milky Way, illuminating the night sky above the silhouette of tall trees</p>
				</div>
				<div class="prompt">
					<a href="?image=deer.jpg"><h3>deer.jpg</h3></a>
					<p>A graceful deer, with its antlers standing tall, pauses amidst a forest backdrop</p>
				</div>
				<div class="prompt">
					<a href="?image=stonehenge.jpg"><h3>stonehenge.jpg</h3></a>
					<p>Stonehenge, an ancient, mystical structure standing proudly on a green landscape</p>
				</div>
				<div class="prompt">
					<a href="?image=turtle.jpg"><h3>turtle.jpg</h3></a>
					<p>A A sea turtle swimming in clear, turquoise water, sun rays shining through the water</p>
				</div>
				<div class="prompt">
					<a href="?image=ricefields.jpg"><h3>ricefields.jpg</h3></a>
					<p>A breathtaking aerial view of rice terraces cascading down a hillside, a winding dirt road through the middle</p>
				</div>
				<div class="prompt">
					<a href="?image=lighthouse.jpg"><h3>lighthouse.jpg</h3></a>
					<p>A stunning scene of a lighthouse perched on a rugged cliff overlooking the turbulent waters below</p>
				</div>
				<div class="prompt">
					<a href="?image=forest.jpg"><h3>forest.jpg</h3></a>
					<p>A serene scene of a dirt road cutting through a dense forest, with sunlight filtering through the lush canopy of trees</p>
				</div>
			</section>
		
	    </div>
	</div>        	
	</body>
</html>
