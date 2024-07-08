<?php

namespace PHPMaker2024\project3;

// Page object
$DataStList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { data_st: currentTable } });
var currentPageID = ew.PAGE_ID = "list";
var currentForm;
var <?= $Page->FormName ?>;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("<?= $Page->FormName ?>")
        .setPageId("list")
        .setSubmitWithFetch(<?= $Page->UseAjaxActions ? "true" : "false" ?>)
        .setFormKeyCountName("<?= $Page->FormKeyCountName ?>")
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
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
</div>
<?php } ?>
<?php if (!$Page->IsModal) { ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="list<?= ($Page->TotalRecords == 0 && !$Page->isAdd()) ? " ew-no-record" : "" ?>">
<div id="ew-header-options">
<?php $Page->HeaderOptions?->render("body") ?>
</div>
<div id="ew-list">
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?= $Page->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Page->TableGridClass ?>">
<form name="<?= $Page->FormName ?>" id="<?= $Page->FormName ?>" class="ew-form ew-list-form" action="<?= $Page->PageAction ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_st">
<?php if ($Page->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<div id="gmp_data_st" class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit() || $Page->isMultiEdit()) { ?>
<table id="tbl_data_stlist" class="<?= $Page->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = RowType::HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->data_id->Visible) { // data_id ?>
        <th data-name="data_id" class="<?= $Page->data_id->headerCellClass() ?>"><div id="elh_data_st_data_id" class="data_st_data_id"><?= $Page->renderFieldHeader($Page->data_id) ?></div></th>
<?php } ?>
<?php if ($Page->user_id->Visible) { // user_id ?>
        <th data-name="user_id" class="<?= $Page->user_id->headerCellClass() ?>"><div id="elh_data_st_user_id" class="data_st_user_id"><?= $Page->renderFieldHeader($Page->user_id) ?></div></th>
<?php } ?>
<?php if ($Page->power->Visible) { // power ?>
        <th data-name="power" class="<?= $Page->power->headerCellClass() ?>"><div id="elh_data_st_power" class="data_st_power"><?= $Page->renderFieldHeader($Page->power) ?></div></th>
<?php } ?>
<?php if ($Page->highest_load->Visible) { // highest_load ?>
        <th data-name="highest_load" class="<?= $Page->highest_load->headerCellClass() ?>"><div id="elh_data_st_highest_load" class="data_st_highest_load"><?= $Page->renderFieldHeader($Page->highest_load) ?></div></th>
<?php } ?>
<?php if ($Page->highest_speed->Visible) { // highest_speed ?>
        <th data-name="highest_speed" class="<?= $Page->highest_speed->headerCellClass() ?>"><div id="elh_data_st_highest_speed" class="data_st_highest_speed"><?= $Page->renderFieldHeader($Page->highest_speed) ?></div></th>
<?php } ?>
<?php if ($Page->timestamp->Visible) { // timestamp ?>
        <th data-name="timestamp" class="<?= $Page->timestamp->headerCellClass() ?>"><div id="elh_data_st_timestamp" class="data_st_timestamp"><?= $Page->renderFieldHeader($Page->timestamp) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Page->getPageNumber() ?>">
<?php
$Page->setupGrid();
while ($Page->RecordCount < $Page->StopRecord || $Page->RowIndex === '$rowindex$') {
    if (
        $Page->CurrentRow !== false &&
        $Page->RowIndex !== '$rowindex$' &&
        (!$Page->isGridAdd() || $Page->CurrentMode == "copy") &&
        (!(($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0))
    ) {
        $Page->fetch();
    }
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->setupRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->data_id->Visible) { // data_id ?>
        <td data-name="data_id"<?= $Page->data_id->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_data_id" class="el_data_st_data_id">
<span<?= $Page->data_id->viewAttributes() ?>>
<?= $Page->data_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->user_id->Visible) { // user_id ?>
        <td data-name="user_id"<?= $Page->user_id->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_user_id" class="el_data_st_user_id">
<span<?= $Page->user_id->viewAttributes() ?>>
<?= $Page->user_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->power->Visible) { // power ?>
        <td data-name="power"<?= $Page->power->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_power" class="el_data_st_power">
<span<?= $Page->power->viewAttributes() ?>>
<?= $Page->power->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->highest_load->Visible) { // highest_load ?>
        <td data-name="highest_load"<?= $Page->highest_load->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_highest_load" class="el_data_st_highest_load">
<span<?= $Page->highest_load->viewAttributes() ?>>
<?= $Page->highest_load->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->highest_speed->Visible) { // highest_speed ?>
        <td data-name="highest_speed"<?= $Page->highest_speed->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_highest_speed" class="el_data_st_highest_speed">
<span<?= $Page->highest_speed->viewAttributes() ?>>
<?= $Page->highest_speed->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->timestamp->Visible) { // timestamp ?>
        <td data-name="timestamp"<?= $Page->timestamp->cellAttributes() ?>>
<span id="el<?= $Page->RowIndex == '$rowindex$' ? '$rowindex$' : $Page->RowCount ?>_data_st_timestamp" class="el_data_st_timestamp">
<span<?= $Page->timestamp->viewAttributes() ?>>
<?= $Page->timestamp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }

    // Reset for template row
    if ($Page->RowIndex === '$rowindex$') {
        $Page->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Page->isCopy() || $Page->isAdd()) && $Page->RowIndex == 0) {
        $Page->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction && !$Page->UseAjaxActions) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close result set
$Page->Recordset?->free();
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd() && !($Page->isGridEdit() && $Page->ModalGridEdit) && !$Page->isMultiEdit()) { ?>
<?= $Page->Pager->render() ?>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } else { ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
</div>
<div id="ew-footer-options">
<?php $Page->FooterOptions?->render("body") ?>
</div>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("data_st");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
