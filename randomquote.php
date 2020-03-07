<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class FortunePlugin
 * @package Grav\Plugin
 */
class RandomQuotePlugin extends Plugin
{
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onTwigSiteVariables'   => ['onTwigSiteVariables', 0],
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
        ];
    }


    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        $this->enable([
            'onPagesInitialized' => ['onPagesInitialized', 0]
        ]);
    }

    public function onPagesInitialized(Event $e)
    {
        $config = $this->grav['config'];
        $quotes = $config->get('plugins.randomquote.quotes');
        $numberofquotes = count($quotes);
        $randomquote = $quotes[random_int(0,$numberofquotes-1)];

        $this->grav['twig']->twig_vars['randomquote']['text'] = $randomquote['quote-text'];
        $this->grav['twig']->twig_vars['randomquote']['name'] = $randomquote['quote-name'];
    }

    public function onTwigSiteVariables()
    {
        if ($this->config->get('plugins.randomquote.built_in_css')) {
            $this->grav['assets']->addCss('plugin://randomquote/assets/randomquote.css');
            $this->grav['assets']->addCss('//fonts.googleapis.com/css?family=Caveat&display=swap');
            
        }
    }

    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

}
