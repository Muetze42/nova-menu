<?php

namespace NormanHuth\NovaMenu;

trait FilterTrait
{
    /**
     * Additional filter keywords.
     *
     * @var array
     */
    protected array $keywords = [];

    /**
     * Class using to filter menu element.
     *
     * @var string
     */
    protected string $filterClass = 'hidden';

    /**
     * Add Keywords to element.
     *
     * @param array $keywords
     * @return $this
     */
    public function addKeywords(array $keywords): static
    {
        $keywords = array_map('strtolower', $keywords);

        $this->keywords = array_merge($this->keywords, $keywords);

        return $this;
    }

    /**
     * Set class wich using to filter menu element.
     *
     * @return $this
     */
    public function setFilterClass(string $class): static
    {
        $this->filterClass = $class;

        return $this;
    }
}
