<!-- Quote Form Modal -->
<div id="quote-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden justify-center items-center z-[9999] p-4" onclick="if(event.target === this) closeQuoteModal()">
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-2xl border border-gray-100 w-full max-w-lg relative">
        <!-- Close Button -->
        <button
            onclick="closeQuoteModal()" class="absolute top-3 right-3 p-1.5 rounded-full hover:bg-gray-100 transition-colors z-10"
            aria-label="Close modal"
        >
            <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <div class="absolute -top-12 -right-12 h-24 w-24 bg-yellow-200/50 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -left-12 h-24 w-24 bg-blue-200/40 rounded-full blur-2xl"></div>
        <div class="relative">
            <h2 class="text-2xl font-extrabold mb-1 text-center text-[#172455]">Get Your AV Quote</h2>
            <p class="text-center text-gray-600 mb-5 text-sm">Tell us about your event and we'll respond quickly.</p>
            <form id="quote-form" onsubmit="handleQuoteSubmit(event)" class="space-y-4">
                <div id="quote-error" class="hidden rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs text-red-700"></div>
                
                <div>
                    <label for="quote-name" class="block text-sm font-semibold text-[#172455] mb-1.5">Name</label>
                    <input
                        type="text"
                        id="quote-name"
                        name="name"
                        required
                        class="block w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm transition-all duration-300"
                        placeholder="Your full name"
                    />
                </div>
                
                <div>
                    <label for="quote-email" class="block text-sm font-semibold text-[#172455] mb-1.5">Email</label>
                    <input
                        type="email"
                        id="quote-email"
                        name="email"
                        required
                        class="block w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm transition-all duration-300"
                        placeholder="you@email.com"
                    />
                </div>
                
                <div>
                    <label for="quote-phone" class="block text-sm font-semibold text-[#172455] mb-1.5">Phone Number</label>
                    <input
                        type="tel"
                        id="quote-phone"
                        name="phone"
                        required
                        class="block w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm transition-all duration-300"
                        placeholder="+254 700 000 000"
                    />
                </div>
                
                <div>
                    <label for="quote-message" class="block text-sm font-semibold text-[#172455] mb-1.5">Message</label>
                    <textarea
                        id="quote-message"
                        name="message"
                        rows="3"
                        required
                        class="block w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm transition-all duration-300 resize-none"
                        placeholder="Tell us about your event..."
                    ></textarea>
                </div>
                
                <div>
                    <label for="quote-math" class="block text-sm font-semibold text-[#172455] mb-1.5">
                        Security: <span id="math-challenge">2 + 3</span> = ?
                    </label>
                    <input
                        type="number"
                        id="quote-math"
                        name="mathAnswer"
                        required
                        class="block w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm transition-all duration-300"
                        placeholder="Answer"
                    />
                </div>
                
                <!-- Honeypot field -->
                <div style="display: none;">
                    <label for="quote-honeypot">Do not fill this field</label>
                    <input type="text" id="quote-honeypot" name="honeypot" />
                </div>
                
                <div class="flex flex-col sm:flex-row justify-end gap-2.5 mt-4">
                    <button
                        type="button"
                        onclick="closeQuoteModal()"
                        class="px-5 py-2.5 text-sm font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-all duration-300"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition-all duration-300 shadow-md"
                    >
                        Submit Quote
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let mathChallenge = { a: 2, b: 3 };

function generateMathChallenge() {
    mathChallenge.a = Math.floor(Math.random() * 8) + 2;
    mathChallenge.b = Math.floor(Math.random() * 8) + 2;
    document.getElementById('math-challenge').textContent = `${mathChallenge.a} + ${mathChallenge.b}`;
}

function openQuoteModal() {
    generateMathChallenge();
    document.getElementById('quote-modal').classList.remove('hidden');
    document.getElementById('quote-modal').classList.add('flex');
    document.body.style.overflow = 'hidden';
    document.getElementById('quote-form').reset();
    document.getElementById('quote-error').classList.add('hidden');
}

function closeQuoteModal() {
    document.getElementById('quote-modal').classList.add('hidden');
    document.getElementById('quote-modal').classList.remove('flex');
    document.body.style.overflow = 'unset';
}

function handleQuoteSubmit(e) {
    e.preventDefault();
    const errorDiv = document.getElementById('quote-error');
    errorDiv.classList.add('hidden');
    
    const formData = new FormData(e.target);
    const expectedAnswer = mathChallenge.a + mathChallenge.b;
    const userAnswer = parseInt(formData.get('mathAnswer'));
    
    if (userAnswer !== expectedAnswer) {
        errorDiv.textContent = 'Please solve the math challenge correctly.';
        errorDiv.classList.remove('hidden');
        return;
    }
    
    if (formData.get('honeypot')) {
        closeQuoteModal();
        return;
    }
    
    // Here you would submit to your backend
    console.log('Quote form submitted:', Object.fromEntries(formData));
    alert('Thank you! We will contact you soon.');
    closeQuoteModal();
}

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeQuoteModal();
    }
});
</script>
