<?php
// classe mere

    class Adresse{
        private $id;
        private $codePostal;
        private $rue;
        private $ville;
        private $pays;
//constructeur
        public function __construct(int $codePostal, string $rue, string $ville, string $pays){
            $this->codePostal =$codePostal;
            $this->rue =$rue;
            $this->ville =$ville;
            $this->pays =$pays;
        }
//les getters
        public function getId(): int{
            return $this->id ;
        }
        public function getCodePostal(): int{
            return $this->codePostal ;
        }
        public function getRue(): string{
            return $this->rue ;
        }
        public function getVille(): string{
            return $this->ville ;
        }
        public function getPays(): string{
            return $this->pays ;
        }
        
//les setteurs
        public function setId(int $id): void{
            $this->id = $id ;
        }
        public function setCodePostal(int $codePostal): void{
            $this->codePostal = $codePostal ;
        }
        public function setRue(string $rue): void{
            $this->rue = $rue ;
        }
        public function setVille(string $ville): void{
            $this->ville = $ville ;
        }
        public function setPays(string $pays): void{
            $this->pays = $pays ;
        }
}

?>