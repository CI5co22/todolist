<?php

namespace Config;

/**
 * Paths
 *
 * Holds the paths that are used by the system to
 * locate the main directories, app, system, etc.
 *
 * Modifying these allows you to restructure your application,
 * share a system folder between multiple applications, and more.
 *
 * All paths are relative to the project's root folder.
 *
 * NOTE: This class is required prior to Autoloader instantiation,
 *       and does not extend BaseConfig.
 *
 * @immutable
 */
class Paths
{

    public string $systemDirectory = __DIR__ . '/../system';      // 1 nivel arriba
    public string $appDirectory = __DIR__ . '/..';               // OK
    public string $writableDirectory = __DIR__ . '/../writable'; // 1 nivel arriba  
    public string $testsDirectory = __DIR__ . '/../tests';       // 1 nivel arriba
    public string $viewDirectory = __DIR__ . '/../Views';
}
