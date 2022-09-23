const hamburguer = document.querySelector('.hamburger');
const menu = document.querySelector('.menu-navegacion');

console.log(menu)
console.log(hamburguer)


hamburguer.addEventListener('click',()=>{
    menu.classList.toggle('spread')
})