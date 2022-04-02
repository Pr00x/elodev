function alertDiv(html) {
  const alert = document.querySelector(".alert");
    document.querySelector(".alert h5").innerHTML = html;
  alert.style.right = "40px";
  setTimeout(() => {
    alert.style.right = "-400px";
  }, 3000);
}

const form = document.querySelectorAll("#submit-flag") ? document.querySelectorAll("#submit-flag") : document.querySelector("body");

for(let i = 0; i < form.length; i++) {
  form[i].addEventListener("submit", (e) => {
    e.preventDefault();
  const el = e.srcElement,
        xhr = new XMLHttpRequest(),
        data = new FormData(),
        points = el.querySelector("input[name='points']").value,
        name = el.querySelector("input[name='challenge_name']").value,
        flag = el.querySelector("input[name='flag']"),
        id = el.querySelector("input[name='id']").value,
        csrf = el.querySelector("input[name='_csrf']").value,
        errText = "<svg class='alert-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512'><path d='M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z'/></svg>";

    if(!flag.value)
      return alertDiv(`${errText}Please enter the flag.`);
    else if(!flag.value.includes("el0d3v{"))
      return alertDiv(`${errText}Invalid flag.`);

    data.append("points", points);
    data.append("challenge_name", name);
    data.append("flag", flag.value.trim());
    data.append("id", id);
    data.append("_csrf", csrf);
    xhr.open("POST", "/ajax/submit-flag/", true);
    xhr.onreadystatechange = function() {
      if(this.readyState === 4) {
        if(this.status === 200) {
          alertDiv(`<svg class='alert-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z'/></svg>
  ${this.responseText}`);
          flag.value = '';
          flag.disabled = true;
          flag.placeholder = "Solved";
          el.querySelector(".submit-div input").remove();
          return;
        }

        alertDiv(`${errText}${this.responseText}`);
      }
    }
    xhr.send(data);
  });
}
