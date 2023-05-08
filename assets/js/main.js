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
    let articleItem = document.querySelectorAll('.article-item')
    let articleFavs = document.querySelectorAll('.heartItem')

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
            console.log(princilalCategorie.querySelector('span').textContent)
            let even = princilalCategorie.querySelector('span').textContent
            
            for ( let index = 0; index < articleItem.length; index++) {

                articleItem[index].style.background = 'rgba(118, 118, 118, 0.05)'
                if (articleItem[index].classList.contains(even)) {
                    articleItem[index].style.display = 'block'
                } else {
                    articleItem[index].style.display = 'none'
                }
            }

        })

    }

    document.querySelector('.calendar-link').addEventListener('click', function(){

        document.querySelector('.date-reservaton').showPicker()
    })

    for(const articleFav of articleFavs){
       
        console.log(articleFav)
        articleFav.addEventListener('click', function(){

            console.log(69776);

        })

    }

    




    /*document.querySelector('.fa-heart').addEventListener('click', function () {
        
        console.log(666);
        fetch("https://jsonplaceholder.typicode.com/posts", {
            method: 'post',
            body: post,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then((response) => {
            return response.json()
        }).then((res) => {
            if (res.status === 201) {
                console.log("Post successfully created!")
            }
        }).catch((error) => {
            console.log(error)
        })

    })*/

    /*const evItem = document.querySelectorAll(".container .infinite-carousel .carousel-items principal-categor");

    for (let i = 0; i < evItem.length; i++) {
        evItem[i].addEventListener("click", function() {
            console(666);
        });
    }*/


});