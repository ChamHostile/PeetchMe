/* eslint-disable */

export default function(el, binding) {
    if (binding.value || typeof binding.value === "undefined") {
      el.classList.add("state-loading");
      el.setAttribute("disabled", "disabled");
    } else {
      el.classList.remove("state-loading");
      el.removeAttribute("disabled");
    }
  }
  