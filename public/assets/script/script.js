document.addEventListener("DOMContentLoaded", function () {
  console.log(window.location.pathname);

  document.getElementById("cart").addEventListener("mouseenter", function() {
    document.getElementById("cart-recap").style.display = "block";
  })
  document.getElementById("cart").addEventListener("mouseleave", function() {
    document.getElementById("cart-recap").style.display = "none";
  })

  // document.getElementById("filter").addEventListener("mouseenter", function() {
  //   document.getElementById("filterc").style.display = "block";
  // })
  // document.getElementById("filter").addEventListener("mouseleave", function() {
  //   document.getElementById("filterc").style.display = "none";
  // })
  
  if(window.location.pathname == "/") {
    document.getElementById("about-btn").addEventListener("click", function () {
      window.location.href = "#about";
    });
    document.getElementById("products-btn").addEventListener("click", function () {
      window.location.href = "/products";
    });
    document.getElementById("contact-btn").addEventListener("click", function () {
      window.location.href = "/contact";
    });
  } else if(window.location.pathname == "/account/cart") {
    const quantity = document.getElementById("quantity");
    const btn = document.getElementById("btn-cart");

    quantity.addEventListener('change', function () {
        if(quantity.value == 0 && btn.innerHTML == '<div class="left"></div>Modifier<div class="right"></div>') {
          btn.innerHTML = '<div class="left"></div>Supprimer<div class="right"></div>';
        } else if(quantity.value > 0 && btn.innerHTML != '<div class="left"></div>Modifier<div class="right"></div>') {
          btn.innerHTML = '<div class="left"></div>Modifier<div class="right"></div>';
        }
    });
  }

  if(document.querySelector(".review")) {
    const popup = document.querySelectorAll(".response-btn");

    for (let i = 0; i < popup.length; i++) {
        popup[i].addEventListener("click", function() {
        document.getElementById("popup").style.display = "flex";
        document.getElementById("popup-title").innerHTML = "Répondre à l'avis de "+popup[i].getAttribute("name_util");
        document.getElementById("form-popup").setAttribute("action", "/product/sub_reviewadd/"+popup[i].getAttribute("id_util"));
        console.log("/product/sub_reviewadd/"+popup[i].getAttribute("id_util"));
      });
    }

    document.getElementById("response-close").addEventListener("click", function () {
      document.getElementById("popup").style.display = "none";
    });
  }
});

$(function () {
  $(".rateyo")
    .rateYo({
      ratedFill: "#FC7E1F",
      starWidth: "25px",
      starSvg:
        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
      fullStar: true,
    })
    .on("rateyo.change", function (e, data) {
      var rating = data.rating;
      $(this)
        .parent()
        .find(".score")
        .text("score :" + $(this).attr("data-rateyo-score"));
      $(this)
        .parent()
        .find(".result")
        .text("note :" + rating);
      $(this).parent().find("input[name=rating]").val(rating); //add rating value to input field
    });
  $(".rateyo2").rateYo({
    ratedFill: "#FC7E1F",
    readOnly: true,
    starWidth: "25px",
    starSvg:
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
  });
  $(".rateyo3").rateYo({
    ratedFill: "#FC7E1F",
    readOnly: true,
    starWidth: "17px",
    starSvg:
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>',
  });
});
