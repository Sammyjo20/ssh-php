<?php

declare(strict_types=1);

namespace App;

use Laravel\Prompts\Prompt;
use App\Renderers\HomeRenderer;
use Chewie\Concerns\RegistersRenderers;

class App extends Prompt
{
    use RegistersRenderers;

    /*
     * Constructor
     */
    public function __construct()
    {
        $this->registerRenderer(HomeRenderer::class);
    }

    /**
     * Get the value of the prompt.
     */
    public function value(): true
    {
        return true;
    }
}
