import React from 'react';
import './Product.css';
import cambio from '../../img/cambio.jpg';

function Product({ name, description, price }) {
  return (
    <div className="product">
      <h2>{name}</h2>
      <img src={cambio} alt={name} className="product-image" />
      <p>{description}</p>
      <button className="product-price">{price}</button>
    </div>
  );
}

export default Product;