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

namespace ErdmannFreunde\ContaoGridBundle;

final class GridClasses
{
    /** @var string */
    private $rowClass;

    /** @var int[] */
    private $columns;

    /** @var bool */
    private $columns_no_column;

    /** @var string[] */
    private $viewports;

    /** @var bool */
    private $viewports_no_viewport;

    /** @var string[] */
    private $column_prefixes;

    /** @var string[] */
    private $options_prefixes;

    /** @var string[] */
    private $pulls;

    /** @var string[] */
    private $positioning;

    /** @var string[] */
    private $directions;

    /** @var int[] */
    private $options_columns;

    public function __construct(
        string $rowClass,
        array $columns,
        bool $columns_no_column,
        array $viewports,
        bool $viewports_no_viewport,
        array $column_prefixes,
        ?array $options_prefixes,
        ?array $pulls,
        ?array $positioning,
        ?array $directions,
        array $options_columns
    ) {
        $this->rowClass = $rowClass;
        $this->columns               = $columns;
        $this->columns_no_column     = $columns_no_column;
        $this->viewports             = $viewports;
        $this->viewports_no_viewport = $viewports_no_viewport;
        $this->column_prefixes       = $column_prefixes;
        $this->options_prefixes      = $options_prefixes;
        $this->pulls                 = $pulls;
        $this->positioning           = $positioning;
        $this->directions            = $directions;
        $this->options_columns       = $options_columns;
    }

    public function getRowClass(): string
    {
        return $this->rowClass;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function isColumnsNoColumn(): bool
    {
        return $this->columns_no_column;
    }

    public function getViewports(): array
    {
        return $this->viewports;
    }

    public function isViewportsNoViewport(): bool
    {
        return $this->viewports_no_viewport;
    }

    public function getColumnPrefixes(): array
    {
        return $this->column_prefixes;
    }

    public function getOptionsPrefixes(): ?array
    {
        return $this->options_prefixes;
    }

    public function getPulls(): ?array
    {
        return $this->pulls;
    }

    public function getPositioning(): ?array
    {
        return $this->positioning;
    }

    public function getDirections(): ?array
    {
        return $this->directions;
    }

    public function getOptionsColumns(): array
    {
        return $this->options_columns;
    }

    public function getGridColumnOptions(): array
    {
        $options = [];
        foreach ($this->getColumnPrefixes() as $option) {
            foreach ($this->getViewports() as $viewport) {
                foreach ($this->getColumns() as $column) {
                    $options[$option.'-'.$viewport][] = implode('-', [$option, $viewport, $column]);
                }
            }
        }

        return $options;
    }

    public function getGridClassOptions(): array
    {
        $options = [];

        foreach ((array) $this->getOptionsPrefixes() as $prefix) {
            foreach ($this->getViewports() as $viewport) {
                foreach ($this->getOptionsColumns() as $column) {
                    $options[$prefix.'-'.$viewport][] = implode('-', [$prefix, $viewport, $column]);
                }
            }
        }

        foreach ((array) $this->getPositioning() as $position) {
            foreach ($this->getViewports() as $viewport) {
                foreach ((array) $this->getDirections() as $directions) {
                    $options[$position.'-'.$viewport][] = implode('-', [$position, $viewport, $directions]);
                }
            }
        }

        foreach ((array) $this->getPulls() as $pull) {
            foreach ($this->getViewports() as $viewport) {
                $options[$pull][] = implode('-', [$pull, $viewport]);
            }
        }

        return $options;
    }
}
