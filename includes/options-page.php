<div class="wrap">
	<h2>Facebook Share Button</h2>
	
	<?php if($_POST['fb-share-form-submitted'] == "Y") : ?>	
	<div class="updated"> <p> saved... </p> </div>
	<?php endif; ?>
	
	<form action="" method="post">
		<input type="hidden" name="fb-share-form-submitted" value="Y" />
		
		<table class="form-table">
			<tr>
				<th> <label for="fb-app-id"> Facebook Application Id </th>
				<td> <input type="text" name="fb-app-id" id="fb-app-id" value="<?php echo trim($appid); ?>" /> </td>
			</tr>
			
			<tr>
				<td> <input type="submit" value="save" class="button-primary" /> </td>
			</tr>
			
		</table>
		
	
	</form>
			
</div>