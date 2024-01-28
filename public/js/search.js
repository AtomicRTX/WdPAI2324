const search = document.querySelector('input[placeholder="Search by name"]');
const restaurantContainer = document.querySelector(".restaurants");

search.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();
        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function(response){
            return response.json();
        }).then(function(restaurants){
           restaurantContainer.innerHTML="";
           loadRestaurant(restaurants);
        });
    }
});

function loadRestaurant(restaurants) {
    restaurants.forEach(restaurant => {
        console.log(restaurant);
        createRestaurant(restaurant);
    })
}
function createRestaurant(restaurant){
    const template = document.querySelector("#restaurant_template");

    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href = `/restaurant_details?id=${restaurant.res_id}`;

    const image = clone.querySelector("img");
    image.src = `${restaurant.res_logo}`;

    const name = clone.querySelector(".n");
    name.innerHTML = restaurant.res_name;

    const location = clone.querySelector(".l");
    location.innerHTML = restaurant.res_location;

    const rating = clone.querySelector(".r");
    rating.innerHTML = `<i class="fa-regular fa-thumbs-up">${restaurant.res_like}</i>`;

    restaurantContainer.appendChild(clone);
}
