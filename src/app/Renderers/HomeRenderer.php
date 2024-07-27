<?php

namespace App\Renderers;

use App\App;
use Chewie\Concerns\Aligns;
use Laravel\Prompts\Themes\Default\Renderer;

class HomeRenderer extends Renderer
{
    use Aligns;

    /**
     * Invoke
     *
     * @param \App\App $app
     * @return string
     */
    public function __invoke(App $app): string
    {
        $width = $app->terminal()->cols() - 8;
        $height = $app->terminal()->lines() - 5;

        $this->center('Welcome to SSH-PHP!', $width, $height)
            ->each($this->line(...));

        return $this;
    }
}
