document.addEventListener('DOMContentLoaded', () => {
    startCarousel();
})

function startCarousel() {
    const carouselContainer = document.querySelector('.carousel');
    if (!carouselContainer) return;

    const imgNum = 3;

    for (let i = 1; i <= imgNum; i++) {
        const img = document.createElement('IMG');
        img.src = `/assets/images/carousel/${i}.jpg`;
        img.id = `carousel-img-${i}`;
        img.className = "object-cover absolute w-full h-full transition-opacity duration-1000";
        img.classList.add(i === 1 ? 'opacity-100' : 'opacity-0');
        carouselContainer.appendChild(img);
    }

    let currentImgId = 1;

    setInterval(() => {
        const currentImg = document.getElementById(`carousel-img-${currentImgId}`);
        currentImg.classList.replace('opacity-100', 'opacity-0');

        currentImgId = currentImgId === imgNum ? 1 : currentImgId + 1;

        const nextImg = document.getElementById(`carousel-img-${currentImgId}`);
        nextImg.classList.replace('opacity-0', 'opacity-100');
    }, 5000);
}
