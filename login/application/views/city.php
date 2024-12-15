<?php
	foreach ($product as  $cat) {?>
			<option value="<?php echo $cat['ctid']?>">
				<?php echo $cat['cityname']?>
			</option>
<?php	}
?>