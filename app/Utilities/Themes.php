<?php

namespace App\Utilities;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Themes
{
    public static function svgIcon($path, $iconClass = '', $svgClass = '', $wrapper = 'span'): string
    {
        $path = url('/assets/icons/duotune/' . $path);
        $svg_content = file_get_contents($path);

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }

        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }

        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }

        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }

        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }

        $path = $dom->getElementsByTagName('path');
        foreach ($path as $el) {
            $el->removeAttribute('id');
        }

        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }

        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }

        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }

        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = ['svg-icon'];

        if (!empty($iconClass)) {
            $cls = array_merge($cls, explode(' ', $iconClass));
        }

        return "<$wrapper class=\"" . implode(' ', $cls) . '">' . $string . "</$wrapper>";
    }

    public static function avatar($name)
    {
        $param = [
            'background' => 'EBF4FF',
            'color' => '7F9CF4',
            'name' => Str::upper($name),
        ];
        $url = 'https://ui-avatars.com/api/?' . http_build_query($param);

        return $url;
    }

    public static function checkUrlForMenu($path = null, $prefix = null, $mode = 'single')
    {
        if (request()->segment(1) == $prefix) {
            if ($mode == 'single') {
                return 'active';
            }
            if ($mode == 'parent') {
                return 'here show';
            }
            if ($mode == 'parent-with-child' || $mode == 'parent-with-child-inner') {
                if (request()->segment(2) == $path || request()->segment(3) == $path) {
                    return 'hover show';
                }
            }
            if ($mode == 'child') {
                if (request()->segment(2) == $path) {
                    return 'active';
                }
            }
            if ($mode == 'third') {
                if (request()->segment(3) == $path) {
                    return 'active';
                }
            }
            if ($mode == 'text') {
                return 'text-primary';
            }
        }
        if ($mode == 'text') {
            return 'text-muted';
        }

        return null;
    }

    public static function asset($dir)
    {
        $dirs = explode('.', $dir);
        $count_dirs = count($dirs);
        $extract_dir = substr($dir, 0, 1);
        $dir = $extract_dir == '/' ? substr($dir, 1) : $dir;
//        $url = 'https://cazh-cdn.sgp1.digitaloceanspaces.com/cazh-sales-management/devs/';
        $url = url('assets').'/';
        $mode = env('CDN_ASSET', true);
        if (in_array($dirs[$count_dirs - 1], ['js', 'css'])) {
            $dir = $dir . '?id=' . now()->format('dmY');
        }
        if ($mode) {
            return $url . $dir;
        }

        return url($dir);
    }
}
