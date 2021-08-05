<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController {
    public function index(TranslatorInterface $translator)
    {
        $translated = $translator->trans('index.home.msg');

        // ...
    }
}
