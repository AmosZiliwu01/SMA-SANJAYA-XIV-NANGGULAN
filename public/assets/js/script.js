// Consolidated JavaScript for Website
document.addEventListener('DOMContentLoaded', function() {

    // ==================== NAVBAR SCROLL BEHAVIOR ====================
    let lastScrollTop = 0;
    const topBar = document.getElementById('topBar');
    const navbarContainer = document.getElementById('navbarContainer');

    // Function to check if we're on mobile
    function isMobile() {
        return window.innerWidth <= 768; // Changed from 576 to 768 to match CSS breakpoint
    }

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Only apply scroll behavior on desktop
        if (!isMobile()) {
            // Desktop behavior: original logic
            if (scrollTop > lastScrollTop) {
                // Scroll ke bawah - sembunyikan top bar
                topBar.style.display = 'block';
                navbarContainer.classList.add('navbar-scrolled');
            } else {
                // Scroll ke atas - tampilkan top bar
                if (scrollTop === 0) {
                    topBar.style.transform = 'translateY(0)';
                    navbarContainer.classList.remove('navbar-scrolled');
                }
            }
        }
        // Mobile: do nothing, navbar stays fixed in place

        lastScrollTop = scrollTop;
    });

    // Reset classes on resize
    window.addEventListener('resize', function() {
        if (isMobile()) {
            // Remove all scroll-related classes on mobile
            navbarContainer.classList.remove('navbar-scrolled', 'navbar-scrolled-mobile');
            topBar.style.transform = '';
            topBar.style.display = '';
        }
    });


    // ==================== BOOTSTRAP CAROUSEL ====================
    // Auto carousel cycle
    if (document.getElementById('carousel')) {
        var carousel = new bootstrap.Carousel(document.getElementById('carousel'), {
            interval: 5000,
            pause: false
        });
    }

    // ==================== TESTIMONIAL CAROUSEL ====================
    const testimonialContainer = document.querySelector('.testimonial-container');
    const slides = document.querySelectorAll('.testimonial-card');
    const paginationContainer = document.getElementById('pagination');

    if (testimonialContainer && slides.length > 0) {
        let currentIndex = 0;
        const totalSlides = slides.length;

        // Create pagination dots
        function createPaginationDots() {
            if (paginationContainer) {
                paginationContainer.innerHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('div');
                    dot.className = `pagination-dot ${i === 0 ? 'active' : ''}`;
                    dot.setAttribute('data-index', i);
                    dot.addEventListener('click', function() {
                        goToSlide(parseInt(this.getAttribute('data-index')));
                    });
                    paginationContainer.appendChild(dot);
                }
            }
        }

        // Update active pagination dot
        function updatePaginationDots() {
            const dots = document.querySelectorAll('.pagination-dot');
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        // Show specific slide
        function goToSlide(index) {
            currentIndex = index;
            testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
            updatePaginationDots();
        }

        // Go to next slide
        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            goToSlide(currentIndex);
        }

        // Go to previous slide
        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            goToSlide(currentIndex);
        }

        // Initialize pagination
        createPaginationDots();

        // Auto slide every 5 seconds
        let autoSlideInterval = setInterval(nextSlide, 5000);

        // Reset timer when manually navigating
        const controlButtons = document.querySelectorAll('.control-btn, .pagination-dot');
        controlButtons.forEach(button => {
            button.addEventListener('click', function() {
                clearInterval(autoSlideInterval);
                autoSlideInterval = setInterval(nextSlide, 5000);
            });
        });

        // Mobile touch support
        let touchStartX = 0;
        let touchEndX = 0;

        const carouselElement = document.querySelector('.testimonial-carousel');

        if (carouselElement) {
            carouselElement.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, {passive: true});

            carouselElement.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {passive: true});

            function handleSwipe() {
                if (touchEndX < touchStartX - 50) {
                    nextSlide(); // Swipe left, go to next slide
                } else if (touchEndX > touchStartX + 50) {
                    prevSlide(); // Swipe right, go to previous slide
                }
            }
        }
    }

    // ==================== COMMENT TOGGLE ====================
    const toggleButton = document.querySelector('.toggle-comment-form');
    const formContainer = document.querySelector('.comment-form-container');
    const commentItems = document.querySelector('.comment-items-container');
    const toggleText = document.querySelector('.toggle-text');

    if (toggleButton && formContainer && commentItems && toggleText) {
        toggleButton.addEventListener('click', function() {
            formContainer.classList.toggle('show');
            commentItems.classList.toggle('hide');
            toggleButton.classList.toggle('active');

            if (formContainer.classList.contains('show')) {
                toggleText.textContent = 'Lihat Komentar';
            } else {
                toggleText.textContent = 'Tinggalkan Komentar';
            }
        });
    }

    // ==================== INFORMATION TABS ====================
    const tabs = document.querySelectorAll('.nav-link-informasi');
    const tabContents = document.querySelectorAll('.tab-pane');

    if (tabs.length > 0 && tabContents.length > 0) {
        // Fungsi untuk mengaktifkan tab
        function activateTab(tab) {
            // Hapus kelas 'active' dari semua tab dan konten
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('show', 'active'));

            // Tambahkan kelas 'active' ke tab yang diklik
            tab.classList.add('active');

            // Ambil target dari data-bs-target
            const target = tab.getAttribute('data-bs-target');
            const content = document.querySelector(target);

            // Tambahkan kelas 'show active' ke konten yang sesuai
            if (content) {
                content.classList.add('show', 'active');

                // Update judul dinamis
                const title = document.getElementById('dynamic-title');
                if (title) {
                    title.textContent = tab.textContent.trim();
                }
            }
        }

        // Event listener untuk setiap tab
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                activateTab(this);
            });
        });

        // Cek hash URL saat halaman dimuat
        const hash = window.location.hash;
        if (hash) {
            const tabId = hash.substring(1);
            const tab = document.querySelector(`#${tabId}-tab`);
            if (tab) {
                activateTab(tab);
            }
        }
    }


    // ==================== PHOTO GALLERY ====================
    (function(){
        const galleryItems = document.querySelectorAll('.photo-gallery-unique .gallery-item');
        const modal = document.querySelector('.photo-gallery-modal');
        const showMoreBtn = document.querySelector('.photo-gallery-unique .show-more-btn');

        let currentIndex = -1;
        let expanded = false;

        // Function to open modal with the image and caption according to the index
        function openModal(index) {
            const item = galleryItems[index];
            const img = item.querySelector('img');
            const caption = item.getAttribute('data-caption') || img.alt || '';

            const modalImg = modal.querySelector('img');
            const modalCaption = modal.querySelector('#modal-caption');

            modalImg.src = img.src;
            modalImg.alt = img.alt;
            modalCaption.textContent = caption;

            currentIndex = index;
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';

            // Focus on the close button when modal is opened
            const closeBtn = modal.querySelector('.photo-gallery-close-btn');
            if (closeBtn) closeBtn.focus();
        }

        // Function to close the modal and reset
        function closeModal() {
            modal.classList.remove('open');

            const modalImg = modal.querySelector('img');
            const modalCaption = modal.querySelector('#modal-caption');

            modalImg.src = '';
            modalImg.alt = '';
            modalCaption.textContent = '';

            document.body.style.overflow = '';
            currentIndex = -1;
        }

        // Function to go to the previous image
        function showPrev() {
            if (currentIndex <= 0) {
                currentIndex = galleryItems.length - 1;
            } else {
                currentIndex--;
            }
            openModal(currentIndex);
        }

        // Function to go to the next image
        function showNext() {
            if (currentIndex >= galleryItems.length - 1) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            openModal(currentIndex);
        }

        // Attach click and keyboard event listeners to each gallery item
        galleryItems.forEach((item, idx) => {
            item.addEventListener('click', () => openModal(idx));
            item.addEventListener('keydown', e => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    openModal(idx);
                }
            });
        });

        // Close modal button
        const closeBtn = modal.querySelector('.photo-gallery-close-btn');
        if (closeBtn) closeBtn.addEventListener('click', closeModal);

        // Modal navigation buttons
        const prevBtn = modal.querySelector('.photo-gallery-modal-prev');
        const nextBtn = modal.querySelector('.photo-gallery-modal-next');
        if (prevBtn) prevBtn.addEventListener('click', showPrev);
        if (nextBtn) nextBtn.addEventListener('click', showNext);

        // Close modal if clicking outside the modal content (backdrop)
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        // Keyboard navigation when modal is open
        document.addEventListener('keydown', (e) => {
            if (!modal.classList.contains('open')) return;
            if (e.key === 'Escape') closeModal();
            else if (e.key === 'ArrowLeft') showPrev();
            else if (e.key === 'ArrowRight') showNext();
        });

        // Toggle the "Show More / Show Less" button
        if (showMoreBtn) {
            showMoreBtn.addEventListener('click', () => {
                expanded = !expanded;
                galleryItems.forEach((item, idx) => {
                    if (idx >= 6) {
                        item.classList.toggle('hidden', !expanded);
                    }
                });
                showMoreBtn.textContent = expanded ? 'Show Less' : 'Show More';
                showMoreBtn.setAttribute('aria-expanded', expanded.toString());
            });
        }
    })();
});


// ==================== TEACHERS ====================
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggleBtn');
    const teacherCards = document.querySelectorAll('.teacher-card');
    let expanded = false;

    function toggleTeachers() {
        expanded = !expanded;
        teacherCards.forEach((card, idx) => {
            if (idx >= 4) {
                card.classList.toggle('teacher-hidden', !expanded);
            }
        });

        toggleBtn.textContent = expanded ? 'Show Less' : 'Show More';
        toggleBtn.setAttribute('aria-expanded', expanded.toString());
    }

    toggleBtn.addEventListener('click', toggleTeachers);
});
