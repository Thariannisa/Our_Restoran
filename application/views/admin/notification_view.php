<div class="container title">
	<h2 class="judul mb-4" id="nama"><u>Recent Order </u></h2>

	<div class="panel">
		<div class="col-9">
			<div class="panel-body no-padding">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Order No.</th>
							<th>Pesanan</th>
							<th>No.Meja</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query->result() as $order) : ?>
							<?php
							$user =	$this->db->get_where('user', ['id' => $order->user_id])->row_array();
							?>
							<tr>
								<td><?= $order->id ?></td>
								<td><?= $user['username'] ?> </td>
								<td> <?= $order->nomor_meja ?></td>
								<td><a href="<?= base_url('admin/konfirmasi') ?>?id=<?= $order->id ?>"><?= $order->status ?></a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
