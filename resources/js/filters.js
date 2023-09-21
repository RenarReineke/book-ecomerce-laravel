
// Панель фильтров
let filterButtonUp = document.getElementById("filterButtonUp");
let filterButton = document.getElementById("filterButton");
let filterBar = document.getElementById("filterBar");
let filterLayout = document.getElementById("filterLayout");

filterButtonUp.addEventListener(
    "click",
    (e) => (
        filterBar.style.display = `flex`,
        filterLayout.style.display = `block`
        )
);
filterButton.addEventListener(
    "click",
    (e) => (
        filterBar.style.display = `none`,
        filterLayout.style.display = `none`
        )
);

// Инпут слайдер
let priceToInput = document.getElementById("to");
let priceFromInput = document.getElementById("from");
let priceToRangeInput = document.getElementById("toRange");
let priceFromRangeInput = document.getElementById("fromRange");

priceFromRangeInput.addEventListener(
    "input",
    (e) => (priceFromInput.value = e.target.value)
);
priceToRangeInput.addEventListener(
    "input",
    (e) => (priceToInput.value = e.target.value)
);
