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

use Bitrix\Iblock\SectionPropertyTable;

$this->setFrameMode(true);

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);

?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter news__filter">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
    <?endforeach;?>
<label class="news__filter-label">
    <?foreach($arResult["ITEMS"] as $key=>$arItem) {
        if (
            empty($arItem["VALUES"])
            || isset($arItem["PRICE"])
        )
            continue;
        if (
            $arItem["DISPLAY_TYPE"] === SectionPropertyTable::NUMBERS_WITH_SLIDER
            && ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
        )
            continue;
    }
    $arCur = current($arItem["VALUES"]);
    ?>
    Категории:
    <select id="news-filter" name="<?=$arCur["CONTROL_NAME_ALT"]?>" class="news__filter-select">
        <option selected="" value="<? echo "all_".$arCur["CONTROL_ID"] ?>" id="<? echo "all_".$arCur["CONTROL_ID"] ?>">
            <? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
        </option>
        <?foreach ($arItem["VALUES"] as $val => $ar):?>
            <option value="<? echo $ar["HTML_VALUE_ALT"] ?>" id="<?=$ar["CONTROL_ID"]?>" <? echo $ar["CHECKED"]? 'selected=""': '' ?>><?=$ar["VALUE"]?></option>

    <?endforeach?>
    </select>
</label>
    <input
        class="news__filter-reset"
        type="submit"
        id="del_filter"
        name="del_filter"
        value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>"
    />
    <input
        hidden=""
        class="news__filter-reset"
        type="submit"
        id="set_filter"
        name="set_filter"
        value="<?=GetMessage("CT_BCSF_FILTER_SHOW")?>"
    />
</form>
<script>
    $(".news__filter-select").on('change', function(){
        $("#set_filter").click();
    });
</script>
