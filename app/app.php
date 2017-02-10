<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contacts.php";

    session_start();

    define('CONTACTS_SESSION_KEY', 'contacts_list');
    if (empty($_SESSION[CONTACTS_SESSION_KEY])) {
        $_SESSION[CONTACTS_SESSION_KEY] = array();
    }
    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(
        new Silex\Provider\TwigServiceProvider(),
        array('twig.path' => __DIR__.'/../views')
    );

    $app->get('/', function() {
        $bob = new Contact("Bob", "Smith", "999-123-4567", "12 Parallel Place, Portland OR");
        $output = "";
        $output .= "Welcome to your contacts list
                    <br>" . $bob->showFullName();

        return "$output";
    });

    // $app->post('/', function() use ($app) {
    //
    //     return $app['twig']->render('contacts_list.html.twig');
    // });

        return $app;
?>
