<?php
if(isset($_GET['delete']))
{
    $isbn=$_GET['isbn'];
    $query= mysqli_query($konek,"DELETE FROM buku WHERE isbn='$isbn'");
    ?>
    <div class="alert alert-danger"><center>
    Data berhasil dihapus
    </div>
        <?php
    header('refresh:3;URL=http://localhost/18_mywebsite_12rpl1/admin.php?page=buku');
    ?>
    <?php

}

if(isset($_POST['save'])){

    $isbn =$_POST['isbn'];
    $judul =$_POST['judul'];
    $pengarang =$_POST['pengarang'];
    $penerbit =$_POST['penerbit'];
    $tahun =$_POST['tahun'];
    $harga =$_POST['harga'];
    $query_insert = mysqli_query($konek,"INSERT INTO buku
    VALUES('$isbn','$judul','$pengarang','$penerbit','$tahun','$harga')");
    if($query_insert)
    {
        ?>
    <div class="alert alert-success"><center>
    Data berhasil disimpan
    </div>
        <?php
    header('refresh:3;URL=http://localhost/18_mywebsite_12rpl1/admin.php?page=buku');
    }
}
?>
<h1 class="mt-4 mb-3"><center>DATA BUKU</center></h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#tambahdata">
  Tambah Data Buku
</button>
<table class="table table-striped">
<tr>
    <th>No</th>
    <th>ISBN</th>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Harga</th>
    <th>Action</th>
</tr>
<?php
    $query= mysqli_query($konek,"SELECT * FROM buku");
    $no=1;
    foreach ($query as $row) {
?>
<tr>
    <td><?php echo $no;?></td>
    <td><?php echo $row ['isbn'];?></td>
    <td><?php echo $row ['judul'];?></td>
    <td><?php echo $row ['pengarang'];?></td>
    <td><?php echo $row ['penerbit'];?></td>
    <td><?php echo $row ['tahun'];?></td>
    <td><?php echo $row ['harga'];?></td>
    <td>
        <a href="?page=buku&delete=&isbn=<?php echo $row['isbn'];?>">
        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>        
        </a>
        <a href="editbuku.php?page=buku&edit=&isbn=<?php echo $row['isbn'];?>">
        <button class="btn btn-warning"><i class="fas fa-pen-square"></i></button>
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
            <h5 class="modal-title" id="tambahdataLabel">Form Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
            <div class="form-group mt-2 ">
                <label for="isbn">ISBN</label><br>
                    <input class="form-control" type="text" name="isbn" placeholder="Masukan isbn anda" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2 ">
                <label for="judul">JUDUL</label><br>
                    <input class="form-control" type="text" name="judul" placeholder="Nomor judul" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2 ">
                <label for="pengarang">pengarang</label><br>
                    <input class="form-control" type="text" name="pengarang" placeholder="Nama pengarang" required
                    autocomplete="off">
                </div>
                <div class="form-group mt-2">
                <label for="penerbit">penerbit</label><br>
                    <select class="form-control" name="penerbit" required>
                    <option value="">Pilih penerbit</option> 
                    <option value="erlangga">erlangga</option> 
                    <option value="grafindo">grafindo</option> 
                    <option value="permata">permata</option>
                    <option value="yudistira">yudistira</option> 
                    </select>
                </div>
                <div class="form-group mt-2">
                <label for="tahun">tahun</label><br>
                    <select class="form-control" name="tahun" required>
                    <option value="tahun">Pilih tahun</option> 
                    <option value="2000">2000</option> 
                    <option value="2001">2001</option>
                    <option value="2002">2002</option> 
                    <option value="2003">2003</option> 
                    <option value="2004">2004</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                <label for="harga">harga</label><br>
                    <input class="form-control" type="harga" name="harga" required
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
