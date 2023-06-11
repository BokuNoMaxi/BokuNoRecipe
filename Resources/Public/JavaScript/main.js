if (document.getElementById("recipe-reset")) {
  document
    .getElementById("recipe-reset")
    .addEventListener("click", function (e) {
      let form = document.getElementById("bkr-searchbar");
      let checkboxes = document.querySelectorAll(
        '#bkr-searchbar input[type="checkbox"]'
      );

      form.reset();
      checkboxes.forEach(function (checkbox) {
        checkbox.checked = false;
      });
      form.submit();
    });
}
