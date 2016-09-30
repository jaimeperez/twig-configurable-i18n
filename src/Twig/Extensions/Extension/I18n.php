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
     * @var string The function to use to translate singular sentences. Defaults to gettext().
     */
    protected $singular = 'gettext';

    /**
     * @var string The function to use to translate plural sentences. Defaults to ngettext().
     */
    protected $plural = 'ngettext';

    public function initRuntime(\Twig_Environment $environment)
    {
        if ($environment instanceof \JaimePerez\TwigConfigurableI18n\Twig\Environment) {
            $options = $environment->getOptions();
            if (array_key_exists('translation_function', $options)) {
                $this->singular = $options['translation_function'];
            }
            if (array_key_exists('translation_function_plural', $options)) {
                $this->plural = $options['translation_function_plural'];
            }
        }
        parent::initRuntime($environment);
    }


    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(new Trans());
    }


    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
     */
    public function getFilters()
    {

        return array(
            new \Twig_SimpleFilter('trans', $this->singular),
            new \Twig_SimpleFilter('transchoice', $this->plural)
        );
    }
}
