<?php
/**
 * A class implementing a token parser for translation nodes.
 *
 * @author Jaime Pérez Crespo
 */
namespace JaimePerez\TwigConfigurableI18n\Twig\Extensions\TokenParser;

use JaimePerez\TwigConfigurableI18n\Twig\Extensions\Node\Trans as NodeTrans;
use Twig_Token;
use Twig_Extensions_TokenParser_Trans;

class Trans extends Twig_Extensions_TokenParser_Trans
{
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return NodeTrans A Twig_Node instance
     */
    public function parse(Twig_Token $token)
    {
        $parsed = parent::parse($token);
        return new NodeTrans(
            $parsed->getNode('body'),
            $parsed->getNode('plural'),
            $parsed->getNode('count'),
            $parsed->getNode('notes'),
            $parsed->getLine(),
            $parsed->getNodeTag()
        );
    }
}
