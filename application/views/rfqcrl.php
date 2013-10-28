<body>
	
	<h1><?php echo $title; ?></h1>
	
	<ul>
		<?php foreach ($act as $ai) { ?>
		<li>
		<a href='<?php echo site_url($ai['url']); ?>'><?php echo $ai['title']; ?></a>
		</li>
		
		<?php } ?>
	</ul>
	
	<?php 
	  echo '<p><a href="' . site_url('productcrl') . '">Back to Productcrl</a></p>';
	?>
</body>