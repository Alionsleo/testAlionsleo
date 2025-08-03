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
<div>
    <span class="title__span">Новости</span>
    <div class="swiper">
        <div id="swiper-wrapper" class="swiper-wrapper">
        <?foreach($arResult["ITEMS"] as $k => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
            <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>" role="group"">
                <div class="image">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["src"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["alt"]?>">
                    </a>
                </div>
                <div class="news__item-content">
                    <h2 class="title"><?echo $arItem["NAME"]?></h2>
                    <p class="date">
                        <?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
                    </p>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</div>
<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 2,
        spaceBetween: 10,
    });
</script>
