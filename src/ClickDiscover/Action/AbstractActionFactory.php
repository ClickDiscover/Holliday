<?php

namespace ClickDiscover\Action;

use Interop\Container\ContainerInterface;
use ReflectionClass;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

/*************************************************************************************/
/* AbstractActionFactory.php                                                         */ 
/*   Automatically inserts Actions into Zend-ServiceManager                          */
/*                                                                                   */ 
/*   https://xtreamwayz.com/blog/2015-12-30-psr7-abstract-action-factory-one-for-all */  
/*************************************************************************************/


class AbstractActionFactory implements AbstractFactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Construct a new ReflectionClass object for the requested action
        $reflection = new ReflectionClass($requestedName);
        // Get the constructor
        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            // There is no constructor, just return a new class
            return new $requestedName;
        }

        // Get the parameters
        $parameters = $constructor->getParameters();
        $dependencies = [];
        foreach ($parameters as $parameter) {
            // Get the parameter class
            var_dump($parameter);
            $class = $parameter->getClass();
            // Get the class from the container
            $dependencies[] = $container->get($class->getName());
        }

        // Return the requested class and inject its dependencies
        return $reflection->newInstanceArgs($dependencies);
    }

    public function canCreate(ContainerInterface $container, $requestedName) {
        // Only accept Action classes
        if (substr($requestedName, -6) == 'Action') {
            return true;
        }

        return false;
    }
}
