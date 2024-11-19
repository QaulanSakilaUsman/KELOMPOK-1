<?php
session_start();
include '../../koneksi/koneksi.php';

$id = $_SESSION['id'];
$nama = mysqli_real_escape_string($db, $_POST['nama_admin']);
$username = mysqli_real_escape_string($db, $_POST['username_admin']);
$password = mysqli_real_escape_string($db, sha1($_POST['password']));
$gambar = $_FILES['gambar']['name'];

$sql = "SELECT * FROM tb_admin WHERE id_admin = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);
mysqli_stmt_close($stmt);

if ($gambar == '') {
    // ... (existing code for updating without image)
} else {
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];

    if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") && ($ukuran_file <= 2100000)) {
        // Generate a unique filename to avoid overwriting
        $ext_file = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_baru = uniqid() . '.' . $ext_file;
        $path = "../images/" . $nama_baru;

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $path)) {
            // Delete the old image if it exists
            if (file_exists("../images/" . $data['gambar'])) {
                unlink("../images/" . $data['gambar']);
            }

            $sql = "UPDATE tb_admin SET nama_admin = ?, username_admin = ?, password = ?, gambar = ? WHERE id_admin = ?";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "sssss", $nama, $username, $password, $nama_baru, $id);
            mysqli_stmt_execute($stmt);

            // ... (rest of the code for successful update)
			echo "<Center><h2><br>Data anda telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../profile.php'>";
        } else {
            // Handle file upload failure
            echo "<Center><h2><br>Error uploading image. Please try again.</h2></center>";
            // Redirect back to the edit profile page
        }
    } else {
        // ... (existing code for invalid image format or size)
    }
}