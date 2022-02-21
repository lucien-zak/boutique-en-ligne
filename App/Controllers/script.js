
window.onload = () => {
    // Variables
    let stripe = Stripe('pk_test_51KTkiULE6khc7hP3a9xaMqkQJzBS1R3akv8qTDjtfmt38DHPxlb4lxMPnjQLgX28IqPzZglIKucpOTVDOTsEaqnO00lekGKQkF')
    let elements = stripe.elements()
    let redirect = "/payement"

    // Objets de la page
    let cardHolderName = document.getElementById("cardholder-name")
    let cardButton = document.getElementById("card-button")
    let clientSecret = cardButton.dataset.secret;

    // Crée les éléments du formulaire de carte bancaire
    let card = elements.create("card")
    card.mount("#card-elements")
}
