<?php
/**
 * Copyright (C) 2011, Maxim S. Tsepkov
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Implements <em> and <strong>
 *
 * Rules form markdown definition:
 *
 *   *  to produce <em> a string must be surrounded with * or _
 *   *  double * or _ used to produce <strong>
 *   *  if * and _ surrounded by spaces, it's treated as literals
 *   *  * and _ are backslash (/) escapeable
 *
 */

require_once __DIR__ . '/../Filter.php';

class Markdown_Filter_Emphasis extends Markdown_Filter
{
    public function transform($text)
    {
        // strong
        $text = preg_replace(
            '/((?<!\\\\)[*_]){2}(.*?)((?<!\\\\)[*_]){2}/s',
            '<strong>$2</strong>',
        $text
        );

        // emphasis
        $text = preg_replace(
            '/(?<!\\\\)[*_](?!\s)(.*?)(?<!\\\\)[*_]/s',
            '<em>$1</em>',
            $text
        );

        return $text;
    }
}
