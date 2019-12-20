<?php

declare(strict_types=1);
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2013 John Judy
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Trianglman\Sqrl\Traits;

trait Base64Url
{
    /**
     * Convert a string to a base64url encoded string
     * @param $string
     * @return string
     */
    protected function base64UrlEncode(string $string): string
    {
        $base64 = base64_encode($string);
        $urlencode = str_replace(['+', '/'], ['-', '_'], $base64);
        return trim($urlencode, '=');
    }

    /**
     * Base 64 URL decodes a string
     *
     * Basically the same as base64 decoding, but replacing URL safe "-" with "+"
     * and "_" with "/". Automatically detects if the trailing "=" padding has
     * been removed.
     *
     * @param string $string
     * @return string
     */
    protected function base64UrlDecode(string $string): string
    {
        $len = strlen($string);
        if ($len % 4 > 0) {
            $string = str_pad($string, 4 - ($len % 4), '=');
        }
        $base64 = str_replace(array('-', '_'), array('+', '/'), $string);
        return base64_decode($base64);
    }
}
