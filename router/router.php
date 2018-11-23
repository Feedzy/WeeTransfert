<?php

require 'vendor/autoload.php';
require 'model/model.php';

//twig config
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$link = basename($_SERVER['REQUEST_URI']);

if($link == 'annuaire_film') {
    $link = '/';
}


switch ($link) 
{
    case 'index':
        echo $twig->render('index.twig');
    break;

    case 'traitement':

    $connexion = new PDO('mysql:host=localhost;dbname=wee-transfert;charset=utf8','root','');
                    

    if (isset($_POST["submit"]))
    {
    
        $repertoire_courant = getcwd();
        $extension_des_fichier = ['pdf', 'png', 'gif', 'txt'];
        $repertoire_de_telechargement_de_fichier = "../fichier/";
    
    
        $nom_fichier = $_FILES["fichier"]["name"];
        $taille_fichier = $_FILES["fichier"]["size"];
        $type_fichier = $_FILES["fichier"]["type"];
        $repertoire_temporaire = $_FILES["fichier"]["tmp_name"];
    
       // $extension_fichier = strtolower(end(explode('.', $nom_fichier)));
    
        $repertoire_uplaod = $repertoire_courant . $repertoire_de_telechargement_de_fichier . basename($nom_fichier);
        $telechargement = move_uploaded_file($repertoire_temporaire, $repertoire_uplaod);
    
        if ($telechargement) 
        {
            echo "<script> alert('Vos Donnees on été tranferer ') </script>";
        }
        else
        {
            echo "<script> alert('Le fichier n\'a pas pu etre envoyer  ') </script>";
        }
    
        $lien_de_telechargement= "http://localhost/Projects-Acs/Tranfert/fichier/".$nom_fichier;
    
    
        if (isset($_POST["email_destinataire"]) && isset($_POST["email_emetteur"]) && isset($_POST["message"])) 
        {
            $destinataire_mail = $_POST["email_destinataire"];
            $envoyeur = $_POST["email_emetteur"];
            $meesage = $_POST["message"];

            $to      = $destinataire_mail;
            $subject = 'Vous avez un recus un fichier';
            $message = $lien_de_telechargement;
            $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/';
        
            mail($to, $subject, $message, $headers);
    
           // $requette = "INSERT INTO fichier VALUES ('$nom_fichier', '$taille_fichier', '$type_fichier', '$destinataire_mail', '$envoyeur', '$meesage', '$lien_de_telechargement')";
            //$enregistrement = $connexion->query($requette);
            
            $req=$connexion->prepare("INSERT INTO fichier(Nom,Taille,Typpe, Email_destiantaire, Email_emetteur, Messages, lien_fichier) VALUES(:Nom,:Taille,:Typpe,:Email_destiantaire , :Email_emetteur, :Messages, :lien_fichier))")or die(print_r($connexion->errorInfo()));;
            $req->execute(array(
                'Nom'=>$nom_fichier,
                'Taille'=>$taille_fichier,
                'Typpe'=>$type_fichier ,
                'Email_destiantaire'=>$destinataire_mail,
                'Email_emetteur'=>$envoyeur,
                'Messages'=>$meesage,
                'lien_fichier'=>$lien_de_telechargement,
            ));
    
            
            if ($req)
            {
                echo "<script> alert('insertion reussit') </script>";
            }

            else 
            {
                echo "<script> alert('Echec de l'insertion) </script>";
            }
        
          
        }
    }

    echo $twig->render('index.twig');
    break;

    default:
        echo $twig->render('404.twig');
        break;
}
