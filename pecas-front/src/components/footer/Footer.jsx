import {  FaLinkedin, FaGithub, FaYoutube, FaInstagram, FaWhatsapp } from "react-icons/fa"

import  './Footer.css'

function Footer(){

    return (
    <div style={{paddingTop: "100px"}}>
    <footer className={"footer"} >
        <ul className={"social_list"}>




            <li>

            <FaLinkedin />

            </li>


            <li>

         <FaYoutube />

         </li>


            <li>

            <FaInstagram />

            </li>


            <li>

            <FaWhatsapp/>

            </li>





            <li>

            <FaGithub />

            </li>




        </ul>

            <p className={"copy_right"}><span>Peças </span> &copy;2025</p>

    </footer>
    </div>
    )


}



export default Footer