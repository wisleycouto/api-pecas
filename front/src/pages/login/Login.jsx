import  { useState } from 'react';
import './Login.css';
import image from '../../img/img_login.png';
import logo2 from '../../img/Peças-logo2.png';
import Divider from '@mui/material/Divider';
import { FaGoogle, FaFacebook, FaEye, FaEyeSlash, FaUser, FaLock } from 'react-icons/fa';
import { useNavigate } from 'react-router-dom';

function Login() {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [showPassword, setShowPassword] = useState(false);
    const navigate = useNavigate();
  

  const toggleShowPassword = () => {
    setShowPassword(!showPassword);
  };

  const handleLogin = () => {

    if(username === '1' && password === '1'){
        navigate('/home');
    } else {

        alert('Credenciais invalidas');

    }

  };

  return (
    <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', height: '100vh' }}>
      <div className="login-container">
        <img src={image} alt="Login" />
        <div className="login">
          <div className="login-itens">
            <img src={logo2} alt="Letreiro" />
            <div className="social-login-buttons">
              <button className="google-login">
                <FaGoogle style={{ marginRight: '10px' }} />
                Login com Google
              </button>
              <button className="facebook-login">
                <FaFacebook style={{ marginRight: '10px' }} />
                Login com Facebook
              </button>
            </div>
            <div className="hr-container">
              <Divider>Ou</Divider>
            </div>
            <div className="user">
              <div className="input-container">
                <FaUser className="input-icon" />
                <input
                 id="Usuario"
                 type="text"
                 placeholder="Usuario" 
                 value={username}
                 onChange={(e) => setUsername(e.target.value)}
                 />
              </div>
            </div>
            <div className="password">
              <div className="input-container">
                <FaLock className="input-icon" />
                <input
                  id="senhaUsuario"
                  type={showPassword ? 'text' : 'password'}
                  placeholder="Senha"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                />
                <button
                  type="button"
                  onClick={toggleShowPassword}
                  className="password-toggle-button"
                >
                  {showPassword ? <FaEyeSlash /> : <FaEye />}
                </button>
              </div>
            </div>
            <div className="checkbox">
              <a>
                <input type="checkbox" id="Lembrar senha" />
                <label> Lembrar-me </label>
              </a>
              <a href='/'> Esqueceu a senha?</a>
            </div>
            <div style={{ paddingLeft: '75px' }}>
              <button
                style={{
                  backgroundColor: '#6358DC',
                  color: 'white',
                  padding: '20px',
                  borderRadius: '10px',
                  border: 'none',
                  cursor: 'pointer',
                  width: '85%',
                  height: '55px',
                }}
                onClick={handleLogin}
              >
                Login
              </button>
            </div>
            <div style={{ display: 'flex', justifyContent: 'center' }}>
              <p>Nao tem conta ainda? <a href='/'> Registrar-se</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Login;