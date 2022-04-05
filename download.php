<?php
include ('connection.php');
// include_once('trial.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch file to download from database
    $sql = "SELECT * FROM form WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1)
    {
        $file = mysqli_fetch_assoc($result);
        $filepath = 'upload/' . $file['photo'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('upload/' . $file['photo']));
            ob_clean();
            flush();
            readfile('upload/' . $file['photo']);

            // Now update photo count
            $newCount = $file['photo'] + 1;
            $updateQuery = "UPDATE form SET photo=$newCount WHERE id=$id";
            mysqli_query($conn, $updateQuery);
            exit;
        }
    }

}