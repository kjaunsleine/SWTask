<?php require APPROOT . '/views/inc/header.php'; ?>
    <header class="w-100 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            <h1 class="header-headline mb-2 mb-sm-0 ">Add product</h1>
            <div class="header-btn-container">
            <input id="save-btn" class="header-save-btn btn btn-outline-dark text-uppercase me-3" type="submit" value="Save" form="product_form">
            <a id="cancel-btn" class="header-cancel-btn btn btn-outline-dark text-uppercase me-3" href="/">Cancel</a>
            </div>
    </header>
    <main>
        <form id="product_form" method="post" action="<?= URLROOT; ?>/add/product">
            <!-- Text input -->
            <fieldset class="container mb-5">
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
                    <label class="col form-label">SKU</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="sku" class="form-control <?= (!empty($data['errors']['skuError'])) ? 'error' : ''; ?>" type="text" name="sku" value="<?= $data['inputData']['sku'] ?? ''; ?>">
                        <label id="sku-error" class="error" for="sku"><?= $data['errors']['skuError'] ?? ''; ?></label>
                    </div>  
                </div>
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
                    <label class="col form-label mt-3">Name</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="name" class="form-control mt-4 <?= (!empty($data['errors']['nameError'])) ? 'error' : ''; ?>" type="text" name="name" value="<?= $data['inputData']['name'] ?? ''; ?>">
                        <label id="name-error" class="error" for="name"><?= $data['errors']['nameError'] ?? ''; ?></label>
                    </div>
                </div>
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
                    <label class="col form-label mt-3">Price ($)</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="price" class="form-control mt-4 formAttributes <?= (!empty($data['errors']['priceError'])) ? 'error' : ''; ?>" type="number" name="price" value="<?= $data['inputData']['price'] ?? ''; ?>">
                        <label id="price-error" class="error" for="price"><?= $data['errors']['priceError'] ?? ''; ?></label>
                    </div>
                </div>
            </fieldset>
            <!-- Select type -->
            <fieldset class="container mb-5">
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">
                    <label class="col form-label">Type Switcher</label>
                    <div class="col col-md-6 col-lg-4">
                        <select id="productType" class="form-select <?= (!empty($data['errors']['productTypeError'])) ? 'error' : ''; ?>" name="productType">
                            <?php require APPROOT . '/views/inc/select/options.php'; ?>
                        </select>
                        <label id="productType-error" class="error" for="productType"><?= $data['errors']['productTypeError'] ?? ''; ?></label>
                    </div>
                </div>
            </fieldset>
            <fieldset id="productFields"><?php $this->addFields($data['inputData'], $data); ?></fieldset>
        </form>
    </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>