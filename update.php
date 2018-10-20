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


<?php 

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
 
    // query update data
    $query = "UPDATE anggota SET nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin' WHERE id = $id";
    if(mysqli_query($konek, $query)){
        header("Location: index.php");
    }else{
        echo "Edit Data Gagal";
    }
}

?>