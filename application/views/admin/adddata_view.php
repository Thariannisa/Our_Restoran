<!-- Begin Page Content -->
<div class="container-fluid">
	<h2 class="judul mb-4 title" id="nama"><u>Add DATA </u></h2>
	<div class="row">
		<div class="col-lg-8">
			<?php echo form_open_multipart('admin/add_data'); ?>

			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Nama Menu</label>
				<div class="col-sm-10">
					<input type="text" name="menu" value="<?= set_value('harga') ?>" class="form-control" id="email" placeholder="Nama Menu">
					<?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Harga Menu</label>
				<div class="col-sm-10">
					<input type="number" value="<?= set_value('harga') ?>" name="harga" class="form-control" id="name" placeholder="Harga Menu">
					<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">Picture</div>
				<div class="col-sm-10">
					<div class="row">
						<div class="col-sm">
							<div class="custom-file">
								<input type="file" name="image" id="file" class="custom-file-input">
								<label for="file" class="custom-file-label">Choose File</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group justify-content-end row">
				<div class="col-sm-10">
					<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#save">
						<span>Save</span>
					</a>

				</div>
			</div>
			<!-- pop up-->
			<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Ready to save?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Select "Save" below if you are ready to confirm your data</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">
								save
							</button>
						</div>
					</div>
				</div>
			</div>
			</form>

		</div>
	</div>
</div>
<!-- End of Page Content -->