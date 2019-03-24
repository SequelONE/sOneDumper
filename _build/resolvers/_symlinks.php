<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/sOneDumper/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/sonedumper')) {
            $cache->deleteTree(
                $dev . 'assets/components/sonedumper/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/sonedumper/', $dev . 'assets/components/sonedumper');
        }
        if (!is_link($dev . 'core/components/sonedumper')) {
            $cache->deleteTree(
                $dev . 'core/components/sonedumper/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/sonedumper/', $dev . 'core/components/sonedumper');
        }
    }
}

return true;