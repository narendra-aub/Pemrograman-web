<?php
/*
 require_once "app/Person.php";


include "app/Mahasiswa.php";
include "inc/Mahasiswa.php";
include "layouts/Mahasiswa.php";


$app = new App\Mahasiswa;
$inc = new Inc\Mahasiswa;
$layout = new Layout\Mahasiswa;

*/
require_once "app/Mhsw.php";

// Namespace html;
// $mhsw = new Mhsw();
$pinjam = new Pinjam();
$stock = new Stock();
    $rows = $pinjam->tampil();

    // $stockrow = $stock->tampilStock($_GET['id_kaset']);
    // $mahasiswa->delete($nim);
    // $stockrow;
    // if(isset($_GET["id_kaset"])){
    //     // $nim = $mahasiswa->setMhswNim($_GET["nim_mhsw"]);
    //     $stockrow = $stock->tampilStock($_GET['id_kaset']);
    //     // $mahasiswa->delete($nim);
    // }
    

    if(isset($_POST["submit"])){
        $id = $pinjam->setid($_POST["id_pinjam"]);
        $id_kaset = $pinjam->setIdKaset($_POST["id_kaset"]);
        $nama = $pinjam->setnama($_POST["nama_peminjam"]);
        $tanggal = $pinjam->settanggal($_POST["tanggal"]);
        $pinjam->simpan($id,$id_kaset,$nama,$tanggal);
    }    
    if(isset($_GET["id_pinjam"])){
        $id_pinjm = $pinjam->setid($_GET["id_pinjam"]);
        $pinjam->delete($id_pinjm);
    }
    if(isset($_POST["aksi"])){
        $pinjam->update($_POST['id'],$_POST['id_kaset'],$_POST['nama_peminjam'],$_POST['tanggal']);
    }
?>

    <form action="?" method="POST">
        <fieldset>
        <p>
            <label>Id:</label>
            <input type="text" name="id_pinjam" placeholder="id..." />
        </p>
        <p>
            <label>id Kaset:</label>
            <input type="text" name="id_kaset" placeholder="nim..." />
        </p>
        <p>
            <label>Nama:</label>
            <input type="text" name="nama_peminjam" placeholder="nama..." />
        </p>
        <p>
            <label>Alamat:</label>
            <input type="date" name="tanggal" placeholder="alamat..." />
        </p>

        <p>
            <input type="submit" name="submit" value="Save" />
        </p>
        </fieldset>
    

<table >
<tr >
<td>id</td>
<td>id kaset</td>
<td>nama peminjam</td>
<td>nama kaset</td>
<td>genre</td>
<td>tanggal</td>
</tr>

<?php foreach ($rows as $row) { ?>
    <?php $stockr = $stock->tampilStock($row['id_kaset']);  
    foreach ($stockr as $stockrow)
    ?>
<tr>
<td><?php echo $row['id_pinjam']?></td>
<td><?php echo $row['id_kaset']; ?></td>
<td><?php echo $row['nama_peminjam'] ?></td>
<td><?php echo $stockrow['nama_kaset'] ?></td>
<td><?php echo $stockrow['genre']; ?></td>
<td><?php echo $row['tanggal']; ?></td>
<td><a href="inc/edit.php?id_pinjam=<?php echo $row['id_pinjam']; ?>">Edit</a>
<td><a href="index.php?id_pinjam=<?php echo $row['id_pinjam']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>

</form>