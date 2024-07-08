<?php

namespace PHPMaker2024\project1;

// Page object
$UsersStEdit = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fusers_stedit" id="fusers_stedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { users_st: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fusers_stedit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fusers_stedit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["user_id", [fields.user_id.visible && fields.user_id.required ? ew.Validators.required(fields.user_id.caption) : null], fields.user_id.isInvalid],
            ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
            ["sports", [fields.sports.visible && fields.sports.required ? ew.Validators.required(fields.sports.caption) : null], fields.sports.isInvalid],
            ["weight_kg", [fields.weight_kg.visible && fields.weight_kg.required ? ew.Validators.required(fields.weight_kg.caption) : null, ew.Validators.float], fields.weight_kg.isInvalid],
            ["height_cm", [fields.height_cm.visible && fields.height_cm.required ? ew.Validators.required(fields.height_cm.caption) : null, ew.Validators.float], fields.height_cm.isInvalid],
            ["sex", [fields.sex.visible && fields.sex.required ? ew.Validators.required(fields.sex.caption) : null], fields.sex.isInvalid]
        ])

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)!
                    // Your custom validation code here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
        })
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
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="users_st">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->user_id->Visible) { // user_id ?>
    <div id="r_user_id"<?= $Page->user_id->rowAttributes() ?>>
        <label id="elh_users_st_user_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_id->caption() ?><?= $Page->user_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->user_id->cellAttributes() ?>>
<span id="el_users_st_user_id">
<span<?= $Page->user_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->user_id->getDisplayValue($Page->user_id->EditValue))) ?>"></span>
<input type="hidden" data-table="users_st" data-field="x_user_id" data-hidden="1" name="x_user_id" id="x_user_id" value="<?= HtmlEncode($Page->user_id->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name"<?= $Page->name->rowAttributes() ?>>
        <label id="elh_users_st_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name->cellAttributes() ?>>
<span id="el_users_st_name">
<input type="<?= $Page->name->getInputTextType() ?>" name="x_name" id="x_name" data-table="users_st" data-field="x_name" value="<?= $Page->name->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name->formatPattern()) ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sports->Visible) { // sports ?>
    <div id="r_sports"<?= $Page->sports->rowAttributes() ?>>
        <label id="elh_users_st_sports" for="x_sports" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sports->caption() ?><?= $Page->sports->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->sports->cellAttributes() ?>>
<span id="el_users_st_sports">
<input type="<?= $Page->sports->getInputTextType() ?>" name="x_sports" id="x_sports" data-table="users_st" data-field="x_sports" value="<?= $Page->sports->EditValue ?>" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->sports->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->sports->formatPattern()) ?>"<?= $Page->sports->editAttributes() ?> aria-describedby="x_sports_help">
<?= $Page->sports->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sports->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->weight_kg->Visible) { // weight_kg ?>
    <div id="r_weight_kg"<?= $Page->weight_kg->rowAttributes() ?>>
        <label id="elh_users_st_weight_kg" for="x_weight_kg" class="<?= $Page->LeftColumnClass ?>"><?= $Page->weight_kg->caption() ?><?= $Page->weight_kg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->weight_kg->cellAttributes() ?>>
<span id="el_users_st_weight_kg">
<input type="<?= $Page->weight_kg->getInputTextType() ?>" name="x_weight_kg" id="x_weight_kg" data-table="users_st" data-field="x_weight_kg" value="<?= $Page->weight_kg->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->weight_kg->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->weight_kg->formatPattern()) ?>"<?= $Page->weight_kg->editAttributes() ?> aria-describedby="x_weight_kg_help">
<?= $Page->weight_kg->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->weight_kg->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->height_cm->Visible) { // height_cm ?>
    <div id="r_height_cm"<?= $Page->height_cm->rowAttributes() ?>>
        <label id="elh_users_st_height_cm" for="x_height_cm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->height_cm->caption() ?><?= $Page->height_cm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->height_cm->cellAttributes() ?>>
<span id="el_users_st_height_cm">
<input type="<?= $Page->height_cm->getInputTextType() ?>" name="x_height_cm" id="x_height_cm" data-table="users_st" data-field="x_height_cm" value="<?= $Page->height_cm->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->height_cm->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->height_cm->formatPattern()) ?>"<?= $Page->height_cm->editAttributes() ?> aria-describedby="x_height_cm_help">
<?= $Page->height_cm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->height_cm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sex->Visible) { // sex ?>
    <div id="r_sex"<?= $Page->sex->rowAttributes() ?>>
        <label id="elh_users_st_sex" for="x_sex" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sex->caption() ?><?= $Page->sex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->sex->cellAttributes() ?>>
<span id="el_users_st_sex">
<input type="<?= $Page->sex->getInputTextType() ?>" name="x_sex" id="x_sex" data-table="users_st" data-field="x_sex" value="<?= $Page->sex->EditValue ?>" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->sex->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->sex->formatPattern()) ?>"<?= $Page->sex->editAttributes() ?> aria-describedby="x_sex_help">
<?= $Page->sex->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sex->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fusers_stedit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fusers_stedit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("users_st");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
