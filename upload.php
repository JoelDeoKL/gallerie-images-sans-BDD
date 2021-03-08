<html>
<head>
  <meta charset="utf-8">
</head>
<body>
    <?php
    $nomOrigine = $_FILES['img']['name'];
    $elementsChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementsChemin['extension'];
    $extensionsAutorisees = array("jpeg", "jpg", "gif", "png");
    if (!(in_array($extensionFichier, $extensionsAutorisees))) {
        echo "Le fichier n'a pas l'extension attendue";
    } else {    
        // Copie dans le repertoire du script avec un nom
        // incluant l'heure a la seconde pres 
        $repertoireDestination = dirname(__FILE__)."/";
        $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

        if (move_uploaded_file($_FILES["img"]["tmp_name"], 
            $repertoireDestination.$nomDestination)) {
                header('Location: index.php');
        } else {
            echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                    "Le déplacement du fichier temporaire a échoué".
                    " vérifiez l'existence du répertoire ".$repertoireDestination;
        }
    }
    ?>
</body>
</html>