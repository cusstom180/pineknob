<div class="container">
	<?php foreach ($products as $value) : ?>
	<div class="col-md-3">
		<form method="post" action="<?= base_url('front/thunderbolt') . "?action=add&id=" . $value['id'] ?>">
			<div class="product">
				<img src="<?= base_url('public_html/images/') . $value['image']?>" class="img-responsive"/>
				<h4 class="text-info"><?= $value['name']?></h4>
				<h4 class="text-info">$ <?= $value['price']?></h4>
				<input type="text" name="quantity" class="form-control" value="1"/>
				<input type="hidden" name="name" value="<?= $value['name']?>"/>
				<input type="hidden" name="price" value="<?= $value['price']?>"/>
				<input type"submit" name="add_to_cart" class="btn btn-info" value="add to Cart">
			</div>
		</form>
	</div>
	<?php endforeach; ?>
</div>
