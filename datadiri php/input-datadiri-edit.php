<?php
if(isset($_GET["nis"])){
    $nis = $_GET["nis"];
    $check_nis = "SELECT * FROM datadiri WHERE nis = '$nis'";
    include('./input-config.php');
    $query = mysqli_query($mysqli, $check_nis);
    $row = mysqli_fetch_array($query);
 
}


?>
<h1>Edit Data</h1>
<form action="input-datadiri-edit.php" method="POST">
    <label for="nis">Nomor Induk Siswa :</label>
    <input type="number" value="<?php echo $row["nis"]; ?>" name="nis" placeholder="Ex. 12003102" readonly/><br>

    <label for="nis">Nama Lengkap :</label>
    <input type="text" value="<?php echo $row["namalengkap"]; ?>" name="nama" placeholder="Ex. Agung Aryanto"/><br>

    <label for="tanggal_lahir">Tanggal Lahir :</label>
    <input type="date" value="<?php echo $row["tanggal_lahir"]; ?>" name="tanggal_lahir"/><br>

    <label for="nilai">Nilai :</label>
    <input type="number" value="<?php echo $row["nilai"]; ?>" name="nilai"/><br>

    <input type="submit" name="edit" value="edit data" />
    <a href="input-datadiri.php">Kembali</a>
</form>

<?php

include('./input-config.php');
if ($_SESSION["login"] != TRUE){
    header('location:login.php');

}


if(isset($_POST['edit'])){
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nilai = $_POST["nilai"];

    $query = "
    UPDATE datadiri SET namalengkap = '$nama',
    tanggal_lahir = '$tanggal_lahir',
    nilai = '$nilai'
    WHERE nis = '$nis';
    ";

    
    $update = mysqli_query($mysqli, $query);

    if($update){
        echo "
        <script>
        alert('Data Berhasil Diperbaharui');
        window.location='input-datadiri.php?nis=$nis';
        </script>
        
        ";
    } else{
        echo "
        <script>
        alert('Data Gagal Diperbaharui');
        window.location='input-datadiri-edit.php?nis=$nis';
        </script>
        
        ";
    }
}


?>