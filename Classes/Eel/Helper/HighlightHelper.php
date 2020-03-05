<?php
declare(strict_types=1);

namespace PunktDe\CodeView\Eel\Helper;

use Highlight\Highlighter;
use Neos\Eel\ProtectedContextAwareInterface;

class HighlightHelper implements ProtectedContextAwareInterface
{
    /**
     * @param string $code
     * @param string|null $language
     * @return string
     */
    public function highlight(string $code, string $language = null): string
    {
        $highlighter = new Highlighter();

        try {
            $highlighted = $language ? $highlighter->highlight($language, $code) : $highlighter->highlightAuto($code);
            return $highlighted->value;
        } catch (\Exception $e) {
            return $code;
        }
    }

    /**
     * All methods are considered safe
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
