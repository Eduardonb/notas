<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use Lcobucci\ActionMapper2\DependencyInjection\ContainerConfig;

AnnotationRegistry::registerFile(
    __DIR__ . '/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
);

return new ContainerConfig(
    __DIR__ . '/services.xml',
    __DIR__ . '/../tmp',
    array(
    	'app.basedir' => realpath(__DIR__ . '/../') . '/'
    )
);