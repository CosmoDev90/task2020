<?php

/**
 * Get all pages.
 *
 * @return object
 */
function get_pages()
{
    $root = $_SERVER['DOCUMENT_ROOT'];

    return [
        [
            'key' => 'task-1',
            'route' => '/task-1',
            'template' => $root . '/pages/task-1.phtml',
            'title' => 'Task 1',
        ],
        [
            'key' => 'task-2',
            'route' => '/task-2',
            'template' => $root . '/pages/task-2.phtml',
            'title' => 'Task 2',
        ],
        [
            'key' => 'task-3',
            'route' => '/task-3',
            'template' => $root . '/pages/task-3.phtml',
            'title' => 'Task 3',
        ],
        [
            'key' => 'task-4',
            'route' => '/task-4',
            'template' => $root . '/pages/task-4.phtml',
            'title' => 'Task 4',
        ],
        [
            'key' => 'git-hub',
            'route' => 'https://github.com/CosmoDev90/task2020',
            'template' => null,
            'title' => 'GitHub<br>Repo',
        ]
    ];
}

/**
 * Get page data for specific page.
 *
 * @param string $route
 * @return object
 */
function get_page($route)
{
    $pages = get_pages();
    foreach ($pages as $page) {
        if ($page['route'] === $route)
        {
            return $page;
        }
    }
}

function router()
{
    $request = $_SERVER['REQUEST_URI'];
    $root = $_SERVER['DOCUMENT_ROOT'];

    $data = [];

    switch ($request) {
        case '/':
        case '' :
        case '/task-1':
            $data = get_page('/task-1');
            break;
        case '/task-2':
            $data = get_page('/task-2');
            break;
        case '/task-3':
            $data = get_page('/task-3');
            break;
        case '/task-4':
            $data = get_page('/task-4');
            break;
        default:
            http_response_code(404);
            $data = [
                'template' => $root . '/pages/404.phtml',
            ];
    }

    $data['config'] = [
        'nav' => $root . '/components/nav.phtml',
        'site' => $root . '/components/site.phtml',
        'style' => '/css/style.css',
    ];

    return $data;
}
