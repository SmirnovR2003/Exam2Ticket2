<?

AddEventHandler("main", "OnBuildGlobalMenu", "MyOnBuildGlobalMenu");
function MyOnBuildGlobalMenu(&$aGlobalMenu, &$aModuleMenu)
{
    global $USER;
    if(!(in_array(5, $USER->GetUserGroupArray()) && !in_array(1, $USER->GetUserGroupArray())))
        return;

    $aGlobalMenu = ["global_menu_content" => $aGlobalMenu["global_menu_content"]];

    foreach ($aModuleMenu as $key => $value) {
        if($value["items_id"] === "menu_iblock_/news")
        {
            $newaModuleMenu = [$value];
            break;
        }

    }
    $aModuleMenu = $newaModuleMenu;
}