<?php
include '../../config.php';

class AdresseController{
   function afficherAdresse(){
        try{
            $sql ='select * from adresses';
            $db = Config::dbConnect();
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
        
    }

    
    function ajouterAdresse($adresse){
        try{
            $sql = 'INSERT INTO adresses(codePostal, rue, ville,pays) VALUES (:codePostal, :rue, :ville, :pays)' ;
            $db = Config::dbConnect();
            if (!self::recupererIdAdresse($adresse)){
            $query = $db->prepare($sql);
            return $query->execute(['codePostal' => $adresse->getCodePostal(),
            'rue' => $adresse->getRue(),
            'ville' => $adresse->getVille(),
            'pays' => $adresse->getPays()
             ]);
            }
            else{
                return self::recupererIdAdresse($adresse);
            }
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    /*function supprimerClient($id){
        try{
            $sql = 'DELETE FROM clients WHERE id = :id';
            $db = Config::dbConnect();
            $query = $db.prepare($sql);
            $query.bindValue(':id', $id);

        }
        catch (Exception $e){
            echo 'erreur ' . $e.getMessage() ;
        }
    }*/
/*
    function modifierClient($utilisateur,$id){
        try{
            $sql = 'UPDATE clients SET nom = :nom,
                                       email = :email,
                                       motDePasse = :nmotDePasseom,
                                       telephone = :telephone,
                                       idAdresse = :idAdresse WHERE id = :id';
            $db = Config::dbConnect();
            $query = $db->prepare($sql);
            $query->execute(['nom' => $utilisateur.getNom(),
                             'email' => $utilisateur.getEmail(),
                             'motDePasse' => $utilisateur.getMotDePasse(),
                             'telephone' => $utilisateur.getTelephone(),
                             'idAdresse' => $utilisateur.getIdAdresse,
                             'id' => $id,
                             ]);
        }
        catch (Exception $e){
            echo 'erreur ' . $e.getMessage() ;
        }
    }*/

    function recupererIdAdresse($adresse){
        try{
            $sql = 'SELECT * FROM  adresses  WHERE codePostal = :codePostal AND rue = :rue AND ville = :ville  AND pays = :pays   ';
            $db = Config::dbConnect();
            $query = $db->prepare($sql);
            $query->execute(['codePostal' => $adresse->getCodePostal(),
            'rue' => $adresse->getRue(),
            'ville' => $adresse->getVille(),
            'pays' => $adresse->getPays()
             ]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function getAdresse($id){
        try{
            $sql = 'SELECT * FROM  adresses  WHERE id = :id ';
            $db = Config::dbConnect();
            $query = $db->prepare($sql);
            $query->execute(['id' => $id
             ]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

  


}

?>