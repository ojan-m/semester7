<!-- jika ada tombol kirim -->
<?php
$tgl_mulai="-";
$tgl_selesai="-";
$semuadata=array();
$status = "";
if (isset($_POST["kirim"])) {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST['tgls'];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan LEFT JOIN pembayaran py ON pm.id_pembelian=py.id_pembelian WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
    while($pecah = $ambil->fetch_assoc()) {
        $semuadata[]=$pecah;
    }

    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}
?>

<h2>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
    <div class="row">
        <div class="col-md-4">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
        </div>
        <div class="col-md-4">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
        </div>
        <div class="col-md-4">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">Pilih Status</option>
                <option value="barang dikirim"<?php echo $status=="barang dikirim"?"selected":""; ?>>Barang dikirim</option>
                <option value="sudah kirim pembayaran" <?php echo $status=="sudah kirim pembayaran"?"selected":""; ?> >Sudah kirim pembayaran</option>
                <option value="pending" <?php echo $status=="pending"?"selected":""; ?> >Pending</option>
                <option value="barang sampai" <?php echo $status=="barang sampai"?"selected":""; ?> >Barang sampai</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat Laporan</button>
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Bank</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $total=0; ?>
            <?php foreach ($semuadata as $key => $value): ?>
            <?php $total += $value["total_pembelian"]; ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["nama_pelanggan"] ?></td>
                <td><?php echo date("d F Y",strtotime($value["tanggal_pembelian"])) ?></td>
                <td><?php echo !empty($value["bank"]) ? $value["bank"] : "-"; ?></td>
                <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
                <td><?php echo $value["status_pembelian"] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th>Rp. <?php echo number_format($total) ?></th>
            </tr>
        </tfoot>
    </table>
</div>