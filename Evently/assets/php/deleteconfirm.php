<?php
session_start();
if (!isset($_SESSION['naam'])) {
    header("Location: ../../index.html");
}
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <title>deleteco</title>
</head>

<body>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/model.js"></script>
    <script>
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success',
                    document.location.href = "../php/delete.php?id=<?php echo $id ?>"
                )
            } else {
                document.location.href = "../php/dashboard.php"
            }
        })
    </script>
</body>

</html>