<?php
class Sql
{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $userPassword = "";
    private string $database = "alibobo";
    private object $connexion;
    
    public function __construct()
    {
        try {
            $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->userPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
    public function __destruct()
    {
        if (isset($this->connexion))
            $this->connexion = null;
    }}
    
    class Inscription
    {        
        protected $nom;
        protected $prenom;
        protected $email;
        protected $mdp;
    
        public function __construct($name, $firstName, $email, $mdp)
        {
            try{
            $this->nom = $name;
            $this->prenom = $firstName;
            $this->email = $email;
            $this->mdp = $mdp;
         }catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
        }
    }
    class Login
        {               
        protected $email;
        protected $mdp;
    
        public function __construct( $email, $mdp)
        {
            try{
            
            $this->email = $email;
            $this->mdp = $mdp;
         }catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
        }
    }
    