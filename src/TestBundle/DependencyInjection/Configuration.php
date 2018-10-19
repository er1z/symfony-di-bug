<?php
namespace App\TestBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package DCarbone\PHPConsulAPIBundle
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $root = $treeBuilder->root('test_bundle');

        $root
            ->beforeNormalization()
            ->always(function($arg){
                var_dump('always', $arg);
                return $arg;
            })
            ->end()
            ->beforeNormalization()
            ->ifNull()
                ->then(function(){
                    var_dump('if null');
                    return [
                        'test'=>123,
                        'test2'=>321
                    ];
                })
            ->end()
            ->beforeNormalization()
            ->ifString()
                ->then(function($val){
                    var_dump('if string', $val);
                    return [
                        'test'=>$val,
                        'test2'=>'xyz'
                    ];
                })
            ->end()
            ->children()
                ->scalarNode('test')
                    ->defaultValue("def")
                ->end()
                ->scalarNode('test2')
                    ->defaultValue('def')
                ->end()
            ->end();

        return $treeBuilder;
    }
}