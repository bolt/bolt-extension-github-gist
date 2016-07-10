<?php

namespace Bolt\Extension\BoltGitHubGist;

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
    public function twigGist($gist = null)
    {
        if ($gist === null) {
            return new \Twig_Markup('You must provide a gist to embed.', 'UTF-8');
        }

        $html = sprintf('<script src="//gist.github.com/%s"></script>', $gist);

        return new \Twig_Markup($html, 'UTF-8');
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'gist', 'twigGist'
        ];
    }
}
