
import React, {useState} from 'react'
import {useNavigate} from 'react-router-dom'
function Registro(){

    const[name,setName]=useState("")
    const[apellido,setApellido]=useState("")
    const[email,setEmail]=useState("")
    const[password,setPassword]=useState("")
    const[password_confirmation,setPassword_confirmation]=useState("")
    const[rut,setRut]=useState("")

    async function registrar(){
        let item= {name,email,password}
        console.warn(item)

        let result = await fetch("http://localhost:8088/api/registro",{
            method:'POST',
            body:JSON.stringify(item),
            headers:{
                "Content-Type":'application/json',
                "Accept":'application/json'
            }
        })
        result = await result.json()
        let navigate = useNavigate();
        localStorage.setItem("user-info",JSON.stringify(result))
        console.warn("result",result)
        navigate("/listarTareas")
    }
    return (

    



        <form >
  <div class="container">
  <Header/>
    <h1>Registrod de Usuario</h1>
    
    
    <label for="name"><b>Nombre</b></label>
    <input type="text" placeholder="Ingrese su nombre"  value={name} onChange={(e)=>setName (e.target.value)} name="name" id="name" required/>
    <label for="apellido"><b>Apellido</b></label>
    <input type="text" placeholder="Ingrese su apellido" value={apellido} onChange={(e)=>setApellido (e.target.value)} name="apellido" id="apellido" required/>
    <label for="rut"><b>Rut</b></label>
    <input type="text" placeholder="Ingrese su rut" value={rut} onChange={(e)=>setRut (e.target.value)} name="rut" id="rut" required/>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Ingrese su email" value={email} onChange={(e)=>setEmail (e.target.value)} name="email" id="email" required/>

    <label for="password"><b>Contraseña</b></label>
    <input type="password" placeholder="Ingrese su contraseña" value={password} onChange={(e)=>setPassword (e.target.value)} name="password" id="password" required/>

    <label for="psw-repeat"><b>Confirmar contraseña</b></label>
    <input type="password" placeholder="Repita su contraseña" value={password_confirmation} onChange={(e)=>setPassword_confirmation (e.target.value)} name="password_confirmation" id="password_confirmation" required/>
    
    <button onClick={registrar} class="btn btn-primary">Registrar</button>
    </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>)
}
export default Registro;