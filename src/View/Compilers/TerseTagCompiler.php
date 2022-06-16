<?php

namespace Nihilsen\LaravelBladeTerse\View\Compilers;

use Illuminate\Support\Str;
use Illuminate\View\Compilers\ComponentTagCompiler;

class TerseTagCompiler extends ComponentTagCompiler
{
    /**
     * The regular expression pattern encoding the beginning of
     * a valid "terse" component tag.
     * 
     * Examples:
     *     <x-foo.bar="qux"
     *     <x-foo.bar=`$qux`
     * 
     * @var string
     */
    public const TERSE_TAG_PATTERN = "/
        <
            \s*
            (?<tag>
                x[-\:]
                [\w\-\:\.]*
                (?<attribute>
                    [\w\-]+
                )
            )
            =
            (?<value>
                \"[^\"]+\"
                |
                \\\'[^\\\']+\\\'
                |
                `[^`]+`
                |
                [^\s>]+
            )
    /xU";

    public function compile($value)
    {
        return $this->compileTerseTags($value);
    }

    /**
     * Convert terse tag openings to valid blade component openenings,
     * with the terse attribute and value appended, then recompile
     * like normal blade components.
     *
     * Examples: 
     *     <x-foo.bar="qux"  ~> <x-foo.bar bar="qux"
     *     <x-foo.bar=`$qux` ~> <x-foo.bar :bar="$qux"
     *
     * @param string $value
     */
    protected function compileTerseTags($value)
    {
        $value = preg_replace_callback(self::TERSE_TAG_PATTERN, function (array $matches) {
            extract($matches);

            // If terse attribute is bound...
            if (Str::startsWith($value, '`')) {
                /**
                 * Convert backticks to quotes.
                 * 
                 * Use single or double quotes depending on
                 * which of either is not already present in
                 * the value string.
                 */
                $value = Str::replace(
                    '`',
                    strpos($value, '"') ? "'" : '"',
                    $value
                );

                // Prepend ":" to attribute name
                $attribute = Str::start($attribute, ':');
            }

            return "<$tag $attribute=$value";
        }, $value);

        // Recompile the new component tags
        return (new \ReflectionObject($this->blade))
            ->getMethod('compileComponentTags')
            ->invoke($this->blade, $value);
    }
}
