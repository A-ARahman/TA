<?php

namespace PHPMaker2024\project3;

// Page object
$DataStAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { data_st: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fdata_stadd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fdata_stadd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["user_id", [fields.user_id.visible && fields.user_id.required ? ew.Validators.required(fields.user_id.caption) : null, ew.Validators.integer], fields.user_id.isInvalid],
            ["power", [fields.power.visible && fields.power.required ? ew.Validators.required(fields.power.caption) : null, ew.Validators.float], fields.power.isInvalid],
            ["highest_load", [fields.highest_load.visible && fields.highest_load.required ? ew.Validators.required(fields.highest_load.caption) : null, ew.Validators.float], fields.highest_load.isInvalid],
            ["highest_speed", [fields.highest_speed.visible && fields.highest_speed.required ? ew.Validators.required(fields.highest_speed.caption) : null, ew.Validators.float], fields.highest_speed.isInvalid],
            ["timestamp", [fields.timestamp.visible && fields.timestamp.required ? ew.Validators.required(fields.timestamp.caption) : null, ew.Validators.datetime(fields.timestamp.clientFormatPattern)], fields.timestamp.isInvalid]
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fdata_stadd" id="fdata_stadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="off">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="data_st">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->user_id->Visible) { // user_id ?>
    <div id="r_user_id"<?= $Page->user_id->rowAttributes() ?>>
        <label id="elh_data_st_user_id" for="x_user_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user_id->caption() ?><?= $Page->user_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->user_id->cellAttributes() ?>>
<span id="el_data_st_user_id">
<input type="<?= $Page->user_id->getInputTextType() ?>" name="x_user_id" id="x_user_id" data-table="data_st" data-field="x_user_id" value="<?= $Page->user_id->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->user_id->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->user_id->formatPattern()) ?>"<?= $Page->user_id->editAttributes() ?> aria-describedby="x_user_id_help">
<?= $Page->user_id->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user_id->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->power->Visible) { // power ?>
    <div id="r_power"<?= $Page->power->rowAttributes() ?>>
        <label id="elh_data_st_power" for="x_power" class="<?= $Page->LeftColumnClass ?>"><?= $Page->power->caption() ?><?= $Page->power->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->power->cellAttributes() ?>>
<span id="el_data_st_power">
<input type="<?= $Page->power->getInputTextType() ?>" name="x_power" id="x_power" data-table="data_st" data-field="x_power" value="<?= $Page->power->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->power->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->power->formatPattern()) ?>"<?= $Page->power->editAttributes() ?> aria-describedby="x_power_help">
<?= $Page->power->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->power->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->highest_load->Visible) { // highest_load ?>
    <div id="r_highest_load"<?= $Page->highest_load->rowAttributes() ?>>
        <label id="elh_data_st_highest_load" for="x_highest_load" class="<?= $Page->LeftColumnClass ?>"><?= $Page->highest_load->caption() ?><?= $Page->highest_load->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->highest_load->cellAttributes() ?>>
<span id="el_data_st_highest_load">
<input type="<?= $Page->highest_load->getInputTextType() ?>" name="x_highest_load" id="x_highest_load" data-table="data_st" data-field="x_highest_load" value="<?= $Page->highest_load->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->highest_load->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->highest_load->formatPattern()) ?>"<?= $Page->highest_load->editAttributes() ?> aria-describedby="x_highest_load_help">
<?= $Page->highest_load->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->highest_load->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->highest_speed->Visible) { // highest_speed ?>
    <div id="r_highest_speed"<?= $Page->highest_speed->rowAttributes() ?>>
        <label id="elh_data_st_highest_speed" for="x_highest_speed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->highest_speed->caption() ?><?= $Page->highest_speed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->highest_speed->cellAttributes() ?>>
<span id="el_data_st_highest_speed">
<input type="<?= $Page->highest_speed->getInputTextType() ?>" name="x_highest_speed" id="x_highest_speed" data-table="data_st" data-field="x_highest_speed" value="<?= $Page->highest_speed->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->highest_speed->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->highest_speed->formatPattern()) ?>"<?= $Page->highest_speed->editAttributes() ?> aria-describedby="x_highest_speed_help">
<?= $Page->highest_speed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->highest_speed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->timestamp->Visible) { // timestamp ?>
    <div id="r_timestamp"<?= $Page->timestamp->rowAttributes() ?>>
        <label id="elh_data_st_timestamp" for="x_timestamp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->timestamp->caption() ?><?= $Page->timestamp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->timestamp->cellAttributes() ?>>
<span id="el_data_st_timestamp">
<input type="<?= $Page->timestamp->getInputTextType() ?>" name="x_timestamp" id="x_timestamp" data-table="data_st" data-field="x_timestamp" value="<?= $Page->timestamp->EditValue ?>" placeholder="<?= HtmlEncode($Page->timestamp->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->timestamp->formatPattern()) ?>"<?= $Page->timestamp->editAttributes() ?> aria-describedby="x_timestamp_help">
<?= $Page->timestamp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->timestamp->getErrorMessage() ?></div>
<?php if (!$Page->timestamp->ReadOnly && !$Page->timestamp->Disabled && !isset($Page->timestamp->EditAttrs["readonly"]) && !isset($Page->timestamp->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdata_stadd", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                hourCycle: format.match(/H/) ? "h24" : "h12",
                format,
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i)
                },
                theme: ew.getPreferredTheme()
            }
        };
    ew.createDateTimePicker("fdata_stadd", "x_timestamp", ew.deepAssign({"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fdata_stadd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fdata_stadd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
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
