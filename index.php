<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pictures wall</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section>

    <h1>Pictures Wall</h1>
    <form method="post" action="upload.php" enctype="multipart/form-data" id="uploadform">
       <fieldset>
           <ol>
               <li>
                  <label for="fichier">Choose your picture <small>(only JPG, JPEG, Gif &amp; PNG)</small></label>
                   <input type="file" name="image" id="image">
                   <div id="error"><?php echo $errors; ?></div>
                </li>
               <li>
                   <input type="submit" name="submit" value="let's go !">
               </li>
           </ol>
       </fieldset>

    </form>

</section>

<div>
<?php 
$width= 4;
$height= 4;
$dossier = 'fichiers';
$files = scandir('./'.$dossier);

echo "<ul>";
foreach( $files as $file ){
    
    
    if($file != '.' && $file != '..' && $file != '.DS_Store' ) {
        
        echo "<li><a href='fichiers/".$file."' target='_blank'><img class='image' src='fichiers/".$file."' width='".$width."' height='".$height."'></a></li>";
    }
    
}
echo "</ul>";


?>
</div>
