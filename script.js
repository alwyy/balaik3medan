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
        const mapWrap = document.getElementById("wilayahMapWrap");
        if (!mapContainer || typeof L === "undefined") return;

        // Cegah inisialisasi ganda
        if (mapContainer._leaflet_id) return;

        // 1. Data 9 Provinsi Wilayah Kerja Balai K3 Medan
        const provinces = {
            sumut: {
                name: "Sumatera Utara",
                city: "Kota Medan & 33 Kab/Kota",
                desc: "Kantor Pusat Balai K3 Medan. Rujukan pengujian lingkungan kerja, laboratorium K3 terakreditasi, dan pembinaan keselamatan kerja se-Pulau Sumatera.",
                coords: [3.5952, 98.6722],
                zoom: 8,
                isPusat: true,
                badge: "Kantor Pusat Balai K3",
                risiko: "Kawasan Industri Medan (KIM), manufaktur, pergudangan, PKS kelapa sawit, perkebunan karet, dan pelabuhan internasional.",
                layananTags: ["#FaktorFisika", "#HigieneIndustri", "#Ergonomi", "#KesehatanKerja", "#BimtekSMK3"],
                sop: "3–5 Hari Kerja Sampling &bull; Akreditasi KAN LP-608-IDN"
            },
            aceh: {
                name: "Aceh",
                city: "Banda Aceh & Kawasan Industri",
                desc: "Wilayah pelayanan & pengujian keselamatan serta kesehatan kerja Provinsi Aceh sektor migas dan perkebunan.",
                coords: [5.5483, 95.3238],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Industri pengolahan migas, pupuk kimia, kelapa sawit, dan sektor jasa maritim.",
                layananTags: ["#UjiKimia", "#FaktorFisika", "#BimtekSMK3"],
                sop: "Jadwal Terjadwal / Permohonan Uji Lapangan"
            },
            riau: {
                name: "Riau",
                city: "Pekanbaru & Dumai",
                desc: "Wilayah pelayanan K3 sektor industri migas darat/lepas pantai, pulp & paper, serta perkebunan kelapa sawit terbesar.",
                coords: [0.5071, 101.4478],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Bahaya uap hidrokarbon, kebisingan turbin kilang, getaran mesin berat, dan debu kimia pulp.",
                layananTags: ["#UjiKimia", "#FaktorFisika", "#HigieneIndustri"],
                sop: "Pengujian Lapangan & Uji Emisi Berkala"
            },
            kepri: {
                name: "Kepulauan Riau",
                city: "Batam & Tanjungpinang",
                desc: "Wilayah pelayanan K3 sektor galangan kapal (shipyard), manufaktur presisi, elektronik, dan industri maritim lepas pantai.",
                coords: [1.0828, 104.0305],
                zoom: 8,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Uap pengelasan logam berat, radiasi industri NDT, kebisingan blasting & ergonomi mikro-elektronik.",
                layananTags: ["#HigieneIndustri", "#Ergonomi", "#KesehatanKerja"],
                sop: "Pengujian Terjadwal Sektor Galangan Kapal"
            },
            sumbar: {
                name: "Sumatera Barat",
                city: "Kota Padang & Bukittinggi",
                desc: "Wilayah pelayanan pengujian faktor lingkungan kerja sektor semen, manufaktur, pertambangan, dan pariwisata.",
                coords: [-0.9471, 100.4172],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Debu silika respirabel industri semen, kebisingan crusher, dan paparan kimia laboratorium.",
                layananTags: ["#HigieneIndustri", "#FaktorFisika", "#Audiometri"],
                sop: "SOP Uji Lingkungan & Evaluasi Berkala"
            },
            jambi: {
                name: "Jambi",
                city: "Kota Jambi & Muaro Jambi",
                desc: "Wilayah pelayanan pengujian K3 sektor perkebunan kelapa sawit, pertambangan batubara, dan industri pengolahan kayu.",
                coords: [-1.6101, 103.6131],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Tekanan panas boiler, getaran alat berat tambang, dan debu organik serbuk kayu.",
                layananTags: ["#FaktorFisika", "#IklimKerja", "#Ergonomi"],
                sop: "Pelayanan Pengujian Lapangan Terpadu"
            },
            bengkulu: {
                name: "Bengkulu",
                city: "Kota Bengkulu & Mukomuko",
                desc: "Wilayah pelayanan & pembinaan keselamatan serta kesehatan kerja sektor agrikultur, pertambangan batubara, dan pelabuhan.",
                coords: [-3.8004, 102.2655],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Pencahayaan dermaga, kebisingan konveyor tambang, dan debu batubara respirabel.",
                layananTags: ["#FaktorFisika", "#HigieneIndustri", "#Spirometri"],
                sop: "Koordinasi UPT & Dinas Tenaga Kerja"
            },
            sumsel: {
                name: "Sumatera Selatan",
                city: "Palembang & Muara Enim",
                desc: "Wilayah pengujian K3 kawasan industri pertambangan energi batubara, petrokimia pupuk, dan kelapa sawit.",
                coords: [-2.9761, 104.7754],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Gas beracun amonia/hidrogen sulfida, iklim kerja ekstrim, dan kebisingan kompresor tinggi.",
                layananTags: ["#UjiKimia", "#FaktorFisika", "#BimtekSMK3"],
                sop: "Uji Toksikologi & Kalibrasi Instrumen"
            },
            babel: {
                name: "Kepulauan Bangka Belitung",
                city: "Pangkalpinang & Belitung",
                desc: "Wilayah pelayanan pengujian K3 sektor pertambangan dan peleburan timah (smelter), pariwisata, dan perikanan kelautan.",
                coords: [-2.1328, 106.1139],
                zoom: 7,
                isPusat: false,
                badge: "Wilayah Pengujian K3",
                risiko: "Paparan panas tanur smelter, radiasi alami mineral ikutan timah, dan debu logam berat.",
                layananTags: ["#FaktorFisika", "#UjiKimia", "#KesehatanKerja"],
                sop: "Sampling Berkala Sektor Pertambangan"
            }
        };

        const defaultView = {
            center: [0.7893, 101.8],
            zoom: window.innerWidth <= 768 ? 5 : 6
        };

        // 2. Inisialisasi Peta Leaflet Resmi 9 Provinsi Wilayah Kerja
        const map = L.map("wilayah-map", {
            center: defaultView.center,
            zoom: defaultView.zoom,
            scrollWheelZoom: false, // Aman dari scroll-trap, aktif saat kursor di area peta
            zoomControl: true,
            attributionControl: false
        });

        // Tile layer OpenStreetMap Resmi
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; OpenStreetMap contributors',
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

        // Markers Dictionary untuk 9 Provinsi
        const markers = {};
        const provinceButtons = document.querySelectorAll(".wilayah-item[data-province]");

        // Di desktop: aktifkan scrollWheelZoom saat mouse di dalam peta, matikan saat keluar
        if (mapWrap) {
            mapWrap.addEventListener("mouseenter", () => {
                map.scrollWheelZoom.enable();
            });
            mapWrap.addEventListener("mouseleave", () => {
                map.scrollWheelZoom.disable();
            });
        }

        // Helper Pembuat Popup Card Bersih & Informatif
        const createPopupContent = (data) => {
            const tagsHtml = (data.layananTags || []).slice(0, 3).map(tag => `<span class="popup-tag">${tag}</span>`).join('');
            return `
                <div class="wilayah-popup-card ${data.isPusat ? 'is-pusat' : ''}">
                    <span class="popup-badge">${data.badge}</span>
                    <h4>${data.name}</h4>
                    <div class="popup-city">${data.city}</div>
                    <p>${data.desc}</p>
                    ${tagsHtml ? `<div class="popup-tags">${tagsHtml}</div>` : ''}
                </div>
            `;
        };

        // 3. Buat Markers untuk 9 Provinsi Resmi
        Object.keys(provinces).forEach(key => {
            const data = provinces[key];
            const icon = createMarkerIcon(data.isPusat, key === "sumut");
            const marker = L.marker(data.coords, { icon: icon })
                .bindPopup(createPopupContent(data), { offset: [0, -10], closeButton: true });

            marker.on("click", function () {
                setActiveProvince(key, false);
            });

            markers[key] = marker;
            marker.addTo(map);
        });

        // 4. Fungsi Aktivasi Provinsi
        function setActiveProvince(key, fly = true) {
            const data = provinces[key];
            if (!data) return;

            // Update status visual tombol list
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

            // Buka popup info bersih
            if (markers[key]) {
                markers[key].openPopup();
            }
        }

        // Event listener klik tombol list Provinsi
        provinceButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                const key = this.getAttribute("data-province");
                setActiveProvince(key, true);
            });
        });

        // Tombol Reset Tampilan Peta
        const btnReset = document.getElementById("btnResetMap");
        if (btnReset) {
            btnReset.addEventListener("click", function () {
                map.closePopup();
                provinceButtons.forEach(b => b.classList.remove("active"));
                const sumutBtn = document.querySelector('.wilayah-item[data-province="sumut"]');
                if (sumutBtn) sumutBtn.classList.add("active");

                Object.keys(markers).forEach(k => {
                    const p = provinces[k];
                    markers[k].setIcon(createMarkerIcon(p.isPusat, k === "sumut"));
                });

                map.flyTo(defaultView.center, defaultView.zoom, { duration: 1.2 });
            });
        }

        // Ukuran render peta & setup awal
        setTimeout(() => {
            map.invalidateSize();
            if (markers["sumut"]) {
                markers["sumut"].openPopup();
            }
        }, 400);

        setTimeout(() => map.invalidateSize(), 1000);
        window.addEventListener("resize", () => map.invalidateSize());
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

    /* ==========================================================================
       10. GSAP + SCROLLTRIGGER: WORD-BY-WORD TITLE REVEAL (ALL HEADINGS)
       ========================================================================== */
    const initGsapWordReveal = () => {
        if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        const headingSelectors = [
            ".hero h1",
            ".hero h2",
            ".hero-enter-2",
            "main h1",
            "main h2",
            "main h3",
            ".section-title",
            ".section-subtitle",
            ".activity-title",
            ".about-text h2",
            ".wilayah-title",
            ".wilayah-panel h2",
            ".contact-content h2",
            ".gallery-title",
            ".capaian-title",
            ".maklumat-title",
            ".standar-title",
            ".box-title",
            ".table-title"
        ];

        const headings = document.querySelectorAll(headingSelectors.join(", "));
        const processedHeadings = new Set();
        const prefersReducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

        headings.forEach(heading => {
            if (processedHeadings.has(heading) || heading.dataset.gsapSplit) return;
            processedHeadings.add(heading);
            heading.dataset.gsapSplit = "true";

            if (prefersReducedMotion) return;

            const walker = document.createTreeWalker(heading, NodeFilter.SHOW_TEXT, null, false);
            const textNodes = [];
            let n;
            while (n = walker.nextNode()) {
                if (n.nodeValue && n.nodeValue.trim().length > 0) {
                    textNodes.push(n);
                }
            }

            const wordSpans = [];

            textNodes.forEach(textNode => {
                const tokens = textNode.nodeValue.split(/(\s+)/);
                const fragment = document.createDocumentFragment();

                tokens.forEach(token => {
                    if (/^\s+$/.test(token)) {
                        fragment.appendChild(document.createTextNode(token));
                    } else if (token.length > 0) {
                        const span = document.createElement("span");
                        span.className = "gsap-word";
                        span.textContent = token;
                        span.style.display = "inline-block";
                        span.style.opacity = "0";
                        span.style.transform = "translateY(16px)";
                        span.style.willChange = "opacity, transform";
                        fragment.appendChild(span);
                        wordSpans.push(span);
                    }
                });

                if (textNode.parentNode) {
                    textNode.parentNode.replaceChild(fragment, textNode);
                }
            });

            if (wordSpans.length === 0) return;

            gsap.to(wordSpans, {
                opacity: 1,
                y: 0,
                duration: 0.55,
                stagger: 0.045,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: heading,
                    start: "top 88%",
                    toggleActions: "play none none none",
                    once: true
                }
            });
        });
    };

    initGsapWordReveal();

    /* ==========================================================================
       11. GSAP + SCROLLTRIGGER: OUTLINED BOXES, CARDS & FRAMED IMAGES REVEAL
       ========================================================================== */
    const initGsapBoxReveal = () => {
        if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
            return;
        }

        const prefersReducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        if (prefersReducedMotion) return;

        const processedElements = new Set();

        // 1. Staggered Grid Containers (Cards appear sequentially with elegant cascade)
        const gridSelectors = [
            ".services-grid",
            ".activity-grid",
            ".gallery-posts-grid",
            ".vm-grid",
            ".vm-items-grid",
            ".kpi-grid",
            ".sasaran-grid",
            ".mitra-grid",
            ".standar-grid",
            ".jadwal-grid",
            ".jenis-grid",
            ".contact-grid"
        ];

        gridSelectors.forEach(gridSel => {
            document.querySelectorAll(gridSel).forEach(grid => {
                if (processedElements.has(grid)) return;
                processedElements.add(grid);

                const cards = grid.querySelectorAll(".service-card, .activity-card, .gallery-ig-card, .vm-item, .vm-card, .kpi-card, .sasaran-box, .mitra-card, .contact-card, .jadwal-card, .jenis-card, .standar-card, .tugas-card");
                if (cards.length === 0) return;

                cards.forEach(card => processedElements.add(card));

                gsap.fromTo(cards,
                    {
                        opacity: 0,
                        y: 32,
                        scale: 0.97
                    },
                    {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        duration: 0.7,
                        stagger: 0.1,
                        ease: "power2.out",
                        clearProps: "transform",
                        scrollTrigger: {
                            trigger: grid,
                            start: "top 88%",
                            toggleActions: "play none none none",
                            once: true
                        }
                    }
                );
            });
        });

        // 2. Standalone Outlined Boxes, Panels, and Framed Images
        const standaloneSelectors = [
            ".service-card",
            ".activity-card",
            ".gallery-ig-card",
            ".vm-card-visi",
            ".about-image-wrap",
            ".about-image-card",
            ".wilayah-panel",
            ".wilayah-info-card",
            ".wilayah-map-wrap",
            ".ig-profile-banner",
            ".gallery-footer-cta",
            ".maklumat-frame",
            ".maklumat-card",
            ".gold-frame-wrap",
            ".chart-card",
            ".summary-box",
            ".table-box"
        ];

        document.querySelectorAll(standaloneSelectors.join(", ")).forEach(box => {
            if (processedElements.has(box)) return;
            processedElements.add(box);

            gsap.fromTo(box,
                {
                    opacity: 0,
                    y: 28,
                    scale: 0.98
                },
                {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: 0.75,
                    ease: "power2.out",
                    clearProps: "transform",
                    scrollTrigger: {
                        trigger: box,
                        start: "top 88%",
                        toggleActions: "play none none none",
                        once: true
                    }
                }
            );
        });
    };

    initGsapBoxReveal();

    /* ==========================================================================
       12. MOTION (FRAMER MOTION): SPRING HOVER & TACTILE CARD INTERACTIONS
       ========================================================================== */
    const initMotionCardInteractions = () => {
        if (typeof Motion === "undefined") return;

        const prefersReducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        if (prefersReducedMotion) return;

        const interactiveCardSelectors = [
            ".service-card",
            ".activity-card",
            ".gallery-ig-card",
            ".vm-item",
            ".kpi-card",
            ".sasaran-box",
            ".mitra-card",
            ".contact-card",
            ".jadwal-card",
            ".jenis-card",
            ".highlight-card"
        ];

        const cards = document.querySelectorAll(interactiveCardSelectors.join(", "));

        cards.forEach(card => {
            card.addEventListener("mouseenter", () => {
                Motion.animate(
                    card,
                    { y: -5, scale: 1.015 },
                    { duration: 0.25, easing: Motion.spring({ stiffness: 380, damping: 24 }) }
                );
            });

            card.addEventListener("mouseleave", () => {
                Motion.animate(
                    card,
                    { y: 0, scale: 1 },
                    { duration: 0.22, easing: "ease-out" }
                );
            });
        });
    };

    initMotionCardInteractions();

});
