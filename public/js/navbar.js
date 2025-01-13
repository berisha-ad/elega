const linkWrapper = document.getElementById("linkWrapper");
const burgerIcon = document.getElementById("burgerIcon");

burgerIcon.addEventListener("click", () => {
    linkWrapper.classList.toggle("active");
    burgerIcon.classList.toggle("active");
})

