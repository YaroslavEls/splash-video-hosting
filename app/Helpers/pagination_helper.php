<?php

use \CodeIgniter\Exceptions\PageNotFoundException;

function paginationSetup($current, $arg, $page, $count) {
    if ($current['filter'] != $arg) {
        $current['filter'] = $arg;
        $current['pages'] = $count == 0 ? 1 : ceil($count/$current['perPage']);
    }

    if ($page > $current['pages'] || $page < 0) {
        throw new PageNotFoundException();
    }

    return $current;
}