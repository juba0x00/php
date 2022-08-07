<?php

if(isset($_FILES['image'])){
    $error_fields= array();
    $image_name = $_FILES['image']['name'];
    $image_size =$_FILES['image']['size'];
    $image_tmp =$_FILES['image']['tmp_name'];
    $image_type=$_FILES['image']['type'];
    $tmp = explode('.', $image_name);
    $image_extension = end($tmp);
    $upload_tmp_dir = "/opt/lampp/htdocs/Forms/tmp_file_upload";
  //  $image_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png","gif");
    
    if(in_array($image_extension ,$extensions) === false){
       $error_fields[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($image_size > 2097152){
       $error_fields[] = "File size must be excately 2 MB";
    }
    
    if(empty($error_fields) == true){
       move_uploaded_file($image_tmp,"$upload_tmp_dir/$image_name");
       echo "Success";
    }else{
       print_r($error_fields);
    }
 }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
    <?php
        if(isset($error_fields) && !empty($error_fields)){
            foreach($error_fields as $msg){
                echo $msg . "<br>";
            }
        }
    ?>
        <div>
            <h1>Upload File From Here</h1>
            <input type="file" name="image">
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
</body>
</html>