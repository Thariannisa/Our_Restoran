<div class="container title">
  <?= $this->session->flashdata('message'); ?>
  <h2 class="judul mb-4" id="nama"><u>Daftar Menu </u></h2>

  <div class="col-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Menu</th>
          <th scope="col">Harga</th>
          <th scope="col">Gambar</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($produk->result() as $item) :
          ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $item->nama ?></td>
            <td>Rp. <?= $item->harga / 1000 ?>.000</td>
            <td><img src="<?= base_url('assets/assets/images/' . $item->gambar) ?>" alt="" width="100px" height="100px"></td>
            <td>
              <a href=" <?= base_url('admin/delete') ?>?id=<?= $item->id ?>">
                <i class="fas fa-trash"></i>
              </a>
              ||
              <a href=" <?= base_url('admin/update') ?>?id=<?= $item->id ?>">
                <i class="fas fa-edit"></i></td>
            </a>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>