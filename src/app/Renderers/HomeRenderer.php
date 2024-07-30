<?php

declare(strict_types=1);

namespace App\Renderers;

use App\App;
use Chewie\Concerns\Aligns;
use function Laravel\Prompts\text;
use Laravel\Prompts\Themes\Default\Renderer;

class HomeRenderer extends Renderer
{
    use Aligns;

    /**
     * Invoke
     */
    public function __invoke(App $app): static
    {
        $width = $app->terminal()->cols() - 8;
        $height = $app->terminal()->lines() - 5;

        $name = text('Tell me your name!');

        $lines = [
            '👋',
            '',
            'Welcome to SSH-PHP, ' . $name . '!',
            '',
            '🔗  https://github.com/sammyjo20/ssh-php',
            '',
            '',
            '❤️',
            '',
            'Support the project https://github.com/sponsors/sammyjo20',
        ];

        $this->center($lines, $width, $height)
            ->each($this->line(...));

        return $this;
    }
}
