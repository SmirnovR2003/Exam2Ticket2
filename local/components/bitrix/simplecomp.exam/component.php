<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

if (!Loader::includeModule("iblock")) {
	ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
	return;
}

if (
	intval($arParams["NEWS_IBLOCK_ID"]) > 0
	&& !empty($arParams["AUTHOR_TYPE"])
	&& !empty($arParams["AUTHOR"])
	&& $USER->IsAuthorized()
) {
	if ($this->StartResultCache($arParams["CACHE_TIME"], $USER->GetID())) {
		$rsUser = CUser::GetByID($USER->GetID());

		if (!($curUser = $rsUser->Fetch()))
			return;

		$arResult["USERS"] = array();
		$rsUsers = CUser::GetList(
			["id"],
			["asc"],
			[
				"!ID" => $USER->GetID(),
				$arParams["AUTHOR_TYPE"] => $curUser[$arParams["AUTHOR_TYPE"]]
			],
			[
				"SELECT" => ["ID", "LOGIN", $arParams["AUTHOR_TYPE"]]
			]
		);
		while ($arUser = $rsUsers->GetNext()) {
			$arResult["USERS"][$arUser["ID"]] = ["ID" => $arUser["ID"], "LOGIN" => $arUser["LOGIN"], $arParams["AUTHOR_TYPE"] => $arUser[$arParams["AUTHOR_TYPE"]],];
		}

		$rsElements = CIBlockElement::GetList(
			[],
			[
				"PROPERTY_" . $arParams["AUTHOR"] => array_keys($arResult["USERS"]),
				"ACTIVE" => "Y"
			],
			false,
			false,
			[
				"ID",
				"NAME",
				"ACTIVE_FROM",
				"PROPERTY_" . $arParams["AUTHOR"]
			]
		);
		$news = [];
		while ($arElement = $rsElements->GetNext()) {
			$news[$arElement["ID"]] = $arElement["ID"];
			$arResult["USERS"][$arElement["PROPERTY_".$arParams["AUTHOR"]."_VALUE"]]["NEWS"][$arElement["ID"]] = [
				"NAME" => $arElement["NAME"],
			];
		}
		$arResult["NEWS_COUNT"] = count($news);
		$this->SetResultCacheKeys(["NEWS_COUNT"]);
		$this->includeComponentTemplate();
	}
	$APPLICATION->SetTitle(GetMessage("SIMPLECOMP_EXAM2_NEWS_COUNT", ["#NEWS_COUNT#" => $arResult["NEWS_COUNT"]]));
}
