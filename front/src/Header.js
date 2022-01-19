import {Navbar,Nav} from 'react-bootstrap'
import { Link } from 'react-router-dom'


function Header(){

    return(
      <div >
            <Navbar bg="dark"  variant='dark'>

            <Navbar.Brand href="#home"> Prueba Brik </Navbar.Brand >
            <Nav className="mr-auto navbar_wrapper">
              <Link to="/registro">Registro de usuarios</Link>
              <Link to="/login">Inicio de sesión</Link>
            </Nav >


            </Navbar>



      </div >

    )
}
export default Header;