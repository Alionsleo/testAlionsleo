<?php
foreach($arResult["ITEMS"] as &$arItem) {
    $arItem["PREVIEW_PICTURE"] = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], ["width" => 295, "height" => 200], BX_RESIZE_IMAGE_PROPORTIONAL, true);
}
