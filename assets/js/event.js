/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/


function onDataFilter(){

    let element = document.querySelector(`div[data-filter=${event.target.dataset.filter}] ~ input`)

    element.checked = true

    this.style.background = '#000000'
}

function onSearchDateCategory(){

    this.style.background = 'rgba(118, 118, 118, 0.2)'

    console.log(this.dataset.category)
}

export {onDataFilter, onSearchDateCategory}