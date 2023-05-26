document.addEventListener("DOMContentLoaded", function () {
    // ...
  
    /*************************************************************************************************/
    /* ****************************************** DONNEES ****************************************** */
    /*************************************************************************************************/
  
    // ...
  
    /*************************************************************************************************/
    /****************************************** PROGRAMME ********************************************/
    /*************************************************************************************************/
  
    // Fetch events on page load
    let urlGetEvent = '/get-event';
  
    fetch(urlGetEvent, {
      method: 'GET',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        // Process the fetched events data
        let ulEvent = document.querySelector('ul.flex.jcb.fww')
        for (let key in data["succeed"]) {
          var liEvent = document.createElement('li');
          liEvent.classList.add('flex')
          liEvent.classList.add('aic')

          var inputEvent = document.createElement('input')

          inputEvent.setAttribute('type', 'checkbox')
          inputEvent.setAttribute('name', data["succeed"][key])
          inputEvent.setAttribute('value', data["succeed"][key])
          inputEvent.setAttribute('id', data["succeed"][key])

          var labelEvent = document.createElement('label')
          labelEvent.textContent = data["succeed"][key]

          liEvent.append(inputEvent)
          liEvent.append(labelEvent)
          ulEvent.append(liEvent)
        }
      })
      .catch((error) => {
        console.log(error);
      });
  
    // ...
  });
  