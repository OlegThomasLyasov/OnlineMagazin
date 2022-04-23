let storage = localStorage.test;
let section = document.querySelector('.cardd'+'.'+storage);
section.scrollIntoView({block: "center",behavior: "smooth"});
delete localStorage.test;