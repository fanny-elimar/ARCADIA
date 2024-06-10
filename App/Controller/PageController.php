<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        $this->home();
    }

    protected function home()
    {   


        $this->render('page/home', [
            'test' => 555,
            'nom' => "John",
        ]);

    }



}