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

    $app->get('/', function() use ($app) {

        return $app['twig']->render('contacts_list.html.twig', array('contacts' => Contacts::getAll()));
    });

    $app->post('/create_contact', function() use ($app) {
        $newcontact = new Contacts($_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['address']);
        $newcontact->save();

        return $app['twig']->render('contacts_list.html.twig', array('newcontact' => $newcontact, 'contacts' => Contacts::getAll()));
    });

    $app->post('/delete_contact', function() use ($app) {
        Contacts::deleteAll();

        return $app['twig']->render('contacts_cleared.html.twig');
    });

        return $app;

?>
