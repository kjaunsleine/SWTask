export default class Fields {
    BookFields = this.createBookFields();
    DVDFields = this.createDVDFields();
    FurnitureFields = this.createFurnitureFields();
    
    createBookFields() {
        let html = '<div class="container"><fieldset id="Book" class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">'
        html += '<label class="col form-label" for="weight">Weight (KG)</label>';
        html += '<div class="col col-md-6 col-lg-4">';
        html += '<label class="form-text">Please provide weight in KG</label>';
        html += '<input id="weight" class="form-control formValue formAttributes" type="number" step="any" name="weight">';
        html += '<label id="weight-error" class="error" for="weight"></label></div>';
        html += '</fieldset></div>'
        return html;
    }

    createDVDFields() {
        let html = '<div class="container"><fieldset id="DVD" class="row row-cols-12 row-cols-md-6 flex-column flex-sm-row align-items-center">';
        html += '<label class="col-2 col-form-label" for="size">Size (MB)</label>';
        html += '<div class="col col-md-6 col-lg-4">';
        html += '<label class="form-text">Please provide size in MB</label>';
        html += '<input id="size" class="form-control formValue formAttributes" type="number" step="any" name="size">';
        html += '<label id="size-error" class="error" for="size"></label>';
        html += '</div></fieldset></div>';
        return html;
    }

    createFurnitureFields() {
        let html = '<div class="container"><fieldset id="Furniture" class="row">';
        html += '<label class="form-text">Please provide dimensions in CM and in HxWxL format</label>';
        html += '<div class="row row-cols-md-6 flex-column flex-sm-row">';
        html += '<label class="col col-form-label" for="height">Height (CM)</label>'
        html += '<div class="col col-md-6 col-lg-4">';
        html += '<input id="height" class="form-control formAttributes mb-3" type="number" name="height" step="any" value="">';
        html += '<label id="height-error" class="error" for="height"></label></div></div>';

        html += '<div class="row row-cols-md-6 flex-column flex-sm-row">';
        html += '<label class="col col-form-label" for="width">Width (CM)</label>'
        html += '<div class="col col-md-6 col-lg-4">';
        html += '<input id="width" class="form-control formAttributes mb-3" type="number" name="width" step="any" value="">';
        html += '<label id="width-error" class="error" for="width"></label></div></div>'

        html += '<div class="row row-cols-md-6 flex-column flex-sm-row">';
        html += '<label class="col col-form-label" for="length">Length (CM)</label>'
        html += '<div class="col col-md-6 col-lg-4">';
        html += '<input id="length" class="form-control formAttributes" type="number" name="length" step="any" value="">';
        html += '<label id="length-error" class="error" for="length"></label></div></div>';
        
        html += '</div></fieldset></div>';
    return html;
    }
}
