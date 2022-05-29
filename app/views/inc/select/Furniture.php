<div class="container">
    <fieldset id="Furniture" class="row">
        <label class="form-text mb-3">Please provide dimensions in CM and in HxWxL format</label>
        <div class="row row-cols-md-6 flex-column flex-sm-row">
            <label class="col col-form-label" for="height">Height (CM)</label>
            <div class="col col-md-6 col-lg-4">
                <input id="height" class="form-control formAttributes <?= (!empty($data['errors']['heightError'])) ? 'error' : ''; ?>" type="number" name="height" step="any" value="<?= $data['inputData']['height'] ?? ''; ?>">
                <label id="height-error" class="error" for="height"><?= $data['errors']['heightError'] ?? ''; ?></label>
            </div>
        </div>
        <div class="row row-cols-md-6 flex-column flex-sm-row">
            <label class="col col-form-label" for="width">Width (CM)</label>
            <div class="col col-md-6 col-lg-4">
                <input id="width" class="form-control formAttributes mt-3 <?= (!empty($data['errors']['widthError'])) ? 'error' : ''; ?>" type="number" name="width" step="any" value="<?= $data['inputData']['width'] ?? ''; ?>">
                <label id="width-error" class="error" for="width"><?= $data['errors']['widthError'] ?? ''; ?></label>
            </div>
        </div>
        <div class="row row-cols-md-6 flex-column flex-sm-row">
            <label class="col col-form-label" for="length">Length (CM)</label>
                <div class="col col-md-6 col-lg-4">
                <input id="length" class="form-control formAttributes mt-3 <?= (!empty($data['errors']['lengthError'])) ? 'error' : ''; ?>" type="number" name="length" step="any" value="<?= $data['inputData']['length'] ?? ''; ?>">
                <label id="length-error" class="error" for="length"><?= $data['errors']['lengthError'] ?? ''; ?></label>
                </div>
            </div>      
        </div>
    </fieldset>
</div>