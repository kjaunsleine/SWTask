/* Add Product, Furniture, DVD, Book classes */

class Product {
  constructor(id, type, sku, name, price){
    this.id = id;
    this.sku = sku;
    this.name = name;
    this.price = price;
    this.type = type;
  }
}

class Furniture extends Product {
  constructor(id, type, sku, name, price, height, width, len){
    super(id, type, sku, name, price);
    this.height = height;
    this.width = width;
    this.len = len;
  }

  attrText() {
    return `Dimensions: ${this.height}x${this.width}x${this.len}`;
  }
}

class DVD extends Product {
  constructor(id, type, sku, name, price, size){
    super(id, type, sku, name, price);
    this.size = size;
  }

  attrText() {
    return `Size: ${this.size} MB`;
  }
}

class Book extends Product {
  constructor(id, type, sku, name, price, weight){
    super(id, type, sku, name, price, );
    this.weight = weight;
  }
  
  attrText() {
    return `Weight: ${this.weight} KG`;
  }
}

$(function(){
  'use strict';

  /* Delete product */
  const deleteProduct = () => {
    $('.delete-checkbox:checked').parent().remove();
  }
  $('#delete-product-btn').on('click', deleteProduct);
  

  /* Add product */
  const addProduct = (product) => {
    let $productDiv = $(`<div class="product" data-type="${product.type}"></div>`);
    $productDiv.attr('id', `p${product.id}`);
    let html = '<input class="delete-checkbox" type="checkbox">';
    html += `<p class="product-sku">${product.sku}</p>`;
    html += `<p class="product-name">${product.name}</p>`;
    html += `<p class="product-price">${product.price} $</p>`;
    html += `<p class="product-attr">${product.attrText()}</p>`;

    $productDiv.html(html);
    $productDiv.appendTo($('.product-list'));

  }
  const chair = new Furniture(1, 'Furniture','JA000001', 'Chair', 24, 24,24,24);
  /*
  const book = new Book(2, 'Book', 'BB000012', 'A brief history of time', 10, 0.5)
  const disc = new DVD(3, 'DVD', 'D000003', 'BluRay', 2, 2048);
  console.log(chair.type);
  addProduct(chair);
  addProduct(book);
  addProduct(disc);
 */
  /* Change form depending on type */
    $('#productType').change(function() {
      $('#productType option').each(function() {
        let typeOption = $(this).attr('value');
        if (!typeOption) {
          return;
        } else {
          $(`#${typeOption}`).css({display: 'none'});
          $(`#${typeOption} input`).prop('disabled', true);
        }
      });
      let typeSelected = $('#productType option:selected').attr('value');
      if (!typeSelected) {
        return;
      } else {
        $(`#${typeSelected}`).css({display: 'flex'});
        $(`#${typeSelected} input`).prop('disabled', false);
      }
    }).change();

  
});
