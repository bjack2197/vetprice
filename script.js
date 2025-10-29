// script.js

import products from './products.js';

document.addEventListener("DOMContentLoaded", function () {
    const productContainer = document.getElementById("product-list");
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");

    // Функция для отображения товаров
    function displayProducts(productsToShow) {
        productContainer.innerHTML = "";

        productsToShow.forEach((product) => {
            const productDiv = document.createElement("div");
            productDiv.classList.add("product");

            const productImage = document.createElement("img");
            productImage.src = product.image;

            const productName = document.createElement("h2");
            productName.textContent = product.name;

            const productPrice = document.createElement("p");
            productPrice.textContent = `${product.price.toFixed(2)}`;

            productDiv.appendChild(productImage);
            productDiv.appendChild(productName);
            productDiv.appendChild(productPrice);
            productContainer.appendChild(productDiv);
        });
    }

    // Функция для обработки поискового запроса
    function handleSearch() {
        const searchQuery = searchInput.value.trim().toLowerCase();

        const filteredProducts = products.filter((product) =>
            product.name.toLowerCase().includes(searchQuery)
        );

        displayProducts(filteredProducts);
    }

    searchInput.addEventListener("input", handleSearch);
    searchButton.addEventListener("click", handleSearch);

    // Инициализация отображения всех товаров при загрузке страницы
    displayProducts(products);
});

