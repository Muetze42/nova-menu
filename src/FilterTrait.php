<?php

namespace NormanHuth\NovaMenu;

trait FilterTrait
{
    protected array $keywords = [];

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
}
