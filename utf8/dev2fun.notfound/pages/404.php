<?php
/**
 * Created by PhpStorm.
 * User: darkfriend <hi@darkfriend.ru>
 * Date: 31.05.2020
 * Time: 21:00
 */

use Bitrix\Main\Localization\Loc;

/** @var array $templates */
?>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php');
CHTTP::SetStatus('404 Not Found');
@define('ERROR_404','Y');
$APPLICATION->SetTitle(Loc::getMessage("DEV2FUN_NOTFOUND_TITLE_NOT_FOUND"));

if(\is_file($templates[$template])) {
    require $templates[$template];
} else {
    $msg = new CAdminMessage([
        'MESSAGE' => Loc::getMessage('DEV2FUN_NOTFOUND_NO_TEMPLATE'),
        'TYPE' => 'ERROR',
        'HTML' => true,
    ]);
    echo $msg->Show();
}

require($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/footer.php');
?>