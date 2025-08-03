<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="main__content">
    <h1 class="main__title">Список доступных страниц</h1>
    <div class="main__links">
        <?php
        if (!empty($arResult)) {
            foreach($arResult as $arItem) {
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
        ?>
            <a class="main__links-link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        <?php
            }
        }
        ?>
    </div>
</div>
