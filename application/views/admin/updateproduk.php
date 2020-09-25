<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- untuk ngirim bukan cuma data text tapi file uga -->
            <?php echo form_open_multipart('admin/update'); ?>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $produk['nama']; ?>" name="nama" class="form-control" id="nama" placeholder="">
                </div>
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                <div class="col-sm-10">
                    <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Produk">
                </div>
                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/assets/images/' . $produk['gambar']); ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="gambar" id="file" class="custom-file-input">
                                <label for="file" class="custom-file-label">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group justify-content-end row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>