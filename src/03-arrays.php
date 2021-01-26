<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param array $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $result = array();
    foreach ($input as $num) {
        for ($i = 0; $i < $num; $i++) {
            $result[] = $num;
        }
    }
    return $result;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param array $input
 * @return int
 */
function getUniqueValue(array $input)
{
    if (!empty($input)) {
        $counts = array_count_values($input);
        $result = [];
        for ($i = 0; $i < count($input); ++$i) {
            foreach ($counts as $key => $value) {
                if ($input[$i] == $key && $value == 1) {
                    $result[] = $input[$i];
                    break;
                }
            }
        }
        if (!empty($result))
            return min($result);
        else
            return 0;
    } else
        return 0;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param array $input
 * @return array
 */
function groupByTag(array $input)
{
    array_multisort($input);
    $result = [];
    foreach ($input as $arr) {
        foreach ($arr['tags'] as $tags) {
            $result[$tags][] = $arr['name'];
        }
    }
    return $result;
}