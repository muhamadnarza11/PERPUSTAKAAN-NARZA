<?php
if(isset($_GET['delete']))
{
    $id=$_GET['id'];
    $query= mysqli_query($konek,"DELETE FROM anggota WHERE id='$id'");
    ?>
    <div class="alert alert-danger"><center>
    Data berhasil dihapus
    </div>
        <?php
    header('refresh:3;URL=http://localhost/webperpuspweb/admin.php?page=anggota');

}


if(isset($_POST['save'])){

    $id = $_POST['id'];
    $nis =$_POST['nis'];
    $nama =$_POST['nama'];
    $jk =$_POST['jk'];
    $tmptlhr =$_POST['tmptlhr'];
    $tgllhr =$_POST['tgllhr'];
    $notlpn =$_POST['notlpn'];
    $almt =$_POST['almt'];
    $kelas=$_POST['kelas'];
    $jurusan=$_POST['jurusan'];
    $query_insert = mysqli_query($konek,"INSERT INTO anggota
    VALUES('','$nis','$nama','$jk','$tmptlhr','$tgllhr','$notlpn','$almt',' $kelas','$jurusan')");
    if($query_insert)
    {
        ?>
    <div class="alert alert-success"><center>
    Data berhasil disimpan
    </div>
        <?php
    header('refresh:3;URL=http://localhost/webperpuspweb/admin.php?page=anggota');
    }
}
?>
<?php
if($_SESSION['jabatan']=='petugas'){
?>
<h2 class="mt-4 mb-3"><center>ANGGOTA PERPUSTAKAAN</center></h2>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#tambahdata">
  Tambah Data
</button>
<table class="table table-striped">
<tr>
    <th>No</th>
    <th>nis</th>
    <th>nama</th>
    <th>jk</th>
    <th>tmptlhr</th>
    <th>tgllhr</th>
    <th>notlpn</th>
    <th>almt</th>
    <th>kelas</th>
    <th>jurusan</th>
    <th>Action</th>
</tr>
<?php
    $query= mysqli_query($konek,"SELECT * FROM anggota");
    $no=1;
    foreach ($query as $row) {
?>
<tr>
    <td><?php echo $no;?></td>

    <td><?php echo $row ['nis'];?></td>
    <td><?php echo $row ['nama'];?></td>
    <td>
        <?php echo $row ['jk']=='L'?'Laki-laki' : 'Perempuan'; ?>
    </td>
    <td><?php echo $row ['tmptlhr'];?></td>
    <td><?php echo $row ['tgllhr'];?></td>
    <td><?php echo $row ['notlpn'];?></td>
    <td><?php echo $row ['almt'];?></td>
    <td>
    <?php 
    $idkelas = $row['idkelas'];
    $querykelas = mysqli_query($konek, "SELECT * FROM kelas WHERE idkelas = '$idkelas'");
    ?>
    </td>
    <td><?php echo $row ['jurusan'];?></td>
    <td>
        <a href="?page=anggota&delete=&id=<?php echo $row['id'];?>">
        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>        
        </a>
        <a href="editanggota.php?page=anggota&edit=&id=<?php echo $row['id'];?>">
        <button class="btn btn-warning"><i class="fas fa-edit"></i></i></button>
        </a>
    </td>
</tr>
<?php
$no++;
}
?>

</table>

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahdataLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']?>">
                <div class="form-group mt-2 ">
                <label for="nis">nis</label><br>
                    <input class="form-control" type="int" name="nis" placeholder="Nomor Induk Siswa" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="nama">nama</label><br>
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="gender">Jenis Kelamin</label><br>
                <select class="form-control" name="jk" required>
                    <option value="">Pilih Jenis Kelamin</option> 
                    <option value="L">Laki-laki</option> 
                    <option value="P">Perempuan</option>  
                    </select>
                </div>
                <div class="form-group mt-2">
                <label for="nama">tmptlhr</label><br>
                    <input class="form-control" type="text" name="tmptlhr" placeholder="tmptlhr" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="date">Tanggal Lahir</label><br>
                    <input class="form-control" type="date" name="tgllhr" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="no_tlp">no Telpon</label><br>
                    <input class="form-control" type="id" name="notlpn" placeholder="No Telpon"
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="alamat">Alamat</label><br>
                    <input class="form-control" type="text" name="almt" placeholder="Alamat" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="kelas">kelas</label><br>
                    <input class="form-control" type="text" name="kelas" placeholder="kelas anda" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="jurusan">jurusan</label><br>
                    <input class="form-control" type="text" name="jurusan" placeholder="jurusan anda" required
                    autocomplete="off">
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
<?php
}
?>