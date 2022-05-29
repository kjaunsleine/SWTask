    <?php require APPROOT . '/views/inc/header.php'; ?>
    <header class="w-100 d-flex justify-content-between align-items-center flex-column flex-sm-row">
        <h1 class="header-headline mb-2 mb-sm-0 ">Product List</h1>
        <div class="header-btn-container">
            <a id="add-product-btn" class="header-btn btn btn-outline-dark me-3" href="<?= URLROOT; ?>/add">ADD</a>
            <button id="delete-products-btn" class="header-delete-btn btn btn-outline-dark me-3" type="submit" name="mass_delete" form="delete_form">MASS DELETE</button>
        </div>
    </header>
    <main class="w-100">
        <form id="delete_form" action="<?= URLROOT; ?>/delete" method="post">
        <div class="product-list mx-auto d-flex flex-wrap">
        <!-- Gets products from database and adds product divs  -->
        <?php foreach ($data['products'] as $product) : ?>
        <div class="product">
            <input class="delete-checkbox" type="checkbox" name="delete[]" value="<?= $product->id; ?>">
            <p class="product-sku"><?= $product->sku; ?></p>
            <p class="product-name"><?= $product->name; ?></p>
            <p class="product-price"><?= $product->price; ?>$</p>
            <p class="product-attr"><?= $product->attributes; ?></p>
        </div>
        <?php endforeach; ?>
        </div>
        </form>
    </main>
    