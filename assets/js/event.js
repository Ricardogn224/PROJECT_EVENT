/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/


function onDataFilter(){
    console.log(this)
    this.style.background = '#000000'
}

function onSearchDateCategory(){

    this.style.background = 'rgba(118, 118, 118, 0.2)'

    console.log(this.dataset.category)
}

export {onDataFilter, onSearchDateCategory}