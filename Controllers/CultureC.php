<?php

class CultureController{
    function afficherProduits($idCulture){
        try{
            $db = Config::dbConnect();
            $sql ='SELECT * FROM produits WHERE culture = :id';
            
            $liste = $db->prepare($sql);

            $liste->execute([':id' => $idCulture]);
            
          
            return $liste->fetchAll();
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function afficherCultures(){
        $sql ='select * from cultures';
        $db = Config::dbConnect();
        $liste = $db->prepare($sql);
        $liste->execute();
        return $liste->fetchAll();
    }

    function ajouterCulture($culture){
        $sql = 'INSERT INTO cultures(nom) VALUES (:nom)' ;
        $db = Config::dbConnect();
        try{
            $query = $db->prepare($sql);
            return $query->execute(['nom' => $culture->getNom()]);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

  
    
}

?>