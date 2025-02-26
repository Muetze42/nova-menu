<?php

namespace NormanHuth\NovaMenu;

trait IframeTrait
{
    /**
     * The iframe attributes.
     */
    protected array $iframe = [
        'target' => null,
        'wrapper' => [
            'classes' => [],
            'styles' => [
                'background-color' => 'white',
                'width' => '100%',
                'height' => '100%',
            ],
        ],
        'iframe' => [
            'classes' => [],
            'styles' => [
                'position' => 'fixed',
                'width' => '100vw',
                'height' => '100vh',
                'padding' => '50px',
                'box-sizing' => 'border-box',
                'background-color' => 'rgba(0, 0, 0, 0.9)',
                'z-index' => '200000',
                'left' => '0',
                'top' => '0',
                'border-radius' => '5px',
            ],
        ],
    ];

    /**
     * Add classes to the iframe class attribute.
     */
    public function addIframeClasses(array|string $classes): static
    {
        $this->iframe['iframe']['classes'] = array_merge($this->iframe['iframe']['classes'], (array) $classes);

        return $this;
    }

    /**
     * Add styles to the iframe style attribute.
     */
    public function addIframeStyles(array|string $styles): static
    {
        $this->iframe['iframe']['styles'] = array_merge($this->iframe['iframe']['styles'], (array) $styles);

        return $this;
    }

    /**
     * Set styles to the iframe style attribute.
     */
    public function setIframeStyles(array|string|null $styles): static
    {
        $this->iframe['iframe']['styles'] = (array) $styles;

        return $this;
    }

    /**
     * Add classes to the iframe wrapper class attribute.
     */
    public function addIframeWrapperClasses(array|string $classes): static
    {
        $this->iframe['wrapper']['classes'] = array_merge($this->iframe['wrapper']['classes'], (array) $classes);

        return $this;
    }

    /**
     * Add styles to the iframe wrapper style attribute.
     */
    public function addIframeWrapperStyles(array|string $styles): static
    {
        $this->iframe['wrapper']['styles'] = array_merge($this->iframe['wrapper']['styles'], (array) $styles);

        return $this;
    }

    /**
     * Set styles to the iframe wrapper style attribute.
     */
    public function setIframeWrapperStyles(array|string|null $styles): static
    {
        $this->iframe['wrapper']['styles'] = (array) $styles;

        return $this;
    }

    /**
     * Create a new iframe button.
     */
    public static function iframe(string $name, string $target): static
    {
        if (class_basename(self::class) == 'MenuItem') {
            return (new static($name))->iframeTarget($target);
        }

        // Create a pseudo item to preventing element hiding
        $pseudoItem = [MenuItem::externalLink('Norman Huth', 'https://huth.it')];

        return (new static($name, $pseudoItem))->iframeTarget($target);
    }

    /**
     * Set iframe target.
     */
    public function iframeTarget(string $target): static
    {
        $this->iframe['target'] = $target;

        return $this;
    }
}
