<?php
/**
 * The $airports variable contains array of arrays of airports (see airports.php)
 * What can be put instead of placeholder so that function returns the unique first letter of each airport name
 * in alphabetical order
 *
 * Create a PhpUnit test (GetUniqueFirstLettersTest) which will check this behavior
 *
 * @param  array  $airports
 * @return string[]
 */
function getUniqueFirstLetters(array $airports) : array
{
    $letters = array();
    foreach ($airports as $airport){
        $letters []= substr($airport["name"], 0, 1);
    }
    $firstLetters = array_unique($letters);
    sort($firstLetters);
    return $firstLetters;
}

function filterByFirstLetter(array $airports, string $firstLetter) : array
{
    $resultArr = array();
    foreach ($airports as $airport){
        if (substr($airport["name"], 0, 1) == $firstLetter){
            $resultArr []= $airport;
        }
    }
    return $resultArr;
}

function sorting(array $airports, string $value) : array
{
    $sortColumn = array_column($airports, $value);
    array_multisort($sortColumn, SORT_ASC, $airports);
    return $airports;
}

function filterByState (array $airports, $state) : array
{
    $resultArr = array();
    foreach ($airports as $airport){
        if ( $airport["state"] == $state){
            $resultArr []= $airport;
        }
    }
    return $resultArr;
}

function resetPage(array $get) : array
{
    $resultArr = $get;
    if (!empty($get['page'])){
        unset($resultArr['page']);
    }
    return $resultArr;
}