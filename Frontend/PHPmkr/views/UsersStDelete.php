<?php

namespace PHPMaker2024\project1;

// Page object
$UsersStDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { users_st: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fusers_stdelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fusers_stdelete")
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
<form name="fusers_stdelete" id="fusers_stdelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="users_st">
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
<?php if ($Page->user_id->Visible) { // user_id ?>
        <th class="<?= $Page->user_id->headerCellClass() ?>"><span id="elh_users_st_user_id" class="users_st_user_id"><?= $Page->user_id->caption() ?></span></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><span id="elh_users_st_name" class="users_st_name"><?= $Page->name->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sports->Visible) { // sports ?>
        <th class="<?= $Page->sports->headerCellClass() ?>"><span id="elh_users_st_sports" class="users_st_sports"><?= $Page->sports->caption() ?></span></th>
<?php } ?>
<?php if ($Page->weight_kg->Visible) { // weight_kg ?>
        <th class="<?= $Page->weight_kg->headerCellClass() ?>"><span id="elh_users_st_weight_kg" class="users_st_weight_kg"><?= $Page->weight_kg->caption() ?></span></th>
<?php } ?>
<?php if ($Page->height_cm->Visible) { // height_cm ?>
        <th class="<?= $Page->height_cm->headerCellClass() ?>"><span id="elh_users_st_height_cm" class="users_st_height_cm"><?= $Page->height_cm->caption() ?></span></th>
<?php } ?>
<?php if ($Page->sex->Visible) { // sex ?>
        <th class="<?= $Page->sex->headerCellClass() ?>"><span id="elh_users_st_sex" class="users_st_sex"><?= $Page->sex->caption() ?></span></th>
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
<?php if ($Page->user_id->Visible) { // user_id ?>
        <td<?= $Page->user_id->cellAttributes() ?>>
<span id="">
<span<?= $Page->user_id->viewAttributes() ?>>
<?= $Page->user_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <td<?= $Page->name->cellAttributes() ?>>
<span id="">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sports->Visible) { // sports ?>
        <td<?= $Page->sports->cellAttributes() ?>>
<span id="">
<span<?= $Page->sports->viewAttributes() ?>>
<?= $Page->sports->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->weight_kg->Visible) { // weight_kg ?>
        <td<?= $Page->weight_kg->cellAttributes() ?>>
<span id="">
<span<?= $Page->weight_kg->viewAttributes() ?>>
<?= $Page->weight_kg->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->height_cm->Visible) { // height_cm ?>
        <td<?= $Page->height_cm->cellAttributes() ?>>
<span id="">
<span<?= $Page->height_cm->viewAttributes() ?>>
<?= $Page->height_cm->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->sex->Visible) { // sex ?>
        <td<?= $Page->sex->cellAttributes() ?>>
<span id="">
<span<?= $Page->sex->viewAttributes() ?>>
<?= $Page->sex->getViewValue() ?></span>
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
