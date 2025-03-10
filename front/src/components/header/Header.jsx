import { Link } from 'react-router-dom';
import '../header/Header.css';
import logo from '../../img/logo.png';


function Header() {
  return (
    <div className="header">
      <Link to="/">
        <img src={logo} alt="Peças"/>
      </Link>
      <ul className="list">
        <li className="item">
          <Link to="/">Home</Link>
        </li>
        <li className="item">
          <Link to="/">Todas peças</Link>
        </li>
        <li className="item">
          <Link to="/Login">Login</Link>
        </li>
      </ul>
    </div>
  );
}

export default Header;