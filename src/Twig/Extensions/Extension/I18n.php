<?php
/**
 * An internationalization extension for Twig that allows you to specify the functions to use for translation.
 *
 * @author Jaime Pérez Crespo
 */
namespace JaimePerez\TwigConfigurableI18n\Twig\Extensions\Extension;

use JaimePerez\TwigConfigurableI18n\Twig\Extensions\TokenParser\Trans;
use Twig_Extensions_Extension_I18n;

class I18n extends Twig_Extensions_Extension_I18n
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(new Trans());
    }
}
