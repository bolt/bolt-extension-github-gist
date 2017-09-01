<?php

namespace Bolt\Extension\Bolt\GitHubGist;

use Bolt\Extension\SimpleExtension;

/**
 * GitHub Gist extension loader class.
 *
 * @author Bob den Otter <bob@twokings.nl>
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class GitHubGistExtension extends SimpleExtension
{
    /**
     * @param string $gist
     *
     * @return \Twig_Markup
     */
    public function gistCallback($gist = null)
    {
        if ($gist === null) {
            return new \Twig_Markup('You must provide a gist ID to embed.', 'UTF-8');
        }
        $html = sprintf('<script src="https://gist.github.com/%s.js"></script>', $gist);

        return new \Twig_Markup($html, 'UTF-8');
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'gist' => 'gistCallback',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function isSafe()
    {
        return true;
    }
}
