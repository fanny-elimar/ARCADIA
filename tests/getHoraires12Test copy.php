<?php

require_once  "./lib/horaire.php"; 
//require_once  "./db_test_fixtures.php"; 

use PHPUnit\Framework\TestCase;

class getHoraires12Test extends TestCase {
    private $pdo;

    // Cette méthode est exécutée avant chaque test
    protected function setUp(): void {
        // Créer une connexion PDO à la base de données de test PostgreSQL
        $this->pdo = new PDO('pgsql:host=127.0.0.1;dbname=arcadiadb_test', 'user', 'arcadiamdp');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ajout d'un horaire pour les tests
        $this->pdo->exec("TRUNCATE arc_horaire");
        $this->pdo->exec("INSERT INTO arc_horaire (ho_periode_start, ho_periode_end, ho_days, ho_time_start, ho_time_end) VALUES ('01/05/2024','30/06/2024','mercredi','10:00','17:00')");

        // Ajoutez des données de test si nécessaire (facultatif)
       // $this->pdo->exec("INSERT INTO foods (name, type) VALUES ('Apple', 'Fruit')");
    }
        

    // Exemple de test pour la fonction addFood
    public function testGetHoraires() {
        //$this->pdo = new PDO('pgsql:host=127.0.0.1;dbname=arcadiadb_test', 'user', 'arcadiamdp');
        //$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Appel de la fonction getHoraires()
        $horaires=getHoraires($this->pdo)[0];

        // Assertion pour vérifier que l'aliment existe dans la base de données
        $this->assertNotEmpty($horaires);
        $this->assertEquals('2024-05-01', $horaires['ho_periode_start']);
        $this->assertEquals('2024-06-30', $horaires['ho_periode_end']);
        $this->assertEquals('mercredi', $horaires['ho_days']);
        $this->assertEquals('10:00:00', $horaires['ho_time_start']);
        $this->assertEquals('17:00:00', $horaires['ho_time_end']);
    }
    
    // Cette méthode est exécutée après chaque test
    protected function tearDown(): void {
        // Vider la table foods pour chaque test afin de maintenir un état propre
        $this->pdo->exec("DELETE FROM arc_horaire");

        // Optionnel : supprimer la table foods si vous voulez nettoyer complètement
        //$this->pdo->exec("DROP TABLE foods");
    }
} 