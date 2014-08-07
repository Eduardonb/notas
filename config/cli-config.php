<?php
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Symfony\Component\Console\Helper\HelperSet;
use Symfony\Component\Console\Helper\DialogHelper;

$container = require __DIR__ . '/di-container.php';

return new HelperSet(
    [
        'db' => new ConnectionHelper($container->get('orm.connection')),
        'em' => new EntityManagerHelper($container->get('orm.em')),
        'dialog' => new DialogHelper()
    ]
);
