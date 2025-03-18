import React from 'react';
import './Product.css';

function Product({ name, description, image, price }) {
  return (
    <div className="product">
      <img src={image} alt={name} className="product-image" />
      <h2>{name}</h2>
      <p>{description}</p>
      <p className="product-price">{price}</p>
    </div>
  );
}

export default Product;