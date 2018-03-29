
<!-- var_dump($jumbotron); -->


<div class="jumbotron">
  <?php 
	foreach ($jumbotron as $index => $value) { ?>
		<<?= $index?>><?= $value?></<?= $index?>>
<?php } ?>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
