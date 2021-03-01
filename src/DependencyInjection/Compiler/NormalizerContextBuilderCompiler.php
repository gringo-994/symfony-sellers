<?php

namespace App\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class NormalizerContextBuilderCompiler implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $contextNormalizer = $container->findDefinition('context.normalizer');

        $strategyIds = array_keys($container->findTaggedServiceIds('strategy_normalizer'));

        foreach ($strategyIds as $strategyId) {
            $contextNormalizer->addMethodCall(
                'addNormalizerStrategy',
                array(new Reference($strategyId))
            );
        }
    }
}
