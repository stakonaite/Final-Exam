<?php

namespace App\Views;

use App\App;

class Navigation extends \Core\View {

    public function __construct($data = []) {
        parent::__construct($data);

        $this->addLink('left', '/', 'Home');
        $this->addLink('left', '/feedback.php', 'Feedback');
        
        if (App::$session->userLoggedIn()) {
            $this->addLink('right', '/logout.php', "Log Out");
        } else {
            $this->addLink('right', '/login.php', 'Log In');
            $this->addLink('right', '/register.php', 'Register');
        }
    }

    public function addLink($section, $url, $title) {
        $link = ['url' => $url, 'title' => $title];
        
        if ($_SERVER['REQUEST_URI'] == $link['url']) {
            $link['active'] = true;
        }
        
        $this->data[$section][] = $link;
    }

    public function render($template_path = ROOT . '/app/templates/navigation.tpl.php') {
        return parent::render($template_path);
    }
}
