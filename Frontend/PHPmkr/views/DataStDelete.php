<?php

namespace PHPMaker2024\project3;

// Page object
$DataStDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { data_st: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fdata_stdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdata_stdelete")
        .setPageId("delete")
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fdata_stdelete" id="fdata_stdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_st">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->data_id->Visible) { // data_id ?>
        <th class="<?= $Page->data_id->headerCellClass() ?>"><span id="elh_data_st_data_id" class="data_st_data_id"><?= $Page->data_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->user_id->Visible) { // user_id ?>
        <th class="<?= $Page->user_id->headerCellClass() ?>"><span id="elh_data_st_user_id" class="data_st_user_id"><?= $Page->user_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->power->Visible) { // power ?>
        <th class="<?= $Page->power->headerCellClass() ?>"><span id="elh_data_st_power" class="data_st_power"><?= $Page->power->caption() ?></span></th>
<?php } ?>
<?php if ($Page->highest_load->Visible) { // highest_load ?>
        <th class="<?= $Page->highest_load->headerCellClass() ?>"><span id="elh_data_st_highest_load" class="data_st_highest_load"><?= $Page->highest_load->caption() ?></span></th>
<?php } ?>
<?php if ($Page->highest_speed->Visible) { // highest_speed ?>
        <th class="<?= $Page->highest_speed->headerCellClass() ?>"><span id="elh_data_st_highest_speed" class="data_st_highest_speed"><?= $Page->highest_speed->caption() ?></span></th>
<?php } ?>
<?php if ($Page->timestamp->Visible) { // timestamp ?>
        <th class="<?= $Page->timestamp->headerCellClass() ?>"><span id="elh_data_st_timestamp" class="data_st_timestamp"><?= $Page->timestamp->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while ($Page->fetch()) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = RowType::VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->CurrentRow);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->data_id->Visible) { // data_id ?>
        <td<?= $Page->data_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->data_id->viewAttributes() ?>>
<?= $Page->data_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->user_id->Visible) { // user_id ?>
        <td<?= $Page->user_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->user_id->viewAttributes() ?>>
<?= $Page->user_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->power->Visible) { // power ?>
        <td<?= $Page->power->cellAttributes() ?>>
<span id="">
<span<?= $Page->power->viewAttributes() ?>>
<?= $Page->power->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->highest_load->Visible) { // highest_load ?>
        <td<?= $Page->highest_load->cellAttributes() ?>>
<span id="">
<span<?= $Page->highest_load->viewAttributes() ?>>
<?= $Page->highest_load->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->highest_speed->Visible) { // highest_speed ?>
        <td<?= $Page->highest_speed->cellAttributes() ?>>
<span id="">
<span<?= $Page->highest_speed->viewAttributes() ?>>
<?= $Page->highest_speed->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->timestamp->Visible) { // timestamp ?>
        <td<?= $Page->timestamp->cellAttributes() ?>>
<span id="">
<span<?= $Page->timestamp->viewAttributes() ?>>
<?= $Page->timestamp->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
}
$Page->Recordset?->free();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
