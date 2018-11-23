<?php
/** */


/*
    function sendEmail($fichier, $email, $type, $email_emetteur, $message)
    {
      /*  $nom_fichier  = $_FILES[$fichier]["name"];
        $taille = $_FILES["fichier"]["size"];
        $type = $_FILES["fichier"]["type"];
        $tranfert_du_fichier = move_uploaded_file($_FILES[$fichier]["tmp_name"], $nom_fichier);

        if($tranfert_du_fichier == true)
        {
            $requette = "INSERT INTO fichier values ($nom_fichier, $taille, $type, $email, $email_emetteur, $message)";
            $insertion =  $con->query($requette);
            echo "<script> alert('Transfert reussit') </script>";
        }
        else 
        {
            echo " Erreur de tranfert ".$_FILES["fichier"]["error"];
        }


    }

function sendEmail($fichier,$nom_fichier,$taille, $type, $email, $email_emetteur, $message)
{
    $con = new PDO('mysql:host=localhost;dbname=wee-transfert;charset=utf8','root','');

    $tranfert_du_fichier = move_uploaded_file($_FILES[$fichier]["tmp_name"], $nom_fichier);

    $inscription=$con->prepare("INSERT INTO fichier(Nom, Taille, Typpe, Email_destiantaire, Email_emetteur Message) VALUES (:Nom, :Taille, :Typpe, :Email_destiantaire, :Email_emetteur, :Message");

    $inscription->execute(array('Nom' =>$nom_fichier,
        'Taille'=>$taille,
        'Typpe'=>$type,
        'Email_destiantaire'=>$email,
        'Email_emetteur'=>$email_emetteur,
        'Message'=>$message
    ));
    echo "Tranfert effecteur avec success";
}
 */
