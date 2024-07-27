<?php

namespace App;

use App\Renderers\HomeRenderer;
use Chewie\Concerns\RegistersRenderers;
use Laravel\Prompts\Prompt;

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
