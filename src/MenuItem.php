<?php

namespace NormanHuth\NovaMenu;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\AuthorizedToSee;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Menu\MenuItem as BaseMenuItem;
use Laravel\Nova\URL;

class MenuItem extends BaseMenuItem
{
    use AuthorizedToSee;

    protected static bool $authorized = true;
    protected static bool $hasPath = false;

    /**
     * Construct a new Menu Item instance.
     *
     * @param  string  $name
     * @param  string|null  $path
     */
    public function __construct($name, $path = null)
    {
        if ($path) {
            static::$hasPath = true;
        }
        parent::__construct($name, $path);
    }

    /**
     * Create a menu from resource class.
     *
     * @param  class-string<resource>  $resourceClass
     * @return static
     */
    public static function resource($resourceClass): static
    {
        $gate = Gate::getPolicyFor($resourceClass::$model);

        static::$authorized = true;

        if (!is_null($gate) && method_exists($gate, 'viewAny')) {
            $response = Gate::inspect('viewAny', $resourceClass::$model);
            if (!$response->allowed()) {
                static::$authorized = false;
            }
        }

        return static::make(
            $resourceClass::label()
        )->path('/resources/'.$resourceClass::uriKey());
    }

    /**
     * Prepare the menu for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $url = URL::make($this->path, $this->external);
        $request = app(NovaRequest::class);

        if (static::$hasPath || ($this->authorizedToSee($request) && static::$authorized)) {
            return [
                'name'      => $this->name,
                'component' => $this->component,
                'path'      => (string)$url,
                'external'  => $this->external,
                'method'    => $this->method,
                'data'      => $this->data,
                'headers'   => $this->headers,
                'active'    => $url->active(),
            ];
        }
        return [];
    }
}
