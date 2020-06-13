<?php
/**
 * This file is part of the Composer Merge plugin.
 *
 * Copyright (C) 2015 Bryan Davis, Wikimedia Foundation, and contributors
 *
 * This software may be modified and distributed under the terms of the MIT
 * license. See the LICENSE file for details.
 */

namespace Wikimedia\Composer\Merge;

/**
 * Adapted from
 * http://cgit.drupalcode.org/drupal/tree/core/lib/Drupal/Component/Utility/NestedArray.php
 * @ f86a4d650d5af0b82a3981e09977055fa63f6f2e
 */
class NestedArray
{

    /**
     * Merges multiple arrays, recursively, and returns the merged array.
     *
     * This function is similar to PHP's array_merge_recursive() function, but
     * it handles non-array values differently. When merging values that are
     * not both arrays, the latter value replaces the former rather than
     * merging with it.
     *
     * Example:
     *
     * @code
     * $link_options_1 = array('fragment' => 'x', 'attributes' => array('title' => t('X'), 'class' => array('a', 'b')));
     * $link_options_2 = array('fragment' => 'y', 'attributes' => array('title' => t('Y'), 'class' => array('c', 'd')));
     *
     * // This results in array('fragment' => array('x', 'y'), 'attributes' =>
     * // array('title' => array(t('X'), t('Y')), 'class' => array('a', 'b',
     * // 'c', 'd'))).
     * $incorrect = array_merge_recursive($link_options_1, $link_options_2);
     *
     * // This results in array('fragment' => 'y', 'attributes' =>
     * // array('title' => t('Y'), 'class' => array('a', 'b', 'c', 'd'))).
     * $correct = NestedArray::mergeDeep($link_options_1, $link_options_2);
     * @endcode
     *
     * @param array ...
     *   Arrays to merge.
     *
     * @return array
     *   The merged array.
     *
     * @see NestedArray::mergeDeepArray()
     */
    public static function mergeDeep()
    {
        return self::mergeDeepArray(func_get_args());
    }

    /**
     * Merges multiple arrays, recursively, and returns the merged array.
     *
     * This function is equivalent to NestedArray::mergeDeep(), except the
     * input arrays are passed as a single array parameter rather than
     * a variable parameter list.
     *
     * The following are equivalent:
     * - NestedArray::mergeDeep($a, $b);
     * - NestedArray::mergeDeepArray(array($a, $b));
     *
     * The following are also equivalent:
     * - call_user_func_array('NestedArray::mergeDeep', $arrays_to_merge);
     * - NestedArray::mergeDeepArray($arrays_to_merge);
     *
     * @param array $arrays
     *   An arrays of arrays to merge.
     * @param bool  $preserveIntegerKeys
     *   (optional) If given, integer keys will be preserved and merged
     *   instead of appended. Defaults to false.
     *
     * @return array
     *   The merged array.
     *
     * @see NestedArray::mergeDeep()
     */
    public static function mergeDeepArray(
        array $arrays,
        $preserveIntegerKeys = false
    ) {
        $result = array();
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                // Renumber integer keys as array_merge_recursive() does
                // unless $preserveIntegerKeys is set to TRUE. Note that PHP
                // automatically converts array keys that are integer strings
                // (e.g., '1') to integers.
                if (is_integer($key) && !$preserveIntegerKeys) {
                    $result[] = $value;
                } elseif (isset($result[$key]) &&
                    is_array($result[$key]) &&
                    is_array($value)
                ) {
                    // Recurse when both values are arrays.
                    $result[$key] = self::mergeDeepArray(
                        array($result[$key], $value),
                        $preserveIntegerKeys
                    );
                } else {
                    // Otherwise, use the latter value, overriding any
                    // previous value.
                    $result[$key] = $value;
                }
            }
        }
        return $result;
    }
}
// vim:sw=4:ts=4:sts=4:et:
