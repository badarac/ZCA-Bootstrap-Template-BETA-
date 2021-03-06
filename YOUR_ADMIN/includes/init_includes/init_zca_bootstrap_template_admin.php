<?php
// -----
// Configuration initialization for the ZCAdditions' bootstrap template.
//
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

// -----
// If the current template has just been CHANGED to the ZCA bootstrap one, ensure that the
// configuration values required have either been set (if new) or contain the recommended
// values for the template (if existing).
//
if ($current_page == (FILENAME_TEMPLATE_SELECT . '.php') && isset($_GET['action']) && $_GET['action'] == 'save') {
    if (isset($_POST['ln']) && $_POST['ln'] == 'bootstrap') {
        // -----
        // First, check that the non-built-in configuration settings for the template exist and create them
        // if not yet set.
        //
        // 1) Configuration->Layout Settings:
        //
        if (!defined('SET_COLUMN_LEFT_LAYOUT')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Responsive Left Column Width', 'SET_COLUMN_LEFT_LAYOUT', '3', 'Set Width of Left Column<br />Default is <b>3</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 200, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
            );
        }
        if (!defined('SET_COLUMN_CENTER_LAYOUT')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Responsive Center Column Width', 'SET_COLUMN_CENTER_LAYOUT', '6', 'Set Width of Center Column<br />Default is <b>6</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
            );
        }
        if (!defined('SET_COLUMN_RIGHT_LAYOUT')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Responsive Right Column Width', 'SET_COLUMN_RIGHT_LAYOUT', '3', 'Set Width of Right Column<br />Default is <b>3</b>, Total columns <b>12</b>.<br />Responsive Left, Center & Right Column Width must sum to 12', 19, NOW(), 202, NULL, 'zen_cfg_select_option(array(\'0\', \'1\', \'2\', \'3\', \'4\', \'5\', \'6\', \'7\', \'8\', \'9\', \'10\', \'11\', \'12\'),')"
            );
        }
        
        // -----
        // 2) Configuration->Product Listing
        //
        if (!defined('PRODUCT_LISTING_LAYOUT_STYLE')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Listing Layout Style', 'PRODUCT_LISTING_LAYOUT_STYLE', 'columns', '<br /><br />Select the layout style:<br />Each product can be listed in its own row (rows option) or products can be listed in multiple columns per row (columns option)', 8, NOW(), 200, NULL, 'zen_cfg_select_option(array(''rows'',''columns''),')"
            );
            define('PRODUCT_LISTING_LAYOUT_STYLE', 'columns');
        }
        if (!defined('PRODUCT_LISTING_COLUMNS_PER_ROW')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Listing Columns Per Row', 'PRODUCT_LISTING_COLUMNS_PER_ROW', '2', '<br /><br />Select the number of columns of products to show in each row in the product listing. The default setting is 2.', 8, NOW(), 201, NULL , NULL)"
            );
        }
        
        // -----
        // 3) Configuration->Product Info
        //
//-bof-GitHub#21-Add control to disable template's modal image display.
        if (!defined('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Enable <em>Bootstrap</em> Modal Image Popups', 'PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS', 'Yes', 'Should the ZCA <code>bootstrap</code> template display pop-up product images using its <em>modal</em> dialog? If your store uses an image-display plugin (like <b>Zen ColorBox</b>), set this value to <em>No</em>. Default: <b>Yes</b>', 18, NOW(), 201, NULL, 'zen_cfg_select_option(array(\'No\', \'Yes\'),')"
            );
        }
