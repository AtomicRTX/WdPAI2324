const likeButtons = document.querySelectorAll(".fa-thumbs-up");

likeButtons.forEach(button => button.addEventListener("click", function(event){
    event.preventDefault();
    const likes = this;
    const container = likes.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    const likedRestaurants = JSON.parse(localStorage.getItem('likedRestaurants')) || [];

    if (likedRestaurants.includes(id)) {
        alert("Już polubiłeś tę restaurację!");
    } else {
        fetch(`/like/${id}`)
            .then(function () {
                likes.innerHTML = parseInt(likes.innerHTML) + 1;

                likedRestaurants.push(id);
                localStorage.setItem('likedRestaurants', JSON.stringify(likedRestaurants));
            });
    }
}));
