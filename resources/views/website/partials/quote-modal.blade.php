<div x-data="{
    isOpen: false,
    formData: { name: '', email: '', phone: '', message: '', honeypot: '' },
    mathChallenge: { a: 0, b: 0, operator: '+' },
    mathAnswer: '',
    formTimestamp: 0,
    isSubmitting: false,
    error: '',
    success: false,
    init() {
        this.$watch('isOpen', (value) => {
            if (value) {
                this.generateMathChallenge();
                this.formTimestamp = Math.floor(Date.now() / 1000);
            }
        });
        document.addEventListener('open-quote-modal', () => { this.isOpen = true; });
    },
    generateMathChallenge() {
        this.mathChallenge.a = Math.floor(Math.random() * 8) + 2;
        this.mathChallenge.b = Math.floor(Math.random() * 8) + 2;
        this.mathChallenge.operator = Math.random() > 0.5 ? '+' : '-';
        this.mathAnswer = '';
    },
    async handleSubmit() {
        this.error = '';
        this.success = false;
        
        if (this.formData.honeypot) {
            this.isOpen = false;
            return;
        }
        
        const expectedAnswer = this.mathChallenge.operator === '+' 
            ? this.mathChallenge.a + this.mathChallenge.b 
            : this.mathChallenge.a - this.mathChallenge.b;
        
        if (parseInt(this.mathAnswer) !== expectedAnswer) {
            this.error = 'Please solve the math challenge correctly.';
            this.generateMathChallenge();
            return;
        }
        
        this.isSubmitting = true;
        
        try {
            const response = await fetch('{{ url('/api/quote/submit') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({
                    name: this.formData.name,
                    email: this.formData.email,
                    phone: this.formData.phone,
                    message: this.formData.message,
                    math_answer: parseInt(this.mathAnswer),
                    math_challenge: `${this.mathChallenge.a} ${this.mathChallenge.operator} ${this.mathChallenge.b}`,
                    form_timestamp: this.formTimestamp,
                    honeypot: this.formData.honeypot,
                }),
            });
            
            if (!response.ok) {
                const errorData = await response.json().catch(() => ({}));
                this.error = errorData.message || errorData.error || `Server error (${response.status})`;
                return;
            }
            
            const data = await response.json();
            if (data.success) {
                this.success = true;
                setTimeout(() => {
                    this.isOpen = false;
                    this.formData = { name: '', email: '', phone: '', message: '', honeypot: '' };
                    this.mathAnswer = '';
                    this.generateMathChallenge();
                    this.formTimestamp = Math.floor(Date.now() / 1000);
                    this.success = false;
                }, 2000);
            } else {
                this.error = data.message || data.error || 'Failed to submit quote request.';
            }
        } catch (err) {
            this.error = 'Unable to connect to server. Please check your internet connection and try again.';
        } finally {
            this.isSubmitting = false;
        }
    }
}"
x-show="isOpen"
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in duration-200"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
@click.away="isOpen = false"
@keydown.escape.window="isOpen = false"
class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[99999] p-4 overflow-y-auto"
style="display: none;">
    <div @click.stop class="bg-gradient-to-br from-white to-gray-50 p-4 sm:p-6 md:p-8 rounded-xl sm:rounded-2xl shadow-2xl border border-gray-100 w-full max-w-md mx-auto my-auto relative z-[99999]">
        <div class="flex justify-between items-center mb-4 sm:mb-6">
            <h2 class="text-xl sm:text-2xl md:text-2xl font-extrabold text-center text-[#172455] flex-1">Get Your AV Quote</h2>
            <button @click="isOpen = false" class="ml-4 text-gray-400 hover:text-gray-600 transition-colors text-2xl leading-none" aria-label="Close">×</button>
        </div>
        <div x-show="error" x-transition class="mb-3 sm:mb-4 p-2 sm:p-3 bg-red-50 border border-red-200 rounded-lg text-red-700 text-xs sm:text-sm" x-text="error"></div>
        <div x-show="success" x-transition class="mb-3 sm:mb-4 p-2 sm:p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-xs sm:text-sm">
            Thank you! We'll get back to you within 24 hours.
        </div>
        <form @submit.prevent="handleSubmit()" class="space-y-3 sm:space-y-4">
            <div>
                <label for="quote-name" class="block text-sm sm:text-base font-semibold text-[#172455] mb-1 sm:mb-2">Name</label>
                <input type="text" id="quote-name" x-model="formData.name" required
                       class="block w-full px-3 sm:px-4 py-2 sm:py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm sm:text-base transition-all duration-300" />
            </div>
            <div>
                <label for="quote-email" class="block text-sm sm:text-base font-semibold text-[#172455] mb-1 sm:mb-2">Email</label>
                <input type="email" id="quote-email" x-model="formData.email" required
                       class="block w-full px-3 sm:px-4 py-2 sm:py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm sm:text-base transition-all duration-300" />
            </div>
            <div>
                <label for="quote-phone" class="block text-sm sm:text-base font-semibold text-[#172455] mb-1 sm:mb-2">Phone Number</label>
                <input type="tel" id="quote-phone" x-model="formData.phone" placeholder="+254 700 000 000" required
                       class="block w-full px-3 sm:px-4 py-2 sm:py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm sm:text-base transition-all duration-300" />
            </div>
            <div>
                <label for="quote-message" class="block text-sm sm:text-base font-semibold text-[#172455] mb-1 sm:mb-2">Message</label>
                <textarea id="quote-message" rows="4" x-model="formData.message" required
                          class="block w-full px-3 sm:px-4 py-2 sm:py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm sm:text-base transition-all duration-300 resize-none"></textarea>
            </div>
            <div>
                <label for="quote-math" class="block text-sm sm:text-base font-semibold text-[#172455] mb-1 sm:mb-2">
                    Math Challenge: <span x-text="mathChallenge.a"></span> <span x-text="mathChallenge.operator"></span> <span x-text="mathChallenge.b"></span> = ?
                </label>
                <input type="number" id="quote-math" x-model="mathAnswer" placeholder="Enter answer" required
                       class="block w-full px-3 sm:px-4 py-2 sm:py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm sm:text-base transition-all duration-300" />
            </div>
            <div style="display: none;">
                <label for="quote-honeypot">Do not fill this field</label>
                <input type="text" id="quote-honeypot" x-model="formData.honeypot" />
            </div>
            <div class="flex flex-col sm:flex-row justify-end gap-2 sm:gap-4 sm:space-x-0 mt-4 sm:mt-6">
                <button type="button" @click="isOpen = false"
                        class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-2.5 text-sm sm:text-base font-semibold text-gray-700 bg-gray-200 rounded-lg sm:rounded-xl hover:bg-gray-300 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                    Cancel
                </button>
                <button type="submit" :disabled="isSubmitting"
                        class="w-full sm:w-auto px-4 sm:px-6 py-2 sm:py-2.5 text-sm sm:text-base font-semibold text-white bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg sm:rounded-xl hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed">
                    <span x-text="isSubmitting ? 'Submitting...' : 'Submit Quote'"></span>
                </button>
            </div>
        </form>
    </div>
</div>
