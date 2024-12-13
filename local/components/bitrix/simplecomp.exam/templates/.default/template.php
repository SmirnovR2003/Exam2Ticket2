<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<p><b><?= GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE") ?></b></p>


<? if (count($arResult["USERS"])) { ?>
    <ul>
        <? foreach ($arResult["USERS"] as $key => $user) { ?>
            <li>
                [<?= $user["ID"] ?>] - <?= $user["LOGIN"] ?>
                <? if (count($user["NEWS"])) { ?>
                    <ul>
                        <? foreach ($user["NEWS"] as $key => $new) { ?>
                            <li>
                                - <?= $new["NAME"] ?>
                            </li>
                        <? } ?>
                    </ul>
                <? } ?>
            </li>
        <? } ?>
    </ul>
<? } ?>