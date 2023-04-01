<?php

namespace NormanHuth\NovaMenu;

use JetBrains\PhpStorm\ExpectedValues;

trait IconTrait
{
    /**
     * The icons for JSON serialization.
     *
     * @var array
     */
    protected array $icons = [
        'fontawesome' => null,
        'heroicon'    => null,
        'image'       => null,
        'html'        => null,
    ];

    /**
     * The classes for JSON serialization.
     *
     * @var array
     */
    protected array $classes = [
        'elem'  => '',
        'icon'  => '',
        'label' => '',
    ];

    /**
     * Set Heroicon icon.
     *
     * @param string $icon
     * @return $this
     */
    public function icon($icon): static
    {
        $this->setIcon('heroicon', $icon);

        return $this;
    }

    /**
     * Set Font Awesome icon.
     *
     * @param string $icon
     * @return $this
     */
    public function faIcon(string $icon): static
    {
        $this->setIcon('fontawesome', $icon);

        return $this;
    }

    /**
     * Set SVG icon.
     *
     * @param string $icon
     * @return $this
     */
    public function svgIcon(string $icon): static
    {
        $icon = str_contains($icon, '<svg') ? $icon : file_get_contents($icon);
        $this->setIcon('html', $icon);

        return $this;
    }

    /**
     * Set HTML icon.
     *
     * @param string $html
     * @return $this
     */
    public function htmlIcon(string $html): static
    {
        $this->setIcon('html', $html);

        return $this;
    }

    /**
     * Set image icon.
     *
     * @param string $image
     * @return $this
     */
    public function imageIcon(string $image): static
    {
        $this->setIcon('image', $image);

        return $this;
    }

    /**
     * Change icon height in pixel.
     *
     * @param int $pixel
     * @return $this
     */
    public function iconHeight(
        #[ExpectedValues(values: [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32])]
        int $pixel
    ): static {
        $this->iconHeight = $pixel;

        return $this;
    }

    /**
     * Set element classes
     *
     * @param string|array $classes
     * @return $this
     */
    public function elemClasses(string|array $classes): static
    {
        $this->setClass('elem', $classes);

        return $this;
    }

    /**
     * Set icon classes
     *
     * @param string|array $classes
     * @return $this
     */
    public function iconClasses(string|array $classes): static
    {
        $this->setClass('icon', $classes);

        return $this;
    }

    /**
     * Set label classes
     *
     * @param string|array $classes
     * @return $this
     */
    public function labelClasses(string|array $classes): static
    {
        $this->setClass('label', $classes);

        return $this;
    }

    /**
     * Set current class for type.
     *
     * @param string $key
     * @param string|array $value
     * @return $this
     */
    protected function setClass(
        #[ExpectedValues(values: ['elem', 'icon', 'label'])]
        string $key,
        string|array $value
    ): static {
        if (is_array($value)) {
            $value = implode(' ', $value);
        }

        $this->classes[$key] = ' '.$value; // Keep whitespace!

        return $this;
    }

    /**
     * Set current icon for type.
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    protected function setIcon(
        #[ExpectedValues(values: ['fontawesome', 'heroicon', 'image', 'html'])]
        string $key,
        string $value
    ): static {
        $this->icons = [
            'fontawesome' => null,
            'heroicon'    => null,
            'image'       => null,
            'html'        => null,
        ];

        $this->icons[$key] = $value;

        return $this;
    }
}
