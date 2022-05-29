<option value="">Change type</option>
<?php foreach($data['productTypes'] as $type): ?>
    <option value="<?= $type; ?>" <?= $data['inputData']['productType'] === $type ? 'selected' : ''; ?>><?= $type; ?></option>
<?php endforeach; ?>