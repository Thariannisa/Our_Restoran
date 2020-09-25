<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- untuk ngirim bukan cuma data text tapi file uga -->
            <?php echo form_open_multipart('admin/edit'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" value="<?= $user['email']; ?>" readonly name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/' . $user['image']); ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
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
                    <button type="submit" class="btn btn-primary">
                        Edit
                    </button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>