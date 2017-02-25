<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();
    $app['debug'] = true;

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path'=>__DIR__.'/../views'));


        $app->get('/', function() use ($app) {
            return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAllStylists()));
        });

        $app->post('/stylists', function() use ($app) {
            $stylists = new Stylist($id = null, $_POST['stylist_name'], $_POST['stylist_phone_number'], $_POST['workdays']);
            $stylists->saveStylist();

            return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAllStylists()));
        });

        $app->post('/delete_clients', function() use ($app) {
            $stylists = Stylist::getAllStylists();
            Client::deleteAllClients();
            return $app['twig']->render('index.html.twig', array('stylists' => $stylists));
        });

        $app->post('/delete_stylists', function() use ($app) {
            Stylist::deleteAllStylists();
            $stylist = Stylist::getAllStylists();
            return $app['twig']->render('index.html.twig', array('stylists' => $stylist));
        });

        $app->get('/clients', function() use ($app) {
            return $app['twig']->render('clients.html.twig');
        });


        $app->get('/stylist/{id}', function($id) use ($app) {
            $stylist = Stylist::findStylist($id);
            return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
        });

        $app->post('/clients', function() use ($app) {
            $name = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $stylist_id = $_POST['stylist_id'];
            $client = new Client($id = null, $name, $phone_number, $stylist_id);
            $client->saveClient();
            $clients = Client::getAllClients();
            $stylist = Stylist::findStylist($stylist_id);

            return $app['twig']->render('stylists.html.twig', array('stylist' => $stylist, 'clients' => $clients));
        });


    return $app;
?>
