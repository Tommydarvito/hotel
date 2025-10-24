const carousel = document.getElementById('carousel');
        const slides = carousel.children.length;
        let index = 1; 
        let isTransitioning = false;

        const firstClone = carousel.children[0].cloneNode(true);
        const lastClone = carousel.children[slides - 1].cloneNode(true);

        carousel.appendChild(firstClone);
        carousel.insertBefore(lastClone, carousel.firstChild);

        const totalSlides = slides + 2; 
        carousel.style.transform = `translateX(-${index * 100}%)`;

        function showSlide(i) {
            if (isTransitioning) return;
            isTransitioning = true;

            carousel.style.transition = "transform 0.7s ease-in-out";
            carousel.style.transform = `translateX(-${i * 100}%)`;

            carousel.addEventListener('transitionend', () => {
                if (i === totalSlides - 1) {
                    carousel.style.transition = "none";
                    index = 1;
                    carousel.style.transform = `translateX(-${index * 100}%)`;
                } else if (i === 0) {
                    carousel.style.transition = "none";
                    index = totalSlides - 2;
                    carousel.style.transform = `translateX(-${index * 100}%)`;
                }
                isTransitioning = false;
            }, {
                once: true
            });
        }

        document.getElementById('nextBtn').addEventListener('click', () => {
            if (!isTransitioning) {
                index++;
                showSlide(index);
            }
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            if (!isTransitioning) {
                index--;
                showSlide(index);
            }
        });
