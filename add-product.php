<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Fauna+One&display=swap" rel="stylesheet">  
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
        <!-- jQuery validation -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" defer></script>
        <!-- JS and CSS? -->
        <link rel="stylesheet" href="/css/style.css">
        <script type="text/javascript" src="./js/app.js" defer></script>
        <script type="module" src="./js/form.js"></script>
        <title>Add product</title>
    </head>
    <body>
        <header class="w-100 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            <h1 class="header-headline mb-2 mb-sm-0 ">Product Add</h1>
            <div class="header-btn-container">
            <input id="save-btn" class="header-save-btn btn btn-outline-dark text-uppercase me-3" type="submit" value="Save" form="product_form">
            <a id="cancel-btn" class="header-cancel-btn btn btn-outline-dark text-uppercase me-3" href="./index.php">Cancel</a>
            </div>
        </header>
    <main>
        <form id="product_form" method="POST" action="">
            <!-- Text input -->
            <fieldset class="container mb-5">
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row">
                    <label class="col form-label">SKU</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="sku" class="form-control" type="text" name="sku">
                        <label id="sku-error" class="error" for="sku"></label>
                    </div>  
                </div>
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row">
                    <label class="col form-label mt-3">Name</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="name" class="form-control mt-3" type="text" name="name">
                        <label id="name-error" class="error" for="name"></label>
                    </div>
                </div>
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row">
                    <label class="col form-label mt-3">Price ($)</label>
                    <div class="col col-md-6 col-lg-4">
                        <input id="price" class="form-control mt-3 formAttributes" type="text" name="price">
                        <label id="price-error" class="error" for="price"></label>
                    </div>
                </div>
            </fieldset>
            <!-- Select type -->
            <fieldset class="container mb-5">
                <div class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row">
                    <label class="col form-label">Type Switcher</label>
                    <div class="col col-md-6 col-lg-4">
                        <select id="productType" class="form-select" name="productType">
                            <option value="">Change type</option>
                            <option value="DVD">DVD</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Book">Book</option>
                        </select>
                        <label id="productType-error" class="error" for="productType"></label>
                    </div>
                </div>
            </fieldset>
            <fieldset id="productFields"></fieldset>
        </form>
    </main>
    <footer class="w-100">
        <p class="footer-text text-uppercase text-center">Scandiweb Test assignment</p>
    </footer>
    </body>
</html>
