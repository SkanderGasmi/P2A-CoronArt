<?php
// classe mere

    class Client{
        private $id;
        private $nom;
        private $email;
        private $motDePasse;
        private $telephone;
        private $idAdresse;
//constructeur
        public function __construct(string $nom, string $email, string $motDePasse, int $telephone, int $idAdresse){
            $this->nom =$nom;
            $this->email =$email;
            $this->motDePasse =$motDePasse;
            $this->telephone =$telephone;
            $this->idAdresse =$idAdresse;
        }
//les getters
        public function getId(): int{
            return $this->id ;
        }
        public function getNom(): string{
            return $this->nom ;
        }
        public function getEmail(): string{
            return $this->email ;
        }
        public function getMotDePasse(): string{
            return $this->motDePasse ;
        }
        public function getTelephone(): int{
            return $this->telephone ;
        }
        public function getIdAdresse(): int{
            return $this->idAdresse ;
        }
//les setteurs
        public function setId(int $id): void{
            $this->id = $id ;
        }
        public function setNom(string $nom): void{
            $this->nom = $nom ;
        }
        public function setEmail(string $email): void{
            $this->email = $email ;
        }
        public function setMotDePasse(string $motDePasse): void{
            $this->motDePasse = $motDePasse ;
        }
        public function setTelephone(int $telephone): void{
            $this->telephone = $telephone ;
        }
        public function setIdAdresse(int $idAdresse): void{
            $this->idAdresse = $idAdresse ;
        }
}

?>