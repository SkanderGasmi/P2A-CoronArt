<?php
    class Produit{
        private $id;
        private $nom;
        private $prix;
        private $description;
//constructeur
        function __construct(string $nom, float $prix, string $description, string $image, int $idCulture){

            $this->nom =$nom;
            $this->prix =$prix;
            $this->description =$description;            
            $this->idCulture =$idCulture;
            $this->image =$image;
        }
//les getters
        function getId(): int{
            return $this->id ;
        }
        function getNom(): string{
            return $this->nom ;
        }
        function getPrix(): float{
            return $this->prix ;
        }
        function getDescription(): string{
            return $this->description ;
        }
        function getImage(): string{
            return $this->image ;
        }
        function getIdCulture(): int{
            return $this->idCulture ;
        }
//le setteurs
        function setId(int $id): void{
            $this->id = $id ;
        }
        function setNom(string $nom): void{
            $this->nom = $nom ;
        }
        function setPrixUnitaprixire(float $prixUnitaire): void{
            $this->prixUnitaire = $prixUnitaire ;
        }
        function setDescription(string $description): void{
            $this->description = $description ;
        }
        function setimage(string $image): void{
            $this->image = $image ;
        }
        function setIdCulture(int $idCulture): void{
            $this->idCulture = $idCulture ;
        }


}
/*<?php
$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo 'Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';

?>
*/
?>