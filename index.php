<?php
if (isset($_GET['network_name'])) {
    
    $networkname = trim(strip_tags($_GET['network_name']));
    $userip = trim(strip_tags($_GET['user_ip']));
    $fileContent = trim($_GET['file_content']);
    if (empty($networkname) || empty($userip)) {
        die('اسم المجلد واسم الملف لا يمكن أن يكونا فارغين.');
    } 

    $networkname = preg_replace('/[^a-zA-Z0-9_\-]/', '', $networkname);
    $userip = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $userip);

    $directoryPath = 'network/' . $networkname;


    if (!is_dir($directoryPath)) {
        if (!mkdir($directoryPath, 0777, true)) {
            die('فشل إنشاء المجلد.');
        }
    }
    
    $filePath = $directoryPath . '/' . $userip . ".txt";

    if (file_put_contents($filePath , $fileContent) === false) {
        die('فشل في حفظ المحتوى في الملف.');
    }

    echo 'تم حفظ المحتوى في الملف بنجاح.';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $networkname = trim(strip_tags($_POST['network_name']));
    $userip = trim(strip_tags($_POST['user_ip']));
    $fileContent = trim($_POST['file_content']);

    if (empty($networkname) || empty($userip)) {
        die('اسم المجلد واسم الملف لا يمكن أن يكونا فارغين.');
    }

    $networkname = preg_replace('/[^a-zA-Z0-9_\-]/', '', $networkname);
    $userip = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $userip);

    $directoryPath = 'network/' . $networkname;


    if (!is_dir($directoryPath)) {
        if (!mkdir($directoryPath, 0777, true)) {
            die('فشل إنشاء المجلد.');
        }
    }
    
    $filePath = $directoryPath . '/' . $userip;

    if (file_put_contents($filePath, $fileContent) === false) {
        die('فشل في حفظ المحتوى في الملف.');
    }

    echo 'تم حفظ المحتوى في الملف بنجاح.';
}
