import "./bootstrap";
// mobile menu toggle
const btn = document.getElementById("mobile-menu-button");
const menu = document.getElementById("mobile-menu");

btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

// Dropdown toggle
const dropdownBtn = document.getElementById("dropdown-button");
const dropdownMenu = document.getElementById("dropdown-menu");

dropdownBtn.addEventListener("click", () => {
    dropdownMenu.classList.toggle("hidden");
});

// Close dropdown if clicked outside
document.addEventListener("click", (e) => {
    if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.add("hidden");
    }
});

// image upload logic
document.querySelectorAll('input[type="file"]').forEach((input) => {
    const previewArea = document.getElementById("preview-area");

    setImageUploader(input, previewArea);
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
const images = document.querySelectorAll(".carousel-item");
let currentIndex = 0;
const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

// if there is only one image hide the buttons:
if (images.length <= 1) {
    prevBtn.style.display = "none";
    nextBtn.style.display = "none";
}

images.forEach((image, i) => {
    image.classList.toggle("hidden", currentIndex !== i);
});

nextBtn.addEventListener("click", () => {
    images[currentIndex].classList.toggle("hidden", true);
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.toggle("hidden", false);
});
prevBtn.addEventListener("click", () => {
    images[currentIndex].classList.toggle("hidden");
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    images[currentIndex].classList.toggle("hidden");
});

// let the user use the keyboard navigations:
document.addEventListener("keydown", (e) => {
    if (e.key === "ArrowRight") nextBtn.click();
    if (e.key === "ArrowLeft") prevBtn.click();
});
