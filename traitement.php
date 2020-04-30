<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet_back;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = htmlspecialchars($_POST['pseudo']);
$pass = htmlspecialchars($_POST['pass']);
$email = htmlspecialchars($_POST['email']);
$nom = htmlspecialchars($_POST['nom']);


     	//vérification si le pseudo existe déjà dans la base
     	    $reqpseudo = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
     	    $reqpseudo->execute(array($pseudo));
     	    $pseudoexist = $reqpseudo->rowCount();
     	    if($pseudoexist == 0)
     	    {
                $reqemail = $bdd->prepare("SELECT * FROM user WHERE email = ?");
                $reqemail->execute(array($email));
                $emailexist = $reqemail->rowCount();
                if($emailexist == 0) 
                {
                    $req = $bdd->prepare("INSERT INTO user(pseudo, pass, email, nom) VALUES(?, ?, ?, ?)");
                    $req->execute(array($pseudo, $pass, $email,$nom));
                    header ('Location: index.php?success=1'); 
                }
                else
                {
                    echo "l'email utilisé existe déjà";
                }
            }
            else 
            {
                echo 'le pseudo utilisé existe déjà';
            }

           
                  
                 
?>