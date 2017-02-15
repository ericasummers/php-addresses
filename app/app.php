<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Contacts.php";

    session_start();

    define('CONTACTS_SESSION_KEY', 'list_of_contacts');
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

    $app->post('/update-contact', function() use ($app) {
        function deleteThisContact($input)
        {
            $index_value = $input - 1;
            unset($_SESSION[CONTACTS_SESSION_KEY][$index_value]);
            $updated_array = array_values($_SESSION[CONTACTS_SESSION_KEY]);
        }

        function updateThisContact($input)
        {
            $index_value = $input - 1;
            echo "This is updated";
        }

        for ($index = 1; $index <= count(CONTACTS_SESSION_KEY); $index++) {
            if (array_key_exists($index, $_POST)) {
                deleteThisContact($index);
            }
            if (array_key_exists(("update-" . $index . ""), $_POST)) {
                updateThisContact($index);
            }
        }



        return $app['twig']->render('update-one-contact.html.twig', array('contacts' => Contacts::getAll()));
    });

    $app->post('/create_contact', function() use ($app) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $new_ID = 1;

        if (!($first_name) || !($last_name) || !($email)) {
            $newcontact = "";
        } else {
            $newcontact = new Contacts($first_name, $last_name, $email, $phone_number, $address, $new_ID);
            $newcontact->save();
        }

        return $app['twig']->render('create_contact.html.twig', array('newcontact' => $newcontact));
    });

    $app->post('/delete_contact', function() use ($app) {
        Contacts::deleteAll();

        return $app['twig']->render('contacts_cleared.html.twig');
    });

        return $app;

?>
