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
        console.log(data);
        // ...
        // Display the content for each value in the response
        data.forEach((event) => {
        console.log(event); // Display the event object or access its properties
        // Perform actions with the event data, such as creating HTML elements, updating the UI, etc.
        // For example, you can access event properties like event.name, event.date, event.description, etc.
        });
      })
      .catch((error) => {
        console.log(error);
      });
  
    // ...
  });
  