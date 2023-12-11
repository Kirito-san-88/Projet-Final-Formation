<?php

session_start();

//autoload

spl_autoload_register(function ($class) {
    if (stristr($class, 'Model')) {
        require 'models/' . $class . '.class.php';
    } elseif (stristr($class, 'Controller')) {
        require 'controllers/' . $class . '.class.php';
    } elseif (stristr($class, 'Function')) {
        require 'function/' . $class . '.class.php';
    }


    //condition
    //include 'classes/' . $class . '.class.php';
});
if (isset($_GET['page'])) {
    //le redirige vers la bonne page
    switch ($_GET['page']) {
        case 'accueil':
            $controller = new AccueilController();
            $controller->display();
            break;

        case 'product':
            $controller = new ProductDetailController();
            $controller->display();
            break;

        case 'news':
            $controller = new NewsController();
            $controller->display();
            break;

        case 'contact':
            $controller = new ContactController();
            $controller->display();
            break;
        case 'add_contact_fetch':
            $controller = new ContactController();
            $controller->displayJSON();
            break;

        case 'admin':
            $controller = new AdminController();
            $controller->displayLogin();
            break;

        case 'admin_product':
            $controller = new AdminController();
            $controller->displayProduct();
            break;
        case 'modify_product':
            $controller = new ModifyProductController();
            $controller->displayModifyProduct();
            break;
        case 'add_product':
            $controller = new AddProductController();
            $controller->displayAddProduct();
            break;
        case 'add_product_image':
            $controller = new AddProductImageController();
            $controller->displayAddImageProduct();
            break;
        case 'sup_product':
            $controller = new SupProductController();
            $controller->display();
            break;
        case 'message_to_admin':
            $controller = new AdminController();
            $controller->displayMessage();
            break;
        case 'sup_message':
            $controller = new SupMessageController();
            $controller->display();
            break;

        case 'deconnect':
            $controller = new AdminController();
            $controller->deconnect();
            break;

        default:
            $controller = new AccueilController();
            $controller->display();

    }
} else {
    $controller = new AccueilController();
    $controller->display();
}
 
