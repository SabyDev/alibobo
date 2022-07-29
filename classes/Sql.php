<?php
class Sql
{
    private string $serverName = "localhost";
    private string $userName = "root";
    private string $userPassword = "";
    private string $database = "alibobo";
    private object $connexion;
    
    // le constructeur est implicite par contre on y a acces et on peut lui instensier des éléments
    // 
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
    // la methode destruction n'est pas obligatoire. elle detruit l'objet pour liberer de la memeoire
    //  on n'utilse pas unset car cela peut faire des erreurs avec fetchall.
    // public function __destruct()
    // {
    //     if (isset($this->connexion))
    //         $this->connexion = null;
    // }
    // public function inserer(string $sql, bool $bind = false, array $bindArray): bool
    // {
    //     if ($bind) {

    //     } else {
    //         if ($this->connexion->exec($sql))
    //             return true;
    //         else
    //             return false;
    //     }
    // }
    public function select(string $sql, bool $count = false): array|int
    {  
        if (!$count)
        {
            $resultat = $this->connexion->query($sql)->fetchAll();
            return $resultat;
        }
        else {
            $nbrResultat = $this->connexion->query($sql)->fetchColumn();
            return $nbrResultat;
        }

    }
    public function delete(string $sql): bool
    {
        $resultatDelete = $this->connexion->prepare($sql)->execute();
        if ($resultatDelete->rowCount() > 0)
            return true;
        else
            return false;
    }}
    
    // class Inscription
    // {        
    //     protected $nom ="";
    //     protected $prenom ="";
    //     protected $email ="";
    //     protected $mdp="";
    
    //     public function __construct($name, $firstName, $email, $mdp)
    //     {
    //         try{
    //         $this->nom = $name;
    //         $this->prenom = $firstName;
    //         $this->email = $email;
    //         $this->mdp = $mdp;
    //      }catch (PDOException $e) {
    //         die("Erreur : " . $e->getMessage());
    //     }
    //     }
    // }
    // class Login
    //     {               
    //     protected $email="";
    //     protected $mdp="";
    
    //     public function __construct( $email, $mdp)
    //     {
    //         try{
            
    //         $this->email = $email;
    //         $this->mdp = $mdp;
    //      }catch (PDOException $e) {
    //         die("Erreur : " . $e->getMessage());
    //     }
    //     }
    // }
    