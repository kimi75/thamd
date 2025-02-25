export class PaymentService {
    constructor() {
        this.stripe = Stripe(window.stripeKey);
        this.elements = this.stripe.elements();
        this.card = this.elements.create('card');
        this.card.mount('#card-element');
        this.setupEventListeners();
    }

    setupEventListeners() {
        this.card.addEventListener('change', event => {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    }

    async createPaymentMethod() {
        const { paymentMethod, error } = await this.stripe.createPaymentMethod('card', this.card);

        if (error) {
            throw new Error(error.message);
        }

        return paymentMethod;
    }
}
