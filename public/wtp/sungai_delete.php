<?php
require_once("../../config/config.php");
require_once(SITE_ROOT . "/src/header-admin.php");
require_once(SITE_ROOT . "/src/footer-admin.php");

// Pastikan parameter maintenance_id telah diterima
if (isset($_GET['sungai_id'])) {
    $hrd_id = $_GET['sungai_id'];

    // Proses penghapusan data berdasarkan ID
    try {
        $delete_query = "DELETE FROM sungai WHERE sungai_id = ?";
        $prepare_delete = $koneksi_wtp->prepare($delete_query);
        $prepare_delete->bindParam(1, $hrd_id, PDO::PARAM_INT);

        if ($prepare_delete->execute()) {
            // Set pesan JavaScript untuk notifikasi
            echo "<script>
                Swal.fire({
                    text: 'Data berhasil dihapus!',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location.href = 'sungai';
                    }
                });
            </script>";
        } else {
            echo "Gagal menghapus data.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Jika parameter maintenance_id tidak diterima, kembali ke halaman utama
    header("Location: sungai");
    exit();
}
?>