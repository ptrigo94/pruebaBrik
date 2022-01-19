import React, {useState, useEffect} from 'react'
import {useNavigate} from 'react-router-dom'
import Header from './Header';

function Login(){
    const[email,setEmail]=useState("")
    const[password,setPassword]=useState("")




    const navigate = useNavigate();
    useEffect (()=>{
        if (localStorage.getItem('user-info')) {
            navigate("/listarTareas")
        }
    },[]  
    )
    async function login(){
        console.warn(email);
        let item={email,password};
        let result = await fetch( "http://localhost:8088/api/iniciosesion",{
            method:'POST',
            
            headers:{
                "Content-Type":'application/json',
                "Accept":'application/json'
            },body:JSON.stringify(item)
        }

        );
        result = await result.json()
        let navigate = useNavigate();
        localStorage.setItem("user-info",JSON.stringify(result))
        navigate("/listarTareas")


    }





    return(
        <div>
            <Header/>
            <h1>Iniciar Sesión</h1>
            <label for="name"><b>Email</b></label>
    <input type="email" placeholder="Ingrese su correo" onChange={(e)=>setEmail (e.target.value)} name="email" required/>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" onChange={(e)=>setPassword (e.target.value)} name="password" required/>

    <button onClick={login} className=" btn btn-primary">Login</button>
    
            



        </div>
    )
}

export default Login;