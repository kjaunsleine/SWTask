<div class="container">
    <fieldset id="Book" class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
        <label class="col form-label" for="weight">Weight (KG)</label>
        <div class="col col-md-6 col-lg-4">
            <label class="form-text">Please provide weight in KG</label>
            <input id="weight" class="form-control formValue formAttributes <?= (!empty($data['errors']['weightError'])) ? 'error' : ''; ?>" type="number" step="any" name="weight" value="<?= $data['inputData']['weight'] ?? ''; ?>">
            <label id="weight-error" class="error" for="weight"><?= $data['errors']['weightError'] ?? ''; ?></label>
        </div>
    </fieldset>
</div>