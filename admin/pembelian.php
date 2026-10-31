<h2>Halaman Pembelian</h2>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status Pembelian</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ ?>
            <tr>
                <th><?php echo $nomor; ?></th>
                <th><?php echo $pecah['nama_pelanggan']; ?></th>
                <th><?php echo $pecah['tanggal_pembelian']; ?></th>
                <th><?php echo $pecah['status_pembelian']; ?></th>
                <th><?php echo $pecah['total_pembelian']; ?></th>
                <th>
                    <a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">detail</a>

                    <?php if ($pecah['status_pembelian']=="sudah kirim pembayaran"): ?>
                        <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success">Pembayaran</a>
                    <?php endif ?>
                </th>
            </tr>
            <?php $nomor++; ?>
            <?php }?>
        </tbody>
    </table>
</div>