<?php
    require_once("../../config/config.php");

    // Cek role
    if (!in_array($_SESSION['role'], ['wtp', 'admin'])) {
        echo "<p style='color: white;'>Akses Dibatasi. Anda tidak memiliki izin yang cukup.</p>";

        // Menambahkan skrip SweetAlert untuk notifikasi yang lebih menarik
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Akses Dibatasi',
                    text: 'Anda tidak memiliki izin yang cukup.',
                }).then(function() {
                    window.location.href = '../boiler/boiler.php';
                });
            </script>
        ";
    }

    require_once("wtp_data.php");
    require_once(SITE_ROOT."/src/header-admin.php");
    require_once(SITE_ROOT."/src/footer-admin.php");
    require_once(SITE_ROOT."/src/koneksi.php");

    // Retrieve Data for Editing
    $edit_query = "SELECT COLUMN_NAME, COLUMN_DEFAULT
                FROM information_schema.columns
                WHERE TABLE_NAME = 'cooling_tower' AND TABLE_SCHEMA = 'rpsl';";

$prepare_edit = $koneksi->prepare($edit_query);
$prepare_edit->execute();

$roData = $prepare_edit->fetchAll(PDO::FETCH_ASSOC);

// Pivot sungaiData Array
$pivotedArray = [];

// loop through each array element
foreach ($roData as $row) {
    // set attname as key and default_value as its value
    $pivotedArray[$row['COLUMN_NAME']] = $row['COLUMN_DEFAULT'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        .custom-black-bg {
            background-color: #2ca143;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Import JS Sweet Alert -->
        <script src="../js/sweetalert2.all.min.js"></script>

        <div class="row">
            <div class="col-md-6 col-sm-12 col">
                <h2 style="display: flex; float: left;">EDIT DATA HARGA CHEMICAL COOLING TOWER</h2>
            </div>
        </div>
        <br>

        <div class="table-responsive-sm table-responsie-md table-responsive-lg">
            <form action="" method="post" id="myForm" enctype="multipart/form-data">

                <!-- Display existing data for editing -->
                <table class="table table-hover table-bordered table-sm">
                    <tr>
                        <td class="custom-black-bg">Harga Corrotion Inhibitor</td>
                        <td><input type="number" name="corrotion" value="<?= $pivotedArray['cost_corrotion_inhibitor'] ?>" class="form-control" width=20% required></td>
                    </tr>
                    <tr>
                        <td class="custom-black-bg">Harga Cooling Water Dispersant</td>
                        <td><input type="number" name="cooling" value="<?= $pivotedArray['cost_cooling_water_dispersant'] ?>" class="form-control" width=20% required></td>
                    </tr>
                    <tr>
                        <td class="custom-black-bg">Harga Oxy-hg</td>
                        <td><input type="number" name="oxy-hg" value="<?= $pivotedArray['cost_oxy_hg'] ?>" class="form-control" width=20% required></td>
                    </tr>
                    <tr>
                        <td class="custom-black-bg">Harga Sulfuric Acid</td>
                        <td><input type="number" name="sulfuric" value="<?= $pivotedArray['cost_sulfuric_acid'] ?>" class="form-control" width=20% required></td>
                    </tr>
                </table>
                <div class="form-group text-center" style="margin-top: 10px;">
                    <button type="submit" name="update" class="btn btn-primary"><i class="fas fa-save"></i> Update Data</button>
                    <a href="cooling_tower" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> CANCEL</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {

        //Sanitize user inputed value
        $corrotion = filter_var($_POST['corrotion'], FILTER_VALIDATE_INT);
        $cooling = filter_var($_POST['cooling'], FILTER_VALIDATE_INT);
        $oxy_hg = filter_var($_POST['oxy-hg'], FILTER_VALIDATE_INT);
        $sulfuric = filter_var($_POST['sulfuric'], FILTER_VALIDATE_INT);

        // Check if the values are valid integers
        if (
            $corrotion === false ||
            $cooling === false||
            $oxy_hg === false ||
            $sulfuric === false
        ) {
            // Handle invalid input
            echo "Invalid input detected.";
            exit;
        }

        // Query
        $query = "ALTER TABLE cooling_tower
                ALTER COLUMN cost_corrotion_inhibitor SET DEFAULT $corrotion,
                ALTER COLUMN cost_cooling_water_dispersant SET DEFAULT $cooling,
                ALTER COLUMN cost_oxy_hg SET DEFAULT $oxy_hg,
                ALTER COLUMN cost_sulfuric_acid SET DEFAULT $sulfuric;";

        try {
             $koneksi->exec($query);

            echo "<script>
                    Swal.fire({
                        title: 'Data Updated!',
                        text: 'Data has been updated successfully.',
                        type: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = 'cooling_tower';
                        }
                    });
                  </script>";
        } catch (PDOException $e) {
            echo "PDO ERROR: " . $e->getMessage();
            
            echo "PDO ERROR: ". $e -> getMessage();
                echo "SQLSTATE: " . $errorInfo[0] . "<br>";
                echo "Code: " . $errorInfo[1] . "<br>";
                echo "Message: " . $errorInfo[2] . "<br>";

                $koneksi -> rollBack();
        }
    }
    ?>
</body>

</html>
