<?php
	foreach ($product as  $cat) {?>
			<option value="<?php echo $cat['stateid']?>"><?php echo $cat['state']?></option>
<?php	}
?>