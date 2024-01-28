const search_rv = document.querySelector('input[placeholder="Search by name"]');
const reservationContainer = document.querySelector(".reservations");

search_rv.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();
        const data = {search_rv: this.value};
        console.log(data);
        fetch("/search_rv", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function(response){
            return response.json();
        }).then(function(reservations){
            reservationContainer.innerHTML="";
            loadReservation(reservations);
        });
    }
});

function loadReservation(reservations) {
    reservations.forEach(reservation => {
        console.log(reservation);
        createReservation(reservation);
    })
}
function createReservation(reservation){
    const template = document.querySelector("#reservation_template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `${reservation.res_logo}`;

    const name = clone.querySelector(".n");
    name.innerHTML = reservation.res_name;

    const date = clone.querySelector(".d");
    date.innerHTML = `Reservation date : ${reservation.date} ${reservation.hour}`;

    const people = clone.querySelector(".p");
    people.innerHTML = `Number of people : ${reservation.number_people}`;

    reservationContainer.appendChild(clone);
}
