<html>
    <head>
    <title>My first PHP Website</title>
    </head>
    <body>
        <?php

require_once 'vendor/autoload.php';

use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;
Rollbar::init(
    array(
        'access_token' => '<yourtoken>',
        'environment' => 'production'
    )
);
Rollbar::log(Level::info(), 'Test info message');
throw new Exception('Test exception');
            echo "<p>Rollbar PHP Demo App</p>";
        ?>

    </body>
</html>
