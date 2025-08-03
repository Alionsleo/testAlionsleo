<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="detail__item">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
        <div class="detail__item-image">
            <img
                src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                />
        </div>
	<?endif?>
    <div class="detail__item-content">
        <h2 class="detail__title">
            <?=$arResult["NAME"]?>
        </h2>
        <p class="detail__description">
            <?echo $arResult["DETAIL_TEXT"];?>
        </p>
        <p class="detail__date"><?=$arResult["DISPLAY_ACTIVE_FROM"] . ' г.'?></p>
    </div>
</div>
