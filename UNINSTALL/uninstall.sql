#############################################################################################
# Bootstrap Template 3.7.4 Uninstall - 2024-11-04 - webchills
# NUR AUSFÜHREN FALLS SIE DAS TEMPLATE VOLLSTÄNDIG ENTFERNEN WOLLEN!!!
#############################################################################################


DELETE FROM admin_pages WHERE page_key = 'toolsZCABootstrapColors' LIMIT 1;
DELETE FROM admin_pages WHERE page_key = 'configBootstrapTemplate' LIMIT 1;

DELETE FROM configuration WHERE configuration_key LIKE '%ZCA_%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%ZCA_%';
DELETE FROM configuration WHERE configuration_key LIKE '%BOOTSTRAP_%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%BOOTSTRAP_%';

DELETE FROM configuration WHERE configuration_key LIKE '%BS4_%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%BS4_%';

DELETE FROM configuration WHERE configuration_key LIKE '%SET_COLUMN_RIGHT_LAYOUT%';
DELETE FROM configuration WHERE configuration_key LIKE '%SET_COLUMN_CENTER_LAYOUT%';
DELETE FROM configuration WHERE configuration_key LIKE '%SET_COLUMN_LEFT_LAYOUT%';
DELETE FROM configuration WHERE configuration_key LIKE '%PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX%';
DELETE FROM configuration WHERE configuration_key LIKE '%PRODUCT_INFO_SHOW_MANUFACTURER_BOX%';

DELETE FROM configuration_language WHERE configuration_key LIKE '%SET_COLUMN_RIGHT_LAYOUT%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%SET_COLUMN_CENTER_LAYOUT%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%SET_COLUMN_LEFT_LAYOUT%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%PRODUCT_INFO_SHOW_NOTIFICATIONS_BOX%';
DELETE FROM configuration_language WHERE configuration_key LIKE '%PRODUCT_INFO_SHOW_MANUFACTURER_BOX%';

DELETE FROM configuration_group WHERE configuration_group_title = 'ZCA Bootstrap Colors' LIMIT 1;
DELETE FROM configuration_group WHERE configuration_group_title = 'Bootstrap Template Settings' LIMIT 1;

UPDATE template_select SET template_dir = 'responsive_classic' WHERE template_id = 1;