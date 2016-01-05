<!DOCTYPE html>
<html>
<head>
	<title>Setup CMS TEST</title>
</head>
<body>
	<div class="container">
		<h1>Hello World</h1>
		<h2>Select Table</h2>
		<form action="<?php echo base_url("setup/submittable");?>" method="post">
			<select name="push_tables[]" multiple>
				<?php
					if(!is_null($cms_tables)) :
						foreach ($cms_tables as $table) :
				?>
					<option value="<?php echo $table;?>"><?php echo $table;?></option>
				<?php
						endforeach;
					endif;
				?>
			</select>
			<input type="submit" value="Submit"/>
		</form>
	</div>
</body>
</html>