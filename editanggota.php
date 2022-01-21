<?php

include('koneksi.php');

//ambildata di url
$id = $_GET["id"];
//query data siswa berdasarkan id
$ambildata= mysqli_query($konek,"SELECT * FROM anggota WHERE id=$id");
$data=mysqli_fetch_array($ambildata);

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $nis =$_POST['nis'];
    $nama =$_POST['nama'];
    $jk =$_POST['jk'];
    $tmptlhr =$_POST['tmptlhr'];
    $tgllhr =$_POST['tgllhr'];
    $notlpn =$_POST['notlpn'];
    $almt =$_POST['almt'];
    $query= mysqli_query($konek,"UPDATE anggota SET nis='$nis', nama='$nama', jk='$jk', 
    tmptlhr='$tmptlhr',tgllhr='$tgllhr', notlpn='$notlpn', almt='$almt' WHERE id='$id'");
    if($query)
    {
        ?>
    <div class="alert alert-success"><center>
    Data berhasil diubah
    </div>
        <?php
    header('refresh:3;URL=http://localhost/webperpuspweb/admin.php?page=anggota');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-beta2-web/css/all.min.css">
</head>
<body>
    <div class="container">
            <div class="row">
           <div class="col-4"></div>
           <div class="col-4">
            <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <div class="form-group mt-2 ">
                <label for="nis">nis</label><br>
                    <input class="form-control" type="int" name="nis" placeholder="Nomor Induk Siswa" required
                    value="<?php echo $data['nis']?>" autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="nama">nama</label><br>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required
                    value="<?php echo $data['nama']?>" autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="gender">Jenis Kelamin</label><br>
                <select class="form-control" name="jk" required>
                    <option value="<?php echo $data['jk']?>"><?php echo $data['jk']?></option> 
                    <option value="L">Laki-laki</option> 
                    <option value="P">Perempuan</option>  
                    </select>
                </div>
                <div class="form-group mt-2">
                <label for="nama">tmptlhr</label><br>
                    <input class="form-control" type="text" name="tmptlhr" placeholder="tmptlhr" required
                    value="<?php echo $data['tmptlhr']?>" autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="date">Tanggal Lahir</label><br>
                    <input class="form-control" type="date" name="tgllhr" required
                    value="<?php echo $data['tgllhr']?>"autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="notlp">no Telpon</label><br>
                    <input class="form-control" type="text" name="notlpn" placeholder="No Telpon"
                    value="<?php echo $data['notlpn']?>" autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="alamat">Alamat</label><br>
                    <input class="form-control" type="text" name="almt" placeholder="Alamat" required
                    value="<?php echo $data['almt']?>" autocomplete="off">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
        </div>
</div>
<script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>

<?php

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $nis =$_POST['nis'];
    $nama =$_POST['nama'];
    $jk =$_POST['jk'];
    $tmptlhr =$_POST['tmptlhr'];
    $tgllhr =$_POST['tgllhr'];
    $notlpn =$_POST['notlpn'];
    $almt =$_POST['almt'];
    $query= mysqli_query($konek,"UPDATE anggota SET nis='$nis', nama='$nama', jk='$jk', 
    tmptlhr='$tmptlhr',tgllhr='$tgllhr', notlpn='$notlpn', almt='$almt' WHERE id='$id'");
    if($query)
    {
        ?>
    <div class="alert alert-success"><center>
    Data berhasil diubah
    </div>
        <?php
    header('refresh:3;URL=http://localhost/webperpuspweb/admin.php?page=anggota');
    }
}
?>