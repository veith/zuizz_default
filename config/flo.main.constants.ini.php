<?php
/**
 * Directories
 */

define ('ZU_DIR_CONFIG', PROJECT_DIR . 'config/');
define ('ZU_DIR_CUSTOM', PROJECT_DIR . 'custom/');
define ('ZU_DIR_CUSTOM_SKINS', PROJECT_DIR . 'custom/skins/');
define ('ZU_DIR_CUSTOM_CONFIGS', PROJECT_DIR . 'custom/config/');
define ('ZU_DIR_LIBS', PROJECT_DIR . '/zuizz/libs.common/');
define ('ZU_DIR_LIBS_EXTERNAL', PROJECT_DIR . 'libsExternal/');
define ('ZU_DIR_DATA', PROJECT_DIR . 'data/');
define ('ZU_DIR_FEATURE', PROJECT_DIR . 'feature/');
define ('ZU_DIR_LOG', PROJECT_DIR . 'data/logs/');
define ('ZU_DIR_TMP', PROJECT_DIR . 'data/temp/');
define ('ZU_DIR_SESSION', PROJECT_DIR . 'data/session/');
define ('ZU_DIR_PAGES', PROJECT_DIR . 'custom/pages/');
define ('ZU_DIR_PERSPECIVE_WEB', PROJECT_DIR . '/zuizz/perspective/web/pagelayouts/');
define ('ZU_DIR_PERSPECIVE_WEB_CUSTOM', PROJECT_DIR . 'custom/skins/web.perspective.pagelayout/');
define ('ZU_DIR_COMPONENTS', PROJECT_DIR . '/zuizz/perspective/component/');
define ('ZU_DIR_COMPONENTS_CUSTOM', PROJECT_DIR . 'custom/skins/web.component/');
define ('ZU_DIR_MEDIA', '/media/');
define ('ZU_DIR_LIBS_WEB', '/jslibs/');
define ('ZU_DIR_CSS', '/css/');
define ('ZU_DIR_DOCTRINE', ZU_DIR_LIBS_EXTERNAL);

/**
 * Time
 */
define ('ZU_NOW', time());
define ('ZU_NOW_MYSQL', date('Y-m-d H:i:s', time()));

/*
 * USER ID Mapping
 */
define ('EVERYONE', 3);

/**
 * Mehtodcontroller
 */
define ('ZU_STOP', 1);
define ('ZU_NOACTION', 2);
define ('ZU_NOPOST', 3);
define ('ZU_NOCUSTOM', 4);