let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');

function changeSlide(n) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (currentSlide + n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
}


// Fetch data from the database and display it
document.addEventListener('DOMContentLoaded', () => {
    fetch('fetch_phones.php')
        .then(response => response.json())
        .then(data => {
            const featuredPhones = document.getElementById('featured-phones');
            const onSalePhones = document.getElementById('on-sale-phones');
            const accessories = document.getElementById('accessories');

            data.featured.forEach(phone => {
                featuredPhones.innerHTML += `
                    <div class="product">
                        <img src="images/${phone.image}" alt="${phone.name}">
                        <h3>${phone.name}</h3>
                        <p>$${phone.price}</p>
                        <p>${phone.details}</p>
                    </div>
                `;
            });

            
            data.onSale.forEach(phone => {
                onSalePhones.innerHTML += `
                    <div class="product">
                        <img src="images/${phone.image}" alt="${phone.name}">
                        <h3>${phone.name}</h3>
                        <p>$${phone.price}</p>
                        <p>${phone.details}</p>
                    </div>
                `;
            });

            data.accessories.forEach(accessory => {
                accessories.innerHTML += `
                    <div class="product">
                        <img src="images/${accessory.image}" alt="${accessory.name}">
                        <h3>${accessory.name}</h3>
                        <p>$${accessory.price}</p>
                        <p>${accessory.details}</p>
                    </div>
                `;
            });
        });
});
