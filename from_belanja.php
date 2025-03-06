<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container mt-5 ">
    <h2>Form Belanja Online</h2>
    <form method="POST">
        <div class="row">
        <div class="col-md-8">
        <div class="form-group row">
            <label for="nama_customer" class="col-4 col-form-label">Nama Customer</label> 
            <div class="col-8">
                <input id="nama_customer" name="customer" type="text" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Pilih Produk</label> 
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV" required> 
                    <label for="produk_0" class="custom-control-label">TV</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="KULKAS" required> 
                    <label for="produk_1" class="custom-control-label">Kulkas</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="MESIN CUCI" required> 
                    <label for="produk_2" class="custom-control-label">Mesin Cuci</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="barang" class="col-4 col-form-label">Jumlah Barang</label> 
            <div class="col-8">
                <select id="barang" name="jumlah" class="custom-select" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
        <div class="col-md-4">
                <div class="card ">
                <div class="p-3 mb-2 bg-primary text-white">Daftar Harga</div>                    
                <div class="text">
                    <p>TV : 4.200.000</p>
                    <p>Kulkas : 3.100.000</p>
                    <p>Mesin Cuci : 3.800.000</p>
                </div>
                <div class="p-3 mb-2 bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>                       
                </div>
        </div>
        </div>
    </form>
    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $customer = $_POST['customer'];
        $produk = $_POST['produk'];
        $jumlah = $_POST['jumlah'];

        $harga = 0;
        switch ($produk) {
            case 'TV': $harga = 4200000; break;
            case 'KULKAS': $harga = 3100000; break;
            case 'MESIN CUCI': $harga = 3800000; break;
        }

        $total = $harga * $jumlah;

        echo "<h4>Detail Pembelian</h4>";
        echo "Nama Customer: $customer<br>";
        echo "Produk Pilihan: $produk<br>";
        echo "Jumlah Barang: $jumlah<br>";
        echo "Total Belanja: Rp " . number_format($total, 0, ',', '.') . "<br>";
    }
    ?>
</div>

</body>
</html>