<?php
include "koneksiDB.php";
$query = mysqli_query($koneksi,"SELECT * FROM mahasiswa ORDER BY nim DESC ");
?>
<form action="" method="post">
    <table border="1"  width="45%">
        <tr>
            <th> no </th>
            <th>nama</th>
            <th>nim</th>
            <th> Aksi </th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data["nama"];?></td>
            <td><?php echo $data["nim"];?></td>

            <td>
                <a href="hapus.php?id=<?php echo $row['id']; ?>">Delete</a> |
                <a href="#">Update</a>
            </td>
        </tr>

        <?php $no++; } ?>
        <?php } ?>
    </table>
    <a href="inputMahasiswaBaru.php"> Tambah mahasiswa </a>
</form>

<?php 
require_once'koneksiDB.php';
?>

<form method="post">
<input type="text" name="cari" placeholder="cari ...">
<input type="submit" name="submit" value="cari">
<form>
<br/>
<br/>

<table border=1>
<tr> <td>Nama</td>
<td>NIM</td> </tr>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM mahasiswa";
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){

?>
<tr>
 <td><?php echo $row['nama']; ?></td>
 <td><?php echo $row['nim']; ?></td>
</tr>

<?php } } ?>

<?php if (ISSET($_POST['submit'])){
 $cari = $_POST['cari'];
 $query2 = "SELECT * FROM mahasiswa WHERE nim LIKE '%$cari%'";
 
 $sql = mysqli_query($koneksi, $query2);
 while ($r = mysqli_fetch_array($sql)){
  ?>
<tr>
 <td><?php echo $r['nama']; ?></td>
 <td><?php echo $r['nim']; ?></td>
</tr>  
 <?php }} ?>

</table>