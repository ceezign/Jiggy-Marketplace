document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle
  const hamburger = document.querySelector(".mp-hamburger");
  const mobileMenu = document.querySelector(".mp-mobile-menu");

  hamburger.addEventListener("click", () => {
    mobileMenu.hidden = !mobileMenu.hidden;
  });

  // Account dropdown toggle
  const accountBtn = document.querySelector(".mp-account-btn");
  const accountMenu = document.querySelector(".mp-account-menu");

  if (accountBtn) {
    accountBtn.addEventListener("click", () => {
      accountMenu.hidden = !accountMenu.hidden;
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", (e) => {
      if (!accountBtn.contains(e.target) && !accountMenu.contains(e.target)) {
        accountMenu.hidden = true;
      }
    });
  }
});