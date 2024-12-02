<?php

require_once  "./lib/food.php"; 
//require_once  "./db_test_fixtures.php"; 

use PHPUnit\Framework\TestCase;

class addFood13Test extends TestCase {
    private $pdo;

    // Cette méthode est exécutée avant chaque test
    protected function setUp(): void {
        // Créer une connexion PDO à la base de données de test PostgreSQL
        $this->pdo = new PDO('pgsql:host=127.0.0.1;dbname=arcadiadb_test', 'user', 'arcadiamdp');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Créez la table 'foods' pour les tests
        $this->pdo->exec("TRUNCATE arc_food CASCADE");

        // Ajoutez des données de test si nécessaire (facultatif)
       // $this->pdo->exec("INSERT INTO foods (name, type) VALUES ('Apple', 'Fruit')");
    }
        

    // Exemple de test pour la fonction addFood
    public function testAddFood() {
        //$this->pdo = new PDO('pgsql:host=127.0.0.1;dbname=arcadiadb_test', 'user', 'arcadiamdp');
        //$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Appel de la fonction addFood
        addFood($this->pdo, 'Viandes');

        // Vérification que l'aliment a été ajouté
        $stmt = $this->pdo->query("SELECT * FROM arc_food WHERE fo_type = 'Viande'");
        $food = $stmt->fetch(PDO::FETCH_ASSOC);

        // Assertion pour vérifier que l'aliment existe dans la base de données
        $this->assertNotEmpty($food);
        $this->assertEquals('Viande', $food['fo_type']);
    }
}

    /*
    // Cette méthode est exécutée après chaque test
    protected function tearDown(): void {
        // Vider la table foods pour chaque test afin de maintenir un état propre
        $this->pdo->exec("DELETE FROM foods");

        // Optionnel : supprimer la table foods si vous voulez nettoyer complètement
        //$this->pdo->exec("DROP TABLE foods");
    }
} */