<?php

namespace PHPMaker2024\project1;

// Page object
$UsersStView = &$Page;
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
<form name="fusers_stview" id="fusers_stview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { users_st: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fusers_stview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fusers_stview")
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
<input type="hidden" name="t" value="users_st">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->user_id->Visible) { // user_id ?>
    <tr id="r_user_id"<?= $Page->user_id->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_user_id"><?= $Page->user_id->caption() ?></span></td>
        <td data-name="user_id"<?= $Page->user_id->cellAttributes() ?>>
<span id="el_users_st_user_id">
<span<?= $Page->user_id->viewAttributes() ?>>
<?= $Page->user_id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <tr id="r_name"<?= $Page->name->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_name"><?= $Page->name->caption() ?></span></td>
        <td data-name="name"<?= $Page->name->cellAttributes() ?>>
<span id="el_users_st_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sports->Visible) { // sports ?>
    <tr id="r_sports"<?= $Page->sports->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_sports"><?= $Page->sports->caption() ?></span></td>
        <td data-name="sports"<?= $Page->sports->cellAttributes() ?>>
<span id="el_users_st_sports">
<span<?= $Page->sports->viewAttributes() ?>>
<?= $Page->sports->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->weight_kg->Visible) { // weight_kg ?>
    <tr id="r_weight_kg"<?= $Page->weight_kg->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_weight_kg"><?= $Page->weight_kg->caption() ?></span></td>
        <td data-name="weight_kg"<?= $Page->weight_kg->cellAttributes() ?>>
<span id="el_users_st_weight_kg">
<span<?= $Page->weight_kg->viewAttributes() ?>>
<?= $Page->weight_kg->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->height_cm->Visible) { // height_cm ?>
    <tr id="r_height_cm"<?= $Page->height_cm->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_height_cm"><?= $Page->height_cm->caption() ?></span></td>
        <td data-name="height_cm"<?= $Page->height_cm->cellAttributes() ?>>
<span id="el_users_st_height_cm">
<span<?= $Page->height_cm->viewAttributes() ?>>
<?= $Page->height_cm->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sex->Visible) { // sex ?>
    <tr id="r_sex"<?= $Page->sex->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_users_st_sex"><?= $Page->sex->caption() ?></span></td>
        <td data-name="sex"<?= $Page->sex->cellAttributes() ?>>
<span id="el_users_st_sex">
<span<?= $Page->sex->viewAttributes() ?>>
<?= $Page->sex->getViewValue() ?></span>
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
