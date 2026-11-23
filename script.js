/**
 * Balai K3 Medan - Interactive Micro-interactions & Skeleton Shimmer
 * Adhering to Leonxlnx/taste-skill guidelines
 */

document.addEventListener("DOMContentLoaded", function () {

    /* ==========================================================================
       1. TOP SHIMMER PROGRESS BAR
       ========================================================================== */
    const topBar = document.getElementById("top-shimmer-bar");
    if (topBar) {
        topBar.classList.add("loading");
        window.addEventListener("load", () => {
            topBar.classList.remove("loading");
            topBar.classList.add("done");
            setTimeout(() => {
                topBar.style.display = "none";
            }, 500);
        });

        // Trigger brief progress shimmer on internal navigation clicks
        document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"]):not([href^="mailto:"]):not([href^="tel:"])').forEach(link => {
            link.addEventListener("click", function () {
                if (topBar) {
                    topBar.style.display = "block";
                    topBar.classList.remove("done");
                    topBar.classList.add("loading");
                }
            });
        });
    }

    /* ==========================================================================
       2. PROGRESSIVE IMAGE LOADING WITH SKELETON SHIMMER
       ========================================================================== */
    const imageWraps = document.querySelectorAll(".img-skeleton-wrap");
    imageWraps.forEach(wrap => {
        const img = wrap.querySelector("img");
        if (img) {
            if (img.complete && img.naturalHeight !== 0) {
                wrap.classList.remove("skeleton-active");
            } else {
                wrap.classList.add("skeleton-active");
                img.addEventListener("load", () => {
                    wrap.classList.remove("skeleton-active");
                });
                img.addEventListener("error", () => {
                    wrap.classList.remove("skeleton-active");
                });
            }
        }
    });

    // Auto-apply skeleton shimmer to standalone images in cards/gallery if not wrapped
    document.querySelectorAll(".gallery-media img, .top-card img, .service-item-card img").forEach(img => {
        const parent = img.parentElement;
        if (parent && !parent.classList.contains("img-skeleton-wrap")) {
            parent.classList.add("img-skeleton-wrap");
            if (img.complete && img.naturalHeight !== 0) {
                parent.classList.remove("skeleton-active");
            } else {
                parent.classList.add("skeleton-active");
                img.addEventListener("load", () => parent.classList.remove("skeleton-active"));
                img.addEventListener("error", () => parent.classList.remove("skeleton-active"));
            }
        }
    });

    /* ==========================================================================
       3. HERO SLIDER (Preserved & Enhanced with Hover Pause)
       ========================================================================== */
    const slides = document.querySelectorAll(".slide");
    const slider = document.getElementById("slider");

    if (slides.length > 0 && slider) {
        let index = 0;
        let interval;

        function showSlide(i) {
            slides.forEach(slide => slide.classList.remove("active"));
            if (slides[i]) {
                slides[i].classList.add("active");
            }
        }

        function nextSlide() {
            index = (index + 1) % slides.length;
            showSlide(index);
        }

        function startSlide() {
            interval = setInterval(nextSlide, 3800);
        }

        function stopSlide() {
            clearInterval(interval);
        }

        slider.addEventListener("mouseenter", stopSlide);
        slider.addEventListener("mouseleave", startSlide);
        startSlide();
    }

    /* ==========================================================================
       4. NAVBAR SCROLL GLASSMORPHISM
       ========================================================================== */
    const navbar = document.getElementById("navbar");
    if (navbar && !navbar.classList.contains("subpage-nav")) {
        const handleScroll = () => {
            navbar.classList.toggle("scrolled", window.scrollY > 40);
        };
        window.addEventListener("scroll", handleScroll, { passive: true });
        handleScroll();
    }

    /* ==========================================================================
       5. MOBILE HAMBURGER MENU
       ========================================================================== */
    const hamburger = document.getElementById("hamburger");
    const navMenu = document.getElementById("navMenu");

    if (hamburger && navMenu) {
        hamburger.addEventListener("click", () => {
            const isOpen = navMenu.classList.toggle("show");
            hamburger.classList.toggle("active", isOpen);
            hamburger.setAttribute("aria-expanded", isOpen ? "true" : "false");
        });

        // Close menu on link click (mobile)
        navMenu.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", () => {
                if (window.innerWidth <= 768 && !link.classList.contains("drop-btn")) {
                    navMenu.classList.remove("show");
                    hamburger.classList.remove("active");
                    hamburger.setAttribute("aria-expanded", "false");
                }
            });
        });
    }

    /* ==========================================================================
       6. DROPDOWN ACCORDION / TOGGLE
       ========================================================================== */
    document.querySelectorAll(".dropdown").forEach(dropdown => {
        const btn = dropdown.querySelector(".drop-btn");
        if (btn) {
            btn.addEventListener("click", function (e) {
                // On mobile or touch devices, prevent default and toggle dropdown
                if (window.innerWidth <= 768 || ('ontouchstart' in window)) {
                    e.preventDefault();
                    e.stopPropagation();

                    document.querySelectorAll(".dropdown").forEach(d => {
                        if (d !== dropdown) d.classList.remove("active");
                    });

                    dropdown.classList.toggle("active");
                }
            });
        }
    });

    document.addEventListener("click", function (e) {
        if (!e.target.closest(".dropdown")) {
            document.querySelectorAll(".dropdown").forEach(dropdown => {
                dropdown.classList.remove("active");
            });
        }
    });

    /* ==========================================================================
       7. BUTTON ACTIVE PRESS MICRO-INTERACTION
       ========================================================================== */
    document.querySelectorAll(".btn, button, .service-card-link").forEach(btn => {
        btn.addEventListener("mousedown", function () {
            this.style.transform = "translateY(0) scale(0.98)";
        });
        btn.addEventListener("mouseup", function () {
            this.style.transform = "";
        });
        btn.addEventListener("mouseleave", function () {
            this.style.transform = "";
        });
    });

    /* ==========================================================================
       8. FLOATING WHATSAPP & SCROLL TOP
       ========================================================================== */
    const wa = document.getElementById("wa-float");
    const scrollTopBtn = document.getElementById("scrollTop");

    const onScrollWindow = () => {
        const scrollY = window.scrollY;
        if (wa) {
            wa.classList.toggle("scrolled", scrollY > 120);
        }
        if (scrollTopBtn) {
            scrollTopBtn.style.display = scrollY > 260 ? "flex" : "none";
        }
    };

    window.addEventListener("scroll", onScrollWindow, { passive: true });
    onScrollWindow();

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    /* ==========================================================================
       9. PETA INTERAKTIF WILAYAH KERJA BALAI K3 (LEAFLET.JS)
       ========================================================================== */
    const initWilayahMap = () => {
        const mapContainer = document.getElementById("wilayah-map");
        if (!mapContainer || typeof L === "undefined") return;

        // Cegah inisialisasi ganda
        if (mapContainer._leaflet_id) return;

        // Data 9 Provinsi Wilayah Kerja Balai K3 Medan
        const provinces = {
            sumut: {
                name: "Sumatera Utara",
                city: "Kota Medan",
                desc: "Kantor Pusat Balai K3 Medan. Pusat pengujian lingkungan kerja dan rujukan K3 wilayah Sumatera.",
                coords: [3.5952, 98.6722],
                zoom: 9,
                isPusat: true,
                badge: "Kantor Pusat Balai K3"
            },
            aceh: {
                name: "Aceh",
                city: "Banda Aceh",
                desc: "Wilayah pelayanan & pengujian keselamatan dan kesehatan kerja Provinsi Aceh.",
                coords: [5.5483, 95.3238],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            riau: {
                name: "Riau",
                city: "Pekanbaru",
                desc: "Wilayah pelayanan K3 sektor industri migas, perkebunan, dan ketenagakerjaan Provinsi Riau.",
                coords: [0.5071, 101.4478],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            kepri: {
                name: "Kepulauan Riau",
                city: "Tanjungpinang & Batam",
                desc: "Wilayah pelayanan K3 sektor galangan kapal, manufaktur dan industri maritim Kepulauan Riau.",
                coords: [1.0828, 104.0305],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            sumbar: {
                name: "Sumatera Barat",
                city: "Kota Padang",
                desc: "Wilayah pelayanan pengujian faktor lingkungan kerja dan keselamatan kerja Provinsi Sumatera Barat.",
                coords: [-0.9471, 100.4172],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            jambi: {
                name: "Jambi",
                city: "Kota Jambi",
                desc: "Wilayah pelayanan pengujian K3 sektor perkebunan kelapa sawit, pertambangan dan industri Jambi.",
                coords: [-1.6101, 103.6131],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            bengkulu: {
                name: "Bengkulu",
                city: "Kota Bengkulu",
                desc: "Wilayah pelayanan & pembinaan keselamatan serta kesehatan kerja Provinsi Bengkulu.",
                coords: [-3.8004, 102.2655],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            sumsel: {
                name: "Sumatera Selatan",
                city: "Kota Palembang",
                desc: "Wilayah pengujian K3 kawasan industri pertambangan batubara, energi dan petrokimia Sumsel.",
                coords: [-2.9761, 104.7754],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            },
            babel: {
                name: "Kepulauan Bangka Belitung",
                city: "Pangkalpinang",
                desc: "Wilayah pelayanan pengujian K3 sektor pertambangan timah, industri dan pengolahan Kep. Babel.",
                coords: [-2.1328, 106.1139],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3"
            }
        };

        const defaultView = {
            center: [0.7893, 101.8],
            zoom: window.innerWidth <= 768 ? 5 : 6
        };

        // Inisialisasi Peta Leaflet
        const map = L.map("wilayah-map", {
            center: defaultView.center,
            zoom: defaultView.zoom,
            scrollWheelZoom: false,
            zoomControl: true,
            attributionControl: false
        });

        // Tile layer OpenStreetMap Resmi (100% Gratis, Tanpa Watermark & Tanpa API Key)
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Marker Icons Generator
        const createMarkerIcon = (isPusat = false, isActive = false) => {
            return L.divIcon({
                className: "custom-map-marker-wrap",
                html: `
                    <div class="custom-map-marker ${isPusat ? 'marker-pusat' : ''} ${isActive ? 'is-active' : ''}">
                        <div class="marker-pulse"></div>
                        <div class="marker-pin">
                            ${isPusat 
                                ? '<svg viewBox="0 0 24 24" fill="currentColor" width="13" height="13"><path d="M12 2L1 21h22L12 2zm0 3.8l7.5 13.2H4.5L12 5.8z"/></svg>' 
                                : '<svg viewBox="0 0 24 24" fill="currentColor" width="10" height="10"><circle cx="12" cy="12" r="5"/></svg>'
                            }
                        </div>
                    </div>
                `,
                iconSize: [34, 34],
                iconAnchor: [17, 17],
                popupAnchor: [0, -18]
            });
        };

        // Markers dictionary
        const markers = {};
        const provinceButtons = document.querySelectorAll(".wilayah-item");

        Object.keys(provinces).forEach(key => {
            const data = provinces[key];
            const icon = createMarkerIcon(data.isPusat, key === "sumut");

            const popupContent = `
                <div class="wilayah-popup-card ${data.isPusat ? 'is-pusat' : ''}">
                    <span class="popup-badge">${data.badge}</span>
                    <h4>${data.name}</h4>
                    <p>${data.desc}</p>
                </div>
            `;

            const marker = L.marker(data.coords, { icon: icon })
                .addTo(map)
                .bindPopup(popupContent, { offset: [0, -10] });

            markers[key] = marker;

            // Klik marker langsung di peta -> sinkronkan tombol list aktif
            marker.on("click", function () {
                setActiveProvince(key, false);
            });
        });

        // Fungsi Aktivasi Provinsi
        function setActiveProvince(key, fly = true) {
            const data = provinces[key];
            if (!data) return;

            // Update status tombol list
            provinceButtons.forEach(btn => {
                const isMatch = btn.getAttribute("data-province") === key;
                btn.classList.toggle("active", isMatch);
                if (isMatch) {
                    btn.scrollIntoView({ behavior: "smooth", block: "nearest" });
                }
            });

            // Update status visual marker pin
            Object.keys(markers).forEach(k => {
                const m = markers[k];
                const p = provinces[k];
                m.setIcon(createMarkerIcon(p.isPusat, k === key));
            });

            // Fly ke koordinat provinsi
            if (fly) {
                map.flyTo(data.coords, data.zoom, {
                    duration: 1.2,
                    easeLinearity: 0.25
                });
            }

            // Buka popup info
            if (markers[key]) {
                markers[key].openPopup();
            }
        }

        // Event listener klik tombol di list provinsi
        provinceButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                const key = this.getAttribute("data-province");
                setActiveProvince(key, true);
            });
        });

        // Tombol Reset Tampilan
        const btnReset = document.getElementById("btnResetMap");
        if (btnReset) {
            btnReset.addEventListener("click", function () {
                map.closePopup();
                provinceButtons.forEach(btn => btn.classList.remove("active"));
                const sumutBtn = document.querySelector('.wilayah-item[data-province="sumut"]');
                if (sumutBtn) sumutBtn.classList.add("active");

                Object.keys(markers).forEach(k => {
                    const p = provinces[k];
                    markers[k].setIcon(createMarkerIcon(p.isPusat, k === "sumut"));
                });

                map.flyTo(defaultView.center, defaultView.zoom, {
                    duration: 1.2
                });
            });
        }

        // Memastikan ukuran render peta pas & buka popup awal
        setTimeout(() => {
            map.invalidateSize();
            if (markers["sumut"]) {
                markers["sumut"].openPopup();
            }
        }, 400);

        setTimeout(() => {
            map.invalidateSize();
        }, 1000);

        window.addEventListener("resize", () => {
            map.invalidateSize();
        });
    };

    // Jalankan inisialisasi peta secara reliabel
    if (typeof L !== "undefined") {
        initWilayahMap();
    } else {
        let attempts = 0;
        const checkLeaflet = setInterval(() => {
            attempts++;
            if (typeof L !== "undefined") {
                clearInterval(checkLeaflet);
                initWilayahMap();
            } else if (attempts >= 40) {
                clearInterval(checkLeaflet);
            }
        }, 100);
        window.addEventListener("load", initWilayahMap);
    }

    /* ==========================================================================
       10. INSTAGRAM ACTIVITY CAROUSEL (@BALAIK3MEDAN)
       ========================================================================== */
    const initActivityCarousel = () => {
        const carousel = document.getElementById("activityCarouselWrapper");
        if (!carousel) return;

        const track = document.getElementById("activityTrack");
        const prevBtn = document.getElementById("activityPrevBtn");
        const nextBtn = document.getElementById("activityNextBtn");
        const dotsContainer = document.getElementById("activityDots");
        const cards = track ? track.querySelectorAll(".activity-card") : [];

        if (!track || cards.length === 0) return;

        let currentIndex = 0;
        let autoplayTimer = null;
        const totalCards = cards.length;

        // Hitung jumlah kartu yang tampil di viewport
        const getVisibleCount = () => {
            const w = window.innerWidth;
            if (w <= 640) return 1;
            if (w <= 992) return 2;
            return 3;
        };

        const getMaxIndex = () => {
            const visible = getVisibleCount();
            return Math.max(0, totalCards - visible);
        };

        // Render Dots Pagination
        const renderDots = () => {
            if (!dotsContainer) return;
            dotsContainer.innerHTML = "";
            const maxIdx = getMaxIndex();
            const count = maxIdx + 1;

            for (let i = 0; i < count; i++) {
                const dot = document.createElement("button");
                dot.type = "button";
                dot.className = `activity-dot ${i === currentIndex ? "active" : ""}`;
                dot.setAttribute("aria-label", `Slide ke-${i + 1}`);
                dot.addEventListener("click", () => {
                    goToSlide(i);
                    resetAutoplay();
                });
                dotsContainer.appendChild(dot);
            }
        };

        // Update Posisi Carousel Track
        const updateCarousel = () => {
            const maxIdx = getMaxIndex();
            if (currentIndex > maxIdx) currentIndex = maxIdx;
            if (currentIndex < 0) currentIndex = 0;

            const cardWidth = cards[0].getBoundingClientRect().width;
            const gap = 24; // gap between cards
            const offset = currentIndex * (cardWidth + gap);

            track.style.transform = `translateX(-${offset}px)`;

            // Update Dots
            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll(".activity-dot");
                dots.forEach((dot, idx) => {
                    dot.classList.toggle("active", idx === currentIndex);
                });
            }
        };

        const goToSlide = (index) => {
            const maxIdx = getMaxIndex();
            if (index > maxIdx) {
                currentIndex = 0; // wrap to start
            } else if (index < 0) {
                currentIndex = maxIdx; // wrap to end
            } else {
                currentIndex = index;
            }
            updateCarousel();
        };

        const nextSlide = () => {
            const maxIdx = getMaxIndex();
            if (currentIndex >= maxIdx) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            updateCarousel();
        };

        const prevSlide = () => {
            const maxIdx = getMaxIndex();
            if (currentIndex <= 0) {
                currentIndex = maxIdx;
            } else {
                currentIndex--;
            }
            updateCarousel();
        };

        // Event Listeners pada Tombol Kiri dan Kanan
        if (prevBtn) {
            prevBtn.addEventListener("click", (e) => {
                e.preventDefault();
                prevSlide();
                resetAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener("click", (e) => {
                e.preventDefault();
                nextSlide();
                resetAutoplay();
            });
        }

        // Autoplay Interval (berputar sendiri setiap 3.5 detik)
        const startAutoplay = () => {
            if (autoplayTimer) clearInterval(autoplayTimer);
            autoplayTimer = setInterval(nextSlide, 3500);
        };

        const stopAutoplay = () => {
            if (autoplayTimer) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
        };

        const resetAutoplay = () => {
            stopAutoplay();
            startAutoplay();
        };

        // Pause autoplay saat mouse masuk atau sedang berinteraksi
        carousel.addEventListener("mouseenter", stopAutoplay);
        carousel.addEventListener("mouseleave", startAutoplay);
        carousel.addEventListener("focusin", stopAutoplay);
        carousel.addEventListener("focusout", startAutoplay);

        // Touch & Swipe gestures untuk layar sentuh / mobile
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener("touchstart", (e) => {
            stopAutoplay();
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        carousel.addEventListener("touchend", (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startAutoplay();
        }, { passive: true });

        const handleSwipe = () => {
            const threshold = 40;
            if (touchStartX - touchEndX > threshold) {
                nextSlide(); // swipe kiri -> next
            } else if (touchEndX - touchStartX > threshold) {
                prevSlide(); // swipe kanan -> prev
            }
        };

        // Handle Resize Responsif
        let resizeTimer = null;
        window.addEventListener("resize", () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                renderDots();
                updateCarousel();
            }, 100);
        });

        // Inisialisasi awal
        renderDots();
        updateCarousel();
        startAutoplay();
    };

    initActivityCarousel();

    /* ==========================================================================
       11. INTERACTIVE VISI MISI TABS FILTER
       ========================================================================== */
    const initVisiMisiTabs = () => {
        const tabs = document.querySelectorAll(".vm-tab-btn");
        const items = document.querySelectorAll(".vm-item");
        if (tabs.length === 0 || items.length === 0) return;

        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                const filter = tab.getAttribute("data-filter");

                // Update active tab button
                tabs.forEach(t => {
                    t.classList.remove("active");
                    t.setAttribute("aria-selected", "false");
                });
                tab.classList.add("active");
                tab.setAttribute("aria-selected", "true");

                // Filter items with micro-animation
                items.forEach(item => {
                    const category = item.getAttribute("data-category");
                    if (filter === "all" || category === filter) {
                        item.classList.remove("vm-hidden");
                        item.style.opacity = "0";
                        item.style.transform = "translateY(12px)";
                        requestAnimationFrame(() => {
                            item.style.transition = "opacity 0.35s ease, transform 0.35s ease";
                            item.style.opacity = "1";
                            item.style.transform = "translateY(0)";
                        });
                    } else {
                        item.classList.add("vm-hidden");
                    }
                });
            });
        });
    };

    initVisiMisiTabs();

});
