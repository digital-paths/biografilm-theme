function getFirstDayValue() {
  const first = document.querySelector(".facetwp-facet-days .facetwp-radio");
  return first ? first.getAttribute("data-value") : null;
}

document.addEventListener("facetwp-loaded", function () {
  const facet = document.querySelector(".facetwp-facet-days");
  if (!facet) return;

  // Register reset hook once: restore days to its first value instead of clearing
  if (!FWP.loaded) {
    FWP.hooks.addAction("facetwp/reset", function () {
      const firstValue = getFirstDayValue();
      if (firstValue) {
        FWP.facets["days"] = [firstValue];
      }
    });
  }

  // Remove disabled state from day tabs (FacetWP disables tabs that would yield 0 results)
  facet.querySelectorAll(".facetwp-radio.disabled").forEach((radio) => {
    radio.classList.remove("disabled");
  });

  // Re-attach on every reload (FacetWP re-renders the facet HTML each time)
  // Use capture phase to intercept before FacetWP's own listener
  facet.querySelectorAll(".facetwp-radio").forEach((radio) => {
    radio.addEventListener(
      "click",
      function (e) {
        if (this.classList.contains("checked")) {
          e.stopImmediatePropagation();
        }
      },
      { capture: true },
    );
  });
});
