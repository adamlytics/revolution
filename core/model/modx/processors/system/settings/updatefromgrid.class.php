<?php
require_once (dirname(__FILE__) . '/update.class.php');

/**
 * Update a setting from a grid
 *
 * @param string $key The key of the setting
 * @param string $oldkey The old key of the setting
 * @param string $value The value of the setting
 * @param string $area The area for the setting
 * @param string $name The lexicon name for the setting
 * @param string $description The lexicon description for the setting
 *
 * @package modx
 * @subpackage processors.system.settings
 */
class modSystemSettingsUpdateFromGridProcessor extends modSystemSettingsUpdateProcessor {
    public function initialize() {
        $data = $this->getProperty('data');
        if (empty($data)) return $this->modx->lexicon('invalid_data');
        $properties = $this->modx->fromJSON($data);
        $this->setProperties($properties);

        $key = $this->getProperty('key');
        if (empty($key)) return $this->modx->lexicon('setting_err_ns');
        $this->setting = $this->modx->getObject('modSystemSetting',$key);
        if (empty($this->setting)) return $this->modx->lexicon('setting_err_nf');
        return true;
    }
}
return 'modSystemSettingsUpdateFromGridProcessor';