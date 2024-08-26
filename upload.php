 <?php


if(isset($_POST['submit'])){
    $destinationUpload = 'uploads/';
    if($_FILES['file']['error'] === UPLOAD_ERR_OK) {
      $tmp_name = $_FILES['file']['tmp_name'];
      $name = basename($_FILES['file']['name']);
      $typesAutorises = array('image/jpeg', 'image/png');
      $type= $_FILES['file']['type'];
      if(!in_array($type, $typesAutorises)){
        die('Erreur : Seuls les fichiers JPEG , PNG sont autorisés.');
      }
      $nomUnique = time().'_'.mt_rand();
      
      if(move_uploaded_file($tmp_name, $destinationUpload.$nomUnique)) {
        echo 'Le fichier a été téléchargé.';
      } else {
        die('Erreur lors du téléchargement du fichier.') ;
      }
    } else {
      die('Une erreur est survenue lors du téléchargement du fichier.') ;
    }
  }
  ?>
  

</body>
</html>