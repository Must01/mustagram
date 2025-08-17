import "./bootstrap";
// mobile menu toggle
document.addEventListener("DOMContentLoaded", function () {
    // ===== Mobile Hamburger Menu =====
    const mobileBtn = document.getElementById("mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const menuIcon = document.getElementById("menu-icon");
    const closeIcon = document.getElementById("close-icon");

    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener("click", () => {
            const isHidden = mobileMenu.classList.toggle("hidden");

            // Toggle icons with smooth transition
            if (isHidden) {
                menuIcon.classList.remove("hidden");
                closeIcon.classList.add("hidden");
            } else {
                menuIcon.classList.add("hidden");
                closeIcon.classList.remove("hidden");
            }
        });
    }

    // ===== Desktop Dropdown Menu =====
    const dropdownBtn = document.getElementById("desktop-dropdown-button");
    const dropdownMenu = document.getElementById("desktop-dropdown-menu");

    if (dropdownBtn && dropdownMenu) {
        dropdownBtn.addEventListener("click", (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle("hidden");

            // Rotate arrow with smooth transition
            const arrow = dropdownBtn.querySelector("svg");
            if (arrow) {
                arrow.style.transform = dropdownMenu.classList.contains(
                    "hidden"
                )
                    ? "rotate(0deg)"
                    : "rotate(180deg)";
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", (e) => {
            if (
                !dropdownBtn.contains(e.target) &&
                !dropdownMenu.contains(e.target)
            ) {
                dropdownMenu.classList.add("hidden");
                const arrow = dropdownBtn.querySelector("svg");
                if (arrow) {
                    arrow.style.transform = "rotate(0deg)";
                }
            }
        });
    }

    // ===== Close mobile menu when clicking outside =====
    document.addEventListener("click", (e) => {
        if (
            mobileBtn &&
            mobileMenu &&
            !mobileBtn.contains(e.target) &&
            !mobileMenu.contains(e.target)
        ) {
            mobileMenu.classList.add("hidden");
            if (menuIcon && closeIcon) {
                menuIcon.classList.remove("hidden");
                closeIcon.classList.add("hidden");
            }
        }
    });

    // ===== Close mobile menu when window is resized to desktop =====
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 768 && mobileMenu) {
            // md breakpoint
            mobileMenu.classList.add("hidden");
            if (menuIcon && closeIcon) {
                menuIcon.classList.remove("hidden");
                closeIcon.classList.add("hidden");
            }
        }
    });
});

// image upload logic
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('input[type="file"]').forEach((input) => {
        const previewArea = document.getElementById("preview-area");
        setImageUploader(input, previewArea);
        const OldImages = document.querySelector('input[name="oldImages"]');
        console.log(OldImages);
    });
});
// image upload function (single/multiple images)
function setImageUploader(input, previewArea) {
    const dt = new DataTransfer();

    input.addEventListener("change", function (e) {
        const files = e.target.files;
        const isMultiple = input.hasAttribute("multiple");

        // single image preview
        if (!isMultiple) {
            dt.clearData(); // clear previous file
            previewArea.innerHTML = ""; // clear old preview

            const file = files[0];
            if (!file || !file.type.startsWith("image/")) return;

            dt.items.add(file);

            const reader = new FileReader();
            reader.onload = function (e) {
                const container = document.createElement("div");
                container.className = "relative inline-block group";

                const img = document.createElement("img");
                img.src = e.target.result;
                img.className =
                    "w-32 h-32 aspect-square object-cover rounded-full shadow-lg border-4 border-white ring-2 ring-gray-200 transition-all duration-300 group-hover:ring-blue-300";

                const btn = document.createElement("button");
                btn.innerText = "X";
                btn.className =
                    "absolute cursor-pointer -top-2 -right-2 w-8 h-8 flex items-center justify-center text-white text-sm font-bold bg-red-500 hover:bg-red-600 active:bg-red-700 rounded-full shadow-lg transition-all duration-200 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-300";
                btn.addEventListener("click", function () {
                    container.remove();
                    dt.clearData();
                    input.files = dt.files;
                });

                container.appendChild(img);
                container.appendChild(btn);
                previewArea.appendChild(container);
            };

            reader.readAsDataURL(file);
            input.files = dt.files;
        } else {
            Array.from(files).forEach((file) => {
                if (!file.type.startsWith("image/")) return;

                // prevent adding duplicate file previews
                const existing = Array.from(dt.files).some(
                    (f) => f.name === file.name && f.size === file.size
                );
                if (existing) return;

                dt.items.add(file);

                const reader = new FileReader();
                reader.onload = function (e) {
                    const container = document.createElement("div");
                    container.className = "relative inline-block group m-1";

                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className =
                        "w-24 h-24 object-cover rounded-xl shadow-md border-2 border-gray-100 transition-all duration-300 group-hover:shadow-lg group-hover:scale-105";

                    const btn = document.createElement("button");
                    btn.innerText = "X";
                    btn.className =
                        "absolute cursor-pointer -top-2 -right-2 w-6 h-6 flex items-center justify-center text-white text-xs font-bold bg-red-500 hover:bg-red-600 active:bg-red-700 rounded-full shadow-md transition-all duration-200 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-red-300 opacity-0 group-hover:opacity-100";
                    btn.addEventListener("click", function () {
                        container.remove();

                        // Remove the file from DataTransfer
                        for (let i = 0; i < dt.items.length; i++) {
                            const item = dt.items[i].getAsFile();
                            if (
                                item.name === file.name &&
                                item.size === file.size
                            ) {
                                dt.items.remove(i);
                                break;
                            }
                        }

                        input.files = dt.files;
                    });

                    container.appendChild(img);
                    container.appendChild(btn);
                    previewArea.appendChild(container);
                };

                reader.readAsDataURL(file);
            });

            input.files = dt.files;
        }
    });
}

// image carousel
// loop over each carousel separately, because each one has its own images and buttons.
document.querySelectorAll("[id^='carousel-']").forEach((carousel) => {
    let currentIndex = 0; // use let cause we will update it.
    const images = carousel.querySelectorAll(".carousel-item");
    const prevBtn = carousel.querySelector(".prev-btn");
    const nextBtn = carousel.querySelector(".next-btn");

    // Hide buttons if it's only one image
    if (images.length <= 1) {
        prevBtn.style.display = "none";
        nextBtn.style.display = "none";
    }

    // hide all images except the first one
    images.forEach((img, i) => img.classList.toggle("hidden", i !== 0));

    // on button click we move to next image s
    nextBtn.addEventListener("click", () => {
        images[currentIndex].classList.add("hidden"); // hide current
        currentIndex = (currentIndex + 1) % images.length; // go to next, loop back if at end
        images[currentIndex].classList.remove("hidden"); // show next
    });

    prevBtn.addEventListener("click", () => {
        images[currentIndex].classList.add("hidden");
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        images[currentIndex].classList.remove("hidden");
    });

    // nav using arrow keys :
    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") nextBtn.click();
        if (e.key === "ArrowLeft") prevBtn.click();
    });
});
