<?php

class ProduitController{
    function ProduitsCount(){
            $sql ='select count(id) as id from produits';
            $db = Config::dbConnect();
            $liste = $db->query($sql);
            return $liste->fetchAll(PDO::FETCH_ASSOC);
        
    }

    function afficherProduitsAll(){
        $sql ='SELECT * FROM produits';
        $db = Config::dbConnect();
        $liste = $db->query($sql);
        return $liste->fetchAll();  
  
}

    function afficherProduits($start,$limit){
            $sql ='SELECT * FROM produits LIMIT '. $start .',' . $limit;
            $db = Config::dbConnect();
            $liste = $db->query($sql);
            return $liste->fetchAll();  
      
    }

    function filtererProduitsPrix($min,$max){
        $query = "SELECT * FROM produits WHERE prix BETWEEN '".$min."' AND '".$max."' ORDER BY prix ASC";
        $db = Config::dbConnect();
        $liste = $db->query($query);
        return $liste->fetchAll();  
  
}

    function ajouterProduit($produit){
        $sql = 'INSERT INTO produits(nom, prix, description,image,culture) VALUES (:nom, :prix, :description,:image,:culture)' ;
        $db = Config::dbConnect();
        try{
            $query = $db->prepare($sql);
            return $query->execute(['nom' => $produit->getNom(),
                            'prix' => $produit->getPrix(),
                            'description' => $produit->getDescription(),
                            'image' =>  $produit->getImage() ,
                            'culture' => $produit->getIdCulture()
                            
             ]);
        }
        catch (Exception $e){
            echo 'erreur ' . $e->getMessage() ;
        }
    }

    function recupererProduit($id)
    {
        $sql = 'SELECT * FROM produits WHERE id = :id' ;
        $db = Config::dbConnect();
        try{
            $query = $db->prepare($sql);
             $query->execute(['id' => $id]);
             return $query->fetch();
        }
        catch (Exception $e){
            echo 'erreur ' . $e.getMessage() ;
        }

    }

    function supprimerProduit($id){
        try{
            $db = Config::dbConnect();
            $query = $db->prepare('DELETE FROM produits WHERE id = :id ');
            return $query->execute(['id' => $id]);
            

        }

        catch (PDOException $e){
            $e->getMessage();
        }
    }

    function modifierProduit($produit,$id){
        try
{

    $db = Config::dbConnect();
    $query = $db->prepare("UPDATE produits SET nom = :nom , prix = :prix, description = :description, culture = :culture WHERE id = :id;  ");
    return $query->execute(['nom' => $produit->getNom(),
                      'prix' => $produit->getPrix()  ,
                      'description' => $produit->getDescription(),
                      'culture' => $produit->getIdCulture(),
                      'id' => $id]);

}

catch (PDOException $e)
{
    $e->getMessage();
}
    }
}

?>