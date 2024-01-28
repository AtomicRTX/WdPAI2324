const likeButtons = document.querySelectorAll(".fa-thumbs-up");

likeButtons.forEach(button => button.addEventListener("click", function(event){
    event.preventDefault();
    const likes = this;
    const container = likes.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/like/${id}`)
        .then(function () {
            likes.innerHTML = parseInt(likes.innerHTML) + 1;
        })
}));
