<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"PARAMETERS" => array(
		"NEWS_IBLOCK_ID" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_NEWS_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
		"AUTHOR_TYPE" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_AUTHOR_TYPE"),
			"TYPE" => "STRING",
		),
		"AUTHOR" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_AUTHOR"),
			"TYPE" => "STRING",
		),
		"CACHE_TIME"  =>  ["DEFAULT"=>36000000],
	),
);