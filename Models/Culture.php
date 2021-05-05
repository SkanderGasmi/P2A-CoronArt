<?php
    class Culture{
        private $id;
        private $nom;
        
//constructeur
        function __construct(string $nom){

            $this->nom =$nom;
           
        }
//les getters
        function getId(): int{
            return $this->id ;
        }
        function getNom(): string{
            return $this->nom ;
        }
        
//le setteurs
        function setId(int $id): void{
            $this->id = $id ;
        }
        function setNom(string $nom): void{
            $this->nom = $nom ;
        }
       


}
