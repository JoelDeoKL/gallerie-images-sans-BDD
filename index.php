<!-- Système d'upload d'image sans utiliser une base de données -->
<!-- Bootstrap 4 -- PHP -->

<!-- upload.php se charge recuperer les images sur le serveur et le copie à la racine
du projet. -->

<!-- Par JoelDeoKL -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <br>
            <form enctype="multipart/form-data" action="upload.php" method="post">
            <br>
                <div class="form-control">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                    <input type="file" name="img" id="img">
                    <input type="submit" value="uploader">
                </div>
            </form>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
                                           
            <?php
            //nom du répertoire contenant les images à afficher 
            $nom_repertoire = './';

            //ouvre le repertoire
            $pointeur = opendir($nom_repertoire); 
            $i = 0; 

            //stocke les noms de fichiers images dans un tableau
            while ($fichier = readdir($pointeur)) {
            if (substr($fichier, -3) == "gif" ||
                substr($fichier, -3) == "jpg" ||
                substr($fichier, -3) == "png" ||
                substr($fichier, -4) == "jpeg" ||
                substr($fichier, -3) == "PNG" ||
                substr($fichier, -3) == "GIF" ||
                substr($fichier, -3) == "JPG")
                { 
                $tab_image[$i] = $fichier;
                $i++;
                }       
            } 
                
            //on ferme le répertoire 
            closedir($pointeur); 

            //affichage des images (en 200 * 140 ici)
            for ($j=0;$j<=$i-1;$j++) 
            { 
            $image = '<img src="'.$nom_repertoire.'/'.$tab_image[$j].
            '"  class="rounded-circle" alt="image" width="200px"">';

            // affichage bas du tableau
            echo
            $image;
            } 
            echo '</table>';

            ?>
        </div>
    </div>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
</body>
</html>