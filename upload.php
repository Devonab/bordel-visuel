<?php 

require 'class.upload.php';


if(count($_POST)>0) {
    
    $allowedext =  array('gif','png' ,'jpg', 'jpeg');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$allowedext) ) {
        $errors = 'Only Gif, PNG, JPG & JPEG are allowed.';
        require 'index.php';
    }
    
    $image = new Upload($_FILES['image']);
        
        if($image->uploaded) {
            $image->png_compression = 9;
            $image->jpeg_quality = 75; 
            $image->file_max_size = '512000'; // 500KB
            $image->process('./fichiers');
            
            if($image->processed) {
                
                header('location: index.php');
                exit;
            } 
            $errors = $image->error;
            require_once 'index.php';

            
        } 
        
    
} else {
    die('you have nothing to do here...');
}


?>