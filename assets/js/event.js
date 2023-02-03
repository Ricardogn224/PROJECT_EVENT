/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/


function onDataFilter(){
    console.log(this)
    this.style.background = '#000000'
}

function onSearchDateCategory(){
    for (let index = 0; index < this.length; index++) {

        this[index].style.background = 'rgba(118, 118, 118, 0.05)'
    
    }

    this.style.background = 'rgba(118, 118, 118, 0.2)'

    console.log(this.dataset.category)
}

export default {onDataFilter, onSearchDateCategory}