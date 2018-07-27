<?php if (!isset($_SESSION['login'])) { include_once 'admin/subviews/login.php'; } 
	else { ?>
<?php if (!isset($_SESSION['error_msg'])) {?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class=table>
				<caption>Optional table caption.</caption>
				<thead>
					<tr>
						<th>day</th>
						<th>time</th>
						<th>sport</th>
						<th>lesson type</th>
						<th>age</th>
						<th>employee</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>05/28/2018</th>
						<td>11:00 am</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<th>05/28/201</th>
						<td>12:00 pm</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<th>05/28/201</th>
						<td>1:00 pm</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php } ?>
<?php include_once 'add_user.php';?>
<?php } ?>
<?php include_once 'add_user.php';?>
<?php include 'calender.php';?>