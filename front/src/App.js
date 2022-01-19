import logo from './logo.svg';
import './App.css';
import Registro from './Registro';
import ListarTareas from './listarTareas';
import Login from './Login';

import Header from './Header';
import{BrowserRouter, Route} from 'react-router-dom';

function App() {
  return (
    <div className="App">
      <BrowserRouter>
      <Header/>
        <h1>App React con API Laravel</h1>
        <Route path="/registro">
        <Registro/>
        

        </Route>
        <Route path="/login">
        <Login/>
        

        </Route>
        </BrowserRouter>
 
        </div>
  );
}

export default App;
