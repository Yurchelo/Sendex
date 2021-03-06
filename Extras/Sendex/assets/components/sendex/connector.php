<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var Sendex $Sendex */
$Sendex = $modx->getService('Sendex', 'Sendex', MODX_CORE_PATH . 'components/sendex/model/');
$modx->lexicon->load('sendex:default');

// handle request
$corePath = $modx->getOption('sendex_core_path', null, $modx->getOption('core_path') . 'components/sendex/');
$path = $modx->getOption('processorsPath', $Sendex->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);