<div class="container">
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width: 50%">Product</th>
				<th style="width: 10%">Price</th>
				<th style="width: 8%">Quantity</th>
				<th style="width: 22%" class="text-center">Subtotal</th>
				<th style="width: 10%"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs">
							<img src="http://placehold.it/100x100" alt="..."
								class="img-responsive" />
						</div>
						<div class="col-sm-10">
							<h4 class="nomargin"><?= $description['name']?></h4>
							<p><?= $description['description']?></p>
						</div>
					</div>
				</td>
				<td id="price" data-price="<?= $description['price']?>"><?= $description['price']?>.00</td>
				<td data-th="Quantity"><input type="number"
					class="form-control text-center" min="0" value="1"></td>
				<td id="subtotal" data-th="Subtotal" class="text-center"></td>
				<td class="actions" data-th="">
					<button class="btn btn-info btn-sm">
						<i class="fa fa-refresh"></i>
					</button>
					<button class="btn btn-danger btn-sm">
						<i class="fa fa-trash-o"></i>
					</button>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="total text-center"><strong><?= $description['price']?>.00 </strong></td>
			</tr>
			<tr>
				<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i>
						Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
					<td class="hidden-xs text-center"><strong>Total</strong></td>
					<td class="total hidden-xs text-center"><?= $description['price']?>.00</td>
				<td><button type="button" class="btn btn-primary btn-lg"
						data-toggle="modal" data-target="#myModal">Launch demo modal</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">Modal title</h4>
								</div>
								<div class="modal-body">time to pay</div>
								<div class="modal-footer">
									<form>
										<input type="hidden" name="success" value="0">
										<button type="submit" class="btn btn-default" data-dismiss="modal">cancel</button>
									</form>
									<form action="<?= base_url('call/cashout');?>">
										<input type="hidden" name="pay" value="1">
										<input type="hidden" name="success" value="1">
										<button type="submit" class="btn primary">pay</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<script>
	var price = $('#price').attr('data-price');
	var quantity = $('input[type="number"]').val();
	var subtotal = price * quantity;
	var subtotalF = subtotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	var total = price;
	console.log(quantity, subtotal);

	$('#subtotal').text(subtotalF);

	$('input[type="number"]').bind('keyup input', function() {
		var price = $('#price').attr('data-price');
		var quantity = $('input[type="number"]').val();
		var subtotal = price * quantity;
		var subtotalF = subtotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		var total = $('.total').val(subtotal);
		$('#subtotal').text(subtotalF);
		total.text(subtotalF);
	});

</script>