import { BrowserRouter as Router, Switch, Route} from 'react-router-dom'
import Header from './components/header/Header'
import Footer from './components/footer/Footer'
import Home from './pages/Home/Home'

function App() {
  return (

    <Router>

     <Header/>

   <Switch>

        <Route exact path="/">
        <Home />
        </Route>

   

 
    </Switch>
  
      <Footer></Footer>

    </Router>



  );
}

export default App;
