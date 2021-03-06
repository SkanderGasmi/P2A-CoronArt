<?php


class ClientController{
    function afficherClients(){
        try{
            $sql ='select * from clients';
            $db = Config::dbConnect();
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            echo 'Erreur ' . $e.getMessage() ;
        }
        
    }

    function ajouterClient($client){
        try{
            
            $sql = 'INSERT INTO clients(nom, email, mot_de_passe,telephone,id_adresse) VALUES (:nom, :email, :mot_de_passe, :telephone, :id_adresse)' ;
            $db = Config::dbConnect();
            $query = $db->prepare($sql);
            return $query->execute(['nom' => $client->getNom(),
                            'email' => $client->getEmail(),
                            'mot_de_passe' => $client->getMotDePasse(),
                            'telephone' => $client->getTelephone(),
                            'id_adresse' => $client->getIdAdresse(),
             ]);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function supprimerClient($id){
        try{
            $sql = 'DELETE FROM clients WHERE id = :id';
            $db = Config::dbConnect();
            $query = $db->prepare($sql);
            return $query->execute([':id'=> $id]);

        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function modifierClient($utilisateur,$id){
        try{
            $db = Config::dbConnect();
            $sql = 'UPDATE clients SET nom = :nom,
                                       email = :email,
                                       mot_de_passe = :mot_de_passe,
                                       telephone = :telephone,
                                       pdp = :pdp,
                                       id_adresse = :id_adresse WHERE id = :id'  ;
          

         

            $query = $db->prepare($sql);
            return $query->execute(['nom' => $utilisateur->getNom(),
                             'email' => $utilisateur->getEmail(),
                             'mot_de_passe' => $utilisateur->getMotDePasse(),
                             'telephone' => $utilisateur->getTelephone(),
                             'pdp' => $utilisateur->getPdp(),
                             'id_adresse' => $utilisateur->getIdAdresse(),
                             'id' => $id ]);
                             
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function recupererClient($id){
        try{
            
            $db = Config::dbConnect();
            $sql = 'SELECT * FROM  clients  WHERE id = :id';
            $query = $db->prepare($sql);
            $query->execute([':id' => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function connexionClient($login, $MotdePasse){
        try{
            $db = Config::dbConnect();
            $sql = " SELECT * FROM clients WHERE  email = :email AND mot_de_passe = :mot_de_passe";
            
            $query = $db->prepare($sql);
            $query->execute([
                'email' => $login,
                'mot_de_passe' => $MotdePasse
            ]);
            $count = $query->rowCount();
            return $query->fetch(PDO::FETCH_ASSOC);
            
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function recupereAdminParEmail($email){
    try{
        $db = Config::dbConnect();
        $sql = 'SELECT * FROM  clients  WHERE email = :email and role ="admin" ';
        
        $query = $db->prepare($sql);
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
        
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}


function mail_recup_exist($email)
{
    try{
        $db = Config::dbConnect();
        $sql = 'SELECT id FROM recuperations WHERE email = :email';
        
        $query = $db->prepare($sql);
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
        
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}
function recup__code_insert($email,$code)
{
    try{
        $db = Config::dbConnect();
        $sql = 'INSERT INTO recuperations(email,code) VALUES (:email, :code)';
        
        $query = $db->prepare($sql);
        return $query->execute(['email' => $email,
        'code' => $code]);
          
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}

function recup__code_update($email,$code)
{
    try{
        $db = Config::dbConnect();
        $sql = 'UPDATE recuperations SET code = :code WHERE email = :email';
        
        $query = $db->prepare($sql);
        return $query->execute(['code' => $code,
        'email' => $email]);
      
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}

function recup_code_read($email,$code)
{
    try{
        $db = Config::dbConnect();
        $sql = 'SELECT * FROM recuperations WHERE email = :email ';
        
        $query = $db->prepare($sql);
        $query->execute(['email' => $email ]);
        return $query->fetch(PDO::FETCH_ASSOC);
      
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}

function changer_mdp($email,$mdp)
{
    try{
        $db = Config::dbConnect();
        $sql = 'UPDATE clients SET mot_de_passe = :mot_de_passe WHERE email = :email';
        
        $query = $db->prepare($sql);
        return $query->execute(['mot_de_passe' => $mdp,
        'email' => $email]);
      
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}


function supprimer_code($email)
{
    try{
        $db = Config::dbConnect();
        $sql = 'DELETE FROM recuperations WHERE email = :email';
        
        $query = $db->prepare($sql);
        return $query->execute(['email' => $email]);
      
        
            
        
    }
    catch (Exception $e){
        echo 'erreur ' . $e->getMessage() ;
    }
}



}

?>