//-eof-GitHub#21
        if (!defined('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Use Bootstrap Additional Image Carousel', 'PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_SLIDE', '0', 'Default is <b>0</b>, Opens images in an individual modal, <b>1</b> opens images in a single modal with carousel.', 18, NOW(), 202, NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),')"
            );
        }
        if (!defined('PRODUCT_INFO_SHOW_MANUFACTURER_BOX')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Display the Manufacturer Sidebox on Info Page', 'PRODUCT_INFO_SHOW_MANUFACTURER_BOX', '1', 'Used by the ZCA Bootstrap template.  Default is <b>1</b>, Displays on Info Page, <b>0</b> Does not Display.', 18, NOW(), 203, NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),')"
            );
        }
        if (!defined('PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX')) {
            $db->Execute(
                "INSERT INTO " . TABLE_CONFIGURATION . "
                    (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, date_added, sort_order, use_function, set_function)
                 VALUES
                    ('Display the Notifications Sidebox on Info Page', 'PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX', '1', 'Used by the ZCA Bootstrap template. Default is <b>1</b>, Displays on Info Page, <b>0</b> Does not Display.', 18, NOW(), 204, NULL, 'zen_cfg_select_option(array(\'0\', \'1\'),')"
            );
        }
        
        // -----
        // Next, update the description of a couple of the built-in settings to let the store owner know that
        // they're not applicable/used when the ZCA bootstrap template is active.
        //
        $db->Execute(
            "UPDATE " . TABLE_CONFIGURATION . "
                SET configuration_description = 'Width of the Left Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>',
                    last_modified = now()
              WHERE configuration_key = 'BOX_WIDTH_LEFT' LIMIT 1"
        );
        $db->Execute(
            "UPDATE " . TABLE_CONFIGURATION . "
                SET configuration_description = 'Width of the Right Column Boxes<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>',
                    last_modified = now()
              WHERE configuration_key = 'BOX_WIDTH_RIGHT' LIMIT 1"
        );
        $db->Execute(
            "UPDATE " . TABLE_CONFIGURATION . "
                SET configuration_description = 'Width of the Left Column<br />px may be included<br />Default = 150px<br /><br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>',
                    last_modified = now()
              WHERE configuration_key = 'COLUMN_WIDTH_LEFT' LIMIT 1"
        );
        $db->Execute(
            "UPDATE " . TABLE_CONFIGURATION . "
                SET configuration_description = 'Width of the Right Column<br />px may be included<br />Default = 150px<br /><b>This configuration has no affect with the ZCA Responsive Components or ZCA Bootstrap Themes<b/>',
                    last_modified = now()
              WHERE configuration_key = 'COLUMN_WIDTH_RIGHT' LIMIT 1"
        );

        // -----
        // Finally, compare the Zen Cart built-in settings to see if they're different from the ZCA Bootstrap
        // recommendations.  If so, create a log file identifying what's different and let the current admin
        // know about the changes.
        //
        $zca_bootstrap_configs = array(
            'IMAGE_USE_CSS_BUTTONS' => 'Yes',
            'MAX_DISPLAY_PAGE_LINKS' => '3',
            'BREAD_CRUMBS_SEPARATOR' => '&nbsp;/&nbsp;',
            'CATEGORIES_SEPARATOR_SUBS' => '&vdash;&nbsp;',
            'CATEGORIES_COUNT_PREFIX' => '',
            'CATEGORIES_COUNT_SUFFIX' => '',
            'SHOW_SHIPPING_ESTIMATOR_BUTTON' => '2',
            'MAX_DISPLAY_PRODUCTS_LISTING' => '10',
            'MAX_DISPLAY_SEARCH_RESULTS_FEATURED' => '4',
            'MAX_DISPLAY_NEW_PRODUCTS' => '4',
            'MAX_DISPLAY_SPECIAL_PRODUCTS_INDEX' => '4',
            'PRODUCT_LIST_PRICE_BUY_NOW' => '1',
            'PRODUCT_LISTING_MULTIPLE_ADD_TO_CART' => '0',
            'MAX_RANDOM_SELECT_NEW' => '2',
            'MAX_DISPLAY_CATEGORIES_PER_ROW' => '2',
            'SHOW_PRODUCT_INFO_COLUMNS_NEW_PRODUCTS' => '2',
            'SHOW_PRODUCT_INFO_COLUMNS_FEATURED_PRODUCTS' => '2',
            'SHOW_PRODUCT_INFO_COLUMNS_SPECIALS_PRODUCTS' => '2'
        );
        $sql_update = '';
        foreach ($zca_bootstrap_configs as $key => $value) {
            if (constant($key) != $value) {
                $sql_update .= ("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '$value', last_modified = now() WHERE configuration_key = '$key' LIMIT 1;" . PHP_EOL);
            }
        }
        
        if ($sql_update != '') {
            $logfile_name = DIR_FS_LOGS . '/zca_bootstrap_' . date('YmdHis') . '.log';
            $messageStack->add("Some configuration settings are different from the <em>bootstrap</em> template's defaults.  See $logfile_name for details.", 'warning');
            
            $logfile_data = 'The ZCA "bootstrap" template was activated on ' . date('Y-m-d H:i:s') . ' and some of its default settings are different than those currently set.  You can copy and paste the following SQL into your admin\'s Tools->Install SQL Patches to change those defaults:' . PHP_EOL . PHP_EOL . $sql_update;
            error_log($logfile_data, 3, $logfile_name);
        }
    }
}
