import './home.css';
import Product from '../../components/product/Product';
import Header from '../../components/header/Header';
import Footer from '../../components/footer/Footer'

const products = [
  { id: 1, name: 'Produto 1', description: 'Descrição do Produto 1', image: 'url-da-imagem-1.jpg', price: 'R$ 100,00' },
  { id: 2, name: 'Produto 2', description: 'Descrição do Produto 2', image: 'url-da-imagem-2.jpg', price: 'R$ 200,00' },
  { id: 3, name: 'Produto 3', description: 'Descrição do Produto 3', image: 'url-da-imagem-3.jpg', price: 'R$ 300,00' },
  { id: 4, name: 'Produto 4', description: 'Descrição do Produto 4', image: 'url-da-imagem-4.jpg', price: 'R$ 400,00' },
  { id: 5, name: 'Produto 5', description: 'Descrição do Produto 5', image: 'url-da-imagem-1.jpg', price: 'R$ 100,00' }
];

function Home() {
  return (
    <>
      <Header />
      <section className="home_container">
        <h1>Bem-Vindo ao <span>Peças</span></h1>
        <p>Sistema de gerenciamento de peças automotivas!</p>

        <div className="products_container">
          {products.map(product => (
            <Product 
              key={product.id} 
              name={product.name} 
              description={product.description} 
              image={product.image} 
              price={product.price} 
            />
          ))}
        </div>
      </section>
      <Footer />
    </>
  );
}

export default Home;