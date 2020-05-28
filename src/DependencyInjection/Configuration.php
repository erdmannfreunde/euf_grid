<?php

declare(strict_types=1);

/*
 * Contao Grid Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2019, Erdmann & Freunde
 * @author     Erdmann & Freunde <https://erdmann-freunde.de>
 * @license    MIT
 * @link       http://github.com/erdmannfreunde/contao-grid
 */

namespace ErdmannFreunde\ContaoGridBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('erdmannfreunde_contao_grid');
        $rootNode
            ->children()
                        ->scalarNode('row_class')
                            ->defaultValue('row')
                        ->end()
                        ->arrayNode('columns')
                            ->integerPrototype()->end()
                            ->defaultValue(range(1, 12))
                        ->end()
                        ->booleanNode('columns_no_column')
                            ->defaultTrue()
                        ->end()
                        ->arrayNode('viewports')
                            ->scalarPrototype()->end()
                            ->defaultValue(['xs', 'sm', 'md', 'lg', 'xl'])
                        ->end()
                        ->booleanNode('viewports_no_viewport')
                            ->defaultTrue()
                        ->end()
                        ->arrayNode('column_prefixes')
                            ->scalarPrototype()->end()
                            ->defaultValue(['col', 'row-span'])
                        ->end()
                        ->arrayNode('options_prefixes')
                            ->scalarPrototype()->end()
                            ->defaultValue(['col-start', 'row-start'])
                        ->end()
                        ->arrayNode('pulls')
                            ->scalarPrototype()->end()
                            ->defaultValue(['pull-left', 'pull-right'])
                        ->end()
                        ->arrayNode('positioning')
                            ->scalarPrototype()->end()
                            ->defaultValue(['align', 'justify'])
                        ->end()
                        ->arrayNode('directions')
                            ->scalarPrototype()->end()
                            ->defaultValue(['start', 'center', 'end', 'stretch'])
                        ->end()
                        ->arrayNode('options_columns')
                            ->integerPrototype()->end()
                            ->defaultValue(range(1, 12))
                        ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
