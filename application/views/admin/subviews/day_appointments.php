<div class="row">
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>appt ID</th>
					<th>client first</th>
					<th>client last</th>
					<th>sport</th>
					<th>skill level</th>
					<th>age</th>
					<th>instructor first</th>
					<th>instructor last</th>
					<th>date</th></tr>
				</thead>
				<tbody>
				<?php if ($appt) {
					foreach ($appt as $array) { ?>
						<tr>
						<?php foreach ($array as $key => $value) { ?>
							<?php if ($key === 'appt_id') { ?>
								<td><a href="<?= base_url("admin/dayview?id=$value")?>"><?= $value?></a></td>
							<?php } else { ?>
							<td><?= $value?></td>
							<?php } ?>
						<?php } ?>
						</tr>
					<?php } ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
