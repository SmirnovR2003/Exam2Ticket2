<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomp.exam", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"PRODUCTS_IBLOCK_ID" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"NEWS_IBLOCK_ID" => "1",
		"AUTHOR_TYPE" => "UF_AUTHOR_TYPE",
		"AUTHOR" => "AUTHOR"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>