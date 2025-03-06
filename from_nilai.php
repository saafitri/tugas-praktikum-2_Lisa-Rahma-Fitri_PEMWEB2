<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From nilai mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h3>Form Nilai mahasiswa</h3>
    <hr>
    <?php
        $ar_matkul =[
            "DDP"=>"Dasar-dasar Pemrograman",
            "WEB1"=>"Pemrograman web 1",
            "WEB2"=>"Pemrograman web 2",
            "SB"=>"Statistika dan Probabilitas",
            "BD"=>"Basis Data",
            "AI"=>"Kecerdasan Buatan",
            "JK"=>"Jaringan Komputer",
            "UI/UX"=>"UI/UX",
        ]
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="form-group row">
            <label for="" class="col-4 col-form-label">Nama Lengkap</label> 
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div> 
                    <input id="nama" name="nama" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">NIM Mahasiswa</label> 
            <div class="col-8">
                <input id="nim" name="nim" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-4 col-form-label">Mata Kuliah</label> 
            <div class="col-8">
                <select id="matkul" name="matkul" class="custom-select">
                    <option value="matkul">-- Pilih Mata Kuliah --</option>
                    <?php
                        foreach($ar_matkul as $kode=>$nama) {
                            echo "<option value='$kode'>$nama</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-4 col-form-label">Program Studi</label> 
            <div class="col-8">
                <select id="prodi" name="prodi" class="custom-select">
                    <option value="prodi">-- Pilih Program Studi --</option>
                    <option value="SI">Sistem Informasi</option>
                    <option value="TI">Teknik Informatika</option>
                    <option value="BD">Bisnis Digital</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Nilai UTS</label> 
            <div class="col-8">
                <input id= "uts" name="uts" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">Nilai UAS</label> 
            <div class="col-8">
                <input id="uas" name="uas" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">Nilai Tugas/Praktikum</label> 
            <div class="col-8">
                <input id="tugas" name="tugas" type="text" class="form-control">
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>   
</form>
<hr>

Hasil input Data nilai Mahasiswa : <br><br>

    <?php
        if (isset($_POST ['submit'])) {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $matkul = $_POST["matkul"];
        $nilai_uts = $_POST["uts"];
        $nilai_uas = $_POST["uas"];
        $nilai_tugas = $_POST["tugas"];
        $rata_rata = ($nilai_uts * 0.3)+($nilai_uas * 0.3)+($nilai_tugas * 0.4);
        $keterangan = keterangan ($rata_rata);
        $grade = grade ($rata_rata);

        echo "Nama Mahasiswa : $nama <br>";
        echo "NIM Mahasiswa : $nim <br>";
        echo "Mata Kuliah : $matkul <br>";
        echo "Nilai UTS : $nilai_uts <br>";
        echo "Nilai UAS : $nilai_uas <br>";
        echo "Nilai Tugas/praktikum : $nilai_tugas <br>";
        echo "Rata-rata nilai : $rata_rata <br>";
        echo "Keterangan : $keterangan";
        echo "Grade : $grade";

        }

        // menentukan keterangan lulus dan tidak lulus 
        function keterangan ($rata_rata) {
            if ($rata_rata >= 80) {
                return "Lulus";
            }
            else {
                return "Tidak Lulus";
            }
        }

        // Menentukan grade
        function grade($rata_rata) {
          if ($rata_rata >= 85 && $rata_rata <= 100) {
              return "A (sangat baik)";
          } elseif ($rata_rata >= 60 && $rata_rata < 85) {
              return "B (baik)";
          } elseif ($rata_rata >= 40 && $rata_rata < 60) {
              return "C (cukup)";
          } elseif ($rata_rata >= 20 && $rata_rata < 40) {
              return "D (kurang)";
          } elseif ($rata_rata >= 0 && $rata_rata < 20) {
              return "E (sangat kurang)";
          } else {
              return "Tidak Lulus";
          }
      }
  ?>
  
</body>
</html>