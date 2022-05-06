<?php
    if(!empty(isset($_GET['file']))){
        $fileName = basename($_GET['file']);
        $filePath = "admin/files/".$fileName;

        if(!empty($fileName) && file_exists($filePath)){
            header('Cache-Control: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename="'.$fileName.'"');
            header('Content-Type: application/zip');
            header('Content-Transfer-Encoding: binary');

            readfile($filePath);
            include 'dbConnect.php';
            $sql = "insert into downloads (filename) values ('$fileName')";
            $result = mysqli_query($conn, $sql);
            exit;
        }
    }
    else{
        echo "File does not exists!!";
    }
?>