let filterButtonUp = document.getElementById("filterButtonUp");
let filterButton = document.getElementById("filterButton");
let filterBar = document.getElementById("filterBar");

filterButtonUp.addEventListener(
    "click",
    (e) => (filterBar.style.display = `flex`)
);
filterButton.addEventListener(
    "click",
    (e) => (filterBar.style.display = `none`)
);

// Спарсить квери параметры урла
// params = new URLSearchParams(location.search);
// params.has("page") ? params.delete("page") : params;

// let links = document.querySelectorAll("#pagination a");
// console.log(params.keys());
// links.forEach((item) =>
//     item.setAttribute("href", item.attributes["href"].value + `&${params}`)
// );

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
