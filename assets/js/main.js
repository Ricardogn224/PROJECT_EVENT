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

    let showService = document.querySelector('.showServ')

    let chooseDate = document.querySelector('.choose-date')

    /*let addDispo = document.querySelector('.add-dispo')

    let addDateElement = document.querySelector('.add-dispo .add-date')
    let clonedAddDate = addDateElement.cloneNode(true);*/


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
       
        princilalCategorie.addEventListener('click', function(event){
            event.stopPropagation()
            for ( let index = 0; index < princilalCategories.length; index++) {

                princilalCategories[index].style.background = 'rgba(118, 118, 118, 0.05)'
            }

            princilalCategorie.style.background = 'rgba(118, 118, 118, 0.2)'
            console.log(princilalCategorie.querySelector('span').textContent)
            let even = princilalCategorie.querySelector('span').textContent
            
            for ( let index = 0; index < articleItem.length; index++) {

                articleItem[index].style.background = 'rgba(118, 118, 118, 0.05)'
                console.log(even)
                if (articleItem[index].classList.contains(even)) {
                    articleItem[index].style.display = 'block'
                } else {
                    articleItem[index].style.display = 'none'
                }
            }

        })

    }

    for(const articleIt of articleItem){
       
        articleIt.addEventListener('click', function(event){
            if (event.target.tagName === 'path') {
                event.preventDefault();
            }
        })

    }

    document.querySelector('.calendar-link').addEventListener('click', function(){
        document.querySelector('.date-reservaton').showPicker()
    })

    for(const articleFav of articleFavs){

        let idIsFav = articleFav.closest('.article-item').querySelector('.idDisplay').textContent
        let urlIsFav = '/favori/isFav/' + idIsFav
        
        fetch(urlIsFav, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then((response) => {
            return response.json().then((data) => {
                if (data["succeed"] === 'favIn') {
                    articleFav.querySelector('path').style.color = 'red'
                }
                
        }).catch((error) => {
            console.log(error)
        })
        });
       
        articleFav.addEventListener('click', function(){

           let idFav = this.closest('.article-item').querySelector('.idDisplay').textContent
           let itemFav = this

           let urlAddFav = '/favori/add/' + idFav

           fetch(urlAddFav, {
                method: 'post',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                return response.json().then((data) => {
                    if (data["succeed"] === 'oui') {
                        itemFav.querySelector('path').style.color = 'red'
                    }else if (data["succeed"] === 'already') {
                        itemFav.querySelector('path').style.color = 'black'
                        if (itemFav.classList.contains('fav-page')) {
                            itemFav.closest('.article-item').remove()
                        }
                    }else if (data["succeed"] === 'login') {
                        window.location.href = window.location.protocol + "//" + window.location.host + "/login"
                    }
                    
            }).catch((error) => {
                console.log(error)
            })
            });

        })

    }

    if (showService) {
        let actionFav = showService.querySelector('.actFavShow')

        let idIsFav = showService.querySelector('.table tr.showServId td').textContent
        let urlIsFav = '/favori/isFav/' + idIsFav
        
        fetch(urlIsFav, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }
        }).then((response) => {
            return response.json().then((data) => {
                if (data["succeed"] === 'favIn') {
                    actionFav.textContent = "Retirer des favoris"
                }else if(data["succeed"] === 'noFav'){
                    actionFav.textContent = "Ajouter aux favoris"
                }
                
        }).catch((error) => {
            console.log(error)
        })
        });


        actionFav.addEventListener('click', function(){


            let idFav = this.closest('.showServ').querySelector('.table tr.showServId td').textContent
    
            let urlAddFav = '/favori/add/' + idFav
    
            fetch(urlAddFav, {
                method: 'post',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                return response.json().then((data) => {
                    if (data["succeed"] === 'oui') {
                        actionFav.textContent = "Retirer des favoris"
                    }else if (data["succeed"] === 'already') {
                        actionFav.textContent = "Ajouter aux favoris"
                    }else if (data["succeed"] === 'login') {
                        window.location.href = window.location.protocol + "//" + window.location.host + "/login"
                    }
                    
            }).catch((error) => {
                console.log(error)
            })
            });
        })
    }



    chooseDate.addEventListener('click', function(event){
        
        if (event.target.classList.contains('date-chosen')) {
            let liDates = event.target.closest('.dispo-list').querySelectorAll('li')
            for(const liDate of liDates){
                liDate.style.background = 'white'
                liDate.querySelector('a').textContent = "Choisir"
                liDate.querySelector('a').classList.remove("chosen")
                liDate.querySelector('a').classList.add("notChosen")
            }

            let liSelec = event.target.closest('li')
            liSelec.style.background = 'lightGrey'
            liSelec.querySelector('a').textContent = "Choisi"
            liSelec.querySelector('a').classList.remove("notChosen")
            liSelec.querySelector('a').classList.add("chosen")

            let inputPlanedDate

            if (liSelec.classList.contains('new-date')) {
                inputPlanedDate = document.querySelector('input.new-planed-date')
            }else{
                inputPlanedDate = document.querySelector('input.planed-date')
            }

            inputPlanedDate.value = event.target.closest('li').querySelector('.hidden-date').textContent
            console.log(inputPlanedDate.value)
        }

    })
    
    let urlGetEvent = '/get-event';

    fetch(urlGetEvent, {
    method: 'GET',
    headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
    },
    })
    .then((response) => {
        console.log(response);
        return response.json();
    })
    .then((data) => {
        console.log(data);
    })
    .catch((error) => {
        console.log(error);
    });


});