<?php

namespace PHPMaker2024\project3;

// Page object
$DataStView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="fdata_stview" id="fdata_stview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { data_st: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fdata_stview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdata_stview")
        .setPageId("view")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_st">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->data_id->Visible) { // data_id ?>
    <tr id="r_data_id"<?= $Page->data_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_data_id"><?= $Page->data_id->caption() ?></span></td>
        <td data-name="data_id"<?= $Page->data_id->cellAttributes() ?>>
<span id="el_data_st_data_id">
<span<?= $Page->data_id->viewAttributes() ?>>
<?= $Page->data_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->user_id->Visible) { // user_id ?>
    <tr id="r_user_id"<?= $Page->user_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_user_id"><?= $Page->user_id->caption() ?></span></td>
        <td data-name="user_id"<?= $Page->user_id->cellAttributes() ?>>
<span id="el_data_st_user_id">
<span<?= $Page->user_id->viewAttributes() ?>>
<?= $Page->user_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->power->Visible) { // power ?>
    <tr id="r_power"<?= $Page->power->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_power"><?= $Page->power->caption() ?></span></td>
        <td data-name="power"<?= $Page->power->cellAttributes() ?>>
<span id="el_data_st_power">
<span<?= $Page->power->viewAttributes() ?>>
<?= $Page->power->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->highest_load->Visible) { // highest_load ?>
    <tr id="r_highest_load"<?= $Page->highest_load->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_highest_load"><?= $Page->highest_load->caption() ?></span></td>
        <td data-name="highest_load"<?= $Page->highest_load->cellAttributes() ?>>
<span id="el_data_st_highest_load">
<span<?= $Page->highest_load->viewAttributes() ?>>
<?= $Page->highest_load->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->highest_speed->Visible) { // highest_speed ?>
    <tr id="r_highest_speed"<?= $Page->highest_speed->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_highest_speed"><?= $Page->highest_speed->caption() ?></span></td>
        <td data-name="highest_speed"<?= $Page->highest_speed->cellAttributes() ?>>
<span id="el_data_st_highest_speed">
<span<?= $Page->highest_speed->viewAttributes() ?>>
<?= $Page->highest_speed->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->timestamp->Visible) { // timestamp ?>
    <tr id="r_timestamp"<?= $Page->timestamp->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_data_st_timestamp"><?= $Page->timestamp->caption() ?></span></td>
        <td data-name="timestamp"<?= $Page->timestamp->cellAttributes() ?>>
<span id="el_data_st_timestamp">
<span<?= $Page->timestamp->viewAttributes() ?>>
<?= $Page->timestamp->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
