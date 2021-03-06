<?php

namespace Datatheke\Bundle\PagerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use Datatheke\Bundle\PagerBundle\DependencyInjection\Compiler\AdapterGuesserCompilerPass;
use Datatheke\Bundle\PagerBundle\DependencyInjection\Compiler\ColumnGuesserCompilerPass;

class DatathekePagerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new AdapterGuesserCompilerPass());
        $container->addCompilerPass(new ColumnGuesserCompilerPass());
    }
}
