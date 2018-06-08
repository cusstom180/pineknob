
<!-- var_dump($jumbotron); -->
<div class="jumbotronbg">
<div class="container">
	<div class="jumbotron mar-top-50 mar-bot-50">
	  <?php 
		foreach ($jumbotron as $index => $value) { ?>
			<<?= $index?>><?= $value?></<?= $index?>>
	<?php } ?>
	  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>
</div>
</div>
