<?php

/**
 * Determine if current page has previous and next content.
 *
 * @param object $nav
 * @return array
 */
function get_pagination($nav)
{
    $current = $nav['key'];
    $pages = $nav['pages'];

    $index = null;
    // locate current index within pages
    for ($i=0; $i < count($pages); $i++) { 
        if ($pages[$i]['key'] === $current)
        {
            $index = $i;
        }
    }

    $pagination_data = [];

    // if index > 0 include previous [index - 1]
    if ($index > 0)
    {
        $pagination_data[] = $pages[$index - 1];
    }

    // if index < count($pages) include next [index + 1]
    if ($index < count($pages))
    {
        $pagination_data[] = $pages[$index + 1];
    }

    return $pagination_data;
}