<?php
    $data = $data ?? null;
    $section = null;
    $details = null;

    if (is_array($data)) {
        $section = $data['section'] ?? null;
        $details = $data['details'] ?? null;
    } elseif (is_object($data)) {
        $section = $data->section ?? null;
        $details = $data->details ?? null;
    }

    $address = is_array($details) ? ($details['address'] ?? 'Jacaranda Close, Ridgeways, Nairobi, Kenya') : ($details->address ?? 'Jacaranda Close, Ridgeways, Nairobi, Kenya');
    $phonePrimary = is_array($details) ? ($details['phone_primary'] ?? '+254 729 171 351') : ($details->phone_primary ?? '+254 729 171 351');
    $email = is_array($details) ? ($details['email'] ?? 'info@stagepass.co.ke') : ($details->email ?? 'info@stagepass.co.ke');
    $businessHours = is_array($details) ? ($details['business_hours'] ?? 'Mon - Fri: 9:00 AM - 6:00 PM<br />Sat: 10:00 AM - 4:00 PM') : ($details->business_hours ?? 'Mon - Fri: 9:00 AM - 6:00 PM<br />Sat: 10:00 AM - 4:00 PM');
?>
<section x-data="{
    isVisible: false,
    leftVisible: false,
    rightVisible: false,
    formData: { name: '', email: '', phone: '', message: '', honeypot: '' },
    mathChallenge: { a: 0, b: 0, operator: '+' },
    mathAnswer: '',
    formTimestamp: 0,
    isSubmitting: false,
    error: '',
    init() {
        this.generateMathChallenge();
        this.formTimestamp = Math.floor(Date.now() / 1000);
    },
    generateMathChallenge() {
        this.mathChallenge.a = Math.floor(Math.random() * 8) + 2;
        this.mathChallenge.b = Math.floor(Math.random() * 8) + 2;
        this.mathChallenge.operator = Math.random() > 0.5 ? '+' : '-';
        this.mathAnswer = '';
    },
    async handleSubmit() {
        this.error = '';
        if (this.formData.honeypot) return;
        
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
            const response = await fetch('<?php echo e(url('/api/contact/submit')); ?>', {
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
                alert('Message Sent! We\'ll get back to you within 24 hours.');
                this.formData = { name: '', email: '', phone: '', message: '', honeypot: '' };
                this.mathAnswer = '';
                this.generateMathChallenge();
                this.formTimestamp = Math.floor(Date.now() / 1000);
            } else {
                this.error = data.message || data.error || 'Failed to submit message.';
            }
        } catch (err) {
            this.error = 'Unable to connect to server. Please check your internet connection and try again.';
        } finally {
            this.isSubmitting = false;
        }
    }
}"
id="contact" 
class="py-32 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-20 left-0 w-[700px] h-[700px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-0 w-[700px] h-[700px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slower"></div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid lg:grid-cols-2 gap-20">
            <!-- Left - Contact Info -->
            <div class="space-y-10"
                 x-intersect.threshold.0.1="leftVisible = true"
                 :class="leftVisible ? 'animate-fade-in-left' : ''"
                 style="opacity: 1;">
                <div>
                    <span class="inline-block text-sm font-bold text-yellow-600 tracking-wider uppercase bg-gradient-to-r from-yellow-100 via-yellow-50 to-yellow-100 px-4 py-2 rounded-full shadow-lg shadow-yellow-200/50 border border-yellow-200/50">Get In Touch</span>
                    <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8 leading-tight drop-shadow-sm">Let's Create Something Amazing Together</h2>
                    <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-600 rounded-full mb-8 shadow-lg shadow-yellow-500/30"></div>
                    <p class="text-xl text-gray-700 font-medium drop-shadow-sm">Ready to elevate your next event? <span class="text-[#172455] font-bold">Contact us today</span> for a quote or consultation.</p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start space-x-5 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all duration-300 shadow-lg shadow-yellow-500/30 ring-2 ring-white/50 group-hover:shadow-xl group-hover:shadow-yellow-500/40">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-black text-[#172455] mb-2 text-lg">Location</h3>
                            <p class="text-gray-700 font-medium"><?php echo e($address); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#172455] via-[#1e3a8a] to-[#172455] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all duration-300 shadow-lg shadow-[#172455]/30 ring-2 ring-white/50 group-hover:shadow-xl group-hover:shadow-[#172455]/40">
                            <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-black text-[#172455] mb-2 text-lg">Phone</h3>
                            <p class="text-gray-700 font-medium"><?php echo e($phonePrimary); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 via-yellow-500 to-yellow-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all duration-300 shadow-lg shadow-yellow-500/30 ring-2 ring-white/50 group-hover:shadow-xl group-hover:shadow-yellow-500/40">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-black text-[#172455] mb-2 text-lg">Email</h3>
                            <p class="text-gray-700 font-medium"><?php echo e($email); ?></p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#172455] via-[#1e3a8a] to-[#172455] rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-all duration-300 shadow-lg shadow-[#172455]/30 ring-2 ring-white/50 group-hover:shadow-xl group-hover:shadow-[#172455]/40">
                            <svg class="w-7 h-7 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-black text-[#172455] mb-2 text-lg">Business Hours</h3>
                            <p class="text-gray-700 font-medium"><?php echo $businessHours; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right - Contact Form -->
            <div class="bg-gradient-to-br from-white via-gray-50 to-white rounded-3xl shadow-2xl shadow-gray-300/50 p-10 lg:p-14 border-2 border-gray-200/50 ring-2 ring-gray-100/50 hover:shadow-gray-400/60 hover:border-gray-300/50 transition-all duration-300"
                 x-intersect.threshold.0.1="rightVisible = true"
                 :class="rightVisible ? 'animate-fade-in-right' : ''"
                 style="opacity: 1;">
                <form @submit.prevent="handleSubmit()" class="space-y-6">
                    <div x-show="error" x-transition class="p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm" x-text="error"></div>
                    
                    <div>
                        <label for="contact-name" class="block text-sm font-semibold text-[#172455] mb-2">Name</label>
                        <input type="text" id="contact-name" x-model="formData.name" required
                               class="block w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300" />
                    </div>
                    <div>
                        <label for="contact-email" class="block text-sm font-semibold text-[#172455] mb-2">Email</label>
                        <input type="email" id="contact-email" x-model="formData.email" required
                               class="block w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300" />
                    </div>
                    <div>
                        <label for="contact-phone" class="block text-sm font-semibold text-[#172455] mb-2">Phone Number</label>
                        <input type="tel" id="contact-phone" x-model="formData.phone" placeholder="+254 700 000 000" required
                               class="block w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300" />
                    </div>
                    <div>
                        <label for="contact-message" class="block text-sm font-semibold text-[#172455] mb-2">Message</label>
                        <textarea id="contact-message" rows="5" x-model="formData.message" required
                                  class="block w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300 resize-none"></textarea>
                    </div>
                    <div>
                        <label for="contact-math" class="block text-sm font-semibold text-[#172455] mb-2">
                            Math Challenge: <span x-text="mathChallenge.a"></span> <span x-text="mathChallenge.operator"></span> <span x-text="mathChallenge.b"></span> = ?
                        </label>
                        <input type="number" id="contact-math" x-model="mathAnswer" placeholder="Enter answer" required
                               class="block w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition-all duration-300" />
                    </div>
                    <div style="display: none;">
                        <label for="contact-honeypot">Do not fill this field</label>
                        <input type="text" id="contact-honeypot" x-model="formData.honeypot" />
                    </div>
                    <button type="submit" :disabled="isSubmitting"
                            class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white font-bold py-4 rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span x-text="isSubmitting ? 'Sending...' : 'Send Message'"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/contact.blade.php ENDPATH**/ ?>