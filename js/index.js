document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.querySelector('.sidebar');
  const menuButton = document.querySelector('.menu-button');
  const closeButton = document.querySelector('.close-btn');

  menuButton.addEventListener('click', function () {
    sidebar.style.display = 'flex';
  });

  closeButton.addEventListener('click', function () {
    sidebar.style.display = 'none';
  });
});

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector('input[name="search"]');

    if (searchInput) {
        searchInput.addEventListener("input", function() {
            const value = this.value.trim();

            // If input is empty, auto-submit the form
            if (value === "") {
                this.form.submit();
            }
        });
    }
});