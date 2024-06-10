<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
    $controller = new PageController();
                $controller->home();
}

protected function render(string $path, array $params = []): void
{
    $filePath = _ROOTPATH_ . '\templates/' . $path . '.php';

    try {
        if (!file_exists($filePath)) {
            throw new \Exception("Fichier non trouvé : " . $filePath);
        } else {
            // Extrait chaque ligne du tableau et crée des variables pour chacune
            extract($params);
            require_once $filePath;
        }
    } catch (\Exception $e) {
        $this->render('errors/default', [
            'error' => $e->getMessage()
        ]);
    }
    
}


}