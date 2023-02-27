'use strict';

import {onDataFilter, onSearchDateCategory} from './event.js';

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/
document.addEventListener("DOMContentLoaded", function () {
    // Création puis démarrage de l'application.

    /*************************************************************************************************/
    /* ****************************************** DONNEES ****************************************** */
    /*************************************************************************************************/

    let btnChoiceEvents = document.querySelectorAll('.btn-choise-event')
    let princilalCategories = document.querySelectorAll('.principal-category')


    /*************************************************************************************************/
    /****************************************** PROGRAMME ********************************************/
    /*************************************************************************************************/

    document.querySelector('.btn-filter').addEventListener('click', function () {
        document.querySelector('.search').setAttribute('id', 'border')
        document.querySelector('.filter-list').style.display = 'block'
    })

    document.querySelector('.close-btn-filter').addEventListener('click', function () {
        document.querySelector('.search').removeAttribute('id', 'border')
        document.querySelector('.filter-list').style.display = 'none'

    })

    document.querySelector('.btn-valid-filter').addEventListener('click', function () {
        document.querySelector('.search').removeAttribute('id', 'border')
        document.querySelector('.filter-list').style.display = 'none'

    })

    for (const btnChoiceEvent of btnChoiceEvents) {
        btnChoiceEvent.addEventListener('click', onDataFilter)
    }

    for(const princilalCategorie of princilalCategories){
       
        princilalCategorie.addEventListener('click', function(){

            for ( let index = 0; index < princilalCategories.length; index++) {

                princilalCategories[index].style.background = 'rgba(118, 118, 118, 0.05)'
            }

            princilalCategorie.style.background = 'rgba(118, 118, 118, 0.2)'

        })

    }

    princilalCategories[0].style.background = 'rgba(118, 118, 118, 0.2)';

    document.querySelector('.calendar-link').addEventListener('click', function(){

        document.querySelector('.date-reservaton').showPicker()
    })


});