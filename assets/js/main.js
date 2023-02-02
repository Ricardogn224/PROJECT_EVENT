'use strict';
/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

import './event';
import './ajax';
import './anim';
import './utilities';

document.addEventListener("DOMContentLoaded", function() {
    // Création puis démarrage de l'application.

    document.querySelector('.btn-filter').addEventListener('click', function(){
        document.querySelector('.search').setAttribute('id', 'border')
        document.querySelector('.filter-list').style.display = 'block'
    })

    document.querySelector('.close-btn').addEventListener('click', function(){
        console.log(this)
        document.querySelector('.search').removeAttribute('id', 'border')
        document.querySelector('.filter-list').style.display = 'none'

    })

    document.querySelector('.filter-list').style.display = 'none'


    console.log("test main js")

});