document.addEventListener("DOMContentLoaded", function () {
    let copyBtns = document.querySelectorAll(".copy-btn");
    copyBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            let link = this.getAttribute("data-link");
            navigator.clipboard.writeText(link).then(() => {
                alert("Copied: " + link);
            });
        });
    });
});
