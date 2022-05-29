<div class="container">
    <fieldset id="DVD" class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
        <label class="col-2 col-form-label" for="size">Size (MB)</label>
        <div class="col col-md-6 col-lg-4">
            <label class="form-text">Please provide size in MB</label>
            <input id="size" class="form-control formValue formAttributes <?= (!empty($data['errors']['sizeError'])) ? 'error' : ''; ?>" type="number" step="any" name="size" value="<?= $data['inputData']['size'] ?? ''; ?>">
            <label id="size-error" class="error" for="size"><?= $data['errors']['sizeError'] ?? ''; ?></label>
        </div>
    </fieldset>
</div>