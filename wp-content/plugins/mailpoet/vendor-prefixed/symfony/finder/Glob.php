<?php
namespace MailPoetVendor\Symfony\Component\Finder;
if (!defined('ABSPATH')) exit;
class Glob
{
 public static function toRegex($glob, $strictLeadingDot = \true, $strictWildcardSlash = \true, $delimiter = '#')
 {
 $firstByte = \true;
 $escaping = \false;
 $inCurlies = 0;
 $regex = '';
 $sizeGlob = \strlen($glob);
 for ($i = 0; $i < $sizeGlob; ++$i) {
 $car = $glob[$i];
 if ($firstByte && $strictLeadingDot && '.' !== $car) {
 $regex .= '(?=[^\\.])';
 }
 $firstByte = '/' === $car;
 if ($firstByte && $strictWildcardSlash && isset($glob[$i + 2]) && '**' === $glob[$i + 1] . $glob[$i + 2] && (!isset($glob[$i + 3]) || '/' === $glob[$i + 3])) {
 $car = '[^/]++/';
 if (!isset($glob[$i + 3])) {
 $car .= '?';
 }
 if ($strictLeadingDot) {
 $car = '(?=[^\\.])' . $car;
 }
 $car = '/(?:' . $car . ')*';
 $i += 2 + isset($glob[$i + 3]);
 if ('/' === $delimiter) {
 $car = \str_replace('/', '\\/', $car);
 }
 }
 if ($delimiter === $car || '.' === $car || '(' === $car || ')' === $car || '|' === $car || '+' === $car || '^' === $car || '$' === $car) {
 $regex .= "\\{$car}";
 } elseif ('*' === $car) {
 $regex .= $escaping ? '\\*' : ($strictWildcardSlash ? '[^/]*' : '.*');
 } elseif ('?' === $car) {
 $regex .= $escaping ? '\\?' : ($strictWildcardSlash ? '[^/]' : '.');
 } elseif ('{' === $car) {
 $regex .= $escaping ? '\\{' : '(';
 if (!$escaping) {
 ++$inCurlies;
 }
 } elseif ('}' === $car && $inCurlies) {
 $regex .= $escaping ? '}' : ')';
 if (!$escaping) {
 --$inCurlies;
 }
 } elseif (',' === $car && $inCurlies) {
 $regex .= $escaping ? ',' : '|';
 } elseif ('\\' === $car) {
 if ($escaping) {
 $regex .= '\\\\';
 $escaping = \false;
 } else {
 $escaping = \true;
 }
 continue;
 } else {
 $regex .= $car;
 }
 $escaping = \false;
 }
 return $delimiter . '^' . $regex . '$' . $delimiter;
 }
}
