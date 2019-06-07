<?php

declare(strict_types=1);

return [

    /*
     * The output path for the generated documentation.
     * This path should be relative to the root of your application.
     */
    'output'  => 'public/docs',

    // The router to be used (Laravel or Dingo).
    'router'  => 'laravel',

    // Generate a Postman collection in addition to HTML docs.
    'postman' => [
        // Specify whether the Postman collection should be generated.
        'enabled'     => false,

        // The name for the exported Postman collection. Default: config('app.name')." API"
        'name'        => null,

        // The description for the exported Postman collection.
        'description' => null,
    ],

    /*
     * The routes for which documentation should be generated.
     * Each group contains rules defining which routes should be included ('match', 'include' and 'exclude' sections)
     * and rules which should be applied to them ('apply' section).
     */
    'routes'  => [
        [
            /*
             * Specify conditions to determine what routes will be parsed in this group.
             * A route must fulfill ALL conditions to pass.
             */
            'match'   => [

                // Match only routes whose domains match this pattern (use * as a wildcard to match any characters).
                'domains'  => [
                    '*',
                    // 'domain1.*',
                ],

                // Match only routes whose paths match this pattern (use * as a wildcard to match any characters).
                'prefixes' => [
                    'api/*',
                    // 'users/*',
                ],

                /*
                 * Match only routes registered under this version. This option is ignored for Laravel router.
                 * Note that wildcards are not supported.
                 */
                'versions' => [
                    'v1',
                ],
            ],

            /*
             * Include these routes when generating documentation,
             * even if they did not match the rules above.
             * Note that the route must be referenced by name here (wildcards are supported).
             */
            'include' => [
                // 'users.index', 'healthcheck*'
            ],

            /*
             * Exclude these routes when generating documentation,
             * even if they matched the rules above.
             * Note that the route must be referenced by name here (wildcards are supported).
             */
            'exclude' => [
                // 'users.create', 'admin.*'
            ],

            // Specify rules to be applied to all the routes in this group when generating documentation
            'apply'   => [
                // Specify headers to be added to the example requests
                'headers'        => [
                    'Authorization' => 'Bearer {token}',
                    // 'Api-Version' => 'v2',
                ],

                /*
                 * If no @response or @transformer declarations are found for the route,
                 * we'll try to get a sample response by attempting an API call.
                 * Configure the settings for the API call here.
                 */
                'response_calls' => [
                    /*
                     * API calls will be made only for routes in this group matching these HTTP methods (GET, POST, etc).
                     * List the methods here or use '*' to mean all methods. Leave empty to disable API calls.
                     */
                    'methods'  => ['GET'],

                    /*
                     * For URLs which have parameters (/users/{user}, /orders/{id?}),
                     * specify what values the parameters should be replaced with.
                     * Note that you must specify the full parameter,
                     * including curly brackets and question marks if any.
                     *
                     * You may also specify the preceding path, to allow for variations,
                     * for instance 'users/{id}' => 1 and 'apps/{id}' => 'htTviP'.
                     * However, there must only be one parameter per path.
                     */
                    'bindings' => [
                        '{user}' => '1b98187c-f3eb-43dc-bde2-6cc56b583375',
                    ],

                    /*
                     * Laravel config variables which should be set for the API call.
                     * This is a good place to ensure that notifications, emails
                     * and other external services are not triggered
                     * during the documentation API calls
                     */
                    'config'   => [
                        'app.env'   => 'documentation',
                        'app.debug' => false,
                        // 'service.key' => 'value',
                    ],

                    // Headers which should be sent with the API call.
                    'headers'  => [
                        'Content-Type' => 'application/json',
                        'Accept'       => 'application/json',
                        // 'key' => 'value',
                    ],

                    // Cookies which should be sent with the API call.
                    'cookies'  => [
                        // 'name' => 'value'
                    ],

                    // Query parameters which should be sent with the API call.
                    'query'    => [
                        // 'key' => 'value',
                    ],

                    // Body parameters which should be sent with the API call.
                    'body'     => [
                        // 'key' => 'value',
                    ],
                ],
            ],
        ],
    ],

    'logo'              => false,
    'default_group'     => 'general',
    'example_languages' => [
        'bash',
        'javascript',
    ],

    'fractal' => [
        'serializer' => null,
    ],

    'faker_seed' => '1234',
];
