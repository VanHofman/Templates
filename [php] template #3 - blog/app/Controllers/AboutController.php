<?php

namespace App\Controllers;

use Blog\App;

class AboutController extends AppController
{
    public function infoAction()
    {
        $this->setMeta(App::$app->getProperty('blog_name'), 'description', 'keywords');
    }
}